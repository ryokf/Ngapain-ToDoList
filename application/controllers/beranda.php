<?php

class beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kegiatan_model');
    }

    public function index()
    {
        $data['beranda'] = $this->kegiatan_model->data_beranda();

        $this->load->view('home/index', $data);
    }
}