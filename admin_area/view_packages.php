<?php
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View Packages</title>
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
                                                                                                        packages
                                                                                                        Here</h2></td>
            </tr>
            <tr align="center" bgcolor="#5FCEE8">
                <th id="thfix">Sl.</th>
                <th id="thfix">Title</th>
                <th id="thfix">Image</th>
                <th id="thfix">Price</th>
                <th id="thfix">Edit</th>
                <th id="thfix">Delete</th>
            </tr>
            <?php
            include("includes/db.php");

            $get_pack = "select * from packages";
            $run_pack = mysqli_query($con, $get_pack);

            $i = 0;

            while ($row_pack = mysqli_fetch_array($run_pack)) {
                $pack_id = $row_pack['package_id'];
                $pack_title = $row_pack['package_title'];
                $pack_image = $row_pack['package_image'];
                $pack_price = $row_pack['package_price'];
                $i++;
                ?>
                <tr align="center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $pack_title; ?></td>
                    <td><img src="package_images/<?php echo $pack_image; ?>" width="40" height="40"></td>
                    <td><?php echo $pack_price; ?></td>
                    <td><a href="index.php?edit_pack=<?php echo $pack_id; ?>">Edit</a></td>
                    <td><a href="delete_pack.php?delete_pack=<?php echo $pack_id; ?>">Delete</a></td>
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
