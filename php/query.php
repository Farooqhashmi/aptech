<?php
include("dbcon.php");
//category reference
$categoryref = "img/category/";
$productref = "img/product/";

if (isset($_POST["addcategory"])) {
    $catName = $_POST["catName"];
    $catImageName = $_FILES['catImage']['name'];
    $catTmpName = $_FILES['catImage']['tmp_name'];
    $extension = pathinfo($catImageName, PATHINFO_EXTENSION);
    $desig = "img/category/" . $catImageName;

    if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp") {
        if (move_uploaded_file($catTmpName, $desig)) {
            $query = $pdo->prepare("INSERT INTO `categories`( `catName`, `catImage`) VALUES (:productName,:productImage)");
            $query->bindParam(":productName", $catName);
            $query->bindParam(":productImage", $catImageName);
            $query->execute();
            echo "<script>alert('category added')</script>";
        } else {
            echo "<script>alert('failed to upload image')</script>";
        }
    } else {
        echo "<script>alert('invalid file type')</script>";
    }
}

//update category
if (isset($_POST['editcategory'])) {
    $catId = $_POST['catId'];
    $catName = $_POST['catName'];

    if (!empty($_FILES['catImage']['name'])) {
        $catImageName = $_FILES['catImage']['name'];
        $catTmpname = $_FILES['catImage']['tmp_name'];
        $extension = pathinfo($catImageName, PATHINFO_EXTENSION);
        $desig = "img/category/" . $catImageName;

        if ($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp") {
            if (move_uploaded_file($catTmpname, $desig)) {
                $query = $pdo->prepare("UPDATE categories set catName = :productName , catImage = :productImage WHERE catId = :pid");
                $query->bindParam(":pid", $catId);
                $query->bindParam(":productName", $catName);
                $query->bindParam(":productImage", $catImageName);
                $query->execute();
                echo "<script>alert('Category Updated'); location.assign('viewcategory.php');</script>";
            } else {
                echo "<script>alert('fail')</script>";
            }
        }
    } else {
        $query = $pdo->prepare("UPDATE categories set catName = :pname WHERE catId = :pid");
        $query->bindParam(":pid", $catId);
        $query->bindParam(":pname", $catName);
        $query->execute();
        echo "<script>alert('Category Updated without Image'); location.assign('viewcategory.php');</script>";
    }
}

//delete category
if (isset($_GET['deleteKey'])) {
    $catId = $_GET['deleteKey'];
    $query = $pdo->prepare("DELETE FROM categories Where catId = :pid");
    $query->bindParam(":pid", $catId);
    $query->execute();
    echo "<script>alert('Category Deleted'); location.assign('viewcategory.php');</script>";
}

//Add product
if (isset($_POST['addproduct'])) {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];
    $productQuantity = $_POST['productQuantity'];
    $productCatid = $_POST['pCatid'];
    $productImageName = $_FILES['pImage']["name"];
    $productTmpName = $_FILES['pImage']["tmp_name"];
    $extension = pathinfo($productImageName, PATHINFO_EXTENSION);
    $desig = "img/product/" . $productImageName;

    if ($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp") {
        if (move_uploaded_file($productTmpName, $desig)) {
            $query = $pdo->prepare("INSERT INTO products(productname, productquantity, productprice, productdescription, productImage, productcatid) VALUES(:pn,:pq,:pp,:pd,:pi,:pc)");
            $query->bindParam(":pn", $productName);
            $query->bindParam(":pq", $productQuantity);
            $query->bindParam(":pp", $productPrice);
            $query->bindParam(":pd", $productDescription);
            $query->bindParam(":pi", $productImageName);
            $query->bindParam(":pc", $productCatid);
            $query->execute();
            echo "<script>alert('product added successfully'); location.assign('viewproduct.php');</script>";
        } else {
            echo "<script>alert('invalid file type')</script>";
        }
    }
}

//delete product
if (isset($_GET['prodeleteKey'])) {
    $proid = $_GET['prodeleteKey'];
    $query = $pdo->prepare("DELETE FROM products Where productid = :pid");
    $query->bindParam(":pid", $proid);
    $query->execute();
    echo "<script>alert('Product Deleted'); location.assign('viewproduct.php');</script>";
}

// update product
if (isset($_POST['updateproduct'])) {
    $productId = $_POST['proId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];
    $productQuantity = $_POST['productQuantity'];
    $productCatid = $_POST['pCatid'];

    if (!empty($_FILES['pImage']['name'])) {
        $productImageName = $_FILES['pImage']["name"];
        $productTmpName = $_FILES['pImage']["tmp_name"];
        $extension = pathinfo($productImageName, PATHINFO_EXTENSION);
        $desig = "img/products/" . $productImageName;

        if ($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp") {
            if (move_uploaded_file($productTmpName, $desig)) {
                $query = $pdo->prepare("UPDATE `products` SET `productName`=:pn, `productQuantity`=:pq, `productPrice`=:pp, `productDescription`=:pd, `productcatId`=:pc, `productImage`=:pi WHERE `productId`=:pid");
                $query->bindParam(":pn", $productName);
                $query->bindParam(":pq", $productQuantity);
                $query->bindParam(":pp", $productPrice);
                $query->bindParam(":pd", $productDescription);
                $query->bindParam(":pc", $productCatid);
                $query->bindParam(":pi", $productImageName);
                $query->bindParam(":pid", $productId);
                $query->execute();
                echo "<script>alert('Product updated')</script>";
            } else {
                echo "<script>alert('File not uploaded')</script>";
            }
        }
    } else {
        $query = $pdo->prepare("UPDATE `products` SET `productName`=:pn, `productQuantity`=:pq, `productPrice`=:pp, `productDescription`=:pd, `productcatId`=:pc WHERE `productId`=:pid");
        $query->bindParam(":pn", $productName);
        $query->bindParam(":pq", $productQuantity);
        $query->bindParam(":pp", $productPrice);
        $query->bindParam(":pd", $productDescription);
        $query->bindParam(":pc", $productCatid);
        $query->bindParam(":pid", $productId);
        $query->execute();
        echo "<script>alert('Product updated')</script>";
    }
}

?>
