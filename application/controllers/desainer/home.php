<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Desainer_Controller{
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
		$this->load->view('cpanel/desain',$output);
	}

	// multigrids w/ tema pending
	function desain(){
		$this->config->load('grocery_CRUD');
		$this->config->set_item('grocery_crud_dialog_forms',TRUE);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output_tema 	= $this->tema();
		$output_desain 	= $this->desain2();

		$js_files	 = $output_tema->js_files + $output_desain->js_files;
		$css_files 	 = $output_tema->css_files + $output_desain->css_files;
		$output 	 = "<h2>Daftar Tema</h2>".$output_tema->output."<h2>Daftar Desain</h2>".$output_desain->output;

		$this->kekgwpeduliaja((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));	
	}

	// List tema pending
	function tema(){
		$crud = new grocery_CRUD();

		$crud->set_table('design_theme')
			 ->where('status','PENDING')
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

	// Manage Design
	function desain2(){
		$crud = new grocery_CRUD();
		
		$crud->set_table('design')
			 ->set_relation('theme','design_theme','theme', array('status' => 'PENDING'))
			 ->fields('theme','design','design_date','email') // date autoupdate?
			 //->edit_fields('theme','design','submitted_date','email')
			 ->set_field_upload('design','assets/uploads/desain')
			// ->field_type('date_submitted','readonly')
			 //->field_type('theme','readonly')
			// ->callback_add_field('email',array($this,'design_callback'))
			// ->field_type('email','readonly')
			 //->unset_add()
			// ->unset_delete()
			 ->display_as('theme','Tema')
			 ->display_as('design','Desain')
			 //->display_as('theme_date','Tanggal Tema')
			 ->display_as('approval_date','Tanggal Approval')
			 ->display_as('design_date','Tanggal Submit')
			 ->field_type('design_date','invisible')
			 ->display_as('email','Email')
			 ->set_crud_url_path(site_url(strtolower("/desainer/".__CLASS__."/".__FUNCTION__)),site_url(strtolower("/desainer/".__CLASS__."/desain")));

		$output = $crud->render();

		//$this->kekgwpeduliaja($output);
		if($crud->getState() != 'list') {
			$this->kekgwpeduliaja($output);
		} else {
			return $output;
		}
	}

	function design_callback($edit_user,$mail=''){
		$user = $this->ion_auth->user()->row();
		$mail = $user->email;
		$usermail = array(
			'email' => $mail
			);

		$this->db->insert('design',$usermail);
		return '<input type="text" id="email" name="email" value="'.$mail.'" disabled />';
	}
}