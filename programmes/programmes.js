getdepartments();
getprogramme();
function getprogramme()
{
    $.ajax({
        type: "POST",
        url: "../api/rest.php",
        data: { 'action': 'getallprograme' },
        dataType: "json",
        encode: true,
        success:function(datas)
        {
            if(datas.status)
            {
                $(document).ready(function(){
                    $('#programme_body').html(datas.data);
                })
              
            }
        }

    });
}
function disableprogramme(programme_id)
{
    if (programme_id == '') {
        alert("some error occured"); return;
    }
    else {
        $.ajax({
            type: "POST",
            url: '../api/process.php',
            dataType: 'json',
            data: {
                'action': 'ChangestatusProgramme',
                'data': {
                    programme_id: programme_id,
                    programme_status: 0
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
        getprogramme();
    }
    
    
}
function enableprogramme(programme_id)
{

    if (programme_id == '') {
        alert("some error occured"); return;
    }
    else {
        $.ajax({
            type: "POST",
            url: '../api/process.php',
            dataType: 'json',
            data: {
                'action': 'ChangestatusProgramme',
                'data': {
                    programme_id: programme_id,
                    programme_status: 1
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
        getprogramme();
    }
}
function deleteprogramme(programme_id)
{

    if (programme_id == '') {
        alert("some error occured"); return;
    }
    else {
        $.ajax({
            type: "POST",
            url: '../api/process.php',
            dataType: 'json',
            data: {
                'action': 'ChangestatusProgramme',
                'data': {
                    programme_id: programme_id,
                    programme_status: -1
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
        getprogramme();
    }
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
                    $('#programme_department').append($('<option/>', {
                        value: data[i].department_id,
                        text: data[i].department_name
                    }));
                    $('#edit_programme_department').append($('<option/>', {
                        value: data[i].department_id,
                        text: data[i].department_name
                    }));
                }
            });

        }
        else { }
    });
}
function AddProgramme()
{
    var validation=validateprogramme();
    if(validation)
    {
        $.ajax({
            type:"POST",
            url:'../api/process.php',
            dataType:'json',
            data:{
                'action':'addprogramme',
                'data':{
                    programme_name: $('#programme_name').val(),
                    programme_department: $('#programme_department').val(),
                    programme_type: $('#programme_type').val(),
                    programme_status:1
                }
            },
            success: function (datas) {
                if(datas.status)
                {
                    alert(datas.message);
                }
                else
                {
                    alert(datas.message);
                }
            } 

        });
        
    }
    $('document').ready(function () {
        // $('#formedit').modal('hide');
        $('#form').modal('toggle');
        // alert("jooo");
    });
    getprogramme();
    
   
}
function editprogramme(programme_id)
{
    $('document').ready(function () {
        $('#formedit').modal('show');
    });
    $.ajax({
        type: "POST",
        url: '../api/process.php',
        dataType: 'json',
        data: {
            'action': 'updateProgramme',
            'data': {
                programme_id: programme_id
            }
        },
        success: function (result) {
            if (result.status) {
                i = 0;
                data = result.data.rows[i];
                console.log(data);
                $('#edit_programme_name').val(data.programme_name);
                $('#edit_programme_department').val(data.department_id);
                $('#edit_programme_type').val(data.programme_type);
                $('#programme_id').val(programme_id);
            }
            else {
                alert(result.message);
            }
        }
    });
    
}
function updatingprogramme()
{
    $.ajax({
        type: "POST",
        url: '../api/process.php',
        dataType: 'json',
        data: {
            'action': 'updatingprogramme',
            'data': {
                programme_id: $('#programme_id').val(),
                programme_name: $('#edit_programme_name').val(),
                programme_department: $('#edit_programme_department').val(),
                programme_type: $('#edit_programme_type').val(),
                programme_status: 1
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
    getprogramme();
}
function validateprogramme()
{
    var programme_name = $('#programme_name').val();
    var programme_department = $('#programme_department').val();
    var programme_type = $('#programme_type').val();
    if(programme_name=='' || programme_department==null || programme_type==null)
    {
        alert("Fill all the required fields");
        return false;
    }
    else{
        return true;
    }
}