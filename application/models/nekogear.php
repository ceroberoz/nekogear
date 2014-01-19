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
}