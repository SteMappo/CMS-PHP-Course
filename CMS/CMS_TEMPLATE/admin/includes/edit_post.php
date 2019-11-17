<?php 

if(isset($_GET['p_id'])){
    $post_id = $_GET['p_id'];
}
    $query = "SELECT * FROM post_status WHERE post_id = $post_id";
    $select_post = mysqli_query($connection,$query);
    if (!$select_post) {
        die("Query faliure" . mysqli_error($connection,$query));
    }  
    while ($row = mysqli_fetch_assoc($select_post)) {
        $post_title = $row['post_title'];
        $post_aurthor = $row['post_aurther'];
        $post_categorie_id = $row['post_catagorie_id'];
        $status = $row['status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment = $row['post_comment_count'];
        $post_views = $row['post_views_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
    }

    if (isset($_POST['update_post'])) {
        global $connection;
            $post_title = $_POST['post_title'];
            $post_aurthor = $_POST['post_aurther'];
            $post_categorie = $_POST['post_categorie'];
            $status = $_POST['status'];
            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];
            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];

            move_uploaded_file($post_image_temp, "../images/$post_image");

            if (empty($post_image)) {
                $query = "SELECT * FROM post_status WHERE post_id = {$post_id} ";
                $select_post = mysqli_query($connection,$query);
                if (!$select_post) {
                    die("Query faliure" . mysqli_error($query));
                }

                while ($row = mysqli_fetch_assoc($select_post)) {
                    $post_image = $row['post_image'];
                }
            }

            $query = "UPDATE post_status SET ";
            $query .="post_title = '{$post_title}', ";
            $query .="post_catagorie_id = '{$post_categorie}', ";
            $query .="post_date = now(), ";
            $query .="post_aurther = '{$post_aurthor}', ";
            $query .="status = '{$status}', ";
            $query .="post_tags = '{$post_tags}', ";
            $query .="post_content = '{$post_content}', ";
            $query .="post_image = '{$post_image}' ";
            $query .= "WHERE post_id ={$post_id} ";

            $updateQuery = mysqli_query($connection,$query);
            if (!$updateQuery) {
                    die("Query faliure" . mysqli_error($query));
            }
    }


        ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo "$post_title"; ?>">
    </div>
    <div class="form-group">
        <select name="post_categorie" id="">
            <?php 
                $query = "SELECT * FROM catagories";
    $select_catagories = mysqli_query($connection,$query);
    if (!$select_catagories) {
                    die("Query faliure" . mysqli_error($connection,$query));
        }
    while ($row = mysqli_fetch_assoc($select_catagories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<option value='$cat_id'>{$cat_title}</option>";
    }
    ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Post Author</label>
        <input type="text" class="form-control" name="post_aurther" value="<?php echo "$post_aurthor"; ?>">
    </div>
    <div class="form-group">
        <label for="">Post Status</label>
        <input type="text" class="form-control" name="status" value="<?php echo "$status"; ?>">
    </div>
    <div class="form-group">
        <img style='width: 100px;' src='<?php echo "../images/$post_image" ;?>' alt='Image'>
        <input type="file" name="image">
    </div>
        <div class="form-group">
        <label for="">Post Tages</label>
        <input type="text" name="post_tags" class="form-control" value="<?php echo "$post_tags"; ?>">
    </div>
    <div class="form-group">
        <label for="">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="20"  rows="10"><?php echo "$post_content"; ?>
        </textarea>
    </div>
    <div>
    	<input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>

</form>