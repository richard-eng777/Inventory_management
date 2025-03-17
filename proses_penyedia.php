<?php

include("config.php");
session_start();

if(isset($_POST['simpan'])) {
    $penyedia_name = $_POST['nama'];

    $query = "INSERT INTO penyedia (name) VALUES ('$penyedia_name')";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'kategori berhasil di tambahkan !'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal Menambahkan kategori: ' . mysqli_error($conn)
        ];
    }
    header('Location: kategori.php');
    exit();
}

if (isset($_POST['delete'])) {
    $catID = $_POST['catID'];
    $exec = mysqli_query($conn, "DELETE FROM penyedia WHERE penyedia_id='$catID'");

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Penyedia berhasil di hapus !'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menghapus penyedia: ' . mysqli_error($conn)

        ];
    }
    header('Location: kategori.php');
    exit();
}
if (isset($_POST['update'])) {
    $catID = $_POST['catID'];
    $penyedia_name = $_POST['nama'];

    $query = "UPDATE penyedia SET nama = '$penyedia_name' WHERE penyedia_id='$catID'";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'nama penyedia berhasil di perbarui'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui nama penyedia: ' . mysqli_error($conn)
        ];
    }
    header('Location: kategori.php');
    exit();
}