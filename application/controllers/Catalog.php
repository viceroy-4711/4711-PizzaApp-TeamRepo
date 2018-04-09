<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2018-02-10
 * Time: 10:53 PM
 */

/**
 * Catalog class
 *
 * Creates the controller for catalog page that displays the Catalog view.
 */
class Catalog extends Application
{
    public function index()
    {
        $set = $this->sets->create();
        $set->id = $this->sets->highest() + 1;

        $accessories = $this->accessories->all();
        $categories = $this->categories->all();
        $role = $this->session->userdata('userrole');
        $ingredients = "";
        $pizzaLayers = "";
        $formFields = "";


        if($role == ROLE_ADMIN) {
            //Generate buttons and fields for categories and accessories
            //edit button appears
            foreach ($categories as $ctg) {
                $ingredients .= "<h3>$ctg->name</h3>";
                $formFields .= "<input type='text' id='$ctg->categoryId form' name='$ctg->categoryId form' hidden>";
                foreach ($accessories as $asc) {
                    //Add Accessory under category
                    if ($asc->categoryId == $ctg->categoryId) {
                        $ingredients .= "
                        <div class='tooltip'>
                            <img id='$asc->categoryId/$asc->accessoryId' src='$asc->image' onclick='setVisibility(this)'>
                            <span class='tooltiptext'>
                                <h4>$asc->name </h4>
                                 <!-- EDIT BUTTON IS HERE -->
                                <p><a href=\"/Catalog/edit/$asc->accessoryId\"><input type=\"button\" value=\"EDIT\"/></a></p>
                                <p>Calories: $asc->calories</p>
                                <p>Protein: $asc->protein</p>
                                <p>Carbohydrates $asc->carbohydrates</p>
                            </span>
                        </div>
                    ";
                    }
                }
            }
        } else {
            //Edit button doesn't appear
            foreach ($categories as $ctg) {
                $ingredients .= "<h3>$ctg->name</h3>";
                $formFields .= "<input type='text' id='$ctg->categoryId form' name='$ctg->categoryId form' hidden>";
                foreach ($accessories as $asc) {
                    //Add Accessory under category
                    if ($asc->categoryId == $ctg->categoryId) {
                        $ingredients .= "
                        <div class='tooltip'>
                            <img id='$asc->categoryId/$asc->accessoryId' src='$asc->image' onclick='setVisibility(this)'>
                            <span class='tooltiptext'>
                                <h4>$asc->name </h4>
                                <p>Calories: $asc->calories</p>
                                <p>Protein: $asc->protein</p>
                                <p>Carbohydrates $asc->carbohydrates</p>
                            </span>
                        </div>
                    ";
                    }
                }
            }
        }

        //Generate accessory image layers
        foreach ($accessories as $asc)
        {
            $pizzaLayers .= "<img id='$asc->categoryId/$asc->accessoryId' src='$asc->image' style='visibility: hidden'>";
        }


        $this->data['accessories'] = $accessories;
        $this->data['categories'] = $categories;
        $this->data['ingredients'] = $ingredients;
        $this->data['formFields'] = $formFields;
        $this->data['pizzaLayers'] = $pizzaLayers;
        $this->data['pagetitle'] = 'Cuztomize your pizza,'. $role .'';
        $this->data['pagebody'] = 'catalog';
        $this->render();
    }

    // handle form submission when editing ingredients
    public function submit()
    {
        // setup for validation
        $this->load->library('form_validation');
        $this->load->model('Accessories');


        $this->form_validation->set_rules($this->Accessories->rules());

        // retrieve & update data transfer buffer
        $accessory = (array) $this->session->userdata('accessory');
        $accessory = array_merge($accessory, $this->input->post());
        $accessory = (object) $accessory;  // convert back to object
        $this->session->set_userdata('accessory', (object) $accessory);

        // validate away
        if ($this->form_validation->run())
        {
            $this->Accessories->update($accessory);
//                $this->alert('Accessory ' . $accessory->accessoryId . ' updated', 'success');
        } else
        {
//            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $this->showit();
        redirect('/Catalog');
    }

    //For saving pizza sets
    public function save()
    {
        $form = $this->input->post();
        $set = $this->sets->create();
        $set->id = $this->sets->highest() + 1;
        $set->name = $form['pizzaName'];
        $set->sauce = $form['0_form'];
        $set->cheese = $form['1_form'];
        $set->topping1 = $form['2_form'];
        $set->topping2 = $form['3_form'];

        $role = $this->session->userdata('userrole');
        if($role == ROLE_ADMIN || $role == ROLE_USER)
        {
            $this->sets->add($set);
            redirect('/homepage');
        }
        redirect('/homepage');
    }

    // initiate editing of a task
    public function edit($accessoryId = null)
    {
        $this->load->model('Accessories');
        if ($accessoryId == null)
            redirect('/Catalog');
        $accessory = $this->Accessories->get($accessoryId);
        $this->session->set_userdata('accessory', $accessory);
        $this->showit();
    }

    // Delete this item altogether
//    function delete()
//    {
//        $this->load->model('Accessories');
//        $dto = $this->session->userdata('accessory');
//        $accessory = $this->Accessories->get($dto->accessoryId);
//        $this->Accessories->delete($accessory->accessoryId);
//        $this->session->unset_userdata('accessory');
//        redirect('/Catalog');
//    }

    // Render the current DTO
    private function showit()
    {
        $this->load->helper('form');
        $accessory = $this->session->userdata('accessory');
        $this->data['accessoryId'] = $accessory->accessoryId;

        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';

        $fields = array(
            'fingredient'      => form_label('Ingredient Name') . form_input('name', isset($accessory->accessory) ? null : $accessory->name),
            'fcalories'  => form_label('Calories') . form_input('calories', isset($accessory->calories) ? null : $accessory->calories),
            'fprotein'  => form_label('Protein') . form_input('protein', isset($accessory->protein) ? null : $accessory->protein),
            'fcarbohydrates'  => form_label('Carbohydrates') . form_input('carbohydrates', isset($accessory->carbohydrates) ? null : $accessory->carbohydrates),
            'zsubmit'    => form_submit('submit', 'Update Ingredient'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'itemedit';
        $this->render();
    }

    // Forget about this edit
    function cancel() {
        $this->session->unset_userdata('accessory');
        redirect('/Catalog');
    }

}