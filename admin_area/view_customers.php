<?php
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View Customers</title>
        <style type="text/css">
            #thfix {
                font-family: sans-serif;
                padding: 4px;
            }
        </style>
    </head>
    <body>
        <table width="795" align="center" bgcolor="#EAD2AC">
            <tr align="center">
                <td colspan="6"><h2 style="font-family: Cambria; margin-top: 10px; margin-bottom: 5px;">View All
                                                                                                        Customers
                                                                                                        Here</h2></td>
            </tr>
            <tr align="center" bgcolor="#5FCEE8">
                <th id="thfix">Sl.</th>
                <th id="thfix">Name</th>
                <th id="thfix">Email</th>
                <th id="thfix">Passport</th>
                <th id="thfix">Image</th>
                <th id="thfix">Delete</th>
            </tr>
            <?php
            include("includes/db.php");

            $get_c = "select * from customers";
            $run_c = mysqli_query($con, $get_c);

            $i = 0;

            while ($row_c = mysqli_fetch_array($run_c)) {
                $c_id = $row_c['customer_id'];
                $c_name = $row_c['customer_name'];
                $c_email = $row_c['customer_email'];
                $c_passport = $row_c['c_passport'];
                $c_image = $row_c['customer_image'];
                $i++;
                ?>
                <tr align="center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $c_name; ?></td>
                    <td><?php echo $c_email; ?></td>
                    <td><?php echo $c_passport; ?></td>
                    <td><img src="../customer/customer_images/<?php echo $c_image; ?>" width="50" height="50"></td>
                    <td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
    </html>
    <?php
}
?>