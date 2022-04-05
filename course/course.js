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
function AddCourse()
{
    
    $("#contactForm").submit(function(event){
		submitForm();
		return false;
	});
      
    var validation = validateCourse();
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
            success:function(result)
            {
                    
                if(result.status)
                {
                    alert("course added succesfully");
                    $(document).ready(function()
                    {
                        
                            // Coding
                            $('#form').modal('toggle');
                        
                    });
                    
                }
                else{
                    alert(result.message);
                }
               
            }      
        });
        $('document').ready(function () {
            // $('#formedit').modal('hide');
            $('#form').modal('toggle');
            // alert("jooo");
        });
        getcourse()
        
       
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
                    for(i=0; i<count; i++)
                    {
                        $('#course_dep').append($('<option/>', {
                            value: data[i].department_id,
                            text: data[i].department_name
                        }));
                        $('#editcourse_dep').append($('<option/>', {
                            value: data[i].department_id,
                            text: data[i].department_name
                        }));
                    }
                });

            }
            else { }
        });
    }
    function disablecourse(course_id)
{
    // alert(course_id);
    if (course_id == '') {
        alert("some error occured"); return;
    }
    else {
        $.ajax({
            type: "POST",
            url: '../api/process.php',
            dataType: 'json',
            data: {
                'action': 'ChangestatusCourse',
                'data': {
                    course_id: course_id,
                    status: 0
                }
            },
            success: function (result) {
                if (result.status) {
                    alert("succesfully disabled Programmes");
                }
                else {
                    alert(result.message);
                }
            }
        });
        getcourse();
    }
    
    
}
function enablecourse(course_id)
{
    // alert(course_id);

    if (course_id == '') {
        alert("some error occured"); return;
    }
    else {
        $.ajax({
            type: "POST",
            url: '../api/process.php',
            dataType: 'json',
            data: {
                'action': 'ChangestatusCourse',
                'data': {
                    course_id: course_id,
                    status: 1
                }
            },
            success: function (result) {
                if (result.status) {
                    alert("succesfully disabled Programmes");
                }
                else {
                    alert(result.message);
                }
            }
        });
        getcourse();
    }
}
    function deletecourse(course_id)
{
    alert(course_id);


    if (course_id == '') {
        alert("some error occured"); return;
    }
    else {
        $.ajax({
            type: "POST",
            url: '../api/process.php',
            dataType: 'json',
            data: {
                'action': 'ChangestatusCourse',
                'data': {
                    course_id: course_id,
                    status: -1
                }
            },
            success: function (result) {
                if (result.status) {
                    alert("succesfully deleted Programmes");
                }
                else {
                    alert(result.message);
                }
            }
        });
        getcourse();
    }
}

function editcourse(course_id)
{
    $('document').ready(function () {
        $('#form').modal('toggle');
        $('#formedit').modal('show');
    });
    $.ajax({
        type: "POST",
        url: '../api/process.php',
        dataType: 'json',
        data: {
            'action': 'updatecourse',
            'data': {
                course_id: course_id
            }
        },
        success: function (result) {
            console.log(result);
            if (result.status) {
                i=0;
                data = result.data.rows[i];
                console.log(data);
                $('#editcourse_dep').val(data.department_id);
                
                $('#editcourse_category').val(data.course_category);
                $('#editcourse_execution').val(data.course_execution);
                $('#editcourse_code').val(data.course_code);
                $('#editcourse_name').val(data.course_name);
                $('#course_id').val(course_id);
                status: 1;
            }
            else {
                alert(result.message);
            }
        }
    });
    
}
function updateCourse()
{
    $.ajax({
        type: "POST",
        url: '../api/process.php',
        dataType: 'json',
        data: {
            'action': 'updatingCourse',
            'data': {
                course_dep: $('#editcourse_dep').val(),
                course_category: $('#editcourse_category').val(),
                course_execution: $('#editcourse_execution').val(),
                course_code: $('#editcourse_code').val(),
                course_name: $('#editcourse_name').val(),
                course_id: $('#course_id').val(),
                status: 1
            }
        },
        success: function (result) {
            if (result.status) {
                alert("update department succesfully");
            }
            else {
                alert(result.message);
            }
        }
    });
    $('document').ready(function () {
        // $('#formedit').modal('hide');
        $('#formedit').modal('toggle');
        // alert("jooo");
    });
    getcourse();
}
    function validateCourse()
{
    var course_dep = $('#course_dep').val();
    var course_category = $('#course_category').val();
    var course_execution = $('#course_execution').val();
    var course_code = $('#course_code').val();
    var course_name = $('#course_name').val();
    if(course_dep=='' || course_category==null || course_execution==null ||course_code==null ||course_name==null)
    {
        alert("Fill all the required fields");
        return false;
    }
    else{
        return true;
    }
}
