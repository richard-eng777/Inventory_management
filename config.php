<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "Inventory";

$conn = mysqli_connect($server, $user, $password, $database);

if ($conn->connect_error) {
    die("Gagal terhubung dengan database :  " . $conn->connect_error);
}
?>