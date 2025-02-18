<?php

include("config.php");
session_start();

if(isset($_POST['simpan'])) {
    $category_name = $_POST['category_name'];

    $query = "INSERT INTO categories (category_name) VALUES ('$category_name')";
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
    $exec = mysqli_query($conn, "DELETE FROM categories WHERE category_id='$catID'");

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Kategori berhasil di hapus !'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menghapus kategori: ' . mysqli_error($conn)

        ];
    }
    header('Location: kategori.php');
    exit();
}
if (isset($_POST['update'])) {
    $catID = $_POST['catID'];
    $category_name = $_POST['category_name'];

    $query = "UPDATE categories SET category_name = '$category_name' WHERE category_id='$catID'";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'kategori berhasil di perbarui'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui kategori: ' . mysqli_error($conn)
        ];
    }
    header('Location: kategori.php');
    exit();
}