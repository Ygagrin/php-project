<?php
$server = "localhost";
$server_name = "root";
$server_pass = "";
$database = "e-commerce";
$connect = new mysqli($server, $server_name, $server_pass, $database);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>
