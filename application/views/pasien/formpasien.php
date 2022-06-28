<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pendaftaran Pasien Online</title>
    <!-- loader-->
    <link href="<?= base_url('assets/') ?>css/pace.min.css" rel="stylesheet" />
    <script src="<?= base_url('assets/') ?>js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="<?= base_url('assets/') ?>images/logo/bidan2.png" type="image/x-icon">
    <!-- Vector CSS -->
    <link href="<?= base_url('assets/') ?>plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="<?= base_url('assets/') ?>plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="<?= base_url('assets/') ?>css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="<?= base_url('assets/') ?>css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="<?= base_url('assets/') ?>css/sidebar-menu.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="<?= base_url('assets/') ?>css/app-style.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/') ?>fontawesome/css/all.css" rel="stylesheet">

    <style type="text/css">
        body {
            background: url("<?= base_url('assets/') ?>images/bg-themes/wall1.png") no-repeat fixed blur;
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>
    <div class="col-md-4 mt-3 mx-auto">
        <div class="card">
            <h5 class="card-header text-center"><img src="assets/images/logo/bidan2.png" width="50px" height="50px" />
                Pendaftaran Online Pasien Rumah Praktek
                <p>Bidan Devi Amd.keb</p>
            </h5>
            <?= $this->session->flashdata('message'); ?>
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                    <button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#formModal">Lihat Jam Praktek Bidan</button>
                </form>
            </nav>
            <div class="card-body">
                <form action="<?= base_url('pasien/tambah_pasien'); ?>" method="POST">
                    <div class="form-group">
                        <label>No pendaftaran</label>
                        <input type="text" class="form-control form-control-rounded" name="no_pendaftaran" value="<?= $pendaftaran; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect3">Jenis Registrasi</label>
                        <select class="form-control form-control-rounded col-md-6" name="registrasi" id="exampleFormControlSelect3">
                            <option value="2">Online</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" class="form-control form-control-rounded" name="nama_pasien" placeholder="Nama Pasien" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control form-control-rounded" name="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" class="form-control form-control-rounded" name="no_hp" placeholder="No Telpon" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Diagnosa</label>
                        <select class="form-control form-control-rounded col-md-6" name="jenis_persalinan" id="exampleFormControlSelect1">
                            <?php
                            foreach ($diagnosa->result() as $d) {
                                echo "<option value=" . $d->id . ">" . $d->nama_diagnosa . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Pilih Bidan</label>
                        <select class="form-control form-control-rounded col-md-6" name="bidan" id="exampleFormControlSelect2">
                            <?php
                            foreach ($bidan as $b) {
                                echo "<option value=" . $b->id . ">" . $b->nama_bidan . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Daftar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="<?= base_url('assets/') ?>plugins/simplebar/js/simplebar.js"></script>
    <!-- sidebar-menu js -->
    <script src="<?= base_url('assets/') ?>js/sidebar-menu.js"></script>
    <!-- loader scripts -->
    <script src="<?= base_url('assets/') ?>js/jquery.loading-indicator.js"></script>
    <!-- Custom scripts -->
    <script src="<?= base_url('assets/') ?>js/app-script.js"></script>
    <!-- Chart js -->

    <script src="<?= base_url('assets/') ?>plugins/Chart.js/Chart.min.js"></script>

    <!-- Index js -->
    <script src="<?= base_url('assets/') ?>js/index.js"></script>

    <!-- Font Awesome -->
    <script defer src="<?= base_url('assets/') ?>fontawesome/js/all.js"></script>



</body>

</html>

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
                    <small>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Bidan</th>
                                    <th scope="col">Jam Praktek</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bidan as $b) : ?>
                                    <tr>
                                        <td><?= $b->id; ?></td>
                                        <td><?= $b->nama_bidan; ?></td>
                                        <td><?= $b->jam_mulai; ?> ~ <?= $b->jam_akhir; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>