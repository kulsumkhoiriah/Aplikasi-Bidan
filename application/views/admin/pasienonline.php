<div class="content-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header"><i class="far fa-id-badge fa-3x"></i> <?= $title ?></h5>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <button class="btn btn-sm btn-primary mr-sm-1" type="button" data-toggle="modal" data-target="#formModal"><i class="far fa-clock fa-2x"></i> Jam Praktek Bidan</button>
                        <a type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file-export fa-2x"></i> Export
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= base_url('admin/print_pdf_p_online'); ?>"><i class="far fa-file-pdf fa-2x"></i></i> Pdf</a>
                            <a class="dropdown-item" href="<?= base_url('admin/excel_p_online'); ?>"><i class="far fa-file-excel fa-2x"></i> Excel</a>
                        </div>
                        <a type="button" class="btn btn-success btn-sm mr-sm-1" href="<?= base_url('admin/print_pasien_online'); ?>"><i class="fas fa-print fa-2x"></i></a>
                    </div>
                    <div class="form-inline mb-3">
                        <div class="form-group col-md-8">
                            <?= form_open('admin/search_bidan'); ?>
                            <select class="form-control form-control-rounded mr-sm-1" name="keyword_b">
                                <option hidden>Tampilkan Bedasarkan Bidan</option>
                                <?php
                                foreach ($bidan->result() as $b) {
                                    echo "<option value=" . $b->id . ">" . $b->nama_bidan . "</option>";
                                }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-info btn-circle btn-md"><i class="fas fa-check fa-2x"></i></button>
                            <?= form_close(); ?>
                        </div>
                        <div class="col-md-4">
                            <?= form_open('admin/search_p_online'); ?>
                            <input class="form-control mr-sm-1" type="text" name="keyword" placeholder="Cari Pasien" aria-label="Search" required>
                            <button type="submit" class="btn btn-info">Cari</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No Pendaftaran</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Diagnosa</th>
                                    <th scope="col">Bidan</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pasien as $p) : ?>
                                    <tr>
                                        <td><?= $p['no_pendaftaran']; ?></td>
                                        <td><?= $p['nama_pasien']; ?></td>
                                        <td><?= $p['nama_diagnosa']; ?></td>
                                        <td><?= $p['nama_bidan']; ?></td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-info btn-sm" href="<?= base_url('admin/detailpasien/' . $p['no_pendaftaran']); ?>"><i class="fas fa-info-circle fa-2x"></i></a>
                                            <a type="button" class="btn btn-success btn-sm" href="<?= base_url('admin/print_detailpasien/' . $p['no_pendaftaran']); ?>"><i class="fas fa-print fa-2x"></i></a>
                                            <a type="button" class="btn btn-warning btn-sm" href="<?= base_url('admin/editpasienonline/' . $p['no_pendaftaran']); ?>"><i class="fas fa-user-edit fa-2x"></i></a>
                                            <a type="button" class="btn btn-danger btn-sm" href="<?= base_url('admin/hapuspasienonline/' . $p['no_pendaftaran']); ?>" onclick="javascript: return confirm('Lanjutkan Untuk Menghapus Data <?= $p['nama_pasien']; ?>')"><i class="fas fa-minus-circle fa-2x"></i></a>
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


<div class="modal" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h5 class="modal-title">Jam Praktek Bidan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama Bidan</th>
                                <th scope="col">Jam Praktek</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bidan->result() as $b) : ?>
                                <tr>
                                    <td><?= $b->id; ?></td>
                                    <td><?= $b->nama_bidan; ?></td>
                                    <td><?= $b->jam_mulai; ?> ~ <?= $b->jam_akhir; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>