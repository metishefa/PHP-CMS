<?php include "includes/admin_header.php"; ?>

<?php

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $selecte_user_profile_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($selecte_user_profile_query)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_role = $row['user_role'];
        $user_email = $row['user_email'];
        $user_iamge = $row['user_image'];
    }
}

?>

<?php

if(isset($_POST['edit_user'])){
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
//    move_uploaded_file($post_image_temp, "../images/$post_image");
//    $post_date = $_POST['post_date'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    
//    if(empty($post_image)){
//        $query = "SELECT * FROM posts WHERE post_id = $post_id ";
//        $select_image = mysqli_query($connection,$query);
//        while($row=mysqli_fetch_assoc($select_image)){
//            $post_image = $row['post_image'];
//        }
//    }
    
    $query = "UPDATE users SET ";
    $query .= "username = '{$username}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
//    $query .= "post_date = now(), ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_role = '{$user_role}' ";
    $query .= "WHERE username = '{$username}' ";
    
    $update_post = mysqli_query($connection,$query);
    confirmquery($update_post);
}

?>
    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h1 class="page-header">
                            Welcome to Admin Dashboard
                            <small>Posts</small>
                        </h1>
                        
                        <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="username">Username</label>
            <input name="username" value="<?php echo $username; ?>" type="text" class="form-control">
    </div>
    <div class="form-group">
            <label for="user_password">Password</label>
            <input name="user_password" value="<?php echo $user_password; ?>" type="password" class="form-control">
    </div>
    <div class="form-group">
            <label for="user_firstname">Firstname</label>
            <input name="user_firstname" value="<?php echo $user_firstname; ?>" type="text" class="form-control">
    </div>
    <div class="form-group">
            <label for="user_lastname">Lastname</label>
            <input name="user_lastname" value="<?php echo $user_lastname; ?>" type="text" class="form-control">
    </div>
    <div class="form-group">
            <label for="user_email">Email</label>
            <input name="user_email" value="<?php echo $user_email; ?>" type="email" class="form-control">
    </div>
<!--
    <div class="form-group">
            <br>
            <input name="user_image" type="file">
    </div>
-->
    <div class="form-group">        
        <select name="user_role">
            <option><?php echo $user_role; ?></option>
            <?php
            if($user_role == 'admin'){
                echo "<option value='subscriber'>subscriber</option>";
            }else{
                echo "<option value='admin'>admin</option>";    
            }
            ?>            
        </select>
    </div>
    <div class="form-group">
        <input name="edit_user" class="btn btn-primary" type="submit" value="Update Profile">
    </div>
</form>

                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>