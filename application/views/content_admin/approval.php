 <div class="content">
                 
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
                                                                                <option value="1">Fakultas Ilmu Komputer </option>
                                                                                <option value="2">Fakultas Kedokteran </option>
                                                                                <option value="3">Fakultas Hukum </option>
                                                                                <option value="4">Fakultas Ilmu Sosial dan Politik </option>
                                                                                <option value="5">Fakultas Ilmu - Ilmu Kesehatan </option>
                                                                                <option value="6">Fakultas Teknik </option>
                                                                                <option value="7">Fakultas Ekonomi dan Bisnis </option>
                                                                                
                                    </select>
                                    <span class="help-block" id="error"></span>
                            </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Jurusan</label>
                              <select class="form-control" data-style="select-with-transition"  title="Pilih Jurusan" data-size="10" id="jurusan" name="jurusan">
                                        
                                        
                                                                                <option id="jurusan" class="1" value="1">S1 - Sistem Informasi </option>
                                                                                <option id="jurusan" class="1" value="2">S1 - Teknik Informatika </option>
                                                                                <option id="jurusan" class="1" value="3">D3 - Manajemen Informatika </option>
                                                                                <option id="jurusan" class="2" value="11">S1  - Kedokteran </option>
                                                                                <option id="jurusan" class="2" value="12">Profesi Dokter </option>
                                                                                <option id="jurusan" class="3" value="19">S1 - Ilmu Hukum </option>
                                                                                <option id="jurusan" class="3" value="20">S2 - Ilmu Hukum  </option>
                                                                                <option id="jurusan" class="4" value="16">S1 - Ilmu Komunikasi </option>
                                                                                <option id="jurusan" class="4" value="17">S1 - Hubungan Internasional </option>
                                                                                <option id="jurusan" class="4" value="18">S1 - Ilmu Politik </option>
                                                                                <option id="jurusan" class="5" value="21">D3 - Keperawatan </option>
                                                                                <option id="jurusan" class="5" value="22">D3 - Fisioterapi </option>
                                                                                <option id="jurusan" class="5" value="23">S1 - Keperawatan </option>
                                                                                <option id="jurusan" class="5" value="24">S1 - Kesehatan Masyarakat </option>
                                                                                <option id="jurusan" class="5" value="25">S1 - Ilmu Gizi </option>
                                                                                <option id="jurusan" class="5" value="26">Profesi Ners </option>
                                                                                <option id="jurusan" class="6" value="13">S1 - Teknik Mesin </option>
                                                                                <option id="jurusan" class="6" value="14">S1 - Teknik Perkapalan </option>
                                                                                <option id="jurusan" class="6" value="15">S1 - Teknik Industri </option>
                                                                                <option id="jurusan" class="7" value="4">S2 - Magister Manajemen </option>
                                                                                <option id="jurusan" class="7" value="5">S1 - Ekonomi Islam </option>
                                                                                <option id="jurusan" class="7" value="6">S1 - Ilmu Ekonomi Pembangunan </option>
                                                                                <option id="jurusan" class="7" value="7">S1 - Manajemen </option>
                                                                                <option id="jurusan" class="7" value="8">S1 - Akutansi </option>
                                                                                <option id="jurusan" class="7" value="9">D3 - Akuntansi </option>
                                                                                <option id="jurusan" class="7" value="10">D3 - Keuangan Dan Perbankan </option>
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
                           <input type="hidden" name="csrf_protection" value="20f1b3a5976cb204415479060d1a3d23"/>
                          
                           
                            <div class="submit text-center">
                                <button type="submit" id="btn-pendaftaran" name="btn-pendaftaran" class="btn btn-success btn-raised btn-square btn-lg" value="Contact Us">Daftar</button>
                            </div>
                            </div>
                        </div>
                                                                          </form>
                                    
            
                
            </div>