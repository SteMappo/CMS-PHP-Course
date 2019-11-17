<?php include "includes/functions.php" ?>
<?php include "includes/admin_header.php" ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_nav.php" ?>
    
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <div class="col-xs-6">
<?php createCategorys();?>
<?php deleteCategorys();?>
                            <form action="catagories.php" method="post" enctype='multipart/form-data'>
                                <div class="form-group">
                                    <label for="catagory">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Catagory">     
                            </form>

                            <?php 
            if (isset($_REQUEST['edit'])) {
                global $connection;
                $edit_cat_id = $_GET['edit'];

                include "includes/update.php";
                
                                
            }
                            ?>

                        </div> <!-- /Catagory add & edit -->
                        <div class="col-xs-6">
                            <table class="table table-bordered  table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>

<?php readingCategorys();?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>