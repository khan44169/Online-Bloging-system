            <!-- checking which url should go on signup action -->
            <?php
            function set_action_url()
            {
                // return htmlentities($_SERVER['PHP_SELF'] . '?category=' . $_GET['category']);
                $current_url =  htmlentities($_SERVER['PHP_SELF']);
                if (substr($current_url, 15, 11) == 'threads.php') {
                    echo $current_url . '?category=' . $_GET['category'];
                } elseif (substr($current_url, 15, 12) == 'question.php') {

                    echo $current_url . '?question_id=' . $_GET['question_id'];
                } else {
                    echo $_SERVER['PHP_SELF'];
                }
            }

            ?>