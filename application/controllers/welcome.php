<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	function laporan_keuangan(){
		//$this->load->helper('dropdown_tanggal');
		// laporan beli - jual
		$start_date = $this->input->post('start_date');
		$end_date	= $this->input->post('end_date');

		$data['r_pemesanan'] = $this->nekogear->get_order_payment_info($start_date,$end_date);
		$data['r_pembelian'] = $this->nekogear->get_production_payment_info($start_date,$end_date);

		$data['v_pemesanan'] = $this->nekogear->get_order_payment_value($start_date,$end_date);
		$data['v_pembelian'] = $this->nekogear->get_production_payment_value($start_date,$end_date);

		$data['its_magic'] = $this->nekogear->count_profit($start_date,$end_date);
		//$data['dropdown_year'] = buildYearDropdown('year', $data['old_profile_data']['year']);
		//echo "<pre>";
		//die(print_r($data, TRUE));

		$this->load->view('cpanel/laporankeuangan',$data);
	}

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('nekogear');
	}
	
	function komplain(){
		$this->load->view('order/complaint');
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		//$this->load->model('nekogear');
		$data['dummy'] = $this->nekogear->dummy_system();

		echo "<pre>";
		die(print_r($data, TRUE));
	}

	function update(){
		$oid = $this->uri->segment(3);
		$data['update'] = $this->nekogear->update_test($oid);

		echo "<pre>";
		die(print_r($data, TRUE));
	}

	function dummy(){
		$data['dummy'] = $this->nekogear->dummy();

		echo "<pre>";
		die(print_r($data, TRUE));

	}

	function cek_bill(){
		$data['bill'] = $this->nekogear->payment_validate();

		echo "<pre>";
		die(print_r($data, TRUE));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */