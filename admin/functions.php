<?php
function confirmQuery($result) {
    global $connection;
    if(!$result) {
                die("QUERY FAILED " . mysqli_error($connection));
    }

}

function insert_categories() {
    global $connection;
    if(isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
    // Validation
        if($cat_title == "" || empty($cat_title)) {
        echo "This field should not be empty";
    } else {
    //     // If it is not empty we want to run that query.
        $query = "INSERT INTO categories(cat_title) ";
        $query .= "VALUES('{$cat_title}')";
        $create_category_query = mysqli_query($connection, $query);
        // If query is not successful we throw an error message
        if(!$create_category_query) {
            die('Query failed' . mysqli_error($connection));
        }
    }
}
}

function update_categories() {
    global $connection;
    if(isset($_GET['edit'])) {
        $cat_id = $_GET['edit'];
    
        include "includes/update_categories.php";
    
    }
}

function get_categories() {
    global $connection;
    $query = "SELECT * FROM categories";
    // send the query into the db
    // $connection variable is in db.php
    $select_categories = mysqli_query($connection, $query);
    // Loop uses a function msqli_fetch_assoc
        while($row = mysqli_fetch_assoc($select_categories)) {
        // assign the column a variable to make it easier to translate/understand
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</a></td>";
        echo "<td>{$cat_title}</a></td>";
        // Below the ?delete is the key and the value is the {$cat_id}
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function delete_category() {
    global $connection;
    if(isset($_GET['delete'])) {
        $get_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        // Refreshes the page back to categories.php -- Connected to <?php ob_start();  on admin_header.php
        header("Location: categories.php");
    }
}
?>