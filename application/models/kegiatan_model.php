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
        $email = strtolower($data['email']);
        $email = str_replace(' ', '', $email);
        $password = $data['password'];

        $result = $this->db->where('email', $email)->get('`user`')->result_array();

        #cek email
        if (!empty($result[0]['email'])) {
            #cek password
            if (password_verify($password, $result[0]['password'])) {
                session_start();
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
        $email = str_replace(' ', '', $email);
        
        $username = explode('@', $email);
        $username = $username[0];

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
        if( strtotime($data['tanggal_deadline']) <= (time() + 43200) ){
            // header("Location: " . base_url('home'));
            return false;
        }

        $kegiatan = $data['nama'];
        $email = $data['email'];
        $lokasi = $data['lokasi'];
        $tanggal_deadline = $data['tanggal_deadline'];
        $waktu_deadline = $data['waktu_deadline'];
        $deskripsi = $data['deskripsi'];
        $foto = $this->upload_foto_kegiatan();

        $tanggal_deadline = explode('-', $tanggal_deadline);
        $tanggal_deadline = array_reverse($tanggal_deadline);
        $tanggal_deadline = join('-', $tanggal_deadline);

        $tambah = [
            'kegiatan' => $kegiatan,
            'email' => $email,
            'lokasi' => $lokasi,
            'tanggal_deadline' => $tanggal_deadline,
            'waktu_deadline' => $waktu_deadline,
            'deskripsi' => $deskripsi,
            'foto' => $foto
        ];

        $this->db->insert('`todolist`', $tambah);

        return $this->db->affected_rows();
    }

    public function kadaluwarsa()
    {
        $kegiatan = $this->db->get('todolist')->result_array();

        foreach( $kegiatan as $tanggal ){
        $tanggal['tanggal_deadline'] = explode('-', $tanggal['tanggal_deadline']);
        $tanggal['tanggal_deadline'] = array_reverse($tanggal['tanggal_deadline']);
        $tanggal['tanggal_deadline'] = join('-', $tanggal['tanggal_deadline']);
        $tanggal_kegiatan = strtotime($tanggal['tanggal_deadline']);
        
        $waktu_habis = time() + 43200;

            if( $tanggal_kegiatan <= $waktu_habis ){
                $this->db->delete('`todolist`', ['id' => $tanggal['id']]);
                // $this->db->where('id', $tanggal['id'])->update('`todolist`', ['kegiatan' => 'waktu sudah lewat']);
            }
        }
    }

    public function upload_foto_kegiatan()
    {
        $namaFile = $_FILES['foto_kegiatan']['name']; 
        $ukuranFile = $_FILES['foto_kegiatan']['size'];
        $error = $_FILES['foto_kegiatan']['error'];
        $tmpName = $_FILES['foto_kegiatan']['tmp_name'];

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
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiFoto;
        move_uploaded_file($tmpName, 'img/foto_kegiatan/' . $namaFileBaru);

        return $namaFileBaru;
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

        $fotoLama = $data['fotoLama'];
        
        if ($_FILES['foto']['error'] === 4) {
            $foto = $fotoLama;
        } else {
            $foto = $this->upload_pp_user();
        }

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

    #fungsi untuk melihat profile user lain
    public function detail_data_pengguna($id)
    {
        return $this->db->where('id', $id)->get('`user`')->result_array();
    }

    #fungsi untuk melihat kegiatan user lain
    public function detail_kegiatan_data_pengguna($email)
    {
        return $this->db->where('email', $email)->where('visibilitas', 'public')->get('`todolist`')->result_array();
    }

    #fungsi untuk mengubah visibilitas kegiatan ke public
    public function ubah_visibilitas_ke_public($id)
    {
        $ubah = [
            'visibilitas' => 'public',
        ];

        $this->db->where('id', $id)->update('`todolist`', $ubah);

        return $this->db->affected_rows();
    }

#fungsi untuk mengubah visibilitas kegiatan ke public
    public function ubah_visibilitas_ke_private($id)
    {
        $ubah = [
            'visibilitas' => 'private',
        ];

        $this->db->where('id', $id)->update('`todolist`', $ubah);

        return $this->db->affected_rows();
    }

    #fungsi untuk mendapat data untuk ditampilkan di beranda
    public function data_beranda()
    {
        $daftar_mengikuti = $this->db->where('email', $_SESSION['login'])->get('`mengikuti_tdl`')->result_array();

        // if( $daftar_mengikuti = [] ){
        //     return false;
        // }

        foreach($daftar_mengikuti as $mengikuti){
            $this->db->or_where('email', $mengikuti['mengikuti']);
        }

        $this->db->or_where('email', $_SESSION['login']);


        return $this->db->where('visibilitas', 'public')->order_by('tanggal', 'DESC')->get('`todolist`')->result_array();

        // return $this->db->where('visibilitas', 'public')->order_by('tanggal', 'DESC')->get('`todolist`')->result_array();
    }

    #fungsi untuk mencocokkan data pada table user dan todolist untuk beranda
    public function data_beranda_cocok()
    {
        return $this->db->select('id')->select('username')->select('email')->select('foto')->get('`user`')->result_array();
    }

    #fungsi untuk melihat siapa saja yang mengikuti kita
    public function data_mengikuti($data)
    {
        $diri = $data['diri_sendiri'];
        $lain = $data['pengguna_lain'];

        $cek_email = $this->db->select('email')->select('mengikuti')->get('`mengikuti_tdl`')->result_array();

        foreach($cek_email as $cek)
        {
            if( $cek['email'] == $diri && $cek['mengikuti'] == $lain ){
                $this->db->delete('`mengikuti_tdl`', ['email' => $diri, 'mengikuti' => $lain]);
                $this->db->delete('`pengikut_tdl`', ['email' => $lain]);
                return false;
            }
        }

        $ikut = [
            'email' => $diri,
            'mengikuti' => $lain
        ];

        $diikuti = [
            'email' => $lain,
            'diikuti' => $diri
        ];

        $this->db->insert('`mengikuti_tdl`', $ikut);

        $this->db->insert('`pengikut_tdl`', $diikuti);

        return $this->db->affected_rows();

        //  $this->db->insert('`user`', $data);
    }

    #fungsi untuk mnghitung jumlah mengikuti kita
    public function jumlah_pengikut()
    {
        return $this->db->select('email')->where('email', $_SESSION['login'])->get('`mengikuti_tdl`')->num_rows();
    }

    #fungsi untuk mnghitung jumlah mengikuti kita
    public function jumlah_mengikuti_diri()
    {
        return $this->db->select('email')->where('email', $_SESSION['login'])->get('`mengikuti_tdl`')->num_rows();
    }

    #fungsi untuk mnghitung jumlah pengikut kita
    public function jumlah_pengikut_diri()
    {
        return $this->db->select('mengikuti')->where('mengikuti', $_SESSION['login'])->get('`mengikuti_tdl`')->num_rows();
    }

    #fungsi untuk mnghitung jumlah kegiatan kita
    public function jumlah_kegiatan_diri()
    {
        return $this->db->where('email', $_SESSION['login'])->get('`todolist`')->num_rows();
    }

    #fungsi untuk mnghitung jumlah kegiatan user lain
    public function jumlah_kegiatan_lain($email_lain)
    {
        return $this->db->where('email', $email_lain)->get('`todolist`')->num_rows();
    }

    #fungsi untuk mnghitung jumlah mengikuti user lain
    public function jumlah_mengikuti_lain($email_lain)
    {
        return $this->db->select('email')->where('email', $email_lain)->get('`mengikuti_tdl`')->num_rows();
    }

    #fungsi untuk mnghitung jumlah pengikut user lain
    public function jumlah_pengikut_lain($email_lain)
    {
        return $this->db->select('mengikuti')->where('mengikuti', $email_lain)->get('`mengikuti_tdl`')->num_rows();
    }

    #fungsi untuk mencocokkan peng lain
    public function cek_ikut()
    {
        return $this->db->get('`mengikuti_tdl`')->result_array();
    }

    #fungsi untuk mengetahui siapa yang kita ikuti
    public function data_daftar_mengikuti_diri()
    {
        return $this->db->select('mengikuti')->where('email', $_SESSION['login'])->get('`mengikuti_tdl`')->result_array();
    }

    #fungsi untuk mengetahui siapa pengikut kita
    public function data_daftar_pengikut_diri()
    {
        return $this->db->select('email')->where('mengikuti', $_SESSION['login'])->get('`mengikuti_tdl`')->result_array();
    }

    #fungsi untuk komen di beranda
    public function data_komen_beranda($id, $kegiatan)
    {

        return $this->db->where('id', $id)->where('kegiatan', $kegiatan)->get('`todolist`')->result_array();

        // return $this->db->where('visibilitas', 'public')->order_by('tanggal', 'DESC')->get('`todolist`')->result_array();
    }

    public function daftar_komen_kegiatan($id, $kegiatan)
    {
        return $this->db->where('kegiatan', $id . '-' . $kegiatan)->get('`komen`')->result_array();
    }

    #fungsi untuk menambah komen di beranda
    public function tambah_data_komen($data)
    {
        $id_kegiatan = $data['id_kegiatan'];
        $pengirim = $data['pengirim'];
        $isi = $data['isi_komen'];

         $tambah = [
            'kegiatan' => $id_kegiatan,
            'isi' => $isi,
            'peng_komen' => $pengirim
        ];

        $this->db->insert('`komen`', $tambah);

        return $this->db->affected_rows();
    }
}