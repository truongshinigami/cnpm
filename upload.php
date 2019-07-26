

<?php

include('connect.php');

include('functionlogin.php');

session_start();

$username = $_SESSION['username'];

if (isset($_POST['uploadclick']))
{
    $key = $_POST['answer1'].$_POST['answer2'].$_POST['answer3'].$_POST['answer4'].$_POST['answer5'].$_POST['answer6'].$_POST['answer7'].
           $_POST['answer8'].$_POST['answer9'].$_POST['answer10'].$_POST['answer11'].$_POST['answer12'].$_POST['answer13'].$_POST['answer14'].
           $_POST['answer15'].$_POST['answer16'].$_POST['answer17'].$_POST['answer18'].$_POST['answer19'].$_POST['answer20'].$_POST['answer21'].
           $_POST['answer22'].$_POST['answer23'].$_POST['answer24'].$_POST['answer25'].$_POST['answer26'].$_POST['answer27'].$_POST['answer28'].
           $_POST['answer29'].$_POST['answer30'].$_POST['answer31'].$_POST['answer32'].$_POST['answer33'].$_POST['answer34'].$_POST['answer35'].
           $_POST['answer36'].$_POST['answer37'].$_POST['answer38'].$_POST['answer39'].$_POST['answer40'].$_POST['answer41'].$_POST['answer42'].
           $_POST['answer43'].$_POST['answer44'].$_POST['answer45'].$_POST['answer46'].$_POST['answer47'].$_POST['answer48'].$_POST['answer49'].$_POST['answer50'];
    if(strlen($key) < 50) echo " vui lòng nhập đầy đủ đáp án";
    else{
        if (isset($_FILES['upload1']))
        {
            $name = $_FILES['upload1']['name'];
            $file_tmp = $_FILES['upload1']['tmp_name'];
            $location = "upload/dethi/";
            $guide = "upload/huong dan/";
            if ($_FILES['upload1']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                // Upload file
                move_uploaded_file($file_tmp, $location.$name);
                $location = $location.$name;
                echo 'File Uploaded';



            }

        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
        if (isset($_FILES['upload2'])){
            $name2 = $_FILES['upload2']['name'];
            $file_tmp2 = $_FILES['upload2']['tmp_name'];

            $guide = "upload/huong dan/";
            if ($_FILES['upload2']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                // Upload file
                move_uploaded_file($file_tmp2, $guide.$name);
                $guide = $guide.$name;



            }


        }

        @$addexam = mysqli_query($connect," 
              INSERT INTO dethi(
              tcUsername,
              examlink,
              examGuide,
              examkey
              
              )
              VALUE (
                '{$username}',
                '{$location}',
                '{$guide}',
                '{$key}'
              
                
              )
           ");
    }



}
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Tải đề</title>
    <link rel="stylesheet" type="text/css" href="Styles/thongtin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    </head>
<body>
<div class="topnav">
<a href="trangchugv.php" >Trang chủ</a>
      <a href="thongtincanhan.php">Thông tin</a>
      <a href="upload.php" class="active">Tải đề </a>
      <a href="bangxephang.php">Bảng Điểm</a>
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
<div class="content" id="taide">
    <!--Form send file to php page-->
    <form method="post" action="" enctype="multipart/form-data" >
    <div class="row">
        <div class="col-15">

        </div>
<!--        <div class="col-70">-->
<!--            <label for="examname">Tên đề : </label>-->
<!--            <input type="text" name="examname" id="examname" style="float:none;">-->
<!--        </div>-->
    </div>
    <div class="row">
        
        <div class="col-15">
              
         </div>
        <div class="col-70">
                <label for="upload1">Tải đề : </label>
        <input type="file" name="upload1" id="upload1">
        </div>
    </div>
    <div class = "row">

        <div class="col-15">

        </div>
    <div class="col-70">
        <label for="upload2">Tải đáp án + hướng dẫn giải : </label>
        <input type="file" name="upload2" id="upload2">
        </div>
    </div>
    <div class="row">
        <div class="col-15">

        </div>
        <div class = "col-70">
            <label> Đáp án đúng : </label>
        <div class= "trueanswer">

            <table>
                    <tr>
                        <td><input type="text" id="answer1" name="answer1" pattern="[A-Da-d]{1}" value="A">Câu 1 </td>
                        <td><input type="text" id="answer2" name="answer2" pattern="[A-Da-d]{1}" value="">Câu 2 </td>
                        <td><input type="text" id="answer3" name="answer3" pattern="[A-Da-d]{1}" value="">Câu 3 </td>
                        <td><input type="text" id="answer4" name="answer4"  pattern="[A-Da-d]{1}" value="">Câu 4 </td>
                        <td><input type="text" id="answer5" name="answer5"  pattern="[A-Da-d]{1}" value="">Câu 5 </td>
                    </tr>
                    <tr>
                        <td><input type="text" id="answer6" name="answer6"  pattern="[A-Da-d]{1}" value="">Câu 6 </td>
                        <td><input type="text" id="answer7" name="answer7"  pattern="[A-Da-d]{1}" value="">Câu 7 </td>
                        <td><input type="text" id="answer8" name="answer8"  pattern="[A-Da-d]{1}" value="">Câu 8 </td>
                        <td><input type="text" id="answer9" name="answer9"  pattern="[A-Da-d]{1}" value="">Câu 9 </td>
                        <td><input type="text" id="answer10" name="answer10"  pattern="[A-Da-d]{1}" value="">Câu 10 </td>

                    </tr>
                    <tr>
                        <td><input type="text" id="answer11" name="answer11"  pattern="[A-Da-d]{1}" value="">Câu 11 </td>
                        <td><input type="text" id="answer12" name="answer12"  pattern="[A-Da-d]{1}" value="">Câu 12 </td>
                        <td><input type="text" id="answer13" name="answer13"  pattern="[A-Da-d]{1}" value="">Câu 13 </td>
                        <td><input type="text" id="answer14" name="answer14"  pattern="[A-Da-d]{1}" value="">Câu 14 </td>
                        <td><input type="text" id="answer15" name="answer15"  pattern="[A-Da-d]{1}" value="">Câu 15 </td>
                    </tr>
                    <tr>
                        <td><input type="text" id="answer16" name="answer16"  pattern="[A-Da-d]{1}" value="">Câu 16 </td>
                        <td><input type="text" id="answer17" name="answer17"  pattern="[A-Da-d]{1}" value="">Câu 17 </td>
                        <td><input type="text" id="answer18" name="answer18"  pattern="[A-Da-d]{1}" value="">Câu 18 </td>
                        <td><input type="text" id="answer19" name="answer19"  pattern="[A-Da-d]{1}" value="">Câu 19 </td>
                        <td><input type="text" id="answer20" name="answer20"  pattern="[A-Da-d]{1}" value="">Câu 20 </td>
                    </tr>
                    <tr>
                        <td><input type="text" id="answer21" name="answer21"  pattern="[A-Da-d]{1}" value="">Câu 21 </td>
                        <td><input type="text" id="answer22" name="answer22"  pattern="[A-Da-d]{1}" value="">Câu 22 </td>
                        <td><input type="text" id="answer23" name="answer23"  pattern="[A-Da-d]{1}" value="">Câu 23 </td>
                        <td><input type="text" id="answer24" name="answer24"  pattern="[A-Da-d]{1}" value="">Câu 24 </td>
                        <td><input type="text" id="answer25" name="answer25"  pattern="[A-Da-d]{1}" value="">Câu 25 </td>
                    </tr>
                    <tr>
                        <td><input type="text" id="answer26" name="answer26"  pattern="[A-Da-d]{1}" value="">Câu 26 </td>
                        <td><input type="text" id="answer27" name="answer27"  pattern="[A-Da-d]{1}" value="">Câu 27 </td>
                        <td><input type="text" id="answer28" name="answer28"  pattern="[A-Da-d]{1}" value="">Câu 28 </td>
                        <td><input type="text" id="answer29" name="answer29"  pattern="[A-Da-d]{1}" value="">Câu 29 </td>
                        <td><input type="text" id="answer30" name="answer30"  pattern="[A-Da-d]{1}" value="">Câu 30 </td>
                    </tr>
                    <tr>
                        <td><input type="text" id="answer31" name="answer31"  pattern="[A-Da-d]{1}" value="">Câu 31 </td>
                        <td><input type="text" id="answer32" name="answer32"  pattern="[A-Da-d]{1}" value="">Câu 32 </td>
                        <td><input type="text" id="answer33" name="answer33"  pattern="[A-Da-d]{1}" value="">Câu 33 </td>
                        <td><input type="text" id="answer34" name="answer34"  pattern="[A-Da-d]{1}" value="">Câu 34 </td>
                        <td><input type="text" id="answer35" name="answer35"  pattern="[A-Da-d]{1}" value="">Câu 35 </td>
                    </tr>
                    <tr>
                        <td><input type="text" id="answer36" name="answer36"  pattern="[A-Da-d]{1}" value="">Câu 36 </td>
                        <td><input type="text" id="answer37" name="answer37"  pattern="[A-Da-d]{1}" value="">Câu 37 </td>
                        <td><input type="text" id="answer38" name="answer38"  pattern="[A-Da-d]{1}" value="">Câu 38 </td>
                        <td><input type="text" id="answer39" name="answer39"  pattern="[A-Da-d]{1}" value="">Câu 39 </td>
                        <td><input type="text" id="answer40" name="answer40"  pattern="[A-Da-d]{1}" value="">Câu 40 </td>
                    </tr>
                    <tr>
                        <td><input type="text" id="answer41" name="answer41"  pattern="[A-Da-d]{1}" value="">Câu 41 </td>
                        <td><input type="text" id="answer42" name="answer42"  pattern="[A-Da-d]{1}" value="">Câu 42 </td>
                        <td><input type="text" id="answer43" name="answer43"  pattern="[A-Da-d]{1}" value="">Câu 43 </td>
                        <td><input type="text" id="answer44" name="answer44"  pattern="[A-Da-d]{1}" value="">Câu 44 </td>
                        <td><input type="text" id="answer45" name="answer45"  pattern="[A-Da-d]{1}" value="">Câu 45 </td>
                    </tr>
                    <tr>
                        <td><input type="text" id="answer46" name="answer46"  pattern="[A-Da-d]{1}" value="">Câu 46 </td>
                        <td><input type="text" id="answer47" name="answer47"  pattern="[A-Da-d]{1}" value="">Câu 47 </td>
                        <td><input type="text" id="answer48"  name="answer48" pattern="[A-Da-d]{1}" value="">Câu 48 </td>
                        <td><input type="text" id="answer49" name="answer49"  pattern="[A-Da-d]{1}" value="">Câu 49 </td>
                        <td><input type="text" id="answer50" name="answer50"  pattern="[A-Da-d]{1}" value="">Câu 50 </td>
                    </tr>
                </table>

    </div>
</div>
</div>
<div class="col-15">


</div>
<div class="col-70">
        <input type="submit" name="uploadclick" value="Đăng tải">
<!--        <input type="submit" name="uploadclick" value="Đăng tải">-->
</div>

</form>


</div>


</body>
</html>



