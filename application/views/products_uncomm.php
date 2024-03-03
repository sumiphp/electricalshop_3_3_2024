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
    <!-- Bootstrap -->
    <!--link rel="stylesheet" href="assets/css/bootstrap.min.css">
  
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
  
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
  
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css"-->

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

</style>
</head>

<body>

    
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
    </div><!--==============================
Product Lightbox
==============================-->
    <!--div id="QuickView" class="white-popup mfp-hide">
        <div class="container bg-white rounded-10">
            <div class="row gx-60">
                <div class="col-lg-6">
                    <div class="product-big-img">
                        <div class="img"><img src="assets/img/product/product_details_1_1.jpg" alt="Product Image"></div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="product-about">
                        <p class="price">$120.85<del>$150.99</del></p>
                        <h2 class="product-title">Bosco Apple Fruit</h2>
                        <div class="product-rating">
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span></div>
                            <a href="#" class="woocommerce-review-link">(<span class="count">4</span> customer reviews)</a>
                        </div>
                        <p class="text">Prepare to embark on a sensory journey with the Bosco Apple, a fruit that transcends the ordinary and promises an unparalleled taste experience. These apples are nothing short of nature’s masterpiece, celebrated for their distinctive blend of flavors and their captivating visual allure.</p>
                        <div class="mt-2 link-inherit">
                            <p>
                                <strong class="text-title me-3">Availability:</strong>
                                <span class="stock in-stock"><i class="far fa-check-square me-2 ms-1"></i>In Stock</span>
                            </p>
                        </div>
                        <div class="actions">
                            <div class="quantity">
                                <input type="number" class="qty-input" step="1" min="1" max="100" name="quantity" value="1" title="Qty">
                                <button class="quantity-plus qty-btn"><i class="far fa-chevron-up"></i></button>
                                <button class="quantity-minus qty-btn"><i class="far fa-chevron-down"></i></button>
                            </div>
                            <button class="th-btn">Add to Cart</button>
                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product_meta">
                            <span class="sku_wrapper">SKU: <span class="sku">Bosco-Apple-Fruit</span></span>
                            <span class="posted_in">Category: <a href="#">Fresh Fruits</a></span>
                            <span>Tags: <a href="#">Fruits</a><a href="#">Organic</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>
    </div-->
   
    <!--div class="sidemenu-wrapper sidemenu-cart d-none d-lg-block ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title">Shopping cart</h3>
                <div class="widget_shopping_cart_content">
                    <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/small-product1.png';?>" alt="Cart Image">MPCB</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>940.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/small-product1.png';?>" alt="Cart Image">VALVE & ACTUATORS</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>899.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/small-product1.png';?>" alt="Cart Image">LIMIT SWITCH & SENSORE</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>756.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/small-product1.png';?>" alt="Cart Image">ENCLOSURES</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>723.00</span>
                            </span>
                        </li>
                       
                    </ul>
                    <p class="woocommerce-mini-cart__total total">
                        <strong>Subtotal:</strong>
                        <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">$</span>4398.00</span>
                    </p>
                    <p class="woocommerce-mini-cart__buttons buttons">
                        <a href="cart.html" class="th-btn wc-forward">View cart</a>
                        <a href="checkout.html" class="th-btn checkout wc-forward">Checkout</a>
                    </p>
                </div>
            </div>
        </div>
    </div> 
   
    <div class="sidemenu-wrapper sidemenu-info d-none d-lg-block ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget  ">
                <div class="th-widget-about">
                    <div class="about-logo">
                        <a href="#"><img src="<?php //echo base_url().'electricalshop/assets/img/logo-eletrical.png';?>" alt="logo"></a>
                    </div>
                    <p class="about-text">We provide specialized winterization services to safeguard your pool during the off-season, and when spring arrives, we handle the thorough opening process.</p>
                    <div class="th-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <div class="widget  ">
                <h3 class="widget_title">Contact Us</h3>
                <div class="th-widget-contact">
                    <div class="info-box">
                        <div class="info-box_icon">
                            <i class="fas fa-location-dot"></i>
                        </div>
                        <p class="info-box_text">8502 Preston Rd. Inglewood, Maine 98380</p>
                    </div>
                    <div class="info-box">
                        <div class="info-box_icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <p class="info-box_text">
                            <a href="tel:+16326543564" class="info-box_link">+(163)-2654-3564</a>
                            <a href="tel:+16326545432" class="info-box_link">+(163)-2654-5432</a>
                        </p>
                    </div>
                    <div class="info-box">
                        <div class="info-box_icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <p class="info-box_text">
                            <a href="mailto:help24/7@electrical.com" class="info-box_link">help24/7@electrical.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="widget newsletter-widget  ">
                <h3 class="widget_title">Newsletter</h3>
                <p class="footer-text">Sign up to get update news about us</p>
                <form class="newsletter-form">
                    <input class="form-control" type="email" placeholder="Enter Email" required="">
                    <button type="submit" class="th-btn">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="What are you looking for?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="electric shop#"><img src="<?php //echo base_url().'assets/img/logo-eletrical.png';?>" alt="Electrical Shop"></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="#">Home</a>
                       
                    </li>
                   
                    <li class="menu-item-has-children">
                        <a href="#">Bulk Enquiry</a>
                        <ul class="sub-menu">
                            <li><a href="#">Bulk Enquiry</a></li>
                            <li><a href="#">Bulk Enquiry</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Brands</a>
                        <ul class="sub-menu">
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Brands</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Product</a>
                        <ul class="sub-menu">
                            <li><a href="#">Product</a></li>
                            <li><a href="#">Product Details</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#">Clearance</a>
                    </li>
                    <li><a href="#">About Us</a></li>
                  
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <header class="th-header header-layout3">
        
        <div class="menu-top">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="electric shop#"><img src="<?php //echo base_url().'electricalshop1/assets/img/logo-eletrical.png';?>" alt="electric shop"></a>
                        </div>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <form class="header-search">
                            <input type="text" placeholder="Enter Keyword">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                  
                   
                    <div class="col-auto">
                        <div class="custom-block">
                          
                        </div>
                        <div class="header-icons">
                            <a href="login.html" class="icon-btn d-none d-sm-block"><i class="far fa-user"></i></a>
                            <a href="#" class="icon-btn d-none d-sm-block">
                                <span class="badge">3</span>
                                <i class="far fa-heart"></i>
                            </a>
                            <button type="button" class="icon-btn sideMenuToggler">
                                <span class="badge">5</span>
                                <i class="far fa-cart-shopping"></i>
                            </button>

                            <div class="dropdown-link aed-sec">
                                <a class="" href="#" ><img src="<?php //echo base_url().'electricalshop1/assets/img/e-shop/menu-icon.png';?>"/>  AED</a>
                               
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
          
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                       
                        <div class="col-auto">
                            <nav class="main-menu menu-style1 d-none d-lg-inline-block">
                                <ul>
                                    <li class="menu-item-has-children">
                                        <a href="#">Bulk Enquiry</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Bulk Enquiry Step</a></li>
                                            <li><a href="#">Bulk Enquiry Step</a></li>
                                            <li><a href="#">Bulk Enquiry Step</a></li>
                                        </ul>
                                    </li>
                                   
                                    <li class="menu-item-has-children">
                                        <a href="#">Brands</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Service</a></li>
                                            <li><a href="#">Service Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Product</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item-has-children">
                                                <a href="#">Shop</a>
                                            </li>
                                            <li><a href="#">Team</a></li>
                                            <li><a href="#">Team Details</a></li>
                                            <li><a href="#">Project Gallery</a></li>
                                            <li><a href="#">Project Details</a></li>
                                            <li><a href="#">Faq Page</a></li>
                                            <li><a href="#">Error Page</a></li>
                                        </ul>
                                    </li>
                                   
                                    <li>
                                        <a href="#">About Us</a>
                                    
                                    </li>
                                    <li>
                                        <a href="#">Clearance</a>
                                    
                                    </li>
                                    <li>
                                        <a href="contact#">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                            <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                        </div>
                        <div class="col-auto">
                            <div class="call-btn">
                                <div class="box-icon">
                                    <i class="fa fa-envelope""></i>
                                </div>
                                <div class="media-body">
                                    <p class="box-subtitle">Mail Us 24/7</p>
                                    <h3 class="box-title"><a href="mailto:contact@nexaelectric.com">contact@nexaelectric.com</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="call-btn">
                                <div class="box-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="media-body">
                                    <p class="box-subtitle">Call Us 24/7</p>
                                    <h3 class="box-title"><a href="tel:+0987654321">0987654321</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header-->

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
       
        <div class="row justify-content-lg-between justify-content-center align-items-end">
            <div class="col-lg">
                <div class="title-area text-center text-lg-start">
                    <h2 class="sec-title">Best Selling</h2>
                </div>
            </div>
            <div class="col-auto mt-n2 mt-lg-0">
                <div class="sec-btn">
                    <div class="nav tab-menu1" role="tablist">
                        <button class="tab-btn active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Top Products</button>
                        <button class="tab-btn" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">Best Selling Products</button>
                        <button class="tab-btn" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" role="tab" aria-controls="nav-three" aria-selected="false">Latest Products</button>
                    </div>
                </div>
            </div>
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
                                            <a href="<?=site_url().'product/'.$product['prod_canonial_name']?>" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
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


                            <!--div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <img src="<?php //echo base_url().'electricalshop1/assets/img/e-shop/product/2.png';?>" alt="Product Image">
                                        <span class="product-tag">10% OFF</span>
                                        <span class="product-tag-second">Sale</span>
                                        <div class="actions">
                                            <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                      
                                        <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                                        <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                        <div class="price-area mt-2">
                                            <span class="price">$08.85<del class="right">$06.99</del></span>

                                        </div>
                                        <div class="add-cart-btn mt-4">
                                            <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                        </div>
                                       
                                       
                                      
                                    </div>
                                </div>
                            </div>


                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <img src="<?php //echo base_url().'electricalshop1/assets/img/e-shop/product/3.png';?>" alt="Product Image">
                                        <span class="product-tag">10% OFF</span>
                                        <span class="product-tag-second">Sale</span>
                                        <div class="actions">
                                            <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                      
                                        <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                                        <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                        <div class="price-area mt-2">
                                            <span class="price">$08.85<del class="right">$06.99</del></span>

                                        </div>
                                        <div class="add-cart-btn mt-4">
                                            <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                        </div>
                                       
                                       
                                      
                                    </div>
                                </div>
                            </div>


                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <img src="<?php //echo base_url().'electricalshop1/assets/img/e-shop/product/4.png';?>" alt="Product Image">
                                        <span class="product-tag">10% OFF</span>
                                        <span class="product-tag-second">Sale</span>
                                        <div class="actions">
                                            <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                      
                                        <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                                        <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                        <div class="price-area mt-2">
                                            <span class="price">$08.85<del class="right">$06.99</del></span>

                                        </div>
                                        <div class="add-cart-btn mt-4">
                                            <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                        </div>
                                       
                                       
                                      
                                    </div>
                                </div>
                            </div>


                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <img src="<?php //echo base_url().'electricalshop1/assets/img/e-shop/product/5.png';?>" alt="Product Image">
                                        <span class="product-tag">10% OFF</span>
                                        <span class="product-tag-second">Sale</span>
                                        <div class="actions">
                                            <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                      
                                        <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                                        <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                        <div class="price-area mt-2">
                                            <span class="price">$08.85<del class="right">$06.99</del></span>

                                        </div>
                                        <div class="add-cart-btn mt-4">
                                            <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                        </div>
                                       
                                       
                                      
                                    </div>
                                </div>
                            </div>


                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <img src="<?php //echo base_url().'electricalshop1/assets/img/e-shop/product/5.png';?>" alt="Product Image">
                                        <span class="product-tag">10% OFF</span>
                                        <span class="product-tag-second">Sale</span>
                                        <div class="actions">
                                            <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                      
                                        <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                                        <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                        <div class="price-area mt-2">
                                            <span class="price">$08.85<del class="right">$06.99</del></span>

                                        </div>
                                        <div class="add-cart-btn mt-4">
                                            <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                        </div>
                                       
                                       
                                      
                                    </div>
                                </div>
                            </div>


                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <img src="<?php //echo base_url().'electricalshop1/assets/img/e-shop/product/1.png';?>" alt="Product Image">
                                        <span class="product-tag">10% OFF</span>
                                        <span class="product-tag-second">Sale</span>
                                        <div class="actions">
                                            <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                      
                                        <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                                        <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                        <div class="price-area mt-2">
                                            <span class="price">$08.85<del class="right">$06.99</del></span>

                                        </div>
                                        <div class="add-cart-btn mt-4">
                                            <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                        </div>
                                       
                                       
                                      
                                    </div>
                                </div>
                            </div>


                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <img src="<?php //echo base_url().'electricalshop1/assets/img/e-shop/product/1.png';?>" alt="Product Image">
                                        <span class="product-tag">10% OFF</span>
                                        <span class="product-tag-second">Sale</span>
                                        <div class="actions">
                                            <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                      
                                        <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                                        <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                        <div class="price-area mt-2">
                                            <span class="price">$08.85<del class="right">$06.99</del></span>

                                        </div>
                                        <div class="add-cart-btn mt-4">
                                            <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                                        </div>
                                       
                                       
                                      
                                    </div>
                                </div>
                            </div-->

                        </div>
                    </div>
                    <button data-slider-prev=".productSlider1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>
                    <button data-slider-next=".productSlider1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
                </div>
            </div>
           
          
        </div>
       
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

  <section class="mt-50">
    <div class="container">
        <div class="row noPad">
            <aside class="col-lg-3" id="sidebar_fixed">
                <div class="d-none d-xl-block">
                    <div class="category-menu-wrap ">
                        <a class="menu-expand" href="#"><i class="far fa-bars"></i>Browse by Categories--</a>
                        <nav class="category-menu">
                            <ul>

                            <?php foreach ($categories as $category) { ?>
                                                               
                                                          


                                <li><a href="<?=site_url()?>products/category/<?=$category['cat_canonial_name']?>"> <?=$category['cat_name']?>  </a></li>
                                <?php } ?>
                                <!--li><a href="#">Capacitor Switches & Sockets  </a></li>
                                <li><a href="#">Capacitor Switches & Sockets  </a></li>
                                <li><a href="#">Capacitor Switches & Sockets  </a></li>
                                <li><a href="#">Capacitor Switches & Sockets  </a></li>
                                <li><a href="#">Capacitor Switches & Sockets  </a></li>
                                <li><a href="#">Capacitor Switches & Sockets  </a></li>
                                <li><a href="#">Capacitor Switches & Sockets  </a></li-->
                                <li class="menu-item-has-children">
                                    <a href="#"><b>Brand</b> </a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Alfanar   </a></li>
                                        <li><a href="#">Alfanar   </a></li>
                                        <li><a href="#">Alfanar   </a></li>
                                        <li><a href="#">Alfanar   </a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Pricing</a>
                                    <ul class="price-sec">
                                        <div class="add_bottom_25"><input type="range" min="10" max="50" step="5" value="20" data-orientation="horizontal" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;"><div class="rangeslider rangeslider--horizontal" id="js-rangeslider-0" style=""><div class="rangeslider__fill" style="width: 70.25px;"></div><div class="rangeslider__handle" style="left: 60.25px;"></div></div></div>
                                    </ul>
                                </li>
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
                                <form class="woocommerce-ordering" method="get">
                                    <select name="orderby" class="orderby" aria-label="Shop order">
                                        <option value="menu_order" selected="selected">Default Sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
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


                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <img  src="<?=site_url()?>assets/uploads/products/<?=$product['prod_primary_image']?>" alt="<?=$product['prod_name']?>" alt="Product Image">
                            <span class="product-tag">10% OFF</span>
                            <span class="product-tag-second">Sale</span>
                            <div class="actions">mm
                                <a href="<?=site_url().'product/'.$product['prod_canonial_name']?>" class="icon-btn popup-content">dd<i class="far fa-eye"></i></a>
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
                               
                <!--div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/product/1.png';?>" alt="Product Image">
                            <span class="product-tag">10% OFF</span>
                            <span class="product-tag-second">Sale</span>
                            <div class="actions">
                                <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                          
                            <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                            <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                            <div class="price-area mt-2">
                                <span class="price">$08.85<del class="right">$06.99</del></span>
    
                            </div>
                            <div class="add-cart-btn mt-4">
                                <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/product/1.png';?>" alt="Product Image">
                            <span class="product-tag">10% OFF</span>
                            <span class="product-tag-second">Sale</span>
                            <div class="actions">
                                <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                          
                            <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                            <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                            <div class="price-area mt-2">
                                <span class="price">$08.85<del class="right">$06.99</del></span>
    
                            </div>
                            <div class="add-cart-btn mt-4">
                                <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/product/1.png';?>" alt="Product Image">
                            <span class="product-tag">10% OFF</span>
                            <span class="product-tag-second">Sale</span>
                            <div class="actions">
                                <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                          
                            <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                            <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                            <div class="price-area mt-2">
                                <span class="price">$08.85<del class="right">$06.99</del></span>
    
                            </div>
                            <div class="add-cart-btn mt-4">
                                <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/product/1.png';?>" alt="Product Image">
                            <span class="product-tag">10% OFF</span>
                            <span class="product-tag-second">Sale</span>
                            <div class="actions">
                                <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                          
                            <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                            <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                            <div class="price-area mt-2">
                                <span class="price">$08.85<del class="right">$06.99</del></span>
    
                            </div>
                            <div class="add-cart-btn mt-4">
                                <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/product/1.png';?>" alt="Product Image">
                            <span class="product-tag">10% OFF</span>
                            <span class="product-tag-second">Sale</span>
                            <div class="actions">
                                <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                          
                            <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                            <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                            <div class="price-area mt-2">
                                <span class="price">$08.85<del class="right">$06.99</del></span>
    
                            </div>
                            <div class="add-cart-btn mt-4">
                                <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/product/1.png';?>" alt="Product Image">
                            <span class="product-tag">10% OFF</span>
                            <span class="product-tag-second">Sale</span>
                            <div class="actions">
                                <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                          
                            <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                            <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                            <div class="price-area mt-2">
                                <span class="price">$08.85<del class="right">$06.99</del></span>
    
                            </div>
                            <div class="add-cart-btn mt-4">
                                <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/product/1.png';?>" alt="Product Image">
                            <span class="product-tag">10% OFF</span>
                            <span class="product-tag-second">Sale</span>
                            <div class="actions">
                                <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                          
                            <h3 class="product-title"><a href="#">MCB Switchgear</a></h3>
                            <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                            <div class="price-area mt-2">
                                <span class="price">$08.85<del class="right">$06.99</del></span>
    
                            </div>
                            <div class="add-cart-btn mt-4">
                                <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div-->
                
             </div>
                    <div class="th-pagination text-center pt-50">
                        <ul>
                            <li><a href="blog.html">1</a></li>
                            <li><a href="blog.html">2</a></li>
                            <li><a href="blog.html">3</a></li>
                            <li><a href="blog.html"><i class="far fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>




    <?php include('footer.php');?>

    <!--footer class="footer-wrapper footer-layout3">
          <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a href="#"><img src="<?php //echo base_url().'electricalshop/assets/img/logo-eletrical.png';?>" alt="eletrical"></a>
                                </div>
                                <p class="about-text">ELECTRICAL SHOPE is a team of highly skilled and experienced engineers ensuring excellence in multi-disciplinary areas with proficiency in all kinds of Products, Solutions, and Services. Our team is committed to offer an amazing experience for the client .</p>
                                <div class="th-social">
                                    <a href="#/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Quick Links</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Help & FAQs</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Categories</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="#">MPCB</a></li>
                                    <li><a href="#">PLC & HMI</a></li>
                                    <li><a href="#">CAPACITORS</a></li>
                                    <li><a href="#">SWITCH & SOCKET</a></li>
                                    <li><a href="#">LIMIT SWITCH & SENSORE</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Contact Us</h3>
                            <div class="th-widget-contact">
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-location-dot"></i>
                                    </div>
                                    <p class="info-box_text">Nexa electricals trading LLC Dubai-UAE</p>
                                </div>
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <p class="info-box_text">
                                        <a href="tel:+97145805883" class="info-box_link">+97145805883</a>
                                       
                                    </p>
                                </div>
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <p class="info-box_text">
                                        <a href="mailto:contact@nexaelectric.com" class="info-box_link">contact@nexaelectric.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap" data-bg-src="<?php //echo base_url().'electricalshop/assets/img/bg/copyright_bg_1.png';?>">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    <div class="col-md-6">
                       
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2023 <a href="#">Electrical Shop</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="developed-area">
                         Created with <img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/heartbeat.png';?>"> by <a href="https://pocketfriendlyweb.com/" target="_blank">PocketFriendlyWeb</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer-->

    <!--********************************
			Code End  Here 
	******************************** -->
<!-- whatsapp -->
    <div class="button__cover">
        <a href="tel:+971 50 964 8779 "><i class="fab fa-whatsapp"></i></a>
        <a href="#" target="_blank"> <i class="fas fa-location-dot"></i> </a>
    </div>

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>


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

</script>






    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <!--script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
 
    <script src="assets/js/swiper-bundle.min.js"></script>
    
    <script src="assets/js/bootstrap.min.js"></script>
 
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <script src="assets/js/jquery.counterup.min.js"></script>

    <script src="assets/js/jquery-ui.min.js"></script>
  
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>

  
    <script src="assets/js/main.js"></script-->




    









</body>

</html>