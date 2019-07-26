



<?php




//header('Content-Type: text/html; charset=UTF-8');

//Xử lý đăng nhập
if (isset($_POST['dangnhap']))
{

    include('connect.php');
    include('functionlogin.php');

    $username = addslashes($_POST['txtUser']);
    $password = ($_POST['txtPassword']);
    $pos      = ($_POST['position']);

    if (!$username || !$password || !$pos) {
        echo "Vui lòng cung cấp đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }else{
        $password = md5($password);

        login($username,$password,$pos);
        //setcookie('user',$username,3600);

    }
}
?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="Styles/login.css">
</head>
<body>
<form action='login.php?do=login' method='POST'>
    <h1>Đăng Nhập </h1>
    <input class="inputt"  placeholder="Tên đăng nhập" type='text' name="txtUser" required="">
    <input class="inputt" placeholder="Mật khẩu" type="password" name="txtPassword" required="">
    <div>
        <input class="pos"  name="position" type="radio" value="giaovien" id="gv" />Giáo Viên
        <input class="pos" name="position" type="radio" value="hocsinh" id="hs" />Học Sinh

    </div>

    <u>
        <a href='signup.php' title='Đăng ký'>Đăng ký</a>
    </u>

    <input class="submit" type='submit'  name="dangnhap" value='Đăng nhập' />
<!--           <button class="submit" type="submit">Đăng nhập</button>-->
</form>
</body>
</html>
