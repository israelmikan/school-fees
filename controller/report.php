<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class report extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->param['courseList'] = $this->model->getCourseList();
        $this->view->mainMenu = $this->model->mGetMainMenu();
        $this->view->render('report');
    }

    function getSemester($id) {
        $res = $this->model->mGetSemester($id);
        echo json_encode($res);
    }

    function getList($c = FALSE) {
        if ($c != FALSE) {
            $this->view->param = $this->model->getDueFeesList($c);
            $this->view->mainMenu = $this->model->mGetMainMenu();
            $this->view->render('getList');
        } else {
            $this->redirectToError();
        }
    }

}
