<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
<?php
session_start();
if(! isset($_SESSION['login_thanh_cong'])  ||  !$_SESSION['login_thanh_cong']=="ok" ){
    header("location:login.php");
}
$username=$_SESSION['profile']['username'];
$password=$_SESSION['profile']['password'];
include_once  "connect.php";
$sql="SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
$kq=mysqli_query($connection,$sql);
$user=mysqli_fetch_array($kq);


?>
<table border="1" style="margin: 20px auto">
    <tr>
        <td colspan="2">Thông tin người dùng</td>
    </tr>
    <tr>
        <td>Full name</td>
        <td><?php echo $user['fullname'] ?></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><?php echo $user['username'] ?></td>
    </tr>
</table>
</body>
</html>