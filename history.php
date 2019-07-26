<?php
session_start();
require_once 'connect.php';
include('functionlogin.php');
$username = $_SESSION['username'];

 $result = mysqli_query($connect,"select * from hs_diem where stUsername = '{$username}'");
 //echo mysqli_fetch_assoc($result);
//$row = mysqli_fetch_assoc($result);



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lịch sử làm bài</title>
<!--        <link href="css/bootstrap.min.css" rel="stylesheet">-->
<!--        <link href="css/style.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="Styles/index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
    </head>
    <body>
    <div class="topnav">

        <a href="trangchuhs.php">Trang chủ</a>
        <a href="thongtincanhan.php" >Thông tin</a>
        <a href="doexam.php"  >Làm bài </a>
        <a href="history.php" class="active">Lịch sử làm bài</a>
        <a href="huongdan.php>">Hướng dẫn</a>
        <a href="logout.php" class="button">Đăng xuất </a>
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
        <div id="content">
            <h1>Lịch sử làm bài</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>

                        <td>examID</td>
                        <td>examName</td>
                        <td>score</td>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>

                            <td><?php echo htmlspecialchars($row['examID']); ?></td>
                            <td><?php echo htmlspecialchars($row['examName']); ?></td>
                            <td><?php echo htmlspecialchars($row['score']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </body>
</div>
</html>