<?php include '.includes/header.php'; ?>

<h4 class="fw-bold py-3 mb-4">Table Penyedia</h4>

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Proses Penyedia</h5>
                <small class="text-muted float-end">Penyedia</small>
            </div>
            <div class="card-body">
                <form action="proses.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Id</label>
                        <input type="text" class="form-control" id="basic-default-fullname" name="id" placeholder="Id Barang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Nama</label>
                        <input type="email" class="form-control" id="basic-default-email" name="barang" placeholder="Nama Barang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Kontak</label>
                        <input type="text" class="form-control" id="basic-default-phone" name="kontak" placeholder="123-456-7890">
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
