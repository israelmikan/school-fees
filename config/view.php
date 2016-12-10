<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class view {

    function __construct() {
        
    }

    public function render($name) {
        $file = "views/" . $name . ".php";
        if (file_exists($file)) {
            require_once $file;
        } else {
            $this->displayError();
        }
    }

    public function displayError() {
        $this->render('error');
    }

}
