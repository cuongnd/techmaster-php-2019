<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 9</title>
</head>
<body>
    <?php
    $mang=array();
    $solanxh=array();
    $mang_duy_nhat=array();//[3,4,6,7,2,4,8,9]
    $str_nhap_vao="";
    $so_lan_xuat_hien="";
    $str_mang_duy_nhat="";
    if(isset($_POST['thuc_hien'])){
        $str_nhap_vao=$_POST['nhap_mang'];
        $mang=explode(",",$str_nhap_vao);
        for ($i=0;$i<count($mang);$i++){
            $x=$mang[$i];
            if(!isset($solanxh[$x])){
                $solanxh[$x]=0;
            }
            $solanxh[$x]++;
        }

        for ($i=0;$i<count($mang);$i++){
            $x=$mang[$i];
            if(!in_array($x,$mang_duy_nhat)){
                array_push($mang_duy_nhat,$x);
            }
        }

        foreach ($solanxh as $key=>$value){
            $so_lan_xuat_hien=$so_lan_xuat_hien."$key:$value ";
        }

    }
    $str_mang_duy_nhat=implode(",",$mang_duy_nhat);
    ?>
    <form action="bai_9.php" method="post">
        <table style="margin: 20px auto" border="1">
            <tr>
                <td colspan="2">Đếm số lần xuất hiên</td>
            </tr>
            <tr>
                <td>Mang</td>
                <td><input type="text"  value="<?php echo $str_nhap_vao ?>" name="nhap_mang"></td>
            </tr>
            <tr>
                <td>Số lần xuất hiện</td>
                <td><input type="text" value="<?php echo $so_lan_xuat_hien ?>" disabled></td>
            </tr>
            <tr>
                <td>mảng duy nhat</td>
                <td><input type="text" value="<?php echo $str_mang_duy_nhat ?>" disabled></td>
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