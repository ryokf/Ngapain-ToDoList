<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kegiatan_model');
        session_start();
    }

    public function index()
    {
        if(!isset($_SESSION['login'])){
            header("Location: " . base_url('login'));
        }

        $data['data_kegiatan'] = $this->kegiatan_model->get_data($_SESSION['login']);

        $this->load->view('home/index', $data);
    }

    public function tambah()
    {
        if( $this->kegiatan_model->tambah_data($_POST) > 0 ){
            header("Location: " . base_url('home'));
        }
    }

    public function hapus($id)
    {
        if( $this->kegiatan_model->hapus_data($id) > 0 ){
            header("Location: ". base_url('home'));
        }
    }

    public function selesai($id)
    {
        if( $this->kegiatan_model->kegiatan_selesai($id) > 0 ){
            header("Location: ". base_url('home'));
        }
    }

    public function belum_selesai($id)
    {
        if( $this->kegiatan_model->kegiatan_belum_selesai($id) > 0 ){
            header("Location: " . base_url('home'));
        }
    }
}