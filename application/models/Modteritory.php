<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modteritory extends CI_Model
{
    private $table = 'teritory';

    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_teritory" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from mahasiswa where IdMhsw='$id'
    }

    //menampilkan semua data mahasiswa
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id_teritory", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from mahasiswa order by IdMhsw desc
    }

    public function rules()
    {
        return [
            [
                'field' => 'teritory',
                'label' => 'teritory',
                'rules' => 'required'
            ],
            [
                'field' => 'area',
                'label' => 'area',
                'rules' => 'required'
            ],
            [
                'field' => 'treg',
                'label' => 'treg',
                'rules' => 'required'
            ],
            [
                'field' => 'datel',
                'label' => 'datel',
                'rules' => 'required'
            ],
            [
                'field' => 'witel',
                'label' => 'witel',
                'rules' => 'required'
            ],
            [
                'field' => 'aktif',
                'label' => 'aktif',
                'rules' => 'required'
            ]
        ];
    }

    //menyimpan data mahasiswa
    public function save()
    {
        $data = array(
            "teritory" => $this->input->post('teritory'),
            "area" => $this->input->post('area'),
            "datel" => $this->input->post('datel'),
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
            "teritory" => $this->input->post('teritory'),
            "area" => $this->input->post('area'),
            "datel" => $this->input->post('datel'),
            "witel" => $this->input->post('witel'),
            "treg" => $this->input->post('treg'),
            "aktif" => $this->input->post('aktif')
        );
        return $this->db->update($this->table, $data, array('id_teritory' => $this->input->post('id_teritory')));
    }

    //hapus data mahasiswa
    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_teritory" => $id));
    }
}
