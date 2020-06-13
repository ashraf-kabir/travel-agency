<?php
include("includes/db.php");

	if (isset($_GET['delete_pack'])) {
		$delete_id = $_GET['delete_pack'];

		$delete_pack = "delete from packages where package_id='$delete_id'";

		$run_delete = mysqli_query($con, $delete_pack);

		if ($run_delete) {
			echo "<script>alert('A package has been DELETED!')</script>";
			echo "<script>window.open('index.php?view_packages','_self')</script>";
		}
	}

?>