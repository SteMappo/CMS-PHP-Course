                  <h1 class="page-header">
                            Post
                            <small>View All</small>
                        </h1>

                       <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</thr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>role</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 
    $query = "SELECT * FROM user";
    $select_user = mysqli_query($connection,$query);
    if (!$select_user) {
            die("Query faliure" . mysqli_error($query));
        }

    while ($row = mysqli_fetch_assoc($select_user)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        // $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        $randsalt = $row['randsalt'];

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td><img style='width:150px;' src='../images/$user_image' alt='Image'></td>";
        echo "<td>{$user_role}</td>";

        $query = "SELECT * FROM user WHERE user_id = $user_id";
        $some_text_query = mysqli_query($connection,$query);
        if (!$some_text_query) {
            die(mysqli_error($connection));
        }
        while ($row = mysqli_fetch_assoc($some_text_query)) {

            $user_id = $row['user_id'];
            $username = $row['username'];
        }
        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_users&edit_user={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";
    }
 ?>                       </tbody>
                        </table>

                        <?php if (isset($_GET['delete'])) {
                            $delete_user = $_GET['delete'];

                            $query = "DELETE FROM user WHERE user_id = {$delete_user} ";
                            $delete_user_query = mysqli_query($connection,$query);
                            if (!$delete_user_query) {
                                die("Query faliure" . mysqli_error($connection));
                                } 

                            header("location:users.php");
                            }?>

                            <?php if (isset($_GET['change_to_admin'])): ?>
                            <?php $the_user_id = $_GET['change_to_admin'];
                                    $query = "UPDATE user SET user_role = 'Admin' WHERE user_id = $the_user_id ";
                                    $admin_query = mysqli_query($connection,$query);
                                        if (!$admin_query) {
                                            die("Query faliure" . mysqli_error($connection));
                                        } 
                                        header("location:users.php");
                                 ?>
                            <?php endif ?>

                            <?php if (isset($_GET['change_to_sub'])): ?>
                            <?php $the_user_id = $_GET['change_to_sub'];
                                    $query = "UPDATE user SET user_role = 'Subscriber' WHERE user_id = $the_user_id ";
                                    $subscriber_query = mysqli_query($connection,$query);
                                        if (!$subscriber_query) {
                                            die("Query faliure" . mysqli_error($connection));
                                        } 
                                        header("location:users.php");
                                 ?>
                            <?php endif ?>
