
  $('document').ready(function()
{ 
   $("#signup-form").validate({
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
      cpassword: {
        required: true,
        minlength: 5,
        maxlength: 50,
        equalTo: "#password"
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
           cpassword:{
                required: "Isi Password Konfirmasi",
                minlength: "Minimal 5 Karakter",
                 maxlength: "Maksimal 50 Karakter",
                 equalTo: "Password Tidak Sama"
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
      var data = $("#signup-form").serialize();
        
      $.ajax({
        
      type : 'POST',
      url  : 'http://localhost/jujitsu/register/register_member',
      data : data,
      beforeSend: function()
      { 
        $("#error1").fadeOut();
        $("#btn-daftar").html('<img src="/template/assets/img/Bars.svg"/>').prop('disabled', true);
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
                  
            
            $("#error1").fadeIn(1000, function(){           
        toastr.success(''+response+'', {timeOut: 5000});

                      $("#btn-daftar").html('Sign Up').prop('disabled', false);
                      });
          }
          else if(response=="Email sudah terdaftar"){
                  
          
            $("#error1").fadeIn(1000, function(){           
        toastr.warning(''+response+'', {timeOut: 5000});

                      $("#btn-daftar").html('Sign Up').prop('disabled', false);
                      });
          }else if(response=="captcha"){
                  
            
            $("#error").fadeIn(1000, function(){  
            toastr.error('<strong>Captcha </strong>yang kamu masukkan salah!', {timeOut: 5000});         
            $("#btn-daftar").html('Sign Up').prop('disabled', false);
                      });
          } else if(response=="Pendaftaran Sukses! Silahkan Cek Inbox atau Spam Email Anda"){
                  
           
            $("#error1").fadeIn(1000, function(){           
        toastr.success(''+response+'', {timeOut: 5000});

                      $("#btn-daftar").html('Pendaftaran Berhasil').prop('disabled', true);
                      });
          } else {
                  
            $("#error1").fadeIn(1000, function(){           
        toastr.info(''+response+'', {timeOut: 5000});
                    $("#btn-daftar").html('Sign Up');
                  });
          }
        }
      });
        return false;
    }
     /* daftar submit */
});
