<?php
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View types</title>
        <style type="text/css">
            #thfix {
                font-family: sans-serif;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <table width="795" align="center" bgcolor="#EAD2AC">
            <tr align="center">
                <td colspan="6"><h2 style="font-family: Cambria; margin-top: 10px; margin-bottom: 5px;">View All types
                                                                                                        Here</h2></td>
            </tr>
            <tr align="center" bgcolor="#5FCEE8">
                <th id="thfix">type ID</th>
                <th id="thfix">type Title</th>
                <th id="thfix">Edit</th>
                <th id="thfix">Delete</th>
            </tr>
            <?php
            include("includes/db.php");

            $get_type = "select * from types";
            $run_type = mysqli_query($con, $get_type);

            $i = 0;

            while ($row_type = mysqli_fetch_array($run_type)) {
                $type_id = $row_type['type_id'];
                $type_title = $row_type['type_title'];
                $i++;
                ?>
                <tr align="center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $type_title; ?></td>
                    <td><a href="index.php?edit_type=<?php echo $type_id; ?>">Edit</a></td>
                    <td><a href="delete_type.php?delete_type=<?php echo $type_id; ?>">Delete</a></td>
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