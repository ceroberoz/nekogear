<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('nekogear');
		//$this->load->model('ion_auth_model');
	}

	function index(){
		$user = $this->ion_auth->user()->row();
		$email = $user->email;

		$data['orders'] = $this->nekogear->order_info($email);
		$this->load->view('order/home',$data);
	}

	function detail(){
		$oid = $this->uri->segment(3);

		$user = $this->ion_auth->user()->row();
		$email = $user->email;

		$data['details'] = $this->nekogear->order_detail($oid);
		$data['orders'] = $this->nekogear->order_details($oid);
		$data['users'] = $this->nekogear->user_detail($email);
		$this->load->view('order/detail',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */