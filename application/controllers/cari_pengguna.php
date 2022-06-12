<?php

class cari_pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kegiatan_model');
        session_start();
    }
    
    public function index($username = '')
    {
        $data['data_user'] = $this->kegiatan_model->cari_data_pengguna($username);

        $this->load->view('cari_user/cari_user', $data);
    }
}