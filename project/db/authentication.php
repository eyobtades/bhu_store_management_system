<?php

//Assigning New parameters
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$dbname = "bhu_sms";

// Establishing Connection

$con = mysqli_connect($db_host,$db_user,$db_pass);
if (!$con) {
  echo "Couldn`t Connect To Database".mysqli_error();
}

// Establishing Database

$db_name = mysqli_select_db($con, $dbname);
if (!$db_name) {
  echo "Database Connection Failed!!! Please Try Again".mysqli_error();
}


 ?>
