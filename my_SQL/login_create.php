<?php include "db.php";?>
<?php include "functions.php";?>
<?php createRows();?>

<?php include "includes/header.php" ?>
<?php 

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = 'root';
$db['db_name'] = 'cms';

foreach ($db as $key => $value) {
  define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME); 
if (!$connection) {
  die(mysqli_error($connection));
}

 ?>
<?php 
if (isset($_POST['submit'])) {
  $cat_title = $_POST['cat_title'];
  $query = "UPDATE FROM catagories ";
  $query .="SET cat_title = '{$cat_title}'";
  $connection = mysqli_query($connection,$query);
  # code...
}

 ?>
  <div class="container">
      <div class="col-sm-6">
          <h1 class="text-center">Create</h1>
          <form action="login_create.php" method="post">
            <div class="form-group">
              <label for="username">Username</label>
              <input class="form-control" type="text" name="cat_title">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" type="password" name="password">
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="CREATE">
          </form>
      </div>
  </div>
<?php include "includes/footer.php" ?>


    <!-- Opinion posts loops -->
    <?php 
    $opinionPost = new WP_Query('cat=6&posts_per_page=3') ;?>
        <?php if ($opinionPost->have_posts() ) : ?>
      <?php while ($opinionPost->have_posts()):
      $opinionPost->the_post(); ?>

        <div class="container">
            <?php get_template_part( 'content', get_post_format() );?>

        </div>


        <?php endwhile; ?>
    <?php endif; ?> 

