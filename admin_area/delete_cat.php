<?php
include("includes/db.php");

if (isset($_GET['delete_cat'])) {
    $delete_id = $_GET['delete_cat'];

    $delete_cat = "delete from categories where cat_id='$delete_id'";

    $run_delete = mysqli_query($con, $delete_cat);

    if ($run_delete) {
        echo "<script>alert('A CATEGORY has been DELETED!')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}

?>