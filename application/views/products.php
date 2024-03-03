<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Electrical Shop </title>
    <meta name="author" content="Electrical Shop">
   

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php 
                            
                            //print_r($categories);
                            ?>
   

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



.page-item.active .page-link
{
  z-index: 3;
  color: #fff;
  background-color: #017D03;
  border-color: #017D03;
}

.page-link
{
  position: relative;
  display: block;
  color: #017D03;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #017D03;
  -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}














</style>
</head>

<body>

    
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

    <!--==============================
Hero Area
==============================-->
   <!--==============================
    Breadcumb
============================== -->
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
                    <h1 class="breadcumb-title">CIRCUIT BREAKER Best price </h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                    <a href="#" class="th-btn call-bnr-btn"><span class="icon-des"><i class="fa fa-phone"></i></span> <?=$sitedetails['phone_number_1']?></a>
                
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
    <?php if (count($best_selling)>0){?>
        <div class="row justify-content-lg-between justify-content-center align-items-end">
            <div class="col-lg">
                <div class="title-area text-center text-lg-start">
                    <h2 class="sec-title">Best Selling</h2>
                </div>
            </div>
            <!--div class="col-auto mt-n2 mt-lg-0">
                <div class="sec-btn">
                    <div class="nav tab-menu1" role="tablist">
                        <button class="tab-btn active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Top Products</button>
                        <button class="tab-btn" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">Best Selling Products</button>
                        <button class="tab-btn" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" role="tab" aria-controls="nav-three" aria-selected="false">Latest Products</button>
                    </div>
                </div>
            </div-->
        </div>
     
        <div class="tab-content best-selling-product">
            <!-- Single item -->
            <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                <div class="slider-area">
                    <div class="swiper th-slider has-shadow productSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                        <div class="swiper-wrapper">


                        <?php foreach ($best_selling as $product) { ?>

                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <img src="<?=site_url()?>assets/uploads/products/<?=$product['prod_primary_image']?>" alt="<?=$product['prod_name']?>" title="<?=$product['prod_name']?>">
                                        <span class="product-tag">10% OFF</span>
                                        <span class="product-tag-second">Sale</span>
                                        <div class="actions">
                                            <a href="<?=site_url().'product/'.$product['prod_canonial_name']?>" class="icon-btn popup-content1"><i class="far fa-eye"></i></a>
                                            <?php 
                                            
                                            $username=$this->session->userdata('username');
                                            
                                            if ($username==''){?>


                                                <a href="<?php echo base_url('home/login'); ?>" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                        
                                            
                                            
                                            <?php } else { ?>
                                            
                                            <a href="<?php echo base_url('productssample/addToCart/'.$product['prod_id']); ?>" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <?php } ?>


                                            <!--a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a-->
                                            <a href="javascript:void(0)" onclick=addwishlist(<?php echo $product['prod_id'];?>) class="icon-btn"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                      
                                        <h3 class="product-title"><a href="<?=site_url().'product/'.$product['prod_canonial_name']?>"><?=$product['prod_name']?></a></h3>
                                        <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                        <div class="price-area mt-2">
                                            <span class="price">
                                                
                                            <?php
                                            $this->db->where('prod_dt_prodid',$product['prod_id']);
        $this->db->where('prod_dt_typeid',4);
       // $this->db->order_by("orderno", "asc");
        $this->db->select('*');
        $this->db->from('product_details');
        $query = $this->db->get();
        $pricedt=$query->row();
        
        echo  $currency.' '.$pricedt->prod_dt_desc;
        
        ?>
                                            
                                            
                                            
                                            <!--del class="right">$06.99</del--></span>

                                        </div>
                                        <div class="add-cart-btn mt-4">
                                            

                                            <?php 
                                            
                                            $username=$this->session->userdata('username');
                                            
                                            if ($username==''){?>


                                                <a href="<?php echo base_url('home/login'); ?>" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                        
                                            
                                            
                                            <?php } else { ?>
                                            <a href="<?php echo base_url('productssample/addToCart/'.$product['prod_id']); ?>" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                            <?php } ?>

                                        </div>
                                       
                                       
                                      
                                    </div>
                                </div>
                            </div>

                            <?php } ?>


                        

                        </div>
                    </div>
                    <button data-slider-prev=".productSlider1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>
                    <button data-slider-next=".productSlider1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
                </div>
            </div>
           
          
        </div>

        <?php } else { ?>

<div class='text-center'><h6 style='color:red'>Sorry No Product found</h6></div>


<?php } ?>



       
    </div>
</section>

  
  <section>
    <div class="center-banner" data-bg-src="<?php echo base_url().'electricalshop1/assets/img/e-shop/banner-center.png';?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="img-box">
                        <img src="<?php echo base_url().'electricalshop1/assets/img/e-shop/box-product.png';?>"/>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="banner-center-content">
                        <h2>Capacitor Switches & Sockets</h2>
                        <p>Electrical shope is one of the largest and reputed distributor and wholesaler of electrical, Electronics and Automation products in Dubai-UAE</p>
                        <h4>Special Discount</h4>

                        <a href="#" class="th-btn btn-sm">Shop Now<i class="fas fa-chevrons-right ms-2"></i></a>
                    </div>
                </div>

                <!-- <div class="col-lg-1 col-md-1">
                    <div class="offer-sec">
                        <img src="assets/img/e-shop/offer.png"/>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
  </section>
   <!--==============================
Cta Area  
==============================-->

<?php if (count($products)>0){ ?>

  <section class="mt-50">
    <div class="container">
        <div class="row noPad">
            <aside class="col-lg-3" id="sidebar_fixed">
                <div class="d-none d-xl-block">
                    <div class="category-menu-wrap ">
                        <a class="menu-expand" href="#"><i class="far fa-bars"></i>Browse by Categories</a>
                        <nav class="category-menu">
                            <ul>

                            <?php 
                            
                            //print_r($categories);
                            
                            foreach ($categories as $category) { ?>
                                                               
                                                          


                                <li><a href="<?=site_url()?>products/category/<?=$category['cat_canonial_name']?>"> <?=$category['cat_name']?>  </a></li>
                                <?php } ?>
                              
                                <li class="menu-item-has-children1">
                                    <a href="#"><b>Brand</b> </a>
                                    <ul class="sub-menu1">


                                    <?php 
                                    
                                    //print_r($brands);
                                    
                                    
                                    foreach ($brands as $brand) { ?>
                                                                <li>
                                                                    <a href="<?=site_url()?>products/brand/<?=$brand['brand_canonial_name']?>">
                                                                        <?=$brand['brand_name']?>
                                                                    </a>
                                                                </li>
                                                            <?php } ?></ul>



                                                            <!--ul class="sub-menu">

                                        <li><a href="#">Alfanar   </a></li>
                                        <li><a href="#">Alfanar   </a></li>
                                        <li><a href="#">Alfanar   </a></li>
                                        <li><a href="#">Alfanar   </a></li>
                                    </ul-->
                                </li>
                                <!--li><a href="#">Pricing</a>
                                    <ul class="price-sec">
                                        <div class="add_bottom_25"><input type="range" min="10" max="50" step="5" value="20" data-orientation="horizontal" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;"><div class="rangeslider rangeslider--horizontal" id="js-rangeslider-0" style=""><div class="rangeslider__fill" style="width: 70.25px;"></div><div class="rangeslider__handle" style="left: 60.25px;"></div></div></div>
                                    </ul>
                                </li-->
                                        </ul>
                        </nav>
                    </div>
                </div>
            </aside>

            <div class="col-lg-9 col-md-9">
                <div class="product-details">
                    <div class="th-sort-bar">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md">
                                <p class="woocommerce-result-count">Showing 1–12 of 16 results</p>
                            </div>
        
                            <div class="col-md-auto">
                                <form class="woocommerce-ordering" method="get" onchange="gotopage()">
                                    <select name="orderby" class="orderby" aria-label="Shop order">
                                        <option value="menu_order" selected="selected">Default Sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <!--option value="rating">Sort by average rating</option-->
                                        <option value="date">Sort by latest</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row recent-product">
                    <?php foreach ($products as $product) { ?>


                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <img  src="<?=site_url()?>assets/uploads/products/<?=$product['prod_primary_image']?>" alt="<?=$product['prod_name']?>" alt="Product Image">
                            <span class="product-tag">10% OFF</span>
                            <span class="product-tag-second">Sale</span>
                            <div class="actions">
                                <a href="<?=site_url().'product/'.$product['prod_canonial_name']?>" class="icon-btn popup-content1"><i class="far fa-eye"></i></a>
                                <!--a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a-->

                                <?php 
                                            
                                            $username=$this->session->userdata('username');
                                            
                                            if ($username==''){?>


                                                <a href="<?php echo base_url('home/login'); ?>" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                        
                                            
                                            
                                            <?php } else { ?>
                                            
                                            <a href="<?php echo base_url('productssample/addToCart/'.$product['prod_id']); ?>" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <?php } ?>


                                <a href="javascript:void(0)" onclick=addwishlist(<?php echo $product['prod_id'];?>) class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                          
                            <h3 class="product-title"><a href="<?=site_url().'product/'.$product['prod_canonial_name']?>"><?=$product['prod_name']?></a></h3>
                            <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                            <div class="price-area mt-2">
                                <span class="price">       
                                            <?php
                                            $this->db->where('prod_dt_prodid',$product['prod_id']);
        $this->db->where('prod_dt_typeid',4);
       // $this->db->order_by("orderno", "asc");
        $this->db->select('*');
        $this->db->from('product_details');
        $query = $this->db->get();
        $pricedt=$query->row();
        
        echo  $currency.' '.$pricedt->prod_dt_desc;
        
        ?><!--del class="right">$06.99</del--></span>


       


    
                            </div>
                            <div class="add-cart-btn mt-4">
                              

                            <?php 
                                            
                                            $username=$this->session->userdata('username');
                                            
                                            if ($username==''){?>


                                                <a href="<?php echo base_url('home/login'); ?>" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                        
                                            
                                            
                                            <?php } else { ?>
                                            <a href="<?php echo base_url('productssample/addToCart/'.$product['prod_id']); ?>" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                            <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

                <?php }  ?>
             
                
             </div>
           
            <?php echo $links;
            
            
            
            
            
            ?>
                    <!--div class="th-pagination text-center pt-50">
                        <ul>
                            <li><a href="blog.html">1</a></li>
                            <li><a href="blog.html">2</a></li>
                            <li><a href="blog.html">3</a></li>
                            <li><a href="blog.html"><i class="far fa-arrow-right"></i></a></li>
                        </ul>
                    </div-->
                </div>
            </div>
        </div>
    </div>

    <?php } else { ?>

<div class='text-center'><h6 style='color:red'>Sorry No Product found</h6></div>


<?php } ?>
  </section>
  




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



$("#sub").click(function(){
$('#newsmsg').html('');
}); 

</script>

<script>
function addwishlist(id){
//alert(id);
$.ajax({
        type: 'GET',
        url:"<?php echo base_url().'/checkout/addwishlist';?>",
        data:{id:id},
        success:function(data){
          
            $(".wishlistcount").html(data);
        }
    });

}






function gotopage(){
    alert("hello");
}

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