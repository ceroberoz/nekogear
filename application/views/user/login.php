<!DOCTYPE html>
<html>
    <head>
    	<TITLE>Distro Nekogear Works | Login</TITLE>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery-2.0.3.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
    </head>
    <body class="metro">
        <div class="grid">
		    <div class="row">
                <h1 class="text-center">Login</h1><hr />
                </p><?php echo $this->session->flashdata('error');?></p>
                <div class="span3">
                   <!-- empty !-->
                   <h1><a href="<?php echo base_url();?>"><i class="icon-arrow-left-3" style="color:black"></i></a></h1>
                </div>
                <div class="span2">
                    <img src="<?php echo base_url();?>assets/images/misc/login.png" class="shadow" style="margin:10px 0px 0px 0px">
                </div>
		    	<div class="span4">
                    <?php echo form_open("public/auth/login");?>
                    <div class="input-control text">
                        <label>Email</label>
                        <input type="text" id="identity" value="" name="identity" placeholder="username@mail.com" />
                    </div>
                    <div class="spacer"><br /></div>
                    <div class="input-control text">
                        <label>Password</label>
                        <input type="password" id="password" value="" name="password" placeholder="password" />
                    </div>
                            <div class="spacer"><br /></div>
                            <button class="primary">Masuk</button>                
                    <?php echo form_close();?>

                </div>
			</div>
		<div class="text-center" id="footer">
			<small>&copy; 2013 Nekogear Works - All Rights With The World</small>
		</div>
    </body>
</html>