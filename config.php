<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "med_share_db";


$conn = mysqli_connect($host, $user, $pass, $dbname);


if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}


mysqli_set_charset($conn, "utf8");
?>