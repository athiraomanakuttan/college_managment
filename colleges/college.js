
$(document).ready(function(){
});
function addnewcollege() {
    $.ajax({
         
        url: "../api/process.php",
        method: "post",
        data: {
            "action": "addCollege",
            "datas": {
                collge_name: $('#college_name').val(),
                collge_address: $('#college_address').val(),
                college_phone_no: $('#college_phone_no').val(),
                college_email: $("#college_email").val(),
                college_pwd: $('#college_pwd').val()
            }
        },
        success: function (result) {
            if(result.status)
            {
                alert("success");
                // $.notify(result.message, 'success');
            }
            else
            {  
                alert("not success");
                // $.notify(result.message, 'error');
            }
            
        }



    })
}