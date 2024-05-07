<?php
include("dbcon.php");
<<<<<<< HEAD
// category ref
$catref ='img/category/';

=======
>>>>>>> 9f5452dc6eea655d2047dda71aad0980e5a85bed
if(isset($_POST['add_category'])){ // Changed button name
    $catName = $_POST['cName'];
    $catImageName = $_FILES['cImage']['name'];
    $catTmpName = $_FILES['cImage']['tmp_name'];
    $extension = pathinfo($catImageName, PATHINFO_EXTENSION);
    $desig = "img/category/" . $catImageName;
<<<<<<< HEAD
    if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp"){ 
        if(move_uploaded_file($catTmpName, $desig)){
            $query = $pdo->prepare("INSERT INTO categories (catName, catImage) VALUES (:pName, :pImage)"); 
            $query->bindParam(":pName", $catName); 
            $query->bindParam(":pImage", $catImageName); 
=======
    if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp"){ // Fixed extension checking
        if(move_uploaded_file($catTmpName, $desig)){
            $query = $pdo->prepare("INSERT INTO categories (catName, catImage) VALUES (:pName, :pImage)"); // Fixed SQL syntax
            $query->bindParam(":pName", $catName); // Fixed parameter names
            $query->bindParam(":pImage", $catImageName); // Fixed parameter names
>>>>>>> 9f5452dc6eea655d2047dda71aad0980e5a85bed
            $query->execute();
            echo "<script>alert('Category added')</script>";
        } else {
            echo "<script>alert('Failed to upload image')</script>";
        }
    } else {
        echo "<script>alert('Invalid file type')</script>";
    }
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 9f5452dc6eea655d2047dda71aad0980e5a85bed
