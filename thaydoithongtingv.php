<?php
  session_start();
  //Nhúng file kết nối với database
  include('connect.php');
  include('functionlogin.php');

  header('Content-Type: text/html; charset=UTF-8');
  if (isset($_POST['save'])){

    $username = $_SESSION['username'];
    $email = ($_POST['email']);
    $fullname = ($_POST['name']);
    $birthday = ($_POST['dateofbirth']);
    $gender = ($_POST['gender']);
    $phone = ($_POST['phonenumber']);
  
    $connect->query("UPDATE `giaovien` SET fullName ='{$fullname}', email = '{$email}', phonenumber = '{$phone}', gender = '{$gender}', Birthday = '{$birthday}' WHERE tcUsername='{$username}'");
    if ($connect->query("UPDATE `giaovien` SET fullName ='{$fullname}', email = '{$email}', phonenumber = '{$phone}', gender = '{$gender}', Birthday = '{$birthday}' WHERE tcUsername='{$username}'") === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $connect->error;
  }
  }
  
 
header("Location: trangchugv.php");
$connect->close();
?>
