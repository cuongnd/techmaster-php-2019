<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm tin tức</title>
</head>
<body>
<?php
include_once "connect.php";


if(isset($_POST['luu'])){
    $tieu_de=$_POST['tieu_deu'];
    $mo_ta_ngan=$_POST['mo_ta_ngan'];
    $mo_ta=$_POST['mo_ta'];
    $category_id=$_POST['category_id'];



    $sql="INSERT INTO `tin_tuc` (`id`,`category_id`, `tieu_de`, `noi_dung_ngan`, `noi_dung`, `trang_thai`, `tin_noi_bat`, `tin_lien_quan`, `danh_gia`) VALUES (NULL,$category_id, '$tieu_de', '$mo_ta_ngan', '$mo_ta', '1', '1', '', '');";
    mysqli_query($connection,$sql);
    $last_id = mysqli_insert_id($connection);
    //update image
    $anh_dai_dien=$_FILES["anh_dai_dien"];
    $tmp_name=$anh_dai_dien['tmp_name'];
    $name_anh_dai_dien=$anh_dai_dien['name'];
    $new_anh_dai_dien="anh_dai_dien_{$last_id}_".$name_anh_dai_dien;
    $image_path="stories/images/news/image_tin_tuc/$new_anh_dai_dien";
    move_uploaded_file($tmp_name,$image_path);
    $sql="UPDATE `tin_tuc` SET `anh_dai_dien` = '$image_path' WHERE `tin_tuc`.`id` = $last_id;";
    mysqli_query($connection,$sql);
    header("location:tin_tuc.php");

}
$sql="SELECT * FROM `categories`";
$kq=mysqli_query($connection,$sql);


?>
    <form action="them_tin_tuc.php" method="post" enctype="multipart/form-data">
        <table border="1" style="margin: 20px auto">
            <tr>
                <td>Tiêu đề tin tức</td>
                <td><input type="text" value="" name="tieu_de"></td>
            </tr>
            <tr>
                <td>Ảnh đại diện</td>
                <td><input type="file" name="anh_dai_dien"></td>
            </tr>
            <tr>
                <td>Mô tả ngắn</td>
                <td><textarea name="mo_ta_ngan"></textarea></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><textarea name="mo_ta"></textarea></td>
            </tr>
            <tr>
                <td>Nhóm tin tức</td>
                <td>
                    <select name="category_id">
                        <?php while ($row=mysqli_fetch_array($kq)){ ?>

                        <option value="<?php echo $row["id"] ?>"><?php echo $row["category_name"] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="luu">Lưu</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>