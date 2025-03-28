<?php include '.includes/header.php'; ?>

<h4 class="fw-bold py-3 mb-4">Table Pengiriman</h4>

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Proses Pengiriman</h5>
                <small class="text-muted float-end">Pengiriman</small>
            </div>
            <div class="card-body">
                <form action="proses.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Pengiriman Id</label>
                        <input type="text" class="form-control" id="basic-default-fullname" name="id" placeholder="Id Pengiriman" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Barang Id</label>
                        <input type="email" class="form-control" id="basic-default-email" name="barang" placeholder="Id Barang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Penyedia Id</label>
                        <input type="text" class="form-control" id="basic-default-phone" name="kontak" placeholder="Id Penyedia">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Tanggal Pengiriman</label>
                        <input type="text" class="form-control" id="basic-default-phone" name="kontak" placeholder="22-2-2222">
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
                   
                    <button type="submit" class="btn btn-primary" id="sendButton">
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
    alert('Data berhasil dikirim!');
    document.getElementById('loadingSpinner').classList.add('d-none');
    document.getElementById('buttonText').textContent = 'Send';
    document.getElementById('sendButton').disabled = false;
  }, 2000);
});
</script>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '.includes/footer.php'; ?>
