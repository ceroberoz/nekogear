<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/metro-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
        <script src="<?php echo base_url();?>assets/js/jquery/jquery-2.0.3.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url();?>assets/min/metro.min.js"></script>
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
		        	<h1>Keranjang Belanja</h1>
		        	<small>
		        		Silahkan periksa kembali tees yang akan kamu beli.
		        	</small>
		        	<!-- contents !-->
		        	<?php $i = 1;?>
						<?php foreach($this->cart->contents() as $items): ?>
		        	<form method="post" action="cart/update/<?php echo $items['rowid'];?>">
					<table class="table">
						<thead>
						<tr>
							<th>SKU</th>
							<th>Info Tees</th>
							<th>Kategori</th>
							<th>QTY</th>
							<th style="text-align:right">Harga</th>
							<th style="text-align:right">Sub-Total</th>
							<th></th>
						</tr>
						</thead>
						
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
								<td><?php echo form_input(array('name' =>'[qty]', 'value' => $items['qty'], 'maxlength' => '2', 'size' => '3')); ?></th>
								<td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
								<td style="text-align:right">IDR <?php echo $this->cart->format_number($items['subtotal']); ?></td>
								<td>
									<a href="cart/delete/<?php echo $items['rowid'];?>"><i class="icon-cancel"></i></a>
								</th>
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
					<input type="submit" name="submit" value="Perbarui Keranjang" />
				</form>
				<div id="command" class="text-right">
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