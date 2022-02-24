<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<div class="modal fade hidden" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" id="signupModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SignUp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- signup form -->
                <form action="<?php set_action_url(); ?>" method="post" onsubmit="return check();" name="signupForm" id="signupForm">
                    <!-- <form action=" <?php //echo htmlentities($_SERVER['PHP_SELF']) 
                                        ?>?category=<?php //echo $_GET['category'] 
                                                    ?>" method="post" onsubmit="return check();" name="signupForm" id="signupForm"> -->
                    <p id="form_fill" class="text-center font-weight-bold"></p>

                    <div class="form-group">
                        <label for="forUserName">User Name:</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter User Name" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="forEmail">Email:</label>
                        <input type="email" name="signupemail" id='signupemail' class="form-control" placeholder="Enter Your Email" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="forConfirmPassword">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Enter Confirm Password" aria-describedby="helpId">
                    </div>
                    <p id="label"></p>
                    <input type="submit" class="btn btn-primary" value="SignUp" id="subbtn" name="subbtn">
                    <!-- <button class="btn btn-primary" id="subbtn" name="subbtn">signup</button> -->

                </form>
                <?php
                include 'connectDb.php';
                $show_login_modal = false;


                if (isset($_POST['signupemail'])) {
                    $staticModalsignup = false;
                    $username = $_POST['username'];
                    $email = $_POST['signupemail'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];



                    $email_reg = "SELECT * FROM users WHERE user_email='$email'";
                    $email_exist_result = mysqli_query($con, $email_reg);

                    $email_exist_row = mysqli_num_rows($email_exist_result);

                    //to check if user exists or not 
                    if (!($password == $cpassword)) {

                        //prevent modal for closing
                        $staticModalsignup = true;
                        echo '<div class="alert alert-danger my-2" role="alert">
                    <strong>Password doesnt match</strong>
                    </div>';
                    } else {
                        if ($email_exist_row > 0) {
                            echo '<div class="alert alert-danger" role="alert">
                                    <strong>Email already registered</strong>
                                </div>';
                            $staticModalsignup = true;
                        } else {
                            //inserting values in database
                            $phash = password_hash($password, PASSWORD_DEFAULT);     //hasing password

                            $sql = "INSERT INTO `users` (`user_email`, `username`, `password`) VALUES ('$email', '$username', '$phash');";
                            $result = mysqli_query($con, $sql);
                            if ($result) {
                                // echo 'success';
                                // after succesful signup opening login modal
                                $show_login_modal = true;
                            } else {
                                echo 'error' . mysqli_error($con);
                            }
                        }
                    }
                }
                ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>



        </div>
        <input type="hidden" name="inp" id="inp" value="<?php echo $staticModalsignup; ?>">
        <input type="hidden" id='login_modal_show' value="<?php echo $show_login_modal; ?>">
    </div>


</div>

<body>

</body>

</html>