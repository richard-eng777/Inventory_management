<?php
include 'config.php';
include '.includes/header.php';

$penyediaIdToEdit = $_GET['id_penyedia'];

$query = "SELECT * FROM penyedia WHERE penyedia_id = $penyediaIdToEdit";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $penyedia = $result->fetch_assoc();
} else {
    echo "Penyedia not found.";
    exit();
}
?>

<?php
include '.includes/footer.php';
?>