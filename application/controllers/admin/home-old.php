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
		$this->kekgwpeduliaja((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	function kekgwpeduliaja($output=NULL){
		$this->load->view('cpanel/admin',$output);
	}

	// Manage Users
	public function users(){
		if (!$this->ion_auth->logged_in()){
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}else{
		$crud = new grocery_CRUD();

		//$crud->set_theme('twitter-bootstrap');
		$crud->set_subject('User');
		$crud->set_table('users');


		$crud->columns('first_name', 'last_name', 'email','address','city','postal_code', 'phone', 'groups', 'active')
			 ->fields('first_name', 'last_name', 'email', 'address','city','postal_code','phone', 'groups', 'active', 'change_password', 'edit_password', 'edit_password_confirm')
			 ->display_as('change_password', 'Ubah Password?')
			 ->display_as('first_name', 'Nama Depan')
			 ->display_as('last_name', 'Nama Belakang')
			 ->display_as('email', 'Email')
			 ->display_as('address', 'Alamat')
			 ->display_as('city', 'Kota')
			 ->display_as('postal_code', 'Kode Pos')
			 ->display_as('phone', 'No. Handphone')
			 ->display_as('groups', 'Group')
			 ->display_as('active', 'Aktif')
			 ->add_fields('email', 'first_name', 'last_name','address','city','postal_code', 'phone','groups', 'password', 'password_confirm')
			 ->edit_fields('email', 'first_name', 'last_name','address','city','postal_code', 'phone', 'groups', 'active', 'change_password', 'edit_password', 'edit_password_confirm') 
			 ->set_relation('city','default_cities','name')
			 ->set_relation_n_n('groups', 'users_groups', 'groups','user_id','group_id','description')
			 ->change_field_type('change_password', 'true_false')
			 ->change_field_type('edit_password', 'password')
			 ->change_field_type('edit_password_confirm', 'password')
			 ->change_field_type('password', 'password')
			 ->change_field_type('password_confirm', 'password')
			 ->set_rules('change_password', 'Change password', 'callback__change_password_check')
			 ->set_rules('edit_password', 'Password', 'min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']')
			 //->callback_edit_field('email',array($this,'edit_callback'))
			 ->callback_edit_field('change_password',array($this,'_cb_change_password_field'))
			 ->callback_edit_field('edit_password', array($this, '_cb_empty_password_input_field'))
			 ->callback_edit_field('edit_password_confirm', array($this,'_cb_empty_password_confirm_input_field'))
			 ->callback_before_update(array($this, '_cb_user_password_update'));
			
			if ($crud->getState() == "edit") {
			       $crud->field_type('email','readonly');
			}

			$output = $crud->render();

			$this->kekgwpeduliaja($output);
		}
	}

	function edit_callback($edit_user,$mail=''){
		$user = $this->ion_auth->user()->row();
		$mail = $user->email;
		return '<input type="text" id="email" name="email" value="'.$mail.'" disabled />';
	}

	function _change_password_check($change_password){
		$error = false;
		if($change_password == 1){
			$password = $this->input->post('edit_password');
			$password_confirm = $this->input->post('edit_password_confirm');
			$message = $this->lang->line('required');

			if(empty($password)){
				$message = sprintf($message,'Password');
				$error = TRUE;
			}if(empty($password_confirm)){
				$message = sprintf($message,'Confirm password');
				$error = TRUE;
			}if($password != $password_confirm){
				$message = $this->lang->line('matches');
				$message = sprintf($message, 'Password', 'Confirm Password');
				$error = TRUE;
			}
		}
		if($error == TRUE){
			$this->form_validation->set_message('_change_password_check', $message);
			return false;
		}else{
			return TRUE;
		}
	}

	function _cb_empty_password_input_field($value, $primary_key){
		$data = array(
				'name' => 'edit_password',
				'type' => 'password',
				'id' => 'field-edit_password'
				);
		return form_input($data);
	}

	function _cb_empty_password_confirm_input_field($value, $primary_key){
		$data = array(
				'name' => 'edit_password_confirm',
				'id' => 'field-edit_password_confirm',
				'type' => 'password'
				);
		return form_input($data);
	}

	function _cb_user_password_update($post_array, $primary_key){
	    // because change_password is checked we know that the validation has run
	    if($post_array['change_password'] == 1){
	        $data = array(
			        'password' => $post_array['edit_password']
			        );
	        $this->ion_auth->update($primary_key, $data);
	    }
	    unset($post_array['change_password']);
	    unset($post_array['edit_password']);
	    unset($post_array['edit_password_confirm']);
	    return $post_array;
	}

	function _cb_user_redirect($post_array, $primary_key){
		redirect('main', 'refresh');
	}

	function _cb_change_password_field($value, $primary_key){
		$data = array(
			'id' => 'field_change_password',
			'name' => 'change_password'
			);
		$str = form_checkbox($data, 0);
		return $str;
	}

}