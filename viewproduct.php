<?php
include("components/header.php");
?>
 <!-- Blank Start -->
 <div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded  mx-0">
        <div class="col-md-12">
            <!-- Blank End -->
            <h6 class="mb-4">All Products</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead> 
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Image</th>
                            <th scope="col" class="px-5" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $pdo->query("SELECT products.*, categories.catName
                        FROM products 
                        INNER JOIN categories ON products.productcatId = categories.catId;");
                        $prorow = $query ->fetchAll(PDO::FETCH_ASSOC);
                        foreach($prorow as $values){
                        ?>
                        <tr>
                            <td scope="row"><?php echo $values['productId']?></td>
                            <td><?php echo $values['productName']?></td>
                            <td><?php echo $values['productPrice']?></td>
                            <td><?php echo $values['productDescription']?></td>
                            <td><?php echo $values['catName']?></td>
                            <td><?php echo $values['productQuantity']?></td>
                            <td><img src="<?php echo $productref.$values['productImage']?>" 
                            alt="" width="80px"></td>
                            <td><a href="updateproduct.php?pId=<?php echo $values['productId'] ?>" 
                            class="btn btn-success">Edit</a></td>
                            <td><a href="?prodeleteKey=<?php echo $values['productId'] ?>" 
                            class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>   
<?php
include("components/footer.php");
?>
