<h2 style="text-align: center; margin-top: 20px;">Change Your Password</h2><br>
<form action="" method="post">
    <table align="center" width="550">
        <tr align="right">
            <td><b>Enter current password:</td>
            <td><input type="password" name="current_pass" required=""></b></td>
        </tr>
        <tr align="right">
            <td><b>Enter new password:</b></td>
            <td><input type="password" name="new_pass" required=""></td>
        </tr>
        <tr align="right">
            <td><b>Re-enter new password:</b></td>
            <td><input type="password" name="new_pass_again" required=""></td>
        </tr>
        <tr align="right">
            <td></td>
            <td colspan="8"><input type="submit" name="change_pass" value="Change Password"></td>
        </tr>
    </table>
</form>
<?php
include("includes/db.php");

if (isset($_POST['change_pass'])) {

    $user = $_SESSION['customer_email'];

    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $new_again = $_POST['new_pass_again'];

    $sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user'";

    $run_pass = mysqli_query($con, $sel_pass);

    $check_pass = mysqli_num_rows($run_pass);

    if ($check_pass == 0) {
        echo "<script>alert('Your current password is wrong!')</script>";
        exit();
    }

    if ($new_pass != $new_again) {
        echo "<script>alert('New password did not match!')</script>";
        exit();
    } else {
        $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$user'";
        $run_update = mysqli_query($con, $update_pass);

        echo "<script>alert('Your current password has been updated successsfully!')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }
}
?>