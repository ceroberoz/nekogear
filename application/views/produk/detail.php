<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<div id="body">
	<?php foreach ($details as $row): ?>
	<h1><?php echo $row->SKU; ?></h1>
	<small><?php echo $row->anime_origin;?> // <?php echo $row->character_name;?></small>
	<hr />
	<?php endforeach;?>
	<?php echo validation_errors(); ?>
	<form method="post" action="<?php echo site_url("cart/add");?>">
		<select class="colour" name="d_color">
		<?php foreach ($colors as $row): ?>
			<option value="<?php echo $row->colour;?>"><?php echo $row->colour; ?></option>
		<?php endforeach;?>
		</select>

		<select class="size" name="d_size">
			<?php foreach ($sizes as $row): ?>
			<option value="<?php echo $row->size;?>"><?php echo $row->size; ?></option>
		<?php endforeach;?>
		</select>

	<?php foreach ($details as $row): ?>
	<input type="text" name="quantity" size="3" />
	<input type="hidden" name="item_id" value="<?php echo $row->item_id;?>" />
	<input type="hidden" name="SKU" value="<?php echo $row->SKU;?>" />
	<input type="hidden" name="category" value="<?php echo $row->category;?>" />
	<input type="hidden" name="weight" value="<?php echo $row->weight;?>" />
	<input type="hidden" name="price" value="<?php echo $row->price;?>" />
	<?php endforeach;?>
	<input type="submit" name="submit" value="Beli" />
	</form>
		<div id="cart">
		<form method="post" action="<?php echo site_url("cart/update");?>">
			<table>
				<tr>
					<th>SKU</th>
					<th>Info Tees</th>
					<th>QTY</th>
					<th style="text-align:right">Harga</th>
					<th style="text-align:right">Sub-Total</th>
				</tr>
				<?php $i = 1;?>
				<?php foreach($this->cart->contents() as $items): ?>
				<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
				<tr>
					<th>SKU <?php echo $items['SKU']</th>
					<th>Info Tees</th>
					<th>QTY</th>
					<th style="text-align:right">Harga</th>
					<th style="text-align:right">Sub-Total</th>
				</tr>
			</table>
		</form>
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
		</div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>