<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class setting_model extends model {

    function __construct() {
        parent::__construct();
    }

    function mxhrChangePassword($args) {
        $old = $user = $this->db->select('SELECT * FROM tblUser WHERE id = :status', array('status' => session::get(SUserId)));
        if ($old[0]['password'] == $args['op'] || $old[0]['password'] == model::encrypt($args['op'], KEY)) {
            $arr = array(
                'password' => model::encrypt($args['np'], KEY)
            );
            $id = session::get(SUserId);
            $update = $this->db->update('tblUser', $arr, "id = '{$id}'");
            $return['status'] = 1;
        } else {
            $return['status'] = 0;
        }
        return $return;
    }

}
