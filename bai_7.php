<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 7</title>
</head>
<body>
<?php
$mang=array();
$chuoi_mang="";
if(isset($_POST['phat_sinh_mang'])){
    $so_phan_tu=$_POST['so_phan_tu'];
    //vi du so phan tu là 8
    /*
     * dùng vòng lặp for để tạo ra 8 phần tử và đưa vào
     */
    for($i=0;$i<$so_phan_tu;$i++){
        $mang[$i]=mt_rand(0,20);
    }
    $chuoi_mang=implode(",",$mang);

}

?>
    <form action="bai_7.php" method="post">
        <table style="margin: 50px auto;" border="1">
            <tr>
                <td colspan="2">Phát sinh mảng và tính toán</td>
            </tr>
            <tr>
                <td>Nhập số phần tử</td>
                <td><input type="text" value="4" name="so_phan_tu"></td>
            </tr>
            <tr>
                <td colspan="2"><button name="phat_sinh_mang" type="submit">Phát sinh và tính toán</button></td>
            </tr>
            <tr>
                <td>Mảng</td>
                <td><input type="text" value="<?php echo $chuoi_mang ?>" disabled></td>
            </tr>
            <tr>
                <td>GTLN (Max) trong mang</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr>
                <td>GTNN (Min) trong mang</td>
                <td><input type="text" value=""></td>
            </tr>
        </table>
    </form>
</body>
</html>