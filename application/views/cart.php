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




  <!-- Include jQuery library -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>


<style>
label.error.errpopupmsg {
    position: absolute;
    bottom: -35px;
    color: #f61c0d;
    font-style: italic;
    font-weight: 600;
}

</style>

<script>
// Update item quantity
function updateCartItem(obj, rowid){
    //alert(obj.value);
    //alert(rowid);
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}




function updateCartItembtup(val,rowid){
    //alert(obj.value);
    //alert(rowid);
    var value=$('#txt'+val).val();
    var actval=parseInt(value)+1;
    //alert(value);
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:actval}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}



function updateCartItembtdown(val,rowid){
    //alert(obj.value);
    //alert(rowid);
    var value=$('#txt'+val).val();
    var actval=parseInt(value)-1;
    //alert(value);
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:actval}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}







</script>

<?php $sitedetails = sitedetails(); 
         
        
         
         ?>

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
                    <h1 class="breadcumb-title">Cart</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                    <a href="tel:+<?=$sitedetails['phone_number_1']?>" class="th-btn call-bnr-btn"><span class="icon-des"><i class="fa fa-phone"></i></span><?=$sitedetails['phone_number_1']?></a>
                
                </div>

            </div>
        </div>
     
    </div>
</div>
    <div class="th-cart-wrapper  space-top space-extra-bottom">
        <div class="container">
            <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message">Shipping costs updated.</div>
            </div>
            <form action="#" class="woocommerce-cart-form">
                <table class="cart_table">
                    <thead>
                        <tr>
                            <th class="cart-col-image">Image</th>
                            <th class="cart-col-productname">Product Name</th>
                            <th class="cart-col-price">Price</th>
                            <th class="cart-col-quantity">Quantity</th>
                            <th class="cart-col-total">Total</th>
                            <th class="cart-col-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>


                    


                    <?php $username=$this->session->userdata('username');?>


                   


    <?php 
    
    $i=0;
    
    
    if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>


<?php $itn=$item["name"]; 
                                
                                $this->db->where('prod_id',$itn);
                                //$this->db->where('prod_dt_typeid',5);
                               // $this->db->order_by("orderno", "asc");
                                $this->db->select('*');
                                $this->db->from('products');
                                $query = $this->db->get();
                                $rowdt=$query->row();
                                
                                
                                
                                
                                ?>
    

                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="<?=site_url().'product/'.$rowdt->prod_canonial_name;?>"><img width="91" height="91" src="<?=site_url()?>assets/uploads/products/<?=$item['image']?>" alt="Image"></a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="<?=site_url().'product/'.$rowdt->prod_canonial_name;?>">
                            
                                <?php echo $string1=$rowdt->prod_name;?>
                            </a>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span><?php echo $item["price"].' USD'; ?></bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <div class="quantity">
                                    <button class="quantity-minus qty-btn" onclick="updateCartItembtdown('<?php echo $i; ?>','<?php echo $item["rowid"]; ?>')"><i class="far fa-minus"></i></button>
                                    <input type="number" id="txt<?php echo $i;?>" class="qty-input"  value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')">
                                    <button class="quantity-plus qty-btn" onclick="updateCartItembtup('<?php echo $i; ?>','<?php echo $item["rowid"]; ?>')"><i class="far fa-plus"></i></button>
                                </div>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span><?php echo $item["subtotal"].' USD'; ?></bdi></span>
                            </td>
                            <td data-title="Remove">
                                <a href="#" class="remove" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>':false;" ><i class="fal fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php 
                    
                    $i++;
                    
                    } }else{ ?>
    <tr><td colspan="6"><p>Your cart is empty.....</p></td>
    <?php } ?>
                    
                        <!--tr>
                            <td colspan="6" class="actions">
                                <div class="th-cart-coupon">
                                    <input type="text" class="form-control" placeholder="Coupon Code...">
                                    <button type="submit" class="th-btn">Apply Coupon</button>
                                </div>
                             
                                <a href="<?php //echo base_url();?>" class="th-btn">Continue Shopping</a>
                            </td>
                        </tr-->
                    </tbody>
                </table>
            </form>

            <?php if($this->cart->total_items() > 0){ ?>
            <div class="row justify-content-end">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <h2 class="h4 summary-title">Cart Totals</h2>
                    <table class="cart_totals">
                        <tbody>
                            <tr>
                                <td>Cart Subtotal</td>
                                <td data-title="Cart Subtotal">
                                    <span class="amount"><bdi><span>$</span><?php echo $this->cart->total().' USD'; ?></bdi></span>
                                </td>
                            </tr>
                            <tr class="shipping">
                                <th>Shipping and Handling</th>
                                <td data-title="Shipping and Handling">
                                    0.00
                                    <!--ul class="woocommerce-shipping-methods list-unstyled">
                                        <li>
                                            <input type="radio" id="free_shipping" name="shipping_method" class="shipping_method">
                                            <label for="free_shipping">Free shipping</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="flat_rate" name="shipping_method" class="shipping_method" checked="checked">
                                            <label for="flat_rate">Flat rate</label>
                                        </li>
                                    </ul>
                                    <p class="woocommerce-shipping-destination">
                                        Shipping options will be updated during checkout.
                                    </p-->
                                    <!--form action="#" method="post">
                                        <a href="#" class="shipping-calculator-button">Change address</a>
                                        <div class="shipping-calculator-form">
                                            <p class="form-row">
                                                <select class="form-select">
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="BD" selected="selected">Bangladesh</option>
                                                </select>
                                            </p>
                                            <p>
                                                <select class="form-select">
                                                    <option value="">Select an option…</option>
                                                    <option value="BD-05">Bagerhat</option>
                                                    <option value="BD-01">Bandarban</option>
                                                    <option value="BD-02">Barguna</option>
                                                    <option value="BD-06">Barishal</option>
                                                </select>
                                            </p>
                                            <p class="form-row">
                                                <input type="text" class="form-control" placeholder="Town / City">
                                            </p>
                                            <p class="form-row">
                                                <input type="text" class="form-control" placeholder="Postcode / ZIP">
                                            </p>
                                           
                                        </div>
                                    </form-->
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Order Total</td>
                                <td data-title="Total">
                                    <strong><span class="amount"><bdi><span>$</span><?php echo $this->cart->total().' USD'; ?></bdi></span></strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="wc-proceed-to-checkout mb-30">
                        <a href="<?php echo base_url().'checkout'?>" class="th-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
<?php } ?>



        </div>
    </div>
  

<?php include('footer.php');?>



    <!-- Scroll To Top -->
    <!--div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div-->

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