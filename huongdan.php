<?php
session_start();
require_once 'connect.php';
include('functionlogin.php');
$username = $_SESSION['username'];

?>
<!Doctype html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="Styles/index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  </head>
  <body>
  <div class="topnav">
    
    <a href="trangchuhs.php" class="active">Trang chủ</>
    <a href="thongtincanhan.php" >Thông tin</a>
    <a href="doexam.php"  >Làm bài </a>
    <a href="history.php">Lịch sử làm bài</a>
    <a href="huongdan.php>">Hướng dẫn</a>
    <a href="logout.php" class="button">Đăng xuất</a>
    <p><?php
        $username = $_SESSION['username'];
        $connect = mysqli_connect(
          'localhost', 'root', '', 'cnpmdatabase'
        );
        $sql =  "SELECT * FROM `hocsinh` where stUsername='$username' limit 1";
        $result = $connect->query($sql); if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) { echo 'Xin Chào : '. $row["fullName"] .'
          '; } } else { echo "0 result"; } mysqli_close($connect);
    ?>
    </p>
    
</div>  
  </body>
</html>