<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap core CSS-->
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/') ?>fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
    <div class="col-lg-12">

        <div class="card mt-5 mx-auto" style="max-width: 40rem;">
            <div class="card-header text-center">
                <h4>Bukti Transaksi Data Pasien</h4>
                <p>Rumah Praktek Bidan Devi Amd.keb</p>
            </div>
            <div class="card-body row">
                <table class="ml-5">
                    <tr class="card-text">
                        <td>No Pendaftaran</td>
                        <td> :</td>
                        <td> <b><?= $pasien->no_pendaftaran; ?></b></td>
                    </tr>
                    <tr class="card-text">
                        <td>Nama</td>
                        <td> :</td>
                        <td> <b><?= $pasien->nama_pasien; ?></b></td>
                    </tr>
                    <tr class="card-text">
                        <td>Tanggal Masuk</td>
                        <td> :</td>
                        <td> <b><?= $pasien->tanggal_masuk; ?></b></td>
                    </tr>
                    <tr class="card-text">
                        <td>Alamat</td>
                        <td> :</td>
                        <td> <b><?= $pasien->alamat; ?></b></td>
                    </tr>
                    <tr class="card-text">
                        <td>No Telepon</td>
                        <td> :</td>
                        <td> <b><?= $pasien->no_hp; ?></b></td>
                    </tr>
                    <tr class="card-text">
                        <td>Diagnosa</td>
                        <td> :</td>
                        <td> <b><?= $pasien->nama_diagnosa; ?></b></td>
                    </tr>
                    <tr class="card-text">
                        <td>Bidan</td>
                        <td> :</td>
                        <td> <b><?= $pasien->nama_bidan; ?></b></td>
                    </tr>
                    <tr class="card-text">
                        <td>Tanggal Keluar</td>
                        <td> :</td>
                        <td> <b><?= $pasien->tanggal_keluar; ?></b></td>
                    </tr>
                </table>
                <div class="ml-5">
                    <img src="<?= base_url('assets/'); ?>images/logo/bidan2.png" width="200px" height="200px">
                </div>
            </div>
            <script type="text/javascript">
                window.print();
            </script>
        </div>
    </div>
</body>

</html>