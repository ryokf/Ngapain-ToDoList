<?php

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('kegiatan_model');
    }

    public function index()
    {
        $data['data_kegiatan'] = $this->kegiatan_model->get_data($_SESSION['login']);

       $this->load->view('akun/profile',$data); 
    }
}