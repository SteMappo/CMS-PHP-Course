                       <h1 class="page-header">
                            Post
                            <small>New Post</small>
                        </h1>

<?php   if (isset($_POST['add_user'])){
            global $connection;
            // $user_id = $_POST['user_id'];
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

            $query = "INSERT INTO user(username,user_password,user_firstname,user_lastname,user_email,user_image,user_role) ";
            $query .= "VALUES('{$username}',{$user_password},'{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}','{$user_role}') ";

            $createQuery = mysqli_query($connection,$query);
            if (!$createQuery) {
                die("Query faliure" . mysqli_error($connection));
            }
        }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
       <div class="form-group">
        <select name="role" id="">
            <option value="Subcriber">Select Options</option>
            <option value="Admin">Admin</option>
            <option value="Subcriber">Subscriber</option>
        </select>
    </div>
        <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="">Firstname</label>
        <input type="text" class="form-control" name="firstname">
    </div>
        <div class="form-group">
        <label for="">Lastname</label>
        <input type="text" class="form-control" name="lastname">
    </div>
        <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div>
    	<input type="submit" class="btn btn-primary" name="add_user" value="Add User">
    </div>
</form>