getdepartments();
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