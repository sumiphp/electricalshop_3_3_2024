    <!-- Jquery Min JS -->
    <script src="<?=site_url()?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap Bundle Min JS -->
    <script src="<?=site_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <!-- Meanmenu JS -->
    <script src="<?=site_url()?>assets/js/meanmenu.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="<?=site_url()?>assets/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JS -->
    <script src="<?=site_url()?>assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Wow JS -->
    <script src="<?=site_url()?>assets/js/wow.min.js"></script>
    <!-- Ajaxchimp Min JS -->
    <script src="<?=site_url()?>assets/js/jquery.ajaxchimp.min.js"></script>
    <!-- Form Validator Min JS -->
    <script src="<?=site_url()?>assets/js/form-validator.min.js"></script>
    <!-- Contact Form JS -->
    <script src="<?=site_url()?>assets/js/contact-form-script.js"></script>
    <!-- Custom JS -->
    <script src="<?=site_url()?>assets/js/custom.js"></script>

    <script type="text/javascript" src="<?=site_url()?>assets/js/frontend.js?blast=<?=strtotime(mysql_datetime())?>"></script>
    <script src="<?=site_url()?>assets/js/acp/custom_utils.js?blast=<?=strtotime(mysql_datetime())?>"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>

    <script>
   
   $('form[id="frmemail"]').validate({  
    rules: {  
        emailidnews: 'required',  
     
    },  
    messages: {  
        emailidnews: 'Please enter your emailid',  
     
    },  
    submitHandler: function(form) { 
       

            $.ajax({
	url: form.action,
	type: form.method,
	data: $(form).serialize(),
	success: function(response) {
        $('input[type=text]').each(function() {
        $(this).val('');
    });
    
    $('#emailnews').val('');
    
		$('#newsmsg').html(response);
	}            
      });		
}





      //form.submit();  
   // }  
  });  

  $("#sub").click(function(){
    $('#newsmsg').html('');
}); 

  </script>


