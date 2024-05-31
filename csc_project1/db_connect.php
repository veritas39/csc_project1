<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'csc_project1';

$db_connect = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);

if (!$db_connect) {
    die('Gagal terhubung ke MySQL: ' . mysqli_connect_error());
}
?>