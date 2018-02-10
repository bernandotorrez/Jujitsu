
    $('document').ready(function()
{ 
   $("#login-form").validate({
        rules: {
           
            email: {
                required: true,
                email:true,
                maxlength: 100,
                minlength: 10
            },
            password: {
        required: true,
        minlength: 5,
        maxlength: 50
      },
      captcha: {
        required: true,
        minlength: 5,
        maxlength: 5,
        number: true
      },
     
        },
        //For custom messages
        messages: {
            email:{
                required: "Isi Email",
                minlength: "Minimal 10 Karakter",
                 maxlength: "Maksimal 100 Karakter",
                 email: "Format Email Salah"
            },
            password:{
                required: "Isi Password",
                minlength: "Minimal 5 Karakter",
                 maxlength: "Maksimal 50 Karakter"
            },
            captcha:{
                required: "Isi Angka Acak Di atas",
                minlength: "Minimal 5 Karakter",
                 maxlength: "Maksimal 5 Karakter",
                 number: "Masukkan Hanya Angka"
            },
           
        },
       
      errorPlacement : function(error, element) {
        $(element).closest('.input-group').find('.help-block').html(error.html());

       },
       highlight : function(element) {
        $(element).closest('.input-group').removeClass('has-success').addClass('has-error');
        
       },
       unhighlight: function(element, errorClass, validClass) {
        $(element).closest('.input-group').removeClass('has-error');
        $(element).closest('.input-group').find('.help-block').html('');
        
       },
      submitHandler: submitForm
     });
     function submitForm()
     {    
      var data = $("#login-form").serialize();
        
      $.ajax({
        
      type : 'POST',
      url  : 'http://localhost/jujitsu/login/login_member',
      data : data,
      beforeSend: function()
      { 
        $("#error").fadeOut();
        $("#btn-login").html('<img src="/jujitsu/template/assets/img/Bars.svg"/>').prop('disabled', true);
      },
      statusCode: {
    403: function() {
        $("#error").fadeIn(1000, function(){            
        toastr.error('Session Anda Habis, Silahkan Reload Halaman Ini', {timeOut: 5000});
        $("#btn-login").html('Sign In').prop('disabled', false);
       
                      
                      });
    }
  },
      success :  function(response)
         {            
          if(response=="ok"){
                  
           
            $("#error").fadeIn(1000, function(){            
        toastr.success('Login Berhasil!', {timeOut: 5000});
        $("#btn-login").html('Login Berhasil').prop('disabled', true);
        setTimeout('location.reload()', 500);
                      
                      });
          }
           else if(response=="Error"){
                  
            
            $("#error").fadeIn(1000, function(){  
            toastr.error('<strong>Email </strong>atau <strong>Kata Sandi</strong> kamu salah!', {timeOut: 5000});         
            $("#btn-login").html('Sign In').prop('disabled', false);
                      });
          }else if(response=="captcha"){
                  
            
            $("#error").fadeIn(1000, function(){  
            toastr.error('<strong>Captcha </strong>yang kamu masukkan salah!', {timeOut: 5000});         
            $("#btn-login").html('Sign In').prop('disabled', false);
                      });
          } else if(response=="Inactive"){
                  
            
            $("#error").fadeIn(1000, function(){  
            toastr.info('<strong>Maaf!</strong> Akun Ini Sudah Tidak Aktif.', {timeOut: 5000});         
            $("#btn-login").html('Sign In').prop('disabled', false);
                      });
          } else if(response=="Verifikasi"){
                  
            
            $("#error").fadeIn(1000, function(){  
            toastr.info('<strong>Maaf!</strong> Akun Ini Belum Di Verifikasi, Cek Inbox Email Kamu.', {timeOut: 5000});         
            $("#btn-login").html('Sign In').prop('disabled', false);
                      });
          } else {
                  
            $("#error").fadeIn(1000, function(){  
                  toastr.info(''+response+'', {timeOut: 5000});   
        
                    $("#btn-login").html('Sign In').prop('disabled', false);
                  });
          }
        }
      });
        return false;
    }
     /* daftar submit */
});

