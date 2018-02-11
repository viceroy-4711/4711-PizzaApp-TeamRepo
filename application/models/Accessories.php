<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2018-02-11
 * Time: 12:58 AM
 */

class Accessories extends CSV_Model
{
    public $accessoryId;
    public $name;
    public $image;
    public $calories;
    public $protein;
    public $carbohydrates;
    public $categoriesId;

    /**
     * Contructor for Accessories
     */
    function __construct()
    {
        parent::__construct(APPPATH . "../data/Accessories.csv", "accessoryId", "accessories");
    }
}
