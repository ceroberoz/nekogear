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

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('nekogear');
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */