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

    //Print accessories data based on id, or all if id is null, in JSON format
    function catalog($key = null)
    {
        $this->load->model('Accessories');
        if(is_null($key))
        {
            $data = json_encode($this->accessories->all());
        } else {
            $data = json_encode ($this->accessories->get($key));
        }

        echo $data;
    }

    //Print sets data based on id, or all if id is null, in JSON format
    function bundle($key = null)
    {
        $this->load->model('Sets');
        if(is_null($key))
        {
            $data = json_encode($this->sets->all());
        }
        else {
            $data = json_encode ($this->sets->get($key));
        }

        echo $data;
    }
}