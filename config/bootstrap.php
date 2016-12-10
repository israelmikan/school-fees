<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class bootstrap {

    function __construct() {
        if (isset($_GET['url']))
            $url = $_GET['url'];
        else
            $url = "index";
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $file = 'controller/' . $url[0] . '.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            $this->error();
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        if (!$this->chkLoggedIn()) {
            if ($url[0] != "index" && $url[0] != 'error') {
                header("location: index");
            }
            session::destroy();
        } else {
            if ($url[0] == "index") {
                header("location: dashboard");
            }
        }
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->error();
                }
            } else {
                $controller->index();
            }
        }
    }

    private
            function chkLoggedIn() {
        session::init();
        $logged = session::get(SStatus);
        if ($logged) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function error() {
        require_once 'controller/error.php';
        $controller = new error();
        $controller->index();
        return false;
    }

}
