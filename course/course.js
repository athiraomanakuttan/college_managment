function AddCourse()
{
    
    $("#contactForm").submit(function(event){
		submitForm();
		return false;
	});
      
    // var validation = validationacadamic();
    // if (validation)
    // {
    //     if($('#active_acadamic_year').is(':checked'))
    //     {
    //         var ac_status = 1;
    //     }
    //     else{ var ac_status =0;}
        $.ajax({
            type:"POST",
            url:'../api/process.php',
            dataType:'json',
            data: {
                'action':'AddCourse',
                'data':{
            course_dep: $('#Department').val(),
            course_category: $('#course_category').val(),
            course_execution: $('#course_execution').val(),
            course_code: $('#course_code').val(),
            course_name: $('#course_name').val(),
            }
                  },
            success:function(result)
            {
                if(result.status)
                {
                    alert("course added succesfully");
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
        
       
    }
