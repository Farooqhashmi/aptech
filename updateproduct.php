<?php
include("components/header.php");

if(isset($_GET['pId'])) {
    $proId = $_GET['pId'];

    // Fetch product data by product ID
    $query = $pdo->prepare("SELECT * FROM products WHERE productId = ?");
    $query->execute([$proId]);
    $proData = $query->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['updateproduct'])) {
    // Retrieve updated product data
    $pName = $_POST['pName'];
    $pCatid = $_POST['pCatid'];
    $pDescription = $_POST['pDescription'];
    $pQuantity = $_POST['pQuantity'];
    $pPrice = $_POST['pPrice'];

    // Update product in database
    $query = $pdo->prepare("UPDATE products SET productcatId=?, productName=?, productQuantity=?, productPrice=?, productDescription=? WHERE productId=?");
    $query->execute([$pCatid, $pName, $pQuantity, $pPrice, $pDescription, $proId]);

    // Redirect to viewproduct.php after updating product
    header("Location: viewproduct.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include any necessary meta tags, CSS, or scripts -->
</head>
<body>
    <!-- Your HTML form for updating product goes here -->
    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mx-0">
            <div class="col-md-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update Product</h6>
                    <form method="post" enctype="multipart/form-data">
                        <!-- Form inputs -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include("components/footer.php");
?>
