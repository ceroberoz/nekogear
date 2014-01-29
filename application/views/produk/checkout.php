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
		    	<div class="span4">
		    		<?php echo form_open('auth/create_user');?>
		    		<div class="input-control text">
		    			<label>Nama Depan</label>
						<input type="text" value="" placeholder="Marco" name="first_name"/>
					</div>
					<div class="input-control text">
		    			<label>Nama Belakang</label>
						<input type="text" value="" placeholder="Polo" name="last_name"/>
					</div>
					<div class="input-control text">
		    			<label>email</label>
						<input type="text" value="" placeholder="username@mail.com" name="email"/>
					</div>
					<div class="input-control text">
		    			<label>No. Handphone</label>
						<input type="text" value="" placeholder="085789090XXX" name="phone"/>
					</div>
					<div class="input-control text">
		    			<label>Password</label>
						<input type="text" value="" placeholder="password" name="password"/>
					</div>
					<div class="input-control text">
		    			<label>Konfirmasi Password</label>
						<input type="password" value="" placeholder="password" name="password_confirm"/>
					</div>
					<button class="btn-primary">Daftarkan saya</button>
					<?php echo form_close();?>
		    	</div>
		    </div>
		</div>
    </body>
</html>