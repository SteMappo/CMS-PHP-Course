
                            <form action="catagories.php" method="post" enctype='multipart/form-data'>
                                <div class="form-group">
                                    <label for="cat_title">Edit Category</label>

<?php 
if (isset($_REQUEST['edit'])) {
    $cat_id = $_GET['edit'];
    $query = "SELECT * FROM catagories WHERE cat_id = $cat_id ";
    $select_catagories_id = mysqli_query($connection,$query);

    if (!$select_catagories_id) {
        die("Connection faliure" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($select_catagories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        ?>
        <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">

<?php
    }
}
?>
<?php 
if(isset($_REQUEST['edit_catagory'])){
    $edit_cat_title = $_POST['cat_title'];

    $query = "UPDATE catagories SET cat_title = '{$edit_cat_title}' WHERE cat_id =  '{$edit_cat_id}' ";
    $edit_query = mysqli_query($connection,$query);
    if (!$edit_query) {
        die(mysqli_error($query));
    }


}

 ?>
                                </div>
                                <input class="btn btn-primary" type="submit" name="edit_catagory" value="Edit Catagory">     
                            </form>          