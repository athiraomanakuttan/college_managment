function userlogin() {
    if ($('#email').val()== '' && $('#password').val() == '')
    {
        alert("user name or password is empty");
    }
    else{
      
    $.ajax({

        url: "../api/process.php",
        method: "post",
        data: {
            "action": "userlogin",
            "datas": {
                login_email: $('#email').val(),
                login_password: $('#password').val()
            }
        },
        success: function (result) {
            
        }



    })

    }
}