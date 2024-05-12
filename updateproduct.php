<?php
include ("components/header.php");
if(isset($_GET['pId'])) {
    $prostringid = $_GET['pId'];
    $query = $pdo->prepare("SELECT * FROM `products` WHERE productId = :pid");
    $query->bindParam(":pid", $prostringid);
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
                        <input type="hidden" name="proId" value="<?php echo $proData['productId'] ?>">
                        <label for="Product Name" class="form-label">Product Name</label>
                        <input type="text" name="productName" class="form-control" id="exampleInputEmail1" value="<?php echo $proData['productName'] ?>" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <label for="update product" class="form-label">Product Category</label>
                    <div class="form mb-3">
                        <select class="form-select" name="pCatid" aria-label="">
                            <option selected hidden>Select Any</option>
                            <?php
                            $query = $pdo->query("SELECT * from categories");
                            $row = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $values) {
                            ?>
                            <option value="<?php echo $values['catId'] ?>" <?php echo $proData['productcatId'] == $values['catId'] ? 'selected' : "" ?>>
                                <?php echo $values['catName'] ?>
                            </option>
                            <?php
                            }
                            ?>   
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="floatingtextarea">Product Description</label>
                        <textarea class="form-control" id="emailHelp" name="productDescription" style="height: 150px;"><?php echo $proData['productDescription'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Product Quantity" class="form-label">Product Quantity</label>
                        <input type="number" value="<?php echo $proData['productQuantity'] ?>" name="productQuantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="Product price" class="form-label">Product Price</label>
                        <input type="number" value="<?php echo $proData['productPrice'] ?>" name="productPrice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="Product Img" class="form-label">Image</label>
                        <img src="<?php echo $productref . $proData['productImage'] ?>" alt="Product Image" style="max-width: 180px;">
                        <input type="file" name="productImage" class="form-control">
                    </div>
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
