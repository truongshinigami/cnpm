
<?php session_start();

if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login
}
?>
<a href="homepage.php">HOME</a>