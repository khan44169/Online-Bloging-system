<?php include 'includes/bootstrap_cdn.php' ?>
<?php include 'includes/jquery.php' ?>
<?php
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
    header('location:index.php');
}


?>
<?php include 'includes/loginmodal.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="script.js"></script>
</head>

<body>

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/signupmodal.php'; ?>

    <div class="container my-4 ">
        <!-- <div class="row"> -->
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">

                <!-- FORM STARTS HERE -->
                <form role="form" method="POST" action="<?php htmlentities($_SERVER['PHP_SELF']) ?>">
                    <div class="form-group">
                        <label class="control-label">Title:</label>
                        <input type="text" class="form-control" id="question_title" name="question_title">
                    </div>

                    <div class="form-group">
                        <label for="Description">Description : </label>
                        <textarea class="form-control" rows="8" id="question_desc" name="question_desc">

  						</textarea>
                        <div class="form-group my-4">
                            <label for="fortag">Tag:</label>
                            <input type="text" name="language_tag" id="language_tag" class="form-control" placeholder="Enter language" aria-describedby="helpId">

                        </div>
                        <button type="submit" class="btn btn-primary">Ask Question</button>
                </form>
                <script type="text/javascript">
                    CKEDITOR.replace('question_desc');
                </script>
                <?php
                include 'includes/connectDb.php';
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $question_title = $_POST['question_title'];
                    $question_desc = $_POST['question_desc'];
                    $question_tag = $_POST['language_tag'];
                    $sql_question_id = "SELECT category_id FROM category WHERE category_name='$question_tag'";
                    $result_question_id = mysqli_query($con, $sql_question_id);
                    $question_id_array = mysqli_fetch_assoc($result_question_id);
                    //echo $question_id['category_id'];
                    $question_id = $question_id_array['category_id'];
                    //getting user id from session
                    $user_id = $_SESSION['user_id'];

                    $sql_insert_question = "INSERT INTO `question` ( `question_title`, `question_desc`, `question_cat_id`,`user_id`) VALUES ('$question_title','$question_desc', $question_id,$user_id)";
                    $result_insert_question = mysqli_query($con, $sql_insert_question);
                    if ($result_insert_question) {
                        echo '<div class="alert alert-success" role="alert">
                            <strong>success</strong>
                        </div>';
                    }
                }


                ?>




</body>

</html>