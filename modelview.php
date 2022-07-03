  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<?php 
require 'controller/connection.php';

if(isset($_POST['viewapoint'])){
	$id = $_POST['viewapoint'];


  $appointmentsql = "SELECT  * FROM appointment  WHERE id = '$id' ";
  $appointmentresult = $con->query($appointmentsql);
  $appointmentdata = [];
  if ($appointmentresult->num_rows > 0) {
    while ($appointmentrow = $appointmentresult->fetch_assoc()) {

$name = $appointmentrow['fullname'];
$docname = $appointmentrow['docname'];
$department = $appointmentrow['department'];
$reason = $appointmentrow['reason'];
$date = $appointmentrow['appointdate'];
$email = $appointmentrow['docname'];
$address = $appointmentrow['address'];
$age = $appointmentrow['age'];
$phone = $appointmentrow['phone'];
$gender = $appointmentrow['gender'];
$invoice = $appointmentrow['invoice'];
$status = $appointmentrow['status'];




    	echo '<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">'.$name.'</h4>
        <button type="button" onclick="closemodel()" class="btn ion ion-close-round" ></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <ul class="list-group">
      <li class="list-group-item "><strong>Invoice :</strong> '.$invoice.'</li>
        <li class="list-group-item "><strong>Address :</strong> '.$address.'</li>
        <li class="list-group-item"><strong>Email :</strong> '.$email.'</li>
        <li class="list-group-item"><strong>Age :</strong> '.$age.'</li>
        <li class="list-group-item"><strong>Gender :</strong> '.$gender.'</li>
        <li class="list-group-item"><strong>Number :</strong> '.$phone.'</li>
        <li class="list-group-item"><strong>Status :</strong> '.$status.'</li>
        <li class="list-group-item"><strong>Doctor :</strong> '.$docname.'</li>
        <li class="list-group-item"><strong>Department :</strong> '.$department.'</li>
        <li class="list-group-item"><strong>Date :</strong> '.$date.'</li>
        <li class="list-group-item"><strong>Reason :</strong> '.$reason.'</li>
      </ul>
      </div>
    </div>
  </div>';
        
        }
    }  
 	

}
?>

  