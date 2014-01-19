<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('nekogear');
		//$this->load->library('cart');
	}

	function add(){
		$id 	  = $this->input->post('item_id');	// added via form hidden
		$SKU 	  = $this->input->post('SKU'); 		// added via form hidden
		$category = $this->input->post('category');	// added via form hidden
		$weight	  = $this->input->post('weight'); 	// added via form hidden
		$price	  = $this->input->post('price'); 	// added via form hidden
		$colour	  = $this->input->post('d_color'); 
		$size	  = $this->input->post('d_size');
		$quantity = $this->input->post('quantity');

		$data = array(
			'id' => $id,			 // default
			'name' => $SKU, 		 // default
			'category' => $category,
			'weight' => $weight,
			'price'	=> $price, 		 // default
			'colour' => $colour,
			'size'	=> $size,
			'qty'	=> $quantity 	 // default
			);

		$this->cart->insert($data);
		echo "<pre>";
		die(print_r($data, TRUE));
	}
}