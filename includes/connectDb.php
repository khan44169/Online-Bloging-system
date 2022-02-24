<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dataBase = 'forum';
$con = mysqli_connect($host, $user, $password, $dataBase);
if (!$con) {
    die('aap ne mujh se kuch kaha');
}
