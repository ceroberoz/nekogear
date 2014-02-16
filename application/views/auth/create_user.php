<!DOCTYPE html>
<html>
    <head>
      <TITLE>Distro Nekogear Works | Registrasi Member</TITLE>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/metro-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/metroui/css/custom.css">
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery-2.0.3.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/js/jquery/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url();?>assets/metroui/min/metro.min.js"></script>
    </head>
    <body class="metro">
        <div class="grid">
                <div class="row">
                <h1><a href="<?php echo base_url();?>"><i class="icon-arrow-left-3" style="color:black"></i></a>&nbsp;Registrasi Member</h1>
                <small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    silahkan mengisi form pendaftaran berikut untuk registrasi akun di Distro Nekogear Works.</small>
                <hr />
                <p><?php echo $message;?></p>

                <div class="span3">
                   <!-- empty !-->
                    <?php echo form_open("auth/create_user");?>
                    <div class="input-control text">
                        <label>Email
                        <input type="text" id="email" name="email" placeholder="username@mail.com" />
                        </label>
                    </div>
                    <div class="spacer"><br /></div>
                    <div class="input-control text">
                        <label>Password
                        <input type="password" id="password" name="password" placeholder="password" />
                        </label>
                    </div>
                    <div class="spacer"><br /></div>
                    <div class="input-control text">
                        <label>Konfirmasi Password
                        <input type="password" id="password_confirm" name="password_confirm" placeholder="password" />
                        </label>
                    </div>
                    <div class="spacer"><br /></div>
                </div>
                  <div class="span3">
                    <div class="input-control text">
                        <label>Nama Depan
                        <input type="text" id="first_name" name="first_name" placeholder="Marco" />
                        </label>
                    </div>
                    <div class="spacer"><br /></div>
                    <div class="input-control text">
                        <label>Nama Belakang
                        <input type="text" id="last_name" name="last_name" placeholder="Polo" />
                        </label>
                    </div>
                    <div class="spacer"><br /></div>
                    <div class="input-control text">
                        <label>Alamat
                        <input type="text" id="address" name="address" />
                        </label>
                    </div>
                    <div class="spacer"><br /></div>
                    <div class="input-control select">
                        <label>Kota
                        <!-- <input type="text" id="city" name="city" /> -->
                        <select class="city" name="city">
                            <?php foreach($kota as $city):?>
                                <option value="<?php echo $city['id'];?>"><?php echo $city['name'];?></option>
                            <?php endforeach;?>
                        </select>
                        </label>
                    </div>
                    <div class="spacer"><br /></div>
                    <div class="input-control text">
                        <label>Kode POS
                        <input type="text" id="postal_code" name="postal_code" placeholder="16XXX" />
                        </label>
                    </div>
                    <div class="spacer"><br /></div>
                    <div class="input-control text">
                        <label>No. Handphone
                        <input type="text" id="phone" name="phone" placeholder="085780909XXX" />
                        </label>
                    </div>
                    <div class="spacer"><br />
                         
                    </div>
                    

                </div>
                <div class="span1">
                    <!-- empty !-->
                </div>
                <div class="span4">
                    <div class="notice bg-amber fg-white">
                        <h3>Penting!</h3><hr />
                        <p>Data yang anda berikan akan didaftarkan pada sistem Distro Nekogear Works, lanjutkan?</p>
                        <button class="primary">Ya, buat akun saya</button> 
                            <?php echo form_close();?>
                            <a href="http://localhost/nekogear"><button class="danger">Tidak, batalkan</button></a>
       

                    </div>
                </div>
                  </div>
            <div class="text-center" id="footer">
                  <small>&copy; 2013 Nekogear Works - All Rights With The World</small>
            </div>
    </body>
</html>