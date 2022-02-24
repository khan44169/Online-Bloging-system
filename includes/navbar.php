<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand " href="index.php"> Forum</a>
    <button class="navbar-toggler d-lg-none " type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="aboutus.php">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="contact.php">Contact</a>
            </li>
            <?php if (isset($_SESSION['loggedIn'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="postNew_question.php" id="">Ask Question</a>

                </li>
            <?php } ?>



        </ul>

        <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
            <input class="form-control mr-sm-2" type="text" id='search_item' name="search_item" placeholder="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="nav-item">
            <?php if (isset($_SESSION['loggedIn']) == false) {
            ?>
                <button name="" id="" class=" btn btn-primary mx-2" data-toggle="modal" data-target="#loginModal">logIn</button>
                <button name="" id="signupbtn" class="btn btn-primary" data-toggle="modal" data-target="#signupModal">signUp</button>
            <?php } else { ?>
                <form class="form-inline my-2 mx-2 " action="includes/logout.php" method="get"><input type="submit" class="btn btn-primary " value="Logout"></form>
            <?php } ?>
        </div>
    </div>
    </div>

</nav>