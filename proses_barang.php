<?php
include 'config.php';

session_start();
$userId = $_SESSION['barang_id'];

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengecek apakah data sudah dikirim melalui form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan'])) {
    try {
        // Get form data
        $id_barang = $_POST['barang_id'] ?? '';
        $nama_barang = $_POST['nama'] ?? '';
        $harga = $_POST['harga'] ?? '';
        $jumlah = $_POST['jumlah'] ?? '1';
        
        // Validasi sederhana
        if (empty($id_barang) || empty($nama_barang) || empty($harga)) {
            throw new Exception("Semua field harus diisi!");
        }
        
        // Simpan ke database
        $stmt = $conn->prepare("INSERT INTO barang (barang_id, nama, harga, jumlah) 
                               VALUES ('$id_barang', '$nama_barang', '$harga', '$jumlah')");
        
        $stmt->bindParam(':id_barang', $id_barang);
        $stmt->bindParam(':nama_barang', $nama_barang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':jumlah', $jumlah);
        
        if ($stmt->execute()) {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
                    Data berhasil disimpan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } else {
            throw new Exception("Gagal menyimpan data!");
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                Error: ' . $e->getMessage() . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
?>