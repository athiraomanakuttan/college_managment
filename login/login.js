function userlogin() {
    if ($('#email').val()== '' && $('#password').val() == '')
    {
        alert("user name or password is empty");
    }
    else{
       
    // $.ajax({

    //     url: "../api/process.php",
    //     type: "POST",
    //     data: { "action": "userlogin","datas": { login_email: $('#email').val(),login_password: $('#password').val()}},
    //     success: function (data) {
    //         var type = typeof data;
    //         console.log(type);
    //         console.log(data); return;
    //         if (data instanceof Array)
    //         {
    //             alert("inside");
    //         } 
    //         else{
    //             alert("outside");
    //         }           
    //     }
    // })

        // $.ajax({
        //     url: "../api/process.php",
        //     cache: false,
        //     data: { "action": "userlogin", "datas": { login_email: $('#email').val(), login_password: $('#password').val() } },
        //     type: 'POST',
        //     dataType: "json",
        //     encode: true,
        //     error: function () {
        //         console.log("Request Failed");
        //     },
        //     success: function (data) {
        //         console.log('here');
        //         console.log(data);
        //     },
        //     complete: function () {
        //         console.log("Request finished.");
        //     }
        // });
        var formData = {
            "action": "userlogin",
            "data":{
            login_email: $('#email').val(),
            login_password: $('#password').val() }
        };
        $.ajax({
            type: "POST",
            url: "../api/process.php",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            if(data.status)
            {
                var output = [];
                var output = data.data.rows;
                for (var i = 0; i < 1; i++) {
                    var rollid = output[i].user_login_role_id;
                }
                if (rollid==2)
                {
                    window.location('../home');
                }
            }
            
        });
    

    }
}