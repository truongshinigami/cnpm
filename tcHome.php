<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="Styles/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

</head>
<body>
    <div class="topnav">

        <a href="tcHome.php">Trang chủ </a>
        <a href="#">Thông tin</a>
        <a href="upload.php" class="active">Tải đề</a>
        <a href="#">Thông tin cá nhân</a>
    <!--    <a href="#">Thông tin phụ huynh người chơi</a>-->
        <a href="logout.php" >Đăng xuất </a>
    <!--    <p>Xin chào :"$username" </p>-->
    </div>
    <?php
    if (isset($_SESSION['username']) && $_SESSION['username']){
        echo 'Bạn đã đăng nhập với tên là '.$_SESSION['username']."<br/>";
      //  echo 'Click vào đây để <a href="logout.php">Logout</a>';
    }
    else{
        echo 'Bạn chưa đăng nhập'."<br/>";
        echo 'Click vào đây để <a href="login.php">Đăng nhập</a>';

    }
    ?>
</body>
</html>
