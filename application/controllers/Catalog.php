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

        foreach ($categories as $ctg)
        {
            $ingredients .= "<h3>$ctg->name</h3>";

            foreach ($accessories as $asc)
            {
                if ($asc->categoryId == $ctg->categoryId)
                {
                    $ingredients .= "
                        <div class='tooltip'>
                            <img id='$asc->categoryId' src='$asc->image' onclick='setVisibility(this)'>
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

        $this->data['accessories'] = $accessories;
        $this->data['categories'] = $categories;
        $this->data['ingredients'] = $ingredients;
        $this->data['pagetitle'] = 'Customize Your Pizza';
        $this->data['pagebody'] = 'catalog';
        $this->render();
    }


}