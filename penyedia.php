<?php
include '.includes/header.php';
include '.includes/toast_notification.php';
?>

<div class = "container-xxl flex-grow-1 container-p-y">
    <div class = "card">
        <div class = "card-header d-flex justify-content-between align-items-center">
            <h4>Data Penyedia</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                Tambah Penyedia
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">#</th>
                            <th>Nama Penyedia</th>
                            <th>Kontak</th>
                            <th width="150px">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $index = 1;
                        $query = "SELECT * FROM penyedia";
                        $exec = mysqli_query($conn, $query);
                        while ($category = mysqli_fetch_assoc($exec)) :
                        ?>
                        <tr>
                            <td><?= $index++; ?></td>
                            <td><?= $category['nama']; ?></td>
                            <td><?= $category['kontak']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#editCategory_<?= $category['penyedia_id']; ?>">
                                        <i class="bx bx-edit-alt me-2"></i> Edit </a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#deleteCategory_<?= $category['penyedia_id']; ?>">
                                        <i class="bx bx-trash me-2"></i> Delete </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- modal untuk hapus data penyedia -->
                        <div class="modal fade" id="deleteCategory_<?= $category['penyedia_id'];
                        ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Penyedia?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">

                        </button>
                                </div>
                                <div class="modal-body">
                                    <form action="proses_penyedia.php" method="POST">
                                        <div>
                                            <p>Tindakan ini tidak bisa di batalkan.</p>
                                            <input type="hidden" name="catID" value="<?= $category['penyedia_id']; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="delete" class="btn btn-primary">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal untuk update data penyedia -->
                    <div id="editCategory_<?= $category['penyedia_id']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Data Kategori</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="proses_penyedia.php" method="POST">
                                        <input type="hidden" name="catID" value="<?= $category['penyedia_id']; ?>">
                                        <div class="form-group">
                                            <label>Nama Kategori</label>
                                            <input type="text" value="" name="nama" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Kontak</label>
                                            <input type="text" value="" name="kontak" class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="update" class="btn btn-warning">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '.includes/footer.php'; ?>
<!-- modal untuk tambah data penyedia -->
 <div class="modal fade" id="addCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tambah Penyedia </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="proses_penyedia.php" method="POST">
                    <div>
                        <label for="namaKategori" class="form-label">Nama Penyedia</label>
                        <input type="text" class="form-control" name="nama" required/>
                    </div>
                    <div>
                        <label for="namaKategori" class="form-label">Kontak</label>
                        <input type="text" class="form-control" name="kontak" required/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>      
</div>