<!DOCTYPE html>
<?php
include("functions/functions.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Bird : All Packages</title>
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
                <li><a href="#">All Packages</a></li>
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
                    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">Welcome Guest! <b style="color: yellow;">Shopping Cart-</b> Total Items: Total Price: <a href="cart.php" style="color: yellow;">Go to Cart</a></b></span>
                </div>
                <div id="packages_box">
                    <?php
                    $get_pack = "select * from packages";

                    $run_pack = mysqli_query($con, $get_pack);

                    while ($row_pack=mysqli_fetch_array($run_pack)) {
                        $pack_id = $row_pack['package_id'];
                        $pack_cat = $row_pack['package_cat'];
                        $pack_type = $row_pack['package_type'];
                        $pack_title = $row_pack['package_title'];
                        $pack_price = $row_pack['package_price'];
                        $pack_image = $row_pack['package_image'];

                        echo "
                        <div id='single_package'>
                        <h3 style='font-family: Cambria; margin-bottom: 2px;'>$pack_title</h3>
                        <img src='admin_area/package_images/$pack_image' width='180' height='180'>
                        <p><b> Cost $ $pack_price</b></p>
                        <a href='details.php?pack_id=$pack_id' style='float: left; font-size:18px;'>Details</a>
                        <a href='index.php?pack_id=$pack_id'><button style='float: right; font-size:16px; cursor: pointer; padding: 2px 4px; margin:2px;'>Book</button></a>
                        </div>
                        ";
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