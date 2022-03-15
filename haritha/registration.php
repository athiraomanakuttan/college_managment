<head>
  <?php 
  include '../sidebar/header.php';
  ?>
  
</head>

<div class="container">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form" >
    Registration
  </button>  
</div>

<div class="modal fade " id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded " role="document" >
    <div class="modal-content">
      <div class="modal-header border-bottom-0 bg-primary" >
        <h5 class="modal-title" id="exampleModalLabel" >Create Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form">
      <div class="modal-body">
          <div class="row">
              <div class="col-6">
                <div class="form-group">
                 <label for="college_name">College Name</label>
                 <input type="text" class="form-control" id="college_name" name="college_name" aria-describedby="emailHelp" placeholder="Enter college Name">
               </div>  
            </div>
            <div class="col-6">
             <div class="form-group">
             <label for="phone_no">Phone Number</label>
             <input type="Number" class="form-control" id="college_phone_no" name="college_phone_no" placeholder="Enter Phone no">
          
           </div>
            </div>
          </div>
          <div class="row">
              <div class="col-6">
                <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" id="email" name="College_email" placeholder="Enter Email">
              </div>  
            </div>
            <div class="col-6">
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="college_pwd" name="college_pwd" placeholder="Enter Password">
           </div>
          </div>
        </div>
          <div class="row">
              <div class="col-6">
                <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" id="college_con_pwd" name="college_con_pwd" placeholder="Enter confirm Password">
               </div>  
            </div>
            <div class="col-6">
            <div class="form-group">
            <label for="Address">Address</label>
            <textarea class="form-control" name="college_address" placeholder="Enter Address" id="college_address" style="height: 40px;"></textarea>
            
          </div>
          </div>
          <div class="form-actions">
                      <div class="row">
                        <div class="col-md-12" style="margin-left: 340px;" >
                          <button class="btn btn-primary" type="reset" name="reset">
                            Reset
                          </button>
                          <button class="btn btn-success" name="add" type="button" value="add" onclick="addnewcollege()">
                            Submit
                          </button>
                        
                        </div>
                      </div>
                    </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
  // Validation
  $(function() {
  
    // Validation
    $("#form").validate({
            alert("hellooo");

      // Rules for form validation
      rules : {
        college_name: {
          required : true
        },
        college_address : {
          required : true
        },
                college_phone_no : {
          required : true
        },
                college_email: {
          required : true
        },
                college_pwd : {
          required : true
        },
                college_con_pwd : {
          required : true
        },
      },

      // Messages for form validation
      messages : {
        college_name : {
          required : 'College Name is required'
        },
        student_name : {
          required : 'Student Name is required'
        }
      },
    });

  });
    </script>