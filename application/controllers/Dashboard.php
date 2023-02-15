<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

	public function index()
	{
		// $dataisi = '';
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

			$dataisi['organik_mgr'] = $this->db->query("select sum(organik_mgr) as total from workforce")->row()->total;
			$dataisi['organik_asman'] = $this->db->query("select sum(organik_asman) as total from workforce")->row()->total;
			$dataisi['organik_officer'] = $this->db->query("select sum(organik_officer) as total from workforce")->row()->total;
			$dataisi['organik_am'] = $this->db->query("select sum(organik_am) as total from workforce")->row()->total;
			$dataisi['non_organik_mgr'] = $this->db->query("select sum(non_organik_mgr) as total from workforce")->row()->total;
			$dataisi['non_organik_asman'] = $this->db->query("select sum(non_organik_asman) as total from workforce")->row()->total;
			$dataisi['non_organik_officer'] = $this->db->query("select sum(non_organik_officer) as total from workforce")->row()->total;
			$dataisi['non_organik_am'] = $this->db->query("select sum(non_organik_am) as total from workforce")->row()->total;

			$dataisi['cap'] = $this->db->query("select sum(is_total) as total from odp")->row()->total;
			$dataisi['used'] = $this->db->query("select sum(used) as total from odp")->row()->total;
			$dataisi['avai'] = $this->db->query("select sum(avai) as total from odp")->row()->total;
			$dataisi['occ'] = number_format(($dataisi['used'] / $dataisi['cap']) * 100);

			$dataisi['hsi'] = $this->db->query("select sum(lis_hsi) as total from profilesto")->row()->total;
			$dataisi['pots'] = $this->db->query("select sum(lis_pots) as total from profilesto")->row()->total;
			$dataisi['datin'] = $this->db->query("select sum(lis_datin) as total from profilesto")->row()->total;
			$dataisi['wifi'] = $this->db->query("select sum(lis_wifi) as total from profilesto")->row()->total;
			$dataisi['luas_wil'] = $this->db->query("select sum(luas_wil) as total from profilesto")->row()->total;

			$dataisi['des'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DES'")->row()->total;
			$dataisi['dbs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DBS'")->row()->total;
			$dataisi['dgs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DGS'")->row()->total;

			$dataisi['witel'] = 'All';
			$dataisi['datel'] = 'All';
			$dataisi['hero'] = 'All';
			$dataisi['sto'] = 'All';
			$dataisi['kat'] = 'UNIVERSITAS';
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

			$dataisi['organik_mgr'] = $this->db->query("select sum(organik_mgr) as total from workforce where witel='$key'")->row()->total;
			$dataisi['organik_asman'] = $this->db->query("select sum(organik_asman) as total from workforce where witel='$key'")->row()->total;
			$dataisi['organik_officer'] = $this->db->query("select sum(organik_officer) as total from workforce where witel='$key'")->row()->total;
			$dataisi['organik_am'] = $this->db->query("select sum(organik_am) as total from workforce where witel='$key'")->row()->total;
			$dataisi['non_organik_mgr'] = $this->db->query("select sum(non_organik_mgr) as total from workforce where witel='$key'")->row()->total;
			$dataisi['non_organik_asman'] = $this->db->query("select sum(non_organik_asman) as total from workforce where witel='$key'")->row()->total;
			$dataisi['non_organik_officer'] = $this->db->query("select sum(non_organik_officer) as total from workforce where witel='$key'")->row()->total;
			$dataisi['non_organik_am'] = $this->db->query("select sum(non_organik_am) as total from workforce where witel='$key'")->row()->total;

			$dataisi['cap'] = $this->db->query("select sum(is_total) as total from odp where witel='$key'")->row()->total;
			$dataisi['used'] = $this->db->query("select sum(used) as total from odp where witel='$key'")->row()->total;
			$dataisi['avai'] = $this->db->query("select sum(avai) as total from odp where witel='$key'")->row()->total;
			$dataisi['occ'] = number_format(($dataisi['used'] / $dataisi['cap']) * 100);

			$dataisi['hsi'] = $this->db->query("select sum(lis_hsi) as total from profilesto where witel='$key'")->row()->total;
			$dataisi['pots'] = $this->db->query("select sum(lis_pots) as total from profilesto where witel='$key'")->row()->total;
			$dataisi['datin'] = $this->db->query("select sum(lis_datin) as total from profilesto where witel='$key'")->row()->total;
			$dataisi['wifi'] = $this->db->query("select sum(lis_wifi) as total from profilesto where witel='$key'")->row()->total;
			$dataisi['luas_wil'] = $this->db->query("select sum(luas_wil) as total from profilesto where witel='$key'")->row()->total;

			$dataisi['des'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DES' and witel='$key'")->row()->total;
			$dataisi['dbs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DBS' and witel='$key'")->row()->total;
			$dataisi['dgs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DGS' and witel='$key'")->row()->total;

			$gbr = $key;

			$dataisi['gbr'] = strtoupper($key).".png";
			$dataisi['witel'] = $key;
			$dataisi['datel'] = 'All';
			$dataisi['hero'] = 'All';
			$dataisi['sto'] = 'All';
			$dataisi['kat'] = 'UNIVERSITAS';
		}

		$this->template('dashboard',$dataisi);
		// $this->load->view("page/dashboardfix.php",$dataisi);
	}

	public function search()
	{
		$gbr = $this->input->post('witel');

		$dataisi['gbr'] = $gbr.".png";
		$dataisi['witel'] = $this->input->post('witel');
		$dataisi['datel'] = $this->input->post('datel');
		$dataisi['hero'] = $this->input->post('hero');
		$dataisi['sto'] = $this->input->post('sto');
		$dataisi['kat'] = 'UNIVERSITAS';

		$witelku=$this->input->post('witel');

		$dataisi['organik_mgr'] = $this->db->query("select sum(organik_mgr) as total from workforce where witel='$witelku'")->row()->total;
		$dataisi['organik_asman'] = $this->db->query("select sum(organik_asman) as total from workforce where witel='$witelku'")->row()->total;
		$dataisi['organik_officer'] = $this->db->query("select sum(organik_officer) as total from workforce where witel='$witelku'")->row()->total;
		$dataisi['organik_am'] = $this->db->query("select sum(organik_am) as total from workforce where witel='$witelku'")->row()->total;
		$dataisi['non_organik_mgr'] = $this->db->query("select sum(non_organik_mgr) as total from workforce where witel='$witelku'")->row()->total;
		$dataisi['non_organik_asman'] = $this->db->query("select sum(non_organik_asman) as total from workforce where witel='$witelku'")->row()->total;
		$dataisi['non_organik_officer'] = $this->db->query("select sum(non_organik_officer) as total from workforce where witel='$witelku'")->row()->total;
		$dataisi['non_organik_am'] = $this->db->query("select sum(non_organik_am) as total from workforce where witel='$witelku'")->row()->total;

		$witel = $this->input->post('witel');
		$datel = $this->input->post('datel');
		$hero = $this->input->post('hero');
		$sto = $this->input->post('sto');

		if ($this->input->post('sto')=='All')
		{
			if ($this->input->post('hero') == 'All') 
			{
				if ($this->input->post('datel') == 'All')
				{
					if ($this->input->post('witel') == '') 
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
						
						$dataisi['cap'] = $this->db->query("select sum(is_total) as total from odp")->row()->total;
						$dataisi['used'] = $this->db->query("select sum(used) as total from odp")->row()->total;
						$dataisi['avai'] = $this->db->query("select sum(avai) as total from odp")->row()->total;
						$dataisi['occ'] = number_format(($dataisi['used']/$dataisi['cap'])*100);
						
						$dataisi['hsi'] = $this->db->query("select sum(lis_hsi) as total from profilesto")->row()->total;
						$dataisi['pots'] = $this->db->query("select sum(lis_pots) as total from profilesto")->row()->total;
						$dataisi['datin'] = $this->db->query("select sum(lis_datin) as total from profilesto")->row()->total;
						$dataisi['wifi'] = $this->db->query("select sum(lis_wifi) as total from profilesto")->row()->total;
						$dataisi['luas_wil'] = $this->db->query("select sum(luas_wil) as total from profilesto")->row()->total;
						
						$dataisi['des'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DES'")->row()->total;
						$dataisi['dbs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DBS'")->row()->total;
						$dataisi['dgs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DGS'")->row()->total;
					}
					else
					{
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
						
						$dataisi['cap'] = $this->db->query("select sum(is_total) as total from odp where witel='$witel'")->row()->total;
						$dataisi['used'] = $this->db->query("select sum(used) as total from odp where witel='$witel'")->row()->total;
						$dataisi['avai'] = $this->db->query("select sum(avai) as total from odp where witel='$witel'")->row()->total;
						$dataisi['occ'] = number_format(($dataisi['used']/$dataisi['cap'])*100);
						
						$dataisi['hsi'] = $this->db->query("select sum(lis_hsi) as total from profilesto where witel='$witel'")->row()->total;
						$dataisi['pots'] = $this->db->query("select sum(lis_pots) as total from profilesto where witel='$witel'")->row()->total;
						$dataisi['datin'] = $this->db->query("select sum(lis_datin) as total from profilesto where witel='$witel'")->row()->total;
						$dataisi['wifi'] = $this->db->query("select sum(lis_wifi) as total from profilesto where witel='$witel'")->row()->total;
						$dataisi['luas_wil'] = $this->db->query("select sum(luas_wil) as total from profilesto where witel='$witel'")->row()->total;
						
						$dataisi['des'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DES' and witel='$witel'")->row()->total;
						$dataisi['dbs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DBS' and witel='$witel'")->row()->total;
						$dataisi['dgs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DGS' and witel='$witel'")->row()->total;
					}
				}
				else
				{
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

					$dataisi['cap'] = $this->db->query("select sum(is_total) as total from odp where datel='$datel'")->row()->total;
					$dataisi['used'] = $this->db->query("select sum(used) as total from odp where datel='$datel'")->row()->total;
					$dataisi['avai'] = $this->db->query("select sum(avai) as total from odp where datel='$datel'")->row()->total;
					$dataisi['occ'] = number_format(($dataisi['used']/$dataisi['cap'])*100);
					
					$dataisi['hsi'] = $this->db->query("select sum(lis_hsi) as total from profilesto where datel='$datel'")->row()->total;
					$dataisi['pots'] = $this->db->query("select sum(lis_pots) as total from profilesto where datel='$datel'")->row()->total;
					$dataisi['datin'] = $this->db->query("select sum(lis_datin) as total from profilesto where datel='$datel'")->row()->total;
					$dataisi['wifi'] = $this->db->query("select sum(lis_wifi) as total from profilesto where datel='$datel'")->row()->total;
					$dataisi['luas_wil'] = $this->db->query("select sum(luas_wil) as total from profilesto where datel='$datel'")->row()->total;
					
					$dataisi['des'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DES' and datel='$datel'")->row()->total;
					$dataisi['dbs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DBS' and datel='$datel'")->row()->total;
					$dataisi['dgs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DGS' and datel='$datel'")->row()->total;
				}
			}
			else
			{
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

				$dataisi['cap'] = $this->db->query("select sum(is_total) as total from odp where hero='$hero'")->row()->total;
				$dataisi['used'] = $this->db->query("select sum(used) as total from odp where hero='$hero'")->row()->total;
				$dataisi['avai'] = $this->db->query("select sum(avai) as total from odp where hero='$hero'")->row()->total;
				$dataisi['occ'] = number_format(($dataisi['used']/$dataisi['cap'])*100);

				$dataisi['hsi'] = $this->db->query("select sum(lis_hsi) as total from profilesto where hero='$hero'")->row()->total;
				$dataisi['pots'] = $this->db->query("select sum(lis_pots) as total from profilesto where hero='$hero'")->row()->total;
				$dataisi['datin'] = $this->db->query("select sum(lis_datin) as total from profilesto where hero='$hero'")->row()->total;
				$dataisi['wifi'] = $this->db->query("select sum(lis_wifi) as total from profilesto where hero='$hero'")->row()->total;
				$dataisi['luas_wil'] = $this->db->query("select sum(luas_wil) as total from profilesto where hero='$hero'")->row()->total;
				
				$dataisi['des'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DES' and hero='$hero'")->row()->total;
				$dataisi['dbs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DBS' and hero='$hero'")->row()->total;
				$dataisi['dgs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DGS' and hero='$hero'")->row()->total;
			}
		}
		else
		{
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
			
			$dataisi['cap'] = $this->db->query("select sum(is_total) as total from odp where sto='$sto'")->row()->total;
			$dataisi['used'] = $this->db->query("select sum(used) as total from odp where sto='$sto'")->row()->total;
			$dataisi['avai'] = $this->db->query("select sum(avai) as total from odp where sto='$sto'")->row()->total;
			
			$dataisi['hsi'] = $this->db->query("select sum(lis_hsi) as total from profilesto where sto='$sto'")->row()->total;
			$dataisi['pots'] = $this->db->query("select sum(lis_pots) as total from profilesto where sto='$sto'")->row()->total;
			$dataisi['datin'] = $this->db->query("select sum(lis_datin) as total from profilesto where sto='$sto'")->row()->total;
			$dataisi['wifi'] = $this->db->query("select sum(lis_wifi) as total from profilesto where sto='$sto'")->row()->total;
			$dataisi['luas_wil'] = $this->db->query("select sum(luas_wil) as total from profilesto where sto='$sto'")->row()->total;

			$dataisi['des'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DES' and sto='$sto'")->row()->total;
			$dataisi['dbs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DBS' and sto='$sto'")->row()->total;
			$dataisi['dgs'] = $this->db->query("select sum(revenue) as total from revenue where divisi='DGS' and sto='$sto'")->row()->total;
		}

		$this->template('dashboard',$dataisi);
		// $this->load->view("page/dashboardfix.php",$dataisi);
	}

	public function datel(){
		$witel=$this->input->post('witel');
        $data=$this->db->query("SELECT DISTINCT datel FROM `teritory` where witel='$witel'")->result();
        echo json_encode($data);
	}

	public function hero(){
		$datel=$this->input->post('datel');
        $data=$this->db->query("SELECT DISTINCT hero FROM `teritory` where datel='$datel' and hero!='-'")->result();
        echo json_encode($data);
	}

	public function stodatel(){
		$datel=$this->input->post('datel');
        $data=$this->db->query("SELECT DISTINCT sto FROM `teritory` where datel='$datel'")->result();
        echo json_encode($data);
	}

	public function stohero(){
		$hero=$this->input->post('hero');
        $data=$this->db->query("SELECT DISTINCT sto FROM `teritory` where hero='$hero'")->result();
        echo json_encode($data);
	}


	public function template($file='',$dataisi='')
	{
		$data['header']=$this->load->view('template/header.php',$dataisi,true);
		$data['sidebar']=$this->load->view('template/sidebar.php',$dataisi,true);
		$data['konten']=$this->load->view("page/$file.php",$dataisi,true);
		$this->load->view('template/template.php',$data);
	}

}
	