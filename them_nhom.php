<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm nhóm tin tức</title>
</head>
<body>
<?php
include_once "connect.php";
if (isset($_POST['them'])) {
    $category_name=$_POST['category_name'];
    $thu_tu=$_POST['thu_tu'];
    $status=$_POST['status'];
    $sql = "INSERT INTO `categories` (`id`, `category_name`, `thu_tu`, `status`) VALUES (NULL, '$category_name', $thu_tu, $status)";
    mysqli_query($connection,$sql);
    header("location:nhom_tin_tuc.php");
}
?>
<form action="them_nhom.php" method="post">
    <table style="margin: 20px auto" border="1">
        <tr>
            <td>Tên nhóm tin tức</td>
            <td><input type="text" name="category_name"></td>
        </tr>
        <tr>
            <td>thứ tự</td>
            <td><input type="text" name="thu_tu"></td>
        </tr>
        <tr>
            <td>Ẩn hiện</td>
            <td>
                <select name="status">
                    <option value="1">Hiện</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" value="them" name="them">Thêm</button>
                <button type="submit" value="huy" name="huy">Hủy</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>