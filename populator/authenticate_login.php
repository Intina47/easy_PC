<?php
include 'db.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $uid = mysqli_real_escape_string($db,$_POST['username']);
    $pwd = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$uid' and password = '$pwd'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if($count == 1) {
        session_register("uid");
        $_SESSION['login_user'] = $uid;

       // header("location: welcome.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>