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

        $ingredients = "";
        $pizzaLayers = "";
        $formFields = "";
        $addButton = "";

        //Generate buttons and fields for categories and accessories
        foreach ($categories as $ctg)
        {
            $ingredients .= "<h3>$ctg->name</h3>";
            $formFields .= "<input type='text' id='$ctg->categoryId form' name='$ctg->categoryId form' hidden>";

            foreach ($accessories as $asc)
            {
                //Add Accessory under category
                if ($asc->categoryId == $ctg->categoryId)
                {
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
        $this->data['pagetitle'] = 'Customize Your Pizza';
        $this->data['pagebody'] = 'catalog';

        $this->data['addButton'] = $this->parser->parse('emptydiv', [], true);
        $role = $this->session->userdata('userrole');
        if($role == ROLE_ADMIN || $role == ROLE_USER){
            $this->data['addButton'] =  $this->parser->parse("addButton", [], true);
        }
        $this->render();
    }

    public function submit()
    {
        $form = $this->input->post();
        $set = $this->sets->create();
        $set->id = $this->sets->highest() + 1;
        $set->name = $form['pizzaName'];
        $set->sauce = $form['0_form'];
        $set->cheese = $form['1_form'];
        $set->topping1 = $form['2_form'];
        $set->topping2 = $form['3_form'];


            $this->sets->add($set);
            redirect('/homepage');

    }
}