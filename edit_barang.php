<?php
include 'config.php';
include '.includes/header.php';

$postIdToEdit = $_GET['id_barang'];

$query = "SELECT * FROM barang WHERE barang_id = $postIdToEdit";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
} else {
    echo "Barang not found.";
    exit();
}
?>
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <h5 class="card-header">Table Barang</h5>
    <div class="card-body demo-vertical-spacing demo-only-element">
    <form method="POST" action="proses_barang.php">


      <div class="card mb-4">
        <div class="card-body">
        <input type="hidden" name="id_barang" value="<?php echo $postIdToEdit; ?>">


          <div class="input-group mb-3">
            <label for="name" class="form-label"></label>
            <input type="text" class="form-control" placeholder="Nama Barang" id="name" name="name" 
             value="<?php echo $post['name']; ?>" required>
            <span class="input-group-text"><i class="bx bx-barcode"></i></span>
          </div>
          
        
          <div class="input-group mb-3">
            <label for="penyedia_id" class="form-label"></label>
            <select class="form-select" placeholder="Nama Penyedia" id="penyedia_id" name="penyedia_id" required>
            <option value="" selected disabled>Pilih salah satu</option>

            <?php
            $queryPenyedia = "SELECT * FROM penyedia";
            $resultPenyedia = $conn->query($queryPenyedia);
            if ($resultPenyedia->num_rows > 0) {
              while($row = $resultPenyedia->fetch_assoc()) {
                $selected = ($row["penyedia_id"] == $post['penyedia_id']) ? "selected" : "";
                echo "<option value='" . $row["penyedia_id"] . "' $selected>" . $row["nama"] . "</option>";
              }
            }
            ?>
            </select>
          </div>
        
          <div class="input-group mb-3">
            <span class="input-group-text">Rp</span>
            <input
              label="harga"
              id="harga"
              type="text"
              class="form-control"
              placeholder="Harga"
              aria-label="Amount (rupiah)"
              name="harga"
              value="<?php echo $post['harga']; ?>"
              required
            />
            <span class="input-group-text">,00</span>
          </div>

          
          <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Input Jumlah Barang</h5>
              <div class="card-body">
                <div class="input-group">
                  <input
                    
                    type="number"
                    class="form-control"
                    placeholder="Jumlah barang"
                    aria-label="Jumlah barang"
                    id="jumlah"
                    name="jumlah"
                    value="<?php echo $post['jumlah']; ?>"
                    
                    required
                  >
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>

<?php
include '.includes/footer.php';
?>