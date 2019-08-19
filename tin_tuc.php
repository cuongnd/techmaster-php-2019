<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tin tức</title>
    <link href="assets/styles/main_style.css" rel="stylesheet">

</head>
<body>
<?php
$list_category = array();
include_once "connect.php";
if (isset($_GET['action']) && $_GET['action'] === "xoa") {
    $id = $_GET['id'];
    $sql = "DELETE FROM `tin_tuc` WHERE id=" . $id;
    mysqli_query($connection, $sql);
    header('location:tin_tuc.php');
}
$sql = "SELECT a_tin_tuc.*,a_categories.`id` AS category_id,a_categories.`category_name` AS category_name FROM `tin_tuc` AS a_tin_tuc LEFT JOIN `categories` AS a_categories ON a_tin_tuc.`category_id`=a_categories.`id`";

$kq = mysqli_query($connection, $sql);
//thục hiện việc đổ dữ liệu vào $list_category;
?>
<div class="tin-tuc">
    <table border="1" style="margin: 20px auto">
        <thead>
        <tr>
            <td>tiêu đề tin tức</td>
            <td>anh đại diện</td>
            <td>mô tả ngắn</td>
            <td>Nhóm tin tức</td>
            <td>Ẩn hiện</td>
            <td colspan="2"><a href="them_tin_tuc.php"> Thêm</a></td>
        </tr>
        </thead>
        <tbody>
        <?php
        //while($row = mysql_fetch_array($sl))
        ?>
        <?php while ($row = mysqli_fetch_array($kq)) { ?>
            <tr>
                <td><a href="sua_tin_tuc.php?id=<?php echo $row['id'] ?>"><?php echo $row['tieu_de'] ?></a></td>
                <td><img class="anh-dai-dien" src="<?php echo $row['anh_dai_dien'] ?>"></td>
                <td><?php echo $row['noi_dung_ngan'] ?></td>
                <td><?php echo $row['category_name'] ?></td>
                <td><?php echo $row['trang_thai'] ?></td>
                <td><a href="sua_tin_tuc.php?id=<?php echo $row['id'] ?>">Sửa</a></td>
                <td><a href="tin_tuc.php?action=xoa&id=<?php echo $row['id'] ?>">Xóa</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>