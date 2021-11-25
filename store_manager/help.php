<?php

    include ('../project/db/login_control.php');
    include ('../project/functions/common_functions.php');
    include ('../project/functions/header.php');
    include ('../project/functions/footer.php');
    include ('store_manager.php');
      
    if (!isStoreManager()) 
    {
      header('location: ../index.php');

    }
    
    else
    
    {
            $fname = $_SESSION['user']['first_name'];
            $id = $_SESSION['user']['id'];
            $mname = $_SESSION['user']['middle_name'];
            $role = $_SESSION['user']['user_type'];
            $que = mysqli_query($con,"SELECT user_image FROM user_informations WHERE id='$id' ORDER BY `reg_date` LIMIT 1");
            if (mysqli_num_rows($que) > 1) {
             
                  while ($imrow = mysqli_num_rows($que)) {
                  
                      $image = $imrow['user_image'];
                      $user_image =  '<img src="../images/user_images/'.$image.'" class="img-circle elevation-2" alt="User Image">';
                  }

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
            $req  = mysqli_query($con, "SELECT * FROM `requests` WHERE `req_approve` = 'PENDING'");
            if (mysqli_num_rows($req) == 1) {
              
                $req_num = mysqli_num_rows($req);

            }
            else {
              $req_num = "0";
            }
            $all_cat = mysqli_query($con,"SELECT * FROM `categories` WHERE `cat_status`='Active'"); 
            $material = mysqli_query($con,"SELECT * FROM `items` WHERE `item_status`='Availble'"); 
            $store_user = mysqli_query($con,"SELECT * FROM `store_users` WHERE `provide_status`='Provided'"); 
            $store_keeper = mysqli_query($con,"SELECT * FROM user_informations WHERE `user_type`='Store Keeper' AND `user_status`='Active' " ); 

            // Fetch Active Users 
            if (mysqli_num_rows($all_cat) == 1) {
              
                $all_cats = mysqli_num_rows($all_cat);

            }
            else{
              
                $all_cats = "0";

            }

            // Fetch Warned Users
            if (mysqli_num_rows($material) == 1) {
              
                $materials = mysqli_num_rows($material);

            }
            else
            {
                $materials = "0";
            }

            //Fetch Blocked Users
            if (mysqli_num_rows($store_keeper) == 1) {
              
               $store_keepers = mysqli_num_rows($store_keeper);

            }
            else
            {
                $store_keepers = "0";
            }
            
            //Fetch All Users
            if (mysqli_num_rows($store_user) == 1) {

              $store_users = mysqli_num_rows($store_user);

            }
            else
            {
                $store_users = "0";
            }

            // Fetch Recent Added Categoris
            $recent_cat = mysqli_query($con, "SELECT * FROM items ORDER BY reg_date ASC LIMIT 4 ");

            if (mysqli_num_rows($recent_cat) == 1) {
                
                while ($rec_row = mysqli_fetch_array($recent_cat)) {

                    $item_id = $rec_row['item_id'];  
                    $item_name = $rec_row['item_name'];
                    $item_type = $rec_row['item_type'];
                    $item_reg_date = $rec_row['reg_date'];

                }
                $items = '
                <li class="item">
                <div class="product-img">
                  <img src="../dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                </div>
                <div class="product-info">
                  <a href="materials.php?item_id='.md5($item_id).'" class="product-title">'.$item_name.'
                    <span class="badge float-right">'.$item_reg_date.'</span></a>
                  <span class="product-description">'.
                    $item_type.'
                  </span>
                </div>
                </li>';
            }
            else {
              $items = "No Registered Items";
            }
            // Fetch Avilable Categories
            $av_cat = mysqli_query($con, "SELECT * FROM categories WHERE cat_status = 'Active' ");

            $av_num = mysqli_num_rows($av_cat);

            if (mysqli_num_rows($av_cat) == 1) {
              
                while ($av_row = mysqli_fetch_array($av_cat)) {
                  
                    $Cat_name = $av_row['cat_name'];
                    $Cat_type = $av_row['cat_type'];

                }
                $categ = '<li class="item">
                <div class="product-img">
                  <img src="../dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                </div>
                <div class="product-info">
                  <a href="materials.php?$cat_id='.md5($cat_id).'" class="product-title">'.$Cat_name.'</a>
                
                  <span class="product-description text-info">
                    '.$Cat_type.'
                  </span>
                </div>
                </li>';
            }
            else
            {
             
              $categ = 'No Registered Categories';

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

  <title>BHU Store Management System | Store Manager Home</title>
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
       <?php echo $user_image;?>
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
          <li class="nav-item has-treeview">
            <a href="manager_home.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                System Tools                
              </p>
              <i class="nav-icon fas fa-caret-down float-right"></i>
            </a> 

            <ul class="nav nav-treeview ml-4">
              <li class="nav-item">
                <a href="system_tools.php?act_id=store_users" class="nav-link">
                  <p>Store Users List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="system_tools.php?act_id=item_list" class="nav-link">
                  <p>Item Lists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="system_tools.php?act_id=categories" class="nav-link">
                  <p>Material Categories</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="materials.php" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Materials                
              </p>
            </a>           
          </li>

          <li class="nav-item has-treeview" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Store Tasks                
              </p>
              <i class="nav-icon fas fa-caret-down float-right"></i>
            </a> 

            <ul class="nav nav-treeview ml-4">
              <li class="nav-item">
                <a href="store_tasks.php?act_id=provide" class="nav-link">
                  <p>Provide Materials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="store_tasks.php?act_id=return-back" class="nav-link">
                  <p>Return Materials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="store_tasks.php?act_id=manage" class="nav-link">
                  <p>Manage Users</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="message.php" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Message                
              </p>
              <span class="badge bg-danger float-right"><?=$mes_count?></span>
            </a>           
          </li>

          <li class="nav-item has-treeview">
            <a href="profile.php" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
              Profile              
              </p>
            </a>           
          </li>

          <li class="nav-item has-treeview">
            <a href="report.php" class="nav-link">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>
              Report             
              </p>
            </a>           
          </li>

          <li class="nav-item has-treeview">
            <a href="help.php" class="nav-link active">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
                Help                
              </p>
            </a>           
          </li>
          <li class="nav-item has-treeview">
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
              <li class="breadcrumb-item active">Manager Home</li>
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
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=$all_cats?></h3>

                <p>Total Categories</p>
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
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=$materials?></h3>

                <p>Materials</p>
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
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=$store_users?></h3>

                <p>Store Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="user_list.php" class="small-box-footer">View All<i class="fas p-1 fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=$store_keepers?></h3>

                <p>Store Keepers</p>
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
              <div class="card-header bg-info">
                <h3 class="card-title">Recent Added Item To The System</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                              
                  <?php 
                    echo $items;
                  ?>
                </ul>
              </div>
              <!-- /.card-body -->
              <?php
              
                if (mysqli_num_rows($recent_cat) == 1 )
                {
                    echo '<div class="card-footer text-center">
                          <a href="materials.php" class="uppercase">See All Items</a>
                          </div>';
                }
               
              
              ?>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>

      <div class="col-sm-4">
         <!-- PRODUCT LIST -->
         <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Available Categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  
                  <?=$categ?>
                 
                </ul>
              </div>
              <!-- /.card-body -->
             <?php 
             
                if (mysqli_num_rows($av_cat)) {
                  echo ' <div class="card-footer text-center">
                          <a href="materials.php" class="uppercase">View All</a>
                         </div>';
                }
                else
                {

                }
             
             ?>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
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
</body>
</html>
