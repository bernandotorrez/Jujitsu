<?php
foreach($profil->result() as $data){
    
}

$csrf_name  = $this->security->get_csrf_token_name();
$csrf_hash  = $this->security->get_csrf_hash();
?>
<div class="page-header header-filter" data-parallax="true" 
    style="background-image: url('<?=base_url("template/assets/img/background.jpg');");?>"></div>

    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">

                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                       <div class="profile">
                            <div class="avatar">
                                <?php if($data->foto == ''){ ?>
                                <img src="<?=base_url('template/assets/img/avatar_placeholder.jpg');?>" alt="..." class="img-circle img-responsive img-raised">
                                <?php } else { ?>
                                <img src="<?=base_url('uploads/'.$data->foto);?>" alt="..." class="img-circle img-responsive img-raised">
                                <?php } ?>
                               
                            </div>
                            <div class="name">
                                <h3 class="title"><?php if($cek=='true'){ echo $data->nama_anggota; } else { echo $data->email;}?></h3>
                                <h6><?=$data->level;?>, <?=$response;?></h6>
                                <?php if($cek=='true') { ?>
                                <font class="text-success"><i class="fa fa-whatsapp fa-lg"></i> <?=$data->whatsapp;?></font>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                  
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <?php if($this->session->flashdata('sukses')) { ?>
                    <br>
                    <div class="alert alert-success text-center"><?=$this->session->flashdata('sukses');?></div>
                    <?php } elseif($this->session->flashdata('gagal')) { ?>
                    <br>
                     <div class="alert alert-danger text-center">Upload Foto Gagal, <?=$this->session->flashdata('gagal');?></div>
                     <?php } ?>
                    </div>
             
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="profile-tabs">
                            <div class="nav-align-center">
                                <ul class="nav nav-pills nav-pills-success nav-pills-icons" role="tablist">
                                    <li class="active">
                                        <a href="#work" role="tab" data-toggle="tab">
                                            <i class="material-icons">fingerprint</i>
                                            Data Login
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#connections" role="tab" data-toggle="tab">
                                            <i class="material-icons">face</i>
                                            Data Anggota
                                        </a>
                                    </li>
                                    <li>
                                          <a href="#foto" role="tab" data-toggle="tab">
                                            <i class="material-icons">add_a_photo</i>
                                            Foto
                                        </a>
                                    </li>
                                </ul>


                            </div>
                        </div>
                        <!-- End Profile Tabs -->
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active work" id="work">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 text-center">
                                
                                <div class="row collections">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="card card-contact card-raised">
                <form role="form" id="contact-form" method="post">
                    <div class="header header-raised header-success text-center">
                        <h4 class="card-title">Data Login</h4>
                    </div>
                   
                
                    <div class="col-md-6">
                    <h5><strong>Email : <u><?=$data->email;?></h5></u></strong>
                        </div>
                    
                        
                        
                        <div class="col-md-6">
                    <h5><strong>Level :</strong> <?=$data->level;?></h5>
                        </div>
                        
                        <div class="col-md-6">
                    <h5><strong>Login Time :</strong> <?=tanggal_lengkap($data->login_time);?></h5>
                        </div>
                        
                        <div class="col-md-6">
                    <h5><strong>Logout Time :</strong> <?=tanggal_lengkap($data->logout_time);?></h5>
                        </div>
                        
                        <div class="col-md-12">
                    <h5><strong>Referral Code : <font class="text-warning"><?=$data->referral_code;?></font></strong></h5>
                        </div>
                </form>
            </div>
                                    </div>
                                
                                    
                                </div>
                            </div>
                       
                        </div>
                    </div>
                    <div class="tab-pane connections" id="connections">
                        
                         <div class="col-md-10 col-md-offset-1 text-center">
                                
                                <div class="row collections">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="card card-contact card-raised">
                <form role="form" id="contact-form" method="post">
                    <div class="header header-raised header-success text-center">
                        <h4 class="card-title">Data Anggota</h4>
                    </div>
                        <div class="col-md-12">
                    <h5><strong>WhatsApp : <u><?=$data->whatsapp;?></h5></u></strong>
                        </div>
                    <div class="col-md-6">
                    <h5><strong>Nim : <u><?=$data->nim;?></strong></u></h5>
                        </div>
                
                    <div class="col-md-6">
                    <h5><strong>Email : <u><?=$data->email;?></h5></u></strong>
                        </div>
                    
                        <div class="col-md-6">
                    <h5><strong>Nama :</strong> <?=$data->nama_anggota;?></h5>
                        </div>
                        
                        <div class="col-md-6">
                    <h5><strong>Jenis Kelamin :</strong> <?php if($data->jenis_kelamin =='L') {
                    echo 'Laki - Laki'; } elseif($data->jenis_kelamin =='P') { echo 'Perempuan' ; } else { echo '';}?></h5>
                        </div>
                        
                        <div class="col-md-6">
                    <h5><strong>Tempat Lahir :</strong> <?=$data->tempat_lahir;?></h5>
                        </div>
                        
                        <div class="col-md-6">
                    <h5><strong>Tanggal Lahir :</strong> <?=tanggal($data->tanggal_lahir);?></h5>
                        </div>
                        
                        <div class="col-md-6">
                    <h5><strong>Fakultas :</strong> <?=$data->nama_fakultas;?></h5>
                        </div>
                        
                            
                        <div class="col-md-6">
                    <h5><strong>Jurusan :</strong> <?=$data->nama_jurusan;?></h5>
                        </div>
                        
                            <div class="col-md-6">
                    <h5><strong>No HP :</strong> <?=$data->no_hp;?></h5>
                        </div>
                        
                        <div class="col-md-6">
                    <h5><strong>Line :</strong> <?=$data->line;?></h5>
                        </div>
                        
                        <div class="col-md-12">
                    <h5><strong>Alamat :</strong> <?=$data->alamat;?></h5>
                        </div>
                        
                </form>
            </div>
                    </div>
                  
                </div>
            </div>
        </div>

      
                  <div class="tab-pane connections" id="foto">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 text-center">
                                
                                <div class="row collections">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="card card-contact card-raised">
                                           
                <form role="form" id="contact-form" method="post" action="<?=base_url('Home/upload_foto');?>" enctype='multipart/form-data'>
                    <div class="header header-raised header-success text-center">
                        <h4 class="card-title">Foto</h4>
                    </div>
                   
                     <?php if($cek=='false'){
                            echo '<h4>Silahkan isi form pendaftaran terlebih dahulu</h4>';
                        } else {?>
                    <div class="col-md-6 text-center col-md-offset-3">
                        
                        <h4>Maksimal Size Foto = 500 KB<br> Maksimal Lebar Foto = 1024 Pixel<br> Maksimal Tinggi Foto = 768 Pixel</h4>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail img-circle img-raised">
                                <?php if($data->foto == ''){ $foto = 'Add Photo';?>
                                <img src="<?=base_url('template/assets/img/avatar_placeholder.jpg');?>" alt="...">
                                
                                <?php } else { $foto = 'Change Photo';?>
                                <img src="<?=base_url('uploads/'.$data->foto);?>" alt="...">
                                <?php } ?>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                            <div>
                                <span class="btn btn-raised btn-round btn-default btn-file">
                                    <span class="fileinput-new"><?=$foto;?></span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="userfile" /></span>
                                <br />
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                            </div>
                        </div>
                       
                   
                        <input type="hidden" name="<?=$csrf_name;?>" value="<?=$csrf_hash;?>"/>
                        <div class="submit text-center">
                                <button type="submit" id="btn-kontak" name="btn-kontak" class="btn btn-success btn-raised btn-round" value="Contact Us">Upload</button>
                            </div>
                             <?php } ?>
                        </form>
                        
                        </div>
                </form>
            </div>
                                    </div>
                                
                                     </div>
                                </div>
                            </div>
                       
                        
                    </div>

    </div>
</div></div></div>