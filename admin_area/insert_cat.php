<?php
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Insert Category</title>
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
                    <td align="left"><b>Insert new Category:</b></td>
                    <td align="right"><input type="text" name="new_cat" required=""></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right"><input id="btn" type="submit" name="add_cat" value="Add Category"></td>
                </tr>
            </table>
        </form>

        <?php
        include("includes/db.php");
        if (isset($_POST['add_cat'])) {
            $new_cat = $_POST['new_cat'];
            $insert_cat = "insert into categories (cat_title) values ('$new_cat')";
            $run_cat = mysqli_query($con, $insert_cat);

            if ($run_cat) {
                echo "<script>alert('New CATEGORY has been INSERTED successfully!')</script>";
                echo "<script>window.open('index.php?view_cats','_self')</script>";
            }
        }
        ?>
    </body>
    </html>
    <?php
}
?>