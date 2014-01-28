<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('nekogear');
	}

	function index(){
		if (!$this->ion_auth->logged_in()){
			$data['details'] = $this->nekogear->all_product();
			$this->load->view('produk/home',$data);
		}else{
			$data['user'] = $this->ion_auth->get_users_groups()->row();
			$data['details'] = $this->nekogear->all_product();
			$this->load->view('produk/home_login',$data);
		}
	}

	function preorder(){
		if (!$this->ion_auth->logged_in()){
			$data['details'] = $this->nekogear->pre_product();
			$this->load->view('produk/home_pre',$data);
		}else{
			$data['details'] = $this->nekogear->pre_product();
			$this->load->view('produk/home_pre_login',$data);
		}
	}

	function readystock(){
		if (!$this->ion_auth->logged_in()){
			$data['details'] = $this->nekogear->ready_product();
			$this->load->view('produk/home_ready',$data);
		}else{
			$data['details'] = $this->nekogear->ready_product();
			$this->load->view('produk/home_ready_login',$data);
		}
	}

	function detail(){
		if (!$this->ion_auth->logged_in()){
			$id = $this->uri->segment(3);

			$data['details'] = $this->nekogear->info_item($id);
			$data['colors']  = $this->nekogear->info_colors($id);
			$data['sizes']	 = $this->nekogear->info_sizes();

			$data['stocks'] = $this->nekogear->detail_stock($id);

			$this->load->view('produk/detail',$data);
		}else{
			$id = $this->uri->segment(3);

			$data['details'] = $this->nekogear->info_item($id);
			$data['colors']  = $this->nekogear->info_colors($id);
			$data['sizes']	 = $this->nekogear->info_sizes();

			$data['stocks'] = $this->nekogear->detail_stock($id);

			$this->load->view('produk/detail_login',$data);
		}
	}
}