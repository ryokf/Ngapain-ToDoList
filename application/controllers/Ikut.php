<?php

class Ikut extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kegiatan_model');
        session_start();
    }

    public function pengikut()
    {
        $data['data_cocok'] = $this->kegiatan_model->data_beranda_cocok();
        $data['daftar_pengikut_diri'] = $this->kegiatan_model->data_daftar_pengikut_diri();

        $this->load->view('ikut/pengikut', $data);
    }

    public function mengikuti()
    {
        $data['data_cocok'] = $this->kegiatan_model->data_beranda_cocok();
        $data['daftar_mengikuti_diri'] = $this->kegiatan_model->data_daftar_mengikuti_diri();

        $this->load->view('ikut/mengikuti', $data);
    }
}