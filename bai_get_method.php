<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$str_mang="";
if(isset($_GET['nhap_mang'])){
    $str_mang=$_GET['nhap_mang'];
}
?>
<form action="bai_get_method.php" method="get">
    <table style="margin: 20px auto" border="1">
        <tr>
            <td colspan="2">Đếm số lần xuất hiên</td>
        </tr>
        <tr>
            <td>Mang</td>
            <td><input type="text"   name="nhap_mang"></td>
        </tr>
        <tr>
            <td>Số lần xuất hiện</td>
            <td><input type="text"  disabled></td>
        </tr>
        <tr>
            <td>mảng duy nhat</td>
            <td><input type="text"  disabled></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" name="thuc_hien" value="thu hien">Thực hiện</button>
            </td>
        </tr>
    </table>
</form>

</body>
</html>