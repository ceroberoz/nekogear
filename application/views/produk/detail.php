<!DOCTYPE html>
<html>
    <head>
    <?php foreach($details as $row):?>
    	<TITLE>Distro Nekogear Works | <?php echo $row->SKU;?></TITLE>
    <?php endforeach;?>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery-2.0.3.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
    </head>
    <body class="metro">
        <div class="grid">
		    <div class="row">
		    	<nav class="navigation-bar dark">
				    <nav class="navigation-bar-content">
					    <item class="element"><i class="icon-github-4"></i>&nbsp;Nekogear Works
					    </item>
					    <item class="element-divider"></item>
					    <item class="element"><a href="<?php echo base_url();?>">beranda</a></item>
					    <item class="element">
					    	<a class="dropdown-toggle" href="#">produk</a>
							<ul class="dropdown-menu" data-role="dropdown">
								<li><a href="<?php echo base_url();?>index.php/produk/preorder">Pre Order</a></li>
								<li><a href="<?php echo base_url();?>index.php/produk/readystock">Ready Stock</a></li>
							</ul>
					    </item>
					    <item class="element">
					    	<a class="dropdown-toggle" href="#">bantuan</a>
							<ul class="dropdown-menu" data-role="dropdown">
								<li><a href="#">Pre Order</a></li>
								<li><a href="#">Tabel Ukuran</a></li>
								<li><a href="#">Legal</a></li>
							</ul>
					    </item>
					    <item class="element">tentang</item>
					    <item class="element place-right"><a href="<?php echo base_url();?>index.php/auth">login</a></item>
					    <item class="element place-right"><a href="<?php echo base_url();?>index.php/auth/create_user">daftar</item>
				    </nav>
			    </nav>
		        <div class="span6">
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
		        </div>
		        <div class="spacer"><p><br /></p></div>
		        <div class="spacer"><p><br /></p></div>
		        <div class="spacer"><p><br /></p></div>
		        <div class="spacer"><p><br /></p></div>
		        <div class="span3">
		        <?php foreach($details as $row): ?>
		       	<div class="notice <?php echo $row->label;?> fg-white">
			    <p><h3>Keterangan</h3><hr />
					<ul style="text-left" class="unstyled">
	        			<li>Harga : IDR <?php echo $this->cart->format_number($row->price);?></li>
	        			<li>Tees Material : <?php echo $row->tees_material;?></li>
	        			<li>Jenis Sablon : <?php echo $row->printing_material;?></li>
	        			<li>Ukuran Sablon : <?php echo $row->printing_size;?></li>
	        			<li>Berat : <?php echo $row->weight;?> Kg</li>	
	        		</ul>
	        		<small>Kategori <cite title="kategori"><?php echo $row->category;?></cite></small>

					<?php endforeach;?></p>
			    </div>
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
		        <div class="span3">
				<a href="<?php echo base_url();?>index.php/cart">
				<button class="command-button bg-white">
				    <i class="icon-cart-2 on-left"></i>
				    Keranjang Belanja
				    <small><?php echo $this->cart->total_items();?> tees</small>
				</button>
				</a>

				<div class="spacer"><p><br /></p></div>
		        <blockquote>
				    
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
		<div class="text-center" id="footer"><small>&copy; 2013 Nekogear Works - All Rights With The World</small></div>
    </body>

</html>