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
        $sets = $this->sets->all();
        $accessories = $this->accessories->all();
        $categories = $this->categories->all();
        $this->data['sets'] = $sets;
        $this->data['accessories'] = $accessories;
        $this->data['categories'] = $categories;
        $this->data['pagetitle'] = 'Preset Pizzas';
        $this->data['pagebody'] = 'homepage';
        $this->render();
	}
}
