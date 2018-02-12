<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2018-02-11
 * Time: 12:36 PM
 */

class Info extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    //Prints the scenario of the site in JSON format
    function index()
    {
        echo "
        {
                \"scenario\": \"Custom Pizza Builder\"
        }";
    }

    //Prints category data based on id, or all if id is null, in JSON format
    function category($key = null)
    {

        $this->load->model('Categories');
        if (is_null($key))
        {
            $data = json_encode($this->categories->all());
        } else {
            $data = json_encode($this->categories->get($key));
        }
        
        echo $data;
    }

    function catalog($key = null)
    {

    }

    function bundle($key = null)
    {

    }
}