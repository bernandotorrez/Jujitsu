<?php
$csrf_name  = $this->security->get_csrf_token_name();
$csrf_hash  = $this->security->get_csrf_hash();
?>
    
	


	<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('https://www.upnvj.ac.id/id/files/thumb/c602629f4cfc1fb29ff6ec6468bb3d92/520');">
		<div class="container">
    		<div class="row">
        		<div class="col-md-8 col-md-offset-2">
                    <h1 class="title">Saran</h1>
                       
                </div>
            </div>
        </div>
	</div>

	<div class="main main-raised">
		<div class="container">
            <div class="about-description text-center">
                <div class="row">
    				<div class="col-md-8 col-md-offset-2">
                            <h2 class="title">Punya Saran? Beritahu Kami</h2>
    					
			</div>

    			</div>
            </div>

            <div class="about-description">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                            <form role="form" id="saran-form" method="post">
                            
                            <div class="form-group label-floating">
                                <label class="control-label">Saran</label>
                                <textarea name="saran" class="form-control" id="saran" rows="6"></textarea>
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
                                <button type="submit" id="btn-saran" name="btn-saran" class="btn btn-success btn-raised btn-square btn-lg" value="Contact Us">Kirim</button>
                            </div>
                        </form>
                        
            </div>
            
                </div>
            </div>
            

            
       </div>
    </div>
