<?php


require 'conn.php';

if(isset($_POST['saveproduct'])){
    print_r($_POST);
    print_r($_FILES);

    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $quantitytype = $_POST['quantitytype'];

    

    $pid = $_POST['provience'];
    $did = $_POST['district'];
    $street = $_POST['street'];

    $randcode =  uniqid();

    $names = $name.$category.$randcode;
    $codez = str_replace( " " , "_" ,$names);
    $productcode = strtolower($codez);

    $sql = "SELECT * FROM province WHERE pid = '$pid'";
    $result = $con->query($sql);
    $proviences = [];
    if ($result->num_rows > 0) {
        while($proviencerow = $result->fetch_assoc()){
             $provience = $proviencerow['pname'];
        }
        
    }
    $sql = "SELECT * FROM districts WHERE did = '$did'";
    $result = $con->query($sql);
    $districts = [];
    if ($result->num_rows > 0) {
        while($districtrow = $result->fetch_assoc()){
            $district = $districtrow['dname'];
        }
        
    }

    $location =$provience.', '.$district.' - '.$street;
    echo $location;

    if (isset($_FILES['thumbnail'])) {
        $tmpFilePath = $_FILES['thumbnail']['tmp_name'];
        if ($tmpFilePath != ""){
          $maxsize = 524288895959;
          $extsAllowed = array( 'jpg', 'jpeg', 'png' );
          $uploadedfile = $_FILES['thumbnail']['name'];
          $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
          if (in_array($extension, $extsAllowed) ) {
            $newpicture = uniqid();
            $url = $newpicture.$uploadedfile ;
            $imgname = "../../Ecomerce/assets/images/products/".$url;
            $result = move_uploaded_file($_FILES['thumbnail']['tmp_name'], $imgname);
            $imageofrecord = "http://localhost/Ecomerce/assets/images/products/".$url;
          }
      }
      else{
          echo "file unp";
      }
    }

    $sql = "INSERT INTO `product`( `name`, `productcode`, `category`, `image`, `price`, `description`, `rating`, `quantity`, `quantityname`, `ratingcount`, `location`, `pid`, `did`, `street`, `status`) VALUES 
                        ('$name','$productcode','$category','$imageofrecord','$price','$description','0','$quantity','$quantitytype','0','$location','$pid','$did','$street','0')";
 if($con->query($sql)){
    header('Location: ../product.php?success');
}

}
else if(isset($_POST['socialmediaurl'])){
    
    $socialmediaurl = $_POST['socialmediaurl'];
    $socialname = $_POST['socialname'];
    $socialicon =  $_POST['socialicon'];

    

    $insert = "INSERT INTO `socialmedia`(`name`, `url`, `icon`) VALUES ('$socialname','$socialmediaurl','$socialicon')";
    if ($con->query($insert)) {
        $fetch = "SELECT * FROM socialmedia";
        $fetchresult = $con->query($fetch);
        if ($fetchresult->num_rows > 0) {
            while ($fetchrow = $fetchresult->fetch_assoc()) {
                echo '
                    <tr id="socialrow_'.$fetchrow['id'].'">
                        <td class="table-user">
                           <i class ="'.$fetchrow['icon'].'"></i>
                        </td>
                        <td>'.$fetchrow['name'].'</td>
                        <td>'.$fetchrow['url'].'</td>
                        <td class="table-action">
                            <a onclick="deletesocial('.$fetchrow['id'].')" class="action-icon"> <i class="ion-trash-b"></i></a>
                        </td>
                    </tr>
                ';
            }
        } 
    }
    else{
        die("Update failed $con->error");

    }
}
else if(isset($_POST['categoryname'])){
    $category = $_POST['categoryname'];

    $catcode = str_replace(" ","_", strtolower($category)) ;

    if (isset($_FILES['thumbnail'])) {
        $tmpFilePath = $_FILES['thumbnail']['tmp_name'];
        if ($tmpFilePath != ""){
          $maxsize = 524288895959;
          $extsAllowed = array( 'jpg', 'jpeg', 'png' );
          $uploadedfile = $_FILES['thumbnail']['name'];
          $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
          if (in_array($extension, $extsAllowed) ) {
            $newpicture = uniqid();
            $url = $newpicture.$uploadedfile ;
            $name = "../../Ecomerce/assets/images/products/".$url;
            $result = move_uploaded_file($_FILES['thumbnail']['tmp_name'], $name);
            $imageofrecord = "http://localhost/Ecomerce/assets/images/products/".$url;
          }
      }
    }
    else{
        $imageofrecord = 'default.png';
    }


    $insert = "INSERT INTO `category`(`name`, `catcode`, `image`, `status`) VALUES ('$category','$catcode','$imageofrecord','0')";
    if ($con->query($insert)) {
        $fetch = "SELECT * FROM category";
        $fetchresult = $con->query($fetch);
        if ($fetchresult->num_rows > 0) {
            while ($fetchrow = $fetchresult->fetch_assoc()) {
                echo '
                    <tr id="socialrow_'.$fetchrow['id'].'">
                        <td> '.$fetchrow['name'].'</td>
                        <td><img style="height:40px;width:40px" src="'.$fetchrow['image'].'"></td>

                        <td class="table-action">
                            <a href="javascript:deletecategory('.$fetchrow['id'].')" class="action-icon"> <i class="ion  ion-trash-b"></i></a>
                        </td>
                    </tr>
                    
                ';
            }
        } 
    }
    else{
        die("Update failed $con->error");

    }
    
}

print_r($_POST);


?>