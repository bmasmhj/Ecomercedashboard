<?php 
session_start();
require 'main/data.php';

if(isset($_SESSION['lpmsadmin']) && isset($_SESSION['password'])){
    require 'main/conn.php';
    $username = $_SESSION['lpmsadmin'];
    $password = $_SESSION['password'];
    $usernames = base64_decode($username);
    $chewckuser = "SELECT * FROM admin WHERE username = '$username'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $name = $fetch['name'];
            }else{
                session_start();
                session_unset();
                session_destroy();
                header('Location: login.php');
            }
        }else{
            session_start();
            session_unset();
            session_destroy();
            header('Location: login.php');
       
        }
}
else{
    header('Location: login.php');
}

?>