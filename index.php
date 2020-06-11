<?php
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Bird : Home</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <style>
        .adminbtn {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 1px 2px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            float: right;
            margin-top: 12px;
            margin-left: 2px;
        }

        .adminbtn:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
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
                <li><a href="checkout.php">My Account</a></li>
                <li><a href="customer_register.php">Sign Up</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            <div id="form">
                <form method="get" action="results.php" enctype="multipart/form-data">
                    <input type="text" name="user_query" placeholder="Search all">
                    <input id="search" type="submit" name="search" value="Search">
                </form>
            </div>
        </div>
        <!--Navbar ends here-->
        <!--Content starts here-->
        <div class="content_wrapper">
            <div class="sidebar">
                <div id="sidebar_title"><b>Categories</b></div>
                <ul id="cats">
                    <?php getCats(); ?>
                </ul>
                <br>
                <div id="sidebar_title"><b>Types</b></div>
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
                            echo "<b>Welcome: </b>" . $_SESSION['customer_email'] . "<b style='color: yellow;'> Your</b>";
                        } else {
                            echo "<b>Welcome Guest:</b>";
                        }
                        ?>
                        <b style="color: yellow;">Shopping Cart-</b> Total Items: <?php total_items(); ?>
                        Total Price: <?php total_price(); ?> <a href="cart.php" style="color: yellow;">Go to Cart</a>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<a href='checkout.php' style='color: orange;'>User Login</a>";
                        } else {
                            echo "<a href='logout.php' style='color: orange;''>Logout</a>";
                        }
                        ?>
                        <button class="adminbtn"><a style="text-decoration: none; color: #ffffff;"
                                                    href="admin_area/index.php">Admin Login</a></button>
                    </span>
                </div>
                <div id="packages_box">
                    <?php getPack(); ?>
                    <?php getCatPack(); ?>
                    <?php getTypePack(); ?>
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