<?php
    include("init.php");
?>

<div class="container mt-5 pt-5 ">
    <div class="row py-5 mt-5">
        <div class="col-md-3">
            <div class="box p-2 rounded w-75 mx-auto" style="background-color:#35374B;">
                <i class="fa-solid fa-user mx-auto w-100 my-2 text-primary" style="height:3.12rem;"></i>
                <h3 class="text-center text-light">users</h3>
                <p class="text-light m-1 font-weight-bold text-center"><?php echo $num_user; ?></p>
                <a href="user.php" class="btn btn-link d-block font-weight-bold"> SHOW</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box p-2 rounded w-75 mx-auto" style="background-color:#35374B;">
                <i class="fa-solid fa-list mx-auto w-100 my-2 text-warning" style="height:3.12rem; "></i>
                <h3 class="text-center text-light">categories</h3>
                <p class="text-light m-1 font-weight-bold text-center"><?php echo $num_categories; ?></p>
                <a href="category.php" class="btn btn-link d-block font-weight-bold text-warning"> SHOW</a>
            </div>
        </div>
        <div class="col-md-3">  
            <div class="box p-2 rounded w-75 mx-auto" style="background-color:#35374B;">
                <i class="fa-regular fa-address-card mx-auto w-100 my-2 text-danger" style="height:3.12rem;"></i>
                <h3 class="text-center text-light">posts</h3>
                <p class="text-light m-1 font-weight-bold text-center"><?php echo $num_posts;?></p>
                <a href="post.php" class="btn btn-link d-block font-weight-bold text-danger"> SHOW</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box p-2 rounded w-75 mx-auto" style="background-color:#35374B;">
                <i class="fa-regular fa-comment-dots mx-auto w-100 my-2 text-success" style="height:3.12rem; "></i>
                <h3 class="text-center text-light">comments</h3>
                <p class="text-light m-1 font-weight-bold text-center"><?php echo $num_comments;?></p>
                <a href="comment.php" class="btn btn-link d-block font-weight-bold text-success"> SHOW</a>
            </div>
        </div>
    </div>
</div>

<?php
    include("includes/template/footer.php");
?>