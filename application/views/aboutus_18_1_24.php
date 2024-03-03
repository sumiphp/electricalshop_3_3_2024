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
                    <h1 class="breadcumb-title">About Us</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                    <a href="tel:+<?=$sitedetails['phone_number_1']?>" class="th-btn call-bnr-btn"><span class="icon-des"><i class="fa fa-phone"></i></span><?=$sitedetails['phone_number_1']?></a>
                
                </div>

            </div>
        </div>
     
    </div>
</div>
    <div class="space">
        <div class="container">
            <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
                <div class="tinv-header">
                    <h2 class="mb-30">About Us</h2>
                </div>

                <?php //print_r($custwishlist);?>
                <form action="#" method="post" autocomplete="off">
                    

   <!-- About Area -->
   <div class="about-area pt-50 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="about ">
                           <p>At ELECTRICAL SHOPE, we are more than just an electrical equipment supplier; we are your partners in electrifying progress and innovation. With a deep commitment to excellence, we have curated a comprehensive catalog of electrical components to meet your commercial, residential, industrial, manufacturing, and hotel field requirements.</p>
                           <p>Our journey began with a simple yet powerful vision: to simplify acquiring high-quality electrical and automation products while fostering a community of knowledge and expertise. This vision drives us to deliver superior quality, impeccable service, and competitive pricing to empower individuals, businesses, and industries to thrive through efficient, sustainable, and safe electrical solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center pt-50">
                    <div class="col-lg-6 col-md-6 col-xxl-6">
                        <div class="about-vision box-shadow pad">
                            <h2 class="mb-3"><img src="<?=site_url()?>assets/img/about/opportunity.png"/> Our Vision</h2>
                            <p>
                                Our vision is to lead the industry as a premier provider of cutting-edge electrical and automation solutions. We aspire to be recognized globally for our unwavering commitment to innovation, quality, and customer satisfaction.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-xxl-6">
                        <div class="about-mission box-shadow pad">
                            <h2 class="mb-3"><img src="<?=site_url()?>assets/img/about/goal.png"/> Our Mission</h2>
                            <p>
                            ELECTRICAL SHOPE aims to empower our customers by delivering high-quality electrical products and automation solutions that enhance their lives and businesses. We aim to achieve this by continuously innovating and providing exceptional service while adhering to the highest standards of integrity and sustainability.
                            </p>
                        </div>
                     
                    </div>
                </div>
            </div>
         
        </div>
        <!-- About Area End -->

        <div class="quality-product price-bg ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="best-product">
                            <h2 class="mb-3">Quality Products</h2>
                            <p>
                                What sets us apart is our dedicated team of experts. Comprising highly skilled and experienced engineers, we bring a wealth of proficiency to all aspects of our products, solutions, and services.
                            </p>
                            <div class="btn-sec">
                                <a href="#" class="default-btn mt-20">Get Members</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="best-switch text-center">
                            <img src="<?=site_url()?>assets/img/about/about-switch.png"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details pt-50">
                            <p>
                                We take pride in delivering tailored solutions that align with your unique needs. Whether you require MCBs, MCCBs, RCCBs, RCBOs, ACBs, VCBs, timers, overload relays, safety relays, DOL starters, ATSs, VFDs, enclosures, fans, digital panel meters, energy meters, power factor controllers, induction motors, motor protection circuit breakers, on-delay/off-delay timers, inductive sensors, 
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details pt-50">
                            <p>
                                temperature controllers, proximity sensors, limit switches, capacitor switches and sockets, isolators, LED lighting, power and network cables, panel accessories, water level controllers, push buttons, changeover switches, terminal blocks, actuators, valves, network accessories, float switches, hour meters, PLCs, HMIs, or any other electrical product, you can rely on our expertise.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 ptb-50">
                        <div class="product-details">
                            <p>
                                Our commitment to quality and innovation continues to drive us forward, enabling us to evolve and expand our offerings to meet the ever-changing needs of the electrical industry. When you choose ELECTRICAL SHOPE, you choose a trusted partner dedicated to electrifying progress and innovation today and in the future.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                </form>
        

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

</script>






</body>

</html>