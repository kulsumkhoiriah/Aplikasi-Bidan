<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap core CSS-->
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/') ?>fontawesome/css/all.css" rel="stylesheet">
</head>

<body>

    <div class="card mt-5 mx-auto" style="max-width: 40rem;">
        <div class="card-header text-center">
            <h4>Surat Rujukan Pasien</h4>
            <p>Rumah Praktek Bidan Devi Amd.keb</p>
        </div>
        <div class="card-body row">
            <table class="ml-5">
                <tr class="card-text">
                    <td>No Pendaftaran</td>
                    <td> :</td>
                    <td> <b><?= $pasienrujuk->no_pendaftaran; ?></b></td>
                </tr>
                <tr class="card-text">
                    <td>Nama Pasien</td>
                    <td> :</td>
                    <td> <b><?= $pasienrujuk->nama_pasien; ?></b></td>
                </tr>
                <tr class="card-text">
                    <td>Tanggal Masuk</td>
                    <td> :</td>
                    <td> <b><?= $pasienrujuk->tanggal_masuk; ?></b></td>
                </tr>
                <tr class="card-text">
                    <td>Alamat Pasien</td>
                    <td> :</td>
                    <td> <b><?= $pasienrujuk->alamat; ?></b></td>
                </tr>
                <tr class="card-text">
                    <td>No Telepon</td>
                    <td> :</td>
                    <td> <b><?= $pasienrujuk->no_hp; ?></b></td>
                </tr>
                <tr class="card-text">
                    <td>Bidan</td>
                    <td> :</td>
                    <td> <b><?= $pasienrujuk->nama_bidan; ?></b></td>
                </tr>
                <tr class="card-text">
                    <td>Tanggal Keluar</td>
                    <td> :</td>
                    <td> <b><?= $pasienrujuk->tanggal_keluar; ?></b></td>
                </tr>
                <tr class="card-text">
                    <td>Diagnosa</td>
                    <td> :</td>
                    <td> <b><?= $pasienrujuk->nama_diagnosa; ?></b></td>
                </tr>
                <tr class="card-text">
                    <td>Rumah Sakit Rujukan</td>
                    <td> :</td>
                    <td> <b><?= $pasienrujuk->nama_rs; ?></b></td>
                </tr>
                <tr class="card-text">
                    <td>Alamat Rumah Sakit</td>
                    <td> :</td>
                    <td> <b><?= $pasienrujuk->alamat; ?></b></td>
                </tr>
            </table>
            <div class="ml-5">
                <img src="<?= base_url('assets/'); ?>images/logo/bidan2.png" width="200px" height="200px">
            </div>
            <script type="text/javascript">
                window.print();
            </script>
        </div>
    </div>
</body>

</html>