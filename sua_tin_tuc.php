<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/styles/main_style.css">

    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
    <script src="assets/js/ckeditor/ckeditor.js"></script>
    <title>Sửa tin tuc</title>
</head>
<body>
<?php
include_once "connect.php";
//action sủa
if (isset($_POST['sua']) && $_POST['sua'] == "sua") {
    //thuc sửa dl
    $id = $_POST['id'];
    $tieu_de = $_POST['tieu_de'];
    $noi_dung_ngan = $_POST['noi_dung_ngan'];
    $noi_dung = $_POST['noi_dung'];
    $tieu_de = $_POST['tieu_de'];
    $trang_thai = $_POST['trang_thai'];
    $category_id = $_POST['category_id'];

    //update image
    $anh_dai_dien = $_FILES["anh_dai_dien"];

    $str_sql_update_image = "";
    if ($anh_dai_dien['name']) {

        $tmp_name = $anh_dai_dien['tmp_name'];
        $name_anh_dai_dien = $anh_dai_dien['name'];
        $new_anh_dai_dien = "anh_dai_dien_{$id}_" . $name_anh_dai_dien;
        $image_path = "stories/images/news/image_tin_tuc/$new_anh_dai_dien";
        move_uploaded_file($tmp_name,$image_path);
        $str_sql_update_image = ",`anh_dai_dien`='$image_path'";
    }
    $sql = "UPDATE `tin_tuc` SET `category_id`='$category_id'$str_sql_update_image, `tieu_de` = '$tieu_de',`noi_dung_ngan` = '$noi_dung_ngan',`noi_dung` = '$noi_dung',`trang_thai` = '$trang_thai' WHERE `tin_tuc`.`id` = $id;";

    mysqli_query($connection, $sql);


    header("location:tin_tuc.php");

}
if (isset($_GET['id']) && $_GET['id'] != 0) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `tin_tuc` where id=" . $id;
    $kq = mysqli_query($connection, $sql);
    $item = mysqli_fetch_array($kq);
}
$sql = "SELECT * FROM `categories`";
$kq = mysqli_query($connection, $sql);
?>
<div class="sua-tin-tuc">
    <form action="sua_tin_tuc.php?id=<?php echo $item['id'] ?>" method="post" enctype="multipart/form-data">
        <table style="margin: 20px auto" border="1">
            <tr>
                <td>Tiêu đề</td>
                <td><input type="text"  name="tieu_de" value="<?php echo $item['tieu_de'] ?>"></td>
            </tr>
            <tr>
                <td>Ảnh đại diện</td>
                <td>
                    <div class="wrapper-image">
                        <img id="img-anh-dai-dien" class="anh-dai-dien" src="<?php echo $item['anh_dai_dien'] ?>"><input id="anh_dai_dien" type="file" name="anh_dai_dien">
                        <button type="button" id="xoa-and-dien" class="xoa">Xóa</button>
                    </div>
                </td>
            </tr>

            <tr>
                <td>Mô tả ngắn</td>
                <td><textarea name="noi_dung_ngan"><?php echo $item['noi_dung_ngan'] ?></textarea></td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td><textarea id="noi-dung" name="noi_dung"><?php echo $item['noi_dung'] ?></textarea></td>
            </tr>
            <tr>
                <td>Ẩn hiện</td>
                <td>
                    <select name="trang_thai">
                        <option <?php echo $item['trang_thai'] == 1 ? ' selected ' : '' ?> value="1">Hiện</option>
                        <option <?php echo $item['trang_thai'] == 0 ? ' selected ' : '' ?> value="0">Ẩn</option>
                    </select>

                </td>
            </tr>
            <tr>
                <td>Nhóm tin tức</td>
                <td>
                    <select name="category_id">
                        <?php while ($row = mysqli_fetch_array($kq)) { ?>

                            <option <?php echo $item["category_id"] == $row["id"] ? ' selected ' : '' ?>
                                    value="<?php echo $row["id"] ?>"><?php echo $row["category_name"] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" value="sua" name="sua">sửa</button>
                    <button type="submit" value="huy" name="huy">Hủy</button>
                </td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
    </form>
</div>
<script type="text/javascript">
    $=jQuery;
    CKEDITOR.replace( 'noi-dung' );// tham số là biến name của textarea
    var root_image="<?php echo $item['anh_dai_dien'] ?>";

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img-anh-dai-dien').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#anh_dai_dien").change(function() {
        readURL(this);
    });
    $('#xoa-and-dien').click(function (event) {
        $('#img-anh-dai-dien').attr('src',root_image);
        $('#anh_dai_dien').val("");
    });
</script>
</body>
</html>