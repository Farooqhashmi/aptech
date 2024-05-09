<?php
include("dbcon.php");
//Category Reference
$catref = "img/category/";
//Product Reference
$proref = "img/product/";
if(isset($_POST['addcategory'])){
$catName = $_POST['cName'];
$catImageName = $_FILES['cImage']['name'];
$catTmpname = $_FILES['cImage']['tmp_name'];
$extension = pathinfo($catImageName,PATHINFO_EXTENSION);
$desig = "img/category/".$catImageName;
if($extension =="jpg" || $extension =="png" || $extension == "jpeg" || $extension =="webp"){
    if(move_uploaded_file($catTmpname,$desig)){
        $query =$pdo->prepare("INSERT INTO `categories`(`catname`, `catimage`) VALUES (:pname,:pimage)");
        $query->bindParam("pname",$catName);
        $query->bindParam("pimage",$catImageName);
        $query->execute();
        echo "<script>alert('Category Added')</script>";
        }else
        {
            echo "<script>alert('fail')</script>";
        
        }
    }else{
    echo "<script>alert('Invalid File Type')</script>";
}
}
//update category
if(isset($_POST['editcategory'])){
    $catid = $_POST['catid'];
    $catName = $_POST['cName'];
    if(!empty($_FILES['cImage']['name'])){  
$catImageName = $_FILES['cImage']['name'];
$catTmpname = $_FILES['cImage']['tmp_name'];
$extension = pathinfo($catImageName,PATHINFO_EXTENSION);
$desig = "img/category/".$catImageName;
if($extension =="jpg" || $extension =="png" || $extension == "jpeg" || $extension =="webp"){
    if(move_uploaded_file($catTmpname,$desig)){
        $query =$pdo->prepare("UPDATE categories set catname = :pname , catimage = :pimage WHERE catid = :pid");
        $query->bindParam("pid",$catid);
        $query->bindParam("pname",$catName);
        $query->bindParam("pimage",$catImageName);
        $query->execute();
        echo "<script>alert('Category Updated')
        location.assign('viewcategory.php')
        </script>";
        }else
        {
            echo "<script>alert('fail')</script>";
        
        }
    }
}
else{
    $query =$pdo->prepare("UPDATE categories set catname = :pname WHERE catid = :pid");
    $query->bindParam("pid",$catid);
    $query->bindParam("pname",$catName);
    $query->execute();
    echo "<script>alert('Category Updated without Image')
    location.assign(viewcategory.php)
    </script>";

}
  }
//delete category
if(isset($_GET['deleteKey'])){
$catid = $_GET['deleteKey'];
$query= $pdo->prepare("DELETE FROM categories Where catid = :pid");
$query->bindParam("pid", $catid);
$query->execute();
echo "<script>alert('Category Deleted');
location.assign('viewcategory.php')
</script>";

}

//Add product
if(isset($_POST['addproduct'])){
$productName = $_POST['pName'];
$productPrice = $_POST['productPrice'];
$productDescription = $_POST['productDescription'];
$productQuantity = $_POST['productQuantity'];
$productCatid = $_POST['pCatid'];
$productImageName = $_FILES['pImage']["name"];
$productTmpName = $_FILES['pImage']["tmp_name"];
$extension = pathinfo($productImageName,PATHINFO_EXTENSION);
$desig = "img/product/".$productImageName;
if($extension =="jpg" || $extension =="png" || $extension == "jpeg" || $extension =="webp") {
    if(move_uploaded_file($productTmpName,$desig)){
        $query = $pdo->prepare("INSERT INTO `products`(`productname`, `productquantity`, `productprice`, `productdescription`, `productimage`, `productcatid`) VALUES(:pn,:pq,:pp,:pd,:pi,:pc)");
        $query->bindParam("pn", $productName);
        $query->bindParam("pq", $productQuantity);
        $query->bindParam("pp", $productPrice);
        $query->bindParam("pd", $productDescription);
        $query->bindParam("pi", $productImageName);
        $query->bindParam("pc", $productCatid);
        $query->execute();
        echo "<script>alert('product added successfully')</script>";

    }else
    {
        echo "<script>alert('invalid file type')</script>";
    
    }
}
}
//delete product
if(isset($_GET['prodeleteKey'])){
    $proid = $_GET['prodeleteKey'];
    $query= $pdo->prepare("DELETE FROM products Where productid = :pid");
    $query->bindParam("pid", $proid);
    $query->execute();
    echo "<script>alert('Product Deleted');
    location.assign('viewproducts.php')
    </script>";
    
    }

    
?>