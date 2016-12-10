<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class model {

    function __construct() {
        $this->db = new database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    function createSessionId($length = 15) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function encrypt($pure_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
        return $encrypted_string;
    }

    public static function decrypt($encrypted_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
        return $decrypted_string;
    }

    function mGetMainMenu() {
        $menu = '<aside class="bg-dark lter aside-md hidden-print" id="nav">
                    <section class="vbox">
                        <section class="w-f scrollable">
                            <div class="slim-scroll" 
                                    data-height="auto" 
                                    data-disable-fade-out="true" 
                                    data-distance="0" 
                                    data-size="5px" 
                                    data-color="#333333">
                                <nav class="nav-primary hidden-xs">
                                    <ul class="nav">
                                        <li class="">
                                            <a href="' . URL . 'dashboard"   class="active">
                                                <i class="fa fa-dashboard icon">
                                                    <b class="bg-danger"></b>
                                                </i>
                                                <span>Students\' List</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="' . URL . 'dashboard/add">
                                                <b class="badge bg-danger pull-right"></b>
                                                <i class="fa fa-plus icon">
                                                    <b class="bg-primary dker"></b>
                                                </i>
                                                <span>Add a student</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="' . URL . 'report">
                                                <b class="badge bg-danger pull-right"></b>
                                                <i class="fa fa-list icon">
                                                    <b class="bg-primary dker"></b>
                                                </i>
                                                <span>Reports</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="' . URL . 'setting">
                                                <i class="fa fa-cog icon">
                                                    <b class="bg-info"></b>
                                                </i>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="' . URL . 'setting/logout"  >
                                                <i class="fa fa-times icon">
                                                    <b class="bg-info"></b>
                                                </i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </section>
                    </section>
                </aside>';
        return $menu;
    }

    public static function mDisplayDate($date) {
        return $newDate = date("d M-Y", strtotime($date));
    }

    function getCourseList() {
        $user = $this->db->select('SELECT * FROM tblCourse WHERE status = :status', array('status' => 1));
        return $user;
    }

}
