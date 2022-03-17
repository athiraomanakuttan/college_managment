function userlogin() {
    if ($('#email').val()== '' && $('#password').val() == '')
    {
        alert("user name or password is empty");
    }
    else{
       
    $.ajax({

        url: "../api/process.php",
        // dataType: "JSON",
        method: "post",
        data: { "action": "userlogin","datas": { login_email: $('#email').val(),login_password: $('#password').val()}},
        success: function (data) {
            var type = typeof data;
            console.log(type);
            console.log(data); return;
            if (data instanceof Array)
            {
                alert("inside");
            } 
            else{
                alert("outside");
            }           
        }



    })

    }
}