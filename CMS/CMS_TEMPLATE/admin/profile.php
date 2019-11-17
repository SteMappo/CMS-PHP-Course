<?php include "includes/functions.php" ?>
<?php include "includes/admin_header.php" ?>
<?php 
if (isset($_SESSION['username'])) {
     echo $_SESSION['username'];
 } ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_nav.php" ?>
    
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $user_password; ?>">
    </div>
       <div class="form-group">
        <select name="role" id="">
            <option value="subcriber"><?php echo "$user_role"; ?></option>
        <?php 
            if ($user_role == 'Admin') {
                echo "<option value='Subcriber'>Subscriber</option>";
            }elseif ($user_role == 'Subscriber') {
                echo "<option value='Admin'>Admin</option>";
            }else{
                echo "<option value='Admin'>Admin</option>";
                echo "<option value='Subcriber'>Subscriber</option>";
            } 
        ?>
        </select>   
            
    </div>
    <div class="form-group">
        <img style='width: 100px;' src='<?php echo "../images/$user_image" ;?>' alt='Image'>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="">First Name</label>
        <input type="text" class="form-control" name="firstname" value="<?php echo $user_firstname; ?>">
    </div>
        <div class="form-group">
        <label for="">Last Name</label>
        <input type="text" class="form-control" name="lastname" value="<?php echo $user_lastname; ?>">
    </div>
        <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo $user_email; ?>">
    </div>
    <div>
        <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
    </div>
</form>


                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>




