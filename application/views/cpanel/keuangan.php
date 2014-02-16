<!DOCTYPE html>
<html>
    <head>
    	<TITLE>Distro Nekogear Works | Keuangan Panel</TITLE>
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
					    <item class="element"><a href="<?php echo site_url('keuangan/home/produksi')?>">biaya pembelian</a></item>
					    <item class="element"><a href="<?php echo site_url('keuangan/home/pesanan')?>">biaya produksi</a></item>
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