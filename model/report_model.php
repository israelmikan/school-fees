<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class report_model extends model {

    function __construct() {
        parent::__construct();
    }

    function mGetSemester($id) {
        $res = $this->db->select('SELECT * FROM tblSemester WHERE courseId = :id', array('id' => $id));
        if (count($res) > 0) {
            $r['data'] = $res;
            $r['status'] = 1;
        } else {
            $r['status'] = 0;
        }
        return $r;
    }

    function getDueFeesList($id) {
        $t = explode('_', $id);
        if (count($t) == 2) {
            $c = $t[0];
            $s = $t[1];
            $q = 'SELECT t.id as tid , t.studentId, t.fees, t.courseId, t.semesterId, s.firstName, s.lastName, s.enrollNo '
                    . 'FROM tblStudentTotalFees t '
                    . 'LEFT JOIN tblStudent s '
                    . 'ON t.studentId = s.id '
                    . 'WHERE t.courseId = :cid AND t.semesterId = :sid ';
            $l = $this->db->select($q, array('cid' => $c, 'sid' => $s));
            for ($i = 0; $i < count($l); $i++) {
                $q = 'SELECT sum(emi.amount) as paid FROM tblStudentEMI emi where emi.studentTotalFeesId = :fid';
                $d = $this->db->select($q, array('fid' => $l[$i]['tid']));
                $l[$i]['paid'] = isset($d[0]['paid']) ? $d[0]['paid'] : 0;
            }
            $due = array();
            foreach ($l as $val) {
                if ($val['fees'] > $val['paid']) {
                    array_push($due, $val);
                }
            }
            return $due;
        } else {
            header('Location: ' . URL);
        }
    }

}
