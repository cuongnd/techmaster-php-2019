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
$nghiem="";
if(isset($_POST['a']) && isset($_POST['b'])){
    $a=$_POST['a'];
    $b=$_POST['b'];


    if($a==0){
        /*
         * 0X+0=0
         */
        if($b==0){
            $nghiem="Vô số nghiệm";
        }
        /*
         * 0x+9=0
         */
        if($b!=0){
            $nghiem="Phương trình vô nghiệm";
        }
    }else{
        /*
         * 3x+5=0;
         */
        $x=-($b/$a);
        $x=round($x);
        $nghiem="x=$x";
    }
}
?>
<form class="phuong-trinh-b1" action="giai_pt_bac_1.php" method="post">
    <table style="margin: 0 auto; " border="1">
        <tr>
            <td colspan="3">Giải phương trình bậc 1</td>
        </tr>
        <tr>
            <td>phương trình</td>
            <td><input type="text" name="a">X +</td>
            <td><input type="text" name="b">=0</td>
        </tr>
        <tr>
            <td colspan="3">Nghiệm <input type="text" value="<?php echo $nghiem ?>"></td>
        </tr>
        <tr>
            <td align="center" colspan="3">
                <button type="submit">Xuất</button>
            </td>
        </tr>
    </table>
</form>
</body>
<style type="text/css">
    .phuong-trinh-b1 {
        font-size: 50px;
    }

    input {
        padding: 20px;
        font-size: 50px;
    }

    button {
        padding: 20px;
        font-size: 50px;
    }
</style>
</html>