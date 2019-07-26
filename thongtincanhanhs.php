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
        <a href="thaydoithongtinhs.php" >Thông tin</a>
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

  <div id="thongtin" class = "content">
  <p style="font-size: 20px">Thông tin cá nhân :</p>
    <form action="thaydoithongtinhs.php" method="POST">
        <div class="row">
         <div class="col-15">
            <label for="name">Họ và Tên</label>
        </div>
         <div class="col-70">
            <?php
            $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql = "SELECT * FROM `hocsinh` where stUsername='$username' limit 1";
            $result = $connect->query($sql);
           
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<input type="text" id="name" name="name" value="'. $row["fullName"] .'" >';
              
              }
            }
              else {
                echo "0 result";
              }
              mysqli_close($connect); 
            ?>
         </div>
        </div>
        <div class="row">
            <div class="col-15">
                    <label for="dateofbirth">Ngày sinh</label>         
            </div>
            <div class="col-70">
            <?php
            $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql =  "SELECT * FROM `hocsinh` where stUsername='$username' limit 1";;
            $result = $connect->query($sql);
           
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<input type="date" id="dateofbirth" name="dateofbirth" value="'. $row["Birthday"] .'" >';
              
              }
            }
              else {
                echo "0 result";
              }
              mysqli_close($connect); 
            ?>
            </div>
            </div>

 <div class="row">
 <div class="col-15">
 <label for="gender">Giới tính</label>
 </div>
 <div class="col-70">
 <?php
            $username = $_SESSION['username'];
            $connect = mysqli_connect(
            'localhost', 'root', '', 'cnpmdatabase'
                );
            $sql = "SELECT * FROM `hocsinh` where stUsername= '$username' limit 1";
            $result = $connect->query($sql); 
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            echo '<input type="text" id="gioitinh" name="gender" value="'. $row["gender"] .'" >';
            } 
            } else {
            echo "0 result"; 
            }
            mysqli_close($connect); 
            ?>

 </div>
 </div>
         



  
        <div class="row">
            <div class="col-15">
                <!--Quảng cáo-->
                <label for="country">Quê quán </label>
            </div>
            <div class="col-70">
                    
                    <input type="text" name="country" id="country" value="Hà Nội" >
            </div>
        </div>
        <div class="row">
                <div class="col-15">
                    <!--Quảng cáo-->
                    <label for="email">Địa chỉ email </label>
                    </div>
                    <div class="col-70">
                    <?php
                    $username = $_SESSION['username'];
                    $connect = mysqli_connect(
                         'localhost', 'root', '', 'cnpmdatabase'
                  );
                  $sql = "SELECT * FROM `hocsinh` where stUsername='$username' limit 1";
                  $result = $connect->query($sql);
           
                  if (mysqli_num_rows($result) > 0) {
                   while($row = mysqli_fetch_assoc($result)) {
                      echo '<input type="email" id="dateofbirth" name="email" value="'. $row["Email"] .'" >';
              
              }
            }
              else {
                echo "0 result";
              }
              mysqli_close($connect); 
            ?>
            </div>
            </div>
        <div class="row">
            <div class="col-15">
                <label for="phonenumber">Số diện thoại</label>
            </div>
            <div class="col-70">
            <?php
            $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql = "SELECT * FROM `hocsinh` where stUsername='$username' limit 1";
            $result = $connect->query($sql);
           
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<input type="number" id="phonenumer" name="phonenumber" value="'. $row["PhoneNumber"] .'" >';
              
              }
            }
              else {
                echo "0 result";
              }
              mysqli_close($connect); 
            ?>
            <input type="submit" name="save" value="Lưu">
            </div>
        </div>
        </form>
  </div>
  </body>
</html>