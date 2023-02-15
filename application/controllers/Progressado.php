<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progressado extends CI_Controller {

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
		// $this->load->model('Modhalaman');	

		$this->load->model('Modauth');
		if(!$this->Modauth->current_user()){
			redirect('auth/login');
		}
		// echo $this->modauth->current_user()->username;
    }

	public function witel()
	{
		$dataisi['teritory'] = "WITEL";
		$dataisi['kategori'] = "ALL";
		$this->template('progressadowitel',$dataisi);
	}

	public function updateprogresadoku()
	{
		$listdata = $this->db->query("select distinct(witel) as listdata from profilesto")->result();
		foreach ($listdata as $witelku):
			$dataisi['universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and witel='$witelku->listdata'")->row()->tot;
			$dataisi['apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and witel='$witelku->listdata'")->row()->tot;
			$this->db->where('teritory', $witelku->listdata);
       		$this->db->update('trendado', $dataisi);
		endforeach;
	}

	public function trend($teritory='Regional 7')
	{
		$dataisi['teritory'] = "WITEL";
		$dataisi['kategori'] = "ALL";


		$teritory = str_replace("%20", " ", $teritory);
		$dataisi['witel'] = $teritory;
		$dataisi['datel'] = 'All';
		$dataisi['hero'] = 'All';
		$dataisi['sto'] = 'All';
		$dataisi['kat'] = 'UNIVERSITAS';

		if ($teritory=='Regional 7')
		{
			$key = "";
			$key1 = "";
			$key2 = "";
		}
		else
		{
			$key = "where teritory='$teritory'";
			$key1 = "and witel='$teritory'";
			$key2 = "where witel='$teritory'";
		}

		$dataisi['opt_universitas'] = $this->db->query("select sum(universitas) as tot from optado $key2")->row()->tot;
		$dataisi['opt_industri_besar'] = $this->db->query("select sum(industri_besar) as tot from optado $key2")->row()->tot;
		$dataisi['opt_kawasan_industri'] = $this->db->query("select sum(kawasan_industri) as tot from optado $key2")->row()->tot;
		$dataisi['opt_kawasan_ekonomi_khusus'] = $this->db->query("select sum(kek) as tot from optado $key2")->row()->tot;
		$dataisi['opt_mall'] = $this->db->query("select sum(mall) as tot from optado $key2")->row()->tot;
		$dataisi['opt_bandara'] = $this->db->query("select sum(bandara) as tot from optado $key2")->row()->tot;
		$dataisi['opt_bumn'] = $this->db->query("select sum(bumn) as tot from optado $key2")->row()->tot;
		$dataisi['opt_industri_sedang'] = $this->db->query("select sum(industri_sedang) as tot from optado $key2")->row()->tot;
		$dataisi['opt_faskes'] = $this->db->query("select sum(faskes) as tot from optado $key2")->row()->tot;
		$dataisi['opt_hotel'] = $this->db->query("select sum(hotel) as tot from optado $key2")->row()->tot;
		$dataisi['opt_sekolah'] = $this->db->query("select sum(sekolah) as tot from optado $key2")->row()->tot;
		$dataisi['opt_govt_office'] = $this->db->query("select sum(govt_office) as tot from optado $key2")->row()->tot;
		$dataisi['opt_industri_kecil'] = $this->db->query("select sum(industri_kecil) as tot from optado $key2")->row()->tot;
		$dataisi['opt_restaurant'] = $this->db->query("select sum(restaurant) as tot from optado $key2")->row()->tot;
		$dataisi['opt_apartemen'] = $this->db->query("select sum(apartemen) as tot from optado $key2")->row()->tot;

		$dataisi['universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' $key1")->row()->tot;
		$dataisi['industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' $key1")->row()->tot;
		$dataisi['kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' $key1")->row()->tot;
		$dataisi['kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' $key1")->row()->tot;
		$dataisi['mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' $key1")->row()->tot;
		$dataisi['bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' $key1")->row()->tot;
		$dataisi['bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' $key1")->row()->tot;
		$dataisi['industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' $key1")->row()->tot;
		$dataisi['faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' $key1")->row()->tot;
		$dataisi['hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' $key1")->row()->tot;
		$dataisi['sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' $key1")->row()->tot;
		$dataisi['govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' $key1")->row()->tot;
		$dataisi['industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' $key1")->row()->tot;
		$dataisi['restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' $key1")->row()->tot;
		$dataisi['apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' $key1")->row()->tot;

		$dataisi['w1_universitas'] = $this->db->query("select sum(universitas) as tot from trendado $key")->row()->tot;
		$dataisi['w1_industri_besar'] = $this->db->query("select sum(industri_besar) as tot from trendado $key")->row()->tot;
		$dataisi['w1_kawasan_industri'] = $this->db->query("select sum(kawasan_industri) as tot from trendado $key")->row()->tot;
		$dataisi['w1_kawasan_ekonomi_khusus'] = $this->db->query("select sum(kawasan_ekonomi_khusus) as tot from trendado $key")->row()->tot;
		$dataisi['w1_mall'] = $this->db->query("select sum(mall) as tot from trendado $key")->row()->tot;
		$dataisi['w1_bandara'] = $this->db->query("select sum(bandara) as tot from trendado $key")->row()->tot;
		$dataisi['w1_bumn'] = $this->db->query("select sum(bumn) as tot from trendado $key")->row()->tot;
		$dataisi['w1_industri_sedang'] = $this->db->query("select sum(industri_sedang) as tot from trendado $key")->row()->tot;
		$dataisi['w1_faskes'] = $this->db->query("select sum(faskes) as tot from trendado $key")->row()->tot;
		$dataisi['w1_hotel'] = $this->db->query("select sum(hotel) as tot from trendado $key")->row()->tot;
		$dataisi['w1_sekolah'] = $this->db->query("select sum(sekolah) as tot from trendado $key")->row()->tot;
		$dataisi['w1_govt_office'] = $this->db->query("select sum(govt_office) as tot from trendado $key")->row()->tot;
		$dataisi['w1_industri_kecil'] = $this->db->query("select sum(industri_kecil) as tot from trendado $key")->row()->tot;
		$dataisi['w1_restaurant'] = $this->db->query("select sum(restaurant) as tot from trendado $key")->row()->tot;
		$dataisi['w1_apartemen'] = $this->db->query("select sum(apartemen) as tot from trendado $key")->row()->tot;

		if ($dataisi['w1_universitas']!=0)
			$dataisi['trend_universitas'] = (($dataisi['universitas']-$dataisi['w1_universitas'])/$dataisi['w1_universitas'])*100;
		else
			$dataisi['trend_universitas'] = (($dataisi['universitas']));
		
		if ($dataisi['w1_industri_besar']!=0)
			$dataisi['trend_industri_besar'] = (($dataisi['industri_besar']-$dataisi['w1_industri_besar'])/$dataisi['w1_industri_besar'])*100;
		else
			$dataisi['trend_industri_besar'] = (($dataisi['industri_besar']));
		
		if ($dataisi['w1_kawasan_industri']!=0)
			$dataisi['trend_kawasan_industri'] = (($dataisi['kawasan_industri']-$dataisi['w1_kawasan_industri'])/$dataisi['w1_kawasan_industri'])*100;
		else
			$dataisi['trend_kawasan_industri'] = (($dataisi['kawasan_industri']));
			
		if ($dataisi['w1_kawasan_ekonomi_khusus']!=0)	
			$dataisi['trend_kawasan_ekonomi_khusus'] = (($dataisi['kawasan_ekonomi_khusus']-$dataisi['w1_kawasan_ekonomi_khusus'])/$dataisi['w1_kawasan_ekonomi_khusus'])*100;
		else
			$dataisi['trend_kawasan_ekonomi_khusus'] = (($dataisi['kawasan_ekonomi_khusus']));

		if ($dataisi['w1_mall']!=0)
			$dataisi['trend_mall'] = (($dataisi['mall']-$dataisi['w1_mall'])/$dataisi['w1_mall'])*100;
		else
			$dataisi['trend_mall'] = (($dataisi['mall']));
			
		if ($dataisi['w1_bandara']!=0)
			$dataisi['trend_bandara'] = (($dataisi['bandara']-$dataisi['w1_bandara'])/$dataisi['w1_bandara'])*100;
		else
			$dataisi['trend_bandara'] = (($dataisi['bandara']));
			
		if ($dataisi['w1_bumn']!=0)
			$dataisi['trend_bumn'] = (($dataisi['bumn']-$dataisi['w1_bumn'])/$dataisi['w1_bumn'])*100;
		else
			$dataisi['trend_bumn'] = (($dataisi['bumn']));
			
		if ($dataisi['w1_industri_sedang']!=0)
			$dataisi['trend_industri_sedang'] = (($dataisi['industri_sedang']-$dataisi['w1_industri_sedang'])/$dataisi['w1_industri_sedang'])*100;
		else
			$dataisi['trend_industri_sedang'] = (($dataisi['industri_sedang']));
			
		if ($dataisi['w1_faskes']!=0)
			$dataisi['trend_faskes'] = (($dataisi['faskes']-$dataisi['w1_faskes'])/$dataisi['w1_faskes'])*100;
		else
			$dataisi['trend_faskes'] = (($dataisi['faskes']));
			
		if ($dataisi['w1_hotel']!=0)
			$dataisi['trend_hotel'] = (($dataisi['hotel']-$dataisi['w1_hotel'])/$dataisi['w1_hotel'])*100;
		else
			$dataisi['trend_hotel'] = (($dataisi['hotel']));
			
		if ($dataisi['w1_sekolah']!=0)
			$dataisi['trend_sekolah'] = (($dataisi['sekolah']-$dataisi['w1_sekolah'])/$dataisi['w1_sekolah'])*100;
		else
			$dataisi['trend_sekolah'] = (($dataisi['sekolah']));
			
		if ($dataisi['w1_govt_office']!=0)
			$dataisi['trend_govt_office'] = (($dataisi['govt_office']-$dataisi['w1_govt_office'])/$dataisi['w1_govt_office'])*100;
		else
			$dataisi['trend_govt_office'] = (($dataisi['govt_office']));
			
		if ($dataisi['w1_industri_kecil']!=0)
			$dataisi['trend_industri_kecil'] = (($dataisi['industri_kecil']-$dataisi['w1_industri_kecil'])/$dataisi['w1_industri_kecil'])*100;
		else
			$dataisi['trend_industri_kecil'] = (($dataisi['industri_kecil']));
			
		if ($dataisi['w1_restaurant']!=0)
			$dataisi['trend_restaurant'] = (($dataisi['restaurant']-$dataisi['w1_restaurant'])/$dataisi['w1_restaurant'])*100;
		else
			$dataisi['trend_restaurant'] = (($dataisi['restaurant']));
			
		if ($dataisi['w1_apartemen']!=0)
			$dataisi['trend_apartemen'] = (($dataisi['apartemen']-$dataisi['w1_apartemen'])/$dataisi['w1_apartemen'])*100;
		else
			$dataisi['trend_apartemen'] = (($dataisi['apartemen']));

		

		$this->template('trendadowitel',$dataisi);
	}

	public function witelsearch()
	{
		$dataisi['teritory'] = $this->input->post('teritory');
		$dataisi['kategori'] = $this->input->post('kat');
		$this->template('progressadowitel',$dataisi);
	}

	public function index()
	{
		$dataisi['witel'] = 'All';
		$dataisi['datel'] = 'All';
		$dataisi['hero'] = 'All';
		$dataisi['sto'] = 'All';
		$dataisi['kat'] = 'UNIVERSITAS';
		$dataisi['opt_universitas'] = $this->db->query("select sum(universitas) as tot from optado")->row()->tot;
		$dataisi['opt_industri_besar'] = $this->db->query("select sum(industri_besar) as tot from optado")->row()->tot;
		$dataisi['opt_kawasan_industri'] = $this->db->query("select sum(kawasan_industri) as tot from optado")->row()->tot;
		$dataisi['opt_kawasan_ekonomi_khusus'] = $this->db->query("select sum(kek) as tot from optado")->row()->tot;
		$dataisi['opt_mall'] = $this->db->query("select sum(mall) as tot from optado")->row()->tot;
		$dataisi['opt_bandara'] = $this->db->query("select sum(bandara) as tot from optado")->row()->tot;
		$dataisi['opt_bumn'] = $this->db->query("select sum(bumn) as tot from optado")->row()->tot;
		$dataisi['opt_industri_sedang'] = $this->db->query("select sum(industri_sedang) as tot from optado")->row()->tot;
		$dataisi['opt_faskes'] = $this->db->query("select sum(faskes) as tot from optado")->row()->tot;
		$dataisi['opt_hotel'] = $this->db->query("select sum(hotel) as tot from optado")->row()->tot;
		$dataisi['opt_sekolah'] = $this->db->query("select sum(sekolah) as tot from optado")->row()->tot;
		$dataisi['opt_govt_office'] = $this->db->query("select sum(govt_office) as tot from optado")->row()->tot;
		$dataisi['opt_industri_kecil'] = $this->db->query("select sum(industri_kecil) as tot from optado")->row()->tot;
		$dataisi['opt_restaurant'] = $this->db->query("select sum(restaurant) as tot from optado")->row()->tot;
		$dataisi['opt_apartemen'] = $this->db->query("select sum(apartemen) as tot from optado")->row()->tot;

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

		$dataisi['kord_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and (lat<>'' or lng<>'')")->row()->tot;
		$dataisi['kord_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and (lat<>'' or lng<>'')")->row()->tot;
		
		$dataisi['odpready_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and odp<>''")->row()->tot;
		$dataisi['odpready_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and odp<>''")->row()->tot;
		$dataisi['odpready_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and odp<>''")->row()->tot;
		$dataisi['odpready_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and odp<>''")->row()->tot;
		$dataisi['odpready_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and odp<>''")->row()->tot;
		$dataisi['odpready_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and odp<>''")->row()->tot;
		$dataisi['odpready_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and odp<>''")->row()->tot;
		$dataisi['odpready_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and odp<>''")->row()->tot;
		$dataisi['odpready_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and odp<>''")->row()->tot;
		$dataisi['odpready_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and odp<>''")->row()->tot;
		$dataisi['odpready_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and odp<>''")->row()->tot;
		$dataisi['odpready_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and odp<>''")->row()->tot;
		$dataisi['odpready_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and odp<>''")->row()->tot;
		$dataisi['odpready_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and odp<>''")->row()->tot;
		$dataisi['odpready_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and odp<>''")->row()->tot;

		$dataisi['lop_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		$dataisi['lop_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		
		$this->template('progressado',$dataisi);
		// $this->load->view("page/dashboardfix.php",$dataisi);
	}

	public function search()
	{
		$dataisi['witel'] = $this->input->post('witel');
		$dataisi['datel'] = $this->input->post('datel');
		$dataisi['hero'] = $this->input->post('hero');
		$dataisi['sto'] = $this->input->post('sto');

		$witel = $this->input->post('witel');
		$datel = $this->input->post('datel');
		$hero = $this->input->post('hero');
		$sto = $this->input->post('sto');

		if ($this->input->post('sto')=='All')
		{
			if ($this->input->post('hero')=='All')
			{
				if ($this->input->post('datel')=="All")
				{
					if ($this->input->post('witel')=="All")
					{
						$dataisi['opt_universitas'] = $this->db->query("select sum(universitas) as tot from optado")->row()->tot;
						$dataisi['opt_industri_besar'] = $this->db->query("select sum(industri_besar) as tot from optado")->row()->tot;
						$dataisi['opt_kawasan_industri'] = $this->db->query("select sum(kawasan_industri) as tot from optado")->row()->tot;
						$dataisi['opt_kawasan_ekonomi_khusus'] = $this->db->query("select sum(kek) as tot from optado")->row()->tot;
						$dataisi['opt_mall'] = $this->db->query("select sum(mall) as tot from optado")->row()->tot;
						$dataisi['opt_bandara'] = $this->db->query("select sum(bandara) as tot from optado")->row()->tot;
						$dataisi['opt_bumn'] = $this->db->query("select sum(bumn) as tot from optado")->row()->tot;
						$dataisi['opt_industri_sedang'] = $this->db->query("select sum(industri_sedang) as tot from optado")->row()->tot;
						$dataisi['opt_faskes'] = $this->db->query("select sum(faskes) as tot from optado")->row()->tot;
						$dataisi['opt_hotel'] = $this->db->query("select sum(hotel) as tot from optado")->row()->tot;
						$dataisi['opt_sekolah'] = $this->db->query("select sum(sekolah) as tot from optado")->row()->tot;
						$dataisi['opt_govt_office'] = $this->db->query("select sum(govt_office) as tot from optado")->row()->tot;
						$dataisi['opt_industri_kecil'] = $this->db->query("select sum(industri_kecil) as tot from optado")->row()->tot;
						$dataisi['opt_restaurant'] = $this->db->query("select sum(restaurant) as tot from optado")->row()->tot;
						$dataisi['opt_apartemen'] = $this->db->query("select sum(apartemen) as tot from optado")->row()->tot;
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
						$dataisi['kord_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['odpready_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and odp<>''")->row()->tot;
						$dataisi['odpready_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and odp<>''")->row()->tot;
						$dataisi['odpready_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and odp<>''")->row()->tot;
						$dataisi['odpready_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and odp<>''")->row()->tot;
						$dataisi['odpready_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and odp<>''")->row()->tot;
						$dataisi['odpready_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and odp<>''")->row()->tot;
						$dataisi['odpready_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and odp<>''")->row()->tot;
						$dataisi['odpready_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and odp<>''")->row()->tot;
						$dataisi['odpready_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and odp<>''")->row()->tot;
						$dataisi['odpready_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and odp<>''")->row()->tot;
						$dataisi['odpready_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and odp<>''")->row()->tot;
						$dataisi['odpready_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and odp<>''")->row()->tot;
						$dataisi['odpready_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and odp<>''")->row()->tot;
						$dataisi['odpready_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and odp<>''")->row()->tot;
						$dataisi['odpready_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and odp<>''")->row()->tot;
						$dataisi['lop_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					}
					else
					{
						$dataisi['opt_universitas'] = $this->db->query("select sum(universitas) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_industri_besar'] = $this->db->query("select sum(industri_besar) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_kawasan_industri'] = $this->db->query("select sum(kawasan_industri) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_kawasan_ekonomi_khusus'] = $this->db->query("select sum(kek) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_mall'] = $this->db->query("select sum(mall) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_bandara'] = $this->db->query("select sum(bandara) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_bumn'] = $this->db->query("select sum(bumn) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_industri_sedang'] = $this->db->query("select sum(industri_sedang) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_faskes'] = $this->db->query("select sum(faskes) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_hotel'] = $this->db->query("select sum(hotel) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_sekolah'] = $this->db->query("select sum(sekolah) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_govt_office'] = $this->db->query("select sum(govt_office) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_industri_kecil'] = $this->db->query("select sum(industri_kecil) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_restaurant'] = $this->db->query("select sum(restaurant) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['opt_apartemen'] = $this->db->query("select sum(apartemen) as tot from optado where witel='$witel'")->row()->tot;
						$dataisi['universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and witel='$witel'")->row()->tot;
						$dataisi['industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and witel='$witel'")->row()->tot;
						$dataisi['kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and witel='$witel'")->row()->tot;
						$dataisi['kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and witel='$witel'")->row()->tot;
						$dataisi['mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and witel='$witel'")->row()->tot;
						$dataisi['bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and witel='$witel'")->row()->tot;
						$dataisi['bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and witel='$witel'")->row()->tot;
						$dataisi['industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and witel='$witel'")->row()->tot;
						$dataisi['faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and witel='$witel'")->row()->tot;
						$dataisi['hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and witel='$witel'")->row()->tot;
						$dataisi['sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and witel='$witel'")->row()->tot;
						$dataisi['govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and witel='$witel'")->row()->tot;
						$dataisi['industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and witel='$witel'")->row()->tot;
						$dataisi['restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and witel='$witel'")->row()->tot;
						$dataisi['apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and witel='$witel'")->row()->tot;
						$dataisi['kord_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['kord_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and witel='$witel' and (lat<>'' or lng<>'')")->row()->tot;
						$dataisi['odpready_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['odpready_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and witel='$witel' and odp<>''")->row()->tot;
						$dataisi['lop_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
						$dataisi['lop_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and witel='$witel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					}
				}
				else
				{
					$dataisi['opt_universitas'] = $this->db->query("select sum(universitas) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_industri_besar'] = $this->db->query("select sum(industri_besar) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_kawasan_industri'] = $this->db->query("select sum(kawasan_industri) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_kawasan_ekonomi_khusus'] = $this->db->query("select sum(kek) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_mall'] = $this->db->query("select sum(mall) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_bandara'] = $this->db->query("select sum(bandara) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_bumn'] = $this->db->query("select sum(bumn) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_industri_sedang'] = $this->db->query("select sum(industri_sedang) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_faskes'] = $this->db->query("select sum(faskes) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_hotel'] = $this->db->query("select sum(hotel) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_sekolah'] = $this->db->query("select sum(sekolah) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_govt_office'] = $this->db->query("select sum(govt_office) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_industri_kecil'] = $this->db->query("select sum(industri_kecil) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_restaurant'] = $this->db->query("select sum(restaurant) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['opt_apartemen'] = $this->db->query("select sum(apartemen) as tot from optado where datel='$datel'")->row()->tot;
					$dataisi['universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and datel='$datel'")->row()->tot;
					$dataisi['industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and datel='$datel'")->row()->tot;
					$dataisi['kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and datel='$datel'")->row()->tot;
					$dataisi['kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and datel='$datel'")->row()->tot;
					$dataisi['mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and datel='$datel'")->row()->tot;
					$dataisi['bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and datel='$datel'")->row()->tot;
					$dataisi['bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and datel='$datel'")->row()->tot;
					$dataisi['industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and datel='$datel'")->row()->tot;
					$dataisi['faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and datel='$datel'")->row()->tot;
					$dataisi['hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and datel='$datel'")->row()->tot;
					$dataisi['sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and datel='$datel'")->row()->tot;
					$dataisi['govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and datel='$datel'")->row()->tot;
					$dataisi['industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and datel='$datel'")->row()->tot;
					$dataisi['restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and datel='$datel'")->row()->tot;
					$dataisi['apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and datel='$datel'")->row()->tot;
					$dataisi['kord_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['kord_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and datel='$datel' and (lat<>'' or lng<>'')")->row()->tot;
					$dataisi['odpready_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['odpready_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and datel='$datel' and odp<>''")->row()->tot;
					$dataisi['lop_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
					$dataisi['lop_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and datel='$datel' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				}
			}
			else
			{
				$dataisi['opt_universitas'] = $this->db->query("select sum(universitas) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_industri_besar'] = $this->db->query("select sum(industri_besar) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_kawasan_industri'] = $this->db->query("select sum(kawasan_industri) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_kawasan_ekonomi_khusus'] = $this->db->query("select sum(kek) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_mall'] = $this->db->query("select sum(mall) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_bandara'] = $this->db->query("select sum(bandara) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_bumn'] = $this->db->query("select sum(bumn) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_industri_sedang'] = $this->db->query("select sum(industri_sedang) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_faskes'] = $this->db->query("select sum(faskes) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_hotel'] = $this->db->query("select sum(hotel) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_sekolah'] = $this->db->query("select sum(sekolah) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_govt_office'] = $this->db->query("select sum(govt_office) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_industri_kecil'] = $this->db->query("select sum(industri_kecil) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_restaurant'] = $this->db->query("select sum(restaurant) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['opt_apartemen'] = $this->db->query("select sum(apartemen) as tot from optado where hero='$hero'")->row()->tot;
				$dataisi['universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and hero='$hero'")->row()->tot;
				$dataisi['industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and hero='$hero'")->row()->tot;
				$dataisi['kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and hero='$hero'")->row()->tot;
				$dataisi['kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and hero='$hero'")->row()->tot;
				$dataisi['mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and hero='$hero'")->row()->tot;
				$dataisi['bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and hero='$hero'")->row()->tot;
				$dataisi['bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and hero='$hero'")->row()->tot;
				$dataisi['industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and hero='$hero'")->row()->tot;
				$dataisi['faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and hero='$hero'")->row()->tot;
				$dataisi['hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and hero='$hero'")->row()->tot;
				$dataisi['sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and hero='$hero'")->row()->tot;
				$dataisi['govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and hero='$hero'")->row()->tot;
				$dataisi['industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and hero='$hero'")->row()->tot;
				$dataisi['restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and hero='$hero'")->row()->tot;
				$dataisi['apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and hero='$hero'")->row()->tot;
				$dataisi['kord_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['kord_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and hero='$hero' and (lat<>'' or lng<>'')")->row()->tot;
				$dataisi['odpready_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['odpready_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and hero='$hero' and odp<>''")->row()->tot;
				$dataisi['lop_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
				$dataisi['lop_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and hero='$hero' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			}
		}
		else
		{
			$dataisi['opt_universitas'] = $this->db->query("select sum(universitas) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_industri_besar'] = $this->db->query("select sum(industri_besar) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_kawasan_industri'] = $this->db->query("select sum(kawasan_industri) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_kawasan_ekonomi_khusus'] = $this->db->query("select sum(kek) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_mall'] = $this->db->query("select sum(mall) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_bandara'] = $this->db->query("select sum(bandara) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_bumn'] = $this->db->query("select sum(bumn) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_industri_sedang'] = $this->db->query("select sum(industri_sedang) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_faskes'] = $this->db->query("select sum(faskes) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_hotel'] = $this->db->query("select sum(hotel) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_sekolah'] = $this->db->query("select sum(sekolah) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_govt_office'] = $this->db->query("select sum(govt_office) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_industri_kecil'] = $this->db->query("select sum(industri_kecil) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_restaurant'] = $this->db->query("select sum(restaurant) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['opt_apartemen'] = $this->db->query("select sum(apartemen) as tot from optado where sto='$sto'")->row()->tot;
			$dataisi['universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and sto='$sto'")->row()->tot;
			$dataisi['industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and sto='$sto'")->row()->tot;
			$dataisi['kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and sto='$sto'")->row()->tot;
			$dataisi['kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and sto='$sto'")->row()->tot;
			$dataisi['mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and sto='$sto'")->row()->tot;
			$dataisi['bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and sto='$sto'")->row()->tot;
			$dataisi['bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and sto='$sto'")->row()->tot;
			$dataisi['industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and sto='$sto'")->row()->tot;
			$dataisi['faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and sto='$sto'")->row()->tot;
			$dataisi['hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and sto='$sto'")->row()->tot;
			$dataisi['sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and sto='$sto'")->row()->tot;
			$dataisi['govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and sto='$sto'")->row()->tot;
			$dataisi['industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and sto='$sto'")->row()->tot;
			$dataisi['restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and sto='$sto'")->row()->tot;
			$dataisi['apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and sto='$sto'")->row()->tot;
			$dataisi['kord_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['kord_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and sto='$sto' and (lat<>'' or lng<>'')")->row()->tot;
			$dataisi['odpready_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['odpready_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and sto='$sto' and odp<>''")->row()->tot;
			$dataisi['lop_universitas'] = $this->db->query("select count(*) as tot from dataado where kat='UNIVERSITAS' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_industri_besar'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI BESAR' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_kawasan_industri'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN INDUSTRI' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_kawasan_ekonomi_khusus'] = $this->db->query("select count(*) as tot from dataado where kat='KAWASAN EKONOMI KHUSUS' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_mall'] = $this->db->query("select count(*) as tot from dataado where kat='MALL' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_bandara'] = $this->db->query("select count(*) as tot from dataado where kat='BANDARA' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_bumn'] = $this->db->query("select count(*) as tot from dataado where kat='BUMN' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_industri_sedang'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI SEDANG' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_faskes'] = $this->db->query("select count(*) as tot from dataado where kat='FASKES' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_hotel'] = $this->db->query("select count(*) as tot from dataado where kat='HOTEL' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_sekolah'] = $this->db->query("select count(*) as tot from dataado where kat='SEKOLAH' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_govt_office'] = $this->db->query("select count(*) as tot from dataado where kat='GOVT OFFICE' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_industri_kecil'] = $this->db->query("select count(*) as tot from dataado where kat='INDUSTRI KECIL' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_restaurant'] = $this->db->query("select count(*) as tot from dataado where kat='RESTAURANT' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
			$dataisi['lop_apartemen'] = $this->db->query("select count(*) as tot from dataado where kat='APARTEMEN' and sto='$sto' and (id_lop<>'' and id_lop<>'-')")->row()->tot;
		}

		$this->template('progressado',$dataisi);
	}

	public function template($file='',$dataisi='')
	{
		$data['header']=$this->load->view('template/header.php',$dataisi,true);
		$data['sidebar']=$this->load->view('template/sidebar.php',$dataisi,true);
		$data['konten']=$this->load->view("page/$file.php",$dataisi,true);
		$this->load->view('template/template.php',$data);
	}

}
	