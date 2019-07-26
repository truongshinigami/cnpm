<?php
/**
 * Created by PhpStorm.
 * User: habac
 * Date: 13-May-19
 * Time: 11:18 PM
 */
    function login($username, $password,$pos){
    session_start();
    $connect=include('connect.php');
    
    $_SESSION['pos']=$pos;

    header('Content-Type: text/html; charset=UTF-8');






    if ($pos== 'hocsinh'){
        $query = mysqli_query($connect,"SELECT stUsername, password FROM hocsinh WHERE stUsername='$username'");

        if (mysqli_num_rows($query) == 0  ) {
            echo "Tài khoản này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }


        $row = mysqli_fetch_array($query,MYSQLI_NUM);



        if ($password != $row[1]   ) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }


        $_SESSION['username'] = $username;
//        echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='stHome.php'>Về trang chủ</a>";
        header("Location: trangchuhs.php");
        die();
    }
    elseif ($pos ="giaovien"){
        $query2 = mysqli_query($connect,"SELECT tcUsername, password FROM giaovien WHERE tcUsername='$username'");

        if (mysqli_num_rows($query2) == 0  ) {
            echo "Tài khoản này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }


        $row = mysqli_fetch_array($query2,MYSQLI_NUM);



        if ($password != $row[1]   ) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }

        //Lưu tên đăng nhập
        $_SESSION['username'] = $username;
//        echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='tcHome.php'>Về trang chủ</a>";
        header("Location: trangchugv.php");
        die();
    }



}
?>