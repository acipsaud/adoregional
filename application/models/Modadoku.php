<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modadoku extends CI_Model
{
    private $table = 'datadoo';

    //menampilkan data mahasiswa berdasarkan id mahasiswa
    function update($data=array(),$where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->update('dataado',$data);
	}
}
