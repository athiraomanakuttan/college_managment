getacadamicyear();
    function getacadamicyear() {
     $('.hi').append('athira');
        $.ajax({
            type: "POST",
            url: "../api/rest.php",
            data: { 'action': 'GetAcadamicYear' },
            dataType: "json",
            encode: true,
        }).done(function (datas) {
            if(datas.status)
            {
                $(document).ready(function(){
                $('#table_body').html(datas.data);
                });
                
            }
            else
            {  }
        });
}
function AddAcadamicYear()
{
    
    $("#contactForm").submit(function(event){
		submitForm();
		return false;
	});
      
    var validation = validationacadamic();
    if (validation)
    {
        if($('#active_acadamic_year').is(':checked'))
        {
            var ac_status = 1;
        }
        else{ var ac_status =0;}
        $.ajax({
            type:"POST",
            url:'../api/process.php',
            dataType:'json',
            data: {
                'action':'AddAcadamicYear',
                'data':{
            acadamic_name: $('#acadamic_name').val(),
            acadamic_desc: $('#acadamic_desc').val(),
            acadamic_start_date: $('#acadamic_start_date').val(),
            acadamic_end_date: $('#acadamic_end_date').val(),
            acadamic_status: ac_status}
                  },
            success:function(result)
            {
                if(result.status)
                {
                    alert("acadamic year added succesfully");
                    $(document).ready(function()
                    {
                        
                            // Coding
                            $('#form').modal('hide');
                        
                    });
                    
                }
                else{
                    alert(result.message);
                }
               
            }      
        });
        $('document').ready(function () {
            // $('#formedit').modal('hide');
            $('#form').modal('toggle');
            // alert("jooo");
        });
        
        getacadamicyear();
    }
}
function validationacadamic()
{
    var acadamic_name = $('#acadamic_name').val();
    var acadamic_start_date = $('#acadamic_start_date').val();
    var acadamic_end_date = $('#acadamic_end_date').val();
    var dateFormat ='/^(?=\d)(?:(?:31(?!.(?:0?[2469]|11))|(?:30|29)(?!.0?2)|29(?=.0?2.(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(?:\x20|$))|(?:2[0-8]|1\d|0?[1-9]))([-.\/])(?:1[012]|0?[1-9])\1(?:1[6-9]|[2-9]\d)?\d\d(?:(?=\x20\d)\x20|$))?(((0?[1-9]|1[012])(:[0-5]\d){0,2}(\x20[AP]M))|([01]\d|2[0-3])(:[0-5]\d){1,2})?$/';
    if (acadamic_name == '' || acadamic_start_date == '' || acadamic_end_date=='')
    { alert('Fill all required fields');
        return false; }
    return true; 

}
function deleteAcadamicyr(acadamic_year_id) {
       $.ajax({
           type: "POST",
           url: "../api/process.php",
           dataType: "json",
           data: { 'action': 'changestatusAcadamicYear',
           'data': {
            acadamic_year_id: acadamic_year_id,
            acadamic_year_status: -1
        }
        
         },
         success: function (result) {
            if (result.status) {
                alert("succesfully deleted department");
            }
            else {
                alert(result.message);
            }
        } 
         
       });
       $(document).ready(function(){
        getacadamicyear();
       });
       

}
function enableAcadamicyr(acadamic_year_id) {
    $.ajax({
        type: "POST",
        url: "../api/process.php",
        dataType: "json",
        data: { 'action': 'changestatusAcadamicYear',
        'data': {
         acadamic_year_id: acadamic_year_id,
         acadamic_year_status: 1
     }
     
      },
      success: function (result) {
         if (result.status) {
             alert("succesfully enabled department");
         }
         else {
             alert(result.message);
         }
     } 
      
    });
    getacadamicyear();

}
function disableAcadamicyr(acadamic_year_id) {
    $.ajax({
        type: "POST",
        url: "../api/process.php",
        dataType: "json",
        data: { 'action': 'changestatusAcadamicYear',
        'data': {
         acadamic_year_id: acadamic_year_id,
         acadamic_year_status: 0
     }
     
      },
      success: function (result) {
         if (result.status) {
             alert("succesfully disabled department");
         }
         else {
             alert(result.message);
         }
     } 
      
    });
    getacadamicyear();

}
function editAcadamicyr(acadamic_year_id)
{
    $('document').ready(function () {
        $('#form').modal('toggle');
        $('#editform').modal('show');
    });
    
    $('document').ready(function () {
        $('#editform').modal('show');
            });
            $.ajax({
                type: "POST",
                url: '../api/process.php',
                dataType: 'json',
                data: {
                    'action': 'selectAcademic',
                    'data': {
                        acadamic_year_id: acadamic_year_id,
                        
                    }
                },
                success: function (result) {
                    if (result.status) {
                        i=0;
                        data = result.data.rows[i];
                        console.log(data);
                        $('#edit_acadamic_name').val(data.acadamic_year_name);
                        $('#edit_acadamic_desc').val(data.acadamic_year_desc);
                        $('#edit_acadamic_start_date').val(data.acadamic_year_start_date);
                        $('#edit_acadamic_end_date').val(data.acadamic_year_end_date);
                        $('#acadamic_year_id').val(acadamic_year_id);
                    }
                    else {
                        alert(result.message);
                    }
                }
            });
            
}
function updateacademic()
{
   
    $.ajax({
        type: "POST",
        url: '../api/process.php',
        dataType: 'json',
        data: {
            'action': 'updateacademic',
            'data': {
                acadamic_year_id:$('#acadamic_year_id').val(),
                acadamic_year_name: $('#edit_acadamic_name').val(),
                acadamic_year_desc: $('#edit_acadamic_desc').val(),
                acadamic_year_start_date: $('#edit_acadamic_start_date').val(),
                acadamic_year_end_date: $('#edit_acadamic_end_date').val(),
                acadamic_year_status: 1
            }
        },
        success: function (result) {
            if (result.status) {
                alert("update department succesfully");
            }
            else {
                alert(result.message);
            }
        }
}); 
$('document').ready(function () {
    // $('#formedit').modal('hide');
    $('#editform').modal('toggle');
    // alert("jooo");
});
getacadamicyear();
}
