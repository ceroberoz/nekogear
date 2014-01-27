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

		        <div class="span6">
		        	<div class="span6">
		        		<!-- reserved for notices !-->
		        	</div>
		        <?php foreach($details as $row): ?>
		        	<h1><?php echo $row->SKU;?></h1>
		        	<small>
		        		<?php echo $row->character_name;?> tees <i>from</i>
		        		<?php echo $row->anime_origin;?> 
		        	</small>
		        	<hr />
		        	<img src="<?php echo base_url().$row->image;?>" class="polaroid">
		        	<blockquote>
		        		<p><?php echo $row->notes;?></p>
		        	</blockquote>
		        <?php endforeach;?>		        
		        	<div class="span6">
		        		<h3>Jumlah Tersedia</h3>		        		
						<table class="table">
			        	<?php foreach($stocks as $row):?>
			        	<tr>
			        		<td><?php echo $row->colour;?></td>
			        		<td><?php echo $row->size;?></td>
			        		<td><?php echo $row->stock_quantity;?></td>
			        	</tr>
			        	<?php endforeach;?>
			        	</table>
						<!-- reserved for comments !-->
		        	</div>
		        </div>
		        <div class="span3">
		        <div class="text-right">
		        <button class="button primary">
				    Login
				</button>
				<button class="button warning">
				    Register
				</button>
			</div>
				<div>
				<div class="spacer"><p><br /></p></div>
				<button class="command-button bg-white">
				    <i class="icon-cart-2 on-left"></i>
				    Keranjang Belanja
				    <small><?php echo $this->cart->total_items();?> tees</small>
				</button>
				<div class="spacer"><p><br /></p></div>
		        <blockquote>
				    <p><h2>Keterangan</h2>
				    <?php foreach($details as $row): ?>
					<ul style="text-left" class="unstyled">
	        			<li>Harga : IDR <?php echo $this->cart->format_number($row->price);?></li>
	        			<li>Tees Material : <?php echo $row->tees_material;?></li>
	        			<li>Jenis Sablon : <?php echo $row->printing_material;?></li>
	        			<li>Ukuran Sablon : <?php echo $row->printing_size;?></li>
	        			<li>Berat : <?php echo $row->weight;?> Kg</li>	
	        		</ul>
	        		<small>Kategori <cite title="kategori"><?php echo $row->category;?></cite></small>
					<?php endforeach;?></p>
				</blockquote>
		        	<form method="post" action="<?php echo site_url("cart/add");?>">
						<div class="input-control select">
							<label>Warna :</label>
							<select class="colour" name="d_color">
							<?php foreach ($colors as $row): ?>
								<option value="<?php echo $row->colour;?>"><?php echo $row->colour; ?></option>
							<?php endforeach;?>
							</select>
						</div>

						<div id="ukuran" class="input-control select">
							<label>Ukuran :</label>
							<select class="size" name="d_size">
							<?php foreach ($sizes as $row): ?>
								<option value="<?php echo $row->size;?>"><?php echo $row->size; ?></option>
							<?php endforeach;?>
							</select>
						</div>
							<?php foreach ($details as $row): ?>
							<div id="jumlah" class="input-control text">
								<label>Jumlah :</label>
								<input type="text" name="quantity" size="3" />
							</div>
							
							<?php $key = date('mdYhis', time());?>
								<input type="hidden" name="item_id" value="<?php echo $key;?><?php echo $row->item_id;?>" />
							<?php $key++;?>	
								<input type="hidden" name="SKU" value="<?php echo $row->SKU;?>" />
								<input type="hidden" name="category" value="<?php echo $row->category;?>" />
								<input type="hidden" name="weight" value="<?php echo $row->weight;?>" />
								<input type="hidden" name="price" value="<?php echo $row->price;?>" />
							<?php endforeach;?>
							<div class="spacer"><p><br /></p></div>
						<div class="input-control button default">
							<button class="default" id="addtocart">Beli</button>											
						</div>
					</form>
		        </div>
		    </div>
		</div>
	</div>
		<div class="text-center" id="footer"><small>&copy; 2013 Nekogear Works - All Rights With The World</small></footer>
    </body>

</html>