<?php
include("init.php");



?>
<div class="container mt-2 mb-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card w-100  text-light" style="background-color: #35374B;">
                <div class="card-body">
                    <div class="card-text d-inline float-left ">

                        <table class="table table-borderless text-light" style="background-color: #35374B;">
                            <thead class="font-weight-bold h5">
                                <tr>
                                    <th class="underline">comment_id </th>
                                    <th class="underline">comment</th>
                                    <th class="underline">status</th>
                                    <th class="underline">user_id</th>
                                    <th class="underline">post_id</th>
                                    <th class="underline">created_at</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <!-- All pages -->
                                <?php
                                if ($page=="All") {
                                    foreach($result_comments as $row) {
                                        ?>
                                <tr>
                                    <td class="pt-4 font-weight-bold text-center" scope="row"><?php echo $row['comment_id'] ?></td>
                                    <td class="pt-4"><?php echo $row['comment'] ?></td>
                                    <td class="pt-4 text-center"><?php echo($row['status']==0)?'disabled':'active'; ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['user_id'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['post_id'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['created_at'] ?></td>
                                    <td>
                                        <div class="operations ">
                                            <a href="comment.php?page=onePage&commentId=<?= $row['comment_id'] ?>" class="btn btn-link font-weight-bold"><i
                                                    class="fa-regular fa-eye"></i> show</a>
                                            <a href="comment.php?page=delete&commentId=<?= $row['comment_id'] ?>" class="btn btn-link text-danger font-weight-bold"><i
                                                    class="fa-solid fa-trash"></i>
                                                delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php }}?>
                                <!-- one page -->
                                <?php
                                if ($page=="onePage" && isset($_GET['commentId'])) {
                                    foreach($result_comments as $row) {
                                ?>
                                <tr>
                                    <td class="pt-4 text-center" scope="row"><?php echo $row['comment_id'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['comment'] ?></td>
                                    <td class="pt-4 text-center"><?php echo($row['status']==0)?'disabled':'active'; ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['user_id'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['post_id'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['created_at'] ?></td>
                                    <td>
                                        <div class="operations ">
                                            <a href="comment.php?page=All&commentId=<?= $row['comment_id'] ?>" class="btn btn-link font-weight-bold"><i
                                                    class="fa-regular fa-eye"></i> show All</a>
                                            <a href="comment.php?page=delete&commentId=<?= $row['comment_id'] ?>" class="btn btn-link text-danger font-weight-bold"><i
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