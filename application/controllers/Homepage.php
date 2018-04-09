<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Homepage controller
 *
 * Displays contents on the homepage view.
 */
class Homepage extends Application
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/
     * 	- or -
     * 		http://example.com/welcome/index
     *
     * So any other public methods not prefixed with an underscore will
     * map to /welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->showit(null);
    }

    public function display($id)
    {

        $this->showit($id);

    }

    private function showit($id)
    {

        $sets = $this->sets->all();
        $this->data['sets'] = $sets;
        $this->data['pagetitle'] = 'Preset Pizzas';
        $this->data['pagebody'] = 'homepage';
        $toppings = "";
        if ($id == null)
        {
            $this->data['toppings'] = $toppings;
            $this->data['calories'] = "";
            $this->data['protein'] = "";
            $this->data['carbohydrates'] = "";
            $this->render();
        }
        else
        {
            $set = $this->sets->get($id);

            $sauce = $this->accessories->get($set->sauce);
            $cheese = $this->accessories->get($set->cheese);
            $topping1 = $this->accessories->get($set->topping1);
            $topping2 = $this->accessories->get($set->topping2);

            $toppings .= "<image src='"
                . $sauce->image
                . "' >";
            $toppings .= "<image src='"
                . $cheese->image
                . "' >";
            $toppings .= "<image src='"
                . $topping1->image
                . "' >";
            $toppings .= "<image src='"
                . $topping2->image
                . "' >";

            $role = $this->session->userdata('userrole');
            $this->data['pagetitle'] = 'Pizza for '. $role . '';

            $calories = $sauce->calories +
                $cheese->calories +
                $topping1->calories +
                $topping2->calories;

            $protein = $sauce->protein +
                $cheese->protein +
                $topping1->protein +
                $topping2->protein;

            $carbohydrates =  $sauce->carbohydrates +
                $cheese->carbohydrates +
                $topping1->carbohydrates +
                $topping2->carbohydrates;

            $this->data['calories'] = "Calories: " . $calories;
            $this->data['protein'] = "Protein: " . $protein;
            $this->data['carbohydrates'] = "Carbohydrates: " . $carbohydrates;
            $this->data['toppings'] = $toppings;
            $this->render();
        }
    }
}
