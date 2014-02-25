<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('nekogear');
		//$this->load->model('ion_auth_model');
	}

	function index(){
		if (!$this->ion_auth->logged_in()){		
			redirect('auth/login');
		}else{
			$user = $this->ion_auth->user()->row();
			$email = $user->email;

			$data['orders'] = $this->nekogear->order_info($email);
			$this->load->view('order/home',$data);
		}
	}

	function redirects(){
		redirect($this->session->userdata('refered_from'));
	}

	function detail(){
		if (!$this->ion_auth->logged_in()){		
			redirect('auth/login');
		}else{
			$oid = $this->uri->segment(3);

			$user = $this->ion_auth->user()->row();
			$email = $user->email;

			//$data['produk'] = $this->nekogear->product_info();
			$data['details'] = $this->nekogear->order_detail($oid);
			$data['orders'] = $this->nekogear->order_details($oid);
			$data['users'] = $this->nekogear->user_detail($email);
			$this->load->view('order/detail',$data);
		}
	}

	function payment(){
		if (!$this->ion_auth->logged_in()){		
			redirect('auth/login');
		}else{
			$oid = $this->uri->segment(3);

			$user = $this->ion_auth->user()->row();
			$email = $user->email;

			$data['banks']		 = $this->nekogear->get_banks();
			$data['orders']		 = $this->nekogear->order_details($oid);
			$data['details']	 = $this->nekogear->order_detail($oid);
			$data['users'] 		 = $this->nekogear->user_detail($email);
			$data['bank_tujuan'] = $this->nekogear->get_our_bank();
			$this->load->view('order/payment',$data);
		}
	}

	function confirm_complain(){
		if (!$this->ion_auth->logged_in()){		
			redirect('auth/login');
		}else{
			$namafile = $this->input->post('attach_komplain');

			$config = array(
				'upload_path' 	=> './assets/uploads/complaint/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'max_size'		=> 2048,
				'file_name'		=> $namafile
				);

			$this->load->library('upload', $config);
			$this->upload->do_upload('attach_komplain');

			$this->nekogear->confirm_complaint();
			echo "<script language='javascript'>alert('Komplain telah kami terima, silahkan tunggu balasan via email.');
				 window.location='http://localhost/nekogear/index.php/order'</script>";	
			//$this->load->view('order/complaint',$data);
		}
	}

	function komplain(){
		if (!$this->ion_auth->logged_in()){		
			redirect('auth/login');
		}else{
			$oid = $this->uri->segment(3);
			$user = $this->ion_auth->user()->row();
			$email = $user->email;

			$data['orders'] = $this->nekogear->order_detail($oid);
			$data['complaints'] = $this->nekogear->user_detail($email);
			$this->load->view('order/complaint',$data);
		}
	}

	function confirm(){ // submit form payment
		if (!$this->ion_auth->logged_in()){	
		redirect('auth/login');
		}else{
			$total = $this->input->post('total_bill');
			$paid = $this->input->post('paid_value');
            if($paid < $total){
				$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);
				echo "<script language='javascript'>alert('Biaya yang akan anda transfer kurang, silahkan cek kembali detail pesanan anda.');
				window.location='http://localhost/nekogear/index.php/cart/redirects'</script>";	
     			
				
			}else{
				// input gambar
				$namafile = $this->input->post('struk_bank');

				$config = array(
					'upload_path' 	=> './assets/uploads/payment_order/',
					'allowed_types' => 'jpg|jpeg|gif|png',
					'max_size'		=> 2048,
					'file_name'		=> $namafile
					);

				$this->load->library('upload', $config);
				$this->upload->do_upload('struk_bank');

				$this->nekogear->confirm_payment();

				echo "<script language='javascript'>alert('Pembayaran telah kami terima, silahkan cek menu Transaksi pada sub-menu user.');
				window.location='http://localhost/nekogear'</script>";
			}
		}
	}

	function cancel(){
		if (!$this->ion_auth->logged_in()){		
			redirect('auth/login');
		}else{
			$data = $this->nekogear->confirm_delete();
			echo "<script language='javascript'>alert('Pesanan anda telah dihapus.');
			window.location='http://localhost/nekogear'</script>";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */