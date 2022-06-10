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
        $data['data_gelap'] = $this->kegiatan_model->get_data_gelap($_SESSION['login']);

        $this->load->view('home/index', $data);
    }

    public function coba()
    {
        echo '<h1>hallo</h1>';
    }

    public function mode_gelap()
    {
        if( $this->kegiatan_model->atur_mode_gelap($_POST) > 0 ){
            header("Location: ". base_url('home'));
        }
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

    public function ubah()
    {
        if( $this->kegiatan_model->ubah_data($_POST) > 0 ){
            header("Location: ". base_url('home'));
        }
    }

    public function cari($keyword = '')
    {
        $data['data_kegiatan'] = $this->kegiatan_model->cari_data($keyword);
        $data['data_gelap'] = $this->kegiatan_model->get_data_gelap($_SESSION['login']);

        $this->load->view('home/hasil_ajax', $data);
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