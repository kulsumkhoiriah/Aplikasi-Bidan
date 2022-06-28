<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
    }


    public function login()
    {
        $data['title'] = 'Login';
        $this->load->view('auth/header', $data);
        $this->load->view('auth/login');
        $this->load->view('auth/footer');
    }

    public function auth()
    {
        $username = strip_tags(str_replace("'", "", $this->input->post('username', TRUE)));
        $password = strip_tags(str_replace("'", "", $this->input->post('password', TRUE)));
        $data = $this->m_auth->cekadmin($username, $password);
        if ($data->num_rows() > 0) {
            $d = $data->row_array();
            $newdata = array(
                'id'   => $d['id'],
                'username'  => $d['username']
            );

            $this->session->set_userdata($newdata);
            redirect('admin');
        } else {
            redirect('auth/gagallogin');
        }
    }

    public function gagallogin()
    {
        $url = base_url('auth/login');
        echo $this->session->set_flashdata('msg', '<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
        redirect($url);
    }

    public function logout()
    {
        $newdata = array(
            'username'  => '',
            'password' => ''
        );

        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
