<head>
  <?php 
  
  include '../sidebar/header.php';
  include '../sidebar/footer.php';
  
  ?>
<script src="acadamicyear.js"></script>
<script src="http://notifyjs.com/dist/notify-combined.min.js"></script>
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
        <h5 class="modal-title" id="exampleModalLabel" >Acadamic Year</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form">
      <div class="modal-body">
          <div class="row">
              <div class="col-6">
                <div class="form-group">
                 <label for="college_name">Name</label>
                 <input type="text" class="form-control" id="acadamic_name" name="acadamic_name" aria-describedby="emailHelp" placeholder="Acadamic year Name">
               </div>  
            </div>
            <div class="col-6">
             <div class="form-group">
             <label for="phone_no">Description</label>
             <input type="text" class="form-control" id="acadamic_desc" name="acadamic_desc" placeholder="Acadamic year discription">
          
           </div>
            </div>
          </div>
          <div class="row">
              <div class="col-6">
                <div class="form-group">
                <label for="Email">From</label>
                <input type="date" class="form-control" id="acadamic_start_date" name="acadamic_start_date" >
              </div>  
            </div>
            <div class="col-6">
            <div class="form-group">
            <label for="password">To</label>
            <input type="date" class="form-control" id="acadamic_end_date" name="acadamic_end_date" >
           </div>
          </div>
        </div>
        <div class="row">
            <div class="col-6">
            <div class="">
                <input type="checkbox" class="" id="active_acadamic_year">
                <label class="form-check-label" for="active_acadamic_year">Active</label>
           </div>
          </div>
        </div>
          <div class="row">
            
          <div class="form-actions">
                      <div class="row">
                        <div class="col-md-12" style="margin-left: 340px;" >
                          <button class="btn btn-primary" type="reset" name="reset">
                            Reset
                          </button>
                          <button class="btn btn-success" name="add" type="button" value="add" onclick="AddAcadamicYear()">
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
  
 