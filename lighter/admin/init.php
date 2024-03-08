<?php
include("includes/db/db.php");
include("includes/template/header.php");
include("includes/template/navbar.php");
session_start();
$page='All';
if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page="All";
}
$userId = $catId = $postId = $commentId ="";
//All pages call
if ($page=="All") {
    //call user data
    $statment_user=$connect->prepare("SELECT * FROM users");
    $statment_user->execute();
    $result_user=$statment_user->fetchAll();
    $num_user=$statment_user->rowCount();
    //call categories data
    $statment_categories=$connect->prepare("SELECT * FROM categories");
    $statment_categories->execute();
    $result_categories=$statment_categories->fetchAll();
    $num_categories=$statment_categories->rowCount();
    //call posts data
    $statment_posts=$connect->prepare("SELECT * FROM posts");
    $statment_posts->execute();
    $result_posts=$statment_posts->fetchAll();
    $num_posts=$statment_posts->rowCount();
    //call comments data
    $statment_comments=$connect->prepare("SELECT * FROM comments");
    $statment_comments->execute();
    $result_comments=$statment_comments->fetchAll();
    $num_comments=$statment_comments->rowCount();
    
    
    
}
//one page call
if ($page=="onePage" && isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    //call user data
    $statment_user=$connect->prepare("SELECT * FROM users where user_id=?");//qurey for display one record
    $statment_user->execute(array($userId)); //pass primary key {ID}
    $result_user=$statment_user->fetchAll();
}
elseif($page=="onePage" && isset($_GET['catId'])){
    $catId = $_GET['catId'];
    //call categories data
    $statment_categories=$connect->prepare("SELECT * FROM categories where category_id =?");//qurey for display one record
    $statment_categories->execute(array($catId)); //pass primary key {ID}
    $result_categories=$statment_categories->fetchAll();
}
elseif($page=="onePage" && isset($_GET['postId'])){
    $postId = $_GET['postId'];
    //call posts data
    $statment_posts=$connect->prepare("SELECT * FROM posts where post_id=?");//qurey for display one record
    $statment_posts->execute(array($postId)); //pass primary key {ID}
    $result_posts=$statment_posts->fetchAll();
}
elseif($page=="onePage" && isset($_GET['commentId'])){
    $commentId = $_GET['commentId'];
    //call comments data
    $statment_comments=$connect->prepare("SELECT * FROM comments where comment_id=?");//qurey for display one record
    $statment_comments->execute(array($commentId)); //pass primary key {ID}
    $result_comments=$statment_comments->fetchAll();

}
// delete data
if ($page=="delete" && isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    //delete user data
    $statment_user=$connect->prepare("DELETE FROM users where user_id=?");//qurey for deleteing
    $statment_user->execute(array($userId));//pass primary key {ID}
    header("Location:user.php"); //heading to all page
}
elseif($page=="delete" && isset($_GET['catId'])){
    $catId = $_GET['catId'];
    //delete categories data
    $statment_categories=$connect->prepare("DELETE FROM categories where category_id =?");//qurey for deleteing
    $statment_categories->execute(array($catId));//pass primary key {ID}
    header("Location:category.php");//heading to all page
}
elseif($page=="delete" && isset($_GET['postId'])){
    $postId = $_GET['postId'];
    //delete posts data
    $statment_posts=$connect->prepare("DELETE FROM posts where post_id=?");//qurey for deleteing
    $statment_posts->execute(array($postId));//pass primary key {ID}
    header("Location:post.php");//heading to all page
}
elseif($page=="delete" && isset($_GET['commentId'])){
    $commentId = $_GET['commentId'];
    //delete comments data
    $statment_comments=$connect->prepare("DELETE FROM comments where comment_id=?");//qurey for deleteing
    $statment_comments->execute(array($commentId));//pass primary key {ID}
    header("Location:comment.php");//heading to all page
    
}
// edit data
if ($page=="edit" && isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    //edit user data
    $statment_user=$connect->prepare("SELECT * FROM users where user_id=?");
    $statment_user->execute(array($userId)); //pass primary key {ID}
    $result_user=$statment_user->fetch();
}
if($page=="save-update"){
    if ($_SERVER['REQUEST_METHOD']=='post') {
        if(isset($_GET['old_id'])){
            $old_id=$_GET['old_id'];
        }
        $new_id=$_POST['new_id'];
        $new_username=$_POST['new_username'];
        $new_email=$_POST['new_email'];
        $new_role=$_POST['new_role'];
        $new_status=$_POST['new_status'];
        $statment_comments=$connect->prepare("UPDATE users 
        SET user_id=?,username=?,email=?,`role`=?,`status`=?,updated_at=now()
        WHERE user_id=?
        
        ");//qurey for update
        $statment_comments->execute(array($new_id,$new_username,$new_email,$new_role,$new_status,$old_id));//pass primary key {ID}
        $_SESSION['message']="User Updated Successfully";//message
        header("Location:user.php");//heading to all page
    }
}