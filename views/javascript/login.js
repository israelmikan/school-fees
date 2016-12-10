/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    var frm = "#frmLogin";
    $(frm).on("keyup keypress", function (e) {
        var code = e.keyCode || e.which;
        var pass = $(frm).find('input[name="password"]');
        if (code == 13) {
            if (pass.val() == "") {
                pass.addClass('parsley-error');
                $('.alert-danger').removeClass('hidden');
                $('.alert-danger').html('Enter Password');
            }
            else {
                $.post($(frm).attr('action'),
                        {
                            password: pass.val()
                        },
                function (data, status) {
                    console.log(data);
                    console.log(status);
                    var obj = jQuery.parseJSON(data);
                    if (obj.status == 1) {
                        $('.alert-danger').addClass('hidden');
                        pass.removeClass('parsley-error');
                        $('.alert-success').removeClass('hidden');
                        $('.alert-success').html('Login Success');

                        setTimeout(function () {
                            window.location = "dashboard";
                        }, 500);
                    }
                    else {
                        pass.addClass('parsley-error');
                        $('.alert-danger').removeClass('hidden');
                        $('.alert-danger').html('Wrong Password');
                    }
                });
            }
        }
        else {
            if (pass.val() != "") {
                $('.alert-danger').addClass('hidden');
                pass.removeClass('parsley-error');
            }
        }
    });
});