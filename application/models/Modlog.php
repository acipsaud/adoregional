<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modlog extends CI_Model
{
    private $table = 'log_activity';

    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_witel" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from mahasiswa where IdMhsw='$id'
    }

    //menampilkan semua data mahasiswa
    public function getAllLog()
    {
    
        $query = $this->db->query("SELECT a.tipe, c.nama_cust,c.segment,c.witel as WITEL_ADO , a.log, b.nama, b.witel as WITEL_USER, a.timestamp as WAKTU FROM log_activity a, user b, dataado c WHERE a.id_dataado=c.id AND a.id_user=b.id_user");
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from mahasiswa order by IdMhsw desc
    }

    //menyimpan data mahasiswa
    public function save_log($a,$new,$old,$ado,$c)
    {        
        $strDif = "<hr>perbedaan  : ".json_encode(array_diff_assoc($new,$old));
        $strOld = "<hr>data old : ".json_encode($old);
        $strNew = "<hr>data new : ".json_encode($new);

        $data = array(
            "id" => bin2hex(random_bytes(20)),
            "id_user" => $a,
            "log" => $strDif.$strOld.$strNew,
            "id_dataado" => $ado,
            "tipe" => $c,
        );
        return $this->db->insert($this->table, $data);
    }

    public function save_log_new_ado($a,$new,$ado,$c)
    {        
        $strNew = "<hr>data new : ".json_encode($new);

        $data = array(
            "id" => bin2hex(random_bytes(20)),
            "id_user" => $a,
            "log" => $strNew,
            "id_dataado" => $ado,
            "tipe" => $c,
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
