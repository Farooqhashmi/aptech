<?php
include("components/header.php");
if(isset($_GET['Cid'])){
    $catstringid = $_GET['Cid'];
    $query = $pdo->prepare("SELECT * FROM categories WHERE catId=:pid");
    $query-> bindParam("pid",$catstringid);
    $query->execute();
    $catData = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded mx-0">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Update Category</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="catName" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="<?php echo isset($catData['catName']) ? $catData['catName'] : ''; ?>">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image</label>
                        <input type="file" name="catImage" class="form-control" id="exampleInputPassword1">
                        <?php if(isset($catData['catImage'])): ?>
                            <img src="<?php echo $categoryref . $catData['catImage']; ?>" width="80" alt="">
                        <?php endif; ?>
                    </div>
                    <button type="submit" name="editcategory" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->

<?php
include("components/footer.php");
?>
