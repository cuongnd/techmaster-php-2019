<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa nhóm</title>
</head>
<body>
<?php
include_once "connect.php";
//action sủa
if(isset($_POST['sua']) && $_POST['sua']=="sua"){
    //thuc sửa dl
    $id=$_POST['id'];
    $category_name=$_POST['category_name'];
    $thu_tu=$_POST['thu_tu'];
    $status=$_POST['status'];
    $sql="UPDATE `news`.`categories` SET `category_name` = '$category_name', `thu_tu`='$thu_tu',`status`='$status' WHERE `categories`.`id` = $id;";
    mysqli_query($connection,$sql);
    header("location:nhom_tin_tuc.php");

}
if(isset($_GET['id']) && $_GET['id']!=0){
    $id=$_GET['id'];
    $sql="SELECT * FROM `news`.`categories` where id=".$id;
    $kq=mysqli_query($connection,$sql);
    $item=mysqli_fetch_array($kq);
}
?>
<form action="sua_nhom.php?id=<?php echo $item['id'] ?>" method="post">
    <table style="margin: 20px auto" border="1">
        <tr>
            <td>Tên nhóm tin tức</td>
            <td><input type="text" name="category_name" value="<?php echo $item['category_name'] ?>"></td>
        </tr>
        <tr>
            <td>thứ tự</td>
            <td><input type="text" name="thu_tu" value="<?php echo $item['thu_tu'] ?>"></td>
        </tr>
        <tr>
            <td>Ẩn hiện</td>
            <td>
                <select name="status">
                    <option <?php echo $item['status']==1? ' selected ':'' ?>  value="1">Hiện</option>
                    <option <?php echo $item['status']==0? ' selected ':'' ?> value="0">Ẩn</option>
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