<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery-2.0.3.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
    </head>
    <body class="metro">
        <div class="grid">
		    <div class="row">
		    	<div class="span3">
		    		<div class="spacer"><p><br /></p></div>
		    		<div class="spacer"><p><br /></p></div>
		    		<div class="spacer"><p><br /></p></div>
		    		<div class="spacer"><p><br /></p></div>
		    		<nav class="vertical-menu">
					    <ul>
					        <li class="title">Nekogear</li>
					        <li><a href="#">Home</a></li>
					        <li><a href="#">Pre Order</a></li>
					        <li><a href="#">Ready Stock</a></li>
					        <li><a href="#">About</a></li>
					        <li><a href="#">FAQ</a></li>
					    </ul>
					</nav>
		    	</div>

		        <div class="span9">
		        	<h1>Rincian Belanja</h1>
		        	<small>
		        		Berikut adalah <i>tees</i> yang telah kamu beli.<br />
		        		Silahkan transfer total biaya pesanan anda ke XXXXXXXXX a/n XXXXXXXXX
		        		dan mengkonfirmasikan pada halaman <strong>KONFIRMASI PEMBAYARAN</strong>
		        		dengan menyertakan <strong>ORDER ID</strong> yang tertera pada halaman ini agar kami dapat memprosesnya.
		        	</small><hr />
		        	<!-- contents !-->
		        	<div id="resi" class="text-right">
		        		<strong>ORDER ID : <?php echo $resi;?></strong>
		        	</div>
		        	<div id="keterangan">
		        		<p><b>Nama Pembeli  </b>: <?php //echo $ionauth->first_name();?> <?php //echo $ionauth->last_name();?> (<?php //echo $ionauth->username();?>)</p>
		        		<p><b>Tanggal Pesan </b>: <?php echo date('Y-m-d H:i:s');?></p>
		        		<p><b>Status        </b>: PENDING</p>
		        	</div>
		        	<!-- <form method="post" action="cart/update"> -->
		        	<?php echo form_open('cart/update');?>
					<table class="table">
						<thead>
						<tr>
							<th>SKU</th>
							<th>Info Tees</th>
							<th>Kategori</th>
							<th>QTY</th>
							<!-- <th style="text-align:right">Harga</th> -->
							<th style="text-align:right">Sub-Total</th>
							<th></th>
						</tr>
						</thead>
						<?php $i = 1;?>
						<?php foreach($this->cart->contents() as $items): ?>
							<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
							<tbody>
							<tr>
								<td><?php echo $items['name'];?></td>
								<td style="text-align:left"><small>
									<ul><li>Warna: <?php echo $items['colour'];?></li>
										<li>Ukuran: <?php echo $items['size'];?></li>
										<li>Berat: <?php echo $items['weight'];?> Kg</li>
									</ul></small>
								</td>
								<td><?php echo $items['category'];?></td>
								<td><?php echo form_input(array('name' =>$i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></th>
								<td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
								<td style="text-align:right">IDR <?php echo $this->cart->format_number($items['subtotal']); ?></td>								<td>
									<a href="cart/delete/<?php echo $items['rowid'];?>"><i class="icon-cancel"></i></a>
								</td>
							</tr>
							</tbody>
						<?php $i++;?>
						<?php endforeach;?>
						<tfoot>
						<tr>
							<td colspan="4"></td>
							<td class="right" style="text-align:right"><strong>Total</strong></td>
							<td class="right" style="text-align:right">IDR <?php echo $this->cart->format_number($this->cart->total()); ?></td>
							<td></td>
						<tr/>
						</tfoot>
					</table>
					
					<!-- <input type="submit" name="submit" value="Perbarui Keranjang" /> !-->
					<?php echo form_submit('','Perbarui Keranjang');
						  //echo form_submit('cart/clear','Hapus Keranjang','class="danger"');
						  //echo form_submit('cart/checkout','Checkout','class="default"');
					?>
					<?php //echo form_close();?>
				</form>
				<div id="command" class="text-right">
					<!-- <a href=""><button class="warning">Update</button></a> -->
					<a href="cart/clear"><button class="danger">Hapus Keranjang</button></a>
					<a href="cart/checkout"><button class="default">Checkout</button></a>
				</div>
				

		        </div>
		        
		        <div class="span6">
						<!-- reserved for comments !-->
		        </div>
		        
		    </div>
		</div>
		
    </body>
</html>