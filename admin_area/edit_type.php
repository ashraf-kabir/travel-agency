<?php
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>
    <!DOCTYPE html>
    <?php
    include("includes/db.php");

    if (isset($_GET['edit_type'])) {
        $type_id = $_GET['edit_type'];
        $get_type = "select * from types where type_id='$type_id'";
        $run_type = mysqli_query($con, $get_type);
        $row_type = mysqli_fetch_array($run_type);

        $type_id = $row_type['type_id'];
        $type_title = $row_type['type_title'];
    }

    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit type</title>
        <style type="text/css">
            b {
                font-family: arial;
                font-size: 18px;
            }

            #btn {
                font-family: arial;
                font-size: 14px;
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 10px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
                background-color: #90B8F5;
                color: black;
            }

            #btn:hover {
                background-color: #634ADF;
                color: white;
            }
        </style>
    </head>
    <body>
        <form action="" method="post" style="padding: 80px;">
            <table align="center">
                <tr>
                    <td align="left"><b>Update type:</b></td>
                    <td align="right"><input type="text" name="new_type" value="<?php echo $type_title; ?>"></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right"><input id="btn" type="submit" name="update_type" value="Update type"></td>
                </tr>
            </table>
        </form>
        <?php
        include("includes/db.php");
        if (isset($_POST['update_type'])) {
            $update_id = $type_id;
            $new_type = $_POST['new_type'];
            $update_type = "update types set type_title='$new_type' where type_id='$update_id'";
            $run_type = mysqli_query($con, $update_type);

            if ($run_type) {
                echo "<script>alert('type has been UPDATED successfully!')</script>";
                echo "<script>window.open('index.php?view_types','_self')</script>";
            }
        }
        ?>
    </body>
    </html>
    <?php
}
?>