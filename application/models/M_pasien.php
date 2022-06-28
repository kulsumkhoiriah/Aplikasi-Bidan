<?php
class M_pasien extends CI_Model
{
    function get_no_pendaftaran()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(no_pendaftaran,4)) AS kd_max FROM pasien WHERE DATE(tanggal_masuk)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy') . $kd;
    }

    public function tambah_pasien($data)
    {
        return $this->db->insert('pasien', $data);
    }
}
