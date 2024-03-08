<?php
include("init.php");

?>
<div class="container-fluid mt-2 mb-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card w-100  text-light" style="background-color: #35374B;">
                <div class="card-body">
                    <div class="card-text d-inline float-left ">

                        <table class="table table-borderless text-light" style="background-color: #35374B;">
                            <thead class="font-weight-bold h5">
                                <tr>
                                    <th class="underline">post_id </th>
                                    <th class="underline">title</th>
                                    <th class="underline">description</th>
                                    <th class="underline">image</th>
                                    <th class="underline">status</th>
                                    <th class="underline">category_id</th>
                                    <th class="underline">user_id</th>
                                    <th class="underline">created_at</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <!-- All pages -->
                                <?php
                                if ($page=="All") {
                                    foreach($result_posts as $row) {
                                        ?>
                                <tr>
                                    <td class="pt-4 text-center font-weight-bold" scope="row"><?php echo $row['post_id'] ?></td>
                                    <td class="pt-4"><?php echo $row['title'] ?></td>
                                    <td class="pt-4"><?php echo $row['description'] ?></td>
                                    <td class="pt-4"><?php echo $row['image'] ?></td>
                                    <td class="pt-4 text-center"><?php echo($row['status']==0)?'disabled':'active'; ?></td>
                                    <td class="pt-4 text-center"><a href="category.php?page=onePage&catId=<?= $row['category_id'] ?>" class="text-light "><?php echo $row['category_id'] ?></a></td>
                                    <td class="pt-4 text-center"><a href="user.php?page=onePage&userId=<?= $row['user_id'] ?>" class="text-light "><?php echo $row['user_id'] ?></a></td>
                                    <td class="pt-4 text-center"><?php echo $row['created_at'] ?></td>
                                    <td>
                                        <div class="operations ">
                                            <a href="post.php?page=onePage&postId=<?= $row['post_id'] ?>" class="btn btn-link font-weight-bold"><i
                                            class="fa-regular fa-eye"></i> show</a>
                                            <a href="post.php?page=delete&postId=<?= $row['post_id'] ?>" class="btn btn-link text-danger font-weight-bold"><i
                                                    class="fa-solid fa-trash"></i>
                                                delete</a>
                                                
                                        </div>
                                    </td>
                                </tr>
                                <?php }}?>
                                <!-- one page -->
                                <?php
                                if ($page=="onePage" && isset($_GET['postId'])) {
                                    foreach($result_posts as $row) {
                                ?>
                                <tr>
                                    <td class="pt-4 text-center" scope="row"><?php echo $row['post_id'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['title'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['description'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['image'] ?></td>
                                    <td class="pt-4 text-center"><?php echo($row['status']==0)?'disabled':'active'; ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['category_id'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['user_id'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['created_at'] ?></td>
                                    <td>
                                        <div class="operations ">
                                            <a href="post.php?page=All&postId=<?= $row['category_id'] ?>" class="btn btn-link font-weight-bold"><i
                                                    class="fa-regular fa-eye"></i> show All</a>
                                            <a href="post.php?page=delete&postId=<?= $row['category_id'] ?>" class="btn btn-link text-danger font-weight-bold"><i
                                                    class="fa-solid fa-trash"></i>
                                                delete</a>
                                                
                                        </div>
                                    </td>
                                </tr>
                                <?php }}?>
                                

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include("includes/template/footer.php");
?>