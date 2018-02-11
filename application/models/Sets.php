<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2018-02-11
 * Time: 1:02 AM
 */

class Sets extends CSV_Model
{
    public $id;
    public $name;
    public $sauce;
    public $cheese;
    public $topping1;
    public $topping2;

    /**
     * Contructor for Sets
     */
    function __construct()
    {
        parent::__construct(APPPATH . "../data/Sets.csv", "id", "sets");
    }
}