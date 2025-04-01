<?php
include (".includes/header.php");
$title = "Dashboard";
include '.includes/toast_notification.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Inventory Management</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="datatable" class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th width="50px">#</th>
                                <th>Id Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Jumlah</th>
                                <th width="150px">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                       
                        <?php
// Secure database query for dashboard
$index = 1;

// Using prepared statement to prevent SQL injection
$query = "SELECT p.*, b.nama as nama_barang, b.harga
          FROM pengiriman p
          INNER JOIN barang b ON p.barang_id = b.barang_id
          WHERE p.barang_id = ?"; // Using parameterized query

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "i", $userId); // 'i' for integer
    
    // Execute query
    mysqli_stmt_execute($stmt);
    
    // Get result
    $result = mysqli_stmt_get_result($stmt);
    
    // Check if there are results
    if (mysqli_num_rows($result) > 0) {
        while ($post = mysqli_fetch_assoc($result)) :
            // Calculate total price
            $total_harga = $post['harga'] * $post['jumlah'];
?>
            <tr>
                <td><?= htmlspecialchars($index++, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($post['barang_id'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($post['nama_barang'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>Rp <?= number_format($post['harga'], 0, ',', '.'); ?></td>
                <td><?= htmlspecialchars($post['jumlah'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>Rp <?= number_format($total_harga, 0, ',', '.'); ?></td>
            </tr>
        <?php endwhile;
    } else {
        echo '<tr><td colspan="6" class="text-center">Tidak ada data pengiriman</td></tr>';
    }
    
    // Close statement
    mysqli_stmt_close($stmt);
} else {
    echo '<tr><td colspan="6" class="text-center">Error: ' . htmlspecialchars(mysqli_error($conn), ENT_QUOTES, 'UTF-8') . '</td></tr>';
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include (".includes/footer.php");
?>