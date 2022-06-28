<div class="content-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header"><i class="far fa-edit fa-3x"></i> <?= $title ?></h5>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="card-deck">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Edit Data Pasien</div>
                            <hr>
                            <?php foreach ($pasien as $p) ?>
                            <?php { ?>
                                <form action="<?= base_url('admin/updatepasienoffline'); ?>" method="POST">
                                    <div class="form-group">
                                        <label>NO Pendaftaran</label>
                                        <input type="text" class="form-control form-control-rounded" name="no_pendaftaran" value="<?= $p->no_pendaftaran ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pasien</label>
                                        <input type="text" class="form-control form-control-rounded" name="nama_pasien" placeholder="Nama Pasien" value="<?= $p->nama_pasien ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control form-control-rounded" name="alamat" placeholder="Alamat" value="<?= $p->alamat ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="text" class="form-control form-control-rounded" name="no_hp" placeholder="No Telpon" value="<?= $p->no_hp ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Diagnosa</label>
                                        <select class="form-control form-control-rounded col-md-6" name="jenis_persalinan" id="exampleFormControlSelect1" value="<?= $p->diagnosa ?>">
                                            <?php
                                            foreach ($diagnosa->result() as $d) {
                                                echo "<option value=" . $d->id . ">" . $d->nama_diagnosa . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Bidan</label>
                                        <select class="form-control form-control-rounded col-md-6" name="bidan" id="exampleFormControlSelect2" value="<?= $p->bidan ?>">
                                            <?php
                                            foreach ($bidan->result() as $b) {
                                                echo "<option value=" . $b->id . ">" . $b->nama_bidan . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Keluar</label>
                                        <input type="date" class="form-control form-control-rounded col-md-6" name="tanggal_keluar" value="<?= $p->tanggal_keluar ?>">
                                    </div>
                                    <a href="<?= base_url('admin/pasien_offline'); ?>" class="btn btn-danger" data-dismiss="modal">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="<?= base_url('assets/'); ?>images/logo/bidan2.png" width="500px" height="500px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->