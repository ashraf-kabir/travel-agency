<?php
include("includes/db.php");
if (isset($_POST['insert_post'])) {
    //getting the text data from the fields
    $package_cat = $_POST['package_cat'];
    $package_type = $_POST['package_type'];
    $package_title = $_POST['package_title'];
    $package_price = $_POST['package_price'];
    $package_desc = $_POST['package_desc'];

    //getting the image from the fields
    $package_image = $_FILES['package_image']['name'];
    $package_image_tmp = $_FILES['package_image']['tmp_name'];
    $package_keywords = $_POST['package_keywords'];

    move_uploaded_file($package_image_tmp, "package_images/$package_image");

    $insert_package = "insert into packages (package_cat, package_type, package_title, package_price, package_desc, package_image, package_keywords) values ('$package_cat','$package_type','$package_title','$package_price','$package_desc','$package_image','$package_keywords')";

    $insert_pack = mysqli_query($con, $insert_package);

    if ($insert_pack) {
        echo "<script>alert('Package has been inserted!')</script>";
        echo "<script>window.open('index.php?insert_package','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inserting Package</title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
</head>

<body bgcolor="skyblue">
    <form action="insert_package.php" method="post" enctype="multipart/form-data">
        <table align="center" width="795" border=2px bgcolor="ABB3C8">
            <tr align="center">
                <td colspan="7"><h2 style="font-family: Cambria;margin-top: 20px; margin-bottom: 15px;">Insert New
                                                                                                        package
                                                                                                        Here</h2>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Package Title:</b></td>
                <td><input type="text" name="package_title" size="60"></td>
            </tr>
            <tr>
                <td align="right"><b>Package Category:</b></td>
                <td>
                    <select name="package_cat">
                        <option>Select a Category</option>
                        <?php $get_cats = "select * from categories";

                        $run_cats = mysqli_query($con, $get_cats);

                        while ($row_cats = mysqli_fetch_array($run_cats)) {
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];

                            echo "<option value='$cat_id'>$cat_title</option>";
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Package Type:</b></td>
                <td>
                    <select name="package_type">
                        <option>Select a type</option>
                        <?php $get_types = "select * from types";

                        $run_types = mysqli_query($con, $get_types);

                        while ($row_types = mysqli_fetch_array($run_types)) {
                            $type_id = $row_types['type_id'];
                            $type_title = $row_types['type_title'];

                            echo "<option value='$type_id'>$type_title</option>";
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Package Image:</b></td>
                <td><input type="file" name="package_image"></td>
            </tr>
            <tr>
                <td align="right"><b>Package Price:</b></td>
                <td><input type="text" name="package_price"></td>
            </tr>
            <tr>
                <td align="right"><b>Package Description:</b></td>
                <td><textarea name="package_desc" cols="20" rows="10"></textarea></td>
            </tr>
            <tr>
                <td align="right"><b>Package Keywords:</b></td>
                <td><input type="text" name="package_keywords" size="70"></textarea></td>
            </tr>
            <tr align="center">
                <td colspan="7"><input style="margin-top: 10px; margin-bottom: 15px;" type="submit"
                                       name="insert_post" value="Insert Package"></td>
            </tr>
        </table>
    </form>
</body>
</html>