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
                if(isset($_POST["submit"])){
                    $search = $_POST["search"];
                    $query = "SELECT * FROM post_status WHERE post_tags LIKE '%$search%' ";
                    $search_well_query = mysqli_query($connection,$query);

                    if (!$search_well_query) {
                        die("Query Failure" . mysqli_error($connection));
                    }
                    $count = mysqli_num_rows($search_well_query);
                    if ($count == 0) {
                        echo "No result";
                      }else{
                  while ($row = mysqli_fetch_assoc($search_well_query)) {
                   $post_title = $row['post_title'];
                   $post_aurther = $row['post_aurther'];
                   $post_user = $row['post_user'];
                   $post_date = $row['post_date'];
                   $post_image = $row['post_image'];
                   $post_content = $row['post_content'];
                   $post_comment_count = $row['post_comment_count'];
                   $post_tags = $row['post_tags'];
                   $post_status = $row['status'];
                   $post_views_count = $row['post_views_count'];
            ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> 

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo "$post_title"; ?></a>
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

         <?php }
                    }  }?>
                    
            </div>

            <?php include "../includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "../includes/footer.php"?>