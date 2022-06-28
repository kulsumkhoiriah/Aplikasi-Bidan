<div class="content-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">

            <div class="card mt-5 mx-auto" style="max-width: 40rem;">
                <div class="card-header text-center">
                    <h4>Detail Data Pasien Rujukan</h4>
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
                            <td>Nama</td>
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
                </div>
                <div class="card-footer mx-auto"><a href="<?= base_url('admin/pasienrujukan'); ?>" type="button" class="btn btn-light">Kembali</a></div>
            </div>
        </div>
    </div>
</div>