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
        $accessories = $this->accessories->all();
        $categories = $this->categories->all();
        $this->data['accessories'] = $accessories;
        $this->data['categories'] = $categories;
        $this->data['pagetitle'] = 'Customize Your Pizza';
        $this->data['pagebody'] = 'catalog';
        $this->render();
    }
}