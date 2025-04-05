<?php include (".includes/header.php"); ?>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <h5 class="card-header">Proses Pengiriman</h5>
    <div class="card-body demo-vertical-spacing demo-only-element">
     <div class="card-body">
        <form action="proses_pengiriman.php" method="POST">
        <div class="mb-3">
                            <label for="barang_id" class="form-label">Barang</label>
                            <select class="form-select" placeholder="Nama Barang" name="barang_id" required>
                                <option value="" selected disabled>Pilih salah satu</option>

                                <?php
                                $query = "SELECT * from barang";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["barang_id"] . "'>" . $row["name"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                       </div>
          <div class="mb-3">
                            <label for="penyedia_id" class="form-label">Penyedia</label>
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
                  type="text"
                  class="form-control"
                  placeholder="Jumlah barang"
                  aria-label="Jumlah barang"
                  id="jumlah_barang"
                  value="1"
                  name="jumlah_barang"
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
          <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </div>  
                </form>
            </div>
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


<?php include (".includes/footer.php"); ?>
