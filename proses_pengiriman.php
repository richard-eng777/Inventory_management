<?php
include 'config.php';

session_start();

$userId = $_SESSION["user_id"];

if (isset($_POST['simpan'])) {
    // Mengambil data dari form
    $namabarang = $_POST['barang_id'];
    $penyediaid = $_POST['penyedia_id'];
    $tanggal = $_POST['tanggal_pengiriman'];
    $jumlah = $_POST['jumlah_barang'];

    $query = "INSERT INTO pengiriman (barang_id, penyedia_id, tanggal_pengiriman, jumlah_barang) values ('$namabarang', '$penyediaid', '$tanggal', '$jumlah')";
   
    if ($conn->query($query) === TRUE) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Items Succesfully added.'

        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error adding items: ' . $conn->error 
        ];
    }

   
    header('Location: dashboard.php');
    exit();
}

if (isset($_POST['delete'])) {
    $postID = $_POST['postID'];

    $exec = mysqli_query($conn, "DELETE FROM pengiriman WHERE pengiriman_id='$postID'");

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Items succesfully deleted.'
        ];

    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error deleting items: ' . mysqli_error($conn)
        ];
    }
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $postId = $_POST['id_pengiriman'];
    $namabarang = $_POST['barang_id'];
    $penyediaid = $_POST['penyedia_id'];
    $tanggal = $_POST['tanggal_pengiriman'];
    $jumlah = $_POST['jumlah_barang'];
    

    $queryUpdate = "UPDATE pengiriman SET barang_id = '$namabarang',
    penyedia_id = '$penyediaid', tanggal_pengiriman = '$tanggal', jumlah_barang = '$jumlah'
    WHERE pengiriman_id = $postId";

    if ($conn->query($queryUpdate) === TRUE) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Barang berhasil diperbarui.'        
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui barang.'
        ];
    }
    header('Location: dashboard.php');
    exit();
}


    


