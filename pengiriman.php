<?php include (".includes/header.php"); ?>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <h5 class="card-header">Proses Pengiriman</h5>
    <div class="card-body demo-vertical-spacing demo-only-element">
     <div class="card-body">
        <form action="proses_pengiriman.php" method="POST">
        <div class="mb-3">
          <label for="barang_id" class="form-label">Barang</label>
          <select class="form-select" placeholder="Nama Barang" id="barangSelect" name="barang_id" required>
          <option value="" selected disabled>Pilih salah satu</option>

          <?php
          $query = "SELECT barang_id, name, penyedia_id FROM barang";
          $result = $conn->query($query);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<option value='" . $row["barang_id"] . "' data-penyedia='" . $row["penyedia_id"] . "'>" . $row["name"] . "</option>";
            }
          }
          ?>
          </select>
        </div>
          
        
        <div class="mb-3">
          <label for="penyedia_id" class="form-label">Penyedia</label>
          <select class="form-select" placeholder="Nama Penyedia" id="penyediaSelect" name="penyedia_id" required>
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
        <span class="input-group-text"><i class="bx bx-calendar">   Tanggal Pengiriman</i></span>
        <input
          type="date"
          class="form-control"
          id="tanggal_pengiriman"
          name="tanggal_pengiriman"
          required
        />
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
                  
                  value="1"
                  name="jumlah_barang"
                  
                  required
                >
                
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
</div>
                  
                 <script>
                        document.getElementById('barangSelect').addEventListener('change', function () {
                        const penyediaId = this.selectedOptions[0].getAttribute('data-penyedia');
                        document.getElementById('penyediaSelect').value = penyediaId;
                      });
                 </script>

                 




<?php include (".includes/footer.php"); ?>
