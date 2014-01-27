<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('nekogear');
	}

	function detail(){
		$id = $this->uri->segment(3);

		$data['details'] = $this->nekogear->info_item($id);
		$data['colors']  = $this->nekogear->info_colors($id);
		$data['sizes']	 = $this->nekogear->info_sizes();

		$data['stocks'] = $this->nekogear->detail_stock($id);

		$this->load->view('produk/detail',$data);
	}

}