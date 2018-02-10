<?php
$csrf_name  = $this->security->get_csrf_token_name();
$csrf_hash  = $this->security->get_csrf_hash();
?>
    

    <div class="page-header header-filter" style="background-image: url('<?=base_url("template/assets/img/bg7.jpg');");?>" background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">

                        <form class="form" method="post" id="signup-form">
                            <div class="header header-success text-center">
                                <h4 class="card-title">Sign Up</h4>
                                <div class="social-line">

                                </div>
                          </div>
                         
                            <div class="card-content">

                                
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Email..." minlength="10" maxlength="100">
                                     <span class="help-block" id="error"></span>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input type="password" id="password" name="password" placeholder="Password..." class="form-control" minlength="5" maxlength="50"/>
                                    <span class="help-block" id="error"></span>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password..." class="form-control" minlength="5" maxlength="50"/>
                                   <span class="help-block" id="error"></span>
                                </div>
                                 <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons"></i>
                                    </span>
                                    <?=$captcha;?>
                                    <span class="help-block" id="error"></span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">warning</i>
                                    </span>
                                    <input type="text" id="captcha" name="captcha" placeholder="Masukkan angka acak di atas..." class="form-control" minlength="5" maxlength="5"/>
                                    <span class="help-block" id="error"></span>
                                </div>

                              <input type="hidden" name="<?=$csrf_name;?>" value="<?=$csrf_hash;?>"/>
                                <!-- If you want to add a checkbox to this form, uncomment this code

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked>
                                        Subscribe to newsletter
                                    </label>
                                </div> -->
                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-success btn-lg" name="btn-daftar" id="btn-daftar">Sign Up</button>
                                <br>Sudah Punya Akun?<a href="<?=base_url('login');?>" class="btn btn-success btn-simple btn-wd btn-lg">Sign In<div class="ripple-container"></div></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      

    </div>

