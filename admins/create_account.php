
<?php

    include ('../project/db/login_control.php');
    include ('../project/functions/common_functions.php');
    include ('../project/functions/header.php');
    include ('../project/functions/footer.php');
    include ('../project/functions/controllers.php');
    include ('admin_functions.php');

    if (!isAdmin())
    {
      header('location: ../index.php');

    }

    else

    {
            $fname = $_SESSION['user']['first_name'];
            $id = $_SESSION['user']['id'];
            $mname = $_SESSION['user']['middle_name'];
            $role = $_SESSION['user']['user_type'];
            $image = $_SESSION['user']['user_image'];

            if($image != "") {

              $user_image = '<img src="../images/user_images/'.$image.'" class="img-circle elevation-2" alt="User Image">';

            }

             else
              {

                  $gender = $_SESSION['user']['gender'];
                  if ($gender == "Male") {
                     $user_image =  '<img src="../images/system_image/male.png" class="img-circle elevation-2" alt="User Image">';
                  }
                  else{
                      $user_image =  '<img src="../images/system_image/female.png" class="img-circle elevation-2" alt="User Image">';
                  }

            }
          }





//////////////////////////////////////////////



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>BHU Store Management System | Admin Home</title>
  <?php assets(); ?>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar bg-gradient-primary navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-light"></i></a>
      </li>

    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-envelope text-light"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $mes_count; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right mt-2">
          <?php show_message(); ?>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell text-light"></i>
          <span class="badge badge-danger navbar-badge"> <?php echo $not_count; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right mt-2">
          <?php echo show_notifications(); ?>
        </div>
      </li>
      <li>
      <li class="nav-item dropdown">
        <a class="nav-link text-light" data-toggle="dropdown" href="#">
          More
          <i class="fas fa-caret-down text-light"></i>
        </a>
        <div class="mt-2 dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="profile.php">
             <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
               Profile
            </a>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../project/db/logout.php">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
               Logout
              </a>
             </div>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>
      <div class="topbar-divider d-none d-sm-block"></div>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-2">
  <div class="user-panel mb-3 mt-3 d-flex">
        <div class="image p-2 ml-3">
        <?=$user_image?>
       </div>
        <div class="info">
          <a href="profile" class="d-block"><strong class="text-light"><?php echo $fname.'&nbsp'.$mname; ?></strong><br><?php echo $role; ?></a>
        </div>
      </div>
    <!-- Sidebar -->
      <!-- Sidebar Menu -->
      <nav class="ml-2 mr-2">
        <ul class="nav nav-pills  nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="admin_home.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="account.php" class="nav-link active">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Accounts
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="user_list.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User List
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="tools.php" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Tools
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="request_page.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Requests
              </p>
              <?php echo '<span class="badge bg-danger float-right">'.$req_count.'</span>' ?>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="broadcast_message.php" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Message
              </p>
              <?php echo '<span class="badge bg-danger float-right">'.$mes_count.'</span>' ?>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="feedback_lists.php" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
              Feedbacks
              </p>
              <?php echo '<span class="badge bg-danger float-right">'.$req_count.'</span>' ?>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="help.php" class="nav-link">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
                Help
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="../project/db/logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
      </nav>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">Store Management System</h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Create Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

    <div class="card card-primary offset-col-sm-8">
              <div class="card-header">
                <h3 class="card-title"> Create New User Account</h3>
              </div>
              <!-- /.card-header -->

            <form role="form" method="POST" action="create_account.php" enctype="multipart/form-data">

              <div class="card-body">

                <!--Error Message Pane-->
                <?php
                if (isset($msg['reg-errors'])) {
                   echo '<div class="bg-danger pl-3 pt-2 pb-2 mb-4 mt-2  text-center"><i class="fas fa-disabled p-2">'.$msg['reg-errors'].'</i></div>';
                }
                //-Double user Message Pane-->
                if (isset($msg['errors'])) {
                   echo '<div class="bg-danger pl-3 pt-2 pb-2 mb-4 mt-2  text-center"><i class="fas fa-disabled p-2">'.$msg['errors'].'</i></div>';
                }
                //<!--/Error Message Pane-->

                //<!--Success Message Pane-->
                 if (isset($msg['reg-success'])){
                        echo '<div class="bg-success pl-3 pt-2 pb-2 mb-4 mt-2 text-center">'.$msg['reg-success'].'</div>';
                 }
                ?>
                <!--/Success Message Pane-->

                  <div class="row">
                        <div class="col-md-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label class="text-info">User Id</label>
                            <input type="text" name="user_id" class="form-control text-success" placeholder="Enter User ID Here ...">
                            <?php
                                    if (isset($msg['uid-errors'])) {
                                    echo '<div class="text-danger">'.$msg['uid-errors'].'</div>';
                                    }
                                ?>
                          </div>
                        </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="text-info">First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="Enter First Name Here ...">
                            <?php
                                if (isset($msg['fname-errors'])) {
                                    echo '<div class="text-danger">'.$msg['fname-errors'].'</div>';
                                }
                            ?>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="text-info">Middle Name</label>
                        <input type="text" name="mname" class="form-control" placeholder="Enter Middle Name Here...">
                                <?php
                                    if (isset($msg['mname-errors'])) {
                                    echo '<div class="text-danger">'.$msg['mname-errors'].'</div>';
                                    }
                                ?>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="text-info">Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter Last Name Here...">
                                <?php
                                    if (isset($msg['lname-errors'])) {
                                    echo '<div class="text-danger">'.$msg['lname-errors'].'</div>';
                                    }
                                ?>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label class="text-primary">Gender</label>
                        <select name="gender" class="form-control">
                          <option value="">Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                                <?php
                                    if (isset($msg['gender-errors'])) {
                                    echo '<div class="text-danger">'.$msg['gender-errors'].'</div>';
                                    }
                                ?>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label class="text-primary">User Type</label>
                        <select name="role" class="form-control">
                          <option value="">Choose User Type </option>
                          <option value="System Admin">System Admin</option>
                          <option value="Store Manager">Store Manager</option>
                          <option value="Store Keeper">Store Keeper</option>
                          <option value="Store User">Store User</option>
                        </select>
                                <?php
                                    if (isset($msg['role-errors'])) {
                                    echo '<div class="text-danger">'.$msg['role-errors'].'</div>';
                                    }
                                ?>
                      </div>
                    </div>

                  </div>
                  <br>
                    <div class="row">
                      <div class="col-md-4">
                        <!-- text input -->
                        <div class="form-group">
                          <label class="text-info">Region</label>
                          <input type="text" name="region" class="form-control" placeholder="Enter ...">
                                <?php
                                    if (isset($msg['region-errors'])) {
                                    echo '<div class="text-danger">'.$msg['region-errors'].'</div>';
                                    }
                                ?>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <!-- text input -->
                        <div class="form-group">
                          <label class="text-info">Zone</label>
                          <input type="text" name="zone" class="form-control" placeholder="Enter Zone Here...">
                                <?php
                                    if (isset($msg['zone-errors'])) {
                                    echo '<div class="text-danger">'.$msg['zone-errors'].'</div>';
                                    }
                                ?>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <!-- text input -->
                        <div class="form-group">
                          <label class="text-info">Woreda</label>
                          <input type="text" name="woreda" class="form-control" placeholder="Enter Woreda Here...">
                                <?php
                                    if (isset($msg['woreda-errors'])) {
                                    echo '<div class="text-danger">'.$msg['woreda-errors'].'</div>';
                                    }
                                ?>
                        </div>
                      </div>
                    </div>
                    <br>

                  <input type="hidden" name="reg_by" value="$_SESSION['users']['first_name']" />

                    <div class="row">
                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="text-info">Kebele</label>
                        <input type="text" name="kebele" class="form-control" placeholder="Enter Kebele Here...">
                                <?php
                                    if (isset($msg['kebele-errors'])) {
                                    echo '<div class="text-danger">'.$msg['kebele-errors'].'</div>';
                                    }
                                ?>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="text-info">Phone No</label>
                        <input name="phone_no" type="text" class="form-control" placeholder="Enter Phone No Here...">
                                <?php
                                    if (isset($msg['phone-errors'])) {
                                    echo '<div class="text-danger">'.$msg['phone-errors'].'</div>';
                                    }
                                ?>
                      </div>
                    </div>

                    <!--Hidden Input-->

                        <input type="hidden" name="reg_by" value="<?php echo $fname.'&nbsp;'.$mname?>">

                    <!--/Hidden Input-->

                    </div>
                  </div>
                  <div class="card-footer">
                    <button name="cancel" type="reset" class="btn col-sm-2 btn-danger">Cancel</button>
                    <button name="reg_new_user" type="submit" class="btn col-sm-2 btn-info float-right">Register</button>
                </div>
              </div>


          </form>
              <!-- /.card-body -->
        </div>
    </section>

    </section>
    <!-- /.content -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php footer(); ?>
</div>
<!-- ./wrapper -->

<!--Script Plugins-->
<?php scriptPlugin(); ?>
<script>
      $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
