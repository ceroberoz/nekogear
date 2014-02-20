<!DOCTYPE html>
<html>
    <head>
    	<TITLE>Distro Nekogear Works | Pembayaran</TITLE>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery-2.0.3.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
    </head>
    <body class="metro">
      <div class="grid">
		    <div class="row">          
          <h1><a href="<?php echo base_url();?>index.php/order"><i class="icon-arrow-left-3" style="color:black"></i></a>&nbsp;Pembayaran</h1>
          
          <?php foreach($details as $row):?>
          <small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              berikut adalah form pembayaran pesanan <strong># <?php echo $row->order_id;?></strong><br />
            <?php endforeach;?>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          pembayaran dapat dilakukan dengan cara transfer ke salah satu rekening berikut:<br />
          <?php foreach($bank_tujuan as $row):?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          - <strong><?php echo $row->bank_name;?></strong>: <?php echo $row->bank_account;?> a/n <strong><?php echo $row->owner;?></strong><br />
          <?php endforeach;?>
          
        </small>  
          <hr />  
          <div class="span7">
            <div class="notice bg-red fg-white">
              <small><i class="icon-warning"></i>&nbsp;
          Total tagihan anda adalah IDR
          <?php foreach($details as $row):?>
          <?php echo $this->cart->format_number($row->total_bill);?>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <b><a class="text-right" href="<?php echo base_url();?>order/detail/<?php echo $row->order_id;?>">detail</a></b>
          </small>
          </div>
          <div id="spacer"><br /></div>
             <!-- empty !-->
             <?php echo form_open('order/confirm');?>
             <?php //foreach($details as $row):?>
             <input type="hidden" name="total_bill" value="<?php echo $row->total_bill;?>" />
             <table class="table">
              <tr>
                <td><strong>Order ID</strong></td>
                <td>:</td>
                <td><?php echo $row->order_id;?></td>
                <input type="hidden" name="order_id" value="<?php echo $row->order_id;?>" />
                <!-- <input type="hidden" name="SKU" value="<?php echo $row->SKU;?>" /> -->
                <?php foreach($orders as $row):?>
                  <input type="hidden" name="SKU" value="<?php echo $row->SKU;?>" />
                  <input type="hidden" name="color" value="<?php echo $row->color;?>" />
                  <input type="hidden" name="size" value="<?php echo $row->size;?>" />
                  <input type="hidden" name="qty_i" value="<?php echo $row->quantity;?>" />
                <?php endforeach;?>
              </tr>
              <tr>
                <td><strong>Jenis Pembayaran</strong></td>
                <td>:</td>
                <td>Transfer</td>
              </tr>
              
              <!-- <form method="post" action="<?php echo site_url("order/confirmed");?>"> -->
              <tr>
                <td><strong>Atas Nama</strong></td>
                <td>:</td>
                <td>
                  <div class="input-control text">
                  <input type="text" name="account_holder" value="" placeholder=""/>
                  <button class="btn-clear"></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td><strong>No. Rekening</strong></td>
                <td>:</td>
                <td>
                  <div class="input-control text">
                  <input type="text" name="bank_account" value="" placeholder=""/>
                  <button class="btn-clear"></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td><strong>Bank Asal</strong></td>
                <td>:</td>
                <td>
                  <div class="input-control text">
                  <input type="text" name="bank_origin" value="" placeholder=""/>
                  <button class="btn-clear"></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td><strong>Bank Tujuan</strong></td>
                <td>:</td>
                <td>
                  <div class="input-control select">
                  <select name="bank_destination">
                  <?php foreach($bank_tujuan as $row):?>
                    <option value="<?php echo $row->bank_name;?>"><?php echo $row->bank_name;?></option>
                  <?php endforeach;?>
                  </select>
                  </div>
                </td>
              </tr>
            <?php endforeach;?>
              <tr>
                <td><strong>Jumlah yang dibayar</strong></td>
                <td>:</td>
                <td>
                  <div class="input-control text">
                  <input type="text" name="paid_value" value="" placeholder=""/>
                  <button class="btn-clear"></button>
                  </div>
                </td>
              </tr>
             </table>       
          </div>
          <div class="span1"></div>
          <div class="span4">
            <div class="notice fg-white bg-amber">
              <h4>Penting!</h4><hr />
              <p>Pastikan tidak ada kesalahan pada kolom input <strong>Atas Nama</strong>,
                <strong>No. Rekening</strong>, <strong>Bank Asal</strong> dan
               <strong>Jumlah yang dibayar</strong>.</p>
               <?php foreach($details as $row):?>
              <a href="<?php echo base_url();?>index.php/order/confirm/<?php echo $row->order_id;?>"> <button class="primary">Ya, konfirmasi pembayaran</button></a>
                <!-- </form> -->
                <?php echo form_close();?>
               &nbsp;&nbsp;&nbsp;
              <a href="<?php echo base_url();?>index.php/order/cancel/<?php echo $row->order_id;?>"><button class="danger">Batal</button></a>
              <?php endforeach;?>
            </div>
          </div>
        </div>
        
			</div>
		<div class="text-center" id="footer">
			<small>&copy; 2013 Nekogear Works - All Rights With The World</small>
		</div>
    </body>
</html>