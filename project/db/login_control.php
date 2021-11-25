<?php

    include "authentication.php";

    session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array();


	// call the login() function if register_btn is clicked
	if (isset($_POST['login-btn'])) {
		login();
	}


	// LOGIN USER
	function login(){
		global $con, $username,$password,$error;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

        if(empty($username)){
            $error['username_err'] = "Please Enter Username";
        }
        if(empty($password)){
            $error['password_err'] = "Please Enter Password";
        }

        if($username !="" AND $password !="") {

                    $query = "SELECT * FROM user_accounts WHERE username='$username' AND password='$password' LIMIT 1";
                    $results = mysqli_query($con, $query);

                    if (mysqli_num_rows($results) == 1) { // user found
                        // check their role and redirect them to their page
                        $user_info = mysqli_fetch_assoc($results);
                        $user_id = $user_info['id'];
                        //Updating login status
                        $update_log_status = mysqli_query($con,"UPDATE `user_accounts` SET `login_status`='Active' WHERE `id`='$user_id'");
                        //Save into notification
                        $not_title = mysqli_real_escape_string($con,"New Logged in detected");
                        $hist_title = mysqli_real_escape_string($con,"Last login Activity");
                        $not_content = mysqli_real_escape_string($con,"Logged in to the system.");
                        $hist_cont = mysqli_real_escape_string($con,"has Login active to the store management system");
                        $date = mysqli_real_escape_string($con,date('y-m-d h:i:s'));
                       // Save Notification of activity
                        $reg_notification = mysqli_query($con,"INSERT INTO `notifications`(`notification_id`, `notification_title`, `notification_content`, `date_time`, `notification_from`) VALUES ('','$not_title','$not_content','$date','System')");

                        // Save History of activity
                        $make_history = mysqli_query($con,"INSERT INTO `history`(`history_id`, `history_title`, `history_content`, `history_date`, `history_from`) VALUES ('','$hist_title','$hist_cont','$date','$user_id')");

                        $query1 = "SELECT * FROM user_informations WHERE id='$user_id' LIMIT 1";
                    	  $results1 = mysqli_query($con, $query1);

                        if(mysqli_num_rows($results1) == 1){

                        $logged_in_user = mysqli_fetch_assoc($results1);

						//Redirect to store manager

                        if ($logged_in_user['user_type'] == 'System Admin') {

							$_SESSION['user'] = $logged_in_user;
                            header('location: admins/admin_home.php');

                        }

                        //Redirect to store manager

                        else if ($logged_in_user['user_type'] == 'Store Manager') {

                            $_SESSION['user'] = $logged_in_user;
                            header('location: store_manager/manager_home.php');
                        }

                        //Redirect to store keeper
                        else if ($logged_in_user['user_type'] == 'Store Keeper') {

                            $_SESSION['user'] = $logged_in_user;
                            header('location: users/store_keeper_home.php');
                        }

						// if user is not found
                        else {
                            $errors['user_error']=("User not found!");
                        }

                    }

                }
				else {
					$error['input_error'] = "Username or Password Not Matched. Try Again!";
				}
        }
	}


	//////////////////////////////////////////////


	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'System Admin' ) {
			return true;
		}
		else
		{
			return false;
		}
	}

	function isStoreManager()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'Store Manager' ) {
			return true;
		}else{
			return false;
		}
	}
	function isStoreKeeper()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'Store Keeper' ) {
			return true;
		}else{
			return false;
		}
	}
	function isUser()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'User' ) {
			return true;
		}else{
			return false;
		}
	}


	// escape string
	function e($val){
		global $con;
		return mysqli_real_escape_string($con,trim($val));
	}


	//////////////////////////////////////////////


?>
