<?php require 'header.php';
    require 'main/statusfunction.php';
$statsarr = array("ordered","packaging","delevering","delivered","cancelled","returned")
 ?>
 <style>
     .modal{
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        overflow : scroll !important;
     }
     .modal-dialog{
        max-width : 50% !important;
        margin : 9rem auto !important;
     }
     #reportimage{
         width: 100%!important;
     }

 </style>
<link href="dist/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="dist/css/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
<div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Orders</div>

          </h1>

    <div class="section-body">
      <div class="card">
        <div class="card-body">

       
      <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>Date</th>
                <th>Invoice</th>
                <th>Product</th>
                <th>Email</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Location</th>
                <th>Status</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($tbl_orderdata as $key => $orderdata) {
             ?>

            <tr id='row_<?php echo $orderdata['id']?>'>
            <td ><?php echo $orderdata['date']?></td>

                <td ><?php echo $orderdata['invoice']?></td>
                <td><?php echo $orderdata['productname']?></td>
                <td ><?php echo $orderdata['email']?></td>
                <td ><?php echo $orderdata['quantity']?></td>
                <td ><?php echo $orderdata['price']?></td>
                <td ><?php echo $orderdata['total']?></td>
                <td ><?php echo $orderdata['location']?></td>
                <td >
                <select name="" onchange="orderstatus(<?php echo $orderdata['id']?>)" class="form-control" id="statchangedval_<?php echo $orderdata['id']?>">
                    <?php 
                        foreach($statsarr as $key => $statval){
                            if( $orderdata['status'] == $statval){
                                echo '<option selected>'.$statval.'</option>';

                            }else{
                                echo '<option>'.$statval.'</option>';

                            }
                        }
                    ?>

                </select>
            </td>
                <td id='changestat_<?php echo $orderdata['id']?>'> <?php  $stat = strtolower($orderdata['status']); echo statofproduct($stat); ?> </td>
                
            </tr>
                <?php } ?>
        </tbody>
      </table>
      </div>
      </div>
      
</div>

</section>
</div>
<?php require 'footer.php' ?>
<!-- Datatables js -->
<script src="dist/modules/table/jquery.dataTables.min.js"></script>
<script src="dist/modules/table/dataTables.bootstrap5.js"></script>
<script src="dist/modules/table/dataTables.responsive.min.js"></script>
<script src="dist/modules/table/responsive.bootstrap5.min.js"></script>

<!-- Datatable Init js -->
<script src="dist/modules/table/demo.datatable-init.js"></script>

 <script src="reception.js"></script>


 <script>
     function orderstatus(id){
        var val =  $('#statchangedval_'+id).val();
        $.ajax({
        url : 'main/update.php',
        data: {'changestatus' : id, 'stat' : val},
        method : 'post',
        dataType : 'text',
        success :function (response){
                $('#changestat_'+id).html(response);
            }
        });
        
     }
 </script>