<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhóm tin tức</title>

</head>
<body>
<?php
$list_category=array();
include_once "connect.php";
$sql="SELECT * FROM `news`.`categories`";
$kq=mysqli_query($connection,$sql);
//thục hiện việc đổ dữ liệu vào $list_category;
?>
    <table border="1" style="margin: 20px auto">
        <thead>
            <tr>
                <td>Tên thể loại</td>
                <td>Thứ tự</td>
                <td>Ẩn hiện</td>
                <td colspan="2">Thêm</td>
            </tr>
        </thead>
        <tbody>
        <?php
        //while($row = mysql_fetch_array($sl))
        ?>
            <?php while ($row=mysqli_fetch_array($kq)){ ?>
                <tr>
                    <td><?php echo $row['category_name'] ?></td>
                    <td><?php echo $row['thu_tu'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>