<?php
session_start();
require_once 'connect.php';
include('functionlogin.php');
$username = $_SESSION['username'];

 $result = mysqli_query($connect,"select hs.fullName, p.examName, p.examID, p.score from hs_diem p inner join hocsinh hs on p.stUsername = hs.stUsername where stUsername = '{$username}'");
 //echo mysqli_fetch_assoc($result);
//$row = mysqli_fetch_assoc($result);



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bảng Điểm</title>
<!--        <link href="css/bootstrap.min.css" rel="stylesheet">-->
<!--        <link href="css/style.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="Styles/index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
    </head>
    <body>
    <div class="topnav">
      <a href="trangchugv.php" >Trang chủ</a>
      <a href="">Thông tin</a>
      <a href="upload.php" >Tải đề </a>
      <a href="bangxephang.php" class="active">Bảng Điểm</a>
      <a href="logout.php" class="button">Đăng xuất</a>
      <p>           
        <?php
            $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql = "SELECT * FROM `giaovien` where tcUsername= '$username' limit 1";
            $result = $connect->query($sql); 
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) { echo 'Xin Chào : '. $row["fullName"] .'
              '; } } else { echo "0 result"; } mysqli_close($connect);
        ?>
        </p>
    </div>
        <div id="content">
            <h1>Bảng Điểm Cá Nhân</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <td>FullName</td>
                        <td>examID</td>
                        <td>examName</td>
                        <td>score</td>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['hs.fullName']) ?></td>
                            <td><?php echo htmlspecialchars($row['p.examID']); ?></td>
                            <td><?php echo htmlspecialchars($row['p.examName']); ?></td>
                            <td><?php echo htmlspecialchars($row['p.score']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </body>
</div>
</html>