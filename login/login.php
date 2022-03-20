<!DOCTYPE html>
<html lang="en">
   <?php
   include '../sidebar/header.php'
   ?>
<link rel="stylesheet" href="../sidebar/style.css">   
<style type="text/css">
* {
margin: 0px;
padding: 0px;
}

</style>
<body>
    <div class="login">
            <div class="account-login">
               <!-- <h1>Logins</h1> -->
               <form  id="formValidate" class="login-form">
                  <div class="form-group">
                     <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <input type="password" name="password" id="password" placeholder="Password"  class="form-control" required>
                  </div>
                  <div class="remember">
                     <label class="custom-checkbox">Remember me
                     <input type="checkbox">
                     <span class="checkmark"></span>
                     </label>
                     <a href="#" class="pull-right">Forgot Password?</a>
                  </div>
                  <div class="error"><?php if (isset($login_error)){echo $login_error;}?></div>
                  <button type="button"  class="btn" name="login" id="login" onclick="userlogin()">Login</button>
                  <p>Are you new?<a href="#">Sign Up</a></p>
               </form>
            </div>
        </div>
   </body>

   <?php
   include '../sidebar/footer.php'
   ?>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="login.js"></script>

   <!-- <script type="text/javascript">
  // Validation
  $(function() {
    // var id = $('#id').val();
    // Validation
    $("#formValidate").validate({

      // Rules for form validation
      rules : {
        title : {
          email : true
        },
        password : {
          required : true,
         
        }
      },

      // Messages for form validation
      messages : {
        email : {
          required : 'Email required'
        },
        password : {
          required : 'Password required',
          
        }
      }
    });

  });
</script> -->
</html>