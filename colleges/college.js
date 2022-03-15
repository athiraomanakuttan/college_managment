
$(document).ready(function(){
});
function addcollege() {
    alert($('college_name').val());
    $.ajax({

        url: "../api/process.php",
        method: "post",
        data: {
            "action": "addCollege",
            "datas": {
                collge_name: $('college_name').val(),
                collge_address: $('college_address').val(),
                college_phone_no: $('college_phone_no').val(),
                college_email: $('college_email').val(),
                college_pwd: $('college_pwd').val()
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
}