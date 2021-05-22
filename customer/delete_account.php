<h2 style="text-align: center; margin-top: 20px; color: red;">Do you really want to DELETE your account?</h2><br>

<form action="" method="post">
    <input type="submit" name="yes" value="Yes, I want">
    <input type="submit" name="no" value="No, I was joking">
</form>

<?php
include("includes/db.php");

$user = $_SESSION['customer_email'];

if (isset($_POST['yes'])) {
    $delete_customer = "delete from customers where customer_email='$user'";
    $run_customer = mysqli_query($con, $delete_customer);

    echo "<script>alert('YOUR ACCOUNT HAS BEEN DELETED!')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}

if (isset($_POST['no'])) {
    echo "<script>alert('Do not joke again!')</script>";
    echo "<script>window.open('my_account.php','_self')</script>";
}
?>