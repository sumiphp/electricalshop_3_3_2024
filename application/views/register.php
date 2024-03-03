<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Electrical Shop </title>
    <meta name="author" content="Electrical Shop">
   

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <!-- <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json"> -->
   

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,100;9..40,200;9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Lexend:wght@300;400;500;600;700;800;900&family=Lobster&display=swap" rel="stylesheet">

   

 
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/bootstrap.min.css';?>">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/fontawesome.min.css';?>">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/magnific-popup.min.css';?>">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/swiper-bundle.min.css';?>">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/style.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/responsive.css';?>">
    <?php $this->load->view('includes/metatags', array('page_title' => $page_title)); ?>


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
                    <h1 class="breadcumb-title">Register</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                    <a href="tel:+<?=$sitedetails['phone_number_1']?>" class="th-btn call-bnr-btn"><span class="icon-des"><i class="fa fa-phone"></i></span><?=$sitedetails['phone_number_1']?></a>
                
                </div>

            </div>
        </div>
     
    </div>
</div>
    <div class="th-checkout-wrapper space-top space-extra-bottom">
        <div class="container">
           
            <div class="row">
                <div class="col-12">
                 
                <h6 style='color:green'><?php echo $this->session->flashdata('flash_msg');?></h6>
                    <form  class="woocommerce-form-login mb-20" novalidate="true" name="frm" id="frm" action="<?php echo base_url().'/home/registerprocess';?>" method="post">


                    <!--form id="frmcontact1" novalidate="true" class="contactForm" method="post" action="<?php //echo base_url().'Home/contactenquiryprocess';?>"-->
                        <div class="form-group">
                            <label>First Name *</label>
                            <input type="text" class="form-control" placeholder="First Name" name="firstname" >
                        </div>
                        <div class="form-group">
                            <label>Last Name *</label>
                            <input type="text" class="form-control" placeholder="Last Name" name="lastname">
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" placeholder="Company Name" name="companyname" >
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="email" >
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="Phone" name="phone" >
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>


                        <div class="form-group">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="remembermylogin">
                                <label for="remembermylogin">I agree to the Terms of User</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="th-btn">Create Account</button>
                            <p class="mt-3 mb-0">HAVE NOT ACCOUNT YET?<a class="text-reset" href="<?php echo base_url().'home/login';?>">Login</a></p>

                        </div>
                    </form>
                </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>


    <script>
   $(function() {
        $("#frm").on('submit', function(e) {
            e.preventDefault();
            var Form = $(this);
            $.ajax({
                url: Form.attr('action'),
                type: 'post',
                data: Form.serialize(),
                processData: false,
        contentType: false,
        cache:false,
        async:false,
                success: function(response){                   
     $('input[type=text]').each(function() {
        $(this).val('');
    });   
              

                }
            });
        });
    });

    </script>



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

});  



$("#sub").click(function(){
$('#newsmsg').html('');
}); 




$('form[id="frm"]').validate({  
    rules: {  
      firstname: 'required',
      lastname: 'required',
      companyname:'required',   
     /* msg_subject: 'required',*/
      phone:'required',  
      email: {  
        required: true,  
        email: true,  
      }, 
     password:{  required: true,
        minlength:8,  
     }
     /* producttype:"required",
      brand:"required",*/
    },  
    messages: {  
      firstname: 'First Name is required',
      lastname: 'Last Name is required',
      companyname:'Company name is required',       
      /*msg_subject: 'Subject is required', */ 
      phone: 'Enter a valid Phone',
      email: 'Enter a valid Email', 
      password: 'Enter a valid Password', 
      /*producttype:"Enter a valid Product Type",
      message:'Please enter Message',
      brand:"Please enter brand", */
    },  
    submitHandler: function(form) { 
      

        e.preventDefault();
            var Form = $(this);
            $.ajax({
                url: Form.attr('action'),
                type: 'post',
                data: Form.serialize(),
                processData: false,
        contentType: false,
        cache:false,
        async:false,
                success: function(response){                   
     $('input[type=text]').each(function() {
        $(this).val('');
    });   
              

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