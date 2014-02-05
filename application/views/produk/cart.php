<!DOCTYPE html>
<html>
    <head>
        <TITLE>Distro Nekogear Works | Keranjang Belanja</TITLE>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery-2.0.3.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
    </head>
    <body class="metro">
        <div class="grid">
                 <div class="row">
                         <div class="span3">
                              <h1><a href="cart/redirects" style="color:black"><i class="icon-arrow-left-3"></i></a></h1>
                         </div>

                 <div class="span9">
                         <h1>Keranjang Belanja</h1><hr />
                         <small>
                                 <strong>PENTING!</strong><br />
                                 Silahkan periksa kembali tees yang akan kamu beli, pastikan tidak ada kesalahan warna, ukuran dan jumlah.<br />
                                 Kesalahan pesanan adalah kesalahan pembeli.<br />
                                 Apabila setelah tujuh hari pesanan yang dibuat belum dibayar lunas maka pesanan di anggap batal.
                         </small><hr />
                         <!-- contents !-->
                         
                         <!-- <form method="post" action="cart/update"> -->
                         <?php echo form_open('cart/update');?>
                                        <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>SKU</th>
                                                    <th>Info Tees</th>
                                                    <th>Kategori</th>
                                                    <th>QTY</th>
                                                    <th style="text-align:right">Harga</th>
                                                    <th style="text-align:right">Sub-Total</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <?php $i = 1;?>
                                                <?php foreach($this->cart->contents() as $items): ?>
                                                        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                                        <tbody>
                                                        <tr>
                                                            <td><?php echo $items['name'];?></td>
                                                            <td style="text-align:left">
                                                                <small>
                                                                   Warna: <?php echo $items['colour'];?></br>
                                                                   Ukuran: <?php echo $items['size'];?></br>
                                                                   Berat: <?php echo $items['weight'];?> Kg
                                                                </small>
                                                            </td>
                                                            <td><?php echo $items['category'];?></td>
                                                            <td><?php echo form_input(array('name' =>$i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></th>
                                                            <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                                                            <td style="text-align:right">IDR <?php echo $this->cart->format_number($items['subtotal']); ?></td>                                                                <td>
                                                                    <a href="cart/delete/<?php echo $items['rowid'];?>" style="color:red"><i class="icon-cancel"></i></a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                <?php $i++;?>
                                                <?php endforeach;?>
                                                <tfoot>
                                                <?php $ongkir = $items['weight']*$this->cart->total_items()*10000;?>
                                                <tr>
                                                    <td colspan="4" ></td>
                                                    <td class="right" style="text-align:right"><strong>Ongkos Kirim</strong></td>
                                                    <td class="right" style="text-align:right">IDR <?php echo $this->cart->format_number($ongkir); ?></td>                                                                                      
                                                    <td></td>
                                                <tr/>
                                                <tr>
                                                    <td colspan="4"></td>
                                                    <td class="right" style="text-align:right"><strong>Total</strong></td>
                                                    <?php $totals = $this->cart->total()+$ongkir;?>
                                                    <td class="right" style="text-align:right">IDR <?php echo $this->cart->format_number($totals); ?></td>                                                     
                                                    <td></td>
                                                <tr/>
                                                </tfoot>
                                        </table>
                                        
                                        <!-- <input type="submit" name="submit" value="Perbarui Keranjang" /> !-->
                                        <?php //echo form_submit('','Perbarui Keranjang');
                                                 //echo form_submit('cart/clear','Hapus Keranjang','class="danger"');
                                                 //echo form_submit('cart/checkout','Checkout','class="default"');
                                        ?>
                                        <?php echo form_close();?>
      
                                <div id="command" class="text-right">
                                        <!-- <a href=""><button class="warning">Update</button></a> -->
                                        <a href="cart/redirects"><button class="primary">Kembali Belanja</button></a>
                                        <a href="cart/clear"><button class="danger">Hapus Keranjang</button></a>
                                        <a href="cart/checkout"><button class="default">Checkout</button></a>                 
                                </div>
                                

                 </div>
                
                 <div class="span6">
                                                <!-- reserved for comments !-->
                 </div>
                
                 </div>
                </div>
            <div class="text-center" id="footer"><small>&copy; 2013 Nekogear Works - All Rights With The World</small></div>    
    </body>
</html>