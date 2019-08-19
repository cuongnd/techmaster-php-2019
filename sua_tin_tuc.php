<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa tin tuc</title>
</head>
<body>
<?php
include_once "connect.php";
//action sủa
if(isset($_POST['sua']) && $_POST['sua']=="sua"){
    //thuc sửa dl
    $id=$_POST['id'];
    $tieu_de=$_POST['tieu_de'];
    $noi_dung_ngan=$_POST['noi_dung_ngan'];
    $noi_dung=$_POST['noi_dung'];
    $tieu_de=$_POST['tieu_de'];
    $trang_thai=$_POST['trang_thai'];
    $sql="UPDATE `tin_tuc` SET `tieu_de` = '$tieu_de',`noi_dung_ngan` = '$noi_dung_ngan',`noi_dung` = '$noi_dung',`trang_thai` = '$trang_thai' WHERE `tin_tuc`.`id` = $id;";
    mysqli_query($connection,$sql);
    header("location:tin_tuc.php");

}
if(isset($_GET['id']) && $_GET['id']!=0){
    $id=$_GET['id'];
    $sql="SELECT * FROM `tin_tuc` where id=".$id;
    $kq=mysqli_query($connection,$sql);
    $item=mysqli_fetch_array($kq);
}
?>
<form action="sua_tin_tuc.php?id=<?php echo $item['id'] ?>" method="post">
    <table style="margin: 20px auto" border="1">
        <tr>
            <td>Tiêu đề</td>
            <td><input type="text" name="tieu_de" value="<?php echo $item['tieu_de'] ?>"></td>
        </tr>
        <tr>
            <td>Mô tả ngắn</td>
            <td><textarea name="noi_dung_ngan" ><?php echo $item['noi_dung_ngan'] ?></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea name="noi_dung" ><?php echo $item['noi_dung'] ?></textarea></td>
        </tr>
        <tr>
            <td>Ẩn hiện</td>
            <td>
                <select name="trang_thai">
                    <option <?php echo $item['trang_thai']==1? ' selected ':'' ?>  value="1">Hiện</option>
                    <option <?php echo $item['trang_thai']==0? ' selected ':'' ?> value="0">Ẩn</option>
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
</body>
</html>