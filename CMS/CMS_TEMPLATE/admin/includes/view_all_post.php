                        <h1 class="page-header">
                            Post
                            <small>View All</small>
                        </h1>

                       <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</thr>
                                    <th>Aurther</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Comments</th>
                                    <th>Tags</th>
                                    <th>Post Views</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 
    $query = "SELECT * FROM post_status";
    $select_post = mysqli_query($connection,$query);
    if (!$select_post) {
            die("Query faliure" . mysqli_error($query));
        }

    while ($row = mysqli_fetch_assoc($select_post)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_aurthor = $row['post_aurther'];
        $post_categorie = $row['post_catagorie_id'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment = $row['post_comment_count'];
        $post_views = $row['post_views_count'];
        $post_date = $row['post_date'];
        $post_status = $row['status'];


        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_aurthor}</td>";

    $query = "SELECT * FROM catagories WHERE cat_id = $post_categorie";
    $select_catagories_id = mysqli_query($connection,$query);

    if (!$select_catagories_id) {
        die("Connection faliure" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($select_catagories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<td>{$cat_title}</td>";
}

        echo "<td>{$post_status}</td>";
        echo "<td><img class='img-responsive' src='../images/$post_image' alt='Image'></td>";
        echo "<td>{$post_comment}</td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_views}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
    }
 ?>                       </tbody>

                        </table>

<?php delete_posts();?>