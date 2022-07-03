<?php require 'conn.php' ?>

<?php 



if(isset($_POST['deleteuser'])){

    $id = $_POST['deleteuser'];
    $sql = "DELETE FROM usertable WHERE id = '$id' ";
    if ($con->query($sql)) {

        echo 'deleted';
    }
    else{
        echo 'failed';
    }
    

}
else if(isset($_POST['deletesocial'])){

    $id = $_POST['deletesocial'];
    $sql = "DELETE FROM socialmedia WHERE id = '$id' ";
    if ($con->query($sql)) {
        echo 'success'; 
    }
    else{
        echo 'failed';
    }
    

}
else if(isset($_POST['deletecategory'])){

    $id = $_POST['deletecategory'];
    $sql = "DELETE FROM category WHERE id = '$id' ";
    if ($con->query($sql)) {
        echo 'success'; 
    }
    else{
        echo 'failed';
    }
    

}
else if(isset($_POST['deletesub'])){

    $id = $_POST['deletesub'];
    $sql = "DELETE FROM newsletter WHERE id = '$id' ";
    if ($con->query($sql)) {
        echo 'success'; 
    }
    else{
        echo 'failed';
    }
    

}
else if(isset($_POST['deletethismail'])){

    $id = $_POST['deletethismail'];
    $sql = "DELETE FROM contact WHERE id = '$id' ";
    if ($con->query($sql)) {
        echo 'success'; 
    }
    else{
        echo 'failed';
    }
    

}



?>
