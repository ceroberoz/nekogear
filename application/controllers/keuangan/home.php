<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Keuangan_Controller{
	function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->helper(array('url','form'));
		$this->load->library('grocery_CRUD');
		$this->load->model('nekogear');
	}

	function index()
	{
		$this->kekgwpeduliaja((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	function kekgwpeduliaja($output=NULL){
		$this->load->view('cpanel/keuangan',$output);
	}

	function pembayaran_buy(){
		$this->config->load('grocery_CRUD');
		$this->config->set_item('grocery_crud_dialog_forms',TRUE);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output_produksi	= $this->list_produksi();
		$output_pembayaran	= $this->pembayaran_buy2();

		$js_files	 = $output_produksi->js_files + $output_pembayaran->js_files;
		$css_files 	 = $output_produksi->css_files + $output_pembayaran->css_files;
		$output 	 = "<h2>Daftar Produksi</h2>".$output_produksi->output."<h2>Daftar Pembayaran Produksi</h2>".$output_pembayaran->output;

		$this->kekgwpeduliaja((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));	
	}

	// atur keuangan - pembelian

	function list_produksi(){
		$crud = new grocery_CRUD();

		$crud->set_table('production')
			 ->where('status','PENDING')
			 ->columns('production_id','vendor_id','total_cost','production_form','note','status')
			 ->set_relation('vendor_id','vendor','vendor_id')
			 ->set_field_upload('production_form','assets/uploads/files/form_vendor')
			 ->display_as('production_id','#')
			 ->display_as('vendor_id','Vendor')
			 ->display_as('total_cost','Biaya Total')
			 ->display_as('production_form','Nota Vendor')
			 ->display_as('note','Catatan')
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

	function pembayaran_buy2(){ // where status pembelian = pending
		$crud = new grocery_CRUD();

		$crud->set_table('production_pay')
			 ->set_relation('prod_pay_id','production','production_id',array('status' => 'PENDING'))
			 ->set_relation('bank_origin','our_bank_account','bank_name')
			 ->set_relation('bank_destination','banks','name')
			 ->set_field_upload('paid_upload','assets/uploads/payment_buy')
			 ->set_crud_url_path(site_url(strtolower("/keuangan/".__CLASS__."/".__FUNCTION__)),site_url(strtolower("/keuangan/".__CLASS__."/pembayaran_buy")));

		$output = $crud->render();
		//$this->kekgwpeduliaja($output);
		if($crud->getState() != 'list') {
			$this->kekgwpeduliaja($output);
		} else {
			return $output;
		}
	}

	// atur keuangan - pesanan

	function pembayaran_pesanan(){
		$crud = new grocery_CRUD();

		$crud->set_table('payment')
			 ->unset_add()
			 ->unset_delete()
			 ->unset_edit();
			 //->set_relation('bank_origin','our_bank_account','bank_name')
			 //->set_relation('bank_destination','all_banks','bank_name')
			 //->set_field_upload('paid_upload','assets/uploads/payment_buy');

		$output = $crud->render();
		$this->kekgwpeduliaja($output);
	}

	function laporan_keuangan(){
		$this->load->view('cpanel/laporankeuangan');
	}

	function print_keuangan(){
		// laporan beli - jual
		$start_date = $this->input->post('start_date');
		$end_date	= $this->input->post('end_date');

		$data['r_pemesanan'] = $this->nekogear->get_order_payment_info($start_date,$end_date);
		$data['r_pembelian'] = $this->nekogear->get_production_payment_info($start_date,$end_date);

		$data['v_pemesanan'] = $this->nekogear->get_order_payment_value($start_date,$end_date);
		$data['v_pembelian'] = $this->nekogear->get_production_payment_value($start_date,$end_date);

		$data['its_magic'] = $this->nekogear->count_profit($start_date,$end_date);
		//echo "<pre>";
		//die(print_r($data, TRUE));
		$this->load->view('cpanel/laporankeuangan_print',$data);
	}

}