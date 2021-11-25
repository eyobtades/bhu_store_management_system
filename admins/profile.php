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
        $reg_date = $_SESSION['user']['reg_date'];
        $reg_by = $_SESSION['user']['reg_by'];
        $status = $_SESSION['user']['user_status'];
        $image = $_SESSION['user']['user_image'];
        $woreda = $_SESSION['user']['woreda'];
        $kebele = $_SESSION['user']['kebele'];
        $phone = $_SESSION['user']['phone_no'];
        
        if($image != "") {

              $user_image = $image;
      
            }else{

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
          <img src="../images/system_image/male.png" class="img-circle elevation-2" alt="User Image">
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
            <a href="account.php?$key='user_list'" class="nav-link">
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
            <a href="tools.php?$key='refresh_db'" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Refresh DB                
              </p>
            </a>           
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="request_page.php" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                User Requests                
              </p>
            </a>           
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="broadcast_message.php" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Broadcast Message                
              </p>
            </a>           
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="feedback_lists.php" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
              View Feedback                
              </p>
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
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       <?=$user_image?>
                </div>

                <h3 class="profile-username text-center text-secondary"><b><?=$fname.'&nbsp;'.$mname?></b></h3>

                <p class="text-muted text-center text-secondary"><?=$role?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Location:</b> <a class="float-right text-secondary"><?=$woreda.','.$kebele?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone No:</b> <a class="float-right text-secondary"><?=$phone?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Reg Date:</b> <a class="float-right text-secondary"><?=$reg_date?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Reg By:</b> <a class="float-right text-secondary"><?=$reg_by?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Status:</b> <a class="float-right text-success"><?=$status?></a>
                  </li>
                </ul>

                <a href="change_password.php" class="btn btn-success btn-block"><i class="fas fa-pen p-1"></i><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

        <?php 
        
            $sql2 = mysqli_query($con, "SELECT * FROM `notifications` WHERE `notification_from` = '$id'");
            $sql3 = mysqli_query($con, "SELECT * FROM `history` WHERE `history_from` = '$id'");
            $sql4 = mysqli_query($con, "SELECT * FROM `messages` WHERE `message_sender` = '$id'");
            $sql5 = mysqli_query($con, "SELECT * FROM `messages` WHERE `message_reciever` = '$id'");

           



            if (mysqli_num_rows($sql5) >= 1) {
                
                $row5 = mysqli_fetch_array($sql5);
                $rmcont = $row5['message_content'];
                $msender = $row5['message_reciever'];

            }
        
        
        ?>

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
               </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

                    <?php
                    
                        if (!empty($sql2)) {
                            if (mysqli_num_rows($sql2) >= 1) {
                
                                while($row2 = mysqli_fetch_array($sql2)){
                                $not_title = $row2['notification_title'];
                                $not_date = $row2['date_time'];
                                echo '                    
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../images/user_images/'.$user_image.'>
                                        <span class="username">
                                        <a href="#">'.$fname.'&nbsp;'.$mname.'</a>
                                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">'.$not_date.'</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                    '.$not_cont.'
                                    </p>
                                </div>
                                <!-- /.post -->';
                        }
                    }
                    else{
                       
                    }
                                
                }

                if (!empty($sql3)) {
                    
                    if (mysqli_num_rows($sql3) >= 1) {
                        
                        $row3 = mysqli_fetch_array($sql3);
                        $hist_title = $row3['history_title'];
                        $hist_date = $row3['history_date'];

                        echo '                    
                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="../images/user_images/'.$user_image.'>
                                <span class="username">
                                <a href="#">'.$fname.'&nbsp;'.$mname.'</a>
                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                </span>
                                <span class="description">'.$hist_date.'</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                            '.$hist_title.'
                            </p>
                        </div>
                        <!-- /.post -->';
                    }
                    else{
                       
                    }

                }

                if (!empty($sql4)) {
                   
                    if (mysqli_num_rows($sql4) >= 1) {
                        
                        $row4 = mysqli_fetch_array($sql4);
                        $rmcont = $row4['message_content'];
                        $mreciev = $row4['message_reciever'];
                        $smes_date = $row4['sent_date'];

                        $rec = mysqli_fetch_array($con, "SELECT * FROM WHERE id='$mreciev' LIMIT 1");
                        if (!empty($rec)) {
                            while($reciever = mysqli_fetch_assoc($rec)){
                                $mrfname = $reciever['first_name'];
                                $mrmname = $reciever['middle_name'];
                            }
                        }
                        echo '                    
                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="../images/user_images/'.$user_image.'>
                                <span class="username">
                                <a href="#">'.$mrfname.'&nbsp;'.$mrmname.'</a>
                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                </span>
                                <span class="description">'.$rmes_date.'</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                            '.$rmcont.'
                            </p>
                        </div>
                        <!-- /.post -->';
                    }
                    else{
                       
                    }
                }

                if (!empty($sql5)) {
                   
                    if (mysqli_num_rows($sql5) >= 1) {
                        
                      while ($row5 = mysqli_fetch_array($sql5)){
                      $smcont = $row5['message_content'];
                      $msen = $row5['message_sender'];
                      $rmes_date = $row5['recieved_date'];

                      $rec = mysqli_fetch_array($con, "SELECT * FROM WHERE id='$msen' LIMIT 1");
                      if (!empty($rec)) {
                          while($reciever = mysqli_fetch_assoc($rec)){
                              $msfname = $reciever['first_name'];
                              $msmname = $reciever['middle_name'];
                          }

                        }

                        echo '                    
                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="../images/user_images/'.$user_image.'>
                                <span class="username">
                                <a href="#">'.$msfname.'&nbsp;'.$msmname.'</a>
                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                </span>
                                <span class="description">'.$smes_date.'</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                            '.$smcont.'
                            </p>
                        </div>
                        <!-- /.post -->';
                      }
                    }
                    else{
                        
                    }
                }
                    ?>


                    <!-- Post -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
</body>
</html>
