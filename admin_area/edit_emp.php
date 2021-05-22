<?php
include("includes/db.php");
if (isset($_POST['update_employee'])) {
    //getting the text data from the fields
    $update_id = $_GET['edit_emp'];
    $employee_name = $_POST['emp_name'];
    $employee_email = $_POST['emp_email'];
    $employee_designation = $_POST['emp_designation'];
    $employee_location = $_POST['emp_location'];
    $employee_address = $_POST['emp_address'];
    $employee_contact = $_POST['emp_contact'];

    $update_employee = "update employees set emp_name='$employee_name', emp_email='$employee_email', emp_designation='$employee_designation', emp_location='$employee_location', emp_address='$employee_address', emp_contact='$employee_contact' where emp_id='$update_id'";

    $run_pack = mysqli_query($con, $update_employee);

    if ($run_pack) {
        echo "<script>alert('An employee has been UPDATED successfully!')</script>";
        echo "<script>window.open('index.php?view_employees','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Employee</title>
</head>
<body bgcolor="skyblue">
    <?php
    if (isset($_GET['edit_emp'])) {
        $get_id = $_GET['edit_emp'];
        $get_emp = "select * from employees where emp_id='$get_id'";
        $run_emp = mysqli_query($con, $get_emp);
        $row_emp = mysqli_fetch_array($run_emp);

        $emp_id = $row_emp['emp_id'];
        $emp_name = $row_emp['emp_name'];
        $emp_email = $row_emp['emp_email'];
        $emp_designation = $row_emp['emp_designation'];
        $emp_location = $row_emp['emp_location'];
        $emp_address = $row_emp['emp_address'];
        $emp_contact = $row_emp['emp_contact'];
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table align="center" width="795" border=2px bgcolor="ABB3C8">
                <tr align="center">
                    <td colspan="7"><h2 style="font-family: Cambria;margin-top: 20px; margin-bottom: 15px;">Insert New
                                                                                                            Employee</h2>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Name:</b></td>
                    <td><input type="text" name="emp_name" value="<?php echo $emp_name; ?>" size="40"></td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Email:</b></td>
                    <td><input type="email" name="emp_email" value="<?php echo $emp_email; ?>" size="40"></td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Designation:</b></td>
                    <td><input type="text" name="emp_designation" value="<?php echo $emp_designation; ?>"></td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Location:</b></td>
                    <td><input type="text" name="emp_location" value="<?php echo $emp_location; ?>"></td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Address:</b></td>
                    <td><textarea name="emp_address" cols="40" rows="10"><?php echo $emp_address; ?></textarea></td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Contact:</b></td>
                    <td><input type="text" name="emp_contact" value="<?php echo $emp_contact; ?>" size="30"></textarea>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="7"><input style="margin-top: 10px; margin-bottom: 15px;" type="submit"
                                           name="update_employee" value="Update Employee"></td>
                </tr>
            </table>
        </form>
        <?php
    }
    ?>
</body>
</html>