<!DOCTYPE html>
<html>
    <head>
    	<TITLE>Distro Nekogear Works | Ready Stock</TITLE>
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
			    <div class="spacer"><p><br /></p></div>
		    	<div class="span2">
	    		    <nav class="vertical-menu compact">
				    <ul>
				    	<li class="title">// tees</li>
				    	<li><a href="<?php echo base_url();?>">Tampil Semua</a></li>
				    	<li><a href="<?php echo base_url();?>index.php/produk/preorder">Pre Order</a></li>
				    	<li><a href="<?php echo base_url();?>index.php/produk/readystock">Ready Stock</a></li>
				    </ul>
				    </nav>
		    	</div>

	        	<div class="span10">
	        	<?php foreach($details as $row):?>
	        		<div class="tile double">
	        			<div class="tile-content image">
							<a href="<?php base_url();?>detail/<?php echo $row->item_id;?>"><img src="<?php echo base_url().$row->image;?>"></a>
						</div>
						<div class="brand bg-dark opacity">
							<span class="text" >
								<strong><?php echo $row->SKU;?></strong><br />
								IDR <?php echo $this->cart->format_number($row->price);?> // <?php echo $row->category;?>
							</span>

						</div>
	        		</div>
	        	<?php endforeach;?>
	        	</div>				
		    </div>
		</div>
		<div class="text-center" id="footer"><small>&copy; 2013 Nekogear Works - All Rights With The World</small></div>
    </body>
</html>