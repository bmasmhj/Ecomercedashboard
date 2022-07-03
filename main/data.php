<?php 

require 'conn.php';

$websitename = 'Ramesh Dhami';
$websitenum = '+977 9845 454545';
$websiteemail = 'rameshdhami@email.com';
$websitelocation = 'Patan Lalitpur , 44700 - Nepal';
$pid = '';
$did = '';

$websitefb = '';
$websitetwitter = '';
$websiteinsta = '';
$lpmsname = 'Login';
$name = '';
$email = '';

$websitedetailsql = "SELECT  * FROM websitedetail LIMIT 1";
$websitedetailresult = $con->query($websitedetailsql);
    if ($websitedetailresult->num_rows > 0) {
    while ($websitedetailrow = $websitedetailresult->fetch_assoc()) {
        $websitename = $websitedetailrow['name'];
        $websitenum = $websitedetailrow['num'];
        $websiteemail = $websitedetailrow['email'];
        $websitelocation = $websitedetailrow['locaation'];

        $websitefb = '';
        $websitetwitter = '';
        $websiteinsta = '';
    }
} 

$userinfo ='';


  $psql = "SELECT * FROM province ORDER BY pid";
  $presult = $con->query($psql);
  $proviences = [];
  if ($presult->num_rows > 0) {
      while($provience = $presult->fetch_assoc()){
          array_push($proviences, $provience);
      }
      
  }
  $socialmediasql = "SELECT  * FROM socialmedia ";
$socialmediaresult = $con->query($socialmediasql);
$socialmediadata = [];
    if ($socialmediaresult->num_rows > 0) {
    while ($socialmediarow = $socialmediaresult->fetch_assoc()) {
        array_push($socialmediadata, $socialmediarow);
    }
} 

$fe = "SELECT  * FROM analytic ORDER BY id desc LIMIT 15";
  	$visitresult = $con->query($fe);
  	$visitdata = [];
      if ($visitresult->num_rows > 0) {
        while ($visitrow = $visitresult->fetch_assoc()) {
            array_push($visitdata, $visitrow);
        }
    }	
    

$usersql = "SELECT  * FROM usertable ";
$userresult = $con->query($usersql);
$userdata = [];
    if ($userresult->num_rows > 0) {
    while ($userrow = $userresult->fetch_assoc()) {
        array_push($userdata, $userrow);
    }
} 


$categorysql = "SELECT  * FROM category ";
$categoryresult = $con->query($categorysql);
$categorydata = [];
    if ($categoryresult->num_rows > 0) {
    while ($categoryrow = $categoryresult->fetch_assoc()) {
        array_push($categorydata, $categoryrow);
    }
} 


  $csql = "SELECT * FROM category ORDER BY id";
  $result = $con->query($csql);
  $categorys = [];
  if ($result->num_rows > 0) {
      while($category = $result->fetch_assoc()){
          array_push($categorys, $category);
      }
      
  }

  $contactsql = "SELECT  * FROM contact ORDER BY id desc  ";
  $contactresult = $con->query($contactsql);
  $contactdata = [];
  if ($contactresult->num_rows > 0) {
      while ($contactrow = $contactresult->fetch_assoc()) {
          array_push($contactdata, $contactrow);
          }
      }   

      $newslettersql = "SELECT  * FROM newsletter ORDER BY id desc  ";
      $newsletterresult = $con->query($newslettersql);
      $newsletterdata = [];
      if ($newsletterresult->num_rows > 0) {
          while ($newsletterrow = $newsletterresult->fetch_assoc()) {
              array_push($newsletterdata, $newsletterrow);
              }
          }   
    



if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $sql = "SELECT * FROM districts where p_id = $pid ORDER BY dname";
    $result = $con->query($sql);

    $html = "<option selected disabled>- - - SELECT DISTRICT - - -</option>";
    if ($result->num_rows > 0) {
        while($district = $result->fetch_assoc()){
            $html .=  "<option value='" . $district['did'] . "'>$district[dname]</option>";
        }
    }
    echo $html;
}


  $usersql = "SELECT  * FROM usertable ORDER BY id desc  ";
    $userresult = $con->query($usersql);
    $userdata = [];
    if ($userresult->num_rows > 0) {
      while ($userrow = $userresult->fetch_assoc()) {
          array_push($userdata, $userrow);
      }
  }	


  $productsql = "SELECT  * FROM product ORDER BY id desc  ";
  $productresult = $con->query($productsql);
  $productdata = [];
  if ($productresult->num_rows > 0) {
    while ($productrow = $productresult->fetch_assoc()) {
        array_push($productdata, $productrow);
    }
}	


$tbl_ordersql = "SELECT  * FROM tbl_order ORDER BY id desc  ";
$tbl_orderresult = $con->query($tbl_ordersql);
$tbl_orderdata = [];
if ($tbl_orderresult->num_rows > 0) {
  while ($tbl_orderrow = $tbl_orderresult->fetch_assoc()) {
      array_push($tbl_orderdata, $tbl_orderrow);
  }
}	



?>

<?php 

$user_sql = "SELECT COUNT(id) FROM usertable ";
$tbl_order_sql = "SELECT COUNT(id) FROM tbl_order ";
$product_sql = "SELECT COUNT(id) FROM product ";
$category_sql = "SELECT COUNT(id) FROM category ";





$user_result = mysqli_query($con,$user_sql);
$tbl_order_result = mysqli_query($con,$tbl_order_sql);
$product_result = mysqli_query($con,$product_sql);
$category_result = mysqli_query($con,$category_sql);




$user_row = mysqli_fetch_array($user_result);
$category_row = mysqli_fetch_array($category_result);
$product_row = mysqli_fetch_array($product_result);
$tbl_order_row = mysqli_fetch_array($tbl_order_result);



$user_count = $user_row[0];
$product_count = $product_row[0];
$category_count = $category_row[0];
$tbl_order_count = $tbl_order_row[0];



?>
