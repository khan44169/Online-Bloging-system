<?php
include 'connectDb.php';
include 'bootstrap_cdn.php';
$question_id = $_GET['question_id'];
echo ($question_id);
$sql = "SELECT * FROM comments";
$result = mysqli_query($con, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="media" id="comment_media" >
                <img class="mr-3" style="width:5%" src="usericon.png" alt="">
                <div class="media-body" id="comment_display" >' . $row['comment_desc'] . '
                </div>
            </div>';
    }
}
