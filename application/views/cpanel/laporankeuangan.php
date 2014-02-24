<!DOCTYPE html>
<html>
    <head>
    	<TITLE>Distro Nekogear Works | Lapora Keuangan</TITLE>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery-2.0.3.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
    </head>
    <body class="metro">
        <div class="grid">
		    <div class="row">
                <nav class="navigation-bar dark">
                    <nav class="navigation-bar-content">
                        <item class="element"><i class="icon-github-4"></i>&nbsp;Nekogear Works
                        </item>
                        <item class="element-divider"></item>
                        <item class="element"><a href="<?php echo base_url();?>">beranda</a></item>
                        <item class="element"><a href="<?php echo site_url('keuangan/home/pembayaran_buy')?>">biaya pembelian</a></item>
                        <item class="element"><a href="<?php echo site_url('keuangan/home/pembayaran_pesanan')?>">biaya produksi</a></item>
                        <item class="element"><a href="<?php echo site_url('keuangan/home/laporan_keuangan')?>">laporan keuangan</a></item>
                        <item class="element place-right"><a href="<?php echo base_url();?>index.php/auth/logout">logout</a></item>
                    </nav>
                </nav>
                <hr />
                    <div class="span12">

                        <div class="span12">
                            <?php echo form_open('keuangan/home/laporan_keuangan');?>
                            <div class="span4">
                                <div class="input-control text">
                                    <label>Tanggal Awal :</label>
                                        <input name="start_date" type="text" value="" placeholder="YYYY-MM-DD"/>
                                </div>
                            </div>

                            <div class="span4">
                                <div class="input-control text">
                                    <label>Tanggal Akhir :</label>
                                        <input name="end_date" type="text" value="" placeholder="YYYY-MM-DD"/>
                                </div>
                            </div>

                            <div class="span4">
                                <div class="notice bg-amber fg-white">
                                    <a href="<?php echo base_url('index.php/keuangan/home/laporan_keuangan');?>"><button class="primary">Periksa Laporan Keuangan</button></a>
                                    <a href="<?php echo base_url('index.php/keuangan/home');?>"><button class="danger">Batal</button></a>
                                </div>
                                
                            </div>
                            <?php echo form_close();?>
                        </div>
                        <!-- input tanggal !--> 
                        <div class="span12"><hr /></div>   
                        <!-- tabel payment !-->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID Pemesanan</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>No. Rekening</th>
                                    <th>Bank Asal</th>
                                    <th>Bank Tujuan</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($r_pemesanan as $row):?>
                                <tr>
                                    <td><?php echo $row->order_id;?></td>
                                    <td><?php echo $row->payment_method;?></td>
                                    <td><?php echo $row->bank_account;?></td>
                                    <td><?php echo $row->bank_origin;?></td>
                                    <td><?php echo $row->bank_destination;?></td>
                                    <td><?php echo $row->payment_date;?></td>
                                    <td><?php echo $this->cart->format_number($row->paid_value);?></td>
                                    <td><?php echo $row->status;?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                       </table>

                       <!-- tabel production_pay !-->
                       <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID Produksi</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>No. Rekening</th>
                                    <th>Bank Asal</th>
                                    <th>Bank Tujuan</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($r_pembelian as $row):?>
                                <tr>
                                    <td><?php echo $row->prod_pay_id;?></td>
                                    <td><?php echo $row->payment_type;?></td>
                                    <td><?php echo $row->acc_number;?></td>
                                    <td><?php echo $row->bank_origin;?></td>
                                    <td><?php echo $row->bank_destination;?></td>
                                    <td><?php echo $row->paid_date;?></td>
                                    <td><?php echo $this->cart->format_number($row->paid_value);?></td>
                                    <td><?php echo $row->status;?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                       </table>
                    <hr />
                    <p>Laba/Rugi distro Nekogear Works: <br />
                        <?php foreach($v_pemesanan as $row):?>
                            IDR <?php echo $this->cart->format_number($row->totals);?>
                        <?php endforeach;?>
                         - 
                        <?php foreach($v_pembelian as $row):?>
                            IDR <?php echo $this->cart->format_number($row->totals);?>
                        <?php endforeach;?> =<b> IDR <?php echo $this->cart->format_number($its_magic);?></b>
                    </p>
                    </div>

                </div>
			</div>
		<div class="text-center" id="footer">
			<small>&copy; 2013 Nekogear Works - All Rights With The World</small>
		</div>
    </body>
</html>