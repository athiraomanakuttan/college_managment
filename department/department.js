getdepartments(); 
function getdepartments() {
    $.ajax({
        type: "POST",
        url: "../api/rest.php",
        data: { 'action': 'GetDepartment' },
        dataType: "json",
        encode: true,
    }).done(function (datas) {
        if (datas.status) {
            $(document).ready(function () {
                $('#table_body').html(datas.data);
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
        getacadamicyear();
    }
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
