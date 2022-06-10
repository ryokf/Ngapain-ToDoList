<?php

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kegiatan_model');
    }

    public function index()
    {
        $this->load->view('login/register');
    }

    public function index2()
    {
        $this->load->view('login/register2');
    }
    
    public function proses()
    {
        if( isset($_POST['submit']) )
        {
            if ($this->kegiatan_model->proses_register($_POST) > 0)
            {
                header('Location: ' . base_url('login'));
            }
        }
    }
    
   
}