<?php include (".includes/header.php"); ?>
<!-- Basic Input Groups - Modified Version -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <h5 class="card-header">Table Barang</h5>
    <div class="card-body demo-vertical-spacing demo-only-element">
    <form method="POST" action="proses_barang.php">
      <div class="card mb-4">
        <div class="card-body">
          
          <div class="input-group mb-3">
            <label for="name" class="form-label"></label>
            <input type="text" class="form-control" placeholder="Nama Barang" name="name" required/>
            <span class="input-group-text"><i class="bx bx-barcode"></i></span>
          </div>
          
        
          <div class="input-group mb-3">
            <label for="penyedia_id" class="form-label"></label>
            <select class="form-select" placeholder="Nama Penyedia" name="penyedia_id" required>
            <option value="" selected disabled>Pilih salah satu</option>

            <?php
            $query = "SELECT * FROM penyedia";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["penyedia_id"] . "'>" . $row["nama"] . "</option>";
              }
            }
            ?>
            </select>
          </div>
        
          <div class="input-group mb-3">
            <span class="input-group-text">Rp</span>
            <input
              label="harga"
              type="text"
              class="form-control"
              placeholder="Harga"
              aria-label="Amount (rupiah)"
              name="harga"
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
                  
                    name="jumlah"
                    value="1"
                   
                    required
                  >
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>


<?php include (".includes/footer.php"); ?>
