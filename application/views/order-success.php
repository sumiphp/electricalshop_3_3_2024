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

    <!--==============================
	    All CSS File
	============================== -->
  


    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/bootstrap.min.css';?>">
  
  <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/fontawesome.min.css';?>">
 
  <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/magnific-popup.min.css';?>">

  <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/swiper-bundle.min.css';?>">

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
   
<!--div class="breadcumb-wrapper " data-bg-src="<?php //echo base_url().'electricalshop/assets/img/e-shop/bg_01.jpg';?>">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Order</h1>
                <ul class="breadcumb-menu">
                    <li><a href="#">Home</a></li>
                    <li>Order</li>
                </ul>
            </div>
        </div>
    </div-->
    
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
                    <h1 class="breadcumb-title">Order</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                    <a href="tel:+<?=$sitedetails['phone_number_1']?>" class="th-btn call-bnr-btn"><span class="icon-des"><i class="fa fa-phone"></i></span><?=$sitedetails['phone_number_1']?></a>
                
                </div>

            </div>
        </div>
     
    </div>
</div>
    
    
    
    
    
    
    <!--==============================
Checkout Arae
==============================-->
    <div class="th-checkout-wrapper space-top space-extra-bottom">
        <div class="container">
           
            <div class="woocommerce-form-coupon-toggle">
            <?php if(!empty($order)){ ?>
                <div class="woocommerce-info">Your order has been placed successfully.</div>
                <?php } else { ?>
                    <div class="woocommerce-info">Your order submission failed.</div>

                    <?php } ?>
            </div>
            
            <h4 class="mt-4 pt-lg-2">Your Order</h4>
            <!--form action="#" class="woocommerce-cart-form"-->





                <table class="cart_table mb-20">
                    <thead>
                        <tr>
                            <th class="cart-col-image">Image</th>
                            <th class="cart-col-productname">Product Name</th>
                            <th class="cart-col-price">Price</th>
                            <th class="cart-col-quantity">Quantity</th>
                            <th class="cart-col-total">Total</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php 


//print_r($order['items']);
                if(!empty($order['items'])){  
                    foreach($order['items'] as $item){ 


                ?>
                        <tr class="cart_item">
                            <td data-title="Product">


                           

                            <?php $imageURL = !empty($item["image"])?base_url('uploads/product_images/'.$item["prod_primary_image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
            <img src="<?=site_url()?>assets/uploads/products/<?=$item['prod_primary_image']?>" width="50"/>



                              
                            </td>
                            <td data-title="Name">
                            <?php echo $item["prod_name"]; ?>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span><?php echo $item["price"].' USD'; ?></bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <strong class="product-quantity"><?php echo $item["quantity"]; ?></strong>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span><?php echo $item["sub_total"].' USD'; ?></bdi></span>
                            </td>
                        </tr>
                        <?php } }else{ ?>
    <tr><td colspan="6"><p>Error in Ordering</p></td>
    <?php } ?>
    <?php if($this->cart->total_items() > 0){ ?>


        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Cart Total</strong></td>
        <td class="text-right"><strong><?php echo '$'.$this->cart->total().' USD'; ?></strong></td>
        <td></td>
    </tr>
    <?php } ?>
                    </tbody>
                    <tfoot class="checkout-ordertable">
                        <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td data-title="Subtotal" colspan="4"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $order['grand_total'].' USD'; ?></bdi></span></td>
                        </tr>
                        <tr class="woocommerce-shipping-totals shipping">
                            <th>Shipping</th>
                            <td data-title="Shipping" colspan="4"> 0.00
                            </td>
                        </tr>
                        <tr class="order-total">
                            <th>Total</th>
                            <td data-title="Total" colspan="4"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $order['grand_total'].' USD'; ?></bdi></span></strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            <!--/form--->
            <div class="mt-lg-3 mb-30">
                <div class="woocommerce-checkout-payment">


                <div class="row col-lg-12 ord-addr-info">
        <div class="hdr">Order Info</div>
        <p><b>Reference ID:</b> #<?php echo $order['id']; ?></p>
        <p><b>Total:</b> <?php echo '$'.$order['grand_total'].' USD'; ?></p>
        <p><b>Placed On:</b> <?php echo $order['created']; ?></p>
        <p><b>Buyer Name:</b> <?php 
        //print_r($custIDdt);
        
        echo $custIDdt->name; ?></p>
        <p><b>Email:</b> <?php echo $custIDdt->email; ?></p>
        <p><b>Phone:</b> <?php echo $custIDdt->phone; ?></p>
    </div>
	








                    <div class="row">
        <div class="col-md-10 mb-3">
        
          <a href="<?php echo base_url();?>" class="th-btn">Continue Shopping</a>
        </div>

        

        <div class="col-md-2 float-right">
        
          <a href="<?php echo base_url().'Home/logout';?>" class="th-btn">Logout</a>
        </div>
      </div>










                        </form>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
	Footer Area
==============================-->
    <!--div class="">
        <div class="container z-index-common">
            <div class="newsletter-wrap">
                <div class="newsletter-content">
                    <h4 class="newsletter-title">Sign Up to Get Updates & News About Us.</h4>
                </div>
                <form class="newsletter-form">
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email Address" required="">
                    </div>
                    <button type="submit" class="th-btn style6">Subscribe</button>
                </form>
            </div>
        </div>
    </div-->

    <?php include('footer.php');?>

  
<!--div class="button__cover">
    <a href="tel:+971 50 964 8779 "><i class="fab fa-whatsapp"></i></a>
    <a href="#" target="_blank"> <i class="fas fa-location-dot"></i> </a>
</div>

    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div-->

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
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

    <!-- Main Js File -->
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
      //$("#catmsg").html(response);                

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





  //form.submit();  
// }  
});  



$("#sub").click(function(){
$('#newsmsg').html('');
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