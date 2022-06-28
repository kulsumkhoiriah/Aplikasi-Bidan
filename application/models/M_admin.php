<?php
class M_admin extends CI_Model
{
    public function jumlah_pasien()
    {
        return $this->db->get('pasien');
    }

    public function pasien_offline()
    {
        $query = "SELECT pasien.no_pendaftaran, jenis_registrasi.nama, pasien.nama_pasien, pasien.alamat, pasien.no_hp, diagnosa.nama_diagnosa, bidan.nama_bidan, pasien.tanggal_masuk, pasien.tanggal_keluar FROM pasien
        INNER JOIN jenis_registrasi ON pasien.registrasi = jenis_registrasi.id
        INNER JOIN diagnosa ON pasien.jenis_persalinan = diagnosa.id
        INNER JOIN bidan ON pasien.bidan = bidan.id
        WHERE pasien.registrasi = 1 
        ORDER BY pasien.no_pendaftaran  DESC";

        return $this->db->query($query)->result_array();
    }

    public function pasien_online()
    {
        $query = "SELECT pasien.no_pendaftaran, jenis_registrasi.nama, pasien.nama_pasien, pasien.alamat, pasien.no_hp, diagnosa.nama_diagnosa, bidan.nama_bidan, pasien.tanggal_masuk, pasien.tanggal_keluar FROM pasien
        INNER JOIN jenis_registrasi ON pasien.registrasi = jenis_registrasi.id
        INNER JOIN diagnosa ON pasien.jenis_persalinan = diagnosa.id
        INNER JOIN bidan ON pasien.bidan = bidan.id
        WHERE pasien.registrasi = 2
        ORDER BY pasien.no_pendaftaran DESC";

        return $this->db->query($query)->result_array();
    }

    public function pasien_rujuk()
    {
        $query = "SELECT pasien.no_pendaftaran, jenis_registrasi.nama, pasien.nama_pasien, pasien.alamat, pasien.no_hp, diagnosa.nama_diagnosa, bidan.nama_bidan, pasien.tanggal_masuk, pasien.tanggal_keluar, rs_rujukan.nama_rs FROM pasien
        INNER JOIN jenis_registrasi ON pasien.registrasi = jenis_registrasi.id
        INNER JOIN diagnosa ON pasien.jenis_persalinan = diagnosa.id
        INNER JOIN bidan ON pasien.bidan = bidan.id
        INNER JOIN rujukan ON pasien.no_pendaftaran = rujukan.no_pendaftaran
        INNER JOIN rs_rujukan ON rujukan.id_rs = rs_rujukan.id_rs
        WHERE diagnosa.id = 3
        ORDER BY pasien.no_pendaftaran  DESC";

        return $this->db->query($query)->result_array();
    }

    public function data_bidan()
    {
        return $this->db->get('bidan');
    }

    public function data_rs()
    {
        return $this->db->get('rs_rujukan');
    }

    public function data_diagnosa()
    {
        return $this->db->get('diagnosa');
    }

    public function jenis_registrasi()
    {
        return $this->db->get('jenis_registrasi');
    }

    public function tambah_pasien($data)
    {
        return $this->db->insert('pasien', $data);
    }

    public function tambah_pasienrujuk($data)
    {
        return $this->db->insert('rujukan', $data);
    }

    public function tambah_bidan($data)
    {
        return $this->db->insert('bidan', $data);
    }

    public function tambah_rs($data)
    {
        return $this->db->insert('rs_rujukan', $data);
    }

    public function detail_pasien($no_pendaftaran)
    {
        $this->db->distinct();
        $this->db->select("*");
        $this->db->from("pasien");
        $this->db->join("diagnosa", "pasien.jenis_persalinan=diagnosa.id");
        $this->db->join("bidan", "pasien.bidan=bidan.id");
        $this->db->where("pasien.no_pendaftaran", $no_pendaftaran);
        return $this->db->get()->row();
    }

    public function detail_pasienrujuk($no_pendaftaran)
    {
        $this->db->distinct();
        $this->db->select("*");
        $this->db->from("pasien");
        $this->db->join("diagnosa", "pasien.jenis_persalinan=diagnosa.id");
        $this->db->join("bidan", "pasien.bidan=bidan.id");
        $this->db->join("rujukan", "pasien.no_pendaftaran=rujukan.no_pendaftaran");
        $this->db->join("rs_rujukan", "rujukan.id_rs=rs_rujukan.id_rs");
        $this->db->where("pasien.no_pendaftaran", $no_pendaftaran);
        return $this->db->get()->row();
    }

    public function edit_pasien($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_pasien($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function edit_pasienrujuk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_pasienrujuk($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function edit_bidan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_bidan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function edit_rs($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_rs($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_keyword1($keyword)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join("diagnosa", "pasien.jenis_persalinan=diagnosa.id");
        $this->db->join("bidan", "pasien.bidan=bidan.id");
        $this->db->where('pasien.registrasi = 2');
        $this->db->like('nama_pasien', $keyword);
        $this->db->or_like('no_pendaftaran', $keyword);
        $this->db->or_like('tanggal_masuk', $keyword);
        $this->db->or_like('tanggal_keluar', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('jenis_persalinan', $keyword);
        $this->db->or_like('no_hp', $keyword);
        $this->db->or_like('bidan', $keyword);
        return $this->db->get()->result_array();
    }

    public function get_keyword2($keyword)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join("diagnosa", "pasien.jenis_persalinan=diagnosa.id");
        $this->db->join("bidan", "pasien.bidan=bidan.id");
        $this->db->where('pasien.registrasi = 1');
        $this->db->like('nama_pasien', $keyword);
        $this->db->or_like('no_pendaftaran', $keyword);
        $this->db->or_like('tanggal_masuk', $keyword);
        $this->db->or_like('tanggal_keluar', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('jenis_persalinan', $keyword);
        $this->db->or_like('no_hp', $keyword);
        $this->db->or_like('bidan', $keyword);
        return $this->db->get()->result_array();
    }

    public function get_keyword3($keyword)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join("diagnosa", "pasien.jenis_persalinan=diagnosa.id");
        $this->db->join("bidan", "pasien.bidan=bidan.id");
        $this->db->where('pasien.registrasi = 2');
        $this->db->like('bidan', $keyword);
        $this->db->or_like('nama_pasien', $keyword);
        $this->db->or_like('no_pendaftaran', $keyword);
        $this->db->or_like('tanggal_masuk', $keyword);
        $this->db->or_like('tanggal_keluar', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('jenis_persalinan', $keyword);
        $this->db->or_like('no_hp', $keyword);
        return $this->db->get()->result_array();
    }

    public function get_keyword4($keyword)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join("diagnosa", "pasien.jenis_persalinan=diagnosa.id");
        $this->db->join("bidan", "pasien.bidan=bidan.id");
        $this->db->where('pasien.registrasi = 1');
        $this->db->like('bidan', $keyword);
        $this->db->or_like('nama_pasien', $keyword);
        $this->db->or_like('no_pendaftaran', $keyword);
        $this->db->or_like('tanggal_masuk', $keyword);
        $this->db->or_like('tanggal_keluar', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('jenis_persalinan', $keyword);
        $this->db->or_like('no_hp', $keyword);
        return $this->db->get()->result_array();
    }
}
