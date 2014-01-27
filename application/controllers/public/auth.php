<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		//$this->load->library('form_validation');
		$this->load->helper('url');

		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ?
		$this->load->library('mongo_db') :

		$this->load->database();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->helper('language');
	}

	function index(){
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');
		}
		else{
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['users'] = $this->ion_auth->users()->result();

			foreach ($this->data['users'] as $k => $user){
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->_render_page('auth/index', $this->data);
		}
	}

	function login(){
		if($_POST){
			$identity = $this->input->post('identity',true);
			$password = $this->input->post('password',true);

			if($this->ion_auth->login($identity,$password)){
				//$user = $this->ion_auth->user()->row();
				//redirect($user->group.'/home');
				$user_group=$this->ion_auth->get_users_groups()->row();
				redirect($user_group->name.'/home');
			}
			else{
				$this->session->set_flashdata('error', 'Login Gagal!');
			}
		}
		redirect('/');
	}

	function logout(){
		$this->ion_auth->logout();
		redirect('/');
	}
}