<?php 

require 'main/conn.php';

if(isset($_POST['lpmsadmin'])){
    $username = $_POST['lpmsadmin'];
    $password = $_POST['password'];
    $chewckuser = "SELECT * FROM admin WHERE username = '$username'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            $fetch_name = $fetch['name'];
            if(password_verify($password, $fetch_pass)){
                session_start();
                $_SESSION['lpmsadmin'] = $username;
                $_SESSION['password'] = $password;
                echo "success";
            }else{
                echo "wronguser";
            }
        }else{
            echo "nouser";
        }
}
?>