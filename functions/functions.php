<?php

$con = mysqli_connect("localhost", "root", "", "tagency");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//getting user ip address
function getIp()
{
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}

//creating the shopping cart
function cart()
{
    if (isset($_GET['add_cart'])) {
        global $con;
        $ip = getIp();
        $pack_id = $_GET['add_cart'];
        $check_pack = "select * from cart where ip_add='$ip' and p_id='$pack_id'";

        $run_check = mysqli_query($con, $check_pack);

        if (mysqli_num_rows($run_check) > 0) {
            echo "";
        } else {
            $insert_pack = "insert into cart (p_id, ip_add) values ('$pack_id','$ip')";
            $run_pack = mysqli_query($con, $insert_pack);
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

//getting the total added items
function total_items()
{
    global $con;
    if (isset($_GET['add_cart'])) {
        $ip = getip();
        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
    } else {
        $ip = getip();
        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    echo $count_items;
}

//getting the total price of the items in the carts
function total_price()
{
    global $con;
    $total = 0;
    $ip = getIp();
    $sel_price = "select * from cart where ip_add='$ip'";
    $run_price = mysqli_query($con, $sel_price);

    while ($p_price = mysqli_fetch_array($run_price)) {
        $pack_id = $p_price['p_id'];
        $pack_price = "select * from packages where package_id='$pack_id'";
        $run_pack_price = mysqli_query($con, $pack_price);

        while ($pp_price = mysqli_fetch_array($run_pack_price)) {
            $package_price = array($pp_price['package_price']);
            $values = array_sum($package_price);
            $total += $values;
        }
    }
    echo "$" . $total;
}

//getting the categories
function getCats()
{
    global $con;
    $get_cats = "select * from categories";

    $run_cats = mysqli_query($con, $get_cats);

    while ($row_cats = mysqli_fetch_array($run_cats)) {
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
        echo "<li><a href='index.php?cat=$cat_id' style='text-decoration: none;'>$cat_title</a></li>";
    }
}

//getting the types
function getTypes()
{
    global $con;
    $get_types = "select * from types";

    $run_types = mysqli_query($con, $get_types);

    while ($row_types = mysqli_fetch_array($run_types)) {
        $type_id = $row_types['type_id'];
        $type_title = $row_types['type_title'];

        echo "<li><a href='index.php?type=$type_id' style='text-decoration: none;'>$type_title</a></li>";
    }
}

function getPack()
{
    if (!isset($_GET['cat'])) {
        if (!isset($_GET['type'])) {
            global $con;
            $get_pack = "select * from packages order by RAND() LIMIT 0,6";

            $run_pack = mysqli_query($con, $get_pack);

            while ($row_pack = mysqli_fetch_array($run_pack)) {
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
				<p><b>Cost: $ $pack_price</b></p>
				<a href='details.php?pack_id=$pack_id' style='float: left;font-size:18px;text-decoration: none;'>Details</a>
				<a href='index.php?add_cart=$pack_id'><button style='float: right; font-size:14px; cursor: pointer; padding: 2px 4px;'>Book</button></a>
				</div>
				";
            }
        }
    }
}

function getCatPack()
{
    if (isset($_GET['cat'])) {
        $cat_id = $_GET['cat'];
        global $con;
        $get_cat_pack = "select * from packages where package_cat='$cat_id'";

        $run_cat_pack = mysqli_query($con, $get_cat_pack);

        $count_cats = mysqli_num_rows($run_cat_pack);

        if ($count_cats == 0) {
            echo "<h2 style='padding=20px;'>No packages were found in this category!</h2>";
        }

        while ($row_cat_pack = mysqli_fetch_array($run_cat_pack)) {
            $pack_id = $row_cat_pack['package_id'];
            $pack_cat = $row_cat_pack['package_cat'];
            $pack_type = $row_cat_pack['package_type'];
            $pack_title = $row_cat_pack['package_title'];
            $pack_price = $row_cat_pack['package_price'];
            $pack_image = $row_cat_pack['package_image'];

            echo "
			<div id='single_package'>
			<h3>$pack_title</h3>
			<img src='admin_area/package_images/$pack_image' width='180' height='180'>
			<p><b> $ $pack_price</b></p>
			<a href='details.php?pack_id=$pack_id' style='float: left;font-size:18px;text-decoration: none;'>Details</a>
			<a href='index.php?pack_id=$pack_id'><button style='float: right; font-size:14px; cursor: pointer; padding: 2px 4px;'>Book</button></a>
			</div>
			";
        }
    }
}

function getTypePack()
{
    if (isset($_GET['type'])) {
        $type_id = $_GET['type'];
        global $con;
        $get_type_pack = "select * from packages where package_type='$type_id'";

        $run_type_pack = mysqli_query($con, $get_type_pack);

        $count_types = mysqli_num_rows($run_type_pack);

        if ($count_types == 0) {
            echo "<h2 style='padding=20px;'>No packages were found associated with this type!</h2>";
        }

        while ($row_type_pack = mysqli_fetch_array($run_type_pack)) {
            $pack_id = $row_type_pack['package_id'];
            $pack_cat = $row_type_pack['package_cat'];
            $pack_type = $row_type_pack['package_type'];
            $pack_title = $row_type_pack['package_title'];
            $pack_price = $row_type_pack['package_price'];
            $pack_image = $row_type_pack['package_image'];

            echo "
			<div id='single_package'>
			<h3>$pack_title</h3>
			<img src='admin_area/package_images/$pack_image' width='180' height='180'>
			<p><b> $ $pack_price</b></p>
			<a href='details.php?pack_id=$pack_id' style='float: left;font-size:18px;text-decoration: none;'>Details</a>
			<a href='index.php?pack_id=$pack_id'><button style='float: right; font-size:14px; cursor: pointer; padding: 2px 4px;'>Book</button></a>
			</div>
			";
        }
    }
}
