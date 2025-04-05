<?php
include 'config.php';

session_start();

$userId = $_SESSION["user_id"];

if (isset($_POST['simpan'])) {
    // Mengambil data dari form
    $namabarang = $_POST['name'];
    $penyediaid = $_POST['penyedia_id'];
    $jumlahbarang = $_POST['jumlah'];
    $hargabarang = $_POST['harga'];

    $query = "INSERT INTO barang (`name`, penyedia_id, jumlah, harga) values ('$namabarang', '$penyediaid', '$jumlahbarang', '$hargabarang')";
   
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

   
    header('Location: table.php');
    exit();
}

if (isset($_POST['delete'])) {
    $postID = $_POST['postID'];

    $exec = mysqli_query($conn, "DELETE FROM barang WHERE barang_id='$postID'");

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
    header('Location: table.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $postId = $_POST['id_barang'];
    $namabarang = $_POST['name'];
    $penyediaid = $_POST['penyedia_id'];
    $jumlahbarang = $_POST['jumlah'];
    $hargabarang = $_POST['harga'];
    

    $queryUpdate = "UPDATE barang SET `name` = '$namabarang',
    penyedia_id = '$penyediaid', jumlah = $jumlahbarang, harga = '$hargabarang'
    WHERE barang_id = $postId";

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
    header('Location: table.php');
    exit();
}


    


