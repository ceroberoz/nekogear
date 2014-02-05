<!DOCTYPE html>
<html>
    <head>
    	<TITLE>Distro Nekogear Works | Arsip Transaksi</TITLE>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery-2.0.3.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
    </head>
    <body class="metro">
        <div class="grid">
		    <div class="row">
          <h1><a href="<?php echo base_url();?>"><i class="icon-arrow-left-3" style="color:black"></i></a>&nbsp;Transaksi</h1>
          <small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              berikut adalah arsip transaksi anda di Distro Nekogear Works.</small>
          <hr />

          <div class="span12">
            <small>
              <strong>PENDING</strong> : Pesanan anda sudah kami terima. Silahkan anda membayar pesanan anda sesuai dengan metode pembayaran yang anda pilih.<br />
              <strong>LUNAS</strong> : Pembayaran telah kami terima, pesanan akan segera diproses.<br />
              <strong>TERKIRIM</strong> : Pesanan telah kami kirimkan ke alamat yang terdaftar pada ID anda.<br />
              <strong>BATAL</strong> : Pesanan yang dibatalkan oleh anda dan atau pesanan tidak di bayar dalam waktu satu minggu.

            </small><hr />
             <!-- empty !-->
             <?php foreach($orders as $order):?>                   
            <table class="table bordered text-center">
              <thead>
                <tr>
                  <th># Order</th>
                  <th>Tanggal / Waktu</th>
                  <th>Pembayaran</th>
                  <th>Status Order</th>
                </tr>
              </thead>
              
              <tbody>
                <tr>
                  <td><?php echo $order->order_id;?></td>
                  <td><?php echo $order->order_date;?></td>
                  <td>
                    <?php if($order->status == 'PENDING'):;?>
                    <h2>BELUM BAYAR</h2>
                      <a href="<?php base_url();?>order/payment/<?php echo $order->order_id;?>"><button class="warning">bayar</button></a>
                    <?php else: ;?>
                      <h2>LUNAS</h2>
                  <?php endif;?>
                  </td>
                  <td>
                    <h2><?php echo $order->status;?></h2>
                    <a href="<?php base_url();?>order/detail/<?php echo $order->order_id;?>"><button class="primary">detail pesanan</button></a>
                  </td>
                </tr>
                <?php //foreach($pengiriman as $kirim):?>
                <!-- <tr>
                  <th>CO-NOTE / RESI</th>
                  <th>Tanggal Pengiriman</th>
                  <th>Jasa Pengiriman</th>
                  <th>Status Pengiriman</th>
                </tr>
                <tr>
                  <td><?php echo $kirim->co_note;?></td>
                  <td><?php echo $kirim->shipping_date;?></td>
                  <td><?php echo $kirim->expedition;?></td>
                  <td><?php echo $kirim->status;?></td>
                </tr> -->
                <?php //endforeach;?>
              </tbody>
              
            </table>
            <?php endforeach;?>
          </div>
			</div>
		<div class="text-center" id="footer">
			<small>&copy; 2013 Nekogear Works - All Rights With The World</small>
		</div>
    </body>
</html>