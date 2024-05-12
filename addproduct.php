<?php
include ("components/header.php");
?>
    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mx-0">
            <div class="col-md-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Add Product</h6>
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" name="productName" class="form-control" id="productName"
                                aria-describedby="emailHelp">
                            <div id="emailHelpProductName" class="form-text">
                            </div>
                        </div>
                        <label for="pCatid" class="form-label">Product Category</label>
                        <div class="form mb-3">
                            <select class="form-select" name="pCatid" id="pCatid" aria-label="">
                                <option selected hidden>Select Any</option>
                                <?php
                                $query = $pdo->query("SELECT * from categories");
                                $row = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($row as $values) {
                                    ?>
                                    <option value="<?php echo $values['catId'] ?>"><?php echo $values['catName'] ?></option>
                                    <?php
                                }
                                ?>   
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="productDescription">Product Description</label>
                            <textarea class="form-control" id="productDescription" name="productDescription" style="height: 150px;"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="productQuantity" class="form-label">Product Quantity</label>
                            <input type="number" name="productQuantity" class="form-control" id="productQuantity"
                                aria-describedby="emailHelp">
                            <div id="emailHelpProductQuantity" class="form-text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Product Price</label>
                            <input type="number" name="productPrice" class="form-control" id="productPrice"
                                aria-describedby="emailHelp">
                            <div id="emailHelpProductPrice" class="form-text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Image</label>
                            <input type="file" name="productImage" class="form-control" id="productImage">
                        </div>
                        <button type="submit" name="addproduct" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php
include ("components/footer.php");
?>
