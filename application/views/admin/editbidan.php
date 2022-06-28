<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card-deck">
            <div class="card col-lg-6 mt-5 mb-5">
                <div class="card mt-5">
                    <h5 class="card-header"><i class="fas fa-user-nurse fa-3x"></i> <?= $title ?></h5>
                </div>
                <div class="card-body">
                    <?php foreach ($bidan as $b) : ?>
                        <form action="<?= base_url('admin/updatebidan'); ?>" method="POST">
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" class="form-control form-control-rounded" name="id" value="<?= $b->id ?>" placeholder="ID" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Bidan</label>
                                <input type="text" class="form-control form-control-rounded" name="nama_bidan" value="<?= $b->nama_bidan ?>" placeholder="Nama Bidan" required>
                            </div>
                            <div class="form-group">
                                <label>Jam Praktek Mulai</label>
                                <input type="time" class="form-control form-control-rounded" name="jam_mulai" value="<?= $b->jam_mulai ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jam Praktek Akhir</label>
                                <input type="time" class="form-control form-control-rounded" name="jam_akhir" value="<?= $b->jam_akhir ?>" required>
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url('admin/databidan'); ?>" type="reset" class="btn btn-danger" data-dismiss="modal">Batal</a>
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