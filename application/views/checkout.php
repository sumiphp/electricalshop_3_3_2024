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
  
<!--div class="breadcumb-wrapper " data-bg-src="<?php echo base_url().'electricalshop/assets/img/e-shop/bg_01.jpg';?>">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Checkout</h1>
                <ul class="breadcumb-menu">
                    <li><a href="#">Home</a></li>
                    <li>Checkout</li>
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
                    <h1 class="breadcumb-title">Checkout</h1>
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
           
            <!--div class="woocommerce-form-coupon-toggle">
                <div class="woocommerce-info">Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a> </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="#" class="woocommerce-form-coupon">
                        <div class="form-group">
                            <label>Coupon code</label>
                            <input type="text" class="form-control" placeholder="Write your coupon code">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="th-btn">Apply coupon</button>
                        </div>
                    </form>
                </div>
            </div-->
            <form id="frm" action="<?php echo base_url().'checkout/placeOrder';?>" method="post" class="woocommerce-checkout mt-40">
                <div class="row ">
                    <div class="col-lg-6">
                        <h2 class="h4">Billing Details</h2>
                        <div class="row">
                          

                            <input type="hidden" class="form-control" placeholder="First Name" name="uname" value="<?php echo $this->session->userdata('username');?>" >
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo $custdetails->name;?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Last Name" name="lname"  value="<?php echo $custdetails->lastname;?>">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Your Company Name" name="cname"  value="<?php echo $custdetails->companyname;?>" >
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Street Address" name="saddress" >
                                <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)" name="apartment" >
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Town / City" name="city" >
                            </div>
                            <div class="col-md-6 form-group">
                              

                                <select class="form-select" name="country">

                                <?php foreach($countries as $re){ ?>
                                        <option value="<?php echo $re['country_name'];?>"><?php echo $re['country_name'];?></option>
                                        <?php } ?>
                                        <!--option>United State (US)</option>
                                        <option>Equatorial Guinea (GQ)</option>
                                        <option>Australia (AU)</option>
                                        <option>Germany (DE)</option-->
                                    </select>

                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Postcode / Zip" name="zip" >
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Email Address" name="eadd" value="<?php echo $custdetails->email;?>" >
                                <input type="text" class="form-control" placeholder="Phone number" name="pnumber" value="<?php echo $custdetails->phone;?>"  >
                            </div>
                            <!--div class="col-12 form-group">
                                <input type="checkbox" id="accountNewCreate">
                                <label for="accountNewCreate">Create An Account?</label>
                            </div-->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p id="ship-to-different-address">
                            <input id="ship-to-different-address-checkbox" type="checkbox" name="ship_to_different_address" value="1" >
                            <label for="ship-to-different-address-checkbox">
                                Ship to a different address?
                                <span class="checkmark"></span>
                            </label>
                        </p>
                        <div class="shipping_address">
                            <div class="row">

                           

                                <!--div class="col-12 form-group">
                                    <select class="form-select">
                                        <option>United Kingdom (UK)</option>
                                        <option>United State (US)</option>
                                        <option>Equatorial Guinea (GQ)</option>
                                        <option>Australia (AU)</option>
                                        <option>Germany (DE)</option>
                                    </select>
                                </div-->
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" placeholder="First Name" name="fname1">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" name="lname1" >
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" placeholder="Your Company Name" name="cname1">
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" placeholder="Street Address" name="saddress1" >
                                    <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)" name="apartment1">
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" placeholder="Town / City" name="city1">
                                </div>
                                <div class="col-md-6 form-group">
                                    <!--input type="text" class="form-control" placeholder="Country" name="country1"-->

                                    <select class="form-select" name="country1">

<?php foreach($countries as $re){ ?>
        <option value="<?php echo $re['country_name'];?>"><?php echo $re['country_name'];?></option>
        <?php } ?>
        <!--option>United State (US)</option>
        <option>Equatorial Guinea (GQ)</option>
        <option>Australia (AU)</option>
        <option>Germany (DE)</option-->
    </select>




                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" placeholder="Postcode / Zip" name="zip1">
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" placeholder="Email Address"  name="eadd1">
                                    <input type="text" class="form-control" placeholder="Phone number" name="pnumber1">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <textarea cols="20" rows="5" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                    </div>
                </div>
            <!--/form-->
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

                    <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
                        <tr class="cart_item">
                            <td data-title="Product">


                           

                            <?php $imageURL = !empty($item["image"])?base_url('uploads/product_images/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
            <img src="<?=site_url()?>assets/uploads/products/<?=$item['image']?>" width="50"/>



                              
                            </td>
                            <td data-title="Name">
                            <?php 
                            
                            //echo $item["name"]; 

                            
                            $itn=$item["name"]; 
                                
                                $this->db->where('prod_id',$itn);
                                //$this->db->where('prod_dt_typeid',5);
                               // $this->db->order_by("orderno", "asc");
                                $this->db->select('*');
                                $this->db->from('products');
                                $query = $this->db->get();
                                $rowdt=$query->row();
                                echo $string1=$rowdt->prod_name;
                            
                            
                            ?>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span><?php echo $item["price"].' USD'; ?></bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <strong class="product-quantity"><?php echo $item["qty"]; ?></strong>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span><?php echo $item["subtotal"]; ?></bdi></span>
                            </td>
                        </tr>
                        <?php } }else{ ?>
    <tr><td colspan="6"><p>Your cart is empty.....</p></td>
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
                            <td data-title="Subtotal" colspan="4"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $this->cart->total().' USD'; ?></bdi></span></td>
                        </tr>
                        <tr class="woocommerce-shipping-totals shipping">
                            <th>Shipping</th>
                            <td data-title="Shipping" colspan="4"> 0.00
                            </td>
                        </tr>
                        <tr class="order-total">
                            <th>Total</th>
                            <td data-title="Total" colspan="4"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $this->cart->total().' USD'; ?></bdi></span></strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            <!--/form--->
            <div class="mt-lg-3 mb-30">
                <div class="woocommerce-checkout-payment">
                    <ul class="wc_payment_methods payment_methods methods">
                        <!--li class="wc_payment_method payment_method_bacs">
                            <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked">
                            <label for="payment_method_bacs">Direct bank transfer</label>
                            <div class="payment_box payment_method_bacs">
                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                </p>
                            </div>
                        </li-->
                        <li class="wc_payment_method payment_method_cheque">
                            <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" >
                            <label for="payment_method_cheque">Cash on Delivery</label>
                            <div class="payment_box payment_method_cheque">
                            <p>Pay with cash upon delivery.</p>
                            </div>
                        </li>
                        <!--li class="wc_payment_method payment_method_cod">
                            <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method">
                            <label for="payment_method_cod">Credit Cart</label>
                            <div class="payment_box payment_method_cod">
                                <p>Pay with Credit Cart.</p>
                            </div>
                        </li>
                        <li class="wc_payment_method payment_method_paypal">
                            <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal">
                            <label for="payment_method_paypal">Paypal</label>
                            <div class="payment_box payment_method_paypal">
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                            </div>
                        </li-->
                    </ul>
                    <div class="form-row place-order">
                        <button type="submit" class="th-btn">Place order</button>  
                        <a href="<?php echo base_url().'bulkenquiry';?>" class="th-btn ">
                                                  <!-- <img src="assets/img/btn-cart.png"/> -->
                                                Bulk Enquiry
                                            </a>
                        
                        
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

  
<!--********************************
        Code End  Here 
******************************** -->
<!-- whatsapp -->
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

$(document).ready(function() {
    //alert("enter");

    $(".shipping_address").css("display","none");

  });






$('form[id="frm"]').validate({  
    rules: {  
    
      fname: 'required',
      lname:'required',   
     /* msg_subject: 'required',*/
      pnumber:'required',  
      eadd: {  
        required: true,  
        email: true,  
      }, 
     /*password:{  required: true,
        minlength:8,  
     }*/
      city:"required",
      country:"required",
      zip:"required",
    },  
    messages: {  
      //uname: 'First Name is required',
      fname: 'First Name is required',
      lname:'Last Name is required',       
      /*msg_subject: 'Subject is required', */ 
      pnumber: 'Enter a valid Phone',
      eadd: 'Enter a valid Email', 
      city: 'Enter a valid City', 
      country:"Enter a valid Country",
      zip:'Please enter Zip',
     /* brand:"Please enter brand", */
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