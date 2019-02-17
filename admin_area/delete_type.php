<?php
include("includes/db.php");

if (isset($_GET['delete_type'])) {
    $delete_id = $_GET['delete_type'];

    $delete_type = "delete from types where type_id='$delete_id'";

    $run_delete = mysqli_query($con, $delete_type);

    if ($run_delete) {
        echo "<script>alert('A type has been DELETED!')</script>";
        echo "<script>window.open('index.php?view_types','_self')</script>";
    }
}
?>