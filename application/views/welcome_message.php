<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">

    <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery-2.0.3.js"></script>
    <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery.ui.widget.min.js"></script>
    <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
</head>
<body class="metro">

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>
	<div>

		<div class="input-control text" data-role="datepicker"
data-date="2013-01-01"
data-format="yyyy-mm-dd"
data-position="top|bottom"
data-effect="none|slide|fade">
<input type="text">
<button class="btn-date"></button>
</div>


		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>