<?php
include 'db.php';
session_start();

if(isset($_REQUEST['LOGIN'])){
    $uid =strip_tags($_REQUEST['username']);
    $pwd =strip_tags($_REQUEST['password']);

    try{
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':username'=>$uid, ':password'=>$pwd));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

   if($sql->rowCount() > 0){
    if($row['username'] == $uid && $row['password'] == $pwd){
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        header('location: index.php');
    }else{
        echo "Invalid username or password";
    }
   }else{
    echo "Invalid username or password";
   }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>