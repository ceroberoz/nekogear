<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Admin_Controller{
	function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	function index()
	{
		$this->adminpanel((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	function adminpanel($output=NULL){
		$this->load->view('cpanel/admin',$output);
	}

	// Manage Users

	function ip_address($value, $row){
		return @inet_ntop($value);
	}

	function datetime($value, $row){
		return @date('d M Y H:i:s', $value);
	}

	function edit_encrypt_password_callback($post_array, $primary_key = NULL){
		$this->load->model('ion_auth_model');

		if($post_array['password'] =='defaultvalue'){
			unset($post_array['password']);
		}
		else{
			$post_array['password'] = $this->ion_auth_model->hash_password($post_array['password']);
		}
		return $post_array;
	}

	function decrypt_password_callback($value){
		return "<input type='password name='password' value='defaultvalue' />";
	}

	function list_users($operation = NULL){
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('flexigrid');
			$crud->set_table('users');
			$crud->set_relation_n_n('groups','users_groups','groups','user_id','group_id','name');

			if($operation == 'edit'){
				$crud->fields('username','first_name','last_name','password','email','groupname','created_on','last_login','company','active');
				$crud->change_field_type('created_on','readonly');
			}
			else{
				$crud->fields('username','first_name','last_name','password','email','groupname','created_on','last_login','company','active');
				$crud->change_field_type('created_on','hidden');
			}

			$crud->required_fields('username', 'password', 'email', 'groupname', 'active', 'users_group', 'first_name', 'last_name', 'identifier');

			$crud->display_as('username','Username')
				 ->display_as('first_name','Nama Depan')
				 ->display_as('last_nama','Nama Belakang')
				 ->display_as('password','Password')
				 ->display_as('email','Email')
				// ->display_as('identifier','Pembeda')
				 ->display_as('groupname','Tipe User')
				 ->display_as('created_on','Tanggal Daftar')
				 ->display_as('last_login','Aktifitas Terakhir')
				 ->display_as('company','Company')
				 ->display_as('active','Status ID');

			$crud->set_rules('password','Password','min_length['.$this->config->item('min_password_length','ion_auth').']|max_length['.$this->config->item('max_password_length','ion_auth').']');
			$crud->set_rules('email','Email','required|valid_email');
			$crud->columns('username','first_name','last_name','email','groupname','created_on','last_login','active');
			$crud->callback_column('created_on',array($this,'datetime'));
			$crud->callback_column('last_login',array($this,'datetime'));
			$crud->change_field_type('last_login','readonly');
			$crud->change_field_type('password','password');
			$crud->change_field_type('ip_address','readonly');

			$crud->callback_before_insert(array($this,'insert_encrypt_password_callback'));
			$crud->callback_before_update(array($this,'edit_encrypt_password_callback'));
			$crud->callback_edit_field('password',array($this,'decrypt_password_callback'));
			$crud->callback_edit_field('created_on',array($this,'datetime'));
			$crud->callback_edit_field('last_login',array($this,'datetime'));

			$output = $crud->render();
			//$this->gc_title = 'Pengelolaan Member';

			//$this->layout->view($this->admin_dir).'gc_data/v_listdata',$data);
			$this->adminpanel($output);
		}
		catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}