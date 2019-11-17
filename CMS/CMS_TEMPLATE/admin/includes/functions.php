<?php 
//Query Check 
function queryChecker($result){
    if (!$result) {
        global $connection;
            die("Query faliure" . mysqli_error($connection));
        }
    }
//Add posts 


//delete posts
function delete_posts(){
    if (isset($_GET['delete'])) {
    global $connection;
    $delete_post = $_GET['delete'];

    $query = "DELETE FROM post_status WHERE post_id = {$delete_post} ";

    $delete_post_query = mysqli_query($connection,$query);
    if (!$delete_post_query) {
            die("Query faliure" . mysqli_error($connection));
        }
        header("Location:post.php");



    } 
}

//CREATE NEW CATEGORIES
function createCategorys(){
	if (isset($_POST['submit'])) {
	    global $connection;
        $cat_title = $_POST['cat_title'];

    if($cat_title == empty($cat_title)){
        echo "This field should not be empty";
        }else{
            $query = "INSERT INTO catagories(cat_title) ";
            $query .=" VALUES ('{$cat_title}')";
            $create_catagories_query = mysqli_query($connection,$query);

            if (!$create_catagories_query) {
              die("Query faliure" . mysqli_error($connection));}
            }
}
}

//DELETING CATEGORIES
function deleteCategorys(){
	if(isset($_GET['delete'])){
		global $connection;

        $delete_cat_id = mysqli_real_escape_string($connection,$_GET['delete']);
        $query = "DELETE FROM catagories WHERE cat_id = {$delete_cat_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location:catagories.php");
}
}

// READING DATA FROM CATAGORIES
function readingCategorys(){
    global $connection;	
    $query = "SELECT * FROM catagories";
    $select_catagories_query = mysqli_query($connection,$query);

    if (!$select_catagories_query) {
         die("Connection faliure" . mysqli_error($connection));
}    

    while ($row = mysqli_fetch_assoc($select_catagories_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='catagories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='catagories.php?edit={$cat_id}'>Edit</a></td>";
        echo "<tr>";
} 
}

// edit data base


?>