<!DOCTYPE html>
<html lang="en">
<?php
 include '../sidebar/header.php'; 
 include '../sidebar/footer.php'; 
 include '../api/db/connection.php';
 ?>
  <script src="programmes.js"></script>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">   
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"> </script>  
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" > 
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../home/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../home/index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../home/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../home/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../home/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- SidebarSearch Form -->
      <?php
       include '../sidebar/sidebar.php';
       ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Dashboard</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../home/index.php">Home</a></li>
              <li class="breadcrumb-item active">Acadamic year</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      
<body>  
  
  
<div class="container-fluid"> 
  <h3>Programmes batch <i class="fa-solid fa-rotate-right pr-3 pl-3 " onclick="getprogrammes()"></i><i class="fa-solid fa-plus text-primary" data-target="#form" data-toggle="modal"></i></h3> 
  <div class="row" >  
    <div class="col-12">  
      <table class="table table-striped table-bordered table-hover" width="100%" class="table table-bordered table-hover dt-responsive" >  
        <thead class="bg-primary">  
          <tr>  
            <th data-class="expand">NAME </th>  
            <th data-class="expand">Depatment</th>  
            <th data-class="expand">UG/PG</th> 
            <th data-class="expand"> D</th>  
            <th data-class="expand"> S</th>  
            <th data-class="expand"> M</th>  
          </tr>  
        </thead>
        <tbody id='programme_body' >

        </tbody>
        <tfoot>  
          
     </tfoot>  
      </table> 
    </div>  
  </div>  
</div>  
<div class="modal fade " id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded " role="document" >
    <div class="modal-content">
      <div class="modal-header border-bottom-0 bg-primary" >
        <h5 class="modal-title" id="exampleModalLabel" >Add programme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form">
      <div class="modal-body">
          <div class="row">
              <div class="col-12">
                <div class="form-group">
                 <label for="college_name">Programme Name</label>
                 <input type="text" class="form-control" id="programme_name" name="programme_name" aria-describedby="emailHelp" placeholder="Programme Name">
               </div>  
            </div>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                 <label for="college_name"> Department</label>
                 <select name="programme_department" id="programme_department"  class="form-control">
                     <option value="0" selected disabled>Programme department</option>
                 </select>
               </div>  
            </div>
          </div> 
           <div class="row">
              <div class="col-12">
                <div class="form-group">
                 <label for="college_name">UG/PG</label>
                 <select name="programme_type" id="programme_type"  class="form-control">
                     <option value="0" selected disabled>UG / PG</option>
                     <option value="1">UG </option>
                     <option value="2">PG</option>
                 </select>
                 </div>  
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
                          <button class="btn btn-success" name="add" type="button" value="add" onclick="AddProgramme()">
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
<div class="modal fade " id="formedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded " role="document" >
    <div class="modal-content">
      <div class="modal-header border-bottom-0 bg-primary" >
        <h5 class="modal-title" id="exampleModalLabel" >A</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form">
      <div class="modal-body">
          <div class="row">
              <div class="col-12">
                <div class="form-group">
                 <label for="college_name">Department Name</label>
                 <input type="text" class="form-control" id="edit_department_name" name="edit_department_name" aria-describedby="emailHelp" placeholder="Department Name">
               </div>  
            </div>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                 <label for="college_name"> Nature</label>
                 <select name="edit_department_nature" id="edit_department_nature"  class="form-control">
                     <option value="0" selected disabled>Department Nature</option>
                     <option value="1">Aided</option>
                     <option value="2">Self finance</option>
                 </select>
               </div>  
            </div>
          </div> 
           <div class="row">
              <div class="col-12">
                <div class="form-group">
                 <label for="college_name">Type</label>
                 <select name="edit_department_type" id="edit_department_type"  class="form-control">
                     <option value="0" selected disabled>Department Type</option>
                     <option value="1">Teaching </option>
                     <option value="2">Non Teaching</option>
                 </select>
                 </div>  
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
                          <input type="hidden" id="department_id">
                          <button class="btn btn-success" name="update" type="button" value="update" onclick="updateDepartment()">
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
<script>  
$('table').DataTable();  
</script>  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?php
 include '../sidebar/footer.php'; 
?>
</body>

</html>
