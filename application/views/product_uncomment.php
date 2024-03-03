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


</head>

<body>

<?php $sitedetails = sitedetails(); 
    
    $currency = '';
    if (isset($sitecurrency)) {
        $currency = $sitecurrency['currency'];
    }
    
    
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


    
    <div class="preloader ">
       
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
    </div>
    

    <?php include('header.php');?>




   
<div class="breadcumb-wrapper " data-bg-src="<?php echo base_url().'electricalshop1/assets/img/e-shop/inner-banner-img.png';?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="banner-img">
                    <img src="<?php echo base_url().'electricalshop1/assets/img/e-shop/banner-3.png';?>"/>
                </div>
               
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="inner-banner-content">
                    <h1 class="breadcumb-title">CIRCUIT BREAKER Best price </h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                    <a href="#" class="th-btn call-bnr-btn"><span class="icon-des"><i class="fa fa-phone"></i></span> 9843245333</a>
                
                </div>

            </div>
        </div>
     
    </div>
</div>
   

   

 

    <!--==============================
Product list Area  
==============================-->
<section class="mt-50 space-bottom">
    <div class="container">
       
        <div class="product-deatils-area">
            <div class="container">
                
                <div class="product-details pt-50 client-slider owl-carousel owl-theme">
                    <div class="client-item ">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="products-img-box text-center">
                                    <img src="<?php echo base_url().'electricalshop1/assets/img/e-shop/product-details.png';?>"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="product-box-details-area">
    
                                <div class="products-details">
                                    <h2>Schneider Electric</h2>
                                    <p>Switch disconnector, Compact INS40, 40A, standard version with black rotary handle, 3 poles</p>
                                </div>
                                
                                <div class="matrial-details">
                                    <h2>
                                        <img src="<?php echo base_url().'electricalshop1/assets/img/e-shop/logo-details.png';?>"/>
                                    </h2>


                                    <div class="details-table-sec">
                                     
                                        <table id="part" cellspacing="0">
                                            <tr>
                                                <th class="label">
                                                    Part Number :
                                                </th>
                                                <td>
                                                    00000
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="label">
                                                    Availability :
                                                </th>
                                                <td>
                                                    <span class="btn-sec">
                                                        <a href="#" class="default-btn small-btn"> Instock</a>    
                                                        <a href="#" class="default-btn small-btn"> Request </a> 
                                                    </span>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="label">
                                                    SKU :
                                                </th>
                                                <td>
                                                    Schneider
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Country origin :
                                                </th>
                                                <td>
                                                    France
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Price :
                                                </th>
                                                <td>
                                                    <span class="smallText"> AED 1000</span> AED 850 +VAT 
                                                <span class="inner-select">
                                                    <select id="currencyList" class="select-box">
                                                        <option value="AED" selected="selected" label="AED">AED</option>
                                                        <option value="EUR" label="EUR">EUR</option>
                                                        <option value="JPY" label="JPY">JPY</option>
                                                        <option value="USD" label="USD">USD</option>
                                                        </select>
                                                </span> 
                                                </td>

                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Quantity :
                                                </th>
                                                <td>
                                                    <input type="number" id="quantity" name="quantity" min="1" max="5">

                                                </td>
                                            </tr>
                                         
                                    </table>
                                    </div>
    
                                    
                                    <div class="button-area">
                                        <div class="btn-sec mt-30">
                                            <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                            <a href="#" class="th-btn btn-sm ml-20">
                                                  <!-- <img src="assets/img/btn-cart.png"/> -->
                                                Whole Sale Price
                                            </a>
                                        </div>
    
                                        
                                    </div>
                                   
                                </div>
                              
    
                               
    
                                
                               
    
                            
                            </div>
                            </div>
                        </div>
    
    
                        
                        
                    </div>



                    
                    
                </div>
            </div>
        </div>
       
    </div>
</section>

  
  
   <!--==============================
Cta Area  
==============================-->

  
    <?php include('footer.php');?>
    



   

    <script src="<?php echo base_url().'electricalshop1/assets/js/vendor/jquery-3.6.0.min.js';?>"></script>
   
    <script src="<?php echo base_url().'electricalshop1/assets/js/swiper-bundle.min.js';?>"></script>
  
    <script src="<?php echo base_url().'electricalshop1/assets/js/bootstrap.min.js';?>"></script>
  
    <script src="<?php echo base_url().'electricalshop1/assets/js/jquery.magnific-popup.min.js';?>"></script>
   
    <script src="<?php echo base_url().'electricalshop1/assets/js/jquery.counterup.min.js';?>"></script>
   
    <script src="<?php echo base_url().'electricalshop1/assets/js/jquery-ui.min.js';?>"></script>
   
    <script src="<?php echo base_url().'electricalshop1/assets/js/imagesloaded.pkgd.min.js';?>"></script>
    <script src="<?php echo base_url().'electricalshop1/assets/js/isotope.pkgd.min.js';?>"></script>

    
    <script src="<?php echo base_url().'electricalshop1/assets/js/main.js';?>"></script>

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







</body>

</html>