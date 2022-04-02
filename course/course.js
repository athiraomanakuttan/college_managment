getcourse()
getdepartments();
function getcourse() {
    $.ajax({
        type: "POST",
        url: "../api/rest.php",
        data: { 'action': 'getallcourse' },
        dataType: "json",
        encode: true,
        success: function (datas) {
            if (datas.status) {
                $(document).ready(function () {
                    $('#table_body').html(datas.data);
                })

            }
        }

    });
}
function AddCourse() {

    $("#contactForm").submit(function (event) {
        submitForm();
        return false;
    });

    // var validation = validationacadamic();
    // if (validation)
    // {
    //     if($('#active_acadamic_year').is(':checked'))
    //     {
    //         var ac_status = 1;
    //     }
    //     else{ var ac_status =0;}
    $.ajax({
        type: "POST",
        url: '../api/process.php',
        dataType: 'json',
        data: {
            'action': 'AddCourse',
            'data': {
                course_dep: $('#course_dep').val(),
                course_category: $('#course_category').val(),
                course_execution: $('#course_execution').val(),
                course_code: $('#course_code').val(),
                course_name: $('#course_name').val(),
            }
        },
        success: function (result) {

            if (result.status) {
                alert("course added succesfully");
                $(document).ready(function () {

                    // Coding
                    $('#form').modal('hide');

                });

            }
            else {
                alert(result.message);
            }

        }
    });


}
function getdepartments() {
    $.ajax({
        type: "POST",
        url: "../api/rest.php",
        data: { 'action': 'GetallDepartment' },
        dataType: "json",
        encode: true,
    }).done(function (datas) {
        if (datas.status) {
            var count = datas.data.count;
            var data = datas.data.rows;
            $(document).ready(function () {
                for (i = 0; i < count; i++) {
                    $('#course_dep').append($('<option/>', {
                        value: data[i].department_id,
                        text: data[i].department_name
                    }));
                    $('#course_dep').append($('<option/>', {
                        value: data[i].department_id,
                        text: data[i].department_name
                    }));
                }
            });

        }
        else { }
    });
}
