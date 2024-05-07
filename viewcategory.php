<?php
include("components/header.php");
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded  mx-0">
        <div class="col-md">
            <!-- Blank End -->
            <h6 class="mb-4">All Categories</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead> 
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col" class="px-5" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $pdo->query("SELECT * FROM categories");
                        $row = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach($row as $values) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $values['catId']?></th>
                                <td><?php echo $values['catName']?></td>
                                <td><img src="<?php echo $catref . $values['catImage']?>" alt="" width="80px"></td>
                                <td><a href="updatecategory.php?Cid=<?php echo $values['catId'] ?>" class="btn btn-success">Edit</a></td>
                                <td><a href="" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>   
<?php
include("components/footer.php");
?>
