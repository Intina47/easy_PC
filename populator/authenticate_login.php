<?php
include 'db.php';
echo "Starting session!";
session_start();
if(isset($_SESSION["user_login"])){
    header("location:addproduct.php");
    die();
}
if(isset($_REQUEST['Login_btn'])){
    echo " Reading session!";
    $uid =strip_tags($_REQUEST['username']);
    $pwd =strip_tags($_REQUEST['password']);
    try{
        $sql = "SELECT * FROM user WHERE Email = :usename AND Password = :pass";
        $stmt = $mysql->prepare($sql);
        $stmt->execute(array(':usename'=>$uid, ':pass'=>$pwd));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

   if($stmt->rowCount() > 0){
    if($row['username'] == $uid && $row['password'] == $pwd){
        $_SESSION['user_login'] = $row['User_ID'];
        header('refresh:2; addproduct.php');
        echo "Login Successful!";
    }else{
        echo "Invalid Login Details, try again";
    }
   }else{
    echo "Invalid Login Details, try again";
   }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>