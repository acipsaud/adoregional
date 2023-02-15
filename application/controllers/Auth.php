<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct() 
	{
		parent::__construct();

		$this->load->helper(array('url','form'));
        $this->load->library(array('pagination','form_validation','upload','session'));
		$this->load->model('Modauth');

    }

	public function index()
	{
		$this->load->view('404');
	}  

	public function login()
	{
		$this->load->model('Modauth');
		$this->load->library('form_validation');

		$rules = $this->Modauth->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('login');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->Modauth->login($username, $password)){
			redirect('dashboard');
		} else {
            // $p = password_hash('acip', PASSWORD_DEFAULT);
            // echo $p;
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		}

		$this->load->view('login');
	}

	public function logout()
	{
		$this->load->model('Modauth');
		$this->Modauth->logout();
		redirect('auth/login');
	}

	public function cekscrap()
	{
		$post = array(
            "username" => "950133",
            "password" => "4lh4mdulill4H24"
            );
    
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://samsnas.telkom.co.id/login.php");
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
		curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
		curl_exec($ch);
		$response=curl_exec($ch);

		$get_content=explode(",", $response);
		$status=explode(" ", $get_content[0]);
		echo $status[1];

	}
}
