<?php
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>
    <!DOCTYPE html>
    <?php
    include("includes/db.php");

    if (isset($_GET['edit_cat'])) {
        $cat_id = $_GET['edit_cat'];
        $get_cat = "select * from categories where cat_id='$cat_id'";
        $run_cat = mysqli_query($con, $get_cat);
        $row_cat = mysqli_fetch_array($run_cat);

        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['cat_title'];
    }
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Category</title>
        <style type="text/css">
            b {
                font-family: arial;
                font-size: 18px;
            }

            #btn {
                font-family: arial;
                font-size: 14px;
                background-color: #4CAF50;
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
                    <td align="left"><b>Update Category:</b></td>
                    <td align="right"><input type="text" name="new_cat" value="<?php echo $cat_title; ?>"></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right"><input id="btn" type="submit" name="update_cat" value="Update Category"></td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['update_cat'])) {
            $update_id = $cat_id;
            $new_cat = $_POST['new_cat'];
            $update_cat = "update categories set cat_title='$new_cat' where cat_id='$update_id'";
            $run_cat = mysqli_query($con, $update_cat);

            if ($run_cat) {
                echo "<script>alert('CATEGORY has been UPDATED successfully!')</script>";
                echo "<script>window.open('index.php?view_cats','_self')</script>";
            }
        }
        ?>
    </body>
    </html>
    <?php
}
?>