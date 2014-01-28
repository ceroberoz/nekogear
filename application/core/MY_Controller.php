<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends CI_Controller{
	protected $the_user;

	public function __construct(){
		parent::__construct();

		if ($this->ion_auth->is_admin()){
			$this->the_user = $this->ion_auth->user()->row();

			$data = new stdClass();
			$data->success = false;

			$data->the_user = $this->the_user;
			$this->load->vars($data);
		}
		else{
			redirect('/');
		}
	}
}

class Members_Controller extends CI_Controller{
	protected $the_user;

	public function __construct(){
		parent::__construct();

		if ($this->ion_auth->in_group('members')){
			$this->the_user = $this->ion_auth->user()->row();

			$data = new stdClass();
			$data->success = false;

			$data->the_user = $this->the_user;
			$this->load->vars($data);
		}
		else{
			redirect('/');
		}
	}
}

class Common_Auth_Controller extends CI_Controller{
	protected $the_user;

	public function __construct(){
		parent::__construct();

		if($this->ion_auth->logged_in()){
			$this->the_user = $this->ion_auth->user()->row();
			$data->the_user = $this->the_user;
			$this->load->vars($data);
		}
		else{
			redirect('/');
		}
	}
}