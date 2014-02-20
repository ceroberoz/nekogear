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

	// Manage Design
	function desain(){
		$crud = new grocery_CRUD();
		
		$crud->set_table('design')
			 ->set_relation('theme','design_theme','theme', array('status' => 'DONE'))
			 ->fields('theme','design','submitted_date','email') // date autoupdate?
			 //->edit_fields('theme','design','submitted_date','email')
			 ->set_field_upload('design','assets/uploads/desain')
			 ->field_type('date_submitted','readonly')
			 //->field_type('theme','readonly')
			 ->callback_edit_field('email',array($this,'design_callback'))
			// ->field_type('email','readonly')
			 //->unset_add()
			// ->unset_delete()
			 ->display_as('theme','Tema')
			 ->display_as('design','Desain')
			 ->display_as('theme_date','Tanggal Tema')
			 ->display_as('approved_date','Tanggal Submit')
			 ->display_as('submitted_date','Tanggal Submit')
			 ->field_type('submitted_date','invisible')
			 ->display_as('email','Email');

		$output = $crud->render();

		$this->kekgwpeduliaja($output);
	}

	function design_callback($edit_user,$mail=''){
		$user = $this->ion_auth->user()->row();
		$mail = $user->email;
		return '<input type="text" id="email" name="email" value="'.$mail.'" disabled />';
	}
}