<?php

class kegiatan_model extends CI_Controller
{

    #output data kegiatan di halaman utama (home/index)
    public function get_data($user)
    {
        // $query = $this->db->where('email', $user)->get('`todolist`')->result_array();

        // if( $user == '' ){
        //     $query = [];
        // }

        // return $query;

        return $this->db->where('email', $user)->get('`todolist`')->result_array();
    }

    #memberikan data suatu user ingin menggunakan mode gelap atau tidak
    public function get_data_gelap($user)
    {
        return $this->db->where('email', $user)->select('gelap')->get('`user`')->result_array();
    }

    #mengubah mode gelap ke mode terang atau sebaliknya
    public function atur_mode_gelap($data)
    {
        $email = $data['email'];
        $gelap = $data['gelap'];

        $mode_gelap = [
            'email' => $email,
            'gelap' => $gelap
        ];

        $this->db->where('email', $email)->update('`user`', $mode_gelap);

        return $this->db->affected_rows();
    }

    #mencari data kegiatan
    public function cari_data($keyword = '')
    {
        $email = $_SESSION['login'];

        $query = $this->db->like('kegiatan', "{$keyword}")->where('email', "{$email}")->get('`todolist`')->result_array();
        if( $keyword == '' ){
            $query = [];
        }
        return $query;

        // return $this->db->like('kegiatan', "{$keyword}")->where('email', "{$email}")->get('`todolist`')->result_array();
    }

    #memproses login
    public function proses_login($data)
    {
        session_start();
        
        $email = $data['email'];
        $password = $data['password'];

        $result = $this->db->where('email', $email)->get('`user`')->result_array();

        #cek email
        if (!empty($result[0]['email'])) {
            #cek password
            if (password_verify($password, $result[0]['password'])) {
                $_SESSION['login'] = $email;
                return true;
                
            } else {
                echo "<script>
                    alert('password salah')
                </script>";
                return false;
            }
        }else{
             echo "<script>
                    alert('email belum terdaftar')
                </script>";
                return false;
        }
    }

    #memproses register
     public function proses_register($data)
    {
        $email = strtolower(stripslashes($data['email']));
        $username = $email;
        $password = $data['password'];
        $password2 = $data['password2'];

        #cek email yang sama
        $result = $this->db->where('email', $email)->select('email')->get('`user`')->result_array();
        if (!empty($result[0]['email'])) {
            echo "<script>
                    alert('email sudah terdaftar')
                </script>";
            return false;
        }

        #cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>
                    alert('password konfirmasi tidak sesuai')
                </script>";
            return false;
        }

        #enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'email' => $email,
            'username' => $username,
            'password' => $password
        ];

        $this->db->insert('`user`', $data);

        return $this->db->affected_rows();
    }

    #memasukkan kegiatan yang dibuat user ke database
    public function tambah_data($data)
    {
        $kegiatan = $data['nama'];
        $email = $data['email'];
        $lokasi = $data['lokasi'];
        $tanggal_deadline = $data['tanggal_deadline'];
        $waktu_deadline = $data['waktu_deadline'];
        $deskripsi = $data['deskripsi'];

        $tanggal_deadline = explode('-', $tanggal_deadline);
        $tanggal_deadline = array_reverse($tanggal_deadline);
        $tanggal_deadline = join('-', $tanggal_deadline);

        $tambah = [
            'kegiatan' => $kegiatan,
            'email' => $email,
            'lokasi' => $lokasi,
            'tanggal_deadline' => $tanggal_deadline,
            'waktu_deadline' => $waktu_deadline,
            'deskripsi' => $deskripsi
        ];

        $this->db->insert('`todolist`', $tambah);

        return $this->db->affected_rows();
    }

    #mengubah data kegiatan yang sudah masuk di database
    public function ubah_data($data)
    {
        $id = $data['id'];
        $kegiatan = $data['nama'];
        $email = $data['email'];
        $lokasi = $data['lokasi'];
        $tanggal_deadline = $data['tanggal_deadline'];
        $waktu_deadline = $data['waktu_deadline'];
        $deskripsi = $data['deskripsi'];

        $tanggal_deadline = explode('-', $tanggal_deadline);
        $tanggal_deadline = array_reverse($tanggal_deadline);
        $tanggal_deadline = join('-', $tanggal_deadline);

        $ubah = [
            'kegiatan' => $kegiatan,
            'email' => $email,
            'lokasi' => $lokasi,
            'tanggal_deadline' => $tanggal_deadline,
            'waktu_deadline' => $waktu_deadline,
            'deskripsi' => $deskripsi
        ];

        $this->db->where('id', $id)->update('`todolist`', $ubah);

        return $this->db->affected_rows();
    }

    #menghapus data kegiatan yang ada di database
    public function hapus_data($id)
    {
        $this->db->delete('`todolist`', ['id' => $id]);
        return $this->db->affected_rows();
    }

    #mengubah status kegiatan menjadi selesai
    public function kegiatan_selesai($id)
    {
        $tambah = [
            'sudah' => 'true',
        ];

        $this->db->where('id', $id)->update('`todolist`', $tambah);

        return $this->db->affected_rows();
    }

    #mengubah status kegiatan menjadi belum selesai
    public function kegiatan_belum_selesai($id)
    {
        $tambah = [
            'sudah' => 'false',
        ];

        $this->db->where('id', $id)->update('`todolist`', $tambah);

        return $this->db->affected_rows();
    }

    #mencari user lain
    public function cari_data_pengguna($username = '')
    {
        // $email = $_SESSION['login'];
        $query = $this->db->like('username', "{$username}")->get('`user`')->result_array();

        if( $username == '' ){
            $query = [];
        }

        return $query;

        // return $this->db->like('username', "{$username}")->get('`user`')->result_array();
    }

    #mengoutput data pengguna
    public function get_data_pribadi($user)
    {
         return $this->db->where('email', $user)->get('`user`')->result_array();
    }

    #mengubah data pengguna
    public function edit_data_pribadi($data)
    {
        $id = $data['id'];
        $username = $data['username'];
        $telp = $data['telp'];
        $bio = $data['bio'];
        $foto = $this->upload_pp_user();

        // if( $foto = null ){
        //     return false;
        // }

        $ubah = [
            'id' => $id,
            'username' => $username,
            'telp' => $telp,
            'bio' => $bio,
            'foto' => $foto
        ];

        $this->db->where('id', $id)->update('`user`', $ubah);

        return $this->db->affected_rows();

    }

    #fungsi upload foto pp user
    public function upload_pp_user()
    {
        $namaFile = $_FILES['foto']['name']; 
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        #cek apakah file di upload
        if( $error === 4 )
        {
            echo "<script>
                    alert('pilih gambar terlebih dahulu')
                  </script>";
            return false;
        }

        #cek ekstensi file
        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiFoto = explode('.', $namaFile);
        $ekstensiFoto = end($ekstensiFoto);
        $ekstensiFoto = strtolower($ekstensiFoto);
        if( !in_array($ekstensiFoto, $ekstensiValid) )
        {
            echo "<script>
                    alert('ekstensi file yg diijinkan adalah jpg, jpeg, png')
                  </script>";
            return false;
        }

        #cek ukuran file
        if( $ukuranFile > 2000000 )
        {
            echo "<script>
                    alert('ukuran file max adalah 2MB')
                  </script>";
            return false;
        }

        #upload gambar
        // $namaFileBaru = uniqid();
        // $namaFileBaru .= '.';
        // $namaFileBaru .= $ekstensiFoto;
        // session_start();
        $namaFileBaru = $_SESSION['login'] . uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiFoto;
        move_uploaded_file($tmpName, 'img/pp_user/' . $namaFileBaru);

        return $namaFileBaru;
    }
}