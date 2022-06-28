<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card-deck">
            <div class="card col-lg-6 mt-5 mb-5">
                <div class="card mt-5">
                    <h5 class="card-header"><i class="fas fa-file-signature fa-3x"></i> <?= $title ?></h5>
                </div>
                <div class="card-body">
                    <?php foreach ($pasienrujuk as $psr) : ?>
                        <form action="<?= base_url('admin/updatepasienrujuk'); ?>" method="POST">
                            <div id="form-group">
                                <label>No Pendaftaran</label>
                                <input type="text" class="form-control form-control-rounded" name="no_pendaftaran" value="<?= $psr->no_pendaftaran ?>" readonly>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlSelect1">Rumah Sakit Rujukan</label>
                                <select class="form-control form-control-rounded col-md-6" name="id_rs" id="exampleFormControlSelect1" value="<?= $psr->id_rs ?>" required>
                                    <?php
                                    foreach ($rumahsakit->result() as $rs) {
                                        echo "<option value=" . $rs->id_rs . ">" . $rs->nama_rs . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url('admin/pasienrujukan'); ?>" type="reset" class="btn btn-danger" data-dismiss="modal">Batal</a>
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </form>
                    <?php endforeach; ?>
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