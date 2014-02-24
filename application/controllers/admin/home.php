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

	// cek order
	function order(){
		$crud = new grocery_CRUD();

		$crud->set_table('order')
			 ->unset_add()
			 ->unset_delete()
			 ->unset_edit();

		$output = $crud->render();
		$this->kekgwpeduliaja($output);
	}

	function order_detail(){
		$crud = new grocery_CRUD();

		$crud->set_table('order_detail')
			 ->unset_add()
			 ->unset_delete()
			 ->unset_edit();

		$output = $crud->render();
		$this->kekgwpeduliaja($output);
	}

	// retur
	function retur(){
		$crud = new grocery_CRUD();

		$crud->set_table('item_stock')
			 ->unset_add()
			 ->unset_delete()
			 ->edit_fields('returnee_stat')
			 ->where('returnee_stat','Y');

		$output = $crud->render();
		$this->kekgwpeduliaja($output);
	}

	// Daftar komplain
	function komplain(){
		$crud = new grocery_CRUD();

		$crud->set_table('order_complaint')
			 ->unset_add()
			 ->unset_delete()
			 ->field_type('order_id','readonly')
			 ->field_type('email','readonly')
			 ->field_type('subject','readonly')
			 ->field_type('message','readonly')
			 ->field_type('attachment','readonly')
			 ->field_type('complaint_date','readonly')
			 ->display_as('order_id','#')
			 ->display_as('email','Email')
			 ->display_as('subject','Subjek')
			 ->display_as('message','Komplain')
			 ->display_as('attachment','Lampiran')
			 ->display_as('complaint_date','Tanggal Komplain')
			 ->display_as('status','Status');
		$output = $crud->render();
		$this->kekgwpeduliaja($output);
	}

	// Tambah Tema
	function tema(){
		$crud = new grocery_CRUD();

		$crud->set_table('design_theme')
			 ->add_fields('theme','email')
			 ->edit_fields('theme','email','status')
			//->field_type('email','readonly')
			 ->display_as('theme','Tema')
			 ->display_as('theme_date','Tanggal Tema')
			 ->callback_add_field('email',array($this,'mail_callbacks'));

		$output = $crud->render();
		$this->kekgwpeduliaja($output);
	}

	// Manage Design
	function desain(){
		$crud = new grocery_CRUD();
		
		$crud->set_table('design')
			 //->columns('theme','design','theme_date','design_date','approval_date','status')
			// ->add_fields('theme')
			 ->unset_add()
			// ->unset_delete()
			 ->edit_fields('theme','design','status')
			// ->field_type('design','readonly')
			 ->field_type('theme','readonly')
			 ->set_relation('theme','design_theme','theme',array('status'=>"PENDING"))
			 ->field_type('status','enum',array('APPROVED', 'REJECTED'))
			// ->change_field_type('theme_date','invisible')
			// ->change_field_type('status','invisible')
			 ->set_field_upload('design','assets/uploads/desain')
			 ->display_as('theme','Tema')
			 ->display_as('email','Email Desainer')
			 ->display_as('theme_date','Tanggal Tema')
			 ->display_as('design_date','Tanggal Desain')
			 ->display_as('approval_date','Tanggal Diterima')
			 ->display_as('design','Desain')
			 ->display_as('status','Status');
			// ->callback_after_insert(array($this,'update_status_desain'));

		$output = $crud->render();

		$this->kekgwpeduliaja($output);
	}

	// Manage Production
	function production(){
		$crud = new grocery_CRUD();
		
		$crud->set_table('production')
			// ->add_fields('design_id','email','') // 
			 ->set_relation('tees_color','colors','color')
			 ->set_relation('design_id','design','design_id',array('status' => 'APPROVED'))
			 ->set_relation('vendor_id','vendor','vendor_id')
			 //->field_type('design_id','set')
			 ->display_as('email','Email')
			 ->display_as('vendor_id','Vendor')
			 ->display_as('design_id','Desain')
			 ->display_as('tees_color','Warna Tees')
			 ->display_as('tees_material','Bahan Tees')
			 ->display_as('total_cost','Biaya Total')
			 ->display_as('production_form','Form Vendor')
			 ->set_field_upload('production_form','assets/uploads/files/form_vendor')
			 ->callback_after_insert(array($this,'update_status_produksi'))
			 ->callback_add_field('email',array($this,'mail_callbacks'));
		//	 ->callback_insert'production_id', array($this, 'update_status_produksi');

		// Prod ID to Payment
			 //set callback?
		$output = $crud->render();

		$this->kekgwpeduliaja($output);

	}

	// Manage Product
	function products(){
		$crud = new grocery_CRUD();

		$crud->set_table('item')
			 ->set_field_upload('image','assets/images/items')
			 ->set_relation('anime_origin','design_theme','theme',array('status' => 'DONE'))
			 ->set_relation_n_n('item_stocks','items','item_stock','item_id','stock_id','production_id','items_id');

		$output = $crud->render();

		$this->kekgwpeduliaja($output);
	}

	// callbacks

	function update_status_produksi($update){
		$key = uniqid(); // ganti ke caps
		$production_id = strtoupper($key);

		$update = array(
			'production_id'	=> $production_id,
			'status' 	=> "PENDING"
			);
		$this->db->insert('production',$update);
		$this->db->insert('production_pay',$update);
	}

	function groups(){
		$crud = new grocery_CRUD();
		$crud->set_table('groups');

		$output = $crud->render();
		$this->kekgwpeduliaja($output);		
	}

	function mail_callbacks(){
		$user = $this->ion_auth->user()->row();
		$mail = $user->email;
		return '<input type="text" id="email" name="email" value="'.$mail.'" disabled />';
	}

	// Manage Users
	function members($operation = null){
		//$this->load->helper('url');
		//$this->class_name = strtolower(__CLASS__);
		//try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('users');
			$crud->set_relation('city','default_cities','name',array('attribute' => 'Kota'));
			$crud->set_relation_n_n('groupname', 'users_groups', 'groups', 'user_id', 'group_id', 'name');

			if($operation == 'edit'){
				//$crud->fields('username', 'first_name', 'last_name', 'password', 'email', 'identifier', 'groupname', 'created_on', 'last_login', 'company',  'active');
				$crud->fields('first_name', 'last_name','email', 'password','address','city','postal_code','phone', 'groupname', 'created_on', 'last_login', 'active');
				$crud->change_field_type('email','readonly');
				$crud->change_field_type('created_on', 'readonly');
			}else{
				//$crud->fields('username', 'first_name', 'last_name', 'password', 'email', 'identifier', 'groupname', 'created_on', 'last_login', 'company',  'active');
				$crud->fields('first_name', 'last_name', 'email', 'password','address','city','postal_code','phone', 'groupname', 'created_on', 'last_login', 'active');
				$crud->change_field_type('created_on', 'hidden');
				$crud->required_fields('email');
			}

			//$crud->required_fields('username', 'password', 'email', 'groupname', 'active', 'users_group', 'first_name', 'last_name', 'identifier');
			$crud->required_fields('password','address','city','phone','postal_code','groupname', 'active', 'first_name', 'last_name');

			$crud//->display_as('username','Username')
             	 ->display_as('first_name','Nama Depan')
             	 ->display_as('last_name','Nama Belakang')
             	 ->display_as('password','Password')
             	 ->display_as('password_confirm','Konfirmasi Password')
             	 ->display_as('email','Email')
             	 ->display_as('address','Alamat')
             	 ->display_as('city','Kota')
             	 ->display_as('postal_code','Kode POS')
             	 ->display_as('phone','No. Handphone')
             	 //->display_as('identifier','Identificator(Necesita sa fie unic)')
             	 ->display_as('groupname','Group User')
             	 ->display_as('created_on','Terdaftar Pada')
             	 ->display_as('last_login','Aktivitas Terakhir')
             	 //->display_as('company','Companie')
             	 ->display_as('active','Status');

			$crud->set_rules('password', 'Password', 'min_length[' . $this->config->item('min_password_length', 'ion_auth').']|max_length['.$this->config->item('max_password_length','ion_auth').']');
			//$crud->set_rules('email', 'Email','required|valid_email');
			//$crud->columns('username', 'first_name', 'last_name', 'email', 'identifier', 'groupname', 'created_on', 'last_login', 'social_network', 'active');
			$crud->columns('first_name', 'last_name', 'email', 'address','city','postal_code','phone','groupname', 'created_on', 'last_login', 'active');
			$crud->callback_column('created_on', array($this, 'datetime'));
			$crud->callback_column('last_login', array($this, 'datetime'));
			$crud->change_field_type('last_login', 'readonly');
			// $crud -> change_field_type('ip_address', 'readonly');
			$crud->change_field_type('password', 'password');
			$crud->change_field_type('password_confirm', 'password');
			$crud->change_field_type('ip_address', 'readonly');

			$crud->callback_before_insert(array($this, 'insert_encrypt_password_callback'));
			$crud->callback_before_update(array($this, 'edit_encrypt_password_callback'));
			$crud->callback_edit_field('password', array($this, 'decrypt_password_callback'));
			// $crud->callback_edit_field('ip_address', array($this, 'ip_address'));
			//$crud->callback_edit_field('email',array($this,'edit_callback'));
			$crud->callback_edit_field('created_on', array($this, 'datetime'));
			$crud->callback_edit_field('last_login', array($this, 'datetime'));

			$output = $crud->render();

			$this->kekgwpeduliaja($output);

			//$data['output'] = $crud->render();
			//$this->gc_title = 'Administrare Useri';

			//$this->layout->view($this->admin_dir.'gc_data/v_listdata', $data);
		//}catch(Exception $e){
		//	show_error($e->getMessage().' --- '.$e->getTraceAsString());
		//}
	}

	function ip_address($value, $row){
		return @inet_ntop($value);
	}

	function datetime($value, $row){
		return @date('d M Y H:i:s', $value);
	}

	function insert_encrypt_password_callback($post_array, $primary_key=null){
		$this->load->model('ion_auth_model');
		
		//if($post_array['password'] == $post_array['password_confirm']){
			$post_array['password'] = $this->ion_auth_model->hash_password($post_array['password']);
			$post_array['created_on'] = now();

			//return $post_array;
		//}
		return $post_array;
	}

	function edit_encrypt_password_callback($post_array, $primary_key=null){
		$this->load->model('ion_auth_model');

		if($post_array['password'] == 'defaultvalue'){
			unset($post_array['password']);
		}else{
			$post_array['password'] = $this->ion_auth_model->hash_password($post_array['password']);
		}
		return $post_array;
	}

	function decrypt_password_callback($value){
		return "<input type='password' name='password' value='defaultvalue' />";
	}
}