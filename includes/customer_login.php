<?php
include("includes/db.php");
?>
<style type="text/css">
    #fixtd {
        margin-top: 15px;
    }

    #inputbox {
        margin-top: 5px;
        font-family: arial;
        font-size: 15px;
    }

    #btn {
        margin-top: 15px;
        margin-bottom: 15px;
        font-size: 18px;
        margin-bottom: 20px;
        font-weight: bolder;
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 13px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
    }

    #btn:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    #fp {
        margin-top: 10px;
    }
</style>
<div>
    <form action="" method="post">
        <table width="500px" align="center" bgcolor="skyblue">
            <tr align="center">
                <td colspan="3">
                    <h2 style="margin-top: 20px; margin-bottom: 15px; font-family: Cambria;">Login or Register to
                                                                                             Buy!</h2>
                </td>
            </tr>
            <tr>
                <td align="right"><b style="font-family: arial; font-size: 15px;">Email:</b></td>
                <td><input id="inputbox" type="text" name="email" placeholder="Enter your email" required=""></td>
            </tr>
            <tr>
                <td align="right"><b style="font-family: arial; font-size: 15px;">Password:</b></td>
                <td><input id="inputbox" type="password" name="pass" placeholder="Enter your password" required=""></td>
            </tr>
            <tr align="center">
                <td colspan="3"><a href="../checkout.php?forgot_pass"><p id="fp">Forgot Password?</p></a></td>
            </tr>
            <tr align="center">
                <td colspan="3"><input id="btn" type="submit" name="login" value="Login"></td>
                <br>
            </tr>
        </table>
        <h2 style="float: right; padding: 0px 25px 10px 0px; font-family: arial"><a href="customer_register.php"
                                                                                    style="text-decoration: none;">New?
                                                                                                                   Register
                                                                                                                   Here</a>
        </h2>
    </form>

    <?php
    global $con;
    if (isset($_POST['login'])) {
        $c_email = $_POST['email'];
        $c_pass = $_POST['pass'];

        $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
        $run_c = mysqli_query($con, $sel_c);

        $check_customer = mysqli_num_rows($run_c);

        if ($check_customer == 0) {
            echo "<script>alert('Password or email is incorrect, please try again!')</script>";
            exit();
        }

        $ip = getIp();

        $sel_cart = "select * from cart where ip_add='$ip'";

        $run_cart = mysqli_query($con, $sel_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if ($check_customer > 0 and $check_cart == 0) {
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('You have logged in successfully. Thanks!')</script>";
            echo "<script>window.open('customer/my_account.php','_self')</script>";
        } else {
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('You have logged in successfully. Thanks!')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }
    }
    ?>

</div>
