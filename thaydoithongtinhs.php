<?php

  //Nhúng file kết nối với database
  include('connect.php');
  include('functionlogin.php');
  session_start();

  header('Content-Type: text/html; charset=UTF-8');
  if (isset($_POST['save'])){

    $username = $_SESSION['username'];
    $email = ($_POST['email']);
    $fullname = ($_POST['name']);
    $birthday = ($_POST['dateofbirth']);
    $gender = ($_POST['gender']);
    $phone = ($_POST['phonenumber']);
  
    $connect->query("UPDATE `hocsinh` SET fullName ='{$fullname}', Email = '{$email}', PhoneNumber = '{$phone}', gender = '{$gender}', Birthday = '{$birthday}' WHERE stUsername='{$username}'");
    if ($connect->query("UPDATE `giaovien` SET fullName ='{$fullname}', Email = '{$email}', PhoneNumber = '{$phone}', gender = '{$gender}', Birthday = '{$birthday}' WHERE stUsername='{$username}'") === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $connect->error;
  }
  }
  
  
header("Location: trangchuhs.php");
$connect->close();
?>
