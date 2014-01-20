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
		<form method="post" action="<?php echo site_url("cart/update");?>">
			<table class="striped">
				<thead>
				<tr>
					<th>SKU</th>
					<th>Info Tees</th>
					<th>Kategori</th>
					<th>QTY</th>
					<th style="text-align:right">Harga</th>
					<th style="text-align:right">Sub-Total</th>
				</tr>
				</thead>
				<?php $i = 1;?>
				<?php foreach($this->cart->contents() as $items): ?>
					<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
					<tbody>
					<tr>
						<th><?php echo $items['name'];?></th>
						<th style="text-align:left"><small>
							<ul>
								<li>Warna: <?php echo $items['colour'];?></li>
								<li>Ukuran: <?php echo $items['size'];?></li>
								<li>Berat: <?php echo $items['weight'];?> Kg</li>
							</ul></small>
						</th>
						<th><?php echo $items['category'];?></th>
						<th><?php echo form_input(array('name' =>$i.'[qty]', 'value' => $items['qty'], 'maxlength' => '2', 'size' => '3')); ?></th>
						<th style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></th>
						<th style="text-align:right">IDR <?php echo $this->cart->format_number($items['subtotal']); ?></th>
					</tr>
					</tbody>
					<?php $i++;?>
				<?php endforeach;?>
				<tfoot>
				<tr>
					<td colspan="4"></td>
					<td class="right"><strong>Total</strong></td>
					<td class="right">IDR <?php echo $this->cart->format_number($this->cart->total()); ?></td>
				<tr/>
				</tfoot>
			</table>
			<input type="submit" name="submit" value="Perbarui Keranjang" />
		</form>
		<a href="cart/clear">hapus</a>
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