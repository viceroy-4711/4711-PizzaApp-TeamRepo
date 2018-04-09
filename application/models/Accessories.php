<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2018-02-11
 * Time: 12:58 AM
 */

/**
 * Accessories model
 *
 * Extends CSV Model and contains details about each pizza item.
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

    // validation rules
    public function rules()
    {
        $config = array(
            ['field' => 'Name', 'label' => 'Ingredient Name', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'Calories', 'label' => 'Calories', 'rules' => 'integer|less_than[5000]'],
            ['field' => 'Protein', 'label' => 'Protein', 'rules' => 'integer|less_than[5000]'],
            ['field' => 'Carbohydrates', 'label' => 'Carbohydrates', 'rules' => 'integer|less_than[5000]'],
        );
        return $config;
    }
}
