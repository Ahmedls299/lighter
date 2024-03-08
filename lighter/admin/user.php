<?php
include("init.php");

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <?php 
                        if ($page!="edit"){
                    ?>
            <div class="card w-100  text-light" style="background-color: #35374B;">
                <div class="card-body">
                    <div class="card-text d-inline float-left ">
                        <table class="table table-borderless text-light" style="background-color: #35374B;">
                            <thead class="font-weight-bold h5">
                                <tr>
                                    <th>user_id </th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>status</th>
                                    <th>role</th>
                                    <th>created_at</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- All pages -->
                                <?php
                                if ($page=="All") {
                                    foreach($result_user as $row) {
                                        ?>
                                <tr>
                                    <td class="pt-4 " scope="row"><?php echo $row['user_id'] ?></td>
                                    <td class="pt-4 "><?php echo $row['username'] ?></td>
                                    <td class="pt-4 "><?php echo $row['email'] ?></td>
                                    <td class="pt-4 "><?php echo($row['status']==0)?'disabled':'active'; ?></td>
                                    <td class="pt-4 "><?php echo $row['role'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['created_at'] ?></td>
                                    <td>
                                        <div class="operations ">
                                            <a href="user.php?page=onePage&userId=<?php echo $row['user_id'] ?>"
                                                class="btn btn-link font-weight-bold"><i class="fa-regular fa-eye"></i>
                                                show</a>
                                            <a href="user.php?page=delete&userId=<?php echo $row['user_id'] ?>"
                                                class="btn btn-link text-danger font-weight-bold"><i
                                                    class="fa-solid fa-trash"></i>
                                                delete</a>
                                            <a href="user.php?page=edit&userId=<?php echo $row['user_id'] ?>"
                                                class="btn btn-link text-warning font-weight-bold"><i
                                                    class="fa-solid fa-pen"></i>
                                                edit</a>
                                            

                                        </div>
                                    </td>
                                </tr>
                                <?php }}?>
                                <!-- one page -->
                                <?php
                                
                                if ($page=="onePage" && isset($_GET['userId'])) {
                                    foreach($result_user as $row) {
                                        ?>
                                <tr>
                                    <td class="pt-4 text-center" scope="row"><?php echo $row['user_id'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['username'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['email'] ?></td>
                                    <td class="pt-4 text-center"><?php echo($row['status']==0)?'disabled':'active'; ?>
                                    </td>
                                    <td class="pt-4 text-center"><?php echo $row['role'] ?></td>
                                    <td class="pt-4 text-center"><?php echo $row['created_at'] ?></td>
                                    <td>
                                        <div class="operations ">
                                            <a href="user.php?page=All&userId=<?php echo $row['user_id'] ?>"
                                                class="btn btn-link font-weight-bold"><i class="fa-regular fa-eye"></i>
                                                show All</a>
                                            <a href="user.php?page=delete&userId=<?php echo $row['user_id'] ?>"
                                                class="btn btn-link text-danger font-weight-bold"><i
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
            <?php } ?>
            <!-- edit -->
            <?php
                                        
                 if ($page=="edit" && isset($_GET['userId'])) {
            ?>
            <form style="width: 80%;" action="?page=save-update">
            <input type="hidden" value="<?php echo $result_user['user_id'] ?>" name="old_id">
                <!-- ID input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form5Example1" class="form-control " name="new_id"
                        value=" <?php echo $result_user['user_id'] ?> " />
                    <label class="form-label" for="form5Example1">ID</label>
                </div>
                <!-- USERNAME input -->
                <div data-mdb-input-init class="form-outline mb-4 ">
                    <input type="text" id="form5Example1" class="form-control " name="new_username"
                        value=" <?php echo $result_user['username'] ?> ">
                    <label class="form-label" for="form5Example1">username</label>
                </div>
                <!-- EMAIL input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form5Example1" class="form-control " name="new_email"
                        value=" <?php echo $result_user['email'] ?> " />
                    <label class="form-label" for="form5Example2">Email address</label>
                </div>
                <hr>
                <!-- ROLE input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="h5"> Role:</label>
                    <?php 
                if($result_user['role']=="1"){
                        echo '<input type="radio" name="new_role" value="user" class="mx-2" checked />USER';
                        echo '<input type="radio" name="new_role" value="admin"  class="mx-2" />ADMIN';
                    } 
                    else{
                        echo '<input type="radio" name="new_role" value="user" class="mx-2"  />USER';
                        echo '<input type="radio" name="new_role" value="admin"  class="mx-2" checked />ADMIN';
                    } 
            ?>
                </div>
                <!-- STATUS input -->
                <label class="h5"> Status:</label>
                <?php 
                if($result_user['status']=="1"){
                        echo '<input type="radio" name="new_status" value="1" class="mx-2" checked />Active';
                        echo '<input type="radio" name="new_status" value="0"  class="mx-2" />Blocked';
                    } 
                    else{
                        echo '<input type="radio" name="new_status" value="1" class="mx-2"  />Active';
                        echo '<input type="radio" name="new_status" value="0"  class="mx-2" checked />Blocked';
                    }
            ?>

                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">update</button>
            </form>
            <!-- back (don't save) -->
            <a href="user.php?page=All" type="button" class="btn btn-danger" data-mdb-ripple-init>discard</a>
            <?php } ?>
        </div>
    </div>
</div>

<?php
    include("includes/template/footer.php");
?>