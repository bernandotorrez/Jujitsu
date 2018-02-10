<?php
$csrf_name  = $this->security->get_csrf_token_name();
$csrf_hash  = $this->security->get_csrf_hash();
?>
    

	

    <div id="contactUs2Map" class="big-map"></div>

	<div class="main main-raised">
		<div class="contact-content">
    		<div class="container">
            	<h2 class="title">Kirimkan Kami Pesan</h2>
				<div class="row">
					<div class="col-md-6">
						<p class="description">Kamu Bisa Bertanya Tentang Apapun, Kami Akan Membalasnya Secepat Mungkin.<br><br>
						</p>
						<form role="form" id="kontak-form" method="post">
							<div class="form-group label-floating">
								<label class="control-label">Nama Kamu</label>
								<input type="text" name="nama" class="form-control" id="nama" minlength="5" maxlength="50">
                                 <span class="help-block" id="error"></span>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Email Kamu</label>
								<input type="text" name="email" class="form-control" id="email" minlength="5" maxlength="50"/>
                                 <span class="help-block" id="error"></span>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Nomor Handphone</label>
								<input type="text" name="phone" class="form-control" id="phone" minlength="10" maxlength="12"/>
                                 <span class="help-block" id="error"></span>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Pesan</label>
								<textarea name="pesan" class="form-control" id="pesan" rows="6" minlength="5"></textarea>
                                 <span class="help-block" id="error"></span>
							</div>
                               <div class="form-group">
                                
                                <?=$captcha;?>
                                 <span class="help-block" id="error"></span>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Masukkan angka acak di atas</label>
                                <input type="text" id="captcha" name="captcha" class="form-control" minlength="5" maxlength="5"/>
                                 <span class="help-block" id="error"></span>
                            </div>
							<input type="hidden" name="<?=$csrf_name;?>" value="<?=$csrf_hash;?>"/>
							<div class="submit text-center">
								<button type="submit" id="btn-kontak" name="btn-kontak" class="btn btn-success btn-raised btn-round" value="Contact Us">Kirim</button>
							</div>
						</form>
					</div>
                	<div class="col-md-4 col-md-offset-2">
    		        	<div class="info info-horizontal">
    						<div class="icon icon-success">
    							<i class="material-icons">pin_drop</i>
    						</div>
    						<div class="description">
    							<h4 class="info-title">Temukan Kami</h4>
    							<p> Universitas Pembangunan Nasional "Veteran" Jakarta,<br>
                                    12450 Pondok Labu,<br>
                                    Jakarta
    							</p>
    						</div>
    		        	</div>
                        <div class="info info-horizontal">
    						<div class="icon icon-success">
    							<i class="material-icons">phone</i>
    						</div>
    						<div class="description">
    							<h4 class="info-title">Hubungi Kami</h4>
    							<p> Bernand D H<br>
                                    +62 8968 7610 639<br>
                                    Everyday, 8:00-18.00
    							</p>
    						</div>
    		        	</div>
    		        	<div class="info info-horizontal">
    						<div class="icon icon-success">
    							<i class="material-icons">business_center</i>
    						</div>
    						<div class="description">
    							<h4 class="info-title">Informasi</h4>
    							<p> Unit Kegiatan Mahasiswa.<br>
                                    Jujitsu<br>
                                    Universitas Pembangunan "Nasional" Veteran Jakarta<br>
                                   
    							</p>
    						</div>
    		        	</div>
				    </div>
               </div>
            </div>
		</div>
    </div>

