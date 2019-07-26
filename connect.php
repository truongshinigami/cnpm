<?php
/**
 * Created by PhpStorm.
 * User: habac
 * Date: 06-May-19
 * Time: 2:27 PM
 */


$connect = mysqli_connect(
    'localhost', 'root', '', 'cnpmdatabase'
    )

or
die("Không thể kết nối database");
mysqli_set_charset($connect,'utf8');
return $connect;


