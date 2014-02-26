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
	function stok2(){
		$crud = new grocery_CRUD();

		$crud->set_table('item_stock')
			 //->unset_add()
			 //->unset_delete()
			 ->set_relation('production_id','production','production_id',array('status' => 'PROD. END'))
			 ->set_crud_url_path(site_url(strtolower("/gudang/".__CLASS__."/".__FUNCTION__)),site_url(strtolower("/gudang/".__CLASS__."/stok")));

		$output = $crud->render();
		//$this->kekgwpeduliaja($output);
		if($crud->getState() != 'list') {
			$this->kekgwpeduliaja($output);
		} else {
			return $output;
		}
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
		//$this->kekgwpeduliaja($output);
		if($crud->getState() != 'list') {
			$this->kekgwpeduliaja($output);
		} else {
			return $output;
		}
	}

	function stok(){
		$this->config->load('grocery_CRUD');
		$this->config->set_item('grocery_crud_dialog_forms',TRUE);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output_produksi= $this->daftar_produksi();
		$output_stok 	= $this->stok2();

		$js_files	 = $output_produksi->js_files + $output_stok->js_files;
		$css_files 	 = $output_produksi->css_files + $output_stok->css_files;
		$output 	 = "<h2>Daftar Pembelian</h2>".$output_produksi->output."<h2>Daftar Stok</h2>".$output_stok->output;

		$this->kekgwpeduliaja((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));	
	}

	function pengiriman(){
		$this->config->load('grocery_CRUD');
		$this->config->set_item('grocery_crud_dialog_forms',TRUE);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output_order 	= $this->order_detail();
		$output_kirim 	= $this->pengiriman2();

		$js_files	 = $output_order->js_files + $output_kirim->js_files;
		$css_files 	 = $output_order->css_files + $output_kirim->css_files;
		$output 	 = "<h2>Daftar Order</h2>".$output_order->output."<h2>Daftar Pengiriman</h2>".$output_kirim->output;

		$this->kekgwpeduliaja((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));	
	}

	function order_detail(){
		$crud = new grocery_CRUD();

		$crud->set_table('order_detail')
			 //->where('status','PENDING')
			 ->unset_add()
			 ->unset_delete()
			 ->unset_edit()
			 ->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));;
		$output = $crud->render();

		//$this->kekgwpeduliaja($output);
		if($crud->getState() != 'list') {
			$this->kekgwpeduliaja($output);
		} else {
			return $output;
		}
	}


	// pengiriman
	function pengiriman2(){
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
			 ->unset_delete()
			 ->set_crud_url_path(site_url(strtolower("/gudang/".__CLASS__."/".__FUNCTION__)),site_url(strtolower("/gudang/".__CLASS__."/pengiriman")));

		$output = $crud->render();
		//$this->kekgwpeduliaja($output);
		if($crud->getState() != 'list') {
			$this->kekgwpeduliaja($output);
		} else {
			return $output;
		}
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