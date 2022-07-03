
<?php require 'header.php';
?>
<div class="main-content">
    <section class="section">
        <h1 class="section-header">
        <div>Categories</div>

        </h1>
    </section>
    <div class="container">
        <div class="card">
            <div class="card-body">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="categorydata">
                    <?php foreach($categorydata as $key => $categoryvalue) { ?>
                    <tr id="socialrow_<?php echo $categoryvalue['id'] ?>">
                        <td> <?php echo $categoryvalue['name'] ?></td>
                        <td><img style='height:40px;width:40px' src='<?php echo $categoryvalue['image'] ?>'></td>

                        <td class="table-action">
                            <a href="javascript:deletecategory(<?php echo $categoryvalue['id'] ?>)" class="action-icon"> <i class="ion ion-trash-b "></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form class="mt-3" id="addnewcategory" >
                <div class="mb-3 p-2">
                <label class="form-label">Add Category</label>
                    <div class="input-group">
                        <input type="file" required name='thumbnail' placeholder='image'>
                        <input class="form-control" name='categoryname' id="categoryname" type="text" placeholder='Category Name'>
                        <input class="btn btn-dark"  type="submit" name='addcategory' value="Submit">
                    </div>
                </div>
            </form>                                      
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php' ?>

<script>

$("#addnewcategory").submit(function(e){
e.preventDefault();

var category = $('#category').val();

if(category!=''){
    $('#category').removeClass('is-invalid');
    $.ajax({
        url: "main/adddata.php",
        method: 'POST',
        data: new FormData(this),
        contentType: false,
                    processData: false,
        success:function(data){
            var result = $.trim(data);
            if(result == 'fail'){
                
            }else{
                $('#categorydata').html(data); 
           }
           }
        }); 
    document.getElementById("addnewcategory").reset();

}else{
    $('#category').addClass('is-invalid');

}
});
</script>