<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{

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

		$this->load->helper(array('url', 'form'));
		$this->load->library(array('pagination', 'form_validation', 'upload', 'session'));
		// $this->load->model('Modhalaman');	

		$this->load->model('Modauth');
		$this->load->model('Moduser');
		$this->load->model('Modlog');
		$this->load->model('Modwitel');
		if (!$this->Modauth->current_user()) {
			redirect('auth/login');
		}
		// echo $this->modauth->current_user()->username;
	}

	public function update()
	{
		$data = array(
			"username" => $this->input->post('username'),
			"nama" => $this->input->post('nama'),
			"level" => $this->input->post('level')
		);
		$this->db->update('user', $data, array('id_user' => $this->input->post('id_user')));

		//$this->template('po',$dataisi);
		redirect('user/');
	}

	public function useredit($id_user = '')
	{
		$dataisi['getuser'] = $this->db->query("select * from user where id_user='$id_user'")->row();

		$this->template('v_user', $dataisi);
		// $this->load->view("page/dashboardfix.php",$dataisi);
	}

	public function index()
	{
		// $dataisi='';

		// $this->template('user',$dataisi);
		// $this->load->view("page/dashboardfix.php",$dataisi);

		// hadri
		// $this->Modlog->save_log();
		$dataisi['user_data'] = $this->Moduser->getAll();
		$dataisi['witel_data'] = $this->Modwitel->getWitel();

		$dataisi['log'] = $this->Modlog->getAllLog();
		$this->template('v_log', $dataisi);
	}

	public function addUser()
	{
		$password = password_hash($this->input->post('modal_add_password'), PASSWORD_DEFAULT);
		$data = array(
			"username" => $this->input->post('modal_add_username'),
			"password" => $password,
			"witel" => $this->input->post('witel'),
			"nama" => $this->input->post('modal_add_nama')			
		);
		$this->Moduser->addUser($data);
		// success
		$this->session->set_flashdata('add',1);
		redirect('user/');

	}

	public function editUser()
	{
		// cek ada isian password atau tidak 
		if (empty($this->input->post('edit_old'))) {
			$data = array(
				"id_user" => $this->input->post('edit_id'),
				"nama" => $this->input->post('edit_nama'),
				"witel" => $this->input->post('edit_witel')
			);
			$this->Moduser->update($data);
			// success
			$this->session->set_flashdata('notify',1);
			redirect('user/');
		} else {
			// ada password cek dlu sama atau tidak
			if ($this->Moduser->cekPassword($this->input->post('edit_old'),$this->input->post('edit_id'))){
				$this->session->set_flashdata('wrong',1);
				redirect('user/');
			} else {
				// ganti password dan data
				$password = password_hash($this->input->post('edit_new'), PASSWORD_DEFAULT);
				$data = array(
					"password" => $password,
					"id_user" => $this->input->post('edit_id'),
					"nama" => $this->input->post('edit_nama'),
					"witel" => $this->input->post('edit_witel')
				);
				$this->Moduser->update_with_pass($data);
				// success
				$this->session->set_flashdata('notify',1);
				redirect('user/');
			}
			


		}
	}

	public function save()
	{
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$data = array(
			"username" => $this->input->post('username'),
			"password" => $password,
			"nama" => $this->input->post('nama'),
			"level" => $this->input->post('level')
		);
		$this->db->insert('user', $data);
		redirect('user/');
	}

	public function template($file = '', $dataisi = '')
	{
		$data['header'] = $this->load->view('template/header.php', $dataisi, true);
		$data['sidebar'] = $this->load->view('template/sidebar.php', $dataisi, true);
		$data['konten'] = $this->load->view("page/$file.php", $dataisi, true);
		$this->load->view('template/template.php', $data);
	}

}