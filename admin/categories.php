<?php include "includes/admin_header.php";?>
<body>

    <div id="wrapper">
        
        <!-- Navigation -->
<?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">

<!-- POST QUERY -->
<?php insert_categories(); ?>

                        <form action="" method="post">
                        <label for="cat_title">Add Category</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

<!-- EDIT QUERY -->
<?php update_categories(); ?>

                        </div> <!--Add Category Form--> 
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

<!-- GET QUERY -->
<?php get_categories(); ?>
        
<!-- // DELETE QUERY -->
<?php delete_category(); ?>
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

    <?php include "includes/admin_footer.php";?>