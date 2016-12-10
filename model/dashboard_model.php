<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dashboard_model extends model {

    function __construct() {
        parent::__construct();
    }

    function getStudentList() {
        $student = $this->db->select('SELECT tblStudent.id, tblStudent.enrollNo,tblStudent.firstName, tblStudent.LastName, tblStudent.email, tblCourse.name, tblStudent.courseId FROM tblStudent LEFT JOIN tblCourse ON tblStudent.courseId = tblCourse.id WHERE tblStudent.status = :status', array('status' => 1));
        return $student;
    }

    function getStudentDetail($id) {
        $detail = $this->db->select('SELECT tblStudent.id, tblStudent.firstName, tblStudent.lastName, tblStudent.email, tblStudent.enrollNo, tblStudent.address, tblStudent.p1, tblStudent.p2, tblStudent.studentTotalFeesId, tblStudent.courseId, tblCourse.name as courseName FROM tblStudent LEFT JOIN tblCourse ON tblStudent.courseId = tblCourse.id WHERE tblStudent.id = :id', array('id' => $id));
        return $detail;
    }

    function getSemesterInfo($id) {
        $info = $this->db->select('SELECT tblStudentTotalFees.id, tblStudentTotalFees.studentId, tblStudentTotalFees.fees, tblStudentTotalFees.semesterId as semId, tblSemester.name FROM tblStudentTotalFees LEFT JOIN tblSemester ON tblStudentTotalFees.semesterId = tblSemester.id WHERE tblStudentTotalFees.studentId = :id ORDER BY tblStudentTotalFees.id DESC', array('id' => $id));
        for ($i = 0; $i < count($info); $i++) {
            $emi = $this->db->select('SELECT * FROM tblStudentEMI where studentTotalFeesId = :id AND studentId = :sid', array('id' => $info[$i]['id'], 'sid' => $info[$i]['studentId']));
            $paid = $this->db->select('SELECT sum(amount) as amount FROM tblStudentEMI where studentTotalFeesId = :id AND studentId = :sid', array('id' => $info[$i]['id'], 'sid' => $info[$i]['studentId']));
            $info[$i]['emi'] = $emi;
            $info[$i]['paid'] = $paid[0]['amount'];
        }
        return $info;
    }

    function getFeeCategory() {
        $d = $this->db->select('SELECT * FROM tblCategory');
        return $d;
    }

    function getDetailFees($id) {
        $info = $this->db->select('SELECT * FROM tblTotalFeesCategoryRelation r LEFT JOIN tblCategory t ON r.categoryId = t.id WHERE r.totalFeesId = :id', array('id' => $id));
        return $info;
    }

    function mgetAddSemesterData($id) {
        $val = array();
        $val['studentId'] = $id;
        $course = $this->db->select('SELECT courseId FROM tblStudent where id = :id', array('id' => $id));
        $val['courseId'] = $course[0]['courseId'];
        $semester = $this->db->select('SELECT id, name FROm tblSemester WHERE courseId = :id', array('id' => $course[0]['courseId']));
        $val['semester'] = $semester;
        return $val;
    }

    function mGetAddEMIDetails($id) {
        $val = array();
        $val['feesId'] = $id;
        $student = $this->db->select('SELECT studentId, fees FROM tblStudentTotalFees where id = :id', array('id' => $id));
        $val['studentId'] = $student[0]['studentId'];
        $val['total'] = $student[0]['fees'];
        $fees = $this->db->select('SELECT sum(amount) as amount FROM tblStudentEMI WHERE studentId = :sid AND studentTotalFeesId = :fid', array('sid' => $student[0]['studentId'], 'fid' => $id));
        $val['paid'] = is_null($fees[0]['amount']) ? 0 : $fees[0]['amount'];
        return $val;
    }

    function getInvoice($id) {
        $d = $this->db->select('SELECT *, e.id as eid, e.lastUpdated as fdate, e.studentTotalFeesId as tid  FROM tblStudentEMI e LEFT JOIN tblStudent s ON e.studentId = s.id LEFT JOIN tblStudentTotalFees t ON e.studentTotalFeesId = t.id WHERE e.id = :id', array('id' => $id));
        $s = $this->db->select('SELECT sum(amount) as total FROM tblStudentEMI WHERE studentId = :sid AND studentTotalFeesId = :tid', array('sid' => $d[0]['studentId'], 'tid' => $d[0]['tid']));
        $d[0]['totalFees'] = $s[0]['total'];
        return $d;
    }

    function mxhrAddStudent($args) {
        $return = $this->db->insert('tblStudent', array(
            "firstName" => $args['firstName'],
            "lastName" => $args['lastName'],
            "email" => $args['email'],
            "enrollNo" => $args['enroll'],
            "address" => $args['address'],
            "p1" => $args['ph1'],
            "p2" => $args['ph2'],
            "lastUpdated" => date("Y-m-d H:i:s"),
            "courseId" => $args['course'],
            "status" => 1
        ));
        $return['status'] = 1;
        return $return;
    }

    function mxhrAddSemester($args) {
        $return['status'] = 1;
        $return['id'] = $args['studentId'];
        $date = date("Y-m-d H:i:s");
        $this->db->insert('tblStudentTotalFees', array(
            'courseId' => $args['courseId'],
            'semesterId' => $args['sem'],
            'studentId' => $args['studentId'],
            'fees' => $args['fees'],
            'lastUpdated' => $date
        ));
        $std = $this->db->select('SELECT * FROM tblStudentTotalFees where courseId = :cid AND semesterId = :sid AND studentId = :stdId AND fees = :fees AND lastUpdated = :date', array('cid' => $args['courseId'], 'sid' => $args['sem'], 'stdId' => $args['studentId'], 'fees' => $args['fees'], 'date' => $date));
        if (count($std) == 1) {
            foreach ($args['cat'] as $key => $val) {
                $this->db->insert('tblTotalFeesCategoryRelation', array(
                    'totalFeesId' => $std[0]['id'],
                    'categoryId' => $key,
                    'fees' => $val,
                    'studentId' => $args['studentId']
                ));
            }
        }
        return $return;
    }

    function mxhrAddFees($args) {

        $this->db->insert('tblStudentEMI', array(
            'studentId' => $args['studentId'],
            'amount' => $args['fees'],
            'studentTotalFeesId' => $args['feesId'],
            'lastUpdated' => date("Y-m-d H:i:s"),
            'status' => 1
        ));
        $return['status'] = 1;
        $return['id'] = $args['studentId'];
        return $return;
    }

    function mxhrUpdateStudent($args) {
        //$this->db->update('note', $postData, "`noteid` = '{$data['noteid']}' AND userid = '{$_SESSION['userid']}'");
        $arr = array(
            'firstName' => $args['firstName'],
            'lastName' => $args['lastName'],
            'email' => $args['email'],
            'enrollNo' => $args['enroll'],
            'address' => $args['address'],
            'p1' => $args['ph1'],
            'p2' => $args['ph2'],
            'courseId' => $args['course']
        );

        $update = $this->db->update('tblStudent', $arr, "id = '{$args['studentId']}'");
        $return['status'] = 1;
        $return['id'] = $args['studentId'];
        return $return;
    }

    function mxhrDelete($args) {
        //$this->db->delete('note', "`noteid` = {$data['noteid']} AND userid = '{$_SESSION['userid']}'");
        $this->db->delete('tblStudent', "`id` = {$args}");
        $this->db->delete('tblStudentTotalFees', "`studentId` = {$args}");
        $this->db->delete('tblStudentEMI', "`studentId` = {$args}");
        $this->db->delete('tblTotalFeesCategoryRelation', "`studentId` = {$args}");
        $return['status'] = 1;
        return $return;
    }

}
