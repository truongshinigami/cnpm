<!--<html>-->
<!--<head>-->
<!--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<!--    <title>đang xủ lý </title>-->
<!--    <link rel="stylesheet" type="text/css" href="Styles/signup.css">-->
<!--</head>-->
<!--</html>-->
<?php
/**
 * Created by PhpStorm.
 * User: habac
 * Date: 06-May-19
 * Time: 3:17 PM
 */



    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['txtUsername'])){
        die('');
    }


    include('connect.php');
    include('functionlogin.php');


    header('Content-Type: text/html; charset=UTF-8');


    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
    $email      = addslashes($_POST['txtEmail']);
    $fullname   = addslashes($_POST['txtFullname']);
    $birthday   = ($_POST['txtBirthday']);
    $sex        = ($_POST['txtGender']);
    $phone      = addslashes($_POST['txtPhonenumber']);
    $pos        =   ($_POST['position']);

    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password || !$email || !$fullname || !$birthday || !$sex || !$pos || !$phone)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

        // Mã khóa mật khẩu
        $password = md5($password);
    if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^", $email))
    {
        echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }


    if ($pos== 'hocsinh'){
        $result1 = mysqli_query($connect,"SELECT stUsername FROM hocsinh WHERE stUsername='$username'");
        if (mysqli_num_rows($result1)> 0){
            echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }





        @$addstudent = mysqli_query($connect,"
        INSERT INTO hocsinh (
            stUsername,
            password,
            email,
            fullName,
            birthday,
            gender,
            phonenumber
        )
        VALUE (
            '{$username}',
            '{$password}',
            '{$email}',
            '{$fullname}',
            '{$birthday}',
            '{$sex}',
            '{$phone}'
        )
    ");
        if ($addstudent){
          echo "Quá trình đăng ký thành công, đang chuyển hướng...... ";



          sleep(3);


            login($username,$password,$pos);



        }

        else
            echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='signup.php'>Thử lại</a>";


    }
    elseif ($pos == 'giaovien'){
        $result2 = mysqli_query($connect,"SELECT tcUsername FROM giaovien WHERE tcUsername='$username'");
        if (mysqli_num_rows($result2)> 0){
            echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }





        @$addteacher = mysqli_query($connect,"
        INSERT INTO giaovien (
            tcUsername,
            password,
            email,
            fullName,
            birthday,
            gender,
            phonenumber
        )
        VALUE (
            '{$username}',
            '{$password}',
            '{$email}',
            '{$fullname}',
            '{$birthday}',
            '{$sex}',
            '{$phone}'
        )
    ");
        if($addteacher){
            echo "Quá trình đăng ký thành công, đang chuyển hướng...... ";



            sleep(3);
            login($username,$password,$pos);
            //header("Location: login.php");




        }
        else
            echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='signup.php'>Thử lại</a>";

    }


    //Thông báo quá trình lưu



?>