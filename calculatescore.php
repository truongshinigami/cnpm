<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Tính điểm</title>
    <link rel="stylesheet" type="text/css" href="Styles/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
</head>
<body>
<div class="topnav">

    <a href="trangchuhs.php">Trang chủ</a>
    <a href="thongtincanhan.php" >Thông tin</a>
    <a href="doexam.php" class="active" >Làm bài </a>
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

        <div class="content">
<?php
/**
 * Created by PhpStorm.
 * User: habac
 * Date: 16-May-19
 * Time: 2:46 PM
 */
    
    include('connect.php');
    include('chooseexam.php');
    include ('functionlogin.php');



    if (isset($_POST['nopbai'])) {
        $answer = $_POST['answer1'] . $_POST['answer2'] . $_POST['answer3'] . $_POST['answer4'] . $_POST['answer5'] . $_POST['answer6'] . $_POST['answer7'] .
            $_POST['answer8'] . $_POST['answer9'] . $_POST['answer10'] . $_POST['answer11'] . $_POST['answer12'] . $_POST['answer13'] . $_POST['answer14'] .
            $_POST['answer15'] . $_POST['answer16'] . $_POST['answer17'] . $_POST['answer18'] . $_POST['answer19'] . $_POST['answer20'] . $_POST['answer21'] .
            $_POST['answer22'] . $_POST['answer23'] . $_POST['answer24'] . $_POST['answer25'] . $_POST['answer26'] . $_POST['answer27'] . $_POST['answer28'] .
            $_POST['answer29'] . $_POST['answer30'] . $_POST['answer31'] . $_POST['answer32'] . $_POST['answer33'] . $_POST['answer34'] . $_POST['answer35'] .
            $_POST['answer36'] . $_POST['answer37'] . $_POST['answer38'] . $_POST['answer39'] . $_POST['answer40'] . $_POST['answer41'] . $_POST['answer42'] .
            $_POST['answer43'] . $_POST['answer44'] . $_POST['answer45'] . $_POST['answer46'] . $_POST['answer47'] . $_POST['answer48'] . $_POST['answer49'] . $_POST['answer50'];
        $path = $_SESSION['path'];

        $result2 = mysqli_query($connect, "SELECT examkey, examID from dethi where examlink ='{$path}'");
        $rows = mysqli_fetch_array($result2, MYSQLI_NUM);
        $key = $rows[0];
        $key = strtoupper($key );
        $answer = strtoupper($answer );
        $name = substr($path,13);

       // echo $key;
       // echo $answer;
        $true = 0;
        $false = 0;


        for ($i = 0; $i < 50; $i++) {
            if ($answer[$i] == $key[$i]) $true++;
            else $false++;
        }
        $score = $true * 0.2;
        $username =  $_SESSION['username'];

        echo "Số câu đúng: ".$true."<br/>";
        echo "Số câu sai: ".$false."<br/>";
        echo "Điểm bài thi: ".$score."<br/>";

        @$addscore = mysqli_query($connect, "
              INSERT INTO hs_diem (
                stUsername,
                examID,
                examName,
                score
                )
              VALUE(
                '{$username}',
                '{$rows[1]}',
                '{$name}',
                '{$score}'
                
                
              )");



    }
    ?>        
</body>
</html>




