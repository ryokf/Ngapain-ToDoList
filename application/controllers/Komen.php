<?php

class Komen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kegiatan_model');
        session_start();
    }

    public function index($id, $kegiatan)
    {
        $data['id_kegiatan'] = $id . '-' . $kegiatan;
        
        $data['data_beranda'] = $this->kegiatan_model->data_komen_beranda($id, $kegiatan);
        $data['data_cocok'] = $this->kegiatan_model->data_beranda_cocok();

        $data['daftar_komen'] = $this->kegiatan_model->daftar_komen_kegiatan($id, $kegiatan);

        $this->load->view('komen/index', $data);
    }

    public function tambah_komen()
    {
        // var_dump($_POST);

        $this->kegiatan_model->tambah_data_komen($_POST);
        $id_kegiatan_explode = explode('-', $_POST['id_kegiatan']);
        // var_dump($id_kegiatan_explode);
        header('Location: ' . base_url("komen/index/$id_kegiatan_explode[0]/$id_kegiatan_explode[1]"));
    }
}