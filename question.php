<?php session_start(); ?>
<?php include 'includes/connectDb.php' ?>
<?php include 'includes/loginmodal.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/bootstrap_cdn.php' ?>
    <style>
        pre {
            color: azure;
        }
    </style>

</head>

<body>
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/signupmodal.php'; ?>

    <?php
    $question = htmlEntities($_GET['question_id']);
    // echo $category;
    $sql = "SELECT * FROM question WHERE question_id='$question'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        //fetching username of user who question 
        $user_sql = "SELECT * FROM users WHERE user_id = $user_id ";
        $result_user = mysqli_query($con, $user_sql);
        $user_row = mysqli_fetch_assoc($result_user);
        echo '<div class="container">
        <div class="jumbotron text-white bg-dark my-3">
            <h2 class="display-5">' . $row['question_title'] . ' </h2>
            <p class="lead"></p>
            <hr class="my-2">
            <p style="color:red">' . $row['question_desc'] . '</p>
            
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#comment_container" role="button">comment</a>
            </p>
            <div class="float-right">  <p >posted by ' . $user_row['username'] . '</p></div>
        </div>
        
        </div>';
    } else {
        die('lol');
    }

    ?>
    <div class="container" id='display_comment'>
        <h1 class="">Comments</h1>
        <!-- fetching comments from database -->
        <?php
        $question_id = $_GET['question_id'];
        // echo ($question_id);

        $sql = "SELECT * FROM comments WHERE question_id=$question_id";
        $result = mysqli_query($con, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['user_id'];
                $user_sql1 = "SELECT * FROM users WHERE user_id = $user_id ";
                $result_user1 = mysqli_query($con, $user_sql1);
                $user_row1 = mysqli_fetch_assoc($result_user1);


                echo '<div class="media" id="comment_media" >
                <img class="mr-3" style="width:5%" src="usericon.png" alt="">
                
                <div class="media-body" id="comment_display" ><h5 class="mt-0">' .  $user_row1['username'] . '</h5>
                ' . $row['comment_desc'] . '
                </div>
            </div>';
                // $comment_desc = $row['comment_desc'];
                // $return_arr[] = array("comment_desc" => $comment_desc);
            }
        }
        // echo json_encode($return_arr);
        ?>
    </div>
    <div class="container my-4" id="comment_container">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>?question_id=<?php echo $_GET['question_id'] ?>" id="add_comment" method="post">

            <div class="form-group">
                <label for="forComment">
                    <h5>Comment:</h5>
                </label>
                <textarea class="form-control" name="comment_desc" id="comment_desc" rows="3"></textarea>
            </div class="form-group">
            <?php if (isset($_SESSION['loggedIn'])) { ?>
                <div><button type="submit" class="btn btn-primary float-right" id="comment_btn">Comment</button></div>
            <?php } else { ?>
                <div> <button type='button' name="" id="" class=" btn btn-primary float-right" data-toggle="modal" data-target="#loginModal">Comment</button>
                </div>
            <?php } ?>

        </form>
    </div>

    <!-- addig comment into database -->
    <?php
    $question_id = $_GET['question_id'];
    if (isset($_POST['comment_desc'])) {
        $comment_desc = htmlspecialchars($_POST['comment_desc']);
        $comment_desc = mysqli_real_escape_string($con, $comment_desc);
        $user_id = $_SESSION['user_id'];
        $sql = "INSERT INTO comments(comment_desc,question_id,user_id) VALUES ('$comment_desc',$question_id,$user_id)";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo '<div id="ok">ok</div>';
        } else {
            echo '<div id="ok">lol</div>';
            echo mysqli_error($con);
        }
    }
    ?>



    <?php include 'includes/jquery.php' ?>
    <script type="text/javascript">
        $(document).ready(function() {

            //##### Add record when Add Record Button is click #########
            $("#add_comment").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: window.location.href,
                    data: $(this).serialize(),
                    success: function(response) {
                        // console.log(response);
                        if (response) {
                            console.log(jQuery.trim(response));
                            $('#add_comment').trigger('reset');
                            $.ajax({

                                url: window.location.href,
                                success: function(response) {
                                    var display_comments = $($.parseHTML(response)).filter('#display_comment');
                                    console.log(display_comments);
                                    $('#display_comment').html(display_comments);





                                }
                            });
                        } else {
                            console.log('somthing went wrong')
                        }



                    },
                    error: function(error) {
                        console.log(error)
                    }
                });


            });


        });
    </script>



</body>

</html>