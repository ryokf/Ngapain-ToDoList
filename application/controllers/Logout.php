<?php

class Logout extends CI_Controller
{

    public function index()
    {
        session_start();
        session_destroy();

        header("Location: " . base_url());
    }
    
}