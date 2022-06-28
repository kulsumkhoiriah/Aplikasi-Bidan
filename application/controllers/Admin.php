<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pasien');
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function pasien_online()
    {
        $data['title'] = 'Data Pasien Pendaftaran Online';
        $data['pasien'] = $this->m_admin->pasien_online();
        $data['bidan'] = $this->m_admin->data_bidan();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/pasienonline', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }
    public function pasien_offline()
    {
        $data['title'] = 'Data Pasien Pendaftaran Offline';
        $data['pasien'] = $this->m_admin->pasien_offline();
        $data['bidan'] = $this->m_admin->data_bidan();
        $data['diagnosa'] = $this->m_admin->data_diagnosa();
        $data['pendaftaran'] = $this->m_pasien->get_no_pendaftaran();
        $data['jenis_registrasi'] = $this->m_admin->jenis_registrasi();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/pasienoffline', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function pasienrujukan()
    {
        $data['title'] = 'Surat Rujukan';
        $data['pasienrujuk'] = $this->m_admin->pasien_rujuk();
        $data['rumahsakit'] = $this->m_admin->data_rs();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/pasienrujuk', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function databidan()
    {
        $data['title'] = 'Data Bidan';
        $data['bidan'] = $this->m_admin->data_bidan()->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/bidan', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function datars()
    {
        $data['title'] = 'Data Rumah Sakit Rujukan';
        $data['rumahsakit'] = $this->m_admin->data_rs()->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/rsrujukan', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }



    public function tambahpasien()
    {
        $no_pendaftaran = $this->input->post('no_pendaftaran');
        $sql = $this->db->query("SELECT no_pendaftaran FROM pasien where no_pendaftaran='$no_pendaftaran'");
        $cek_no = $sql->num_rows();
        if ($cek_no > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-6" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong> Server Penuh Silahkan Coba Lagi</strong></span>
            </div>
            </div>');
            redirect('admin/pasien_pasien_offline');
        } else {
            $no_pendaftaran = $this->input->post('no_pendaftaran');
            $registrasi = $this->input->post('registrasi');
            $nama_pasien = $this->input->post('nama_pasien');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $jenis_persalinan = $this->input->post('jenis_persalinan');
            $bidan = $this->input->post('bidan');
            $tanggal_keluar = $this->input->post('tanggal_keluar');

            $data = array(
                'no_pendaftaran' => $no_pendaftaran,
                'registrasi' => $registrasi,
                'nama_pasien' => $nama_pasien,
                'tanggal_masuk' => $tanggal_masuk,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'jenis_persalinan' => $jenis_persalinan,
                'bidan' => $bidan,
                'tanggal_keluar' => $tanggal_keluar
            );

            $this->m_admin->tambah_pasien($data, 'pasien');
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible col-md-6" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong> Data Berhasil Ditambahkan</strong></span>
            </div>
            </div>');
            redirect('admin/pasien_offline');
        }
    }

    public function tambahpasienrujuk()
    {
        $no_pendaftaran = $this->input->post('no_pendaftaran');
        $cek_no = $this->db->get_where('rujukan', ['no_pendaftaran' => $no_pendaftaran])->row_array();

        if ($cek_no > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-6" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong> Data Pasien Sudah Ada</strong></span>
            </div>
            </div>');
            redirect('admin/pasienrujukan');
        } else {
            $this->_pasienrujuk();
        }
    }

    private function _pasienrujuk()
    {
        $no_pendaftaran = $this->input->post('no_pendaftaran');
        $id_rs = $this->input->post('id_rs');

        $pasienrujuk = $this->db->get_where('pasien', ['no_pendaftaran' => $no_pendaftaran])->row_array();

        if ($pasienrujuk['jenis_persalinan'] == 3) {
            $data = array(
                'no_pendaftaran' => $no_pendaftaran,
                'id_rs' => $id_rs
            );
            $this->m_admin->tambah_pasienrujuk($data, 'rujukan');
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible col-md-6" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong> Data Berhasil Ditambahkan</strong></span>
            </div>
            </div>');
            redirect('admin/pasienrujukan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-8" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong> No Pendaftaran Pasien Tidak Diketahui / Data Pasien Bukan Berdiagnosa Sesar</strong></span>
            </div>
            </div>');
            redirect('admin/pasienrujukan');
        }
    }

    public function tambahbidan()
    {
        $id = $this->input->post('id');
        $sql = $this->db->query("SELECT id FROM bidan where id='$id'");
        $cek_no = $sql->num_rows();

        if ($cek_no > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-6" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong> Data Bidan Sudah Ada</strong></span>
            </div>
            </div>');
            redirect('admin/databidan');
        } else {
            $id = $this->input->post('id');
            $nama_bidan = $this->input->post('nama_bidan');
            $jam_mulai = $this->input->post('jam_mulai');
            $jam_akhir = $this->input->post('jam_akhir');

            $data = array(
                'id' => $id,
                'nama_bidan' => $nama_bidan,
                'jam_mulai' => $jam_mulai,
                'jam_akhir' => $jam_akhir
            );

            $this->m_admin->tambah_bidan($data, 'bidan');
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible col-md-6" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong> Data Berhasil Ditambahkan</strong></span>
            </div>
            </div>');
            redirect('admin/databidan');
        }
    }

    public function tambahrs()
    {
        $id_rs = $this->input->post('id_rs');
        $sql = $this->db->query("SELECT id_rs FROM rs_rujukan where id_rs='$id_rs'");
        $cek_no = $sql->num_rows();
        if ($cek_no > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-6" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong> ID Sudah Digunakan</strong></span>
            </div>
            </div>');
            redirect('admin/datars');
        } else {
            $id_rs = $this->input->post('id_rs');
            $nama_rs = $this->input->post('nama_rs');
            $alamat = $this->input->post('alamat');

            $data = array(
                'id_rs' => $id_rs,
                'nama_rs' => $nama_rs,
                'alamat' => $alamat
            );

            $this->m_admin->tambah_rs($data, 'rs_rujukan');
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible col-md-6" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-info"></i>
        </div>
        <div class="alert-message">
            <span><strong> Data Berhasil Ditambahkan</strong></span>
        </div>
        </div>');
            redirect('admin/datars');
        }
    }

    public function detailpasien($no_pendaftaran)
    {
        $data['title'] = 'Detail Data Pasien';
        $pasien = $this->m_admin->detail_pasien($no_pendaftaran, 'pasien');
        $data['pasien'] = $pasien;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/detailpasien', $data);
        $this->load->view('admin/color');
        $this->load->view('admin/footer');
    }

    public function detailpasienrujuk($no_pendaftaran)
    {
        $data['title'] = 'Detail Data Pasien';
        $pasienrujuk = $this->m_admin->detail_pasienrujuk($no_pendaftaran, 'pasien');
        $data['pasienrujuk'] = $pasienrujuk;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/detailpasienrujuk', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function editpasienonline($no_pendaftaran)
    {
        $data['title'] = 'Edit Data Pasien';
        $data['bidan'] = $this->m_admin->data_bidan();
        $data['diagnosa'] = $this->m_admin->data_diagnosa();
        $where = array('no_pendaftaran' => $no_pendaftaran);
        $data['pasien'] = $this->m_admin->edit_pasien($where, 'pasien')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/editpasienonline', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function editpasienoffline($no_pendaftaran)
    {
        $data['title'] = 'Edit Data Pasien';
        $data['bidan'] = $this->m_admin->data_bidan();
        $data['diagnosa'] = $this->m_admin->data_diagnosa();
        $where = array('no_pendaftaran' => $no_pendaftaran);
        $data['pasien'] = $this->m_admin->edit_pasien($where, 'pasien')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/editpasienoffline', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function updatepasienonline()
    {
        $no_pendaftaran = $this->input->post('no_pendaftaran');
        $nama_pasien = $this->input->post('nama_pasien');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $jenis_persalinan = $this->input->post('jenis_persalinan');
        $bidan = $this->input->post('bidan');
        $tanggal_keluar = $this->input->post('tanggal_keluar');

        $data = array(
            'no_pendaftaran' => $no_pendaftaran,
            'nama_pasien' => $nama_pasien,
            'tanggal_masuk' => $tanggal_masuk,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'jenis_persalinan' => $jenis_persalinan,
            'bidan' => $bidan,
            'tanggal_keluar' => $tanggal_keluar
        );

        $where = array('no_pendaftaran' => $no_pendaftaran);

        $this->m_admin->update_pasien($where, $data, 'pasien');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible col-md-6" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-info"></i>
        </div>
        <div class="alert-message">
            <span><strong> Data Berhasil Diubah</strong></span>
        </div>
        </div>');
        redirect('admin/pasien_online');
    }
    public function updatepasienoffline()
    {
        $no_pendaftaran = $this->input->post('no_pendaftaran');
        $nama_pasien = $this->input->post('nama_pasien');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $jenis_persalinan = $this->input->post('jenis_persalinan');
        $bidan = $this->input->post('bidan');
        $tanggal_keluar = $this->input->post('tanggal_keluar');

        $data = array(
            'no_pendaftaran' => $no_pendaftaran,
            'nama_pasien' => $nama_pasien,
            'tanggal_masuk' => $tanggal_masuk,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'jenis_persalinan' => $jenis_persalinan,
            'bidan' => $bidan,
            'tanggal_keluar' => $tanggal_keluar
        );

        $where = array('no_pendaftaran' => $no_pendaftaran);

        $this->m_admin->update_pasien($where, $data, 'pasien');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible col-md-6" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-info"></i>
        </div>
        <div class="alert-message">
            <span><strong> Data Berhasil Diubah</strong></span>
        </div>
        </div>');
        redirect('admin/pasien_offline');
    }

    public function editpasienrujuk($no_pendaftaran)
    {
        $data['title'] = 'Edit Data Pasien Rujukan';
        $where = array('no_pendaftaran' => $no_pendaftaran);
        $data['pasienrujuk'] = $this->m_admin->edit_pasienrujuk($where, 'rujukan')->result();
        $data['rumahsakit'] = $this->m_admin->data_rs();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/editpasienrujuk', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function updatepasienrujuk()
    {
        $no_pendaftaran = $this->input->post('no_pendaftaran');
        $id_rs = $this->input->post('id_rs');

        $data = array(
            'no_pendaftaran' => $no_pendaftaran,
            'id_rs' => $id_rs
        );

        $where = array('no_pendaftaran' => $no_pendaftaran);

        $this->m_admin->update_pasienrujuk($where, $data, 'rujukan');

        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible col-md-6" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-info"></i>
        </div>
        <div class="alert-message">
            <span><strong> Data Berhasil Diubah</strong></span>
        </div>
        </div>');
        redirect('admin/pasienrujukan');
    }

    public function editbidan($id)
    {
        $data['title'] = 'Edit Data Bidan';
        $where = array('id' => $id);
        $data['bidan'] = $this->m_admin->edit_bidan($where, 'bidan')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/editbidan', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function updatebidan()
    {
        $id = $this->input->post('id');
        $nama_bidan = $this->input->post('nama_bidan');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_akhir = $this->input->post('jam_akhir');

        $data = array(
            'id' => $id,
            'nama_bidan' => $nama_bidan,
            'jam_mulai' => $jam_mulai,
            'jam_akhir' => $jam_akhir
        );

        $where = array('id' => $id);

        $this->m_admin->update_bidan($where, $data, 'bidan');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible col-md-6" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-info"></i>
        </div>
        <div class="alert-message">
            <span><strong> Data Berhasil Diubah</strong></span>
        </div>
        </div>');
        redirect('admin/databidan');
    }

    public function editrs($id_rs)
    {
        $data['title'] = 'Edit Data Rumah Sakit';
        $where = array('id_rs' => $id_rs);
        $data['rumahsakit'] = $this->m_admin->edit_rs($where, 'rs_rujukan')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/editrs', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function updaters()
    {
        $id_rs = $this->input->post('id_rs');
        $nama_rs = $this->input->post('nama_rs');
        $alamat = $this->input->post('alamat');

        $data = array(
            'id_rs' => $id_rs,
            'nama_rs' => $nama_rs,
            'alamat' => $alamat
        );

        $where = array('id_rs' => $id_rs);

        $this->m_admin->update_rs($where, $data, 'rs_rujukan');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible col-md-6" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-info"></i>
        </div>
        <div class="alert-message">
            <span><strong> Data Berhasil Diubah</strong></span>
        </div>
        </div>');
        redirect('admin/datars');
    }

    public function hapuspasienonline($no_pendaftaran)
    {
        $where = array('no_pendaftaran' => $no_pendaftaran);
        $this->m_admin->hapus_data($where, 'pasien');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-6" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-info"></i>
        </div>
        <div class="alert-message">
            <span><strong> Data Berhasil Dihapus</strong></span>
        </div>
        </div>');
        redirect('admin/pasien_online');
    }

    public function hapuspasienoffline($no_pendaftaran)
    {
        $where = array('no_pendaftaran' => $no_pendaftaran);
        $this->m_admin->hapus_data($where, 'pasien');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-6" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-info"></i>
        </div>
        <div class="alert-message">
            <span><strong> Data Berhasil Dihapus</strong></span>
        </div>
        </div>');
        redirect('admin/pasien_offline');
    }

    public function hapuspasienrujuk($no_pendaftaran)
    {
        $where = array('no_pendaftaran' => $no_pendaftaran);
        $this->m_admin->hapus_data($where, 'rujukan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-6" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-info"></i>
        </div>
        <div class="alert-message">
            <span><strong> Data Berhasil Dihapus</strong></span>
        </div>
        </div>');
        redirect('admin/pasienrujukan');
    }

    public function hapusbidan($id)
    {
        $where = array('id' => $id);
        $this->m_admin->hapus_data($where, 'bidan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-6" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-info"></i>
        </div>
        <div class="alert-message">
            <span><strong> Data Berhasil Dihapus</strong></span>
        </div>
        </div>');
        redirect('admin/databidan');
    }

    public function hapusrs($id_rs)
    {
        $where = array('id_rs' => $id_rs);
        $this->m_admin->hapus_data($where, 'rs_rujukan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-6" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-info"></i>
        </div>
        <div class="alert-message">
            <span><strong> Data Berhasil Dihapus</strong></span>
        </div>
        </div>');
        redirect('admin/datars');
    }

    public function search_p_online()
    {
        $data['title'] = 'Data Pasien Pendaftaran online';
        $keyword = $this->input->post('keyword');
        $data['pasien'] = $this->m_admin->get_keyword1($keyword);
        $data['bidan'] = $this->m_admin->data_bidan();
        $data['diagnosa'] = $this->m_admin->data_diagnosa();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/pasienonline', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function search_p_offline()
    {
        $data['title'] = 'Data Pasien Pendaftaran Offline';
        $keyword = $this->input->post('keyword');
        $data['pasien'] = $this->m_admin->get_keyword2($keyword);
        $data['bidan'] = $this->m_admin->data_bidan();
        $data['diagnosa'] = $this->m_admin->data_diagnosa();
        $data['pendaftaran'] = $this->m_pasien->get_no_pendaftaran();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/pasienoffline', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function search_bidan()
    {
        $data['title'] = 'Data Pasien Pendaftaran Online';
        $keyword_b = $this->input->post('keyword_b');
        $data['pasien'] = $this->m_admin->get_keyword3($keyword_b);
        $data['bidan'] = $this->m_admin->data_bidan();
        $data['diagnosa'] = $this->m_admin->data_diagnosa();
        $data['pendaftaran'] = $this->m_pasien->get_no_pendaftaran();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/pasienonline', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function search_bidan2()
    {
        $data['title'] = 'Data Pasien Pendaftaran Offline';
        $keyword_b = $this->input->post('keyword_c');
        $data['pasien'] = $this->m_admin->get_keyword4($keyword_b);
        $data['bidan'] = $this->m_admin->data_bidan();
        $data['diagnosa'] = $this->m_admin->data_diagnosa();
        $data['pendaftaran'] = $this->m_pasien->get_no_pendaftaran();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/pasienoffline', $data);
        $this->load->view('admin/footer');
        $this->load->view('admin/color');
    }

    public function print_pasien_online()
    {
        $data['pasien'] = $this->m_admin->pasien_online();
        $this->load->view('admin/cetakpasien', $data);
    }

    public function print_pasien_offline()
    {
        $data['pasien'] = $this->m_admin->pasien_offline();
        $this->load->view('admin/cetakpasien', $data);
    }

    public function print_detailpasien($no_pendaftaran)
    {
        $pasien = $this->m_admin->detail_pasien($no_pendaftaran, 'pasien');
        $data['pasien'] = $pasien;
        $this->load->view('admin/cetakdetailpasien', $data);
    }

    public function print_detailpasienrujuk($no_pendaftaran)
    {
        $pasienrujuk = $this->m_admin->detail_pasienrujuk($no_pendaftaran, 'pasien');
        $data['pasienrujuk'] = $pasienrujuk;
        $this->load->view('admin/cetakdetailpasienrujuk', $data);
    }

    public function print_pdf_p_online()
    {
        $data['pasien'] = $this->m_admin->pasien_online();
        $this->load->library('dompdf_gen');
        $this->load->view('admin/cetak_pdf_p_online', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $html = preg_replace('/>\s+</', '><', $html);
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Pendaftaran pasien online.pdf", array('Attachment' => 1));
        //0 = review
        //1 = download
    }

    public function print_pdf_p_offline()
    {
        $data['pasien'] = $this->m_admin->pasien_offline();
        $this->load->library('dompdf_gen');
        $this->load->view('admin/cetak_pdf_p_offline', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $html = preg_replace('/>\s+</', '><', $html);
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Pendaftaran pasien onffine.pdf", array('Attachment' => 1));
        //0 = review
        //1 = download
    }

    public function excel_p_online()
    {
        $data['pasien'] = $this->m_admin->pasien_online();
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Kelompok Katanya Sayang");
        $object->getProperties()->setLastModifiedBy("Kelompok Katanya Sayang");
        $object->getProperties()->setTitle("Daftar Pasien");
        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1', 'NO PENDAFTARAN');
        $object->getActiveSheet()->setCellValue('B1', 'NAMA PASIEN');
        $object->getActiveSheet()->setCellValue('C1', 'ALAMAT');
        $object->getActiveSheet()->setCellValue('D1', 'NO TELEPON');
        $object->getActiveSheet()->setCellValue('E1', 'TANGGAL DAFTAR');
        $object->getActiveSheet()->setCellValue('F1', 'DIAGNOSA');
        $object->getActiveSheet()->setCellValue('G1', 'BIDAN');
        $object->getActiveSheet()->setCellValue('H1', 'TANGGAL KELUAR');
        $object->getActiveSheet()->setCellValue('I1', 'REGISTRASI');

        $baris = 2;

        foreach ($data['pasien'] as $p) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $p['no_pendaftaran']);
            $object->getActiveSheet()->setCellValue('B' . $baris, $p['nama_pasien']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $p['alamat']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $p['no_hp']);
            $object->getActiveSheet()->setCellValue('E' . $baris, $p['tanggal_masuk']);
            $object->getActiveSheet()->setCellValue('F' . $baris, $p['nama_diagnosa']);
            $object->getActiveSheet()->setCellValue('G' . $baris, $p['nama_bidan']);
            $object->getActiveSheet()->setCellValue('H' . $baris, $p['tanggal_keluar']);
            $object->getActiveSheet()->setCellValue('I' . $baris, $p['nama']);

            $baris++;
        }
        $filename = "Data Pasien Pendaftaran Online" . '.xlsx';
        $object->getActiveSheet()->setTitle("Data Pasien");

        header('Content-type: aplication/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function excel_p_offline()
    {
        $data['pasien'] = $this->m_admin->pasien_offline();
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Kelompok Katanya Sayang");
        $object->getProperties()->setLastModifiedBy("Kelompok Katanya Sayang");
        $object->getProperties()->setTitle("Daftar Pasien");
        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1', 'NO PENDAFTARAN');
        $object->getActiveSheet()->setCellValue('B1', 'NAMA PASIEN');
        $object->getActiveSheet()->setCellValue('C1', 'ALAMAT');
        $object->getActiveSheet()->setCellValue('D1', 'NO TELEPON');
        $object->getActiveSheet()->setCellValue('E1', 'TANGGAL DAFTAR');
        $object->getActiveSheet()->setCellValue('F1', 'DIAGNOSA');
        $object->getActiveSheet()->setCellValue('G1', 'BIDAN');
        $object->getActiveSheet()->setCellValue('H1', 'TANGGAL KELUAR');
        $object->getActiveSheet()->setCellValue('I1', 'REGISTRASI');

        $baris = 2;

        foreach ($data['pasien'] as $p) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $p['no_pendaftaran']);
            $object->getActiveSheet()->setCellValue('B' . $baris, $p['nama_pasien']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $p['alamat']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $p['no_hp']);
            $object->getActiveSheet()->setCellValue('E' . $baris, $p['tanggal_masuk']);
            $object->getActiveSheet()->setCellValue('F' . $baris, $p['nama_diagnosa']);
            $object->getActiveSheet()->setCellValue('G' . $baris, $p['nama_bidan']);
            $object->getActiveSheet()->setCellValue('H' . $baris, $p['tanggal_keluar']);
            $object->getActiveSheet()->setCellValue('I' . $baris, $p['nama']);

            $baris++;
        }
        $filename = "Data Pasien Pendaftaran Offline" . '.xlsx';
        $object->getActiveSheet()->setTitle("Data Pasien");

        header('Content-type: aplication/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
}
