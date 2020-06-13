<?php
session_start();
include("includes/db.php");
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);

    $sel_user = "select * from admins where user_email='$email' AND user_pass='$pass'";
    $run_user = mysqli_query($con, $sel_user);
    $check_user = mysqli_num_rows($run_user);

    if ($check_user == 1) {
        $_SESSION['user_email'] = $email;
        echo "<script>window.open('index.php?logged_in=You have successfully Logged into ADMIN PANEL!','_self')</script>";
    } else {
        echo "<script>alert('Email or Password did not match, try again!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="styles/login_style.css" media="all">
</head>
<body>
    <div class="login">
        <h2 style="color: white; text-align: center;"><?php echo @$_GET['not_admin']; ?></h2>
        <h2 style="color: white; text-align: center;"><?php echo @$_GET['logged_out']; ?></h2>

        <h1>Admin Login</h1>
        <form method="post" action="login.php">
            <input type="text" name="email" placeholder="Email" required="required"/>
            <input type="password" name="password" placeholder="Password" required="required"/>
            <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Login</button>
        </form>
    </div>
</body>
</html>
