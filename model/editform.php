<form action="adddata.php" method='post' enctype="multipart/form-data" >
    <label for="name">Product Name</label>
    <input class="form-control mb-3" type="text" name="name" placeholder="Product name">
    <label for="name">Select Category</label>
    <select class="form-control mb-3" name="category" >
        <option  selected disabled>Select category</option>
        <?php foreach($categorys as $key => $categorysval){
            echo ' <option  value="'.$categorysval['id'].'">'.$categorysval['name'].'</option>';
                
        }
        ?>
    </select>
    <label for="name">Upload Thumbnail</label>
    <input class="form-control mb-3" type="file" name="thumbnail" placeholder="Thumbnail">

    <label for="name">Price</label>
    <input class="form-control mb-3" type="number" name="price" id="" placeholder='Price'>

    <label for="name">Quantity</label>
    <input class="form-control mb-3" type="number" name="quantity" id="">
    
    <label for="name">Quantity type</label>
    <select class="form-control mb-3" name="quantitytype" >
        <option selected disabled>Select category</option>
        <option value="Kg">KG</option>
        <option value="Piece">Piece</option>

    </select>

    <label for="name"> Description</label>
    <textarea class="form-control mb-3" type="text" name="description" placeholder="Description"></textarea>

    <hr class="mt-5">
    <h4 class='text-center'> Location</h4>
    <hr class='mb-5'>
    <label for="name">Provience</label>
    <select class="form-control mb-3" class="form-control text-uppercase" name="provience" id="provience" >
        <option selected disabled>- - - SELECT PROVIENCE - - -</option>
        <?php foreach($proviences as $provience){ 
                if($provience['pname']!= 'NULL') {
                        echo ' <option  value="'.$provience['pid'].'">'.$provience['pname'].'</option>';
                
                }
            } 
        ?>
    </select>

    <label for="name">District </label>
    <select class="form-control mb-3" name="district" id="district" class="form-control mb-2" id="">
        <option selected disabled value="">- - - SELECT DISTRICT - - -</option>
    </select>

    <label for="name">Street</label>
    <input class="form-control mb-3" type="text" name="street" placeholder="Street">
    <input class="form-control mb-3" type="submit" name="saveproduct" value='Save'>
</form>
