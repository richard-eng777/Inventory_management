<?php

include("config.php");
session_start();

if(isset($_POST['simpan'])) {
    $penyedia_name = $_POST['nama'];
    $kontaks = $_POST['kontak'];

    $query = "INSERT INTO penyedia (nama, kontak) VALUES ('$penyedia_name', '$kontaks')";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'penyedia berhasil di tambahkan !'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal Menambahkan penyedia: ' . mysqli_error($conn)
        ];
    }
    header('Location: penyedia.php');
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
    header('Location: penyedia.php');
    exit();
}
if (isset($_POST['update'])) {
    $catID = $_POST['catID'];
    $penyedia_name = $_POST['nama'];
    $kontaks = $_POST['kontak'];

    $query = "UPDATE penyedia SET nama = '$penyedia_name', kontak = '$kontaks' WHERE penyedia_id='$catID'";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Data penyedia berhasil di perbarui'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui data penyedia: ' . mysqli_error($conn)
        ];
    }
    header('Location: penyedia.php');
    exit();
}