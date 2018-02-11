<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2018-02-11
 * Time: 12:55 AM
 */

class Categories extends CSV_Model
{
    public $id;
    public $name;

    /**
     * Contructor for Categories
     */
    function __construct()
    {
        parent::__construct(APPPATH . "../data/Categories.csv", "id", "categories");
    }
}
