<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('kegiatan_model');
    }

    public function index()
    {
        if(isset($_SESSION['login'])){
            header("Location: " . base_url('home'));
        }

        $this->load->view('login/index');
    }

    public function proses()
    {
        if( isset($_POST['submit']) ){

            if( $this->kegiatan_model->proses_login($_POST) == true ){
                header("Location: " . base_url());
            }
        }
    }
}