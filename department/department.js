getdepartments(1); 
function getdepartments(page_number) {
    $.ajax({
        type: "POST",
        url: "../api/rest.php",
        data: { 'action': 'GetDepartment', 'page_no': page_number },
        dataType: "json",
        encode: true,
    }).done(function (datas) {
        console.log(datas);
        if (datas.status) {
            $(document).ready(function () {
                $('#table_body').html(datas.data);
                $('#pages').html(datas.pagination);
            });

        }
        else { }
    });
}
function AddDepartment() {
    var validation = validationdepartment();
    if (validation) {
        $.ajax({
            type: "POST",
            url: '../api/process.php',
            dataType: 'json',
            data: {
                'action': 'AddDepartment',
                'data': {
                    department_name: $('#department_name').val(),
                    department_nature: $('#department_nature').val(),
                    department_type: $('#department_type').val(),
                    department_status: 1
                }
            },
            success: function (result) {
                if (result.status) {
                    alert("acadamic year added succesfully");
                }
                else {
                    alert(result.message);
                }
            }
        });
        getdepartments();
    }
}
function disabledepartment(department_id)
{
    if(department_id=='')
    {
        alert("some error occured"); return;
    }
    else
    {
        $.ajax({
            type: "POST",
            url: '../api/process.php',
            dataType: 'json',
            data: {
                'action': 'ChangestatusDepartment',
                'data': {
                    department_id: department_id,
                    department_status: 0
                }
            },
            success: function (result) {
                if (result.status) {
                    alert("succesfully disabled department");
                }
                else {
                    alert(result.message);
                }
            }
        });
        getdepartments();
    }
}
function enabledepartment(department_id) {
    if (department_id == '') {
        alert("some error occured"); return;
    }
    else {
        $.ajax({
            type: "POST",
            url: '../api/process.php',
            dataType: 'json',
            data: {
                'action': 'ChangestatusDepartment',
                'data': {
                    department_id: department_id,
                    department_status: 1
                }
            },
            success: function (result) {
                if (result.status) {
                    alert("succesfully enabled department");
                }
                else {
                    alert(result.message);
                }
            }
        });
        getdepartments();
    }
}
function deletedepartment(department_id) {
    if (department_id == '') {
        alert("some error occured"); return;
    }
    else {
        $.ajax({
            type: "POST",
            url: '../api/process.php',
            dataType: 'json',
            data: {
                'action': 'ChangestatusDepartment',
                'data': {
                    department_id: department_id,
                    department_status: -1
                }
            },
            success: function (result) {
        if (result.status) {
                    $.notify(result.message, 'success'); 
                }
                else {
                    alert(result.message);
                }
                location.reload();
            }
        });
        getdepartments();
    }
}
function editdepartment(department_id)
{
    $('document').ready(function () {
        $('#formedit').modal('show');
            });
    $.ajax({
        type: "POST",
        url: '../api/process.php',
        dataType: 'json',
        data: {
            'action': 'updateDepartment',
            'data': {
                department_id: department_id,
                
            }
        },
        success: function (result) {
            if (result.status) {
                i=0;
                data = result.data.rows[i];
                console.log(data);
                $('#edit_department_name').val(data.department_name);
                $('#edit_department_nature').val(data.department_nature);
                $('#edit_department_type').val(data.department_type);
                $('#department_id').val(department_id);
            }
            else {
                alert(result.message);
            }
        }
    });
}
function updateDepartment()
{
    $.ajax({
            type: "POST",
            url: '../api/process.php',
            dataType: 'json',
            data: {
                'action': 'updatingdepartment',
                'data': {
                    department_id:$('#department_id').val(),
                    department_name: $('#edit_department_name').val(),
                    department_nature: $('#edit_department_nature').val(),
                    department_type: $('#edit_department_type').val(),
                    department_status: 1
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
    $('#formedit').modal('toggle');
});
getdepartments();
}
function validationdepartment() {
    var department_name = $('#department_name').val();
    var department_nature = $('#department_nature').val();
    var department_type = $('#department_type').val();
    if (department_name == '' || department_nature == 0 || department_type ==0) {
        alert('Fill all required fields');
        return false;
    }
    return true;

}
