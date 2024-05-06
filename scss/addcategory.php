<?php
    @include ("components/header.php");
        ?>

 <!-- Blank Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3>This is blank page</h3>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

            <div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">Add Category</h6>
    <form action="add_category.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="categoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" required>
        </div>
        <div class="mb-3">
            <label for="categoryDescription" class="form-label">Category Description</label>
            <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="categoryImage" class="form-label">Category Image</label>
            <input type="file" class="form-control" id="categoryImage" name="categoryImage">
        </div>
        <!-- You can add more fields here if needed -->

        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>

<?php
    @include("components/footer.php");
        ?>
