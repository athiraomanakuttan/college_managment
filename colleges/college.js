
function addnewcollege() {
 
    var validate=validateform();
    if(validate){
    $.ajax({
         
        url: "../api/process.php",
        method: "POST",
        data: {
            "action": "addCollege",
            "data": {
                collge_name: $('#college_name').val(),
                collge_address: $('#college_address').val(),
                college_phone_no: $('#college_phone_no').val(),
                college_email: $("#college_email").val(),
                college_pwd: $('#college_pwd').val()
            }
        },
        success: function (result) {
            if (result) { alert("New college added successfully"); }
            else { alert("some error occured"); }


            
        }



    }) }
}
 
function validateform()
{
    var college_name = $('#college_name').val();
    var college_phone_no = $('#college_phone_no').val();
    var college_email = $('#college_email').val();
    var college_pwd = $('#college_pwd').val();
    var college_con_pwd = $('#college_con_pwd').val();
    var college_address = $('#college_address').val();
    var phone_lenth = college_phone_no.length;
    var email_patten = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (college_name == '' || college_phone_no == null || college_email == '' || college_pwd == '' || college_con_pwd == '' || college_address=='')
    {
        alert("Please fill required fields"); 
        return false;
    }
    else if (!($.isNumeric(college_phone_no)) || (phone_lenth > 10 || phone_lenth < 10)) {
        alert("not a valid phone number");
        return false;
    }
    else if (!(email_patten.test(college_email)))
    {
        alert("not a valid email");
        return false;
    }
    else if(!(college_con_pwd===college_pwd))
    {
        alert("password and confirm password must be same");
        return false
    }
    else {
        
        return true;
    }
}