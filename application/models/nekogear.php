<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nekogear extends CI_Model{

	function all_product(){
		//$this->db->select('*')
		//		 ->from('item');
				 //->join('category','category.category = item.category')
				 //->where('item.item_id',$id);
		$query = $this->db->get('item');

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function pre_product(){
		$this->db->select('*')
				 ->from('item')
				 //->join('category','category.category = item.category')
				 ->where('item.category','Pre Order');
		$query = $this->db->get('');

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function ready_product(){
		$this->db->select('*')
				 ->from('item')
				 //->join('category','category.category = item.category')
				 ->where('item.category','Ready Stock');
		$query = $this->db->get('');

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function info_item($id){
		$this->db->select('*')
				 ->from('item')
				 ->join('category','category.category = item.category')
				 ->where('item.item_id',$id);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function info_colors($id){
		$this->db->select('item_stock.colour')
				 ->from('items')
				 ->join('item_stock','item_stock.stock_id = items.stock_id')
				 ->where('items.item_id',$id)
				 ->group_by('item_stock.colour');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function info_sizes(){
		$this->db->select('item_stock.size')
				 ->from('items')
				 ->join('item_stock','item_stock.stock_id = items.stock_id')
				 //->where('item_stock.returnee','N')
				 ->group_by('item_stock.size');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function add_validate(){
		//$cart = $this->cart->contents();
		//foreach ($cart as $items):
		$idp = $this->input->post('SKU');
		$idc = $this->input->post('d_color');
		$ids = $this->input->post('d_size');
		$idq = $this->input->post('quantity');

		$this->db->select('item_stock.stock_quantity')
				 ->from('items')
				 ->join('item','item.item_id = items.item_id')
				 ->join('item_stock','item_stock.stock_id = items.stock_id')
				 ->where('item.SKU', $idp)
				 ->where('item_stock.colour', $idc)
				 ->where('item_stock.size', $ids)
				 ->where('item_stock.stock_quantity <',$idq);

		$query = $this->db->get();
		//endforeach;

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function cart_validate(){
		$cart = $this->cart->contents();
		foreach ($cart as $items):
			$SKU	  = $items['name'];
			$size 	  = $items['size'];
			$color 	  = $items['colour'];
			$quantity = $items['qty'];

			$this->db->select('item_stock.stock_quantity')//select('*')
					 ->from('item')
					 ->join('items','items.item_id = item.item_id')
					 ->join('item_stock','item_stock.stock_id = items.stock_id')
					 ->where('item.SKU',$SKU)
					 ->where('item_stock.colour', $color)
					 ->where('item_stock.size', $size)
					 ->where('item_stock.stock_quantity <',$quantity);

			$query = $this->db->get();
		endforeach;

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}	
	}

	function info_checkout(){
		$ionauth =	$this->ion_auth->user()->row();
		$key = uniqid(); // ganti ke caps
		$resi = strtoupper($key);
		$cart = $this->cart->contents();
		foreach($cart as $cartitem):
			$this->order_id 	= $resi;
			$this->order_date	= date('Y-m-d H:i:s');//date('D d-m-Y H:i:s A');
			//$nama_d				= "$ionauth->first_name()"; // display
			//$nama_b				= "$ionauth->last_name()";  // display
			$this->username		= "$ionauth->username";
			$this->status 		= "PENDING";

			$this->SKU 			= $cartitem['name'];
			$this->category		= $cartitem['category'];
			$this->weight		= $cartitem['weight']*$cartitem['qty'];
			$this->color		= $cartitem['colour'];
			$this->size			= $cartitem['size'];
			$this->price		= $cartitem['subtotal']+$cartitem['weight']*$cartitem['qty']*10000;
			$this->quantity		= $cartitem['qty'];

			$this->db->insert('order', $this);
			//$this->db->insert('order_details', $that);
		endforeach;
	}

	function detail_stock($id){
		$this->db->select('item_stock.colour,item_stock.size,item_stock.stock_quantity')
				 ->from('items')
				 ->join('item','item.item_id = items.item_id')
				 ->join('item_stock','item_stock.stock_id = items.stock_id')
				 ->where('item.item_id',$id);
				 //->group_by('item_stock.colour');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}


		$something = $query->result();

		foreach($something as $colors):
			$ids	= $this->uri->segment(3);
			$warna 	= $colors->colour;

			$this->db->select('item_stock.colour,item_stock.size,item_stock.stock_quantity')
					 ->from('items')
					 ->join('item','item.item_id = items.item_id')
					 ->join('item_stock','item_stock.stock_id = items.stock_id')
					 ->where('item.item_id',$ids)
					 ->where('item_stock.colour',$warna);
					 //->order_by('item_stock.colour','random');

			$query = $this->db->get();
		endforeach;

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
}