<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailado extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() 
	{
		parent::__construct();

		$this->load->helper(array('url','form'));
        $this->load->library(array('pagination','form_validation','upload','session'));
		$this->load->model('Modado');
		$this->load->model('Modadoku');	
		ini_set('memory_limit', '-1');
		// $this->load->model('Modhalaman');	

		// $this->load->model('Modauth');
		// if(!$this->Modauth->current_user()){
		// 	redirect('auth/login');
		// }
		// echo $this->modauth->current_user()->username;
    }

	public function updatetes()
	{
		$list = $this->db->query("SELECT * FROM `dataado` WHERE `det_kat`=''")->result();
		foreach ($list as $row):
			$this->db->query("update dataado set det_kat='$row->kat' where id='$row->id'");
		endforeach;
	}

	public function index()
	{
		$dataisi['universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS'")->row()->tot;
		$dataisi['industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR'")->row()->tot;
		$dataisi['kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI'")->row()->tot;
		$dataisi['kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS'")->row()->tot;
		$dataisi['mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL'")->row()->tot;
		$dataisi['bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA'")->row()->tot;
		$dataisi['bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN'")->row()->tot;
		$dataisi['industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG'")->row()->tot;
		$dataisi['faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES'")->row()->tot;
		$dataisi['hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL'")->row()->tot;
		$dataisi['sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH'")->row()->tot;
		$dataisi['govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE'")->row()->tot;
		$dataisi['industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL'")->row()->tot;
		$dataisi['restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT'")->row()->tot;
		$dataisi['apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN'")->row()->tot;

		$dataisi['listado'] = $this->db->query("select * from dataado")->result();
		
		$this->template('menudetailado',$dataisi);
	}

	public function lihatado($id)
	{
		$dataisi['detail'] = $this->db->query("select * from dataado where id='$id'")->row();
		$this->template('lihatado',$dataisi);
	}

	public function edit($id)
	{
		$dataisi['detail'] = $this->db->query("select * from dataado where id='$id'")->row();
		$this->template('editado',$dataisi);
	}

	public function downloadfile()
	{
		$file_name = 'dataado_'.date('Ymd').'.xls'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$file_name"); 
		header("Content-Type: application/csv;");
	
		// get data 
		$student_data = $this->db->query("select * from dataado");

		// file creation 
		$file = fopen('php://output', 'w');
	
		$header = array("id","witel","datel","hero","sto","am","segment","nipnas","revenue","nama_cust","alamat","kab","kec","kel","kat","det_kat","lat","lng","odp","jarak_alpro","pelanggan_telkom","lay_existing","lay_existing_1","lay_existing_2","kompetitor","prospek_lay","id_lop"); 
		fputcsv($file, $header);
		foreach ($student_data->result_array() as $key => $value)
		{ 
			fputcsv($file, $value); 
		}
		fclose($file); 
		exit; 
	}

	public function updateado(){
		$dataisi['id'] = $this->input->post('id');
		$dataisi['nama_cust'] = $this->input->post('nama_cust');
		$dataisi['am'] = $this->input->post('am');
		$dataisi['kat'] = $this->input->post('kat');
		$dataisi['det_kat'] = $this->input->post('det_kat');
		$dataisi['lat'] = $this->input->post('lat');
		$dataisi['lng'] = $this->input->post('lng');
		$dataisi['alamat'] = $this->input->post('alamat');
		$dataisi['kab'] = $this->input->post('kab');
		$dataisi['kec'] = $this->input->post('kec');
		$dataisi['kel'] = $this->input->post('kel');
		$dataisi['witel'] = $this->input->post('witel');
		$dataisi['datel'] = $this->input->post('datel');
		$dataisi['hero'] = $this->input->post('hero');
		$dataisi['sto'] = $this->input->post('sto');
		$dataisi['odp'] = $this->input->post('odp');
		$dataisi['pelanggan_telkom'] = $this->input->post('pelanggan_telkom');
		$dataisi['lay_existing'] = $this->input->post('lay_existing');
		$dataisi['lay_existing_1'] = $this->input->post('lay_existing_1');
		$dataisi['lay_existing_2'] = $this->input->post('lay_existing_2');
		$dataisi['prospek_lay'] = $this->input->post('prospek_lay');
		$dataisi['kompetitor'] = $this->input->post('kompetitor');
		$dataisi['segment'] = $this->input->post('segment');
		$dataisi['nipnas'] = $this->input->post('nipnas');
		$dataisi['id_lop'] = $this->input->post('id_lop');
		$dataisi['revenue'] = $this->input->post('revenue');

		$this->Modadoku->update($dataisi,['id'=>$this->input->post('id')]);
		redirect("detailado/lihatado/".$this->input->post('id'));
	}

	function get_data_ado($status='witel',$witelfilterado='All')
    {
		$witelfilterado = str_replace("-", " ", $witelfilterado);
		$witelfilterado = str_replace("%20", " ", $witelfilterado);
        $list = $this->Modado->get_datatables($status,$witelfilterado);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
			$idku=$field->id;
            $row = array();
			$row[] = "
					<center>
						<div class='btn-group'>
							<a href='".site_url('detailado/edit/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-edit'></i> Edit
							</a>
						</div>
					</center>
					";
            $row[] = $no;
            $row[] = "<center>".$field->witel."</center>";
            $row[] = "<center>".$field->datel."</center>";
            $row[] = "<center>".$field->hero."</center>";
            $row[] = "<center>".$field->sto."</center>";
            $row[] = "<center>".$field->am."</center>";
            $row[] = "<center>".$field->nama_cust."</center>";
            $row[] = "<center>".$field->alamat."</center>";
            $row[] = "<center>".$field->kat."</center>";
            $row[] = "<center>".$field->det_kat."</center>";
            $row[] = "<center>".$field->odp."</center>";
            $row[] = "<center>".$field->jarak_alpro."</center>";
            $row[] = "<center>".$field->segment."</center>";
            $row[] = "<center>".$field->nipnas."</center>";
            $row[] = "<center>".$field->revenue."</center>";
            $row[] = "<center>".$field->kab."</center>";
            $row[] = "<center>".$field->kec."</center>";
            $row[] = "<center>".$field->kel."</center>";
            $row[] = "<center>".$field->id_lop."</center>";
            
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Modado->count_all($status,$witelfilterado),
            "recordsFiltered" => $this->Modado->count_filtered($status,$witelfilterado),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	public function get_data_ado_detail($teritory="witel",$key="SULTENG"){
		// $witel=$this->input->post('witel');

		$key = str_replace("-", " ", $key);
		$key = str_replace("%20", " ", $key);

		$dataisi['universitas'] = number_format($this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and $teritory='$key'")->row()->tot);
		$dataisi['industri_besar'] = number_format($this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and $teritory='$key'")->row()->tot);
		$dataisi['kawasan_industri'] = number_format($this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and $teritory='$key'")->row()->tot);
		$dataisi['kawasan_ekonomi_khusus'] = number_format($this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and $teritory='$key'")->row()->tot);
		$dataisi['mall'] = number_format($this->db->query("select count(*) as tot from dataado where kat='MALL' and $teritory='$key'")->row()->tot);
		$dataisi['bandara'] = number_format($this->db->query("select count(*) as tot from dataado where kat='BANDARA' and $teritory='$key'")->row()->tot);
		$dataisi['bumn'] = number_format($this->db->query("select count(*) as tot from dataado where kat='BUMN' and $teritory='$key'")->row()->tot);
		$dataisi['industri_sedang'] = number_format($this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and $teritory='$key'")->row()->tot);
		$dataisi['faskes'] = number_format($this->db->query("select count(*) as tot from dataado where kat='FASKES' and $teritory='$key'")->row()->tot);
		$dataisi['hotel'] = number_format($this->db->query("select count(*) as tot from dataado where kat='HOTEL' and $teritory='$key'")->row()->tot);
		$dataisi['sekolah'] = number_format($this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and $teritory='$key'")->row()->tot);
		$dataisi['govt_office'] = number_format($this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and $teritory='$key'")->row()->tot);
		$dataisi['industri_kecil'] = number_format($this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and $teritory='$key'")->row()->tot);
		$dataisi['restaurant'] = number_format($this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and $teritory='$key'")->row()->tot);
		$dataisi['apartemen'] = number_format($this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and $teritory='$key'")->row()->tot);
        // $data=$this->db->query("SELECT DISTINCT datel FROM `teritory` where witel='$witel'")->result();
        echo json_encode($dataisi);
	}

	public function list($witel="All",$datel="All",$hero="All",$sto="All",$kat="")
	{
		$dataisi['kat'] = str_replace("-"," ",$kat);
		$dataisi['witel'] = $witel;
		$dataisi['datel'] = $datel;
		$dataisi['hero'] = $hero;
		$dataisi['sto'] = $sto;

		// echo "ok";
		$this->template('detailado',$dataisi);
	}

	public function katado($jenis='kategoriado',$type='point',$witel="All",$datel="All",$hero="All",$sto="All",$kat="All")
	{
		$kat=str_replace("-"," ",$kat);

		header('Content-Type: application/json');
		$response=[];

		if ($sto=='All')
		{
			if ($hero=='All')
			{
				if ($datel=="All")
				{
					if ($witel=="All")
					{
						$getStatus = $this->db->query("select distinct(det_kat) from dataado where kat='$kat'");
						$getOrder = $this->db->query("select * from dataado where det_kat='$kat'");
					}
					else
					{
						$getStatus = $this->db->query("select distinct(det_kat) from dataado where kat='$kat' and witel='$witel'");
						$getOrder = $this->db->query("select * from dataado where det_kat='$kat' and witel='$witel'");
					}
				}
				else
				{
					$getStatus = $this->db->query("select distinct(det_kat) from dataado where kat='$kat' and datel='$datel'");
					$getOrder = $this->db->query("select * from dataado where det_kat='$kat' and datel='$datel'");
				}
			}
			else
			{
				$getStatus = $this->db->query("select distinct(det_kat) from dataado where kat='$kat' and hero='$hero'");
				$getOrder = $this->db->query("select * from dataado where det_kat='$kat' and hero='$hero'");
			}
		}
		else
		{
			$getStatus = $this->db->query("select distinct(det_kat) from dataado where kat='$kat' and sto='$sto'");
			$getOrder = $this->db->query("select * from dataado where det_kat='$kat' and sto='$sto'");
		}

		if ($jenis == 'kategoriado') {
			foreach ($getStatus->result() as $row) {
				$data = null;
				$data['kat'] = $row->det_kat;
				$response[] = $data;
			}
			echo "var katado=" . json_encode($response, JSON_PRETTY_PRINT);
		}

		if ($jenis == 'order') {
			if ($type == 'point') {
				foreach ($getOrder->result() as $row) {
					$data = null;
					$data['type'] = "Feature";
					$data['properties'] = [
						"nama_cust" => $row->nama_cust,
						"alamat" => $row->alamat,
						"det_kat" => $row->det_kat,
						"icon" => base_url() . 'assets/assetsegbis/unggah/marker/2.png',
						"popUp" => "<table><tr valign='top'><td colspan='3'><b><h6>📌 Data Pelanggan</h6></b></td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td style='width:35%;'>Nama Pelanggan</td><td> : </td><td>" . $row->nama_cust . "</td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td>Alamat</td><td> : </td><td>" . $row->alamat . "</td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td>Kategori</td><td> : </td><td>" . $row->kat . "</td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td>Nama ODP</td><td> : </td><td>" . $row->odp . "</td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td>Kabupaten</td><td> : </td><td>" . $row->kab . "</td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td>Kecamatan</td><td> : </td><td>" . $row->kec . "</td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td>Desa/Kel</td><td> : </td><td>" . $row->kel . "</td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td>Datel</td><td> : </td><td>" . $row->datel . "</td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td>Hero</td><td> : </td><td>" . $row->hero . "</td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td>STO</td><td> : </td><td>" . $row->sto . "</td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td>ID LOP</td><td> : </td><td>" . $row->id_lop . "</td></tr><tr valign='top' style='border-bottom:1px solid #ccc;'><td>Kordinat</td><td> : </td><td>" . $row->lat.','.$row->lng. "</td></tr><tr><td colspan='3'><a href='" . site_url("getdata/edit/" . $row->id) . "' class='btn btn-success' target='_blank' style='color:white;font-size:10px;width:100%;'>edit</a></td></tr></table>"
					];
					$data['geometry'] = [
						"type" => "Point",
						"coordinates" => [$row->lng, $row->lat]
					];

					$response[] = $data;
				}
				echo json_encode($response, JSON_PRETTY_PRINT);
			}
		}
	}

	public function template($file='',$dataisi='')
	{
		$data['header']=$this->load->view('template/header.php',$dataisi,true);
		$data['sidebar']=$this->load->view('template/sidebar.php',$dataisi,true);
		$data['konten']=$this->load->view("page/$file.php",$dataisi,true);
		$this->load->view('template/template.php',$data);
	}

}
	