/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    var frm = "#frmAddStudent";
    $('#submit').click(function () {
        var firstName = $('input[name="firstName"]');
        var lastName = $('input[name="lastName"]');
        var email = $('input[name="email"]');
        var enroll = $('input[name="enroll"]');
        var address = $('input[name="address"]');
        var ph1 = $('input[name="ph1"]');
        var ph2 = $('input[name="ph2"]');
        var course = $('select[name=course]');
        if (firstName.val() == "") {
            firstName.addClass('parsley-error');
            firstName.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please enter firstname');
        }
        
        else if (course.val() == "") {
            course.addClass('parsley-error');
            course.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please select Class');
        }
        else {
            $('#submit').addClass('disabled');
            $.post($(frm).attr('action'),
                    {
                        firstName: firstName.val(),
                        lastName: lastName.val(),
                        email: email.val(),
                        enroll: enroll.val(),
                        address: address.val(),
                        ph1: ph1.val(),
                        ph2: ph2.val(),
                        course: course.val()
                    },
            function (data, status) {
                //console.log(data);
                //console.log(status);
                //console.log(obj);
                var obj = jQuery.parseJSON(data);
                if (obj.status == 1) {
                    $('.alert-danger').addClass('hidden');
                    $('.alert-success').removeClass('hidden');
                    $('.alert-success').html('Student data saved successfully... Please Wait....');
                    setTimeout(function () {
                        window.location = main_url;
                    }, 1000);
                }
                else {
                    $('.alert-danger').removeClass('hidden');
                    $('.alert-danger').html('Problem in saving student data');
                }
            });
        }
    });



    /* Add Term */
    var inputTypes = [];
    var errorTypes = [];
    $('.afee').each(function () {
        inputTypes.push($(this));
        //inputTypes[$(this).attr('name')] = $(this)
    });
    $('.afee').change(function () {
        if (!isNum($(this).val())) {
            $(this).addClass('parsley-error');
            $(this).focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please enter valid amount');
            errorTypes.push($(this));
        }
        else {
            $(this).removeClass('parsley-error');
            $('.alert-danger').addClass('hidden');
            var tot = 0;
            $.each(inputTypes, function (index, value) {
                if (value.val() != "" && isNum(value.val())) {
                    tot = parseFloat(tot) + parseFloat(value.val());
                }
            });
            $('#fees').val(tot);
            errorTypes.pop();
        }
        if (errorTypes.length > 0) {
            $('#frmSubmitAddSemester').addClass('disabled');
        }
        else {
            $('#frmSubmitAddSemester').removeClass('disabled');
        }
    });
    var frmAddSemester = '#frmAddSemester';
    $('#frmSubmitAddSemester').click(function () {
        var studentId = $('input[name="studentId"]');
        var courseId = $('input[name="courseId"]');
        var fees = $('input[name="fees"]');
        var sem = $('select[name=semester]');
        var send = {};
        $.each(inputTypes, function (index, value) {
            if (value.val() == "") {
                send[value.attr("name")] = 0;
            }
            else if (value.val() != "" && isNum(value.val())) {
                send[value.attr("name")] = value.val();
            }
        });
        if (sem.val() == "") {
            sem.addClass('parsley-error');
            sem.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please select Term');
        }
        else if (fees.val() == "") {
            fees.addClass('parsley-error');
            fees.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please enter total fees for the semester');
        }
        else {
            $('#frmSubmitAddSemester').addClass('disabled');
            $.post($(frmAddSemester).attr('action'),
                    {
                        studentId: studentId.val(),
                        courseId: courseId.val(),
                        fees: fees.val(),
                        sem: sem.val(),
                        cat: send
                    },
            function (data, status) {
                var obj = jQuery.parseJSON(data);
                if (obj.status == 1) {
                    $('.alert-danger').addClass('hidden');
                    $('.alert-success').removeClass('hidden');
                    $('.alert-success').html('Data saved successfully... Please Wait....');
                    setTimeout(function () {
                        window.location = main_url + 'dashboard/profile/' + obj.id;
                    }, 1000);
                }
                else {
                    $('.alert-danger').removeClass('hidden');
                    $('.alert-danger').html('Problem in saving student data');
                }
            });
        }
    });
    var frmAddFees = "#frmAddEMI";
    $('#frmSubmitEMI').click(function () {
        var studentId = $('input[name="studentId"]');
        var feesId = $('input[name="feesId"]');
        var fees = $('input[name="fees"]');
        if (fees.val() == "") {
            fees.addClass('parsley-error');
            fees.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please fees paid');
        }
        else if (!isNumber(fees.val())) {
            fees.addClass('parsley-error');
            fees.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please enter valid amount');
        }
        else {
            $('#frmSubmitEMI').addClass('disabled');
            $.post($(frmAddFees).attr('action'),
                    {
                        studentId: studentId.val(),
                        feesId: feesId.val(),
                        fees: fees.val()
                    },
            function (data, status) {
                var obj = jQuery.parseJSON(data);
                if (obj.status == 1) {
                    $('.alert-danger').addClass('hidden');
                    $('.alert-success').removeClass('hidden');
                    $('.alert-success').html('Data saved successfully... Please Wait....');
                    setTimeout(function () {
                        window.location = main_url + 'dashboard/profile/' + obj.id;
                    }, 1000);
                }
                else {
                    $('.alert-danger').removeClass('hidden');
                    $('.alert-danger').html('Problem in saving student data');
                }
            });
        }
    });

    $('input[name="fees"]').keyup(function () {
        if (!isNumber($('input[name="fees"]').val())) {
            $('input[name="fees"]').addClass('parsley-error');
            $('input[name="fees"]').focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please enter valid amount');
        }
        else {
            var final = $('input[name="total"]').val() - $('input[name="feesPaid"]').val() - $('input[name="fees"]').val();
            $('input[name="remaining"]').val(final);
        }
    });
    /* Update student form */
    var frmUpdate = "#frmUpdateStudent";
    $('#updateStudentInfo').click(function () {
        var firstName = $('input[name="firstName"]');
        var lastName = $('input[name="lastName"]');
        var email = $('input[name="email"]');
        var enroll = $('input[name="enroll"]');
        var address = $('input[name="address"]');
        var ph1 = $('input[name="ph1"]');
        var ph2 = $('input[name="ph2"]');
        var course = $('select[name=course]');
        var studentId = $('input[name="studentId"]');
        if (firstName.val() == "") {
            firstName.addClass('parsley-error');
            firstName.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please enter firstname');
        }
        
        else if (course.val() == "") {
            course.addClass('parsley-error');
            course.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please select Class');
        }
        else {
            $('#updateStudentInfo').addClass('disabled');
            $.post($(frmUpdate).attr('action'),
                    {
                        firstName: firstName.val(),
                        lastName: lastName.val(),
                        email: email.val(),
                        enroll: enroll.val(),
                        address: address.val(),
                        ph1: ph1.val(),
                        ph2: ph2.val(),
                        course: course.val(),
                        studentId: studentId.val()
                    },
            function (data, status) {
                //console.log(data);
                //console.log(status);
                //console.log(obj);
                var obj = jQuery.parseJSON(data);
                if (obj.status == 1) {
                    $('.alert-danger').addClass('hidden');
                    $('.alert-success').removeClass('hidden');
                    $('.alert-success').html('Student data saved successfully... Please Wait....');
                    setTimeout(function () {
                        window.location = main_url;
                    }, 1000);
                }
                else {
                    $('.alert-danger').removeClass('hidden');
                    $('.alert-danger').html('Problem in saving student data');
                }
            });
        }
    });


    $('#btnDelStudent').click(function () {
        $.post(main_url + "dashboard/xhrDelete",
                {
                    id: $('#btnDelStudent').attr('data')
                },
        function (data, status) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 1) {
                $('.alert-danger').removeClass('hidden');
                $('.alert-danger').html('Student data Deleted successfully... Please Wait....');
                setTimeout(function () {
                    window.location = main_url;
                }, 1000);
            }
            else {
                $('.alert-danger').removeClass('hidden');
                $('.alert-danger').html('Problem in saving student data');
            }
        });
    });
    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function isNum(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }
//$('#studentListDashboard').DataTable();
    $('#studentListDashboard').each(function () {
        var oTable = $(this).dataTable({
            "bProcessing": true,
            "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "sPaginationType": "full_numbers"
        });
    });
});