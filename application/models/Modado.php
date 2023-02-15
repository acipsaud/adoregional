<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modado extends CI_Model
{
	var $table = 'dataado'; //nama tabel dari database
    var $column_order = array(null, 'witel','datel','hero','sto','am','nama_cust','alamat','kat','det_kat','odp','jarak_alpro','segment','nipnas','revenue','kab','kec','kel','id_lop'); //field yang ada di table user
    var $column_search = array('witel','datel','hero','sto','am','nama_cust','kat','det_kat','segment','kab','kec','kel','id_lop'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'asc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    public function _get_datatables_query($status,$witelfilterado)
    {
        if ($witelfilterado!='All')
			$this->db->where("$status", $witelfilterado);
		
		// if ($filter!='--')
		// 	$this->db->where("$filter", $status);

		// $this->db->where("kode_sto", 'BGI');
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    public function get_datatables($status,$witelfilterado)
    {
		if ($witelfilterado!='All')
			$this->db->where("$status", $witelfilterado);
		
		// if ($filter!='--')
		// 	$this->db->where("$filter", $status);


        $this->_get_datatables_query($status,$witelfilterado);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered($status,$witelfilterado)
    {
        $this->_get_datatables_query($status,$witelfilterado);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($status,$witelfilterado)
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
