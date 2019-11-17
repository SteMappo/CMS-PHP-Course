<?php include "../includes/header.php" ?>

    <!-- Navigation -->
    <?php include "../includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
            // Select all data query 

            if (isset($_GET['p_id'])) {

              $the_post_id = $_GET['p_id'];

          }
                $query = "SELECT * FROM post_status WHERE post_id = $the_post_id";
                $select_all_post_data = mysqli_query($connection,$query);
                if (!$query) {
                    die(mysqli_error($query));
                }
          
                while ($row=mysqli_fetch_assoc($select_all_post_data)) {
                   $post_catagorie_id = $row['post_catagorie_id'];
                   $post_title = $row['post_title'];
                   $post_aurther = $row['post_aurther'];
                   $post_user = $row['post_user'];
                   $post_date = $row['post_date'];
                   $post_image = $row['post_image'];
                   $post_content = $row['post_content'];
                   $post_tags = $row['post_tags'];
                   $post_views_count = $row['post_views_count'];
            ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> 

                <!-- First Blog Post -->
                <h2>
                    <a href="index.php"><?php echo "$post_title"; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo "$post_aurther" ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo "$post_date"; ?>, 2013 at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo "$post_content"; ?></p>

                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

             <?php  }?>
            </div>

            <?php include "../includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <?php if (isset($_POST['comment_create'])):

        $the_post_id = $_GET['p_id'];

        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];

        $query = "INSERT INTO comments (comment_post_id, comments_author, comments_content, comments_status, comments_email, comments_date) ";
        $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_content}', 'unapproved', '{$comment_email}', now())";

        $comment_query = mysqli_query($connection,$query);
        if (!$comment_query) {
          die("Query faliue" . mysqli_error($connection));
        }

        $query = "UPDATE post_status SET post_comment_count = post_comment_count + 1 ";
        $query .="WHERE post_id = $the_post_id";
        $comment_count_query = mysqli_query($connection,$query);
        if (!$comment_count_query) {
          die("Query faliue" . mysqli_error($connection));
        }

        ?>
        <?php endif ?>
        <div class="row">
          <div class="col-md-8">
            <div class="well">
              <h4>Leave Comment</h4>
              <form role="form" action="" method="post">
                <div class="form-group">
                <label for="">Name</label>
                  <input type="text" name="comment_author" class="form-control" name="comment_author">
                </div> 
                <div class="form-group">
                <label for="email">Email</label>
                  <input type="email" class="form-control" name="comment_email">
                </div>
                <div class="form-group">
                <label for="">Your Comment</label>
                  <textarea class="form-control" name="comment_content" rows="10"></textarea> 
                </div>
                <button type="submit" name="comment_create" class="btn btn-primary">Submit</button>
              </form>

            </div>
    <?php 
          $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
          $query .="AND comments_status = 'approved' ";
          $query .= "ORDER BY comments_id DESC ";
          $view_comments_query = mysqli_query($connection,$query);
          if (!$view_comments_query) {
            die("Query faliue" . mysqli_error($connection));
          }
          while ($row = mysqli_fetch_assoc($view_comments_query)) {
            $comment_author = $row['comments_author'];
            $comment_date = $row['comments_date'];
            $comment_content = $row['comments_content'];
            ?>

             <hr>

            <div class="media">
              <a href="#" class="pull-left">
                <img class="media-object" style="width: 150px;" src="images/rock_wool_float.jpg" alt="">
              </a>
              <div class="media-body">
                <h4 class="media-heading"><?php echo $comment_author; ?> <small><?php echo $comment_date; ?></small></h4>
                <?php echo $comment_content ?>
              </div>
          </div>

    <?php } ?>
    
        </div>
      </div>
      <hr>
 

<?php include "../includes/footer.php" ?>
