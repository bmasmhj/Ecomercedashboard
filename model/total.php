<div class="row mt-4">
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-icon bg-primary">
        <i class="ion ion-bag"></i>
        </div>
        <div class="card-wrap">
        <div class="card-header">
            <h4>Total Products</h4>
        </div>
        <div class="card-body">
        <?php echo $product_count?>

        </div>
        </div>
    </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-icon bg-danger">
        <i class="ion ion-person"></i>
        </div>
        <div class="card-wrap">
        <div class="card-header">
            <h4>Total Users</h4>
        </div>
        <div class="card-body">
            <?php echo $user_count?>
        </div>
        </div>
    </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-icon bg-warning">
        <i class="ion ion-cube"></i>

        </div>
        <div class="card-wrap">
        <div class="card-header">
            <h4>Total Orders</h4>
        </div>
        <div class="card-body">
        <?php echo $tbl_order_count ?>
        </div>
        </div>
    </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-icon bg-dark">
        <i class="ion ion-document-text"></i>
        </div>
        <div class="card-wrap">
        <div class="card-header">
            <h4>Total Categories</h4>
        </div>
        <div class="card-body">
         <?php echo $category_count?>
        </div>
        </div>
    </div>
    </div>
</div>
