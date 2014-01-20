<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url();?>css/metro-bootstrap.css">
        <script src="<?php echo base_url();?>js/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>js/jquery/jquery.widget.min.js"></script>
        <script src="<?php echo base_url();?>assets/min/metro.min.js"></script>
    </head>
    <body class="metro">
        <div class="grid">
		    <div class="row">
		    	<div class="span2">right sidebar</div>
		        <div class="span6">
		        <?php foreach($details as $row): ?>
		        	<h1><?php echo $row->SKU;?></h1>
		        	<small>
		        		<?php echo $row->anime_origin;?> <i>feat</i>
		        		<?php echo $row->character_name;?>
		        	</small>
		        	<hr />
		        	<img src="<?php echo $row->image;?>" class="polaroid">
		        	<blockquote>
		        		<p><?php echo $row->notes;?></p>
		        	</blockquote>
		        	<div class="span6">
		        		<strong>Keterangan</strong>
		        		<ul style="text-align:left">
		        			<li>Harga : <?php echo $row->price;?></li>
		        			<li>Tees Material : <?php echo $row->tees_material;?></li>
		        			<li>Jenis Sablon : <?php echo $row->printing_material;?></li>
		        			<li>Ukuran Sablon : <?php echo $row->printing_size;?></li>
		        			<li>Berat : <?php echo $row->weight;?> Kg</li>
		        			<li>Kategori : <?php echo $row->category;?></li>
		        		</ul>
		        	</div>
		        <?php endforeach;?>
		        	<div class="span6">
		        		<?php $key = 0;?>
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
							<input type="hidden" name="item_id" value="<?php echo $key.$row->item_id;?>" />
							<input type="hidden" name="SKU" value="<?php echo $row->SKU;?>" />
							<input type="hidden" name="category" value="<?php echo $row->category;?>" />
							<input type="hidden" name="weight" value="<?php echo $row->weight;?>" />
							<input type="hidden" name="price" value="<?php echo $row->price;?>" />
							<?php endforeach;?>
							<php $key ++;?>
							<input type="submit" name="submit" value="Beli" />
						</form>
		        	</div>
		        </div>
		        <div class="span4">left sidebar</div>
		    </div>
		</div>
    </body>
</html>