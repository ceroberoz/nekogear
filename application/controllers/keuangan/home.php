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


	// atur keuangan - pembelian

	function pembayaran_buy(){ // where status pembelian = pending
		$crud = new grocery_CRUD();

		$crud->set_table('production_pay')
			 ->set_relation('bank_origin','our_bank_account','bank_name')
			// ->set_relation('bank_destination','banks','bank_name')
			 ->set_field_upload('paid_upload','assets/uploads/payment_buy');

		$output = $crud->render();
		$this->kekgwpeduliaja($output);
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

		$this->load->view('cpanel/laporankeuangan',$data);
	}

}