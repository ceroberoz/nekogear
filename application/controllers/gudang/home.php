<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Gudang_Controller{
	function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	function index()
	{
		$this->kekgwpeduliaja((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	function kekgwpeduliaja($output=NULL){
		$this->load->view('cpanel/gudang',$output);
	}

	// atur stok barang
	function stok(){
		$crud = new grocery_CRUD();

		$crud->set_table('item_stock')
			 //->unset_add()
			 //->unset_delete()
			 ->set_relation('production_id','production','production_id',array('status' => 'PROD. END'));

		$output = $crud->render();
		$this->kekgwpeduliaja($output);
	}

	// lihat list produksi yang telah selesai
	function daftar_produksi(){
		$crud = new grocery_CRUD();

		$crud->set_table('production')
			 ->columns('production_id','tees_color','XS','S','M','L','XL')
			 ->unset_add()
			 ->unset_delete()
			 ->unset_edit()
			 ->where('status','PROD. END');

		$output = $crud->render();
		$this->kekgwpeduliaja($output);
	}

	// pengiriman
	function pengiriman(){
		$crud = new grocery_CRUD();

		$crud->set_table('shipping')
			 //->columns('co_note','expedition','order_id','fees','status')
			 //->set_relation('order_id','order','order_id',array('status' => 'PROSES'))
			 ->edit_fields('co_note','expedition','order_id','fees','status')
			 ->callback_after_update(array($this,'update_status_kirim'))
			 //->callback_after_update(array($this,'update_status_kirim2'))
			 ->field_type('order_id','readonly')
			 ->field_type('status','readonly')
			 ->field_type('fees','readonly')
			 ->unset_add()
			 ->unset_delete();

		$output = $crud->render();
		$this->kekgwpeduliaja($output);
	}

	// callbacks
	function update_status_kirim($post_array,$order_id){
		$update = array(
			'order_id'	=> $order_id,
			'status' 	=> "TERKIRIM"
			);
		$this->db->update('order',$update,array('order_id' => $order_id));

		$date = date('Y-m-d H:i:s');
		$update2 = array(
			'shipping_date' => $date,
			'status' => "TERKIRIM"
			);
		$this->db->update('shipping',$update2,array('order_id' => $order_id));
	}
}