
function addnewcollege() {
 
    // var validate=validation();

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
            alert(result);

            if (result) { alert("New college added successfully"); }
            else { alert("some error occured"); }


            
        }



    })
}
 
function validation()
  {
    //   alert("hii");
    // var id = $('#id').val();
    // Validation
   
    $("#form").validate({
     
        // Rules for form validation
        rules : {
            college_name : {
                required : true
            },
            es_preadmissionid : {
                required : true
            },
            student_name : {
                required : true
            },
            gender : {
                required : true

            },
            hobbies : {
                required : true

            },
            father_name : {
                required : true
                
            },
            exam_name : {
                required : true
            },
            exam_date : {
                required : true
            },
            rollnumber : {
                required : true
            },
            marks_obtained : {
                required : true
            },
            rank : {
                required : true
            }
        },

        // Messages for form validation
        messages : {
            college_name : {
                required : 'Class is required'
            },
            es_preadmissionid : {
                required : 'Studen ID is required'
            },
            student_name : {
                required : 'Student Name is required'
            },
            gender : {
                required : 'Gender is required'

            },
            hobbies : {
                required : 'Branch is required'

            },
            father_name : {
                required : 'Father Name is required'
                
            },
            exam_name : {
                required : 'Exam Name is required'
            },
            exam_date : {
                required : 'Academic Year is required'
            },
            rollnumber : {
                required : 'Roll Number is required'
            },
            marks_obtained : {
                required : 'Marks is required'
            },
            rank : {
                required : 'Rank is required'
            }
        },
    });
  }