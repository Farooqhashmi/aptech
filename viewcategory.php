
<?php
include("component/header.php");
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
                                        $query = $pdo->query("Select * from categories");
                                        $row = $query ->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($row as $values){
                                                ?>
                                      <tr>
                                            <th scope="row"><?php echo $values['catid']?></th>
                                            <td><?php echo $values['catname']?></td>
                                            <td><img src="<?php echo $catref.$values['catimage']?>" alt="" width="80px"></td>
                                            <td><a href="updatecategory.php?Cid=<?php echo $values['catid'] ?>" class="btn btn-success">Edit</a></td>
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
include("component/footer.php");
?>
