<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modwitel extends CI_Model
{
    private $table = 'witel';

    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_witel" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from mahasiswa where IdMhsw='$id'
    }

    public function rules()
    {
        return [
            [
                'field' => 'witel',
                'label' => 'witel',
                'rules' => 'required'
            ],
            [
                'field' => 'treg',
                'label' => 'treg',
                'rules' => 'required'
            ],
            [
                'field' => 'aktif',
                'label' => 'aktif',
                'rules' => 'required'
            ]
        ];
    }

    //menampilkan semua data mahasiswa
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id_witel", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from mahasiswa order by IdMhsw desc
    }

    //menyimpan data mahasiswa
    public function save()
    {
        $data = array(
            "witel" => $this->input->post('witel'),
            "treg" => $this->input->post('treg'),
            "aktif" => $this->input->post('aktif')
        );
        return $this->db->insert($this->table, $data);
    }


    //edit data mahasiswa
    public function update()
    {
        $data = array(
            "witel" => $this->input->post('witel'),
            "treg" => $this->input->post('treg'),
            "aktif" => $this->input->post('aktif')
        );
        return $this->db->update($this->table, $data, array('id_witel' => $this->input->post('id_witel')));
    }

    //hapus data mahasiswa
    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_witel" => $id));
    }
}
