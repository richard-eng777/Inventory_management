<?php
include 'config.php';
include '.includes/header.php';

$barangIdToEdit = $_GET['id_barang'];

$query = "SELECT * FROM barang WHERE barang_id = $barangIdToEdit";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $barang = $result->fetch_assoc();
} else {
    echo "Barang not found.";
    exit();
}
?>

<?php
include '.includes/footer.php';
?>