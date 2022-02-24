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

    <div class="container my-4">
        <h1 class="display-5">Search Result Of <?php echo htmlspecialchars($_GET['search_item']); ?></h1>
    </div>
    <!-- fetching search result from database  -->
    <?php

    $search_item = htmlspecialchars($_GET['search_item'], ENT_QUOTES, 'UTF-8');
    $search_sql = "SELECT * FROM question WHERE MATCH(question_title,question_desc) AGAINST('$search_item')";
    $search_result = mysqli_query($con, $search_sql);

    if ($search_result) {
        $search_num_rows = mysqli_num_rows($search_result);
        if ($search_num_rows > 0)

            while ($rows = mysqli_fetch_assoc($search_result)) {
                echo '<div class="container">

                <div class="media">
                    <img class="mr-3" style="width:5%" src="usericon.png" alt="">
        
                    <div class="media-body">
                        <h4><a href="#">' . $rows['question_title'] . '</a></h4>
                        <h5 class="mt-2"><a>' . $rows['question_desc'] . '</a></h5>
                    </div>
                </div>
            </div>';
            }
        else {
            echo '<div class="container" style="background-color:#F8F9FA"><h3>Sorry!</h3>No Result Found for  ' . $search_item . '</p></div>';
        }
    } else {
        echo 'EROOR' . mysqli_error($con);
    }

    ?>



    <?php include 'includes/jquery.php' ?>
    <script src="script.js"></script>

</body>

</html>