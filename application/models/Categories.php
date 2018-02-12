<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2018-02-11
 * Time: 12:55 AM
 */

/**
 * Categories model
 *
 * Extends the CSV Model and reads in the category for a pizza topping, such as
 * Sauce, cheese type, topping1 and topping2.
 */
class Categories extends CSV_Model
{
    public $categoryId;
    public $name;

    /**
     * Contructor for Categories
     */
    function __construct()
    {
        parent::__construct(APPPATH . "../data/Categories.csv", "categoryId", "categories");
    }
}
