<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    session_start();
    session_unset();
    session_destroy();
    header('location:../index.php');
    exit();
}
