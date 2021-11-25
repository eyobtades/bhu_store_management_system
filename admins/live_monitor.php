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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>BHU Store Management System | Admin Home</title>
  <?php assets(); ?>

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
    <div class="container">
      <a href="" class="navbar-brand">
        <img src="../images/bhu.png" alt="BHUSMS Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="admin_home.php" class="nav-link">Home</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" id="search" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-envelope"></i>
            <span class="badge badge-danger navbar-badge"><?=$mes_count?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php show_message(); ?>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"><?=$not_count?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <?php echo show_notifications(); ?>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Bule Hora University</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">System Admin</a></li>
              <li class="breadcrumb-item active">Live Monitor System</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <!-- jQuery Knob -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-street-view text-primary"></i>
                  <strong class="text-secondary">Store Room Status</strong>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-6 col-md-3 text-center">
                    <input type="text" class="knob" value="0.00" data-width="100" data-height="100" data-fgColor="#3c8dbc">

                    <div class="knob-label">Temperature:<strong class="text-danger">&nbsp;0&nbsp;&deg;C</strong></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-6 col-md-3 text-center">
                    <input type="text" class="knob" value="0.00" data-width="100" data-height="100" data-fgColor="#f56954">

                    <div class="knob-label">Humidity:<strong class="text-danger">&nbsp;0&nbsp;&percnt;</strong></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-6 col-md-3 text-center">
                    <input type="text" class="knob" value="0.00"  data-width="100" data-height="100" data-fgColor="#00a65a">

                    <div class="knob-label">Smoke:<strong class="text-danger">&nbsp;0&nbsp;&percnt;</strong></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-6 col-md-3 text-center">
                    <input type="text" class="knob" value="0.00" data-width="100" data-height="100" data-fgColor="#00c0ef">

                    <div class="knob-label">Human:<strong class="text-danger">&nbsp;0&nbsp;</strong></div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- interactive chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar text-warning"></i>
                  <strong class="text-info">Live Temperature Review</strong>
                </h3>
              </div>
              <div class="card-body">
                <div id="interactive" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php footer(); ?>
</div>
<!-- ./wrapper -->

<!--Script Plugins-->
<?php scriptPlugin(); ?>

</body>
</html>
