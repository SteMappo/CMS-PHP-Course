                  <h1 class="page-header">
                            Post
                            <small>View All</small>
                        </h1>

                       <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</thr>
                                    <th>Content</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response To</th>
                                    <th>Date</th>
                                    <th>Approved</th>
                                    <th>Unapproved</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 
    $query = "SELECT * FROM comments";
    $select_comment = mysqli_query($connection,$query);
    if (!$select_comment) {
            die("Query faliure" . mysqli_error($query));
        }

    while ($row = mysqli_fetch_assoc($select_comment)) {
        $comment_id = $row['comments_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comments_author'];
        $comment_content = $row['comments_content'];
        $comment_status = $row['comments_status'];
        $comment_date = $row['comments_date'];
        $comment_email = $row['comments_email'];


        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";

        $query = "SELECT * FROM post_status WHERE post_id = $comment_post_id";
        $some_text_query = mysqli_query($connection,$query);
        if (!$some_text_query) {
            die(mysqli_error($connection));
        }
        while ($row = mysqli_fetch_assoc($some_text_query)) {

            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
        echo "<td><a href='../post.php?p_id=$post_id''>{$post_title}</a></td>";
        }

        echo "<td>{$comment_date}</td>";
        echo "<td><a href='comments.php?approved=$comment_id'>Approved</a></td>";
        echo "<td><a href='comments.php?unapproved=$comment_id'>Unapproved</a></td>";
        echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
        echo "</tr>";
    }
 ?>                       </tbody>
                        </table>

                        <?php if (isset($_GET['delete'])) {
                            $delete_post = $_GET['delete'];

                            $query = "DELETE FROM comments WHERE comments_id = {$delete_post} ";
                            $delete_post_query = mysqli_query($connection,$query);
                            if (!$delete_post_query) {
                                die("Query faliure" . mysqli_error($connection));
                                } 

                            header("location:comments.php");
                            }?>


                            <?php if (isset($_GET['approved'])): ?>
                            <?php $the_comments_id = $_GET['approved'];
                                    $query = "UPDATE comments SET comments_status = 'approved' WHERE comments_id = $the_comments_id ";
                                    $approved_query = mysqli_query($connection,$query);
                                        if (!$approved_query) {
                                            die("Query faliure" . mysqli_error($connection));
                                        } 
                                        header("location:comments.php");
                                 ?>
                            <?php endif ?>


                            <?php if (isset($_GET['unapproved'])): ?>
                            <?php $the_comments_id = $_GET['unapproved'];
                                    $query = "UPDATE comments SET comments_status = 'unapproved' WHERE comments_id = $the_comments_id ";
                                    $unapproved_query = mysqli_query($connection,$query);
                                        if (!$unapproved_query) {
                                            die("Query faliure" . mysqli_error($connection));
                                        } 
                                        header("location:comments.php");
                                 ?>
                            <?php endif ?>

