<!DOCTYPE html>
<html>
<head>
    <TITLE>Distro Nekogear Works | Komplain</TITLE>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">
    <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery-2.0.3.js"></script>
    <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery.ui.widget.min.js"></script>
    <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
</head>
<body class="metro">
    <div class="grid">
        <div class="row">
            <h1><a href="<?php echo base_url();?>index.php/order"><i class="icon-arrow-left-3" style="color:black"></i></a>&nbsp;Detail Pesanan</h1>

              <small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php foreach($orders as $row):?>
                  berikut adalah komplain form <strong># <?php echo $row->order_id;?></strong></small>
                <?php endforeach;?>
              <hr />
            <div class="span4">
                <!-- FORM -->
                <?php foreach($complaints as $row):?>
                <?php echo form_open("order/confirm_complain");?>
                    <div class="input-control text">
                        <label>Email</label>
                        <input type="text" name="email" value="<?php echo $row->email;?>" placeholder="" disabled/>
                    </div>
                    <div class="spacer"><br /></div>
                    <div class="input-control text">
                        <label>Subjek</label>
                        <input type="text" name="subject" value="" placeholder="Subjek Komplain"/>
                    </div>
                    <div class="spacer"><br /></div>
                    <div class="input-control text">
                        <label>Komplain</label>
                        <input type="text" name="message" value="" placeholder="Komplain"/>
                    </div>
                    <div class="spacer"><br /></div>
                    <div class="input-control text">
                        <label>Bukti Foto</label>
                        <input type="file" name="attachment" value="" placeholder="input text"/>
                    </div>
                    <div class="spacer"><br /></div>
                    <?php foreach($orders as $row):?>
                        <input type="hidden" name="order_id" value="<?php echo $row->order_id;?>" />
                    <?php endforeach;?>
                    <input type="hidden" name="email" value="<?php echo $row->email;?>" />
                    <input type="hidden" name="status" value="PENDING" />
                <?php endforeach;?>
            </div>
            <div class="span2">
            </div>
            <div class="span4">
                <!-- EMPTY -->
                <div class="notice fg-white bg-amber">
                    <h3>Penting!</h3><hr />
                    Apakah anda ingin mengirimkan komplain?<br /><br />
                    <a href="<?php echo base_url();?>index.php/order/confirm_complain"><button class="primary">Ya</button></a>
                    <?php echo form_close();?>
                    <a href="<?php echo base_url();?>index.php/order"><button class="danger">Tidak</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>