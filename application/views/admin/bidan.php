<div class="content-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card mt-5">
                <h5 class="card-header"><i class="fas fa-user-nurse fa-3x"></i> <?= $title ?></h5>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahbidanModal">
                            <i class="fas fa-user-plus fa-2x"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="far fa-file-pdf fa-2x"></i> Pdf</a>
                            <a class="dropdown-item" href="#"><i class="far fa-file-excel fa-2x"></i> Excel</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Bidan</th>
                                    <th scope="col">Jam Praktek</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bidan as $b) : ?>
                                    <tr>
                                        <td><?= $b->id; ?></td>
                                        <td><?= $b->nama_bidan; ?></td>
                                        <td><?= $b->jam_mulai; ?> ~ <?= $b->jam_akhir; ?></td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-warning btn-sm" href="<?= base_url('admin/editbidan/' . $b->id); ?>"><i class="fas fa-user-edit fa-2x"></i></a>
                                            <a type="button" class="btn btn-danger btn-sm" href="<?= base_url('admin/hapusbidan/' . $b->id); ?>" onclick="javascript: return confirm('Lanjutkan Untuk Menghapus Data <?= $b->nama_bidan; ?>')"><i class="fas fa-minus-circle fa-2x"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Row-->

<!-- Modal Tambah -->
<div class="modal fade" id="tambahbidanModal" tabindex="-1" role="dialog" aria-labelledby="tambahbidanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="col-lg-12">
            <div class="modal-content bg-primary text-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus fa-2x"></i> Tambah Data Bidan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('admin/tambahbidan'); ?>
                    <div class="form-group">
                        <label>Kode </label>
                        <input type="text" class="form-control form-control-rounded" name="id" placeholder="Masukan Kode Bidan" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Bidan </label>
                        <input type="text" class="form-control form-control-rounded" name="nama_bidan" placeholder="Masukan Nama Bidan" required>
                    </div>
                    <div class="form-group">
                        <label>Jam Praktek Mulai</label>
                        <input type="time" class="form-control form-control-rounded" name="jam_mulai" value="<?= $b->jam_mulai ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Jam Praktek Akhir</label>
                        <input type="time" class="form-control form-control-rounded" name="jam_akhir" value="<?= $b->jam_akhir ?>" required>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>