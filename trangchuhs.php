<?php
    //Nhúng file kết nối với database
    include('connect.php');

    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
  
    session_start();
    
  
    
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Home</title>
  <meta charset="utf-8" />
    <title>website</title>
    <link rel="stylesheet" type="text/css" href="Styles/thongtin.css">
  </head>
  <body>
  <div class="topnav">
    
        <a href="trangchuhs.php" class="active">Trang chủ</>
        <a href="thongtincanhanhs.php" >Thông tin</a>
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
  <div id ="home" class="content"> 

  </div>

  </div>
  </body>
</html>