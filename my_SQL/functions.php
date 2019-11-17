<?php include "db.php";?>
<?php 
//CRUD CREATE, READ, UPDATE, DELETE
//Createing new rows in the data base
function createRows(){
  if (isset($_POST['submit'])) {
    global $connection;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);

    $hashFormat = "$2y$10$";

    $salt = "iusesomecrazystrings22";

    $hashF_and_salt = $hashFormat . $salt;

    $password = crypt($password, $hashF_and_salt);

      $query = "INSERT INTO users(username,password) ";
      $query .= "VALUES ('$username','$password')";

      $result = mysqli_query($connection,$query);
      if (!$result) {
      die('Query FAILED' . mysqli_error($query));
      }else{
        echo "Record Created";
      }
  }
}
//Reading the data back to the html
function readRows(){
  global $connection;

  $query = "SELECT * FROM users";
      $result = mysqli_query($connection,$query);
      if (!$result) {
        die('Query FAILED' . mysqli_error());
      }
      
  while ($row = mysqli_fetch_row($result)) {
          print_r($row);
  } 
}

//select all data from login data base 
function showAllData(){
	global $connection;

    $query = "SELECT * FROM users";

    $result = mysqli_query($connection,$query);
    if (!$result) {
    	die("Query faliure" . mysql_error());
    }
    while ($row = mysqli_fetch_assoc($result)) {
    	$id = $row['id'];
    	echo "<option value='$id'>$id</option>" . "<br>";
    }
}


//update users in login  by id;
    function updateTable(){
      if (isset($_POST['submit'])) {
    	  global $connection;

       	$username = $_POST['username'];
   	    $password = $_POST['password'];
   	    $id = $_POST['id'];

   	    $query = "UPDATE users SET ";
   	    $query .="username = '$username', ";
   	    $query .="password = '$password' ";
   	    $query .= "WHERE id = $id ";

   	    $result = mysqli_query($connection,$query);
   	    if (!$result) {
   		    die('Query Error' . mysqli_error($query));	
   	    }else{
        echo "Recored Updated";
        } 
      }   
    }


// Delete rows from data base 
    function deleteRows(){
      if (isset($_POST['submit'])) {
        global $connection;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        $query = "DELETE FROM users ";
        $query .= "WHERE id = $id ";

        $result = mysqli_query($connection,$query);
        if (!$result) {
          die('Query Error' . mysqli_error($query));   
        }else{
        echo "Recored Deleted";
        } 
      }    
    }

    

 ?>

