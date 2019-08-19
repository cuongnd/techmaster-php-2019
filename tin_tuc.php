<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tin tức</title>

</head>
<body>
<?php
$list_category=array();
include_once "connect.php";
if(isset($_GET['action']) && $_GET['action']==="xoa"){
    $id=$_GET['id'];
    $sql="DELETE FROM `news`.`tin_tuc` WHERE id=".$id;
    mysqli_query($connection,$sql);
    header('location:tin_tuc.php');
}
$sql="SELECT * FROM `news`.`tin_tuc`";
$kq=mysqli_query($connection,$sql);
//thục hiện việc đổ dữ liệu vào $list_category;
?>
<table border="1" style="margin: 20px auto">
    <thead>
    <tr>
        <td>tiêu đề tin tức</td>
        <td>mô tả ngắn</td>
        <td>Ẩn hiện</td>
        <td colspan="2"><a href="them_tin_tuc.php"> Thêm</a></td>
    </tr>
    </thead>
    <tbody>
    <?php
    //while($row = mysql_fetch_array($sl))
    ?>
    <?php while ($row=mysqli_fetch_array($kq)){ ?>
        <tr>
            <td><?php echo $row['tieu_de'] ?></td>
            <td><?php echo $row['noi_dung_ngan'] ?></td>
            <td><?php echo $row['trang_thai'] ?></td>
            <td><a href="sua_tin_tuc.php?id=<?php echo $row['id'] ?>">Sửa</a></td>
            <td><a href="tin_tuc.php?action=xoa&id=<?php echo $row['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>