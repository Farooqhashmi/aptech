<?php
include("dbcon.php");
//Category Reference
$catref = "img/category/";
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
?>