<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class setting extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->mainMenu = $this->model->mGetMainMenu();
        $this->view->render('setting');
    }

    function logout() {
        session::destroy();
        header("Location: " . URL);
    }

    function xhrChangePassword() {
        $result = $this->model->mxhrChangePassword($_POST);
        echo json_encode($result);
    }

}
