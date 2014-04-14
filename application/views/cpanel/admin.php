<!DOCTYPE html>
<html>
    <head>
    	<TITLE>Distro Nekogear Works | Admin Panel</TITLE>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">
		<?php foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php endforeach; ?>
		<?php foreach($js_files as $file): ?>
			<script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>
        
        <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
    </head>
    <body class="metro">
        <div class="grid">
		    <div class="row">
		    	<!-- no jquery? -->
		    	<nav class="navigation-bar dark">
				    <nav class="navigation-bar-content">
					    <item class="element"><i class="icon-github-4"></i>&nbsp;Nekogear Works
					    </item>
					    <item class="element-divider"></item>
					    <item class="element"><a href="<?php echo base_url();?>">beranda</a></item>
					    <item class="element">
					    	<a class="dropdown-toggle" href="#">desain</a>
							<ul class="dropdown-menu" data-role="dropdown">							
								<li><a href="<?php echo base_url();?>index.php/admin/home/tema">tema desain</a></li>
								<li><a href="<?php echo base_url();?>index.php/admin/home/desain">hasil desain</a></li>
							</ul>
					    </item>
					    <item class="element"><a href="<?php echo site_url('admin/home/production')?>">produksi</a></item>
					    <item class="element"><a href="<?php echo site_url('admin/home/products')?>">produk</a></item>
					    <item class="element"><a href="<?php echo site_url('admin/home/retur')?>">retur</a></item>
					    <item class="element">
					    	<a class="dropdown-toggle" href="#">member</a>
							<ul class="dropdown-menu" data-role="dropdown">							
								<li><a href="<?php echo base_url();?>index.php/admin/home/members">daftar member</a></li>
								<li><a href="<?php echo base_url();?>index.php/admin/home/groups">group</a></li>
							</ul>
					    </item>
					    <item class="element">
					    	<a class="dropdown-toggle" href="#">pesanan</a>
							<ul class="dropdown-menu" data-role="dropdown">							
								<li><a href="<?php echo base_url();?>index.php/admin/home/order">pesanan</a></li>
								<li><a href="<?php echo base_url();?>index.php/admin/home/komplain">komplain</a></li>
							</ul>
					    </item>
					    <item class="element"><a href="<?php echo site_url('admin/home/vendors')?>">vendor</a></item>
					    <item class="element place-right"><a href="<?php echo base_url();?>index.php/auth/logout">logout</a></item>
				    </nav>
			    </nav>
			    
			    <div class="spacer"><p><br /></p></div>
		    		<?php echo $output; ?>		
		    </div>
		</div>
		<div class="text-center" id="footer"><small>&copy; 2013 Nekogear Works - All Rights With The World</small></div>
    </body>
</html>