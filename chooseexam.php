<?php





function choose()
{


    $connect = include('connect.php');
    $result = mysqli_query($connect, "SELECT examlink from dethi order by rand() limit 1");

    $path = mysqli_fetch_array($result, MYSQLI_NUM);
    $_path = $path[0];
    $_SESSION['path'] = $_path;
    echo "<iframe src=$_path style=\"width:800px; height:800px;\" frameborder=\"0\"></iframe>";

}
?>














?>
