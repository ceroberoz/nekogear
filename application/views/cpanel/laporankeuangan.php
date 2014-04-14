<!DOCTYPE html>
<html>
    <head>
    	<TITLE>Distro Nekogear Works | Laporan Keuangan</TITLE>
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
                            <?php echo form_open('keuangan/home/print_keuangan');?>
                            <div class="span4">
                                <label>Tanggal Awal :</label>
                                <div class="input-control text" data-role="datepicker"
                                data-date="2013-01-01"
                                data-format="yyyy-mm-dd"
                                data-position="top|bottom"
                                data-effect="none|slide|fade">
                                    <input type="text" name="start_date">
                                    <button class="btn-date"></button>
                                </div>
                            </div>

                            <div class="span4">
                                <label>Tanggal Akhir :</label>
                                <div class="input-control text" data-role="datepicker"
                                data-date="2013-01-01"
                                data-format="yyyy-mm-dd"
                                data-position="top|bottom"
                                data-effect="none|slide|fade">
                                    <input type="text" name="end_date">
                                    <button class="btn-date"></button>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="notice bg-amber fg-white">
                                    <a href="<?php echo base_url('index.php/keuangan/home/print_keuangan');?>"><button class="primary">Periksa Laporan Keuangan</button></a>
                                    <a href="<?php echo base_url('index.php/keuangan/home');?>"><button class="danger">Batal</button></a>
                                </div>
                                
                            </div>
                            <?php echo form_close();?>
                        </div>
                        
                    </div>

                </div>
			</div>
		<div class="text-center" id="footer">
			<small>&copy; 2013 Nekogear Works - All Rights With The World</small>
		</div>
    </body>
</html>