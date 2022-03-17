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
        data: {
            "action": "userlogin",
            "datas": {
                login_email: $('#email').val(),
                login_password: $('#password').val()
            }
        },
        success: function (result) {
            var type = typeof result;
            console.log(type); return;
            //alert(result); console.log(result); return;
            if(result instanceof Array)
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