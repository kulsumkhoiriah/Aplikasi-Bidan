<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card-deck">
            <div class="card col-lg-6 mt-5 mb-5">
                <div class="card mt-5">
                    <h5 class="card-header"><i class="fas fa-hospital-user fa-3x"></i> <?= $title ?></h5>
                </div>
                <div class="card-body">
                    <?php foreach ($rumahsakit as $rs) : ?>
                        <form action="<?= base_url('admin/updaters'); ?>" method="POST">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" class="form-control form-control-rounded" name="id_rs" value="<?= $rs->id_rs ?>" placeholder="Kode" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Rumah Sakit</label>
                                <input type="text" class="form-control form-control-rounded" name="nama_rs" value="<?= $rs->nama_rs ?>" placeholder="Nama Nama Rumah Sakit" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat Rumah Sakit</label>
                                <input type="text" class="form-control form-control-rounded" name="alamat" value="<?= $rs->alamat ?>" placeholder="Alamat Rumah Sakit" required>
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url('admin/datars'); ?>" type="reset" class="btn btn-danger" data-dismiss="modal">Batal</a>
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