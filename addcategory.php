<?php
include("components/header.php");
?>

<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded mx-0">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add category</h6>
                <form method="post" enctype="multipart/form-data"> <!-- Added method and enctype attributes -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category name</label> <!-- Corrected label text -->
                        <input type="text" class="form-control" name="cName" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image</label> <!-- Corrected label text -->
                        <input type="file" name="cImage" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="add_category" class="btn btn-primary">Add Category</button> <!-- Changed button name and added Bootstrap class -->
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("components/footer.php");
?>
