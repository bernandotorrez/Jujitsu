
  $('document').ready(function()
{ 
   $("#update-pass-form").validate({
        rules: {
           
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
           
        },
        //For custom messages
        messages: {
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
      var data = $("#update-pass-form").serialize();
        
      $.ajax({
        
      type : 'POST',
      url  : 'https://jujitsu-upn.online/reset/update_password',
      data : data,
      beforeSend: function()
      { 
        $("#error1").fadeOut();
        $("#btn-update").html('<img src="/template/assets/img/Bars.svg"/>').prop('disabled', true);
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
        toastr.success('Perbarui Password Sukses', {timeOut: 5000});

                      $("#btn-update").html('Perbarui Password Sukses').prop('disabled', true);
                      });
          
         
          } else {
                  
            $("#error1").fadeIn(1000, function(){           
        toastr.info('Perbarui Password Gagal', {timeOut: 5000});
                    $("#btn-update").html('Perbarui').prop('disabled', false);
                  });
          }
        }
      });
        return false;
    }
     /* daftar submit */
});
