<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class controller {

    function __construct() {
        $this->view = new view();
    }

    public function loadModel($name) {
        $path = 'model/' . $name . '_model.php';

        if (file_exists($path)) {
            require 'model/' . $name . '_model.php';

            $modelName = $name . '_model';
            $this->model = new $modelName();
        }
    }

    function redirectToError() {
        header("Location: " . URL);
        exit();
    }

}
