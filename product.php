<?php require 'header.php';
  $statsarr = array("active","featured","out of stock","hide");
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
              <div>Products</div>
              <button onclick='addproduct()' class='btn btn-success float-right'>Add Product</button>

            </h1>

      <div class="section-body">
        <div class="card">
          <div class="card-body">

        
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
          <thead>
              <tr>
                <th>S.N</th>
                  <th>Product Name</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($productdata as $key => $productdata) {
                  $sn = $key+1;
              ?>

              <tr id='row_<?php echo $productdata['id']?>'>
              <td><?php echo $sn?></td>
                  <td id='patienname_<?php echo $productdata['id']?>'><?php echo $productdata['name']?></td>
                  <td>
                    <img onclick="viewimg(<?php echo $productdata['id']?>)" id='imagesrc_<?php echo $productdata['id']?>' class='data-record' src='<?php echo $productdata['image']?>'/>
                  </td>
                  <td id='nameofrecord_<?php echo $productdata['id']?>'><?php echo $productdata['category']?></td>
                  <td id='detail_<?php echo $productdata['id']?>'><?php echo $productdata['price']?></td>

                  <td id='detail_<?php echo $productdata['id']?>'><?php echo $productdata['description']?></td>
                  <td>
                    <div class='d-flex'>

                  <select name="" onchange="productstatus(<?php echo $productdata['id']?>)" class="form-control" id="statchangedval_<?php echo $productdata['id']?>">
                      <?php 
                          foreach($statsarr as $key => $statval){
                              if( $productdata['status'] == $statval){
                                  echo '<option selected>'.$statval.'</option>';

                              }else{
                                  echo '<option>'.$statval.'</option>';

                              }
                          }
                      ?>

                  </select>
                      <button  class='btn btn-danger mx-2 m-0 p-2' onclick="removeproduct(<?php echo $productdata['id']?>)"> <h6 class='p-0 m-0 ion-trash-b text-white'></h6></button>  </td>
                      </div>
              
                    </tr>
                  <?php } ?>
          </tbody>
        </table>
        </div>
        </div>
        
  </div>
  <div class="modal" id="preview">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='productname'></h4>
          <button type="button" onclick="closemodel()" class="btn ion ion-close-round" ></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body" id='productimage'>
                
        
        </div>
      </div>
    </div>
  </div>

  <?php require 'editproduct.php'?>

  <?php require 'addproduct.php'?>



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

 <script>
     
 </script>