<?php
if (session_id() == '')
    session_start();
?>


<!DOCTYPE html>

<html>


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


<div class="content" id="lambai">

    <!--Đồng hồ đếm ngược-->

    <div class ="answer_box">
        <p id = "demo" Style="text-align: center;">Time</p>
        <div class="row">


        </div>


        <!--Bang nhap dap an-->

        <div class="row">
            <form action="calculatescore.php" method="POST">
                <table>
                    <tr>
                        <td><input type="text" id="answer1" name="answer1" pattern="[A-Da-d]{1}" value="">Câu 1 </td>
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
                <input type="submit" name="nopbai" value="Nộp Bài">
            </form>


        </div>
    </div>

</div>

<script>
      // 10 minutes from now
      var time_in_minutes = 90;
      var current_time = Date.parse(new Date());
      var deadline = new Date(current_time + time_in_minutes * 60 * 1000);

      function time_remaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
          total: t,
          days: days,
          hours: hours,
          minutes: minutes,
          seconds: seconds
        };
      }
      function run_clock(id, endtime) {
        function update_clock() {
          var t = time_remaining(endtime);
          document.getElementById(id).innerHTML =
            t.hours +
            " hours : " +
            t.minutes +
            " minutes : " +
            t.seconds +
            " seconds left!";
          if (t.total <= 0) {
            clearInterval(timeinterval);
            document.getElementById("demo").innerHTML = "Hết Giờ!!";
          }
        }
        update_clock(); // run function once at first to avoid delay
        var timeinterval = setInterval(update_clock, 1000);
      }
      run_clock("demo", deadline);
    </script>
<?php

include('chooseexam.php');
choose();

?>



</body>
<head  >
<title>Làm bài</title>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">


</head>
</html>


