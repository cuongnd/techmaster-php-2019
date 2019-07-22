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
    $name="";

if(isset($_POST['ten'])){
        $name=$_POST['ten'];
    }
?>
<div>random: <?php echo rand(10,100) ?></div>
<form action="bai2.php" method="post" onsubmit="return kiem_tra()">
    <table>
        <tr>
            <td>Họ và tên</td>
            <td>
                <input type="text" id="ten" name="ten">
            </td>
        </tr>
        <tr>
            <td>Xin chào</td>
            <td><?php echo $name ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Xuất</button>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    function kiem_tra() {
        var ten=document.getElementById('ten').value;
        if(ten.trim()===""){
            alert("vui nhap tên");
            return false;
        }
        return true;
    }
</script>
</body>
</html>