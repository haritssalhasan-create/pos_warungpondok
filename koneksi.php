<?php
$host     = 'localhost';
$user     = 'root';
$password = '';
$database = 'pos_warungpondok';  

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die('<h3 style="color:red;font-family:sans-serif;">
        Koneksi database gagal: ' . mysqli_connect_error() . '
    </h3>');
}

mysqli_set_charset($conn, 'utf8mb4');