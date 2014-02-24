<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nekogear extends CI_Model{

	function get_order_payment_info($start_date,$end_date){
		$this->db->select('*')
				 ->from('payment')
				 ->where('payment_date >=',$start_date)
				 ->where('payment_date <=',$end_date)
				 ->where('status','LUNAS');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function get_order_payment_value($start_date,$end_date){
		$this->db//->select('*')
				 ->select('SUM(paid_value) as totals', FALSE)
				 ->from('payment')
				 ->where('payment_date >=',$start_date)
				 ->where('payment_date <=',$end_date)
				 ->where('status','LUNAS');
		$query = $this->db->get();
		//$row = $query->row();
		//$paid_order_total = $row->paid_values;
		if($query->num_rows() > 0){

			return $query->result();
		}
		else{
			return array();
		}
	}

	function get_production_payment_info($start_date,$end_date){
		$this->db->select('*')
				 ->from('production_pay')
				 ->where('paid_date >=',$start_date)
				 ->where('paid_date <=',$end_date)
				 ->where('status','LUNAS');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function get_production_payment_value($start_date,$end_date){
		$this->db//->select('*')
				 ->select('SUM(paid_value) as totals', FALSE)
				 ->from('production_pay')
				 ->where('paid_date >=',$start_date)
				 ->where('paid_date <=',$end_date)
				 ->where('status','LUNAS');
		$query = $this->db->get();
		//$row = $query->row();
		//$paid_order_total = $row->paid_values;
		if($query->num_rows() > 0){

			return $query->result();
		}
		else{
			return array();
		}
	}

	function count_profit($start_date,$end_date){
		// penjualan
		$this->db//->select('*')
				 ->select('SUM(paid_value) as totals', FALSE)
				 ->from('payment')
				 ->where('payment_date >=',$start_date)
				 ->where('payment_date <=',$end_date)
				 ->where('status','LUNAS');

		$penjualan = $this->db->get();
		$jual = $penjualan->row();
		$p_penjualan = $jual->totals;

		// produksi
		$this->db//->select('*')
				 ->select('SUM(paid_value) as totals', FALSE)
				 ->from('production_pay')
				 ->where('paid_date >=',$start_date)
				 ->where('paid_date <=',$end_date)
				 ->where('status','LUNAS');

		$produksi = $this->db->get();
		$beli = $produksi->row();
		$p_produksi = $beli->totals;

		// hitung

		$total = $p_penjualan - $p_produksi;
		return $total;

	}

	function order_info($email){
		$this->db->select('*')
				 ->from('order')
				 ->where('email',$email)
				 ->order_by('order_date','desc')
				 ->group_by('order_id');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function order_detail($oid){
		$this->db->select('*')
				 ->from('order')				 
				 ->join('shipping','shipping.order_id = order.order_id')
				 ->join('payment','payment.order_id = order.order_id')
				 ->join('our_bank_account','our_bank_account.bank_name = payment.bank_destination')
				 ->where('order.order_id',$oid)
				 ->group_by('order.order_id');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function order_details($oid){

		$this->db->select('*')
				 ->from('order_detail')
				 ->join('item','item.SKU = order_detail.SKU')
				 ->where('order_detail.order_id',$oid);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function user_detail($email){
		$this->db->select('first_name, last_name,address, name, postal_code, phone, email')
				 ->from('users')
				 ->join('default_cities','default_cities.id = users.city')
				 ->where('email',$email);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function get_cities(){
		$this->db->select('id,name')
				 ->from('default_cities')
				 ->where('attribute','Kota');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return array();
		}
	}

	function get_our_bank(){
		$this->db->select('*')
				 ->from('our_bank_account');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function get_banks(){
		$this->db->select('*')
				 ->from('banks');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function all_product(){
		$this->db->select('*')
				 ->from('item')
				 ->where('item.published','Y');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function pre_product(){
		$this->db->select('*')
				 ->from('item')
				 ->where('item.published','Y')
				 ->where('item.category','Pre Order');
		$query = $this->db->get('');

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function ready_product(){
		$this->db->select('*')
				 ->from('item')
				 ->where('item.published','Y')
				 ->where('item.category','Ready Stock');
		$query = $this->db->get('');

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function info_item($id){
		$this->db->select('*')
				 ->from('item')
				 ->join('design_theme','design_theme.theme_id = item.anime_origin')
				 ->join('category','category.category = item.category')
				 ->where('item.item_id',$id);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function info_colors($id){
		$this->db->select('item_stock.colour')
				 ->from('items')
				 ->join('item_stock','item_stock.stock_id = items.stock_id')
				 ->where('items.item_id',$id)
				 ->group_by('item_stock.colour');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function info_sizes(){
		$this->db->select('item_stock.size')
				 ->from('items')
				 ->join('item_stock','item_stock.stock_id = items.stock_id')
				 ->group_by('item_stock.size');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function add_validate(){
		$idp = $this->input->post('SKU');
		$idc = $this->input->post('d_color');
		$ids = $this->input->post('d_size');
		$idq = $this->input->post('quantity');

		$this->db->select('item_stock.stock_quantity')
				 ->from('items')
				 ->join('item','item.item_id = items.item_id')
				 ->join('item_stock','item_stock.stock_id = items.stock_id')
				 ->where('item.SKU', $idp)
				 ->where('item_stock.colour', $idc)
				 ->where('item_stock.size', $ids)
				 ->where('item_stock.stock_quantity <',$idq);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function cart_validate(){
		$cart = $this->cart->contents();
		foreach ($cart as $items):
			$SKU	  = $items['name'];
			$size 	  = $items['size'];
			$color 	  = $items['colour'];
			$quantity = $items['qty'];

			$this->db->select('item_stock.stock_quantity')
					 ->from('item')
					 ->join('items','items.item_id = item.item_id')
					 ->join('item_stock','item_stock.stock_id = items.stock_id')
					 ->where('item.SKU',$SKU)
					 ->where('item_stock.colour', $color)
					 ->where('item_stock.size', $size)
					 ->where('item_stock.stock_quantity <',$quantity);

			$query = $this->db->get();
		endforeach;

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}	
	}

	function info_checkout(){
		$ionauth =	$this->ion_auth->user()->row();
		$key = uniqid(); // ganti ke caps
		$resi = strtoupper($key);
		$ongkir = $this->cart->total_items()*0.5*10000;

			$this->order_id 	= $resi;
			$this->order_date	= date('Y-m-d H:i:s');
			$this->email		= "$ionauth->email";
			$this->status 		= "PENDING";
			$this->total_bill	= $this->cart->total()+$ongkir;

			$this->db->insert('order', $this);

			$cart = $this->cart->contents();
			foreach($cart as $items):
				$that = new stdClass();

				$that->order_id 	= $resi;
				$that->SKU 			= $items['name'];
				$that->category		= $items['category'];
				$that->weight		= $items['weight']*$items['qty'];
				$that->color		= $items['colour'];
				$that->size			= $items['size'];
				$that->order_price	= $items['subtotal']; //+$items['weight']*$items['qty']*10000;
				$that->quantity		= $items['qty'];

				$this->db->insert('order_detail', $that);
			endforeach;

			// insert shipping
			$their = new stdClass();

			$their->fees		= $ongkir;
			$their->order_id 	= $resi;
			$this->db->insert('shipping', $their);

			// insert payment
			$those = new stdClass();
			$those->order_id 	= $resi;
			$those->status 		= "PENDING";
			$this->db->insert('payment', $those);

			// insert complaint
			$how = new stdClass();
			$how->order_id = $resi;
			$this->db->insert('order_complaint',$how);
		//endforeach;
	}

	function detail_stock($id){
		$this->db->select('item_stock.colour,item_stock.size,item_stock.stock_quantity')
				 ->from('items')
				 ->join('item','item.item_id = items.item_id')
				 ->join('item_stock','item_stock.stock_id = items.stock_id')
				 ->where('item.item_id',$id);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}


		$something = $query->result();

		foreach($something as $colors):
			$ids	= $this->uri->segment(3);
			$warna 	= $colors->colour;

			$this->db->select('item_stock.colour,item_stock.size,item_stock.stock_quantity')
					 ->from('items')
					 ->join('item','item.item_id = items.item_id')
					 ->join('item_stock','item_stock.stock_id = items.stock_id')
					 ->where('item.item_id',$ids)
					 ->where('item_stock.colour',$warna);

			$query = $this->db->get();
		endforeach;

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function confirm_complaint(){
		$oid = $this->input->post('order_id'); // form hidden
		$email = $this->input->post('email');  // form hidden
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		//$attachment = $this->input->post('attachment');
		//$complaint_date = $this->input->post(date('Y-m-d H:i:s'));
		$date = date('Y-m-d H:i:s');
		$status = $this->input->post('status');

		$apalah = array(
			//'order_id' => $oid,
			'email' => $email,
			'subject' => $subject,
			'message' => $message,
			//'attachment' => $attachment,
			'complaint_date' => $date,
			'status' => $status
			);
		$this->db->where('order_id',$oid);
		$this->db->update('order_complaint',$apalah);
	}

	function confirm_payment(){
		$oid = $this->input->post('order_id');

		// set vars
		//$upload_bukti	  = $this->input->post('struk_bank');
		$account_holder	  = $this->input->post('account_holder');
		$bank_account 	  = $this->input->post('bank_account');
		$bank_origin	  = $this->input->post('bank_origin');
		$bank_destination = $this->input->post('bank_destination');
		$paid_value		  = $this->input->post('paid_value');
		$payment_date 	  = date('Y-m-d H:i:s');
		$payment_method	  = "Transfer";
		$status			  = "LUNAS";
		//

		//$this_is_madness  = "$upload_bukti.png";
		
		$bayar_order = array(
			//
			//'image_verification'=> $image_data['file_name'],
			//
			'payment_method' 	=> $payment_method,
			'bank_account'	 	=> $bank_account,
			'account_holder' 	=> $account_holder,
			'bank_destination' 	=> $bank_destination,
			'paid_value'	 	=> $paid_value,
			'payment_date' 		=> $payment_date,
			'status'			=> $status,
			'bank_origin'		=> $bank_origin
			);
		
		$this->db->where('order_id',$oid);
		$this->db->update('payment',$bayar_order);

		// update tabel order
		$process_status = "PROSES";

		$order = new stdClass();
		$order->status 			= $process_status;
		$order->process_date	= $payment_date;

		$this->db->where('order_id',$oid);
		$this->db->update('order',$order);

		////////////// END OF PAYMENT /////////////
		// ambil data tabel order_detail
		$this->db->select('SKU,size,color,quantity, category')
				 ->from('order_detail')
				 ->where('order_id',$oid);

		$query = $this->db->get();

		// do update !
		foreach($query->result() as $row):
			$SKU = $row->SKU;
			$size = $row->size;
			$color = $row->color;
			$new_qty = $row->quantity;
			$category = $row->category;

			// ambil stok asli
			$stok = $this->db->select('stock_quantity')
							 ->from('item_stock')
							 ->join('items','items.stock_id = item_stock.stock_id')
							 ->join('item','item.item_id = items.item_id')
							//->set('item_stock.stock_quantity','item_stock.stock_quantity -'.$new_qty)
							 ->where('item_stock.colour',$color)
							 ->where('item_stock.size',$size)
							 ->where('item.SKU',$SKU)
							 ->get()
							 ->row();
					 		//->update('item_stock JOIN items ON items.stock_id = item_stock.stock_id JOIN item ON item.item_id = items.item_id');
			// update kategori pre-order
			//if($new_qty > $stok->stock_quantity){
				// error msg
			if($category == "Pre Order"){
				//echo 'Error?';
				$data['stock_quantity'] = $stok->stock_quantity + $new_qty;
				$this->db->where('item_stock.colour',$color)
						 ->where('item_stock.size',$size)
						 ->where('item.SKU',$SKU)
						 ->update('item_stock JOIN items ON items.stock_id = item_stock.stock_id JOIN item ON item.item_id = items.item_id',$data);
			}else{
			// update kategori ready stock
				$data['stock_quantity'] = $stok->stock_quantity - $new_qty;
				$this->db->where('item_stock.colour',$color)
						 ->where('item_stock.size',$size)
						 ->where('item.SKU',$SKU)
						 ->update('item_stock JOIN items ON items.stock_id = item_stock.stock_id JOIN item ON item.item_id = items.item_id',$data);
			}
		endforeach;
		//return $this->db->last_query();
	}

	function confirm_delete(){
		$oid = $this->uri->segment(3);

		// delete dari tabel payment
		$this->db->delete('payment',array('order_id'=>$oid));

		// delete dari tabel order
		$this->db->delete('order',array('order_id'=>$oid));

		// delete dari tabel order_detail (foreach)
			$this->db->delete('order_detail',array('order_id'=>$oid));

		// delete dari tabel shipping
		$this->db->delete('shipping',array('order_id'=>$oid));
	}

}