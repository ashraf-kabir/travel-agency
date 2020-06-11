<?php
include("includes/db.php");
if (isset($_GET['edit_pack'])) {
    $get_id = $_GET['edit_pack'];
    $get_pack = "select * from packages where package_id='$get_id'";
    $run_pack = mysqli_query($con, $get_pack);

    $row_pack = mysqli_fetch_array($run_pack);
    $pack_id = $row_pack['package_id'];
    $pack_title = $row_pack['package_title'];
    $pack_image = $row_pack['package_image'];
    $pack_price = $row_pack['package_price'];
    $pack_desc = $row_pack['package_desc'];
    $pack_keywords = $row_pack['package_keywords'];
    $pack_cat = $row_pack['package_cat'];
    $pack_type = $row_pack['package_type'];

    $get_cat = "select * from categories where cat_id='$pack_cat'";
    $run_cat = mysqli_query($con, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);

    //Asif v0.1
    $category_id = $row_cat['cat_id'];
    $category_title = $row_cat['cat_title'];

    $get_type = "select * from types where type_id='$pack_type'";
    $run_type = mysqli_query($con, $get_type);
    $row_type = mysqli_fetch_array($run_type);

    //Asif v0.1
    $type_id_x = $row_type['type_id'];
    $type_title = $row_type['type_title'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Package</title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
</head>
<body bgcolor="skyblue">
    <form action="" method="post" enctype="multipart/form-data">
        <table align="center" width="795" border=2px bgcolor="ABB3C8">
            <tr align="center">
                <td colspan="7"><h2 style="font-family: Cambria; margin-top: 20px; margin-bottom: 15px;">Edit & Update
                                                                                                         Package</h2>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Package Title:</b></td>
                <td><input type="text" name="package_title" size="60" value="<?php echo $pack_title; ?>"></td>
            </tr>
            <tr>
                <td align="right"><b>Package Category:</b></td>
                <td>
                    <select name="package_cat">
                        //Asif v0.1
                        <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                        <?php $get_cats = "select * from categories";

                        $run_cats = mysqli_query($con, $get_cats);

                        while ($row_cats = mysqli_fetch_array($run_cats)) {

                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];

                            echo "<option value='$cat_id'>$cat_id - $cat_title</option>";
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Package Type:</b></td>
                <td>
                    <select name="package_type">
                        //Asif v0.1
                        <option value="<?php echo $type_id_x; ?>"><?php echo $type_title; ?></option>
                        <?php $get_types = "select * from types";
                        $run_types = mysqli_query($con, $get_types);
                        while ($row_types = mysqli_fetch_array($run_types)) {
                            $type_id = $row_types['type_id'];
                            $type_title = $row_types['type_title'];
                            echo "<option value='$type_id'>$type_id - $type_title</option>";
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Package Image:</b></td>
                <td><input type="file" name="package_image"><img src="package_images/<?php echo $pack_image; ?>"
                                                                 width="50" height="50"></td>
            </tr>
            <tr>
                <td align="right"><b>Package Price:</b></td>
                <td><input type="text" name="package_price" value="<?php echo $pack_price; ?>"></td>
            </tr>
            <tr>
                <td align="right"><b>Package Description:</b></td>
                <td><textarea name="package_desc" cols="20" rows="10"><?php echo $pack_desc; ?></textarea></td>
            </tr>
            <tr>
                <td align="right"><b>Package Keywords:</b></td>
                <td><input type="text" name="package_keywords" size="70" value="<?php echo $pack_keywords; ?>"></td>
            </tr>
            <tr align="center">
                <td colspan="7"><input style="margin-top: 10px; margin-bottom: 15px;" type="submit"
                                       name="update_package" value="Update Package"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php

if (isset($_POST['update_package'])) {
    //getting the text data from the fields
    $update_id = $pack_id;
    $package_title = $_POST['package_title'];
    $package_cat = $_POST['package_cat'];
    $package_type = $_POST['package_type'];
    $package_price = $_POST['package_price'];
    $package_desc = $_POST['package_desc'];
    $package_keywords = $_POST['package_keywords'];

    //getting the image from the fields
    $package_image = $_FILES['package_image']['name'];
    $package_image_tmp = $_FILES['package_image']['tmp_name'];

    //Asif v0.2
    $update_package;
    if ($_FILES['package_image']['name'] == "") {
        $update_package = "update packages set package_cat='$package_cat', package_type='$package_type', package_title='$package_title', package_price='$package_price', package_desc='$package_desc', package_keywords='$package_keywords' where package_id='$update_id'";
    } else {
        move_uploaded_file($package_image_tmp, "package_images/$package_image");
        $update_package = "update packages set package_cat='$package_cat', package_type='$package_type', package_title='$package_title', package_price='$package_price', package_desc='$package_desc', package_image='$package_image', package_keywords='$package_keywords' where package_id='$update_id'";
    }

    $run_pack = mysqli_query($con, $update_package);

    if ($run_pack) {
        echo "<script>alert('Package has been UPDATED successfully!')</script>";
        echo "<script>window.open('index.php?view_packages','_self')</script>";
    }

    /*
    move_uploaded_file($package_image_tmp, "package_images/$package_image");

    $update_package = "update packages set package_cat='$package_cat', package_type='$package_type', package_title='$package_title', package_price='$package_price', package_desc='$package_desc', package_image='$package_image', package_keywords='$package_keywords' where package_id='$update_id'";

    $run_pack = mysqli_query($con, $update_package);


    if ($run_pack) {
        echo "<script>alert('Package has been UPDATED successfully!')</script>";
        echo "<script>window.open('index.php?view_packages','_self')</script>";
    }
    */
}

?>
