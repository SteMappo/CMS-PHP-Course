                        <h1 class="page-header">
                            Post
                            <small>New Post</small>
                        </h1>

<?php   if (isset($_POST['create_post'])){
            global $connection;
            $post_title = $_POST['post_title'];
            $post_aurther = $_POST['post_aurther'];
            $post_catagorie_id = $_POST['post_catagorie'];
            $post_status = $_POST['status'];
            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];
            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_date = date("d-m-y");
            move_uploaded_file($post_image_temp, "../images/$post_image");

            $query = "INSERT INTO post_status(post_title,post_aurther,post_date,post_catagorie_id,status,post_image,post_tags,post_content) ";
            $query .= "VALUES('{$post_title}','{$post_aurther}',now(),{$post_catagorie_id},'{$post_status}','{$post_image}','{$post_tags}','{$post_content}') ";

            $createQuery = mysqli_query($connection,$query);
            if (!$createQuery) {
                die("Query faliure" . mysqli_error($connection));
        }
        }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>

   <div class="form-group">
        <select name="post_catagorie" id="">
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
        <input type="text" class="form-control" name="post_aurther">
    </div>
    <div class="form-group">
        <label for="">Post Status</label>
        <input type="text" class="form-control" name="status">
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image">
    </div>
        <div class="form-group">
        <label for="">Post Tages</label>
        <input type="text" name="post_tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="20"  rows="10">
        	
        </textarea>
    </div>
    <div>
    	<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>

</form>