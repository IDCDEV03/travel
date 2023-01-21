<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'travel_tour';
$con = mysqli_connect($host, $user, $password, $database) or die('ไม่สามารถเชื่อมต่อฐานข้อมูลได้'. mysqli_connect_error());
mysqli_set_charset($con, 'utf8');
?>