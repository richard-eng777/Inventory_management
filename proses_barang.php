<?php
include 'config.php';

session_start();
$userId = $_SESSION['user_id'];

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengecek apakah data sudah dikirim melalui form
if (isset($_POST['simpan'])) {
    // Mengambil data dari form
    $idbarang = $_POST['barang_id']
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // Menyiapkan query untuk menyimpan data
    $query = "INSERT INTO barang (barang_id, nama, jumlah, harga) VALUES ('$idbarang', $nama, $jumlah, $harga)";

    // Mengeksekusi query
    if ($conn->query($query) === TRUE) {

        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Barang succesfully added.'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error dding barang: ' . $conn->error
        ];
    }
}

?>