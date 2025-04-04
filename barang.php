<?php include (".includes/header.php"); ?>
<!-- Basic Input Groups - Modified Version -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <h5 class="card-header">Table Barang</h5>
    <div class="card-body demo-vertical-spacing demo-only-element">
    <form method="POST" action="">
      <div class="card mb-4">
        <div class="card-body">
          <!-- ID Barang Input -->
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="ID Barang" name="barang_id" required>
            <span class="input-group-text"><i class="bx bx-barcode"></i></span>
          </div>
          
          <!-- Nama Barang Input -->
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nama Barang" name="name" required>
            <span class="input-group-text"><i class="bx bx-user"></i></span>
          </div>

          <!-- Harga Input -->
          <div class="input-group mb-3">
            <span class="input-group-text">Rp</span>
            <input
              type="text"
              class="form-control"
              placeholder="Harga"
              aria-label="Amount (rupiah)"
              name="harga"
              required
            />
            <span class="input-group-text">,00</span>
          </div>

          <!-- Jumlah Barang -->
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
                    id="jumlahBarangInput"
                    name="jumlah"
                    value="1"
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
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary" name="simpan" id="sendButton">
          <span class="spinner-border spinner-border-sm me-2 d-none" id="loadingSpinner"></span>
          <i class="bx bx-paper-plane me-1"></i>
          <span id="buttonText">Simpan</span>
        </button>
      </div>
    </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const jumlahInput = document.getElementById('jumlahBarangInput');
  const dropdownItems = document.querySelectorAll('.dropdown-item');
  
  dropdownItems.forEach(item => {
    item.addEventListener('click', function(e) {
      e.preventDefault();
      jumlahInput.value = this.getAttribute('data-value');
    });
  });
  
  // Handle form submission
  const form = document.querySelector('form');
  form.addEventListener('submit', function() {
    const sendButton = document.getElementById('sendButton');
    sendButton.disabled = true;
    document.getElementById('loadingSpinner').classList.remove('d-none');
    document.getElementById('buttonText').textContent = 'Menyimpan...';
  });
});
</script>

<?php include (".includes/footer.php"); ?>
