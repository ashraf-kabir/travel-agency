<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css" media="all">
    </head>
    <body>
        <div class="main_wrapper">
            <div id="header">

            </div>
            <div id="right">
                <h2 style="text-align: center; margin-top: 10px; font-family: Cambria;">Manage Content</h2>
                <ul>
                    <li><a href="index.php">Admin Panel : Home</a></li>
                    <li><a href="index.php?insert_package">Insert New Package</a></li>
                    <li><a href="index.php?view_packages">View All Packages</a></li>
                    <li><a href="index.php?insert_cat">Insert New Categories</a></li>
                    <li><a href="index.php?view_cats">View All Categories</a></li>
                    <li><a href="index.php?insert_type">Insert New Types</a></li>
                    <li><a href="index.php?view_types">View All Types</a></li>
                    <li><a href="index.php?insert_employee">Insert New Employee</a></li>
                    <li><a href="index.php?view_employees">View All Employees</a></li>
                    <li><a href="index.php?view_customers">View All Customers</a></li>
                    <li><a href="index.php?view_orders">View Orders</a></li>
                    <li><a href="index.php?view_payments">View Payments</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div id="left">
                <h2 style="color: red; text-align: center; font-family: Cambria; margin-top: 15px;"><?php echo @$_GET['logged_in']; ?></h2>
                <?php
                if (isset($_GET['insert_package'])) {
                    include("insert_package.php");
                }
                if (isset($_GET['view_packages'])) {
                    include("view_packages.php");
                }
                if (isset($_GET['edit_pack'])) {
                    include("edit_pack.php");
                }
                if (isset($_GET['insert_cat'])) {
                    include("insert_cat.php");
                }
                if (isset($_GET['view_cats'])) {
                    include("view_cats.php");
                }
                if (isset($_GET['edit_cat'])) {
                    include("edit_cat.php");
                }
                if (isset($_GET['insert_type'])) {
                    include("insert_type.php");
                }
                if (isset($_GET['view_types'])) {
                    include("view_types.php");
                }
                if (isset($_GET['edit_type'])) {
                    include("edit_type.php");
                }
                if (isset($_GET['view_customers'])) {
                    include("view_customers.php");
                }
                if (isset($_GET['insert_employee'])) {
                    include("insert_employee.php");
                }
                if (isset($_GET['view_employees'])) {
                    include("view_employees.php");
                }
                if (isset($_GET['edit_emp'])) {
                    include("edit_emp.php");
                }
                ?>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>
