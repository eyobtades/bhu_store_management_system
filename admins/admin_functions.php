    <?php

        if (!isAdmin())
        {
        header('location: ../index.php');

        }

        else

        {
            $uid = $_SESSION['user']['id'];
                //Notification fetching
            $notification = mysqli_query($con, "SELECT * FROM notifications ORDER BY date_time DESC LIMIT 4");
            $not_count = mysqli_num_rows($notification);

            function show_notifications(){
                global $not_count,$notification;
                if ($not_count >=1) {
                   echo '<span class="dropdown-item dropdown-header">You Have&nbsp;'.$not_count.'&nbsp;Notifications</span>';
                    while($row = mysqli_fetch_array($notification)){
                        $id= $row['notification_id'];
                        $not_title = substr($row['notification_title'],0,20);
                        $not_from = substr($row['notification_from'],0,6);
                        $not_date = $row['date_time'];
                        $not_id= md5($id);

                        echo('
                        <div class="dropdown-divider"></div>
                        <a href="notification_view?not_d=$not_id" class="dropdown-item">
                          <i class="fas fa-bell mr-2"></i><b class="text-secondary">'.$not_from.'</b>,&nbsp;'.$not_title.'
                        </a>
                        ');
                        }
                        echo '
                        <a href="view_notification.php?not_id='.$not_id.'" class="dropdown-item dropdown-footer">See All Notifications</a>
                        ';
                    }
                    else{
                        echo '<span class="dropdown-item dropdown-header">You Haven`t Notifications</span>                ';
                    }

            }

            //Function Show Message
            $message = mysqli_query($con, "SELECT * FROM messages WHERE message_reciever='$uid' ORDER BY recieved_date DESC LIMIT 4");
            $mes_count = mysqli_num_rows($message);

            function show_message(){

                global $mes_count,$message,$con;
                if ($mes_count >=1) {
                   echo '<span class="dropdown-item dropdown-header">You Have&nbsp;'.$mes_count.'&nbsp;Messages</span>';
                    while($row = mysqli_fetch_array($message)){
                        $id= $row['message_id'];
                        $mes_title = $row['message_title'];
                        $mes_from = $row['message_sender'];
                        $mes_to = $row['message_reciever'];
                        $rec_date = $row['recieved_date'];
                        $mes= md5($mes_to);

                        $fetch_sender = mysqli_query($con,"SELECT * FROM user_informations WHERE id='$mes_from'");
                        while ($murow = mysqli_fetch_array($fetch_sender)) {
                            $fname = $murow['first_name'];
                            $mnane = $murow['middle_name'];
                            $sender_name = $fname.'&nbsp;'.$mnane;
                        }

                        echo('
                        <div class="dropdown-divider"></div>
                        <a href="read-mail.php?mes_id='.md5($mes).'" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                            <i class="fas fa-envelope p-2 text-size-20"></i>
                            <div class="media-body">
                                <h3 class="dropdown-item-title text-info">
                                '.$sender_name.'
                                <span class="float-right text-sm text-muted"><i class="fas fa-eye text-orange"></i></span>
                                </h3>
                                <p class="text-sm">'.$mes_title.'</p>
                                <p class="text-sm text-muted"><i class="far text-warning fa-clock mr-1"></i>'.$rec_date.'</p>
                            </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        ');
                        }
                        echo '
                        <a href="read_message.php" class="dropdown-item dropdown-footer">View All Messages</a>
                        ';
                    }
                    else{
                        echo '<span class="dropdown-item dropdown-header">You Haven`t Messages</span>                ';
                    }


            }


            function send_message(){
                    global $con;

                    $mreciever = mysqli_real_escape_string($con, $_POST['reciever']);
                    $msender  = mysqli_real_escape_string($con, $_POST['sender']);
                    $msubject = mysqli_real_escape_string($con, $_POST['subject']);
                    //$mattachment = mysqli_real_escape_string($con, $_FILES['file']['name']);
                    $message_content = mysqli_real_escape_string($con, $_POST['message_body']);

                    if (empty($mreciever)) {
                        $msg['rec-err'] = "Please Choose Reciever";
                    }
                    else{
                        $cmrec = $mreciever;

                    }
                    $filetemp = "";
                    $date_time = date('d-m-y h:i:s');
                    /*
                    */

                    $send_message = mysqli_query($con,"INSERT INTO `messages`(`message_id`, `message_sender`, `message_reciever`, `message_title`, `message_content`, `message_attachment`, `sent_date`, `recieved_date`) VALUES '','$msender','$mreciever','$msubject','$message_content','$filetemp','$date_time','')");

                    if (!$send_message) {
                        $msg['send-err'] = "Message Send Failed".mysqli_error($con);

                    }
                    else{
                        $msg['send-success'] = "Message Sent Successfully";
                        header('Location:../../sent_messages.php');
                    }


                }

                    //Register New User
                    if (isset($_POST['reg_new_user'])) {

                        $ruid = "";
                        $rfname = "";
                        $rmname = "";
                        $rlname = "";
                        $fgender = "";
                        $role = "";
                        $region = "";
                        $zone = "";
                        $woreda = "";
                        $kebele = "";
                        $rphone = "";
                        $rimage = "0";

                        //Accepting Input from form
                        $user_id =mysqli_real_escape_string($con, $_POST['user_id']);
                        $frname =mysqli_real_escape_string($con, $_POST['fname']);
                        $mdname =mysqli_real_escape_string($con, $_POST['mname']);
                        $lsname =mysqli_real_escape_string($con, $_POST['lname']);
                        $fgender =mysqli_real_escape_string($con, $_POST['gender']);
                        $role =mysqli_real_escape_string($con, $_POST['role']);
                        $region =mysqli_real_escape_string($con, $_POST['region']);
                        $zone =mysqli_real_escape_string($con, $_POST['zone']);
                        $woreda =mysqli_real_escape_string($con, $_POST['woreda']);
                        $kebele =mysqli_real_escape_string($con, $_POST['kebele']);
                        $phone = mysqli_real_escape_string($con, $_POST['phone_no']);
                        $reg_by = mysqli_real_escape_string($con, $_POST['reg_by']);
                        //$photo =  mysqli_real_escape_string($con,$_FILES['user_image']['name']);

                        //Validating User Id Input
                        if (empty($user_id)) {
                            $msg['uid-errors'] = "User Id Required *";
                        }
                        elseif (strlen($user_id) < 8){
                            $msg['uid-errors'] = "User Id Length more than 8";
                        }else{
                            $ruid = $user_id;
                        }

                        //Validating User First Name Input
                        if (empty($frname)) {
                            $msg['fname-errors'] = "First Name Required *";
                        }
                        elseif (strlen($frname) < 3){
                            $msg['fname-errors'] = "Length Too Short!";
                        }else{
                            $rfname = $frname;
                        }

                        //Validating Input
                        if (empty($mdname)) {
                            $msg['mname-errors'] = "Middle Name Required *";
                        }
                        elseif (strlen($mdname) < 3){
                            $msg['mname-errors'] = "Length Too Short!";
                        }else{
                            $rmname = $mdname;
                        }

                        //Validating Input
                        if (empty($lsname)) {
                            $msg['lname-errors'] = "Last Name Required *";
                        }
                        elseif (strlen($lsname) < 3){
                            $msg['lname-errors'] = "Length Too Short!";
                        }else{
                            $rlname = $lsname;
                        }

                        //Validating Input
                        if (empty($fgender)) {
                            $msg['gender-errors'] = "Select User Gender *";
                        }

                        //Validating Input
                        if (empty($role)) {
                            $msg['role-errors'] = "Choose User Role from list *";
                        }

                        //Validating Input
                        if (empty($region)) {
                            $msg['region-errors'] = "Choose Region from list *";
                        }


                        //Validating Input
                        if (empty($zone)) {
                            $msg['zone-errors'] = "Choose Zone from list *";
                        }

                        //Validating Input
                        if (empty($woreda)) {
                            $msg['woreda-errors'] = "Choose Woreda from list *";
                        }
                        //Validating Input
                        if (empty($kebele)) {
                            $msg['kebele-errors'] = "Choose Kebele from list *";
                        }

                        //Validating phone no Input
                        if (empty($phone)) {
                            $msg['phone-errors'] = "Phone Number Is Required *";
                        }
                        elseif (strlen($phone) < 10 && strlen($phone) > 13){
                            $msg['phone-errors'] = "Invalid Phone Number";
                        }else{
                            $rphone = $phone;
                        }

                        //Validating phone no Input
                        if (empty($photo)) {
                         $msg['phoTe-errors'] = "Please Choose image < 2MB *";
                        }



                        //Gen Pass
                        $ucase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                        $lcase = "abcdefghijklmnopqrstuvwxyz";
                        $num = "1234567890";
                        $sym = "$%&#@/(){}[]!";

                        $genUcase = substr(str_shuffle($ucase),0,2);
                        $genLocase = substr(str_shuffle($lcase),0,2);
                        $genNum = substr(str_shuffle($num),0,2);
                        $genSym = substr(str_shuffle($sym),0,2);

                        $gen_pass = "$genUcase$genLocase$genNum$genSym";
                        $gen_password = substr(str_shuffle($gen_pass),0,8);
                        $generated_password = str_shuffle($gen_password);

                        if (!empty($rfname) && !empty($rlname)) {
                            $trim_fn = substr($frname,0,3);
                            $check_trim = lcfirst($trim_fn);
                            $check_lname = lcfirst($rlname);
                            $ready_uname = ($check_trim.$check_lname);
                            $generated_username = $ready_uname;
                        }




                        //$date = date_timezone_get(time());
                        if ($ruid != "" && $rfname !="" && $rmname !="" && $rlname !="" && $fgender !="" && $role !="" && $region !="" && $zone !="" && $woreda !="" && $kebele !="" && $rphone !="") {
                               

                             // Encrypt Password
                              // Check Generated Password exists
                            $check_pass = mysqli_query($con, "SELECT * FROM `user_accounts` WHERE `password` = '$generated_password'");
                            if (mysqli_num_rows($check_pass) == 1) {

                             $gen_pass = str_shuffle($generated_password);

                            }
                            else{
                              $gen_pass = $generated_password;
                            }

                            $password = md5(mysqli_real_escape_string($con,$gen_pass));
                            $status = "Active";
                            $date = date('d-m-y h:i:s');
                            $username = mysqli_real_escape_string($con, $generated_username);

                           $check_exist = mysqli_query($con,"SELECT * FROM `user_informations` WHERE user_id = '$ruid'");
                           if (mysqli_num_rows($check_exist) == 1) {

                             $msg['errors'] = "User ID Duplication Is Not Allowed! It was registered!";

                           }
                           else{

                            $reg_query = mysqli_query($con, "INSERT INTO `user_informations`(`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `gender`, `user_type`, `region`, `zone`, `woreda`, `kebele`, `phone_no`, `user_status`,`user_image`, `reg_by`, `reg_date`) VALUES ('','$ruid','$rfname','$rmname','$rlname','$fgender','$role','$region','$zone','$woreda','$kebele','$rphone','$status','','$reg_by','$date')");
                            if (!$reg_query) {
                                $msg['reg-errors'] = "Registereation Failed! Check All Input".mysqli_error($con);
                            }
                            else{
                                $msg['reg-success'] = "Account Created Successfully";
                                $new_auth = mysqli_query($con, "INSERT INTO `user_accounts`(`id`, `username`, `password`, `modified_date`, `modified_by`) VALUES ('','$generated_username','$generated_password','$date','$reg_by')");
                                $not_title = "New Account Created";
                                $hist_title = "New Account Was Created";
                                $not_from = $id;
                                $not_content = "New Account is created for user";
                                $hist_cont = "Recently new account is added to the store management system";

                               // Save Notification of activity
                                $reg_notification = mysqli_query($con,"INSERT INTO `notifications`(`notification_id`, `notification_title`, `notification_content`, `date_time`, `notification_from`) VALUES ('','$not_title','$not_content',$date'','$reg_by')");

                                // Save History of activity
                                $make_history = mysqli_query($con,"INSERT INTO `history`(`history_id`, `history_title`, `history_content`, `history_date`, `history_from`) VALUES ('','$hist_title','$hist_cont','$date','$id')");
                                //Redirect to success page
                                header("Location:reg_success.php?action=$ruid");
                            }

                          }

                         }
                        else{

                            $msg['reg-errors'] = "Check All Input Field".mysqli_error($con);

                        }

                   }


                   //Function Show Message
                   $requsts = mysqli_query($con, "SELECT * FROM messages WHERE message_reciever='$uid' ORDER BY recieved_date DESC LIMIT 4");
                   $req_count = mysqli_num_rows($requsts);

                   //Function Show Message
                   $feedbacks = mysqli_query($con, "SELECT * FROM messages WHERE message_reciever='$uid' ORDER BY recieved_date DESC LIMIT 4");
                   $feed_count = mysqli_num_rows($feedbacks);

           }

           function upload_photo()
           {
                //get photo
           }

           //Update User Information
           if (isset($_POST['update_user_info'])) 
           {
               $eid = mysqli_real_escape_string($con,$_POST['usid']);
               $efn = mysqli_real_escape_string($con,$_POST['fname']);
               $emn = mysqli_real_escape_string($con,$_POST['mname']);
               $eln = mysqli_real_escape_string($con,$_POST['lname']);
               $egen = mysqli_real_escape_string($con,$_POST['gender']);
               $erol = mysqli_real_escape_string($con,$_POST['role']);
               $ereg = mysqli_real_escape_string($con,$_POST['region']);
               $ezon = mysqli_real_escape_string($con,$_POST['zone']);
               $ewor = mysqli_real_escape_string($con,$_POST['kebele']);
               $ekeb = mysqli_real_escape_string($con,$_POST['kebele']);
               $eph = mysqli_real_escape_string($con,$_POST['phone_no']);
               $reg_by = $_SESSION['user']['first_name'].'&nbsp'.$_SESSION['user']['middle_name'];
               $edate = date('Y-M-D H:I:S');

                //validate
                if (empty($eid)) 
                {
                    $msg['usid-errors'] = "User ID is Required";
                }
                elseif (strlen($eid) < 8) 
                {
                    $msg['usid-errors'] = "Minimum Length is 8";
                }
                else
                {
                    $neid = $eid;
                }

                //validate
                if (empty($efn)) 
                {
                    $msg['fname-errors'] = "First Name Is Required";
                }
                elseif (strlen($efn) < 3) 
                {
                    $msg['fname-errors'] = "Minimum length is 3";
                }
                else
                {
                    $nefn = $efn;
                }

                //validate
                if (empty($emn)) 
                {
                    $msg['mname-errors'] = "Middle Name Is Required";
                }
                elseif (strlen($emn) < 3) 
                {
                    $msg['mname-errors'] = "Minimum length is 3";
                }
                else
                {
                    $nemn = $emn;
                }

                //validate
                if (empty($eln)) 
                {
                    $msg['lname-errors'] = "Last Name Is Required";
                }
                elseif (strlen($eln) < 3) 
                {
                    $msg['lname-errors'] = "Minimum length is 3";
                }
                else
                {
                    $neln = $eln;
                } 

                //validate
                if (empty($egen)) 
                {
                    $msg['gender-errors'] = "Please Select Gender";
                }
                else
                {
                    $negen = $egen;
                }

                //validate
                if (empty($erol)) 
                {
                    $msg['role-errors'] = "Please Select Role";
                }
                else
                {
                    $nerol = $erol;
                }

                //validate
                if (empty($ereg)) 
                {
                    $msg['region-errors'] = "Please Specify region";
                }
                elseif (strlen($ereg) < 5) 
                {
                    $msg['region-errors'] = "Minimum Length 5";
                }
                else
                {
                    $nereg = $ereg;
                }

                //validate
                if (empty($ezon)) 
                {
                    $msg['zone-errors'] = "Please Specify Zone";
                }
                elseif (strlen($ezon) < 5) 
                {
                    $msg['zone-errors'] = "Minimum Length 5";
                }
                else
                {
                    $nezon = $ezon;
                } 

                //validate
                if (empty($ewor)) 
                {
                    $msg['woreda-errors'] = "Please Specify Woreda";
                }
                elseif (strlen($ewor) < 3) 
                {
                    $msg['woreda-errors'] = "Less than 3 input not allowed";
                }
                else
                {
                    $newor = $ewor;
                }
                
                //validate
                if (empty($ekeb)) 
                {
                    $msg['kebele-errors'] = "";
                }
                elseif (strlen($ekeb) < 2) 
                {
                    $msg['kebele-errors'] = "Less than 2 character not allowed";
                }
                else
                {
                    $nekeb = $ekeb;
                } 

               
                //validate
                if (empty($eph)) 
                {
                    $msg['phone-errors'] = "";
                }
                elseif (strlen($eph) < 10) 
                {
                    $msg['phone-errors'] = "Less than 10 number not allowed";
                }
                else
                {
                    $neph = $eph;
                } 

                if (!empty($neid) && !empty($nefn) && !empty($nemn) && !empty($neln) && !empty($negen) && !empty($nerol) && !empty($nereg) && !empty($nezon) && !empty($newor) && !empty($nekeb) && !empty($nephon)) {
                
                    $upd = mysqli_query($con,"UPDATE user_informations SET 'user_id' = $neid AND 'first_name'=$nefn AND 'middle_name'=$nemn AND 'last_name'=$neln AND 'gender'=$negen AND 'user_type'=$nerol AND 'region'=$nereg AND 'zone'=$nezon AND 'woreda'= $newor AND 'kebele'= $nekeb AND 'phone_no'=$nephon");
                    if (!$upd) {
                       
                        

                    }

                }

            }


    ?>
