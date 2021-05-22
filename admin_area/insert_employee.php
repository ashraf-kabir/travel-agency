<?php
include("includes/db.php");
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Inserting Employee</title>
    </head>

    <body bgcolor="skyblue">
        <form action="insert_employee.php" method="post" enctype="multipart/form-data">
            <table align="center" width="795" border=2px bgcolor="ABB3C8">
                <tr align="center">
                    <td colspan="7"><h2 style="font-family: Cambria;margin-top: 20px; margin-bottom: 15px;">Insert New
                                                                                                            Employee</h2>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Name:</b></td>
                    <td><input type="text" name="emp_name" size="40"></td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Email:</b></td>
                    <td><input type="email" name="emp_email" size="40"></td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Designation:</b></td>
                    <td><input type="text" name="emp_designation"></td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Location:</b></td>
                    <td><input type="text" name="emp_location"></td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Address:</b></td>
                    <td><textarea name="emp_address" cols="40" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td align="right"><b>Employee Contact:</b></td>
                    <td><input type="text" name="emp_contact" size="30"></textarea></td>
                </tr>
                <tr align="center">
                    <td colspan="7"><input style="margin-top: 10px; margin-bottom: 15px;" type="submit"
                                           name="insert_post" value="Insert Employee"></td>
                </tr>
            </table>
        </form>
    </body>
    </html>
<?php
if (isset($_POST['insert_post'])) {
    //getting the text data from the fields
    $emp_name = $_POST['emp_name'];
    $emp_email = $_POST['emp_email'];
    $emp_designation = $_POST['emp_designation'];
    $emp_location = $_POST['emp_location'];
    $emp_address = $_POST['emp_address'];
    $emp_contact = $_POST['emp_contact'];

    $insert_employee = "insert into employees (emp_name, emp_email, emp_designation, emp_location, emp_address, emp_contact) values ('$emp_name','$emp_email','$emp_designation','$emp_location','$emp_address','$emp_contact')";

    $insert_emp = mysqli_query($con, $insert_employee);

    if ($insert_emp) {
        echo "<script>alert('An employee has been inserted!')</script>";
        echo "<script>window.open('index.php?insert_employee','_self')</script>";
    }
}
?>