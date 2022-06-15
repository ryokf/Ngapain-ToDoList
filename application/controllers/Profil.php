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

        $data['jumlah_mengikuti'] = $this->kegiatan_model->jumlah_mengikuti_diri();
        $data['jumlah_pengikut'] = $this->kegiatan_model->jumlah_pengikut_diri();
        $data['jumlah_kegiatan'] = $this->kegiatan_model->jumlah_kegiatan_diri();

        $this->load->view('akun/profile',$data); 
    }

    public function edit()
    {
        // var_dump($_POST);

       if( $this->kegiatan_model->edit_data_pribadi($_POST) > 0 ){
            header("Location: ". base_url('profil'));
        }

    // $this->kegiatan_model->edit_data_pribadi($_POST);
    }
}