<?php

    if(isset($_POST['checkBoxArray'])) {

        foreach($_POST['checkBoxArray'] as $checkBoxValue) {
            
            $bulk_options = $_POST['bulk_options'];

        }
    }

?>





<form action="" method="post">
<table class="table table-bordered table-hover">
<div class="col-xs-4" id="bulkOptionsContainer">

    <select name="bulk_options" id="" class="form-control">
        <option value="">Select Options</option>
        <option value="">Publish</option>
        <option value="">Draft</option>
        <option value="">Delete</option>
    </select>
</div>
<div class="col-xs-4">
    <input type="submit" class="btn btn-success" name="submit" value="Apply">
    <a href="add_post.php" class="btn btn-primary">Add New</a>
</div>

    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Post Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>

<?php 
    $query = "SELECT * FROM posts";
    $select_all_posts = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_all_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comments = $row['post_comment_count'];
        $post_date = $row['post_date'];
        // $post_content =$row['post_content'];

        echo "<tr>";
?>

<td><input type="checkbox" class="checkBoxes" id="selectAllBoxes" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>;

<?php
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";

        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
        $select_categories_id = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

        echo "<td>{$cat_title}</td>";

            }

        echo "<td>{$post_status}</td>";
        echo "<td><img src='../images/{$post_image}' alt='image' width='100'></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comments}</td>";
        echo "<td>{$post_date}</td>";
        // Edit is passing two params edit_post and the post id
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
    }


?>
    </tbody>
</table>
</form>
<?php 
if(isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: posts.php");
}
?>