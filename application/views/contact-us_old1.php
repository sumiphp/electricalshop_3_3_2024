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

    

    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/bootstrap.min.css';?>">
    
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/fontawesome.min.css';?>">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/magnific-popup.min.css';?>">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/swiper-bundle.min.css';?>">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/style.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/responsive.css';?>">


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
<div class="breadcumb-wrapper " data-bg-src="<?php echo base_url().'electricalshop/assets/img/e-shop/bg_01.jpg';?>">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="#">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div><!--==============================
Checkout Area
==============================-->
    <div class="space">
        <div class="container">
            <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
                <div class="tinv-header">
                    <h2 class="mb-30">Contact Us</h2>
                </div>

                <?php //print_r($custwishlist);?>
              
                <section>
           
           <div class="contact-banner-sec" style="background:url(<?php //echo base_url().'uploads/contactus/'.$contactus->contactusimg;?>);background-repeat:no-repeat;background-size:cover;">
               <div class="container">
                   <!--div class="row">
                       <div class="main-title">
                           <h2>Contact Us</h2>
                       </div>
                   </div-->
                   <div class="row">

                   <div class="col-lg-6 col-md-6 col-sm-6">
                           <div class="address-sec">
                               <div class="row">
                               <div class="col-lg-1 col-md-1 col-sm-1">
                                   <h4>   <i class="fas fa-location-dot"></i></h4> 
</div>
<div class="col-lg-11 col-md-11 col-sm-11">
                                   <h6><?php 
                                    
                                    //print_r($site);
                                    echo $site->site_address_line1;?></h6>
                                     <h6><?php 
                                    
                                   
                                    echo $site->site_address_line2;?></h6>
                                
                                <h6><?php 
                                    
                                
                                    echo $site->site_city;echo ',';
                                    
                                    $prvid=$site->site_state;
$this->db->where('province_id',$prvid);
$this->db->select('*');
$this->db->from('provinces');
$query = $this->db->get();
$dt= $query->row();
echo $dt->province_name;
echo ',';


$cty=$site->site_country;
$this->db->where('country_id',$cty);
$this->db->select('*');
$this->db->from('countries');
$query = $this->db->get();
$dt= $query->row();
echo $dt->country_name;
                                    
                                    
                                    ?></h6>





<h6>PO Box No <?php 
                                    
                                
                                    echo $site->site_pin;?></h6>
                                
                                
                                
                                </div></div>

<div class="row">
                               <div class="col-lg-1 col-md-1 col-sm-1">

                                   <h4><i class="fa fa-envelope"></i></h4></div>
                                   
                               <div class="col-lg-11 col-md-11 col-sm-11">

                                   
                                   <h6><?=$sitedetails['email_1']?></h6> 
                                   </div></div>

                                   <div class="row">
                               <div class="col-lg-1 col-md-1 col-sm-1">
                                   <h4>   <i class="fa fa-phone"></i></h4>
                                   </div>
                                   <div class="col-lg-11 col-md-11 col-sm-11">
                                   <h6><?=$sitedetails['phone_number_1']?></h6> 
                                   </div> </div>

                              
                           </div>
                       </div>
                     




                       <div class="col-lg-6 col-md-6 col-sm-6">
                           <div class="form-field-section get-touch-form">
                         
                           <div class="location-map">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.9694612837607!2d55.3081646750693!3d25.271612728683053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43d4dc0c74f7%3A0x7e50984d4dc47dba!2sSchneider%20electric%20supplier!5e0!3m2!1sen!2sin!4v1705383017858!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <!--iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1861009.5379097238!2d53.9485752!3d24.3540069!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x844654cd217aedcf%3A0x3f8604d12a1923c0!2spocketfriendlyweb.com!5e0!3m2!1sen!2sin!4v1690610048272!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe-->



                        
                   </div>

                           </div>
                       </div>
                      
                      
                   </div>
           </div>
           </div>
       </section>




               

            </div>
        </div>
    </div>
   
<?php include('footer.php');?>







    <script src="<?php echo base_url().'electricalshop/assets/js/vendor/jquery-3.6.0.min.js';?>"></script>
    <!-- Swiper Js -->
    <script src="<?php echo base_url().'electricalshop/assets/js/swiper-bundle.min.js';?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url().'electricalshop/assets/js/bootstrap.min.js';?>"></script>
    <!-- Magnific Popup -->
    <script src="<?php echo base_url().'electricalshop/assets/js/jquery.magnific-popup.min.js';?>"></script>
    <!-- Counter Up -->
    <script src="<?php echo base_url().'electricalshop/assets/js/jquery.counterup.min.js';?>"></script>
    <!-- Range Slider -->
    <script src="<?php echo base_url().'electricalshop/assets/js/jquery-ui.min.js';?>"></script>
    <!-- Isotope Filter -->
    <script src="<?php echo base_url().'electricalshop/assets/js/imagesloaded.pkgd.min.js';?>"></script>
    <script src="<?php echo base_url().'electricalshop/assets/js/isotope.pkgd.min.js';?>"></script>

        
    <script src="<?php echo base_url().'electricalshop/assets/js/main.js';?>"></script>

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