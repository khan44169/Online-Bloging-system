<?php session_start(); ?>
<!-- including importent files -->
<?php include 'includes/connectDb.php'; ?>
<?php include 'includes/bootstrap_cdn.php' ?>
<?php include 'includes/jquery.php' ?>
<?php include 'includes/loginmodal.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
<!-- including navigation bar -->
<?php include 'includes/navbar.php'; ?>
<!-- including signup modal -->
<?php include 'includes/signupmodal.php'; ?>



<body>

    <div class="container my-4">
        <h2 class="text-center">Talha's Forum - Browse Catogories</h2>
        <div class="row ">
            <!-- fetching categoeries from database and diplay into landing page -->
            <?php
            $fetchCatSQL = 'SELECT * FROM `category`';
            $result = mysqli_query($con, $fetchCatSQL);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                    <div class=" col-md-3 py-2">
                <div class="card h-100">
                    <img class="card-img-top" src="https://source.unsplash.com/random/500x400/?coding,' . $row['category_name'] . '" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><a href="threads.php?category=' . $row['category_id'] . '"> ' . $row['category_name'] . '</a></h5>
                        <p class="card-text">' . substr($row['category_desc'], 0, 90) . '...</p>
                        
                        <a href="threads.php?category=' . $row['category_id'] . '" class="btn btn-primary mt-auto " >See Thread</a>
                
                    </div>
                </div>
                </div>';
            }


            ?>

        </div>
    </div>




    <script src="script.js"></script>
</body>


</html>