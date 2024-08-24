<?php
session_start();

include 'config.php';

if(isset($_GET['token'])){

    $token = $_GET['token'];
    mysqli_query($conn,"UPDATE users set status='active' where token='$token'");
}
?>