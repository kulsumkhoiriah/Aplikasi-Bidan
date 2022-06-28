<div class="content-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header"><i class="fas fa-file-signature fa-3x"></i> <?= $title ?></h5>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahrujukModal"><i class="fas fa-user-plus fa-2x"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No Pendaftaran</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Diagnosa</th>
                                    <th scope="col">RS Rujukan</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pasienrujuk as $ps) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $ps['no_pendaftaran']; ?></td>
                                        <td><?= $ps['nama_pasien']; ?></td>
                                        <td><?= $ps['nama_diagnosa']; ?></td>
                                        <td><?= $ps['nama_rs']; ?></td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-info btn-sm" href="<?= base_url('admin/detailpasienrujuk/' . $ps['no_pendaftaran']); ?>"><i class="fas fa-info-circle fa-2x"></i></a>
                                            <a type="button" class="btn btn-success btn-sm" href="<?= base_url('admin/print_detailpasienrujuk/' . $ps['no_pendaftaran']); ?>"><i class=" fas fa-print fa-2x"></i></a>
                                            <a type="button" class="btn btn-warning btn-sm" href="<?= base_url('admin/editpasienrujuk/' .  $ps['no_pendaftaran']); ?>"><i class=" fas fa-user-edit fa-2x"></i></a>
                                            <a type="button" class="btn btn-danger btn-sm" href="<?= base_url('admin/hapuspasienrujuk/' . $ps['no_pendaftaran']); ?>" onclick="javascript: return confirm('Lanjutkan Untuk Menghapus Data <?= $ps['nama_pasien']; ?>')"><i class="fas fa-minus-circle fa-2x"></i></a>
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
<div class="modal fade" id="tambahrujukModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="col-lg-12">
            <div class="modal-content bg-primary text-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus fa-2x"></i> Tambah Pasien Rujukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('admin/tambahpasienrujuk'); ?>
                    <div id="form-group">
                        <label>No pendaftaran</label>
                        <input type="text" class="form-control form-control-rounded" name="no_pendaftaran" placeholder="Masukan No pendaftaran" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleFormControlSelect1">Rumah Sakit Rujukan</label>
                        <select class="form-control form-control-rounded col-md-6" name="id_rs" id="exampleFormControlSelect1">
                            <?php
                            foreach ($rumahsakit->result() as $rs) {
                                echo "<option value=" . $rs->id_rs . ">" . $rs->nama_rs . "</option>";
                            }
                            ?>
                        </select>
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