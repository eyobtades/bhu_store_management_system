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

    else

    {
            $fname = $_SESSION['user']['first_name'];
            $id = $_SESSION['user']['id'];
            $mname = $_SESSION['user']['middle_name'];
            $role = $_SESSION['user']['user_type'];
            $image = $_SESSION['user']['user_image'];

            if($image != "") {

              $user_image = '<img src="../images/user_images/'.$image.'" class="img-circle elevation-2" alt="User Image">';

            }else{

              $gender = $_SESSION['user']['gender'];
              if ($gender == "Male") {

                 $user_image =  '<img src="../images/system_image/male.png" class="img-circle elevation-2" alt="User Image">';

                }
              else{

                 $user_image =  '<img src="../images/system_image/female.png" class="img-circle elevation-2" alt="User Image">';

                }

            }

            $active_user = mysqli_query($con,"SELECT * FROM `user_accounts` WHERE `login_status`='Active'");
            $warned_user = mysqli_query($con,"SELECT * FROM `user_informations` WHERE `user_status`='Warned'");
            $blocked_user = mysqli_query($con,"SELECT * FROM `user_informations` WHERE `user_status`='Deactivated'");
            $all_user = mysqli_query($con,"SELECT * FROM user_informations");

            // Fetch Active Users
            if (!$active_user) {

                $active_users = "0";

            }
            else{

              $active_users = mysqli_num_rows($active_user);

            }

            // Fetch Warned Users
            if (!$warned_user) {

              $warned_users = "0";

            }
            else
            {
              $warned_users = mysqli_num_rows($warned_user);
            }

            //Fetch Blocked Users
            if (!$blocked_user) {

              $blocked_users = "0";

            }
            else
            {
              $blocked_users = mysqli_num_rows($blocked_user);
            }

            //Fetch All Users
            if (!$all_user){

              $all_users = "0";

            }
            else
            {
              $all_users = mysqli_num_rows($all_user);
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
          <?php echo $user_image; ?>
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
            <a href="admin_home.php" class="nav-link active">
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
              <li class="breadcrumb-item active">Admin Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

          <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <h1 class="info-box-icon"><i class="fas text-warning fa-thermometer-full"></i></h1>

                <div class="info-box-content">
                  <span class="info-box-number text-primary" id="temperature">Temperature</span>
                  <h5 class="info-box-number text-danger" id="temp_status">27&nbsp;<sup>&deg;</sup>C</h5>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <h1 class="info-box-icon"><i class="fas text-info fa-tint"></i></h1>

                <div class="info-box-content">
                  <span class="info-box-number text-primary" id="humidity">Humidity</span>
                  <h5 class="info-box-number text-danger hum_status">270&nbsp;&percnt;</h5>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>
            <!-- /.col -->

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <h1 class="info-box-icon"><i class="fas text-secondary fa-cloud"></i></h1>

                <div class="info-box-content">
                  <span class="info-box-number text-primary" id="smoke">Smoke</span>
                  <h5 class="info-box-number text-danger smoke_status" >10&nbsp;&percnt;</h5>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon"><i class="fas text-success fa-male"></i></span>

                <div class="info-box-content">
                  <span class="info-box-number text-primary" id="human">Human</span>
                  <h5 class="info-box-number text-danger human" >0</h5>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>
          <!-- /.col -->

        </div>
        <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$all_users?></h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="user_list.php" class="small-box-footer">View All<i class="fas p-1 fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$warned_users?></h3>

                <p>Underwarning Accounts</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="user_list.php" class="small-box-footer">View All<i class="fas p-1 fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$blocked_users?></h3>

                <p>Blocked Accounts</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="user_list.php" class="small-box-footer">View All<i class="fas p-1 fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$active_users?></h3>

                <p>Online Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="user_list.php" class="small-box-footer">View All <i class="fas p-1 fa-arrow-circle-right"></i></a>
            </div>
          </div>
      </div><!--/. container-fluid -->
     <div class="row">
      <div class="col-md-8">
         <!-- PRODUCT LIST -->
         <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Recent Users Activities</h3>
              </div>
              <!-- /.card-header -->
              <?php

              $rec_act = mysqli_query($con,"SELECT * FROM history WHERE login_status='Active' ORDER BY history_date ASC LIMIT 5");
              if ($rec_act) {

                  while ($hist = mysqli_fetch_array($rec_act)) {

                      $hist_of = $hist['history_from'];
                      $hist_cont = $hist['history_title'];
                      $hist_date = $hist['history_date'];

                      echo '
                     <div class="card-body p-0">
                       <ul class="products-list product-list-in-card pl-2 pr-2">
                         <li class="item">
                           <div class="product-img">
                             <img src="../dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                           </div>
                           <div class="product-info">
                             <a href="javascript:void(0)" class="product-title">'.$hist_of.'
                               <span class="badge float-right">'.$hist_date.'</span></a>
                             <span class="product-description">
                               '.$hist_cont.'
                             </span>
                           </div>
                         </li>

                       </ul>
                     </div>';

                  }

                }
                else {
                  echo '
                            <span class="p-2 text-center">No Recent Activity</span>
                      ';
                }

              ?>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>

      <div class="col-sm-4">
         <!-- PRODUCT LIST -->
         <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title">Active Users</h3>
              </div>
              <!-- /.card-header -->
              <?php

                $log = mysqli_query($con,"SELECT * FROM `user_accounts` WHERE `login_status`='Active' ORDER BY `login_date_time` DESC LIMIT 5");
                if ($rec_act) {

                    while ($log_hist = mysqli_fetch_assoc($log)) {

                        $log_id = $log_hist['log_id'];
                        $log_status = $log_hist['login_status'];

                        $sel_user = mysqli_query($con,"SELECT * FROM user_informations WHERE id='$log_id'");
                        if ($sel_user) {
                          while ($act_user = mysqli_fetch_assoc($sel_user)) {

                              $fn = $act_user['first_name'];
                              $mn = $act_user['middle_name'];

                              echo '
                               <div class="card-body p-0">
                                 <ul class="products-list product-list-in-card pl-2 pr-2">
                                   <li class="item">
                                     <div class="product-img">
                                       <img src="../dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                     </div>
                                     <div class="product-info">
                                       <a href="compose_message.php?uid='.$log_id.'" class="product-title">'.$fn.'&nbsp;'.$mn.'</a>

                                       <span class="product-description text-success">
                                         '.$log_status.'
                                       </span>
                                     </div>
                                   </li>

                                 </ul>
                               </div>

                               <!-- /.card-body -->
                               <div class="card-footer text-center">
                                 <a href="" class="uppercase">View All</a>
                               </div>
                               <!-- /.card-footer -->
                             </div>
                             <!-- /.card -->
                         </div>
                         ';
                        }

                      }





                        }

          }
          else
          {
            echo'

                  <span class="p-2 text-center">No History Found!</span>

                ';
          }

      ?>
        <!-- /.row -->
      </div>
     </div>
     <!--/Online Users Tables-->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
    


  </script>
</body>
</html>
