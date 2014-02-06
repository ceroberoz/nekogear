<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('nekogear');
		//$this->load->library('cart');
	}

	function index(){
		if($this->cart->total_items() > 0){
			$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);  	
			$this->load->view('produk/cart');
		}else{
			$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);  	
			echo "<script language='javascript'>alert('Anda belum memesan apa-apa.');
			window.location='http://localhost/nekogear/index.php/cart/redirects'</script>";
		}
	}

	function redirects(){
		redirect($this->session->userdata('refered_from'));
	}

	function add(){
		if($this->nekogear->add_validate()){
			$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);  	
			echo "<script language='javascript'>alert('Stok tidak mencukupi, silahkan cek kembali tabel stok kami.');
			window.location='http://localhost/nekogear/index.php/cart/redirects'</script>";
		}
		else{
			$id 	  = $this->input->post('item_id');	// added via form hidden
			$SKU 	  = $this->input->post('SKU'); 		// added via form hidden
			$category = $this->input->post('category');	// added via form hidden
			$weight	  = $this->input->post('weight'); 	// added via form hidden
			$price	  = $this->input->post('price'); 	// added via form hidden
			$colour	  = $this->input->post('d_color'); 
			$size	  = $this->input->post('d_size');
			$quantity = $this->input->post('quantity');

			$data = array(
				'id' => $id,			 // default
				'name' => $SKU, 		 // default
				'category' => $category,
				'weight' => $weight,
				'price'	=> $price, 		 // default
				'colour' => $colour,
				'size'	=> $size,
				'qty'	=> $quantity 	 // default
				);
			$this->cart->insert($data);
		//redirect('cart');
			$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);  	
			echo "<script language='javascript'>alert('$quantity buah tees $SKU telah ditambahkan ke cart');
			window.location='http://localhost/nekogear/index.php/cart/redirects'</script>";
		}
		
	}

	function update($rowid){
		if($_POST){
            $data = $_POST;
        }
        $this->cart->update($data);
        redirect('cart');
    }

	function clear(){
		$this->cart->destroy();
		//redirect('cart');
		echo "<script language='javascript'>alert('Pesanan dibatalkan.');
			window.location='http://localhost/nekogear/index.php'</script>";
	}

	function delete($rowid) {
		if($this->cart->total_items() > 1){
		    $data = array(
		        'rowid'   => $rowid,
		        'qty'     => 0
		    );

		    $this->cart->update($data);

		    redirect('cart');
		   	}else{
		   		redirect('cart/clear');
		   	}
		    //echo "<pre>";
			//die(print_r($data, TRUE));
	}

	function checkout(){ 
		if (!$this->ion_auth->logged_in()){
		
			redirect('auth/login');
		}
		else{
			if($this->nekogear->cart_validate()){
				$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);  	
				echo "<script language='javascript'>alert('Stok tidak mencukupi, silahkan cek kembali tabel stok kami.');
				window.location='http://localhost/nekogear/index.php/cart/redirects'</script>";
			}
			else{
				$data = $this->nekogear->info_checkout();
				$this->cart->destroy(); // destroy?
				//$this->load->view('produk/checkout',$data);
				echo "<script language='javascript'>alert('Pesanan telah kami terima, silahkan cek menu Transaksi pada sub-menu user.');
				window.location='http://localhost/nekogear/index.php/order'</script>";
			}
		}
	}

}