<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PRINT PDF</title>
    <link rel="icon" href="<?= base_url('assets/') ?>images/logo/bidan2.png" type="image/x-icon">
    <style type="text/css">
        #outtable {
            padding: 20px;
            border: 1px solid #e3e3e3;
            border-radius: 5px;
        }

        .short {
            width: 50px;
        }

        .normal {
            width: 150px;
        }

        table {
            border-collapse: collapse;
            font-family: arial;
            color: #5E5B5C;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5
        }

        h3 {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            text-align: center;
        }

        #hr-1 {
            width: 350px;
        }
    </style>
</head>

<body>
    <div id="outtable">
        <h3> Laporan Pendaftaran Pasien Online</h3>
        <h3> Rumah Praktek Bidan Devi Amd.keb </h3>
        <hr>
        <hr id="hr-1">
        <table>
            <thead>
                <tr>
                    <th>No Pendaftaran</th>
                    <th>Registrasi</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Tanggal Daftar</th>
                    <th>Diagnosa</th>
                    <th>Bidan</th>
                    <th>Tanggal Keluar</th>
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
    </div>
</body>