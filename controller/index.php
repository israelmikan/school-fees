<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class index extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('index');
    }

    function xhrLogin() {
        $value = $this->model->mxhrLogin($_POST);
        echo json_encode($value);
    }

}
