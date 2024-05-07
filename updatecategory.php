<?php
include("components/header.php");
if(isset($_Get['Cid'])){
    $catstringid = $_Get['Cid'];
    $query = $pdo->prepare("SELECT * FROM categories WHERE catid=:pid");
    $query-> bindParam("pid",$catstringid);
    $query->execute();
    $catData = $query->fetch(PDO::FETCH_ASSOC);
}
?>

 <!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded  mx-0">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Update Category</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="cName" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="<?php echo isset($catData['cName']) ? $catData['cName'] : '' ?>">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image</label>
                        <input type="file" name="cImage" class="form-control" id="exampleInputPassword1">
                        <?php if(isset($catData['catImage'])): ?>
                            <img src="<?php echo $catref . $catData['catImage']; ?>" width="80" alt="">
                        <?php endif; ?>
                    </div>
                    <!-- <div class="mb-3 form-check">
                        <input type="file" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
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