<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Travel Bird : Checkout</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>

<body>
    <!--Main container starts here-->
    <div class="main_wrapper">
        <!--Header starts here-->
        <div class="header_wrapper">
            <a href="index.php"><img id="logo" src="images/logo.jpg"></a>
            <img id="banner" src="images/banner.jpg">
        </div>
        <!--Header ends here-->
        <!--Navbar starts here-->
        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_packages.php">All Packages</a></li>
                <li><a href="customer/my_account.php">My Account</a></li>
                <li><a href="customer_register.php">Sign Up</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="contact.php">Contact Us</a></li>
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
                <div id="sidebar_title">Categories</div>
                <ul id="cats">
                    <?php getCats(); ?>
                </ul>
                <div id="sidebar_title">types</div>
                <ul id="cats">
                    <?php getTypes(); ?>
                </ul>
            </div>
            <div id="content_area">
                <?php cart(); ?>
                <div id="shopping_cart">
                    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">
                        <?php
                        if (isset($_SESSION['customer_email'])) {
                            echo "<b>Welcome: </b>".$_SESSION['customer_email']."<b style='color: yellow;'> Your</b>";
                        } else {
                            echo "<b>Welcome Guest:</b>";
                        }
                        ?>
                        <b style="color: yellow;">Shopping Cart-</b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color: yellow;">Go to Cart</a></b></span>
                </div>
                <div id="packages_box">
                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        include("customer_login.php");
                    } else {
                        include("payment.php");
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--Content ends here-->
        <div id="footer">
            <h2 style="text-align: center; padding-top: 30px;">&copy Travel Bird MMXVIII</h2>
        </div>
    </div>
    <!--Main container ends here-->
</body>

</html>