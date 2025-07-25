<head>
  <?php 
  
  include '../sidebar/header.php';
  include '../sidebar/footer.php';
  
  ?>
<script src="college.js"></script>
<!-- <script src="http://notifyjs.com/dist/notify-combined.min.js"></script> -->
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
             <input type="Number" class="form-control" id="college_phone_no" name="college_phone_no" maxlength="10" placeholder="Enter Phone no">
          
           </div>
            </div>
          </div>
          <div class="row">
              <div class="col-6">
                <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" required id="college_email" name="college_email" placeholder="Enter Email" >
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
                          <button class="btn btn-success" name="add" type="button" value="add" onclick=" return addnewcollege()">
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

<?php 
  include '../sidebar/footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
  
 