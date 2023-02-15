<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

	public function useredit($id_user='')
	{
		$dataisi['getuser']=$this->db->query("select * from user where id_user='$id_user'")->row();

		$this->template('useredit',$dataisi);
		// $this->load->view("page/dashboardfix.php",$dataisi);
	}

	public function index()
	{
		$dataisi='';

		$this->template('user',$dataisi);
		// $this->load->view("page/dashboardfix.php",$dataisi);
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

	public function template($file='',$dataisi='')
	{
		$data['header']=$this->load->view('template/header.php',$dataisi,true);
		$data['sidebar']=$this->load->view('template/sidebar.php',$dataisi,true);
		$data['konten']=$this->load->view("page/$file.php",$dataisi,true);
		$this->load->view('template/template.php',$data);
	}

}
	