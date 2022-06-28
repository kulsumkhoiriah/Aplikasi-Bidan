<div class="content-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card mt-5">
                <h5 class="card-header"><i class="fas fa-hospital-user fa-3x"></i> <?= $title ?></h5>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahrsModal">
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
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Rumah Sakit</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rumahsakit as $rs) : ?>
                                    <tr>
                                        <td><?= $rs->id_rs; ?></td>
                                        <td><?= $rs->nama_rs; ?></td>
                                        <td><?= $rs->alamat; ?></td>
                                        <td class="text-center">
                                            <a type="button" href="<?= base_url('admin/editrs/' . $rs->id_rs); ?>" class="btn btn-warning btn-sm"><i class="fas fa-user-edit fa-2x"></i></a>
                                            <a type="button" class="btn btn-danger btn-sm" href="<?= base_url('admin/hapusrs/' . $rs->id_rs); ?>" onclick="javascript: return confirm('Lanjutkan Untuk Menghapus Data Rumah Sakit <?= $rs->nama_rs; ?>')"><i class="fas fa-minus-circle fa-2x"></i></a>
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
<div class="modal fade" id="tambahrsModal" tabindex="-1" role="dialog" aria-labelledby="tambahrsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="col-lg-12">
            <div class="modal-content bg-primary text-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-hospital-user fa-2x"></i> Tambah Rumah Sakit Rujukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('admin/tambahrs'); ?>
                    <label>Kode</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-rounded" name="id_rs" placeholder="Kode" required>
                    </div>
                    <label>Nama Rumah Sakit</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-rounded" name="nama_rs" placeholder="Nama Rumah Sakit" required>
                    </div>
                    <label>Alamat Rumah Sakit</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-rounded" name="alamat" placeholder="Alamat" required>
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