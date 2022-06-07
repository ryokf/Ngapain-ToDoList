<?php

class kegiatan_model extends CI_Controller
{
    public function get_data($user)
    {
        return $this->db->where('username', $user)->get('`todolist`')->result_array();
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

        #tambah user ke database
        // $this->db->query("INSERT INTO user 
        //                     VALUES
        //                     ('', '$username', '$password')");

        return $this->db->affected_rows();
    }

    public function tambah_data($data)
    {
        $kegiatan = $data['nama'];
        $username = $data['username'];

        $tambah = [
            'kegiatan' => $kegiatan,
            'username' => $username
        ];

        $this->db->insert('`todolist`', $tambah);

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