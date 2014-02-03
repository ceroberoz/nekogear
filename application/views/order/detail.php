<!DOCTYPE html>
<html>
    <head>
    	<TITLE>Distro Nekogear Works | Detail Pesanan</TITLE>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery-2.0.3.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
    </head>
    <body class="metro">
        <div class="grid">
		    <div class="row">          
          <h1><a href="<?php echo base_url();?>"><i class="icon-arrow-left-3" style="color:black"></i></a>&nbsp;Detail Pesanan</h1>
          
          <?php foreach($details as $row):?>
          <small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              berikut adalah detail pesanan <strong># <?php echo $row->order_id;?></strong></small>
          <?php //endforeach;?>
          <hr />
          
          <div class="span12">
             <!-- empty !-->              
            <table class="table">  
              <thead>
          
                  <tr>
                    <td>
                      <small>
                        <strong>Tanggal Pesan</strong>: <?php echo $row->order_date;?><br />
                        <strong>Tanggal Bayar</strong>: <?php echo $row->payment_date;?><br />
                        <strong>Tanggal Proses</strong>: <?php echo $row->process_date;?><br />
                        <strong>Tanggal Pengiriman</strong>: <?php echo $row->shipping_date;?><br />
                      </small>
                    </td>            
                    <td class="text-right"><img src="<?php echo base_url().$row->bank_logo;?>"></td>
                    <td>
                      <small>
                        <strong>Metode Pembayaran</strong>: <?php echo $row->payment_method;?><br />
                        <strong>Nomor Rekening</strong>: <?php echo $row->bank_account;?><br />
                        <strong>Atas Nama</strong>: <?php echo $row->account_holder;?><br />
                        <strong>Jumlah yang dibayar</strong>: IDR <?php echo $this->cart->format_number($row->paid_value);?><br />
                      </small>
                    </td>
                  </tr>
                  <?php endforeach;?>
                  <tr>
                    <td>
                      <?php foreach($users as $row):?>
                      <small>
                        <strong>Data Pengiriman</strong> <br />
                        <?php echo $row->first_name;?>&nbsp;<?php echo $row->last_name;?><br />
                        <?php echo $row->address;?><br />
                        <?php echo $row->city;?><br />
                        <?php echo $row->postal_code;?><br />
                        <?php echo $row->phone;?><br />
                        <?php echo $row->email;?>
                      </small>
                      <?php endforeach;?>
                    </td>
                    <td></td>
                    <td>
                      <?php foreach($details as $row):?>
                      <small>
                        <strong>Packing</strong>: <?php echo $row->shipping_date;?><br />
                        <strong>Ekspedisi</strong>: <?php echo $row->expedition;?><br />
                        <strong>Co-note / Resi Ekspedisi</strong>: <?php echo $row->co_note;?><br />
                        *tanggal pengiriman biasanya adalah <strong>1 (satu) hari kerja</strong> setelah packing.
                      </small>
                      <?php endforeach;?>
                    </td>
                  </tr>
          
              </thead>
              <table class="table">              
              <tbody>
                <tr>
                  <th class="text-left">QTY</th>
                  <th>Deskripsi Tees</th>
                  <th>Berat</th>
                  <th class="text-right">Harga Satuan</th>
                  <th class="text-right">Sub Total</th>
                </tr>
                <?php foreach($orders as $row):?>
                <tr>
                  <td><?php echo $row->quantity;?></td>
                  <td>
                    <strong><?php echo $row->SKU;?></strong> (<?php echo $row->category;?>)<br />
                    Warna: <?php echo $row->color;?><br />
                    Ukuran: <?php echo $row->size;?>
                  </td>
                  <td class="text-center"><?php echo $row->weight;?> Kg</td>
                  <td class="text-right">IDR <?php echo $this->cart->format_number($row->price);?></td>
                  <td class="text-right">IDR <?php echo $this->cart->format_number($row->price * $row->quantity);?></td>
                </tr>
                <?php endforeach;?>
              </tbody>
              <tfoot>
                <?php foreach($details as $row):?>
                <tr class="text-right">
                  <td colspan="3"></td>
                  <td><strong>Ongkos Kirim</strong></td>
                  <td>IDR <?php echo $this->cart->format_number($row->fees);?></td>
                  <td></td>
                </tr>
                <tr class="text-right">
                  <td colspan="3"></td>
                  <td><strong>Total</strong></td>
                  <td>IDR <?php echo $this->cart->format_number($row->total_bill);?></td>
                  <td></td>
                </tr>
                <?php endforeach;?>
              </tfoot>
              </table>
            </table>
          </div>
			</div>
		<div class="text-center" id="footer">
			<small>&copy; 2013 Nekogear Works - All Rights With The World</small>
		</div>
    </body>
</html>