<?php
/**
* Created by PhpStorm.
* User: lulu
* Date: 2018-03-09
* Time: 11:00 PM
*/

class Accessory extends Entity
{
    public $accessoryId;
    public $name;
    public $image;
    public $calories;
    public $protein;
    public $carbohydrates;
    public $categoriesId;
    
    public function getAccessoryId(){
        return $this->accessoryId;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getImage(){
        return $this->image;
    }
    
    public function getCalories() {
        return $this->calories;
    }
    
    public function getProtein() {
        return $this->protein;
    }
    
    public function getCarbohydrates() {
        return $this->carbohydrates;
    }
    
    public function getCategoriesId() {
        return $this->categoriesId;
    }
    
    
    // insist that an ID be present
    public function setAccessoryId($value) {
        if (empty($value))
            throw new Exception('ID must exist');
        $this->accessoryId = $value;
        return $this;
    }
    
    // insist that a task be present and no longer than 64 characters
    public function setName($value) {
        if (empty($value)) {
            throw new Exception("Name can't be empty");
        }
        if (strlen($value) >= 30)
        {
            throw new Exception("Name has maximum 30 characters.");
        }
        if (!preg_match('/^[a-z0-9\s]*$/i', $value))
        {
            throw new Exception("Name can only contain alphanumeric,numeric and spaces.");
        }
        $this->name = $value;
        return $this;
    }
    
    public function setImage($value) {
        if (empty($value)) {
            throw new Exception("Image can't be empty");
        }
        $this->image = $value;
        return $this;
    }
    
    public function setCalories($value) {
        if (empty($value)) {
            throw new Exception("Calories can't be empty");
        }
        if (!is_int($value)) {
            throw new Exception("Calories must be a number");
        }
        if ($value < 0 ) {
            throw new Exception("Calories must greater or equal to 0");
        }
        $this->calories = $value;
        return $this;
    }
    
    public function setProtein($value) {
        if (empty($value)) {
            throw new Exception("Protein can't be empty");
        }
        if (!is_int($value)) {
            throw new Exception("Protein must be a number");
        }
        if ($value < 0 ) {
            throw new Exception("Protein must greater or equal to 0");
        }
        $this->protein = $value;
        return $this;
    }
    
    public function setCarbohydrates($value) {
        if (empty($value)) {
            throw new Exception("Carbohydrates can't be empty");
        }
        if (!is_int($value)) {
            throw new Exception("Carbohydrates must be a number");
        }
        if ($value < 0 ) {
            throw new Exception("Carbohydrates must greater or equal to 0");
        }
        $this->carbohydrates = $value;
        return $this;
    }
    
    // insist that an ID be present
    public function setCategoriesId($value) {
        if (empty($value))
            throw new Exception('ID must exist');
        if (!is_int($value)) {
            throw new Exception("ID must be a number");
        }
        if ($value < 0 || $value > 3 ) {
            throw new Exception("ID must must between 0 and 3");
        }
        $this->categoriesId = $value;
        return $this;
    }
    
}