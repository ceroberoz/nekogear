<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		redirect('/');
	}

	function login(){
		if($_POST){
			$identity = $this->input->post('identity',true);
			$password = $this->input->post('password',true);

			if($this->ion_auth->login($identity,$password)){
				$user = $this->ion_auth->user()->row();
				redirect($user->group.'/home');
			}
			else{
				$this->session->set_flashdata('error', 'Login Gagal!');
			}
		}
		redirect('/')
	}

	function logout(){
		$this->ion_auth->logout();
		redirect('/');
	}
}