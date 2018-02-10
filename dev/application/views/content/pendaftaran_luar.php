<?php
$csrf_name  = $this->security->get_csrf_token_name();
$csrf_hash  = $this->security->get_csrf_hash();
?>
    


    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('https://orig00.deviantart.net/68a6/f/2016/204/b/4/female_team_kata_japan__minimalist_by_siawsharingan-dab58s5.png');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="title">Formulir Pendaftaran Anggota</h1>
                       
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="about-description text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                            <h2 class="title">Isi Formulir Pendaftaran Anggota Dibawah Ini</h2>
                        
            </div>

                </div>
            </div>

            <div class="about-description">
                 <?php 
          if($this->session->userdata('login_member')){
          ?>

          <?php 
          $cek = $this->session->userdata('cekPendaftaran');
    if($cek=="true"){
      
    } else { ?>
                 <form role="form" id="pendaftaran-form" method="post">
                <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                                <div class="form-group">
                                <label class="control-label">NIM</label>
                                <input type="text" name="nim" class="form-control" id="nim" minlength="10" maxlength="10" />
                                 <span class="help-block" id="error"></span>
                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label class="control-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" minlength="5" maxlength="50"/>
                                 <span class="help-block" id="error"></span>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                                <div class="form-group">
                                <label class="control-label">Jenis Kelamin</label>
                                <select class="form-control" data-style="select-with-transition"  title="Jenis Kelamin" data-size="10" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value=""> Jenis Kelamin</option>
                                        <option value="L"> Laki - Laki</option>
                                        <option value="P"> Perempuan</option>
                                    </select>
                                 <span class="help-block" id="error"></span>
                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label class="control-label">Nomor Handphone</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp" minlength="10" maxlength="12"/>
                                 <span class="help-block" id="error"></span>
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                            <div class="form-group">
                                <label class="control-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" minlength="3" maxlength="25"/>
                                 <span class="help-block" id="error"></span>
                            </div>
                            </div>
                            <div class="col-md-3">
                                
                            <div class="form-group">
                                <label class="control-label">Tanggal Lahir</label>
                                <input type="text" name="tanggal_lahir" class="form-control datepicker" id="tanggal_lahir" data-date-format='YYYY-MM-DD' />
                                 <span class="help-block" id="error"></span>
                            </div>
                        
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                             <div class="form-group">
                                <label class="control-label">Fakultas</label>
                              <select class="form-control" data-style="select-with-transition"  title="Pilih Fakultas" data-size="10" id="fakultas" name="fakultas">
                                        <option value=""> Pilih Fakultas</option>
                                        <?php
                                        foreach($fakultas->result() as $data){
                                        ?>
                                        <option value="<?=$data->id_fakultas;?>"><?=$data->nama_fakultas;?> </option>
                                        <?php } ?>
                                        
                                    </select>
                                    <span class="help-block" id="error"></span>
                            </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Jurusan</label>
                              <select class="form-control" data-style="select-with-transition"  title="Pilih Jurusan" data-size="10" id="jurusan" name="jurusan">
                                        
                                        
                                        <?php
                                        foreach($jurusan->result() as $data1){
                                        ?>
                                        <option id="jurusan" class="<?=$data1->id_fakultas;?>" value="<?=$data1->id_jurusan;?>"><?=$data1->nama_jurusan;?> </option>
                                        <?php } ?>
                                    </select>
                                    <span class="help-block" id="error"></span>
                            </div>
                        
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                             <div class="form-group">
                                <label class="control-label">Angkatan Kuliah</label>
                              <input type="text" name="angkatan_kuliah" class="form-control" id="angkatan_kuliah" minlength="4" maxlength="4"/>
                              <span class="help-block" id="error"></span>
                            </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Angkatan Jujitsu</label>
                             <input type="text" name="angkatan_jujitsu" class="form-control" id="angkatan_jujitsu" minlength="4" maxlength="4"/>
                             <span class="help-block" id="error"></span>
                            </div>
                        
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                             <div class="form-group">
                                <label class="control-label">LINE</label>
                              <input type="text" name="line" class="form-control" id="line" minlength="3" maxlength="25"/>
                              <span class="help-block" id="error"></span>
                            </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">WhatsApp</label>
                             <input type="text" name="whatsapp" class="form-control" id="whatsapp" minlength="10" maxlength="12"/>
                             <span class="help-block" id="error"></span>
                            </div>
                        
                            </div>
                        </div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                           
                           
                            
                             <div class="form-group label-floating">
                                <label class="control-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="4"></textarea>
                                 <span class="help-block" id="error"></span>
                            </div>
                           <input type="hidden" name="<?=$csrf_name;?>" value="<?=$csrf_hash;?>"/>
                          
                           
                            <div class="submit text-center">
                                <button type="submit" id="btn-pendaftaran" name="btn-pendaftaran" class="btn btn-success btn-raised btn-square btn-lg" value="Contact Us">Daftar</button>
                            </div>
                            </div>
                        </div>
                          <?php } ?>
                        <?php if($this->session->userdata('RefCode') OR $code!='') {?>

                         <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                      <h4>
                      <div class="alert alert-primary text-center">Pendaftaran berhasil, langkah terakhir yang harus kamu lakukan adalah upload foto kamu <a href="<?=base_url('Home/profile');?>"><strong>Disini (Klik Disini)</strong></a> lalu datang ke UKM Jujitsu lalu tunjukan code ini <strong> <?php if($this->session->userdata('RefCode')){ 
                        echo $this->session->userdata('RefCode');
                    } else {
                      echo $code;
                    }
                    ?>
                        
                      </strong></h4></div>
                    </div>
                  </div>
                  <?php } ?>
                        </form>
                        <?php } else {?>
                       <div class="footer text-center">
                                
                                 <br>Kamu Harus Login Dulu Disini<a href="<?=base_url('login');?>" class="btn btn-success btn-simple btn-wd btn-lg">Sign In<div class="ripple-container"></div></a>
                                </div>
                        <?php } ?>
            
            
                
            </div>
            

            
       </div>
    
</div>