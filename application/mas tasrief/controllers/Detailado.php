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
		$this->load->model('Modadodashall');	
		$this->load->model('Modadodashkordleng');
		$this->load->model('Modadodashkordnotleng');
		$this->load->model('Modadodashodpready');
		$this->load->model('Modadodashadolop');
		$this->load->model('Modadolengkapkategori');
		$this->load->model('Modlog');
			
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 0); 
		// $this->load->model('Modhalaman');	

		$this->load->model('Modauth');
		if(!$this->Modauth->current_user()){
			redirect('auth/login');
		}
		// echo $this->modauth->current_user()->username;
    }

	public function updatetes()
	{
		// echo "";
		// $list = $this->db->query("select distinct lng from `dataado` where witel='Makassar'")->result();
		// echo "
		// <table>
		// ";
		// $no = 0;
		// foreach ($list as $row):
		// 	$lng = $row->lng;
		// 	$cekjml=$this->db->query("select count(*) as tot from dataado where lng='$lng'")->row()->tot;
		// 	if ($cekjml == 1)
		// 		continue;

		// 	if ($lng == '')
		// 		continue;

		// 	$no++;
		// 	echo "
		// 		<tr>
		// 		<td>$no</td>
		// 	";
		// 	echo "<td>".$lng."</td><td> :-></td><td>".$cekjml."<td>";
		// 	echo "
		// 	</tr>
		// 	";
		// 	$this->db->query("INSERT INTO `temp_kordinat`( `kordinat`, `jumlah`, `witel`) VALUES ('$lng','$cekjml','Makassar')");
		// endforeach;
		// echo "
		// </tr>
		// ";
		$list = $this->db->query("select * from `temp_kordinat`")->result();
		foreach ($list as $row):
			$this->db->query("update dataado set lat='',lng='' where lng='$row->kordinat' and kat<>'GOVT OFFICE'");
		endforeach;

	}

	public function index()
	{
		$key = $this->Modauth->current_user()->witel;
		if ($this->Modauth->current_user()->witel == 'Egbis TR7') {
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
			$dataisi['witel'] = 'All';
			$dataisi['datel'] = 'All';
			$dataisi['hero'] = 'All';
			$dataisi['sto'] = 'All';
			$dataisi['kat'] = 'UNIVERSITAS';
			$dataisi['listado'] = $this->db->query("select * from dataado")->result();
		} 
		else 
		{
			$dataisi['universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and witel='$key'")->row()->tot;
			$dataisi['industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and witel='$key'")->row()->tot;
			$dataisi['kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and witel='$key'")->row()->tot;
			$dataisi['kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and witel='$key'")->row()->tot;
			$dataisi['mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and witel='$key'")->row()->tot;
			$dataisi['bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and witel='$key'")->row()->tot;
			$dataisi['bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and witel='$key'")->row()->tot;
			$dataisi['industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and witel='$key'")->row()->tot;
			$dataisi['faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and witel='$key'")->row()->tot;
			$dataisi['hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and witel='$key'")->row()->tot;
			$dataisi['sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and witel='$key'")->row()->tot;
			$dataisi['govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and witel='$key'")->row()->tot;
			$dataisi['industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and witel='$key'")->row()->tot;
			$dataisi['restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and witel='$key'")->row()->tot;
			$dataisi['apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and witel='$key'")->row()->tot;
			$dataisi['witel'] = $key;
			$dataisi['datel'] = 'All';
			$dataisi['hero'] = 'All';
			$dataisi['sto'] = 'All';
			$dataisi['kat'] = 'UNIVERSITAS';
			$dataisi['listado'] = $this->db->query("select * from dataado")->result();
		}
		
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

	public function tambahado()
	{
		$dataisi['witel'] = 'Pilih Witel';
		$dataisi['datel'] = 'Pilih Datel';
		$dataisi['hero'] = 'Pilih Hero';
		$dataisi['sto'] = 'Pilih STO';
		$dataisi['kat'] = 'UNIVERSITAS';
		// $dataisi['detail'] = $this->db->query("select * from dataado where id='$id'")->row();
		$this->template('tambahado',$dataisi);
	}

	public function downloadfile()
	{
		$file_name = 'dataado_'.date('Ymd').'.xls'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$file_name"); 
		header("Content-type: application/vnd-ms-excel");
		

		// get data 
		$student_data = $this->db->query("select * from dataado")->result();

		// // file creation 
		// $file = fopen('php://output', 'w');
	
		// $header = array("id","witel","datel","hero","sto","am","segment","nipnas","revenue","nama_cust","alamat","kab","kec","kel","kat","det_kat","lat","lng","odp","jarak_alpro","pelanggan_telkom","lay_existing","lay_existing_1","lay_existing_2","kompetitor","prospek_lay","id_lop"); 
		// fputcsv($file, $header);
		// foreach ($student_data->result_array() as $key => $value)
		// { 
		// 	fputcsv($file, $value); 
		// }
		// fclose($file); 
		// exit; 
		echo "
		<table>
		<tr>
		<td>id</td><td>witel</td><td>datel</td><td>hero</td><td>sto</td><td>am</td><td>segment</td><td>nipnas</td><td>revenue</td><td>nama_cust</td><td>alamat</td><td>kab</td><td>kec</td><td>kel</td><td>kat</td><td>det_kat</td><td>lat</td><td>lng</td><td>odp</td><td>jarak_alpro</td><td>pelanggan_telkom</td><td>lay_existing</td><td>lay_existing_1</td><td>lay_existing_2</td><td>kompetitor</td><td>prospek_lay</td><td>id_lop</td>
		</tr>";
		$no = 0;
		foreach ($student_data as $rowstu) 
		{
			$no++;
			echo "
			<tr>
				<td>$no</td><td>$rowstu->witel</td><td>$rowstu->datel</td><td>$rowstu->hero</td><td>$rowstu->sto</td><td>$rowstu->am</td><td>$rowstu->segment</td><td>$rowstu->nipnas</td><td>$rowstu->revenue</td><td>$rowstu->nama_cust</td><td>$rowstu->alamat</td><td>$rowstu->kab</td><td>$rowstu->kec</td><td>$rowstu->kel</td><td>$rowstu->kat</td><td>$rowstu->det_kat</td><td>$rowstu->lat</td><td>$rowstu->lng</td><td>$rowstu->odp</td><td>$rowstu->jarak_alpro</td><td>$rowstu->pelanggan_telkom</td><td>$rowstu->lay_existing</td><td>$rowstu->lay_existing_1</td><td>$rowstu->lay_existing_2</td><td>$rowstu->kompetitor</td><td>$rowstu->prospek_lay</td><td>$rowstu->id_lop</td>
			</tr>
			";
			// fputcsv($file, $value); 
		}
		echo "
		</table>
		";

	}

	public function getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2) {
		$theta = $lon1 - $lon2;
		$miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
		$miles = acos($miles);
		$miles = rad2deg($miles);
		$miles = $miles * 60 * 1.1515;
		$feet  = $miles * 5280;
		$yards = $feet / 3;
		$kilometers = $miles * 1.609344;
		$meters = $kilometers * 1000;
		return compact('miles','feet','yards','kilometers','meters'); 
	}
	
	
	public function dd($str)
	{
		echo '<pre>';
		print_r($str);
		echo '</pre>';
		die();
	}

	public function aasort(&$arr, $col, $dir) {
		$sort_col = array();
		foreach ($arr as $key => $row) {
			$sort_col[$key] = $row[$col];
		}
		array_multisort($sort_col, $dir, $arr);
	}

	public function cekupdateku(){
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$witel= $this->input->post('witel');

		$no=0;
		$odp=$this->db->query("SELECT * FROM odp where witel='$witel'")->result();
		foreach ($odp as $listodp)
		{
			$lat1=$listodp->lat;
			$lng1=$listodp->lng;
			$point1 = array("lat" => $lat, "long" => $lng);
			$point2 = array("lat" => $lat1, "long" => $lng1);
			$distance = $this->getDistanceBetweenPoints($point1['lat'], $point1['long'], $point2['lat'], $point2['long']);
			$dataodp[$no]['namaodp']=$listodp->odp_name;
			$dataodp[$no]['jarak']=$distance['kilometers'];
			$no++;
		}


		$this->aasort($dataodp,"jarak",SORT_ASC);

		$cek=0;
		foreach ($dataodp as $rowhasil) : 
			if ($cek==0)
			{
				// echo "ID Desa /Kel :".$rowhasil['id_lokasi']."<br>";
				// echo "Nama Desa /Kel :".$rowhasil['nama_desa']."<br>";
				// echo "Nama Kecamatan :".$rowhasil['kecamatan']."<br>";
				// echo "Nama Kabupaten :".$rowhasil['kabupaten']."<br>";
				// echo "Jarak :".$rowhasil['jarak']."<br>"; 
				if ($rowhasil['jarak']<=0.25)
				{
					$nama_odp=$rowhasil['namaodp'];
					$jarak=$rowhasil['jarak'];
					// echo "Nama ODP : ".$namaodp."<br>";
					// echo "Jarak : ".$jarak."<br>";
					// mysqli_query($mysqli, "UPDATE `tbpotensicalang` set nama_odp='$namaodp',jarak='$jarak'  WHERE id_ado='$id_ado'");
				}
				else
				{
					$nama_odp='';
					$jarak=$rowhasil['jarak'];
					// echo "Jarak : ".$jarak."<br>";
					// mysqli_query($mysqli, "UPDATE `tbpotensicalang` set jarak='$jarak'  WHERE id_ado='$id_ado'");
				}
					break;
			}
			$cek++;
		endforeach;
		echo $nama_odp;
		echo "<br>" . $jarak;

	}

	public function updateado(){
		$dataisi['id'] = $this->input->post('id');
		$dataisi['nama_cust'] = $this->input->post('nama_cust');
		$dataisi['am'] = $this->input->post('am');
		$dataisi['kat'] = $this->input->post('kat');
		$dataisi['det_kat'] = $this->input->post('det_kat');
		$dataisi['lat'] = $this->input->post('lat');
		$dataisi['lng'] = $this->input->post('lng');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$witel= $this->input->post('witel');

		$no=0;
		$odp=$this->db->query("SELECT * FROM odp where witel='$witel'")->result();
		foreach ($odp as $listodp)
		{
			$lat1=$listodp->lat;
			$lng1=$listodp->lng;
			$point1 = array("lat" => $lat, "long" => $lng);
			$point2 = array("lat" => $lat1, "long" => $lng1);
			$distance = $this->getDistanceBetweenPoints($point1['lat'], $point1['long'], $point2['lat'], $point2['long']);
			$dataodp[$no]['namaodp']=$listodp->odp_name;
			$dataodp[$no]['jarak']=$distance['kilometers'];
			$no++;
		}


		$this->aasort($dataodp,"jarak",SORT_ASC);

		$cek=0;
		foreach ($dataodp as $rowhasil) : 
			if ($cek==0)
			{
				// echo "ID Desa /Kel :".$rowhasil['id_lokasi']."<br>";
				// echo "Nama Desa /Kel :".$rowhasil['nama_desa']."<br>";
				// echo "Nama Kecamatan :".$rowhasil['kecamatan']."<br>";
				// echo "Nama Kabupaten :".$rowhasil['kabupaten']."<br>";
				// echo "Jarak :".$rowhasil['jarak']."<br>"; 
				if ($rowhasil['jarak']<=0.25)
				{
					$nama_odp=$rowhasil['namaodp'];
					$jarak=$rowhasil['jarak'];
					// echo "Nama ODP : ".$namaodp."<br>";
					// echo "Jarak : ".$jarak."<br>";
					// mysqli_query($mysqli, "UPDATE `tbpotensicalang` set nama_odp='$namaodp',jarak='$jarak'  WHERE id_ado='$id_ado'");
				}
				else
				{
					$nama_odp='';
					$jarak=$rowhasil['jarak'];
					// echo "Jarak : ".$jarak."<br>";
					// mysqli_query($mysqli, "UPDATE `tbpotensicalang` set jarak='$jarak'  WHERE id_ado='$id_ado'");
				}
					break;
			}
			$cek++;
		endforeach; 


		$dataisi['alamat'] = $this->input->post('alamat');
		$dataisi['kab'] = $this->input->post('kab');
		$dataisi['kec'] = $this->input->post('kec');
		$dataisi['kel'] = $this->input->post('kel');
		$dataisi['witel'] = $this->input->post('witel');
		$dataisi['datel'] = $this->input->post('datel');
		$dataisi['hero'] = $this->input->post('hero');
		$dataisi['sto'] = $this->input->post('sto');

		$dataisi['odp'] = $nama_odp;
		$dataisi['jarak_alpro'] = $jarak;

		
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

		// ambil data lama
		$idado = $this->input->post('id');
		$old_data['detail'] = $this->db->query("select * from dataado where id='$idado'")->row();
		$this->Modadoku->update($dataisi,['id'=>$this->input->post('id')]);
		
		// savelog

		$array = json_decode(json_encode($old_data['detail']), true);
		$this->Modlog->save_log($this->Modauth->current_user()->id_user,$dataisi,$array,$this->input->post('id'),"MODIFY");
		// redirect("detailado/lihatado/".$this->input->post('id'));
	}

	public function simpanado(){
		// $dataisi['id'] = $this->input->post('id');
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

		// $this->Modadoku->update($dataisi,['id'=>$this->input->post('id')]);
		$this->db->insert('dataado', $dataisi);

		$nama_cust=$this->input->post('nama_cust');
		$alamat=$this->input->post('alamat');
		$kat = $this->input->post('kat');
		$witel = $this->input->post('witel');

		$id = $this->db->query("select * from dataado where nama_cust='$nama_cust' and alamat='$alamat' and kat='$kat' and witel='$witel'")->row()->id;

		// save log
		$this->Modlog->save_log_new_ado($this->Modauth->current_user()->id_user,$dataisi,$id,"INSERT");
		redirect("detailado/lihatado/".$id);
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
							<a href='".site_url('detailado/lihatado/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-list'></i> Lihat
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
			if ($field->jarak_alpro!='')
            	$row[] = "<center>".number_format($field->jarak_alpro,2)."</center>";
			else
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

	function get_data_ado_lengkap($witel='All',$datel='All',$hero='All',$sto='All',$kat='All')
    {
		$witel = str_replace("-", " ", $witel);
		$witel = str_replace("%20", " ", $witel);
		$datel = str_replace("-", " ", $datel);
		$datel = str_replace("%20", " ", $datel);
		$hero = str_replace("-", " ", $hero);
		$hero = str_replace("%20", " ", $hero);
		$sto = str_replace("-", " ", $sto);
		$sto = str_replace("%20", " ", $sto);
		$kat = str_replace("-", " ", $kat);
		$kat = str_replace("%20", " ", $kat);
        $list = $this->Modadolengkapkategori->get_datatables($witel,$datel,$hero,$sto,$kat);
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
            $row[] = "".$field->nama_cust."";
            $row[] = "".$field->alamat."";
            $row[] = "<center>".$field->kat."</center>";
            $row[] = "<center>".$field->det_kat."</center>";
            $row[] = "<center>".$field->odp."</center>";
            if ($field->jarak_alpro!='')
            	$row[] = "<center>".number_format($field->jarak_alpro,2)."</center>";
			else
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
            "recordsTotal" => $this->Modadolengkapkategori->count_all($witel,$datel,$hero,$sto,$kat),
            "recordsFiltered" => $this->Modadolengkapkategori->count_filtered($witel,$datel,$hero,$sto,$kat),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	function get_data_ado_dashboard_allado($kat='UNIVERSITAS',$witel='All',$datel='All',$hero='All',$sto='All')
    {
		$witel = str_replace("%20", " ", $witel);
		$datel = str_replace("%20", " ", $datel);
		$hero = str_replace("%20", " ", $hero);
		$sto = str_replace("%20", " ", $sto);
		$kat = str_replace("%20", " ", $kat);
        $list = $this->Modadodashall->get_datatables($kat,$witel,$datel,$hero,$sto);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
			$idku=$field->id;
            $row = array();
            $row[] = $no;
            $row[] = "<center>".$field->am."</center>";
            $row[] = "<center>".$field->witel."</center>";
            $row[] = "".$field->nama_cust."";
            $row[] = "".$field->alamat."";
            $row[] = "<center>".$field->det_kat."</center>";
            $row[] = "<center>".$field->odp."</center>";
			$row[] = "
					<center>
						<div class='btn-group'>
							<a href='".site_url('detailado/edit/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-edit'></i> Edit
							</a>
							<a href='".site_url('detailado/lihatado/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-list'></i> detail
							</a>
						</div>
					</center>
					";
            
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Modadodashall->count_all($kat,$witel,$datel,$hero,$sto),
            "recordsFiltered" => $this->Modadodashall->count_filtered($kat,$witel,$datel,$hero,$sto),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	function get_data_ado_dashboard_kordlengado($kat='UNIVERSITAS',$witel='All',$datel='All',$hero='All',$sto='All')
    {
		$witel = str_replace("%20", " ", $witel);
		$datel = str_replace("%20", " ", $datel);
		$hero = str_replace("%20", " ", $hero);
		$sto = str_replace("%20", " ", $sto);
		$kat = str_replace("%20", " ", $kat);
        $list = $this->Modadodashkordleng->get_datatables($kat,$witel,$datel,$hero,$sto);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
			$idku=$field->id;
            $row = array();
            $row[] = $no;
            $row[] = "<center>".$field->am."</center>";
            $row[] = "<center>".$field->witel."</center>";
            $row[] = "".$field->nama_cust."";
            $row[] = "".$field->alamat."";
            $row[] = "<center>".$field->det_kat."</center>";
            $row[] = "<center>".$field->odp."</center>";
            if ($field->jarak_alpro!='')
            	$row[] = "<center>".number_format($field->jarak_alpro,2)."</center>";
			else
				$row[] = "<center>".$field->jarak_alpro."</center>";
            $row[] = "<center>".$field->lat.','.$field->lng."</center>";
			$row[] = "
					<center>
						<div class='btn-group'>
							<a href='".site_url('detailado/edit/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-edit'></i> Edit
							</a>
							<a href='".site_url('detailado/lihatado/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-list'></i> detail
							</a>
						</div>
					</center>
					";
            
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Modadodashkordleng->count_all($kat,$witel,$datel,$hero,$sto),
            "recordsFiltered" => $this->Modadodashkordleng->count_filtered($kat,$witel,$datel,$hero,$sto),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	function get_data_ado_dashboard_kordnotlengado($kat='UNIVERSITAS',$witel='All',$datel='All',$hero='All',$sto='All')
    {
		$witel = str_replace("%20", " ", $witel);
		$datel = str_replace("%20", " ", $datel);
		$hero = str_replace("%20", " ", $hero);
		$sto = str_replace("%20", " ", $sto);
		$kat = str_replace("%20", " ", $kat);
        $list = $this->Modadodashkordnotleng->get_datatables($kat,$witel,$datel,$hero,$sto);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
			$idku=$field->id;
            $row = array();
            $row[] = $no;
            $row[] = "<center>".$field->am."</center>";
            $row[] = "<center>".$field->witel."</center>";
            $row[] = "".$field->nama_cust."";
            $row[] = "".$field->alamat."";
            $row[] = "<center>".$field->det_kat."</center>";
            $row[] = "<center>".$field->odp."</center>";
			$row[] = "
					<center>
						<div class='btn-group'>
							<a href='".site_url('detailado/edit/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-edit'></i> Edit
							</a>
							<a href='".site_url('detailado/lihatado/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-list'></i> detail
							</a>
						</div>
					</center>
					";
            
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Modadodashkordnotleng->count_all($kat,$witel,$datel,$hero,$sto),
            "recordsFiltered" => $this->Modadodashkordnotleng->count_filtered($kat,$witel,$datel,$hero,$sto),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	function get_data_ado_dashboard_odpready($kat='UNIVERSITAS',$witel='All',$datel='All',$hero='All',$sto='All')
    {
		$witel = str_replace("%20", " ", $witel);
		$datel = str_replace("%20", " ", $datel);
		$hero = str_replace("%20", " ", $hero);
		$sto = str_replace("%20", " ", $sto);
		$kat = str_replace("%20", " ", $kat);
        $list = $this->Modadodashodpready->get_datatables($kat,$witel,$datel,$hero,$sto);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
			$idku=$field->id;
            $row = array();
            $row[] = $no;
            $row[] = "<center>".$field->am."</center>";
            $row[] = "<center>".$field->witel."</center>";
            $row[] = "".$field->nama_cust."";
            $row[] = "".$field->alamat."";
            $row[] = "<center>".$field->det_kat."</center>";
            $row[] = "<center>".$field->odp."</center>";
            $row[] = "<center>".$field->lay_existing."</center>";
			$row[] = "
					<center>
						<div class='btn-group'>
							<a href='".site_url('detailado/edit/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-edit'></i> Edit
							</a>
							<a href='".site_url('detailado/lihatado/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-list'></i> detail
							</a>
						</div>
					</center>
					";
            
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Modadodashodpready->count_all($kat,$witel,$datel,$hero,$sto),
            "recordsFiltered" => $this->Modadodashodpready->count_filtered($kat,$witel,$datel,$hero,$sto),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	function get_data_ado_dashboard_adolop($kat='UNIVERSITAS',$witel='All',$datel='All',$hero='All',$sto='All')
    {
		$witel = str_replace("%20", " ", $witel);
		$datel = str_replace("%20", " ", $datel);
		$hero = str_replace("%20", " ", $hero);
		$sto = str_replace("%20", " ", $sto);
		$kat = str_replace("%20", " ", $kat);
        $list = $this->Modadodashadolop->get_datatables($kat,$witel,$datel,$hero,$sto);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
			$idku=$field->id;
            $row = array();
            $row[] = $no;
            $row[] = "<center>".$field->am."</center>";
            $row[] = "<center>".$field->witel."</center>";
            $row[] = "".$field->nama_cust."";
            $row[] = "".$field->alamat."";
            $row[] = "<center>".$field->det_kat."</center>";
            $row[] = "<center>".$field->odp."</center>";
            $row[] = "<center>".$field->id_lop."</center>";
			$row[] = "
					<center>
						<div class='btn-group'>
							<a href='".site_url('detailado/edit/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-edit'></i> Edit
							</a>
							<a href='".site_url('detailado/lihatado/'.$idku)."' id='btn-detail' target='_blank' class='btn btn-sm'>
								<i class='fas fa-list'></i> detail
							</a>
						</div>
					</center>
					";
            
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Modadodashadolop->count_all($kat,$witel,$datel,$hero,$sto),
            "recordsFiltered" => $this->Modadodashadolop->count_filtered($kat,$witel,$datel,$hero,$sto),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	public function get_data_ado_detail($teritory="witel",$key="SULTENG"){
		// $witel=$this->input->post('witel');

		$key = str_replace("-", " ", $key);
		$key = str_replace("%20", " ", $key);
		if (($teritory=='witel') and ($teritory=='All')) 
		{
			$dataisi['universitas'] = number_format($this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS'")->row()->tot);
			$dataisi['industri_besar'] = number_format($this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR'")->row()->tot);
			$dataisi['kawasan_industri'] = number_format($this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI'")->row()->tot);
			$dataisi['kawasan_ekonomi_khusus'] = number_format($this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS'")->row()->tot);
			$dataisi['mall'] = number_format($this->db->query("select count(*) as tot from dataado where kat='MALL'")->row()->tot);
			$dataisi['bandara'] = number_format($this->db->query("select count(*) as tot from dataado where kat='BANDARA'")->row()->tot);
			$dataisi['bumn'] = number_format($this->db->query("select count(*) as tot from dataado where kat='BUMN'")->row()->tot);
			$dataisi['industri_sedang'] = number_format($this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG'")->row()->tot);
			$dataisi['faskes'] = number_format($this->db->query("select count(*) as tot from dataado where kat='FASKES'")->row()->tot);
			$dataisi['hotel'] = number_format($this->db->query("select count(*) as tot from dataado where kat='HOTEL'")->row()->tot);
			$dataisi['sekolah'] = number_format($this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' ")->row()->tot);
			$dataisi['govt_office'] = number_format($this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE'")->row()->tot);
			$dataisi['industri_kecil'] = number_format($this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL'")->row()->tot);
			$dataisi['restaurant'] = number_format($this->db->query("select count(*) as tot from dataado where kat='RESTAURANT'")->row()->tot);
			$dataisi['apartemen'] = number_format($this->db->query("select count(*) as tot from dataado where kat='APARTEMEN'")->row()->tot);
		} else {
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
		}
		echo json_encode($dataisi);
	}

	public function list($witel="All",$datel="All",$hero="All",$sto="All",$kat="")
	{
		$kat = str_replace("-"," ",$kat);
		$kat = str_replace("%20"," ",$kat);
		$witel = str_replace("%20"," ",$witel);
		$witel = str_replace("-"," ",$witel);
		$datel = str_replace("%20"," ",$datel);
		$datel = str_replace("-"," ",$datel);
		$hero = str_replace("%20"," ",$hero);
		$hero = str_replace("-"," ",$hero);
		$sto = str_replace("%20"," ",$sto);
		$sto = str_replace("-"," ",$sto);
		$dataisi['witel'] = $witel;
		$dataisi['datel'] = $datel;
		$dataisi['hero'] = $hero;
		$dataisi['sto'] = $sto;
		$dataisi['kat'] = $kat;

		// echo "ok";
		$this->template('detailado',$dataisi);
	}

	public function list1($witel="All",$datel="All",$hero="All",$sto="All",$kat="")
	{
		$kat = str_replace("-"," ",$kat);
		$kat = str_replace("%20"," ",$kat);
		$witel = str_replace("%20"," ",$witel);
		$witel = str_replace("-"," ",$witel);
		$datel = str_replace("%20"," ",$datel);
		$datel = str_replace("-"," ",$datel);
		$hero = str_replace("%20"," ",$hero);
		$hero = str_replace("-"," ",$hero);
		$sto = str_replace("%20"," ",$sto);
		$sto = str_replace("-"," ",$sto);
		$dataisi['witel'] = $witel;
		$dataisi['datel'] = $datel;
		$dataisi['hero'] = $hero;
		$dataisi['sto'] = $sto;
		$dataisi['kat'] = $kat;

		// echo "ok";
		$this->template('detailado1',$dataisi);
	}

	public function katado($jenis='kategoriado',$type='point',$witel="All",$datel="All",$hero="All",$sto="All",$kat="All")
	{
		$kat = str_replace("-"," ",$kat);
		$kat = str_replace("%20"," ",$kat);
		$witel = str_replace("%20"," ",$witel);
		$witel = str_replace("-"," ",$witel);
		$datel = str_replace("%20"," ",$datel);
		$datel = str_replace("-"," ",$datel);
		$hero = str_replace("%20"," ",$hero);
		$hero = str_replace("-"," ",$hero);
		$sto = str_replace("%20"," ",$sto);
		$sto = str_replace("-"," ",$sto);

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
						$getOrder = $this->db->query("select * from dataado where det_kat='$kat' and (lat<>'' or lng<>'')");
					}
					else
					{
						$getStatus = $this->db->query("select distinct(det_kat) from dataado where kat='$kat' and witel='$witel'");
						$getOrder = $this->db->query("select * from dataado where det_kat='$kat' and witel='$witel' and (lat<>'' or lng<>'')");
					}
				}
				else
				{
					$getStatus = $this->db->query("select distinct(det_kat) from dataado where kat='$kat' and datel='$datel'");
					$getOrder = $this->db->query("select * from dataado where det_kat='$kat' and datel='$datel' and (lat<>'' or lng<>'')");
				}
			}
			else
			{
				$getStatus = $this->db->query("select distinct(det_kat) from dataado where kat='$kat' and hero='$hero'");
				$getOrder = $this->db->query("select * from dataado where det_kat='$kat' and hero='$hero' and (lat<>'' or lng<>'')");
			}
		}
		else
		{
			$getStatus = $this->db->query("select distinct(det_kat) from dataado where kat='$kat' and sto='$sto'");
			$getOrder = $this->db->query("select * from dataado where det_kat='$kat' and sto='$sto' and (lat<>'' or lng<>'')");
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
	