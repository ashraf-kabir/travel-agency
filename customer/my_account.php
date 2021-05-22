<?php
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Online Shop</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>

<body>
    <!--Main container starts here-->
    <div class="main_wrapper">
        <!--Header starts here-->
        <div class="header_wrapper">
            <a href="../index.php"><img id="logo" src="images/logo.png"></a>
            <img id="banner" src="images/banner.jpg">
        </div>
        <!--Header ends here-->
        <!--Navbar starts here-->
        <div class="menubar">
            <ul id="menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../all_packages.php">All Packages</a></li>
                <li><a href="my_account.php">My Account</a></li>
                <li><a href="../customer_register.php">Sign Up</a></li>
                <li><a href="../cart.php">Shopping Cart</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <div id="form">
                <form method="get" action="results.php" enctype="multipart/form-data">
                    <input type="text" name="user_query" placeholder="Search a package">
                    <input type="submit" name="search" value="Search">
                </form>
            </div>
        </div>
        <!--Navbar ends here-->
        <!--Content starts here-->
        <div class="content_wrapper">
            <div class="sidebar">
                <div id="sidebar_title">My Account:</div>
                <ul id="cats">
                    <?php
                    global $con;
                    $user = $_SESSION['customer_email'];
                    $get_img = "select * from customers where customer_email='$user'";
                    $run_img = mysqli_query($con, $get_img);
                    $row_img = mysqli_fetch_array($run_img);

                    $c_image = $row_img['customer_image'];
                    $c_name = $row_img['customer_name'];
                    echo "<p style='text-align: center;'><img src='customer_images/$c_image' width='150' height'150'/></p>";
                    ?>
                    <li><a href="../cart.php">My Orders</a></li>
                    <li><a href="my_account.php?edit_account">Edit Account</a></li>
                    <li><a href="my_account.php?change_pass">Change Password</a></li>
                    <li><a href="my_account.php?delete_account">Delete Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>

            </div>
            <div id="content_area">
                <?php cart(); ?>
                <div id="shopping_cart">
                    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">
                        <?php
                        if (isset($_SESSION['customer_email'])) {
                            echo "<b>Welcome: </b>" . $_SESSION['customer_email'];
                        }
                        ?>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<a href='checkout.php' style='color: orange;'>Login</a>";
                        } else {
                            echo "<a href='logout.php' style='color: orange;''>Logout</a>";
                        }
                        ?>
                    </span>
                </div>
                <div id="packages_box">
                    <?php
                    if (!isset($_GET['my_orders'])) {
                        if (!isset($_GET['edit_account'])) {
                            if (!isset($_GET['change_pass'])) {
                                if (!isset($_GET['delete_account'])) {
                                    echo "<h2 style='padding: 20px; color: black;'>Welcome: $c_name</h2><br>
                                    <b>You can see your orders' progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
                                }
                            }
                        }
                    }
                    ?>
                    <?php
                    if (isset($_GET['edit_account'])) {
                        include("edit_account.php");
                    }
                    if (isset($_GET['change_pass'])) {
                        include("change_pass.php");
                    }
                    if (isset($_GET['delete_account'])) {
                        include("delete_account.php");
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--Content ends here-->
        <div id="footer">
            <h2 style="text-align: center; padding-top: 30px;">&copy Ashraf Kabir MMXVIII</h2>
        </div>
    </div>
    <!--Main container ends here-->
</body>

</html>