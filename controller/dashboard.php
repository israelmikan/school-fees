<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dashboard extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->studentList = $this->model->getStudentList();
        $this->view->mainMenu = $this->model->mGetMainMenu();
        $this->view->render('dashboard');
    }

    function add() {
        $this->view->courseList = $this->model->getCourseList();
        $this->view->mainMenu = $this->model->mGetMainMenu();
        $this->view->render('addStudent');
    }

    function update($id = FALSE) {
        if ($id != FALSE) {
            $this->view->param = $this->model->getStudentDetail($id);
            $this->view->courseList = $this->model->getCourseList();
            $this->view->mainMenu = $this->model->mGetMainMenu();
            $this->view->render('updateStudent');
        } else
            $this->redirectToError();
    }

    function profile($id = FALSE) {
        if ($id != FALSE) {
            $this->view->studentDetails = $this->model->getStudentDetail($id);
            $this->view->semester = $this->model->getSemesterInfo($id);
            $this->view->mainMenu = $this->model->mGetMainMenu();
            $this->view->render('studentProfile');
        } else
            $this->redirectToError();
    }

    function addSemester($id) {
        if ($id != FALSE) {
            $this->view->mainMenu = $this->model->mGetMainMenu();
            $this->view->param = $this->model->mgetAddSemesterData($id);
            $this->view->cat = $this->model->getFeeCategory();
            $this->view->render('addSemester');
        } else {
            $this->redirectToError();
        }
    }

    function addFees($id) {
        if ($id != FALSE) {
            $this->view->mainMenu = $this->model->mGetMainMenu();
            $this->view->param = $this->model->mGetAddEMIDetails($id);
            $this->view->render('addFees');
        } else {
            $this->redirectToError();
        }
    }

    function delete($id = FALSE) {
        if ($id != FALSE) {
            $this->view->studentDetails = $this->model->getStudentDetail($id);
            $this->view->semester = $this->model->getSemesterInfo($id);
            $this->view->mainMenu = $this->model->mGetMainMenu();
            $this->view->render('deleteStudent');
        } else
            $this->redirectToError();
    }

    function semDetails($id) {
        if ($id != FALSE) {
            $this->view->param = $this->model->getDetailFees($id);
            $this->view->mainMenu = $this->model->mGetMainMenu();
            $this->view->render('semDetail');
        } else
            $this->redirectToError();
    }

    function invoice($id) {
        if ($id != FALSE) {
            $this->view->param = $this->model->getInvoice($id);
            $this->view->mainMenu = $this->model->mGetMainMenu();
            $this->view->render('invoice');
        } else
            $this->redirectToError();
    }

    function xhrAddStudent() {
        $result = $this->model->mxhrAddStudent($_POST);
        echo json_encode($result);
    }

    function xhrAddSemester() {
        $result = $this->model->mxhrAddSemester($_POST);
        echo json_encode($result);
    }

    function xhrAddFees() {
        $result = $this->model->mxhrAddFees($_POST);
        echo json_encode($result);
    }

    function xhrUpdateStudent() {
        $result = $this->model->mxhrUpdateStudent($_POST);
        echo json_encode($result);
    }

    function xhrDelete() {
        $result = $this->model->mxhrDelete($_POST);
        echo json_encode($result);
    }

    function xhrDelStu($id) {
        if ($id != FALSE) {
            $result = $this->model->mxhrDelete($id);
            header('Location: ' . URL);
        } else {
            $this->redirectToError();
        }
    }

}
