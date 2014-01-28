<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	function index(){
		if(!$this->ion_auth->logged_in()){
			$this->load->view('user/login');
		}
		else{
			redirect('produk');
		}	
	}

	function login2(){
		if($_POST){
			$identity = $this->input->post('identity',true);
			$password = $this->input->post('password',true);

			if($this->ion_auth->login($identity,$password)){
				//$user = $this->ion_auth->user()->row();
				//redirect($user->group.'/home');
				$user_group = $this->ion_auth->get_users_groups()->row();
				redirect($user_group->name.'/home');
			}
			else{
				$this->session->set_flashdata('error', 'Login gagal. Mungkin email atau passwordnya salah, apalah.');
			}
		}
		redirect('produk');
	}

	function login(){
	//$this->data['title'] = "Login";

	//validate form input
	$this->form_validation->set_rules('identity', 'Identity', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');

	if ($this->form_validation->run() == true)
	{
		//check to see if the user is logging in
		//check for "remember me"
		$remember = (bool) $this->input->post('remember');

		if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
		{
			//if the login is successful
			//redirect them back to the home page
			$user_group = $this->ion_auth->get_users_groups()->row();
			redirect($user_group->name.'/home');
			//$this->session->set_flashdata('message', $this->ion_auth->messages());
			//redirect('/', 'refresh');
		}
		else
		{
			//if the login was un-successful
			//redirect them back to the login page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			//$this->session->set_flasdata('message','Login gagal. Mungkin email atau passwordnya salah, apalah.');
			redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
		}
	}
	else
	{
		//the user is not logging in so display the login page
		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->data['identity'] = array('name' => 'identity',
			'id' => 'identity',
			'type' => 'text',
			'value' => $this->form_validation->set_value('identity'),
		);
		$this->data['password'] = array('name' => 'password',
			'id' => 'password',
			'type' => 'password',
		);

		$this->_render_page('auth/login', $this->data);
	}
}

	function logout(){
		$this->ion_auth->logout();
		redirect('produk');
	}
}