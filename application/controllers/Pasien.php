<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pasien');
    }

    public function index()
    {
        $data['pasien'] = $this->m_admin->pasien_online();
        $data['bidan'] = $this->m_admin->data_bidan()->result();
        $data['diagnosa'] = $this->m_admin->data_diagnosa();
        $data['pendaftaran'] = $this->m_pasien->get_no_pendaftaran();
        $data['jenis_registrasi'] = $this->m_admin->jenis_registrasi();
        $this->load->view('pasien/formpasien', $data);
    }

    public function tambah_pasien()
    {
        $no_pendaftaran = $this->input->post('no_pendaftaran');
        $sql = $this->db->query("SELECT no_pendaftaran FROM pasien where no_pendaftaran='$no_pendaftaran'");
        $cek_no = $sql->num_rows();
        if ($cek_no > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong> Server Penuh Silahkan Coba Lagi</strong></span>
            </div>
            </div>');
            redirect('pasien');
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
            $this->m_pasien->tambah_pasien($data, 'pasien');
            $this->load->library('dompdf_gen');
            $this->load->view('pasien/cetakbuktipendaftaran', $data);

            $paper_size = 'A4';
            $orientation = 'landscape';
            $html = $this->output->get_output();
            $html = preg_replace('/>\s+</', '><', $html);
            $this->dompdf->set_paper($paper_size, $orientation);

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("Bukti Pendaftaran pasien.pdf", array('Attachment' => 1));
            //0 = review
            //1 = download
        }
    }
}
