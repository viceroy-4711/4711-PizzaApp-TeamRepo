<?php
use PHPUnit\Framework\TestCase;

class AccessoryTest extends TestCase {
    
    function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->model('accessory');
        $this->mAccessory = new Accessory();
        $this->mAccessory->setName("Coding");
        $this->mAccessory->setImage("https://png.pngtree.com/element_pic/00/16/07/05577ba9f03eb80.jpg");
        $this->mAccessory->setCalories(100);
        $this->mAccessory->setProtein(20);
        $this->mAccessory->setCarbohydrates(200);
        $this->mAccessory->setCategoriesId(2);
    }
    
    function testValidNameAlphaNum() {
        $this->badAccessory = new Accessory();
        $this->expectException(Exception::class);
        $this->badAccessory->setName("#$%%^");
    }
    
    function testValidNameLenght() {
        $this->badAccessory = new Accessory();
        $this->expectException(Exception::class);
        $this->badAccessory->setName("hdsjkahdksahdashdjsahdjkshdkakgfbdbckdsbckas");
    }
    
    function testValidCalories() {
        $this->badAccessory = new Accessory();
        $this->expectException(Exception::class);
        $this->badAccessory->setCalories("one");
    }
    
    function testValidProtein() {
        $this->badAccessory = new Accessory();
        $this->expectException(Exception::class);
        $this->badAccessory->setProtein("one");
    }
    
    function testValidCarbohydrates() {
        $this->badAccessory = new Accessory();
        $this->expectException(Exception::class);
        $this->badAccessory->setCarbohydrates("one");
    }
    
    function testValidCategoriesId() {
        $this->badAccessory = new Accessory();
        $this->expectException(Exception::class);
        $this->badAccessory->setCategoriesId("two");
    }
    
    function testCalories() {
        $expected = 100;
        $this->assertEquals($expected, $this->mAccessory->getCalories());
    }
    
    function testProtein() {
        $expected = 20;
        $this->assertEquals($expected, $this->mAccessory->getProtein());
    }
    
    function testCarbohydrates() {
        $expected = 200;
        $this->assertEquals($expected, $this->mAccessory->getCarbohydrates());
    }
    
    function testCategoriesId() {
        $expected = 2;
        $this->assertEquals($expected, $this->mAccessory->getCategoriesId());
    }
}