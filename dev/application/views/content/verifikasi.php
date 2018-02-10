
	


	<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('<?=base_url("template/assets/img/bg9.jpg');");?>"">
		<div class="container">
    		<div class="row">
        		<div class="col-md-8 col-md-offset-2">
                    <h1 class="title">Verifikasi</h1>
                       
                </div>
            </div>
        </div>
	</div>

	<div class="main main-raised">
		<div class="container">
            <div class="about-description text-center">
                <div class="row">
    				<div class="col-md-8 col-md-offset-2">
    					<h5 class="description">
                            <?php
                            if($hasil=='Email Tidak Terdaftar'){
                                echo '<div class="alert alert-warning description">Email Tidak Terdaftar!</div>';
                            } else if($hasil=='Verifikasi Berhasil'){
                                echo '<div class="alert alert-success description">Verifikasi Berhasil :)</div>';
                            } else if($hasil=='Verifikasi Gagal description'){
                                echo '<div class="alert alert-success">Verifikasi Gagal :(</div>';
                            } else if($hasil=='Email Sudah Diverifikasi'){
                                echo '<div class="alert alert-primary">Email Sudah Diverifikasi!</div>';
                            } 
                            ?>
                        </h5>
    				</div>
    			</div>
            </div>

            <?php
            if($hasil=='Verifikasi Berhasil' OR $hasil=='Email Sudah Diverifikasi'){

            ?>
            <div class="about-team team-1">
    			<div class="row">
    				<div class="col-md-8 col-md-offset-2 text-center">
    					<h2 class="title">Instruksi Selanjutnya</h2>
    					<h5 class="description">Silahkan Isi Form Pendaftaran Anggota <a href="<?=base_url('Home/pendaftaran');?>">Disini</a>.</h5>
    				</div>
    			</div>

    			

            </div>
            
            <?php } ?>
            
        </div>
    </div>



