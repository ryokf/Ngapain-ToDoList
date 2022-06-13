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
        $data['data_pribadi'] = $this->kegiatan_model->get_data_pribadi($_SESSION['login']);

        $this->load->view('akun/profile',$data); 
    }

    public function edit()
    {
       if( $this->kegiatan_model->edit_data_pribadi($_POST) > 0 ){
            header("Location: ". base_url('profil'));
        }

    // $this->kegiatan_model->edit_data_pribadi($_POST);
    }
}