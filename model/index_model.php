<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class index_model extends model {

    function __construct() {
        parent::__construct();
    }

    public function mxhrLogin($args) {
        //return $this->db->select('SELECT * FROM note WHERE userid = :userid', array('userid' => $_SESSION['userid']));
        $return = array();
        $user = $this->db->select('SELECT id, email FROM tblUser where id = :id AND (password = :password OR password = :pass )', array('id' => 1, 'password' => model::encrypt($args["password"], KEY), 'pass' => $args["password"]));
        if (count($user) == 1) {
            session::init();
            session::set(SStatus, TRUE);
            session::set(SID, $this->createSessionId());
            session::set(SUserId, $user[0]['id']);
            session::set(SUserEmail, $user[0]['email']);
            session::set(SSessionTime, date());
            $return['status'] = 1;
        } else {
            session::destroy();
            $return['status'] = 0;
        }
        $return['data'] = $user;
        return $return;
    }

}
