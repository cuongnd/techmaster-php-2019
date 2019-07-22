<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
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
    jQuery(document).ready(function () {

        alert(1);
    });
</script>
</body>
</html>