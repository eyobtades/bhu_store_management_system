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
      $uid = $_SESSION['user']['id'];
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

  }

  $mcount = "";

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
            <a href="broadcast_message.php" class="nav-link active">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Store Management System</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Broadcast Message</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <!-- Main content -->
      <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="compose_message.php" class="btn btn-primary btn-block mb-3">Compose</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Folders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="broadcast_message.php" class="nav-link text-primary">
                    <i class="fas fa-inbox"></i> Inbox
                    <span class="badge bg-primary float-right"><?php echo $mcount; ?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="sent_messages.php" class="nav-link">
                    <i class="far fa-envelope"></i> Sent
                    <?php

                    $messages = mysqli_query($con, "SELECT * FROM `messages` WHERE `message_sender`='$uid' ORDER BY `sent_date` ASC LIMIT 10");

                    $scount = mysqli_num_rows($messages);

                    if ($scount >=1) {
                      echo ' <span class="badge bg-success float-right">'.$scount.'</span>';
                    }
                    else{
                      echo '';
                    }
                    ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="drafts.php" class="nav-link">
                    <i class="far fa-file-alt"></i> Drafts
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-filter"></i> Junk
                    <span class="badge bg-warning float-right">0</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="trash.php" class="nav-link">
                    <i class="far fa-trash-alt"></i> Trash
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                  <div class="mailbox-controls">
                          <!-- Check all button -->
                          <button type="button" id="select_all"class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                          </button>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                          </div>
                          <!-- /.btn-group -->
                          <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                          <div class="float-right">';
                <?php

                    if ($mcount != "0" AND $mcount !="") {

                      echo $mcount.'/'.$mcount;
                      echo '
                      <div class="btn-group">
                              <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                              <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                            </div>';
                    }
                    else {
                      echo "";
                    }

                    ?>

                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <tr>
                    <?php
                    $messages = mysqli_query($con, "SELECT * FROM `messages` WHERE `message_reciever`='$uid' ORDER BY `recieved_date` ASC LIMIT 10");
                    if (!$messages) {

                    }
                    else
                    {
                      if (mysqli_num_rows($messages) === 1) {
                        $mcount = mysqli_num_rows($message);
                      while($mrow = mysqli_fetch_array($messages)){

                          $sender = $mrow['message_sender'];
                          $rec_date = $mrow['recieved_date'];
                          $title = $mrow['message_title'];
                          $message = substr($mrow['message_content'],0,30);

                          $fetch_user = mysqli_query($con, "SELECT * FROM `user_informations` WHERE id = '$sender' LIMIT 1");
                          if (mysqli_num_rows($fetch_user) >= 1) {
                            while ($murow = mysqli_fetch_array($fetch_user)){
                                $ufname = $murow['first_name'];
                                $umname = $murow['middle_name'];
                                $sender_name = $ufname.'&nbsp;'.$umname;


                                  }
                              }

                              echo '
                              <tr>
                                <td>
                                  <div class="icheck-primary">
                                    <input type="checkbox" value="" id="check1">
                                    <label for="check1"></label>
                                  </div>
                                </td>
                                <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                <td class="mailbox-name"><a href="read-mail.php">'.$sender_name.'</a></td>
                                <td class="mailbox-subject"><b>'.$title.'</b> - '.$message.'...
                                </td>
                                <td class="mailbox-attachment"></td>
                                <td class="mailbox-date">'.$rec_date.'</td></tr>';

                          }
                      }
                      else {
                        echo '<td><h4>You Haven`t Message!<h4></>';
                        $mcount = "0";
                      }
                    }


                     ?>
                    </tr>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <div class="float-right">
                  <?php if ($mcount != "0") {
                      echo '<strong class="text-info">'.$mcount.'</strong>&nbsp; <span class="text-info"> Messages</strong>&nbsp;';
                      echo '<div class="btn-group">
                              <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                              <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                            </div>';
                    }
                    else {
                      echo "";
                    }
                   ?>

                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
</body>
</html>
