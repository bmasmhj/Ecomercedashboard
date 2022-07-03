
<?php 

require 'conn.php' ;


if(isset($_POST['changestatus'])){
    require 'statusfunction.php';
    $id =  $_POST['changestatus'];
    $status = $_POST['stat'];
    $update = "UPDATE tbl_order SET status = '$status' WHERE id = '$id' ";
    if ($con->query($update)) {
        echo statofproduct($status);
    }
}
if(isset($_POST['changepstatus'])){
    $id =  $_POST['changepstatus'];
    $status = $_POST['stat'];
    $update = "UPDATE product SET status = '$status' WHERE id = '$id' ";
    if ($con->query($update)) {
    }
}


else if(isset($_POST['cnewps'])){
    session_start();
    $username = $_SESSION['receptionuser'];
    $new = $_POST['cnewps'];
    $password = $_POST['oldpw'];
    $chewckuser = "SELECT * FROM admin WHERE username = '$username'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $changepw = password_hash($new, PASSWORD_BCRYPT);
                $sql = "UPDATE admin SET password = '$changepw' , status = 'changed' WHERE username = '$username' ";
                if ($con->query($sql)) {
                     echo "sucess"; 
                     $_SESSION['password'] = $new;
                }
            }else{
                echo "oldwrong";  
            }
        }else {
            echo "error";

        }
}
else if(isset($_POST['updatereceptname'])){
    $name = $_POST['updatereceptname'];
    session_start();
    $username = $_SESSION['receptionuser'];
    $sql = "UPDATE admin SET name = '$name' WHERE username = '$username' ";
    if ($con->query($sql)) {
        echo "sucess"; 
    }else{
        print_r($_POST);
    }

}
else if(isset($_POST['websitedataupdatesioefw'])){

    $websitename = $_POST['websitename'];
    $websitecontact= $_POST['websitenum'];
    $websiteemail = $_POST['websiteemail'];
    $websiteemergencynum = $_POST['emergencynum'];
    $websitelocation = $_POST['location'];

    $updatename = "UPDATE `websitedetail` SET `name`='$websitename',`num`='$websitecontact',`email`='$websiteemail',`locaation`='$websitelocation' WHERE 1";
    if ($con->query($updatename)) {
        // echo 'success';
        header('Location: ../setting.php?success');

        }
        else{
            die("Update failed $connection->error");
        }

}


?>