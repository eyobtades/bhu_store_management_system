<?php

    include ('../project/db/login_control.php');
    include ('../project/functions/common_functions.php');
    include ('../project/functions/header.php');
    include ('../project/functions/footer.php');
    include ('admin_functions.php');

    if (!isAdmin())
    {
      header('location: ../index.php');

    }
    else{
      $fname = $_SESSION['user']['first_name'];
      $mname = $_SESSION['user']['middle_name'];
      $role = $_SESSION['user']['user_type'];
      $image = $_SESSION['user']['user_image'];
      if ($image == "") {
        $gender = $_SESSION['user']['gender'];
        if ($gender == "Male") {
           $user_image =  '<img src="../images/system_image/male.png" class="img-circle elevation-2" alt="User Image">';
        }
        else{
            $user_image =  '<img src="../images/system_image/female.png" class="img-circle elevation-2" alt="User Image">';
        }
      }
      else {
        $user_image = $image;
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
            <a class="dropdown-item" href="profile.php?id='<?php $id; ?>'">
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
          <a href="profile" class="d-block"><strong><?php echo $fname.'&nbsp'.$mname; ?></strong><br><?php echo $role; ?></a>
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
            <a href="account.php" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Accounts
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="user_list.php" class="nav-link active">
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
              <li class="breadcrumb-item active">Control Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-flood">
      <?php
      
        if (isset($_GET['uid'])) {
          
            $user = mysqli_real_escape_string($con,$_GET['uid']);

              $sel_user = mysqli_query($con,"SELECT * FROM user_informations INNER JOIN user_accounts ON user_informations.id = user_accounts.id  WHERE user_informations.user_id`= '$user' LIMIT 1");

              if ($sel_user) {
               
                  while ( $nrow = mysqli_fetch_array($sel_user)) {

                      $use_id = $nrow['id'];
                      $user_id_no = $nrow['user_id'];
                      $user_fn = $nrow['first_name'];
                      $user_mn = $nrow['middle_name'];
                      $user_ln = $nrow['last_name'];
                      $user_gender = $nrow['gender'];
                      $user_role = $nrow['user_type'];
                      $user_region = $nrow['region'];
                      $user_zone = $nrow['zone'];
                      $user_woreda = $nrow['woreda'];
                      $user_kebele = $nrow['kebele'];
                      $user_phone = $nrow['phone_no'];
                      $user_username = $nrow['username'];
                      $user_password = $nrow['password'];
                      $acc_stat = $nrow['user_status'];
                      $reg_by = $nrow['reg_by'];
                      $reg_date = $nrow['reg_date'];

                 

      ?>  
      <div class="row">
          <div class="col-md-6">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <div class="widget-user-image">
                  <?=$user_image?>     
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?=$user_fn.'&nbsp;'.$user_mn.'&nbsp;'.$user_ln?></h3>
                <h5 class="widget-user-desc"><?=$user_role?> <a href="" class="btn float-right btn-warning">Upload Photo</a></h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <div class="nav-link">
                    <strong>ID No:</strong> <span class="float-right"><?=$user_id_no?> </span>
                    </div>
                  </li>
                  <li class="nav-item">
                    <div class="nav-link">
                    <strong>Username:</strong> <span class="float-right"><?=$user_name?> </span>
                    </div>
                  </li>
                  <li class="nav-item">
                    <div class="nav-link">
                      <strong>Password:</strong> <span class="float-right"><?=$password?> </span>
                    </div>
                  </li>
                  <li class="nav-item">
                    <div class="nav-link">
                    <strong>Registered by:</strong> <span class="float-right"><?=$reg_by?> </span>
                    </div>
                  </li>
                  <li class="nav-item">
                    <div class="nav-link">
                    <strong>Registered Date:</strong> <span class="float-right"><?=$reg_date?> </span>
                    </div>
                  </li>
                  <li class="nav-item">
                    <div class="nav-link">
                    <strong>Account Status: </strong><span class="float-right badge badge-success"><?=$acc_stat?> </span>
                    </div>
                  </li class="nav-item">
                  <li>
                  </li>
                </ul>
              </div>
              <div class="card-footer">
                <a href="view_user.php?eid=<?=$use_id?>" class="btn btn-primary text-light float-left">Update</a>
                <button href="view_user.php?did=<?=$use_id?>" type="button" data-toggle="modal" data-target="#modal-danger" class="btn btn-danger float-right">Delete</button>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
      </div>
      
      <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Delete Account?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Please Confirm before deleting this account&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light btn-info" data-dismiss="modal">Cancel</button>
              <button type="button"  class="btn btn-outline-light btn-warning">Continue</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </section>
    <?php
           }

    
        }
        else {
          
            echo '<div class="text-danger">User Data Not Found</div>';

        }


      }
    if (isset($_GET['eid'])) {
     
     $nuser = mysqli_real_escape_string($con,$_GET['eid']);

              $sel_user = mysqli_query($con,"SELECT * FROM user_informations WHERE id = '$nuser' LIMIT 1");

              if (mysqli_num_rows($sel_user) >= 1) {
               
                  while ( $nrow = mysqli_fetch_array($sel_user)) {

                      $use_id = $nrow['id'];
                      $user_id_no = $nrow['user_id'];
                      $user_fn = $nrow['first_name'];
                      $user_mn = $nrow['middle_name'];
                      $user_ln = $nrow['last_name'];
                      $user_gender = $nrow['gender'];
                      $user_role = $nrow['user_type'];
                      $user_region = $nrow['region'];
                      $user_zone = $nrow['zone'];
                      $user_woreda = $nrow['woreda'];
                      $user_kebele = $nrow['kebele'];
                      $user_phone = $nrow['phone_no'];


      ?>
      <section class="content">

        <div class="card card-info offset-col-sm-8">
                  <div class="row m-2 p-2 bg-info">
                    <h3 class="card-title pl-2 text-bold">Update User Information</h3>
                  </div>
                  <!-- /.card-header -->

                <form role="form" method="POST" action="" enctype="multipart/form-data">

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
                              <label class="text-primary">User ID</label>
                              <input type="text" name="usid" class="form-control" placeholder="<?=$user_id_no?>">
                                  <?php
                                      if (isset($msg['usid-errors'])) {
                                          echo '<div class="text-danger">'.$msg['usid-errors'].'</div>';
                                      }
                                  ?>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label class="text-info">First Name</label>
                            <input type="text" name="fname" class="form-control" placeholder="<?=$user_fn?>">
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
                            <input type="text" name="mname" class="form-control" placeholder="<?=$user_mn?>">
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
                            <input type="text" name="lname" class="form-control" placeholder="<?=$user_ln?>">
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
                            <select name="gender" class="form-control" >
                              <option value="<?=$user_gender?>"><?=$user_gender?></option>
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
                              <option value="<?=$user_role?>"><?=$user_role?></option>
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
                              <input type="text" name="region" class="form-control" placeholder="<?=$user_region?>">
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
                              <input type="text" name="zone" class="form-control" placeholder="<?=$user_zone?>">
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
                              <input type="text" name="woreda" class="form-control" placeholder="<?=$user_woreda?>">
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
                            <input type="text" name="kebele" class="form-control" placeholder="<?=$user_kebele?>">
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
                            <input name="phone_no" type="text" class="form-control" placeholder="<?=$user_phone?>">
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
                        <button name="update_user_info" type="submit" class="btn col-sm-2 btn-success float-right">Update</button>
                    </div>
                  </div>


              </form>
                  <!-- /.card-body -->
            </div>
        </section>

        </section>
      <?php
              }
          }
      }

    if (isset($_GET['did'])) {
      # code...
    }
    ?>

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
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });

</script>

</body>
</html>
