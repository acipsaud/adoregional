<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Moduser extends CI_Model
{
    private $table = 'user';

    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_witel" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from mahasiswa where IdMhsw='$id'
    }

    //menampilkan semua data mahasiswa
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id_user", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from mahasiswa order by IdMhsw desc
    }

    //menyimpan data mahasiswa
    public function addUser($data)
    {
        return $this->db->insert($this->table, $data);
    }


    //edit data mahasiswa
    public function update($params)
    {
        return $this->db->update($this->table, $params, array('id_user' => $params['id_user']));
    }

    public function update_with_pass($params)
    {
        return $this->db->update($this->table, $params, array('id_user' => $params['id_user']));
    }

    public function cekPassword($a,$id)
    {
        $res = $this->db->get_where($this->table, ["id_user" => $id])->row();
        if (!empty($res)){
            // echo $res->password;
            if ( ! password_verify($a,$res->password)) {
               return true;
            } else {
                return false;
            }
        }
    }

    //hapus data mahasiswa
    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_witel" => $id));
    }
}
