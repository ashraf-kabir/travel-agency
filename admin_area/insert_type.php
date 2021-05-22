<?php
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Insert type</title>
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
                    <td align="left"><b>Insert new type:</b></td>
                    <td align="right"><input type="text" name="new_type" required=""></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right"><input id="btn" type="submit" name="add_type" value="Add type"></td>
                </tr>
            </table>
        </form>
        <?php
        include("includes/db.php");
        if (isset($_POST['add_type'])) {
            $new_type = $_POST['new_type'];
            $insert_type = "insert into types (type_title) values ('$new_type')";
            $run_type = mysqli_query($con, $insert_type);

            if ($run_type) {
                echo "<script>alert('New type has been INSERTED successfully!')</script>";
                echo "<script>window.open('index.php?view_types','_self')</script>";
            }
        }
        ?>
    </body>
    </html>
    <?php
}
?>