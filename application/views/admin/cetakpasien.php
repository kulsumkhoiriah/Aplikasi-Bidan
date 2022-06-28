<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap core CSS-->
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/') ?>fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
    <h2 class="text-center">Data Pasien <p></p>
        Rumah Praktek Bidan Devi Amd.keb</h2>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No Pendaftaran</th>
                    <th scope="col">Registrasi</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Tanggal Daftar</th>
                    <th scope="col">Diagnosa</th>
                    <th scope="col">Bidan</th>
                    <th scope="col">Tanggal Keluar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pasien as $p) : ?>
                    <tr>
                        <td><?= $p['no_pendaftaran']; ?></td>
                        <td><?= $p['nama']; ?></td>
                        <td><?= $p['nama_pasien']; ?></td>
                        <td><?= $p['alamat']; ?></td>
                        <td><?= $p['no_hp']; ?></td>
                        <td><?= $p['tanggal_masuk']; ?></td>
                        <td><?= $p['nama_diagnosa']; ?></td>
                        <td><?= $p['nama_bidan']; ?></td>
                        <td><?= $p['tanggal_keluar']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <script type="text/javascript">
            window.print();
        </script>
    </div>
</body>

</html>