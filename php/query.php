<?php
include("dbcon.php");
if(isset($_POST['add_category'])){ // Changed button name
    $catName = $_POST['cName'];
    $catImageName = $_FILES['cImage']['name'];
    $catTmpName = $_FILES['cImage']['tmp_name'];
    $extension = pathinfo($catImageName, PATHINFO_EXTENSION);
    $desig = "img/category/" . $catImageName;
    if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp"){ // Fixed extension checking
        if(move_uploaded_file($catTmpName, $desig)){
            $query = $pdo->prepare("INSERT INTO categories (catName, catImage) VALUES (:pName, :pImage)"); // Fixed SQL syntax
            $query->bindParam(":pName", $catName); // Fixed parameter names
            $query->bindParam(":pImage", $catImageName); // Fixed parameter names
            $query->execute();
            echo "<script>alert('Category added')</script>";
        } else {
            echo "<script>alert('Failed to upload image')</script>";
        }
    } else {
        echo "<script>alert('Invalid file type')</script>";
    }
}
?>
