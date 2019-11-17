                       <h1 class="page-header">
                            Post
                            <small>New User</small>
                        </h1>
<?php 
if(isset($_GET['edit_user'])){
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM user WHERE user_id = $the_user_id";
    $select_user = mysqli_query($connection,$query);
    if (!$select_user) {
        die("Query faliure" . mysqli_error($connection,$query));
    }  
    while ($row = mysqli_fetch_assoc($select_user)) {
            $user_id = $row['user_id'];
           echo $username = $row['username'];
            $user_password = $row['user_password'];
            $user_role = $row['user_role'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
    }
        if (isset($_POST['edit_user'])){
            global $connection;
            $username = $_POST['username'];
            $user_password = $_POST['password'];
            $user_role = $_POST['role'];
            $user_firstname = $_POST['firstname'];
            $user_lastname = $_POST['lastname'];
            $user_email = $_POST['email'];
            $user_image = $_FILES['image']['name'];
            $user_image_temp = $_FILES['image']['tmp_name'];
            $user_role = $_POST['role'];

            move_uploaded_file($user_image_temp, "../images/$user_image");

            if (empty($user_image)) {
                $query = "SELECT * FROM user WHERE user_id = {$the_user_id} ";
                $select_user = mysqli_query($connection,$query);
                if (!$select_user) {
                    die("Query faliure" . mysqli_error($query));
                }

                while ($row = mysqli_fetch_assoc($select_user)) {
                    $user_image = $row['user_image'];
                }
            }

            $query = "UPDATE user SET ";
            $query .="username = '{$username}', ";
            $query .="user_password = '{$user_password}', ";
            $query .="user_firstname = '{$user_firstname}', ";
            $query .="user_lastname = '{$user_lastname}', ";
            $query .="user_email = '{$user_email}', ";
            $query .="user_image = '{$user_image}', ";
            $query .="user_role = '{$user_role}' ";
            $query .= "WHERE user_id = {$the_user_id} ";

            $createQuery = mysqli_query($connection,$query);
            if (!$createQuery) {
                die("Query faliure" . mysqli_error($connection));
            }
        }
    }
?>

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