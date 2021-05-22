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
        <?php include 'includes/header.php'; ?>
        <!--Header ends here-->
        <!--Navbar starts here-->
        <?php include 'includes/navbar.php'; ?>
        <!--Navbar ends here-->
        <!--Content starts here-->
        <div class="content_wrapper">
            <!--left-sidebar starts-->
            <?php include "includes/left-sidebar.php"; ?>
            <!--left-sidebar ends-->
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
        <!--footer starts-->
        <?php include "includes/footer.php";?>
        <!--footer ends-->
    </div>
    <!--Main container ends here-->
</body>
</html>