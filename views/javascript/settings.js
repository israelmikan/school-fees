/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    var frmAddSemester = '#frmChangePassword';
    $('#frmSubmitChangePassword').click(function () {
        var op = $('input[name="op"]');
        var np = $('input[name="np"]');
        var cnp = $('input[name="cnp"]');
        var studentId = $('input[name="studentId"]');

        if (op.val() == "") {
            op.addClass('parsley-error');
            op.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please enter old password');
        }
        else if (np.val() == "") {
            np.addClass('parsley-error');
            np.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please enter password');
        }
        else if (cnp.val() == "") {
            cnp.addClass('parsley-error');
            cnp.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Enter confirm password');
        }
        else if (np.val() != cnp.val()) {
            cnp.addClass('parsley-error');
            cnp.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Password and confirm password should match');
        }
        else {
            $('#frmChangePassword').addClass('disabled');
            $.post($(frmAddSemester).attr('action'),
                    {
                        op: op.val(),
                        np: np.val(),
                        studentId: studentId.val()
                    },
            function (data, status) {
                var obj = jQuery.parseJSON(data);
                if (obj.status == 1) {
                    $('.alert-danger').addClass('hidden');
                    $('.alert-success').removeClass('hidden');
                    $('.alert-success').html('Password updated successfully... Please Wait....');
                    setTimeout(function () {
                        window.location = main_url;
                    }, 1000);
                }
                else {
                    $('.alert-danger').removeClass('hidden');
                    $('.alert-danger').html('Password entered is wrong');
                }
            });
        }
    });

});