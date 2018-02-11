<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2018-02-10
 * Time: 10:53 PM
 */

class Catalog extends Application
{
    public function index()
    {
        $this->data['pagetitle'] = 'Customize Your Pizza';
        $this->data['pagebody'] = 'catalog';
        $this->render();
    }
}