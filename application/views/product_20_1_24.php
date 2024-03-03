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


</head>

<body>
<?php $sitedetails = sitedetails();
    $productMetaTags = $prodDesc = '';
    $prodPoints = [];
    foreach ($productdetails['Details'] as $key => $value) {
        if ($value['pd_type_name'] == 'Meta Tags') {
            $productMetaTags = html_entity_decode($value['prod_dt_desc']);
        } else if ($value['pd_type_name'] == 'Description') {
            $prodDesc = $value['prod_dt_desc'];
        } else {
            $prodPoints[$value['pd_type_name']] = $value['prod_dt_desc'];
        }
    }

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
 
<section class="mt-50 space-bottom">
    <div class="container">
       
        <div class="product-deatils-area">
            <div class="container">
                
                <div class="product-details pt-50 client-slider owl-carousel owl-theme">
                    <div class="client-item ">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="products-img-box text-center">
                                <?php if (isset($productdetails['Images']) && ! empty($productdetails['Images'])) { ?>
                                    <?php 
                                        $i=0;
                                        
                                        foreach ($productdetails['Images'] as $image) { 
                                            if ($i==0){
                                            
                                            ?>
                                  

                                    <img src="<?=site_url()?>assets/uploads/products/<?=$image['pd_img_image']?>" alt="<?=$image['prod_name']?>" title="<?=((trim($image['pd_img_description']) != '') ? $image['pd_img_description'] : $image['prod_name'])?>"/>



                                    <?php
                                }  $i++; }} ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="product-box-details-area">
    
                                <div class="products-details">
                                    <h2>
                                    <?php
                                        
                                        //print_r($productdetails['Brand']);
                                        
                                        
                                        if (isset($productdetails['Brand']) && ! empty($productdetails['Brand']) && isset($productdetails['Brand'][0])) { ?>
                                    

                                    <?php
                               echo $productdetails['Brand'][0]['brand_name'];
                                
                                } ?>
                                        
                                    
                                    
                                    <?=$product['prod_name']?></h2>
                                    <!--p><?//=html_entity_decode(nl2br($prodDesc))?></p-->
                                </div>
                                
                                <div class="matrial-details">

                                        <?php
                                        
                                       // print_r($productdetails['Brand']);
                                        
                                        
                                        if (isset($productdetails['Brand']) && ! empty($productdetails['Brand']) && isset($productdetails['Brand'][0])) { ?>
                                            <h2>
                                                <img src="<?=site_url()?>assets/uploads/brands/<?=$productdetails['Brand'][0]['brand_image']?>" alt="<?=$image['prod_name']?>" title="<?=((isset($productdetails['Brand']) && isset($productdetails['Brand'][0]) && isset($productdetails['Brand'][0]['brand_name'])) ?  $productdetails['Brand'][0]['brand_name'] : '')?>" />
                                            </h2>
                                        <?php } ?>

                                        <form action="<?php echo base_url('productssample/addToCartqty/'); ?>" method="post">


                                    <div class="details-table-sec">
                                     
                                        <table id="part" cellspacing="0">


                                        <?php 
                                            
                                            //print_r($prodPoints);
                                            
                                            
                                           // foreach ($prodPoints as $label => $value) {?>
                                                
                                                <?//=$label?>

                                                <?//=$value?>


                                           <?php //}
                                                
                                                //echo $pnumber=$prodPoints['Part Number'];
                                                
                                                
                                                ?>
                                                    <!--tr>
                                                        <th class="label">
                                                            <?//=$label?> :
                                                        </th>
                                                        <td>
                                                            <?//=$value?> <?//=(in_array(strtolower($label), ['amount', 'price', 'value']) ? $currency : '')?>
                                                        </td>
                                                    </tr-->
                                               


                                            <tr>
                                                <th class="label">
                                                    Part Number :
                                                </th>
                                                <td>
                                                <?php echo $pnumber=$prodPoints['Part Number'];?>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="label">
                                                    Availability :
                                                </th>
                                                <td>
                                                    <span class="btn-sec">
                                                        <!--a href="#" class="default-btn small-btn"> Instock</a--> 
                                                        <a href="#" class="default-btn small-btn instock-btn"> Instock</a>       
                                                        <!--a href="#" class="default-btn small-btn"> Request </a--> 
                                                    </span>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="label">
                                                    SKU :  
                                                </th>
                                                <td>
                                                <?php echo $pnumber=$prodPoints['SKU'];?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Country origin :
                                                </th>
                                                <td>
                                                <?php echo $pnumber=$prodPoints['Country origin'];?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Price :
                                                </th>
                                                <td>
                                                    <span class="smallText"> AED  <?php echo $pnumber=$prodPoints['Price'];?></span> <!--AED 850 +VAT--> 
                                                <!--span class="inner-select">
                                                    <select id="currencyList" class="select-box">
                                                        <option value="AED" selected="selected" label="AED">AED</option>
                                                        <option value="EUR" label="EUR">EUR</option>
                                                        <option value="JPY" label="JPY">JPY</option>
                                                        <option value="USD" label="USD">USD</option>
                                                        </select>
                                                </span--> 
                                                </td>

                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Quantity :
                                                </th>
                                                <td>

                                                <input type="hidden" id="prdid" name="prdid" value="<?php echo $product['prod_id'];?>" >

                                                    <input type="number" id="quantity" name="quantity" min="1" max="500000">

                                                </td>
                                            </tr>


                                           




                                         
                                    </table>
                                    </div>
    
                                    
                                    <div class="button-area">
                                        <div class="btn-sec mt-30">

   <button  class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</button>
   <a href="<?php echo base_url().'bulkenquiry';?>"><button type="button" class="th-btn"><i class="far fa-cart-shopping mr-5"></i>   Bulk Enquiry</button> </a>

                                            <!--a href="<?php //echo base_url('productssample/addToCart/'.$product['prod_id']); ?>" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a-->
                                            <!--a href="<?php echo base_url().'bulkenquiry';?>" class="th-btn btn-sm ml-20"-->
                                                  <!-- <img src="assets/img/btn-cart.png"/> 
                                                Bulk Enquiry-->
                                            <!--/a-->
                                        </div>
    
                                        
                                    </div>

                                           </form>
                                   
                                </div>
                              
    
                               
    
                                
                               
    
                            
                            </div>
                            </div>
                        </div>
    
    
                        
                        
                    </div>



                    
                    
                </div>
            </div>
        </div>
       
        <div class="row">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
                    <div class="prouct-specificaion mt-2">
                        <h4>Description for 
        <?php
                                        
                                        //print_r($productdetails['Brand']);
                                        
                                        
                                        if (isset($productdetails['Brand']) && ! empty($productdetails['Brand']) && isset($productdetails['Brand'][0])) { ?>
                                    

                                    <?php
                               echo $productdetails['Brand'][0]['brand_name'];
                                
                                } ?>  <?=$product['prod_name']?></h4>
                        <p><?=html_entity_decode(nl2br($prodDesc))?></p>
                    </div>
                    <div class="Specifications mt-2">
                        <h4>Specifications</h4>

                        <div class="specification-table">
                        <?=$product['prdspec']?>
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

function updateCartItembtdownprd(val,rowid){
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