<div class="content-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="text-center">
                <img src="<?= base_url('assets/'); ?>images/logo/bidan2.png" width="200px" height="200px">
            </div>
            <h3 class="text-center mt-3">Aplikasi Registrasi <p></p>
                Rumah Praktek Bidan Devi Amd.keb<p></p>
                <h4 class="text-center">
                    <!-- Menampilkan Jam (Aktif) -->
                    <div id="clock"></div>
                    <script type="text/javascript">
                        function showTime() {
                            var a_p = "";
                            var today = new Date();
                            var curr_hour = today.getHours();
                            var curr_minute = today.getMinutes();
                            var curr_second = today.getSeconds();
                            if (curr_hour < 12) {
                                a_p = "AM";
                            } else {
                                a_p = "PM";
                            }
                            if (curr_hour == 0) {
                                curr_hour = 12;
                            }
                            if (curr_hour > 12) {
                                curr_hour = curr_hour - 12;
                            }
                            curr_hour = checkTime(curr_hour);
                            curr_minute = checkTime(curr_minute);
                            curr_second = checkTime(curr_second);
                            document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                        }

                        function checkTime(i) {
                            if (i < 10) {
                                i = "0" + i;
                            }
                            return i;
                        }
                        setInterval(showTime, 500);
                    </script>
                    <!-- Menampilkan Hari, Bulan dan Tahun -->
                    <script type='text/javascript'>
                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                        var date = new Date();
                        var day = date.getDate();
                        var month = date.getMonth();
                        var thisDay = date.getDay(),
                            thisDay = myDays[thisDay];
                        var yy = date.getYear();
                        var year = (yy < 1000) ? yy + 1900 : yy;
                        document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    </script>
                </h4>
            </h3>
            <div class="card-deck mt-5">
                <div class="card col-md-4">
                    <div class="text-left mt-3">
                        <i class="fas fa-user-injured fa-3x"></i>
                        Jumlah Data Pasien
                        <h3 class="text-right"><?= $this->m_admin->jumlah_pasien()->num_rows(); ?></h3>
                    </div>
                </div>
                <div class="card col-md-4">
                    <div class="text-left mt-3">
                        <i class="fas fa-user-nurse fa-3x"></i>
                        Jumlah Bidan
                        <h3 class="text-right"><?= $this->m_admin->data_bidan()->num_rows(); ?></h3>
                    </div>
                </div>
                <div class="card col-md-4">
                    <div class="text-left mt-3">
                        <i class="fas fa-hospital-user fa-3x"></i>
                        Rumah Sakit Rujukan
                        <h3 class="text-right"><?= $this->m_admin->data_rs()->num_rows(); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>