<?php

class Cari_pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kegiatan_model');
        session_start();
    }
    
    public function index($username = '')
    {
        $data['data_user'] = $this->kegiatan_model->cari_data_pengguna($username);

        if( $data['data_user'] == [] ){
            $this->load->view('cari_user/default', $data);
        }
        else{
            $this->load->view('cari_user/cari_user', $data);
        }
       
    }

    public function detail($id)
    {
        $data['detail'] = $this->kegiatan_model->detail_data_pengguna($id);
        $data['email_user'] = $data['detail'][0]['email'];
        $data['data_kegiatan'] = $this->kegiatan_model->detail_kegiatan_data_pengguna($data['email_user']);

        $data['jumlah_kegiatan'] = $this->kegiatan_model->jumlah_kegiatan_lain($data['email_user']);
        $data['jumlah_mengikuti'] = $this->kegiatan_model->jumlah_mengikuti_lain($data['email_user']);
        $data['jumlah_pengikut'] = $this->kegiatan_model->jumlah_pengikut_lain($data['email_user']);

        $data['cek_ikut'] = $this->kegiatan_model->cek_ikut($data['email_user']);

        $this->load->view('cari_user/detail_cari_user', $data);
    }

    public function mengikuti($id)
    {
        $this->kegiatan_model->data_mengikuti($_POST);
        
        header("Location: " . base_url('cari_pengguna/detail/') . $id);
        
        // var_dump($this->kegiatan_model->data_mengikuti($_POST));
    }
}