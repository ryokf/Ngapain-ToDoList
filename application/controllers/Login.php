<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('kegiatan_model');
        session_start();
    }

    public function index()
    {
        if(isset($_SESSION['login'])){
            header("Location: " . base_url());
        }

        $this->load->view('akun/login');
    }

    public function proses()
    {
        if( isset($_POST['submit']) ){

        // $this->kegiatan_model->proses_login($_POST);  
            if( $this->kegiatan_model->proses_login($_POST) == true ){
                header("Location: " . base_url());
            }
        }
    }
}