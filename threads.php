<?php session_start(); ?>
<?php include 'includes/connectDb.php' ?>
<?php include 'includes/bootstrap_cdn.php' ?>
<?php include 'includes/loginmodal.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <script src="script.js"></script> -->
    <?php include 'includes/bootstrap_cdn.php' ?>

</head>

<body>
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/signupmodal.php'; ?>

    <?php
    $category = htmlspecialchars($_GET['category']);
    // echo $category;
    $sql = "SELECT * FROM category WHERE category_id='$category'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die('lol');
    } ?>
    <div class="container">
        <div class="jumbotron text-white bg-dark my-3">
            <h1 class="display-5">Welcome To <?php echo $row['category_name'] ?> </h1>
            <p class="lead"><?php echo $row['category_desc'] ?></p>
            <hr class="my-2">
            <p></p>
            <p class="lead"><?php if (isset($_SESSION["loggedIn"])) { ?>
                    <a class="btn btn-primary btn-lg" href="./postNew_question.php" role="button">Ask Question</a>
                <?php } else { ?>
                    <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#loginModal" role="button">Ask Question</a>
                <?php } ?>
            </p>
        </div>
    </div>

    <div class="container">
        <h1 class="display-3">Questions</h1>

        <!-- fetching question from database  -->
        <?php
        $category = htmlspecialchars($_GET['category']);
        $select_questions = "SELECT * FROM `question` WHERE question_cat_id=$category";
        $select_question_result = mysqli_query($con, $select_questions);


        while ($row = mysqli_fetch_assoc($select_question_result)) {
            echo '<div class="media">
            <img class="mr-3" style="width:5%" src="usericon.png" alt="">
            <div class="media-body">
                <h5 class="mt-0"><a href="question.php?question_id=' . $row["question_id"] . '">' . $row["question_title"] . '</a></h5>
                ' . $row["question_desc"] . '
            </div>
        </div>';
        }
        ?>
    </div>


    <?php include 'includes/jquery.php' ?>
    <script src="script.js"></script>

</body>

</html>