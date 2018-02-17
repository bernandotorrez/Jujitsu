<?php
$csrf_name  = $this->security->get_csrf_token_name();
$csrf_hash  = $this->security->get_csrf_hash();
?>
<div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>

                        
                            <li class="active">Anggota</li>
                        </ul><!-- /.breadcrumb -->

                        <div class="nav-search" id="nav-search">
                            <form class="form-search">
                                <span class="input-icon">
                                    
                                </span>
                            </form>
                        </div><!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <div class="ace-settings-container" id="ace-settings-container">
                            <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                                <i class="ace-icon fa fa-cog bigger-130"></i>
                            </div>

                            <div class="ace-settings-box clearfix" id="ace-settings-box">
                                <div class="pull-left width-50">
                                    <div class="ace-settings-item">
                                        <div class="pull-left">
                                            <select id="skin-colorpicker" class="hide">
                                                <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                                <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                                <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                                <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                            </select>
                                        </div>
                                        <span>&nbsp; Choose Skin</span>
                                    </div>

                                    <div class="ace-settings-item">
                                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                                        <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                                    </div>

                                    <div class="ace-settings-item">
                                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                                        <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                                    </div>

                                    <div class="ace-settings-item">
                                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                                        <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                                    </div>

                                    <div class="ace-settings-item">
                                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                                        <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                                    </div>

                                    <div class="ace-settings-item">
                                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                                        <label class="lbl" for="ace-settings-add-container">
                                            Inside
                                            <b>.container</b>
                                        </label>
                                    </div>
                                </div><!-- /.pull-left -->

                                <div class="pull-left width-50">
                                    <div class="ace-settings-item">
                                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                                        <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                                    </div>

                                    <div class="ace-settings-item">
                                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                                        <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                                    </div>

                                    <div class="ace-settings-item">
                                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                                        <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                                    </div>
                                </div><!-- /.pull-left -->
                            </div><!-- /.ace-settings-box -->
                        </div><!-- /.ace-settings-container -->

                        <div class="page-header">
                            <h1>
                                Anggota
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    Approval
                                </small>
                            </h1>
                        </div><!-- /.page-header -->
                        <div class="space-24"></div>
                        

                        <!-- ============================== FORM ============== -->
                          <form method="POST" id="dialog_edit_profile" name="dialog_edit_profile">
                    <div class="col-xs-11">
                        <div class="row">
                                              <input type="hidden" name="txt_tipe" id="txt_tipe" class="form-control" style="width:220px;" value="<?=$this->session->userdata('info');?>" readonly>
                                           <input type="hidden" name="txt_nameapp" id="txt_nameapp" value="<?=$this->session->userdata('info');?>">
                                           <input type="hidden" name="htxt_nameapp" id="htxt_nameapp">
    <!-- ============================== KIRI ============== -->
            <div class="col-xs-6">

                       
                           
                         <div class="row">
                        <div class="form-group">
                        <div class="col-xs-7">
                             <label> Status :  </label>&nbsp;<label id="data" style="color:#4CAF50;"> </label><label id="nodata" style="color:#F44336;"> </label>
                        </div>
                       
                       
                        </div>
                        </div>
                        <div class="space-6"></div>
                        <div class="row">
                        <div class="form-group">
                        <div class="col-xs-7">
                             <label> Approve :  </label>&nbsp;<label id="sudah_approve" style="color:#4CAF50;"> </label><label id="belum_approve" style="color:#F44336;"> </label>
                        </div>
                       
                       
                        </div>
                        </div>
<div class="space-24"></div>
                <div class="row">
                    <div class="form-group">
                    <div class="col-xs-5">
                        <label>Referral Code : </label>
                    </div>
                    <div class="col-xs-4">
                    
                        <input type="text" name="ref_code" id="ref_code" class="form-control" autofocus onkeyup="CheckKey(event)" data-placement="bottom" data-original-title="Referral Code" data-rel="tooltip" title="Referral Code" minlength="5" maxlength="5">
                       <input type="hidden" name="<?=$csrf_name;?>" id="<?=$csrf_name;?>" value="<?=$csrf_hash;?>"/>
                    </div>
                    <div class="col-xs-3">
                    
                        
                        <button type="button" class="btn btn-primary btn-sm" id="btn-search">Search</button> 
                
                    </div>
                    </div>
                    </div>
                    
                    <div class="space-12"></div>
                <div class="row">
                    <div class="form-group">
                    <div class="col-xs-5">
                        <label>NIM : </label>
                    </div>
                    <div class="col-xs-7">
                    <input data-rel="tooltip" class="form-control" type="text" name="nim" id="nim" title="NIM" data-placement="bottom" data-original-title="NIM">
                    </div>
                    </div>
                    </div>
                    <div class="space-2"></div>
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>Nama Jujitsan : </label>
                    </div>
                    <div class="col-xs-7">
                    <input data-rel="tooltip" class="form-control" type="text" name="nama_jujitsan" id="nama_jujitsan" title="Nama Jujitsan" data-placement="bottom" data-original-title="Nama Jujitsan">
                    </div>
                
                    </div>
                    <div class="space-2"></div>
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>No HP : </label>
                    </div>
                    <div class="col-xs-7">
                    <input data-rel="tooltip" class="form-control" type="text" name="no_hp" id="no_hp" title="Nomor Handphone" data-placement="bottom" data-original-title="Nomor Handphone">
                    </div>
                
                    </div>
                    <div class="space-2"></div>
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>Line : </label>
                    </div>
                    <div class="col-xs-7">
                     <input data-rel="tooltip" class="form-control" type="text" name="line" id="line" title="Line" data-placement="bottom" data-original-title="Line">
                    </div>
                
                    </div>
                    <div class="space-2"></div>
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>Tempat Lahir : </label>
                    </div>
                    <div class="col-xs-7">
                    <input data-rel="tooltip" class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" title="Tempat Lahir" data-placement="bottom" data-original-title="Tempat Lahir">
                    </div>
                
                    </div>
                        
                    <div class="space-2"></div>
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>Fakultas : </label>
                    </div>
                    <div class="col-xs-7">
                   

   <input data-rel="tooltip" class="form-control" type="text" name="fakultas" id="fakultas" title="Fakultas" data-placement="bottom" data-original-title="Fakultas">

                    </div>
                
                    </div>
                    

                    <div class="space-2"></div>
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>Angkatan Kuliah : </label>
                    </div>
                    <div class="col-xs-7">
                    <input data-rel="tooltip" class="form-control" type="text" name="angkatan_kuliah" id="angkatan_kuliah" title="Angkatan Kuliah" data-placement="bottom" data-original-title="Angkatan Kuliah">
                    </div>
                
                    </div>

                    <div class="space-2"></div>
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>Alamat : </label>
                    </div>
                    <div class="col-xs-7">
                    
                    <textarea class="form-control" rows="4" id="alamat" name="alamat" title="Alamat" data-placement="bottom" data-original-title="Alamat"></textarea>
                    </div>
                
                    </div>


                    </div>
                    <!-- ============================== KANAN ============== -->
                  <div class="col-xs-6">
                           <div class="row">
                        <div class="form-group">
                        <div class="col-xs-10">
                            <label> Tips :  </label>&nbsp;<label id="tips1" style="color:#0069d9;"> Tekan "CTRL + Q" Untuk Mengosongkan Data</label></label>
                        </div>
                       
                       
                        </div>
                        </div>
                        <div class="space-24"></div>
                         <div class="space-24"></div>
                         <div class="space-24"></div>
                         <div class="space-24"></div>
                         <div class="space-20"></div>
                        <div class="row">
                        <div class="form-group">
                        <div class="col-xs-5">
                              <label>Email : </label>
                        </div>
                        <div class="col-xs-7">
                        
                             <input data-rel="tooltip" class="form-control" type="text" name="email" id="email" title="Email" data-placement="bottom" data-original-title="Email">
                              
                        </div>
                       
                        </div>
                        </div>
                        <div class="space-2"></div>
                <div class="row">
                    
                    <div class="col-xs-5">
                        <label>Jenis Kelamin : </label>
                    </div>
                    <div class="col-xs-7">
                      <input data-rel="tooltip" class="form-control" type="text" name="jenis_kelamin" id="jenis_kelamin" title="Jenis Kelamin" data-placement="bottom" data-original-title="Jenis Kelamin">
                    </div>
                    
                    </div>
                    <div class="space-2"></div>
                    
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>WhatsApp : </label>
                    </div>
                    <div class="col-xs-7">
                     <input data-rel="tooltip" class="form-control" type="text" name="whatsapp" id="whatsapp" title="WhatsApp" data-placement="bottom" data-original-title="WhatsApp">
                    </div>
                
                    </div>

                        <div class="space-2"></div>
                    
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>Refferal Code : </label>
                    </div>
                    <div class="col-xs-7">
                      <input data-rel="tooltip" class="form-control" type="text" name="ref_code1" id="ref_code1" title="Refferal Code" data-placement="bottom" data-original-title="Refferal Code">
                    </div>
                
                    </div>
                    
                        <div class="space-2"></div>
                    
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>Tanggal Lahir : </label>
                    </div>
                    <div class="col-xs-7">
                     <input data-rel="tooltip" class="form-control" type="text" name="tanggal_lahir" id="tanggal_lahir" title="Tanggal Lahir" data-placement="bottom" data-original-title="Tanggal Lahir">
                    </div>
                
                    </div>

                    <div class="space-2"></div>
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>Jurusan : </label>
                    </div>
                    <div class="col-xs-7">
                     <input data-rel="tooltip" class="form-control" type="text" name="jurusan" id="jurusan" title="Jurusan" data-placement="bottom" data-original-title="Jurusan">
                    </div>
                
                    </div>

                    <div class="space-2"></div>
                    <div class="row">
                    
                    <div class="col-xs-5">
                        <label>Angkatan Jujitsu : </label>
                    </div>
                    <div class="col-xs-7">
                    <input data-rel="tooltip" class="form-control" type="text" name="angkatan_jujitsu" id="angkatan_jujitsu" title="Angkatan Jujitsu" data-placement="bottom" data-original-title="Angkatan Jujitsu">
                    </div>
                
                    </div>

                     
                        <div class="space-2"></div>
                        <div class="row">
                        
                        <div class="col-xs-5">
                              <label>Foto : </label>
                        </div>
                        <div class="col-xs-7">
                        <div id="foto">
                        </div>
                        </div>
                  
                        </div>

                

                    </div>

            </div>
            <div class="space-10"></div>
            <div class="col-xs-12 text-center">
              <input class="form-control btn btn-primary" type="button" name="btn_save" id="btn_save" value="Approve" style="width:200px;display:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               
               <input class="form-control btn btn-danger" type=<?php echo ($this->session->userdata('cek') == 'Cabang'?'hidden':'button'); ?> name="btn_update" id="btn_update" value="UPDATE" style="width:200px;display:none;">

            </div>
            </div>

        </form>
            
            
        
           
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->