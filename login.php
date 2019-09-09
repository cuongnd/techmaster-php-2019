<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<?php
session_start();
    include_once "connect.php";

    if(isset($_SESSION['login_thanh_cong']) && $_SESSION['login_thanh_cong']=="ok"){
        header("location:profile.php");
    }

    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="SELECT COUNT(*) AS total FROM `users` WHERE `username`='$username' AND `password`='$password'";
        $kq=mysqli_query($connection,$sql);
        $data=mysqli_fetch_array($kq);
        if($data['total']>0){
            $_SESSION['login_thanh_cong']="ok";
            $_SESSION['profile']=array(
                'username'=>$username,
                'password'=>$password,
            );
            header("location:profile.php");
        }else{
            echo "<h3>Bạn đã nhập sai tên đăng nhập hoặc mật khẩu</h3>";
        }


    }
?>
    <div class="form-login">
        <form action="login.php" method="post">
            <table border="1" style="margin: 20px auto">
                <tr>
                    <td colspan="2">LOGIN</td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>

                </tr>
                <tr>
                    <td>Password</td>
                    <td><input name="password" type="password"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="login">Login</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>