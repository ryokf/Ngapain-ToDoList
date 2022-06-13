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

        if( $data['data_user'] == [] ){
            $this->load->view('cari_user/default', $data);
        }
        else{
            $this->load->view('cari_user/cari_user', $data);
        }
       
    }

    // public function hal_default($username = '')
    // {
    //     $data['data_user'] = $this->kegiatan_model->cari_data_pengguna($username);

    //     $this->load->view('cari_user/default', $data);
    // }
}