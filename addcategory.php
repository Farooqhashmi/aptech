<?php
include("components/header.php");
?>
    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mx-0">
            <div class="col-md-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Basic Form</h6>
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category Name</label>
                            <input type="text" name="catName" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Image</label>
                            <input type="file" name="catImage" class="form-control" id="exampleInputPassword1">
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <button type="submit" name="addcategory" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php
include("components/footer.php");
?>
