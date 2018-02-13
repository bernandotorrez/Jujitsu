<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <nav class="navbar navbar-success navbar-fixed-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=base_url('Home');?>"> <i class="material-icons">home</i> Home</a>
          </div>

          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
           
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="material-icons">create</i> Pendaftaran
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-with-icons">
              
              
              <li>
                <a href="<?=base_url('Home/pendaftaran');?>">
                 <i class="material-icons">create</i> Mahasiswa UPN
                </a>
              </li>
              <li>
               <a href="<?=base_url('Home/pendaftaran');?>">
                 <i class="material-icons">create</i> Bukan Mahasiswa UPN
                </a>
              </li>

            </ul>
          </li>
          

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="material-icons">lightbulb_outline</i> Informasi
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-with-icons">
                 <li>
                <a href="<?=base_url('Home/tutorial');?>">
                  <i class="material-icons">help</i> Cara Mendaftar
                </a>
              </li>
              <li>
                <a href="<?=base_url('Home/tentang');?>">
                  <i class="material-icons">info</i> Tentang Kami
                </a>
              </li>
            <li>
                <a href="<?=base_url('Home/saran');?>">
                  <i class="material-icons">chat</i> Saran
                </a>
              </li>
              <li>
                <a href="<?=base_url('Home/kontak');?>">
                  <i class="material-icons">email</i> Kontak Kami
                </a>
              </li>
            
            <li>
                <a href="../examples/contact-us.html">
                  <i class="material-icons">people</i> Anggota Terdaftar
                </a>
              </li>
             
              <li>
                <a href="../examples/profile-page.html">
                  <i class="material-icons">public</i> Sitemap
                </a>
              </li>
              
             
            
            </ul>
          </li>
          
          <?php 
          if($this->session->userdata('login_member')){
          ?>

           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="material-icons">person_pin</i> Profile
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-with-icons">
              
              
              <li>
                <a href="<?=base_url('Home/profile');?>">
                 <i class="material-icons">face</i> Profile
                </a>
              </li>
              <li>
                <a href="<?=base_url('logout');?>">
                  <i class="material-icons">power_settings_new</i> Logout
                </a>
              </li>

            </ul>
          </li>
          <?php } elseif($this->session->userdata('login_admin')){ ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="material-icons">settings</i> Admin
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-with-icons">
              
              
              <li>
                <a href="<?=base_url('Admin');?>">
                 <i class="material-icons">build</i> Panel Admin
                </a>
              </li>
              <li>
                <a href="<?=base_url('logout');?>">
                  <i class="material-icons">power_settings_new</i> Logout
                </a>
              </li>

            </ul>
          </li>
          <?php } else { ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="material-icons">fingerprint</i> Sign In / Out
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-with-icons">
              
              
              <li>
                <a href="<?=base_url('login');?>">
                  <i class="material-icons">fingerprint</i> Sign In
                </a>
              </li>
              <li>
                <a href="<?=base_url('register');?>">
                  <i class="material-icons">person_add</i> Sign Up
                </a>
              </li>
              <li>
                <a href="<?=base_url('reset');?>">
                  <i class="material-icons">cached</i> Reset Password
                </a>
              </li>

            </ul>
          </li>
           <?php }  ?>
            </ul>
          </div>
      </div>
    </nav>
