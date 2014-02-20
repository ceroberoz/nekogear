<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Keuangan_Controller{
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
		$this->load->view('cpanel/keuangan',$output);
	}

	// atur keuangan - pembelian

	function pembayaran_buy(){ // where status pembelian = pending
		$crud = new grocery_CRUD();

		$crud->set_table('production_pay')
			 ->set_relation('bank_origin','our_bank_account','bank_name')
			 ->set_relation('bank_destination','all_banks','bank_name')
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
	}

	function cetak(){}
}