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
						

						<div class="page-header">
							<h1>
								Anggota
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Data Anggota
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="space-12"></div>
						

						<!-- ============================== FORM ============== -->
						  <form method="POST">
					<div class="col-xs-11">
						<div class="row">
                                         
	<!-- ============================== KIRI ============== -->
            <div class="col-xs-6">


            		</div>
          
        
        <div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue text-right">
											
										</h3>
				

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header text-center">
											Data Anggota
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div class="dt-buttons btn-overlap btn-group btn-overlap">
										</div>
										<div class="table-responsive">
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															NO
														</th>
														<th>NIM</th>
														<th>Email</th>
														<th >Nama Jujitsan</th>

														<th>
															
															Jenis <br>Kelamin
														</th>
														<th >NO HP</th>

														<th>WhatsApp</th>

														<th>Line</th>
														<th>Ref Code</th>
														<th>Tempat <br> Lahir</th>
														<th>Tanggal Lahir</th>
														<th>Fakultas</th>
														<th>Jurusan</th>

														<th>Angkatan <br> Kuliah</th>
														<th>Angkatan <br> Jujitsu</th>
														<th width="100">Alamat</th>
														
														
													</tr>
												</thead>

												<tbody>
													<?php
													$i = 1;
													
													foreach (json_decode($data_anggota) as $data) {
											 ?>
													<tr>
														<td  id="no" class="text-bold"><?php echo $i++;?></td>
														<td><?=$data->nim;?></td>
														<td><?=$data->email;?></td>
														<td ><?=$data->nama_anggota;?></td>

														<td>
															
															<?=$data->jenis_kelamin;?>
														</td>
														<td ><?=$data->no_hp;?></td>

														<td><?=$data->whatsapp;?></td>

														<td><?=$data->line;?></td>
														<td><?=$data->referral_code;?></th>
														<td><?=$data->tempat_lahir;?></td>
														<td><?=$data->tanggal_lahir;?></td>
														<td><?=$data->fakultas;?></td>
														<td><?=$data->jurusan;?></td>

														<td><?=$data->angkatan_kuliah;?></td>
														<td><?=$data->angkatan_jujitsu;?></td>
														<td width="100"><?=$data->alamat;?></td>

												</tr>
												<?php } ?>
</tbody>
											</table>
										</div>
									</div>
								</div>       
            
                  
		</form>
     
            <div class="col-md-11">
                  <div class="space-24"></div><div class="space-24"></div>


</div>
</div></div>
		
           
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->