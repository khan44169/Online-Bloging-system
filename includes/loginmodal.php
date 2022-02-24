<!-- Modal -->
<?php
$staticModallogin = false;
$user_exists_verify = true;
$pass_varify = true;
if (isset($_POST['loginEmail'])) {

    $login_email = $_POST['loginEmail'];
    $login_password = $_POST['loginPassword'];
    $userExist_sql = "SELECT * FROM users WHERE user_email='$login_email'";
    $userExist_result = mysqli_query($con, $userExist_sql);

    if ($userExist_result) {
        $num_rows = mysqli_num_rows($userExist_result);
        $rows = mysqli_fetch_assoc($userExist_result);
        if ($num_rows > 0) {
            if (password_verify($login_password, $rows['password'])) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['username'] = $rows['username'];
                $_SESSION['user_id'] = $rows['user_id'];
            } else {
                $staticModallogin = true;
                $pass_varify = true;
            }
        } else {
            $staticModallogin = true;
            $user_exists_verify = false;
            echo '';
        }
    } else {
        echo 'ERROR!' . mysqli_error($con);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">LogIn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body w-75">
                <?php include 'includes/action_url.php' ?>

                <form action="<?php set_action_url(); ?>" method="post">
                    <div class="form-group">
                        <label for="forEmail">Email:</label>
                        <input type="email" name="loginEmail" id="loginEmail" class="form-control" placeholder="Enter Your Email" aria-describedby="helpId">

                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="Password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Enter Your Password">

                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>


            </div>
            <?php if ($pass_varify == false) { ?>
                <div class='alert alert-danger' role='alert'>
                    <strong>pasword does'nt match</strong>
                </div>
            <?php } ?>
            <?php if ($user_exists_verify == false) { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>user not exists please signup</strong>
                </div>
            <?php } ?>
            <input type="hidden" name="" id="stacticLoginmodal" value="<?php echo $staticModallogin ?>">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>

        </div>
    </div>
</div>

<body>

</body>

</html>