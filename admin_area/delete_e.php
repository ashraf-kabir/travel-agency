<?php
include("includes/db.php");

if (isset($_GET['delete_e'])) {
    $delete_id = $_GET['delete_e'];

    $delete_e = "delete from employees where emp_id='$delete_id'";

    $run_delete = mysqli_query($con, $delete_e);

    if ($run_delete) {
        echo "<script>alert('An EMPLOYEE has been REMOVED successfully!')</script>";
        echo "<script>window.open('index.php?view_employees','_self')</script>";
    }
}
?>