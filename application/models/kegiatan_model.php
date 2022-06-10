<?php

class kegiatan_model extends CI_Controller
{
    public function get_data($user)
    {
        return $this->db->where('username', $user)->get('`todolist`')->result_array();
    }

    public function get_data_gelap($user)
    {
        return $this->db->where('username', $user)->select('gelap')->get('`user`')->result_array();
    }

    public function atur_mode_gelap($data)
    {
        $username = $data['username'];
        $gelap = $data['gelap'];

        $mode_gelap = [
            'username' => $username,
            'gelap' => $gelap
        ];

        $this->db->where('username', $username)->update('`user`', $mode_gelap);

        return $this->db->affected_rows();
    }

    public function cari_data($keyword = '')
    {
        $username = $_SESSION['login'];

        return $this->db->like('kegiatan', "{$keyword}")->where('username', "{$username}")->get('`todolist`')->result_array();
    }

    public function proses_login($data)
    {
        session_start();

        $username = $data['username'];
        $password = $data['password'];

        $result = $this->db->where('username', $username)->get('`user`')->result_array();

        #cek username
        if (!empty($result[0]['username'])) {
            #cek password
            if (password_verify($password, $result[0]['password'])) {
                $_SESSION['login'] = $username;
                return true;
                
            } else {
                echo "<script>
                    alert('password salah')
                </script>";
                return false;
            }
        }else{
             echo "<script>
                    alert('username belum terdaftar')
                </script>";
                return false;
        }
    }

     public function proses_register($data)
    {
        $username = strtolower(stripslashes($data['username']));
        $password = $data['password'];
        $password2 = $data['password2'];

        #cek username yang sama
        $result = $this->db->where('username', $username)->select('username')->get('`user`')->result_array();
        if (!empty($result[0]['username'])) {
            echo "<script>
                    alert('username sudah terdaftar')
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
            'username' => $username,
            'password' => $password
        ];

        $this->db->insert('`user`', $data);

        return $this->db->affected_rows();
    }

    public function tambah_data($data)
    {
        $kegiatan = $data['nama'];
        $username = $data['username'];
        $lokasi = $data['lokasi'];
        $tanggal_deadline = $data['tanggal_deadline'];
        $waktu_deadline = $data['waktu_deadline'];
        $deskripsi = $data['deskripsi'];

        $tanggal_deadline = explode('-', $tanggal_deadline);
        $tanggal_deadline = array_reverse($tanggal_deadline);
        $tanggal_deadline = join('-', $tanggal_deadline);

        $tambah = [
            'kegiatan' => $kegiatan,
            'username' => $username,
            'lokasi' => $lokasi,
            'tanggal_deadline' => $tanggal_deadline,
            'waktu_deadline' => $waktu_deadline,
            'deskripsi' => $deskripsi
        ];

        $this->db->insert('`todolist`', $tambah);

        return $this->db->affected_rows();
    }

    public function ubah_data($data)
    {
        $id = $data['id'];
        $kegiatan = $data['nama'];
        $username = $data['username'];
        $lokasi = $data['lokasi'];
        $tanggal_deadline = $data['tanggal_deadline'];
        $waktu_deadline = $data['waktu_deadline'];
        $deskripsi = $data['deskripsi'];

        $tanggal_deadline = explode('-', $tanggal_deadline);
        $tanggal_deadline = array_reverse($tanggal_deadline);
        $tanggal_deadline = join('-', $tanggal_deadline);

        $ubah = [
            'kegiatan' => $kegiatan,
            'username' => $username,
            'lokasi' => $lokasi,
            'tanggal_deadline' => $tanggal_deadline,
            'waktu_deadline' => $waktu_deadline,
            'deskripsi' => $deskripsi
        ];

        $this->db->where('id', $id)->update('`todolist`', $ubah);

        return $this->db->affected_rows();
    }

    public function hapus_data($id)
    {
        $this->db->delete('`todolist`', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function kegiatan_selesai($id)
    {
        $tambah = [
            'sudah' => 'true',
        ];

        $this->db->where('id', $id)->update('`todolist`', $tambah);

        return $this->db->affected_rows();
    }

    public function kegiatan_belum_selesai($id)
    {
        $tambah = [
            'sudah' => 'false',
        ];

        $this->db->where('id', $id)->update('`todolist`', $tambah);

        return $this->db->affected_rows();
    }
}