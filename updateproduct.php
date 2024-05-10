<?php
include ("components/header.php");
if(isset($_GET['pid'])){
    $prostringid = $_GET['pid'];
    $query = $pdo->prepare("SELECT * FROM products WHERE productId=:pid");
    $query-> bindParam("pid",$prostringid);
    $query->execute();
    $proData = $query->fetch(PDO::FETCH_ASSOC);
}
?>
    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded mx-0">
                    <div class="col-md-12 ">
                       <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Update Product</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                <input type="hidden" value="<?php echo $proData['productId'] ?? ''; ?>" name="productId">
                        <label for="Product Name" class="form-label">Product Name</label>
                        <input type="text" name="productName" class="form-control" value="<?php echo $proData['productName'] ?? ''; ?>"
                               id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                                    </div>
                                </div>
                                <label for="Product Catgory"  class="form-label">Product Category</label>
                                <div class="form mb-3">
                                 
                                <select class="form-select" name="pCatid" id=""
                                    aria-label="">
                                    <?php
                                        $query = $pdo->query("SELECT `products`.*, `categories`.`catName`
                                        FROM `products` 
                                            INNER JOIN `categories` ON `products`.`productcatId` = `categories`.`catId`;");
                                        $prorow = $query ->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($prorow as $values){
                                                ?>
                                        
                                        <option value="<?php echo $values['productcatId'] ?>"><?php echo $values['catName'] ?></option>
                                        
                                     
                                            <?php
                                        }
                                        ?>   
                                        <?php
                                            $selectedProductCatId = $values['productcatId']; 

                                            $query = $pdo->query("SELECT * FROM categories WHERE catId != $selectedProductCatId");
                                            $row = $query->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($row as $values) {
                                        ?>
                                            <option value="<?php echo $values['catId'] ?>"><?php echo $values['catName'] ?></option>
                                        <?php
                                            }
                                                ?>
                                        </select>
                            </div>
                                <div class="mb-3">
                                <label for="floatingtextarea">Change Product Description</label>
                        <textarea class="form-control"
                                  id="emailHelp" name="productDescription" style="height: 150px;"><?php echo $proData['productDescription'] ?? ''; ?></textarea>
                        
                                </div>
                               <div class="mb-3">
                                    <label for="Product Quantity" class="form-label">Update Product Quantity</label>
                                    <input type="number" name="productQuantity" value="<?php echo $proData['productQuantity']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">
                                    </div>
                                    <div class="mb-3">
                                    <label for="Product price" class="form-label">Product Price</label>
                                    <input type="number" name="productPrice" value="<?php echo $proData['productPrice']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">
                                    </div>
                                </div>
                                </di>
                                <div class="mb-3">
                                    <label for="Product Img" class="form-label">Image</label>
                                    <input type="file" name="productImage" class="form-control" id="exampleInputPassword1"><img src="<?php echo $proref.$proData['productImage']?>"width="80" alt="">
                                </div>
                                <!-- <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
                                <button type="submit" name="updateproduct" class="btn btn-primary">Update Product</button>
                            </form>
</div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php
include ("components/footer.php");
?>