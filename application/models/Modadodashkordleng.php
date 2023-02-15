<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modadodashkordleng extends CI_Model
{
	var $table = 'dataado'; //nama tabel dari database
    var $column_order = array(null, 'am','witel','nama_cust','alamat','det_kat','odp','jarak_alpro','lat','lng'); //field yang ada di table user
    var $column_search = array('am','witel','nama_cust','alamat','det_kat','odp'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'asc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    public function _get_datatables_query($kat,$witel,$datel,$hero,$sto)
    {
        // if ($witelfilterado!='All')
		// 	$this->db->where("$status", $witelfilterado);
		
		if ($sto=='All')
		{
			if ($hero=='All')
			{
				if ($datel=="All")
				{
					if ($witel=="All")
					{
						$this->db->where("kat", $kat);
						$this->db->where("(lat<>'' OR lng<>'')", NULL, FALSE);
					}
					else
					{
						$this->db->where("kat", $kat);
						$this->db->where("witel", $witel);
						$this->db->where("(lat<>'' OR lng<>'')", NULL, FALSE);
					}
				}
				else
				{
					$this->db->where("kat", $kat);
					$this->db->where("datel", $datel);
					$this->db->where("(lat<>'' OR lng<>'')", NULL, FALSE);
				}
			}
			else
			{
				$this->db->where("kat", $kat);
				$this->db->where("hero", $hero);
				$this->db->where("(lat<>'' OR lng<>'')", NULL, FALSE);
			}
		} 
		else 
		{
			$this->db->where("kat", $kat);
			$this->db->where("sto", $sto);
			$this->db->where("(lat<>'' OR lng<>'')", NULL, FALSE);
		}
		
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
 
    public function get_datatables($kat,$witel,$datel,$hero,$sto)
    {
		if ($sto=='All')
		{
			if ($hero=='All')
			{
				if ($datel=="All")
				{
					if ($witel=="All")
					{
						$this->db->where("kat", $kat);
						$this->db->where("(lat<>'' OR lng<>'')", NULL, FALSE);
					}
					else
					{
						$this->db->where("kat", $kat);
						$this->db->where("witel", $witel);
						$this->db->where("(lat<>'' OR lng<>'')", NULL, FALSE);
					}
				}
				else
				{
					$this->db->where("kat", $kat);
					$this->db->where("datel", $datel);
					$this->db->where("(lat<>'' OR lng<>'')", NULL, FALSE);
				}
			}
			else
			{
				$this->db->where("kat", $kat);
				$this->db->where("hero", $hero);
				$this->db->where("(lat<>'' OR lng<>'')", NULL, FALSE);
			}
		} 
		else 
		{
			$this->db->where("kat", $kat);
			$this->db->where("sto", $sto);
			$this->db->where("(lat<>'' OR lng<>'')", NULL, FALSE);
		}


        $this->_get_datatables_query($kat,$witel,$datel,$hero,$sto);

        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered($kat,$witel,$datel,$hero,$sto)
    {
        $this->_get_datatables_query($kat,$witel,$datel,$hero,$sto);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($kat,$witel,$datel,$hero,$sto)
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
