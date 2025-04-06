<?php
include 'config.php';
include '.includes/header.php';

$postIdToEdit = $_GET['id_pengiriman'];

$query = "SELECT * FROM pengiriman WHERE pengiriman_id = $postIdToEdit";
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
    <h5 class="card-header">Table Pengiriman</h5>
    <div class="card-body demo-vertical-spacing demo-only-element">
    <form method="POST" action="proses_pengiriman.php">
      <div class="card mb-4">
        <div class="card-body">
        <input type="hidden" name="id_pengiriman" value="<?php echo $postIdToEdit; ?>">

        <div class="input-group mb-3">
          <label for="barang_id" class="form-label"></label>
          <select class="form-select" placeholder="Nama Barang" id="barang_id" name="barang_id" required>
          <option value="" selected disabled>Pilih salah satu</option>

          <?php
          $queryBarang = "SELECT * FROM barang";
          $resultBarang = $conn->query($queryBarang);
          if ($resultBarang->num_rows > 0) {
            while($row = $resultBarang->fetch_assoc()) {
              $selected = ($row["barang_id"] == $post['barang_id']) ? "selected" : "";
              echo "<option value='" . $row["barang_id"] . "' $selected>" . $row["name"] . "</option>";
            }
          }
          ?>
          </select>
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
          <span class="input-group-text"><i class="bx bx-calendar">     Tanggal Pengiriman</i></span>
          <input  
          label="Tanggal Pengiriman"                 
          type="date"
          class="form-control"
          id="tanggal_pengiriman"
          name="tanggal_pengiriman"
          value="<?php echo $post['tanggal_pengiriman']; ?>"
          required
          />
        </div>


  
        <div class="col-md-6">
          <div class="card mb-4">
            <h5 class="card-header">Input Jumlah Barang</h5>
            <div class="card-body">
              <div class="input-group">
                <input
                label="jumlah"
                type="text"
                class="form-control"
                placeholder="Jumlah barang"
                aria-label="Jumlah barang"
                id="jumlah_barang"
                name="jumlah_barang"
                value="<?php echo $post['jumlah_barang'];?>"
                readonly
                required
                >
                <button
                class="btn btn-outline-secondary dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >
                <i class="bx bx-chevron-down"></i>
                </button>
                
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" data-value="1">1</a></li>
                    <li><a class="dropdown-item" href="#" data-value="2">2</a></li>
                    <li><a class="dropdown-item" href="#" data-value="3">3</a></li>
                    <li><a class="dropdown-item" href="#" data-value="4">4</a></li>
                    <li><a class="dropdown-item" href="#" data-value="5">5</a></li>
                    <li><a class="dropdown-item" href="#" data-value="6">6</a></li>
                    <li><a class="dropdown-item" href="#" data-value="7">7</a></li>
                    <li><a class="dropdown-item" href="#" data-value="8">8</a></li>
                    <li><a class="dropdown-item" href="#" data-value="9">9</a></li>
                    <li><a class="dropdown-item" href="#" data-value="10">10</a></li>
                  </ul>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
  const jumlahInput = document.getElementById('jumlah_barang');
  const dropdownItems = document.querySelectorAll('.dropdown-item');
  
  dropdownItems.forEach(item => {
    item.addEventListener('click', function(e) {
      e.preventDefault();
      jumlahInput.value = this.getAttribute('data-value');
    });
  });
});
</script>
<?php
include '.includes/footer.php';
?>