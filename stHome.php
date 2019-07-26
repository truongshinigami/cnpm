<?php session_start();
/**
 * Created by PhpStorm.
 * User: habac
 * Date: 09-May-19
 * Time: 9:45 PM
 */
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

        <a href="stHome.php">Trang chủ</a>
        <a href="thongtincanhan.php" >Thông tin</a>
        <a href="doexam.php"  >Làm bài </a>
        <a href="history.php">Lịch sử làm bài</a>
        <a href="logout.php" >Đăng xuất </a>
<!--        <p>Xin chào : Người Chơi </p>-->
    </div>
       <?php
       if (isset($_SESSION['username']) && $_SESSION['username']){
           echo 'Xin chào, Bạn đã đăng nhập với tên là '.$_SESSION['username']."<br/>";

       }
       else{
           echo 'Bạn chưa đăng nhập'."<br/>";

           echo 'Click vào đây để <a href="login.php">Đăng nhập</a>';
       }
       ?>
    </body>
</html>