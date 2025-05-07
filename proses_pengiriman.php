<?php
include 'config.php';
session_start();

$userId = $_SESSION["user_id"];

if (isset($_POST['simpan'])) {
    $namabarang = $_POST['barang_id'];
    $penyediaid = $_POST['penyedia_id'];
    $tanggal = $_POST['tanggal_pengiriman'];
    $jumlah = $_POST['jumlah_barang'];

    // Cek stok terlebih dahulu
    $cekStok = mysqli_query($conn, "SELECT jumlah FROM barang WHERE barang_id = '$namabarang'");
    $stokSekarang = mysqli_fetch_assoc($cekStok)['jumlah'];

    if ($stokSekarang >= $jumlah) {
        // Masukkan data pengiriman
        $query = "INSERT INTO pengiriman (barang_id, penyedia_id, tanggal_pengiriman, jumlah_barang) 
                  VALUES ('$namabarang', '$penyediaid', '$tanggal', '$jumlah')";

        if ($conn->query($query) === TRUE) {
            // Update stok
            mysqli_query($conn, "UPDATE barang SET jumlah = jumlah - $jumlah WHERE barang_id = '$namabarang'");

            $_SESSION['notification'] = [
                'type' => 'primary',
                'message' => 'Items successfully added and stock updated.'
            ];
        } else {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Error adding items: ' . $conn->error
            ];
        }
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Stok barang tidak mencukupi.'
        ];
    }

    header('Location: dashboard.php');
    exit();
}


if (isset($_POST['delete'])) {
    $postID = $_POST['postID'];

    // Ambil data pengiriman sebelum dihapus
    $exec = mysqli_query($conn, "SELECT barang_id, jumlah_barang FROM pengiriman WHERE pengiriman_id='$postID'");
    $data = mysqli_fetch_assoc($exec);
    $barang_id = $data['barang_id'];
    $jumlah_restore = $data['jumlah_barang'];

    // Kembalikan stok
    mysqli_query($conn, "UPDATE barang SET jumlah = jumlah + $jumlah_restore WHERE barang_id = '$barang_id'");

    // Hapus pengiriman
    $exec = mysqli_query($conn, "DELETE FROM pengiriman WHERE pengiriman_id='$postID'");

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Items successfully deleted and stock restored.'
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
    $jumlah_baru = $_POST['jumlah_barang'];

    // Ambil jumlah lama
    $result = mysqli_query($conn, "SELECT jumlah_barang FROM pengiriman WHERE pengiriman_id = '$postId'");
    $jumlah_lama = mysqli_fetch_assoc($result)['jumlah_barang'];

    $selisih = $jumlah_baru - $jumlah_lama;

    // Cek stok cukup jika selisih > 0
    if ($selisih > 0) {
        $stokCek = mysqli_query($conn, "SELECT jumlah FROM barang WHERE barang_id = '$namabarang'");
        $stokSekarang = mysqli_fetch_assoc($stokCek)['jumlah'];

        if ($stokSekarang < $selisih) {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Gagal update: Stok tidak cukup untuk perubahan.'
            ];
            header('Location: dashboard.php');
            exit();
        }
    }

    // Update stok
    mysqli_query($conn, "UPDATE barang SET jumlah = jumlah - $selisih WHERE barang_id = '$namabarang'");

    // Update pengiriman
    $queryUpdate = "UPDATE pengiriman SET barang_id = '$namabarang',
        penyedia_id = '$penyediaid', tanggal_pengiriman = '$tanggal', jumlah_barang = '$jumlah_baru'
        WHERE pengiriman_id = $postId";

    if ($conn->query($queryUpdate) === TRUE) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Pengiriman berhasil diperbarui dan stok disesuaikan.'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui pengiriman.'
        ];
    }
    header('Location: dashboard.php');
    exit();
}
?>
