<?php
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Bird : Details</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
    <!--Main container starts here-->
    <div class="main_wrapper">
        <!--Header starts here-->
        <div class="header_wrapper">
            <img id="logo" src="images/logo.jpg">
            <img id="banner" src="images/banner.jpg">
        </div>
        <!--Header ends here-->
        <!--Navbar starts here-->
        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_packages.php">All packages</a></li>
                <li><a href="../tagency/customer/my_account.php">My Account</a></li>
                <li><a href="../tagency/customer_register.php">Sign Up</a></li>
                <li><a href="../tagency/cart.php">Shopping Cart</a></li>
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
                <div id="shopping_cart">
                    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">Welcome Guest! <b
                                style="color: yellow;">Shopping Cart-</b> Total Items: Total Price: <a href="cart.php"
                                                                                                       style="color: yellow;">Go to Cart</a></b></span>
                </div>
                <div id="packages_box">
                    <?php
                    if (isset($_GET['pack_id'])) {
                        $package_id = $_GET['pack_id'];

                        $get_pack = "select * from packages where package_id='$package_id'";

                        $run_pack = mysqli_query($con, $get_pack);

                        while ($row_pack = mysqli_fetch_array($run_pack)) {
                            $pack_id = $row_pack['package_id'];
                            $pack_title = $row_pack['package_title'];
                            $pack_price = $row_pack['package_price'];
                            $pack_image = $row_pack['package_image'];
                            $pack_desc = $row_pack['package_desc'];

                            echo "
                            <div id='single_package'>
                            <h3 style='font-family: Cambria; margin-bottom: 2px;'>$pack_title</h3>
                            <img src='admin_area/package_images/$pack_image' width='400' height='300'>
                            <p><b>Cost $ $pack_price</b></p>
                            <p>$pack_desc</p>
                            <a href='index.php' style='float: left; font-size: 18px;'>Go Back</a>
                            <a href='index.php?pack_id=$pack_id'><button style='float: right;font-size:16px; cursor: pointer; padding: 2px 4px; margin:2px;'>Book</button></a>
                            </div>
                            ";
                        }
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