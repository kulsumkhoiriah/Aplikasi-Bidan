<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <link rel="icon" href="<?= base_url('assets/') ?>images/logo/bidan2.png" type="image/x-icon">
    <style type="text/css">
        #outtable {
            padding: 20px;
            border: 3px solid #e3e3e3;
            border-radius: 5px;
            width: 600px;
            margin: auto;
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

        td {
            text-align: left;
            padding: 10px;
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
        <h3> Bukti Pendaftaran Online</h3>
        <h3> Rumah Praktek Bidan Devi Amd.keb </h3>
        <hr>
        <hr id="hr-1">
        <table>
            <tr>
                <td rowspan="6">
                    <img src="assets/images/logo/bidan2.png" width="200px" height="200px" />
                </td>
            </tr>
            <tr>
                <td>No Pendaftaran</td>
                <td>:</td>
                <td><b><?= $no_pendaftaran ?></b></td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td><b><?= $nama_pasien ?></b></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><b><?= $alamat ?></b></td>
            </tr>
            <tr>
                <td>No Telepon</td>
                <td>:</td>
                <td><b><?= $no_hp ?></b></td>
            </tr>
            <tr>
                <td>Kode Bidan</td>
                <td>:</td>
                <td><b><?= $bidan; ?></b></td>
            </tr>
        </table>
        <p><i>*simpan sebagai bukti pendaftaran</i></p>
    </div>
</body>


</html>