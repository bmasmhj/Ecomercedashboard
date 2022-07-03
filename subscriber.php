<?php require 'header.php' ?>
<?php $name = 'testname'; ?>
<style>
    .emaillist:hover {
    background: #eef2f7!important;
    cursor : pointer;

}
.font-weight-bold{
    font-weight: bold;
    }
.text-ll{
    color: #6c757d;
}
</style>
<link href="dist/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="dist/css/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
<div class="main-content">
    <section class="section">
        <h1 class="section-header">
        <div>Newsletter Subscribers</div>
        </h1>
    </section>
            
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Emails</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($newsletterdata as $key => $newsletterval) {
                        ?>

                        <tr id='row_<?php echo $newsletterval['id']?>'>
                            <td ><?php echo $newsletterval['email']?></td>
                            <td ><a href="javascript:deletesub(<?php echo $newsletterval['id']?>)"><i class="ion-trash-b email-action-icons-item"></i></a></td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>                         
            </div>
        </div>
    </div>
  
</div>
<?php require 'footer.php' ?>

<!-- Datatables js -->
<script src="dist/modules/table/jquery.dataTables.min.js"></script>
<script src="dist/modules/table/dataTables.bootstrap5.js"></script>
<script src="dist/modules/table/dataTables.responsive.min.js"></script>
<script src="dist/modules/table/responsive.bootstrap5.min.js"></script>

<!-- Datatable Init js -->
<script src="dist/modules/table/demo.datatable-init.js"></script>


