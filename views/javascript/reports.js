/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    $('#course').change(function () {
        $('#semester').attr('disabled', 'disabled');
        $('#frmSubmitReport').attr('disabled', 'disabled');
        var course = $('select[name=course]');
        $.post(main_url + 'report/getSemester/' + course.val(),
                {
                    course: course.val()
                },
        function (data, status) {
            var obj = jQuery.parseJSON(data);
            if (obj.status == 1) {
                var seloption = "";
                $.each(obj.data, function (index, value) {
                    seloption += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('#semester').append(seloption);
                $('#frmSubmitReport').prop('disabled', false);
                $('#semester').prop('disabled', false);
            }
            else {
                $('.alert-danger').removeClass('hidden');
                $('.alert-danger').html('Problem Something went wrong');
            }
        });
    });

    $('#frmSubmitReport').click(function () {
        var course = $('select[name=course]');
        var semester = $('select[name=semester]');
        if (course.val() == "") {
            course.addClass('parsley-error');
            course.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please select Class');
        }
        else if (semester.val() == "") {
            semester.addClass('parsley-error');
            semester.focus();
            $('.alert-danger').removeClass('hidden');
            $('.alert-danger').html('Please select Term');
        }
        else {
            $('.alert-danger').addClass('hidden');
            setTimeout(function () {
                window.location = main_url + 'report/getList/' + course.val() + '_' + semester.val();
            }, 10);
        }
    });

    $('#studentListDashboard').each(function () {
        var oTable = $(this).dataTable({
            "sDom": 'T<"clear">lfrtip',
            "bProcessing": true,
            "oTableTools": {
                "aButtons": [
                    {
                        "sExtends": "print",
                        "bShowAll": false
                    }
                ]
            },
            "sPaginationType": "full_numbers"
        });
    });
});