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
        $this->load->view('login/index');
    }

    public function proses()
    {
        if( isset($_POST['submit']) ){

            if( $this->kegiatan_model->proses_login($_POST) == true ){
                header("Location: http://localhost/ToDoList");
            }
        }
    }
}