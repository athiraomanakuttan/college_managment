$(document).ready(function(){
function addnewcollege()
{
    //validation goes here
    $.confirm({
        title: 'Confirm!',
        animation: 'top',
        content: 'Do You Want to Add College!',
        confirm: function () {

            $.ajax({

                url: "../api/process.php",
                method: "post",
                data: {
                    "action": "addCollege",
                    "data": {
                        "collge_name": $('collge_name').val(),
                        "collge_address": $('collge_address').val(),
                        "college_phone_no": $('college_phone_no').val(),
                        "college_email": $('college_email').val(),
                        "college_pwd": $('college_pwd').val()
                    }
                },
                success: function (result) {
                    // data = handleJsonData(result);
                    // if (data.status) {
                    //     getIndustyId();
                    //     $.notify(data.message, 'success');
                    //     }
                    // else {
                    //     $.notify(data.message, 'error');
                    // }
                }



            })



        },
        cancel: function () {
            //   $.alert('Canceled!')
        },
        confirmButtonClass: "btn-danger",
        cancelButtonClass: "btn-default",

    });
}
});