<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nekogear extends CI_Model{
	function info_item($id){
		$this->db->select('*')
				 ->from('item')
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

	function cart_validate(){
		$cart = $this->cart->contents();
		foreach ($cart as $items):
			$SKU	  = $items['name'];
			$size 	  = $items['size'];
			$color 	  = $items['colour'];
			$quantity = $items['qty'];

			$this->db->select('*')
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
			//$this->username		= "$ionauth->username()";
			$this->status 		= "PENDING";

			$this->SKU 			= $cartitem['name'];
			$this->category		= $cartitem['category'];
			$this->weight		= $cartitem['weight']*$cartitem['qty'];
			$this->color		= $cartitem['colour'];
			$this->size			= $cartitem['size'];
			$this->price		= $cartitem['subtotal'];
			$this->quantity		= $cartitem['qty'];

			$this->db->insert('order', $this);
			//$this->db->insert('order_details', $that);
		endforeach;
	}
}