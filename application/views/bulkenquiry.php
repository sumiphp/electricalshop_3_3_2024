<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Electrical Shop </title>
    <meta name="author" content="Electrical Shop">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,100;9..40,200;9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Lexend:wght@300;400;500;600;700;800;900&family=Lobster&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
   
  

    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/bootstrap.min.css';?>">
    
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/fontawesome.min.css';?>">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/magnific-popup.min.css';?>">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/swiper-bundle.min.css';?>">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/style.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/responsive.css';?>">


    <?php $sitedetails = sitedetails(); 
         
        
         
         ?>


<style>
label.error.errpopupmsg {
    position: absolute;
    bottom: -35px;
    color: #f61c0d;
    font-style: italic;
    font-weight: 600;
}

</style>



</head>

<body>


    <!--==============================
     Preloader
  ==============================-->
  <!--div class="preloader ">
       
    <div class="preloader-inner">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div-->
   
<?php include('header.php');?>
<div class="breadcumb-wrapper " data-bg-src="<?php echo base_url().'electricalshop1/assets/img/e-shop/inner-banner-img.png';?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="banner-img">
                    <img src="<?php echo base_url().'electricalshop1/assets/img/e-shop/banner-3.png';?>"/>
                </div>
               
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="inner-banner-content">
                    <h1 class="breadcumb-title">Bulk Enquiry</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                    <a href="tel:+<?=$sitedetails['phone_number_1']?>" class="th-btn call-bnr-btn"><span class="icon-des"><i class="fa fa-phone"></i></span><?=$sitedetails['phone_number_1']?></a>
                
                </div>

            </div>
        </div>
     
    </div>
</div>
    
    
    
    
    
    <!--==============================
Checkout Area
==============================-->
    <div class="space">
        <div class="container">
            <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
                <div class="tinv-header">
                    <h2 class="mb-30">Bulk Enquiry</h2>
                </div>

                <?php //print_r($custwishlist);?>
                <form id="frmcontact" novalidate="true" class="contactForm" method="post" action="<?php echo base_url().'Home/contactenquiryprocess';?>">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="Your Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="Your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" id="phone_number" required="" data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control" required="" data-error="Please enter your subject" placeholder="Your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="producttype" id="producttype" required="" data-error="Please enter Product Type" class="form-control" placeholder="Product Type">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="brand" id="brand" class="form-control" required="" data-error="Please enter your brand" placeholder="Your Brand">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group has-error">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8" required="" data-error="Write your message" placeholder="Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-12 col-md-12 text-center">
                                    <span id='msg' style='color:green' class="h3"></span>
                                    <button type="submit" class="th-btn" style="pointer-events: all; cursor: pointer;">
                                        Send Message
                                    </button>
                                    <div id="msgSubmit" class="h5 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                <!--div class="social-buttons">
                    <span>Share on</span>
                    <ul>
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=permalink" class="social social-facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/share?url=permalink" class="social social-twitter " title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="http://pinterest.com/pin/create/button/?url=permalink" class="social social-pinterest " title="Pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="https://api.whatsapp.com/send?text=permalink" class="social social-whatsapp " title="WhatsApp"><i class="fab fa-whatsapp"></i></a></li>
                        <li><a href="http://vecurosoft.com/products/wordpress/foodelio/wishlist/974b61/" class="social social-clipboard " title="Clipboard"><i class="far fa-clipboard"></i></a></li>
                        <li><a href="mailto:?body=permalink" class="social social-email " title="Email"><i class="far fa-envelope"></i></a></li>
                    </ul>
                </div-->

            </div>
        </div>
    </div>
  

<?php include('footer.php');?>


    <script src="<?php echo base_url().'electricalshop1/assets/js/vendor/jquery-3.6.0.min.js';?>"></script>
    <!-- Swiper Js -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/swiper-bundle.min.js';?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/bootstrap.min.js';?>"></script>
    <!-- Magnific Popup -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/jquery.magnific-popup.min.js';?>"></script>
    <!-- Counter Up -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/jquery.counterup.min.js';?>"></script>
    <!-- Range Slider -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/jquery-ui.min.js';?>"></script>
    <!-- Isotope Filter -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/imagesloaded.pkgd.min.js';?>"></script>
    <script src="<?php echo base_url().'electricalshop1/assets/js/isotope.pkgd.min.js';?>"></script>

        
    <script src="<?php echo base_url().'electricalshop1/assets/js/main.js';?>"></script>

    <script>
function del(id){
$.ajax({
            type: 'GET',
            url: "<?php echo base_url().'index.php/checkout/deletewishlist';?>",
            data:{id:id},
            success:function(data){
                $("#"+id).remove();
                $("#msg").html(data);
            }
        });

}
    
</script>


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



$('form[id="frmcontact"]').validate({  
    rules: {  
      name: 'required',  
      msg_subject: 'required',
      phone_number:'required',  
      email: {  
        required: true,  
        email: true,  
      }, 
      message:"required", 
      producttype:"required",
      brand:"required",
    },  
    messages: {  
      name: 'Name is required',  
      msg_subject: 'Subject is required',  
      phone_number: 'Enter a valid Phone',
      email: 'Enter a valid Email',  
      producttype:"Enter a valid Product Type",
      message:'Please enter Message',
      brand:"Please enter brand", 
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
    
    $("#email").val('');
    $("#message").val('');
    
		$('#msg').html(response);
	}            
      });		
}





      //form.submit();  
   // }  
  }); 
  
  
  




</script>

<script>

$('form[id="frmser"]').validate({  
rules: {  
    serquery: 'required',  
 
},  
messages: {  
    serquery: 'Please enter your Keyword',  
 
},  
submitHandler: function(form) { 
   
    $("#frmser").submit();
      
}

});  



</script>







</body>

</html>