<?php include '.includes/header.php'; ?>
<!-- Basic Input Groups - Modified Version -->
<div class="col-md-6">
  <div class="card mb-4">
    <h5 class="card-header">Table Barang</h5>
    <div class="card-body demo-vertical-spacing demo-only-element">
    <div class="card mb-4">
  <div class="card-body">
    <!-- ID Barang Input -->
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="ID Barang">
      <span class="input-group-text"><i class="bx bx-barcode"></i></span>
    </div>
    
    <!-- Username Input -->
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Nama Barang">
      <span class="input-group-text"><i class="bx bx-user"></i></span>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Rp</span>
        <input
          type="text"
          class="form-control"
          placeholder="Harga"
          aria-label="Amount (rupiah)"
        />
        <span class="input-group-text">,00</span>
      </div>

      <div class="col-md-6">
  <div class="card mb-4">
    <h5 class="card-header">Input Jumlah Barang</h5>
    <div class="card-body">
      <!-- Input Jumlah dengan Dropdown Panah -->
      <div class="input-group">
        <input
          type="text"
          class="form-control"
          placeholder="Jumlah barang"
          aria-label="Jumlah barang"
          id="jumlahBarangInput"
          value="1"
          readonly
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
});
</script>

     
  </div>

  <button type="submit" class="btn btn-primary" name="simpan" id="sendButton">
  <span class="spinner-border spinner-border-sm me-2 d-none" id="loadingSpinner"></span>
  <i class="bx bx-paper-plane me-1"></i>
  <span id="buttonText">Send</span>
</button>

<script>
document.getElementById('sendButton').addEventListener('click', function() {
  this.disabled = true;
  document.getElementById('loadingSpinner').classList.remove('d-none');
  document.getElementById('buttonText').textContent = 'Sending...';
  
  // Simulasi proses pengiriman
  setTimeout(function() {
    document.getElementById('loadingSpinner').classList.add('d-none');
    document.getElementById('buttonText').textContent = 'Send';
    document.getElementById('sendButton').disabled = false;
  }, 2000);
});
</script>
</div>

     
      </div>
    </div>
  </div>
</div>
<?php include '.includes/footer.php'; ?>
