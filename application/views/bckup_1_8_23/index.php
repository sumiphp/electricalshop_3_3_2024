<!doctype html>
<html class="no-js" lang="zxx">
<style>
label.error.errpopupmsg {
    position: absolute;
    bottom: -35px;
    color: #f61c0d;
    font-style: italic;
    font-weight: 600;
}

</style>
<?php echo htmlspecialchars_decode($getga->site_ga_code); ?>


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
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/bootstrap.min.css';?>">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/fontawesome.min.css';?>">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/magnific-popup.min.css';?>">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/swiper-bundle.min.css';?>">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/style.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/responsive.css';?>">
    <?php $this->load->view('includes/metatags', array('page_title' => $page_title)); ?>

</head>

<body>
<?php
        $currency = '';
        if (isset($sitecurrency)) {
            $currency = $sitecurrency['currency'];
        }
        ?>
         <?php $sitedetails = sitedetails(); 
         
        
         
         ?>

    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  	<![endif]-->


    <!--********************************
   		Code Start From Here 
	******************************** -->

    <!--==============================
     Preloader
  ==============================-->
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
    <div id="QuickView" class="white-popup mfp-hide">
        <div class="container bg-white rounded-10">
            <div class="row gx-60">
                <div class="col-lg-6">
                    <div class="product-big-img">
                        <div class="img"><img src="<?php echo base_url().'electricalshop/assets/img/product/product_details_1_1.jpg';?>" alt="Product Image"></div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="product-about">
                        <p class="price">$120.85<!--del>$150.99</del--></p>
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
    </div><!--==============================
    Sidemenu
============================== -->
    <!-- <div class="sidemenu-wrapper sidemenu-cart d-none d-lg-block ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title">Shopping cart</h3>
                <div class="widget_shopping_cart_content">
                    <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?php echo base_url().'electricalshop/assets/img/product/product_thumb_1_1.jpg';?>" alt="Cart Image">MPCB</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>940.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src=<?php echo base_url().'electricalshop/assets/img/product/product_thumb_1_2.jpg';?>" alt="Cart Image">VALVE & ACTUATORS</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>899.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?php echo base_url().'electricalshop/assets/img/product/product_thumb_1_3.jpg';?>" alt="Cart Image">LIMIT SWITCH & SENSORE</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>756.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?php echo base_url().'electricalshop/assets/img/product/product_thumb_1_4.jpg';?>" alt="Cart Image">ENCLOSURES</a>
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
                        <a href="#" class="th-btn wc-forward">View cart</a>
                        <a href="#" class="th-btn checkout wc-forward">Checkout</a>
                    </p>
                </div>
            </div>
        </div>
    </div> -->
    <!--==============================
    Sidemenu
============================== -->
    <div class="sidemenu-wrapper sidemenu-info d-none d-lg-block ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget  ">
                <div class="th-widget-about">
                    <div class="about-logo">
                        <a href="home-organic-farm#"><img src="<?=base_url().'assets/uploads/site/'.$gt->site_logo //$sitedetails['logo']?>" alt="logo"></a>
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
                            <a href="tel:+<?=$sitedetails['phone_number_1']?>" class="info-box_link">+<?=$sitedetails['phone_number_1']?></a>
                            <a href="tel:+<?=$sitedetails['phone_number_1']?>" class="info-box_link">+<?=$sitedetails['phone_number_1']?></a>
                        </p>
                    </div>
                    <div class="info-box">
                        <div class="info-box_icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <p class="info-box_text">
                            <a href="<?=$sitedetails['email_1']?>" class="info-box_link"><?=$sitedetails['email_1']?></a>
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
    </div><!--==============================
    Mobile Menu
  ============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="home-organic-farm#"><img src="<?=base_url().'assets/uploads/site/'.$gt->site_logo //$sitedetails['logo']?>" alt="Electrical Shop"></a>
            </div>
            <div class="th-mobile-menu">
    <?php include('menu.php');?>
              

            </div>
        </div>
    </div><!--==============================
	Header Area
==============================-->
    <header class="th-header header-layout3">
        
        <div class="menu-top">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="home-organic-farm#"><img src="<?=base_url().'assets/uploads/site/'.$gt->site_logo //$sitedetails['logo']?>" alt="Frutin"></a>
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
                            <a href="#" class="icon-btn d-none d-sm-block"><i class="far fa-user"></i></a>
                            <a href="#" class="icon-btn d-none d-sm-block">
                                <span class="badge">3</span>
                                <i class="far fa-heart"></i>
                            </a>
                            <button type="button" class="icon-btn sideMenuToggler">
                                <span class="badge">5</span>
                                <i class="far fa-cart-shopping"></i>
                            </button>

                            <div class="dropdown-link aed-sec">
                                <a class="" href="#" ><img src="<?php echo base_url().'electricalshop/assets/img/e-shop/menu-icon.png';?>" alt="menuicon" />  AED</a>
                               
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                       
                        <div class="col-auto">
                            <nav class="main-menu menu-style1 d-none d-lg-inline-block">
                            <?php include('menu.php');?>
                             
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
                                    <h3 class="box-title"><a href="mailto:<?=$sitedetails['email_1']?>"><?=$sitedetails['email_1']?></a></h3>
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
                                    <h3 class="box-title"><a href="tel:+<?=$sitedetails['phone_number_1']?>"><?=$sitedetails['phone_number_1']?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--==============================
Hero Area
==============================-->
    <div class="th-hero-wrapper hero-3" id="hero" style="background: url(<?php echo base_url().'assets/uploads/homepage/'.$homepagedetails->banner1;?>);background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-12 col-lg-12">
                    <div class="swiper th-slider" id="heroSlider3" data-slider-options='{"effect":"fade"}'>
                        <div class="swiper-wrapper">
                        <?php 
 $i=0;
 foreach($result as $re){
	//if ($i==0){
	
	?>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5">
                                        <div class="banner-product-img">
                                            <img src="<?php echo base_url().'assets/uploads/carousel/'.$re['picture'];?>" alt="carousel" title="banner-img"  data-ani="slideinup" data-ani-delay="0.0s">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="product-details">
                                            <div class="hero-style3">
                                                <span class="hero-subtitle" data-ani="slideinup" data-ani-delay="0.0s"><?php echo $re['title'];?></span>
                                                <h1 class="hero-title2">
                                                    <span class="title1" data-ani="slideinup" data-ani-delay="0.2s"> <?php echo $re['title2'];?></span>
                                                    <span class="title2" data-ani="slideinup" data-ani-delay="0.3s"><?php echo $re['title3'];?> </span>
                                                </h1>
                                                <p class="hero-text" data-ani="slideinup" data-ani-delay="0.5s"> <?php echo $re['title4'];?></p>
                                                <a href="#" class="th-btn style4" data-ani="slideinup" data-ani-delay="0.6s">Shop Now<i class="fas fa-chevrons-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>

                            <?php } ?>

                        
                        </div>
                        <div class="slider-pagination"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--======== / Hero Section ========--><!--==============================
Feature Area  
==============================-->
    <section class="mt-4 mb-35">
        <div class="container">
            <div class="feature-list-wrap">
                <div class="feature-list">
                    <div class="box-icon">
                        <img src="<?php echo base_url().'assets/uploads/homepage/'.$homepagedetails->img1;?>" alt="icon">
                    </div>
                    <div class="media-body">
                        <h3 class="box-title"> <?php echo $homepagedetails->label1;?></h3>
                        <p class="box-text"><?php echo $homepagedetails->label2;?></p>
                    </div>
                </div>
                <div class="feature-list-line"></div>
                <div class="feature-list">
                    <div class="box-icon">
                        <img src="<?php echo base_url().'assets/uploads/homepage/'.$homepagedetails->img2;?>" alt="icon">
                    </div>
                    <div class="media-body">
                        <h3 class="box-title"> <?php echo $homepagedetails->label3;?></h3>
                        <p class="box-text"><?php echo $homepagedetails->label4;?></p>
                    </div>
                </div>
                <div class="feature-list-line"></div>
                <div class="feature-list">
                    <div class="box-icon">
                        <img src="<?php echo base_url().'assets/uploads/homepage/'.$homepagedetails->img3;?>" alt="icon">
                    </div>
                    <div class="media-body">
                        <h3 class="box-title"><?php echo $homepagedetails->label5;?></h3>
                        <p class="box-text"><?php echo $homepagedetails->label6;?></p>
                    </div>
                </div>
                <div class="feature-list-line"></div>
                <div class="feature-list">
                    <div class="box-icon">
                        <img src="<?php echo base_url().'assets/uploads/homepage/'.$homepagedetails->img4;?>" alt="icon">
                    </div>
                    <div class="media-body">
                        <h3 class="box-title"><?php echo $homepagedetails->label7;?></h3>
                        <p class="box-text"><?php echo $homepagedetails->label8;?></p>
                    </div>
                </div>
                <div class="feature-list-line"></div>
            </div>
        </div>
    </section>

    <!--==============================
Product List AREA  
==============================-->

   <!--==============================
Product Area  
==============================-->
<section class="space-top space-bottom bg-blue">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-xl-12 col-lg-12 col-md-12 product-list">
                <div class="row justify-content-lg-between justify-content-center align-items-center">
                    <div class="col-md text-center text-md-start">
                        <h2 class="sec-title mb-30">Our Products</h2>
                    </div>
                    <div class="col-md-auto d-none d-lg-inline-block">
                        <div class="sec-btn mb-35">
                            <div class="icon-box">
                                <button data-slider-prev="#productSlider7" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
                                <button data-slider-next="#productSlider7" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper th-slider has-shadow " id="productSlider7" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                    <div class="swiper-wrapper">


                    <?php if (! empty($featured_products)) { ?>

                        <?php foreach ($featured_products as $product) { ?>

                        <div class="swiper-slide">
                            <div class="th-product product-grid">
                                <div class="product-img">
                                    <img src="<?=site_url()?>assets/uploads/products/<?=$product['prod_primary_image']?>" alt="<?=$product['prod_name']?>" title="<?=$product['prod_name']?>" alt="Product Image">
                                  
                                    <div class="actions">
                                        <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                        <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                        <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                   
                                    <h3 class="product-title"><a href="#"><?=$product['prod_name']?></a></h3>
                                    <p> <?php
                                            $this->db->where('prod_dt_prodid',$product['prod_id']);
        $this->db->where('prod_dt_typeid',5);
       // $this->db->order_by("orderno", "asc");
        $this->db->select('*');
        $this->db->from('product_details');
        $query = $this->db->get();
        $rowdt=$query->row();
        $string1=$rowdt->prod_dt_desc;
        echo substr($string1, 0, 100); 
        //echo  $currency.' '.$pricedt->prod_dt_desc;
        
        ?>
                                            </p>
                                  
                                   
                                </div>
                                <div class="btn-area mt-4">
                                    <a href="<?=site_url().'product/'.$product['prod_canonial_name']?>" class="th-btn btn-sm">View More</a>
                                </div>
                            </div>
                        </div>

                        <?php } } ?>




                    </div>
                </div>






            </div>
        </div>

    </div>
</section>

    <!--==============================
Product list Area  
==============================-->
<section class="mt-50 space-bottom">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-end">
            <div class="welcome-content mb-50">
                <h3 class="Green-heading">Welcome to Electrical shope</h3>
                <p>
                                <?php echo $homepagedetails->desc1;?></p>
            </div>
           
         </div>
         <?php if (! empty($best_selling)) { ?>
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
                                     
                                        <img src="<?=site_url()?>assets/uploads/products/<?=$product['prod_primary_image']?>" alt="<?=$product['prod_name']?>" title="<?=$product['prod_name']?>"/>
                                        <span class="product-tag">10% OFF</span>
                                        <span class="product-tag-second">Sale</span>
                                        <div class="actions">
                                            <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">


                               
                                      
                                        <h3 class="product-title"><a href="#"><?=$product['prod_name']?></a></h3>
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
                                            
                                            
                                            
                                            
                                            <!--del class="right">-$06.99</del--></span>

                                        </div>
                                        <div class="add-cart-btn mt-4">
                                            <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
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

        <?php } ?>

        <?php if (! empty($latest_products)) { ?>
        <div class="latest-product mt-50">
            <div class="row justify-content-lg-between justify-content-center align-items-end">
                <div class="col-lg">
                    <div class="title-area text-center text-lg-start">
                        <h2 class="sec-title">Latest Product</h2>
                    </div>
                </div>
               
            </div>
            <div class="tab-content best-selling-product">
                <!-- Single item -->
                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                    <div class="slider-area">
                        <div class="swiper th-slider has-shadow productSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                            <div class="swiper-wrapper">
                            <?php foreach ($latest_products as $product) { ?>
                                <div class="swiper-slide">
                                    <div class="th-product product-grid">
                                        <div class="product-img">
                                            <!--img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/product/1.png';?>" alt="Product Image"--->
                                            <img src="<?=site_url()?>assets/uploads/products/<?=$product['prod_primary_image']?>" alt="<?=$product['prod_name']?>" title="<?=$product['prod_name']?>"/>
                                            <span class="product-tag">10% OFF</span>
                                            <span class="product-tag-second">Sale</span>
                                            <div class="actions">
                                                <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                                <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                          
                                            <h3 class="product-title"><a href="#"><?=$product['prod_name']?></a></h3>
                                            <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                            </div>
                                            <div class="price-area mt-2">
                                                <span class="price"><?//=$currency?>  <?php
                                            $this->db->where('prod_dt_prodid',$product['prod_id']);
        $this->db->where('prod_dt_typeid',4);
       // $this->db->order_by("orderno", "asc");
        $this->db->select('*');
        $this->db->from('product_details');
        $query = $this->db->get();
        $pricedt=$query->row();
        
        echo  $currency.' '.$pricedt->prod_dt_desc;
        
        ?><!--del class="right"><?//=$currency?>06.99</del--></span>
    
                                            </div>
                                            <div class="add-cart-btn mt-4">
                                                <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
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

        </div>

        <?php } ?>
    </div>
</section>

    <!--==============================
Cta Area  
==============================-->



    <section class="space bg-smoke2" >
        <div class="container z-index-common">
            <div class="row gy-4 justify-content-center">
                <div class="col-xxl-8 col-lg-7">
                    <div class="offer-box mega-hover img-first-box" data-bg-src="<?php echo base_url().'assets/uploads/homepage/'.$homepagedetails->image1;?>" style="background-size: cover;min-height: 530px;">
                        
                        <h2 class="box-title">
                        <?php echo $homepagedetails->label9;?>


                        </h2>
                        <h4>  <?php echo $homepagedetails->label10;?></h4>
                        <a href="#" class="th-btn btn-sm">Shop Now<i class="fas fa-chevrons-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-5">
                    <div class="row">
                        <div class="col-xxl-12 col-lg-12">
                            <div class="offer-box mega-hover second-box" data-bg-src="<?php echo base_url().'assets/uploads/homepage/'.$homepagedetails->image2;?>">
                                <span class="box-subtitle bg-theme"> <?php echo $homepagedetails->label11;?></span>
                                <h3 class="box-title text-white"> <?php //echo $homepagedetails->label12;?> <br>  <?php //echo $homepagedetails->label13;?></h3>
                                <a href="#" class="th-btn style4 btn-sm">Shop Now<i class="fas fa-chevrons-right ms-2"></i></a>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-lg-12">
                            <div class="offer-box mega-hover second-box" data-bg-src="<?php echo base_url().'assets/uploads/homepage/'.$homepagedetails->image3;?>">
                                <span class="box-subtitle"> <?php echo $homepagedetails->label14;?></span>
                                <h3 class="box-title"> <?php //echo $homepagedetails->label15;?> <br>  <?php //echo $homepagedetails->label16;?></h3>
                                <a href="#" class="th-btn btn-sm">Shop Now<i class="fas fa-chevrons-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                   
                </div>
              
            </div>
        </div>
    </section>
    <!--==============================
Category Area  
==============================-->
  

  
    <!--==============================
Cta Area  
==============================-->
    <section class="space">
        <div class="container z-index-common">
            <div class="row justify-content-lg-between justify-content-center align-items-end">
                <div class="welcome-content mb-50">
                    <h3 class="Green-heading">Most View Product</h3>
                </div>
               
             </div>
             <div class="row recent-product">
             <?php foreach ($most_viewed as $product) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <!--img src="<?php //echo base_url().'electricalshop/assets/img/e-shop/product/1.png';?>" alt="Product Image"-->
                            <img src="<?=site_url()?>assets/uploads/products/<?=$product['prod_primary_image']?>" alt="<?=$product['prod_name']?>" title="<?=$product['prod_name']?>"/>
                            <span class="product-tag">10% OFF</span>
                            <span class="product-tag-second">Sale</span>
                            <div class="actions">
                                <a href="#" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                          
                            <h3 class="product-title"><a href="#"><?=$product['prod_id']?> <?=$product['prod_name']?></a></h3>
                            <div class="star-rating mt-2" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">4.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
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
                                <a href="#" class="th-btn"><i class="far fa-cart-shopping mr-5"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
             
                
             </div>
        </div>
    </section>

      <!--==============================
Our Store Sec  
==============================-->
<section class="space" style="background: url(<?php echo base_url().'assets/uploads/homepage/'.$homepagedetails->banner2;?>);background-repeat: no-repeat;background-size: cover;">
    <div class="our-store-bg">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <h2 class="mb-35">   <?php echo $homepagedetails->title1;?></h2>
                    <h3>   <?php echo $homepagedetails->title2;?></h3>
                    <p> <?php echo $homepagedetails->membershipdesc;?></p>
                </div>

                <div class="text-center add-cart-btn mt-4">
                    <a href="#" class="th-btn">Join Member</a>
                </div>
            </div>
        </div>
    </div>
 
</section>
 
    <!--==============================
Brand Area  
==============================-->
<?php if (! empty($brands)) { ?>

    <div class="space bg-blue">
        <div class="container th-container">
            <div class="row">
                <div class="text-center">
                    <h2 class="mb-35">We Deal Brand</h2>
                </div>
               
            </div>
            <div class="swiper th-slider" id="blogSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}'>
                <div class="swiper-wrapper">
            
                    <?php 
                 
                    
                    foreach ($brands as $brand) { ?>
                    <div class="swiper-slide">
                        <div class="brand-card">
                            <img src="<?=site_url()?>assets/uploads/brands/<?=$brand['brand_image']?>" alt="<?=$brand['brand_name']?>">
                        </div>

                      
                    </div>
                    <?php } ?>

                </div>
             

            </div>
        </div>
    </div>
    <?php } ?>
    <!--==============================
Product Area  
==============================-->
  
  
  
   
    <div class="footer-top-newsletter">
        <div class="container z-index-common">
            <div class="newsletter-wrap">
                <div class="newsletter-content">
                    <div class="email-icon">
                        <img src="<?php echo base_url().'electricalshop/assets/img/icon/email_2.svg';?>" alt="Icon">
                    </div>
                    <h4 class="newsletter-title">Sign Up to Get Updates & News About Us.</h4>
                </div>
                <form class="newsletter-form" name="frmemail" id="frmemail" action="<?php echo base_url().'Home/newslettersubscribe';?>" method="post">
                    <div class="form-group">
                    <span id="newsmsg" style='bottom:51px;color:red;font-weight:bold;'></span>
                        <input class="form-control" name="emailidnews"  id="emailnews" type="email" placeholder="Email Address"   >
                        <label id="emailnews-error" class="error errpopupmsg" for="emailnews" ></label>
                    </div>
                    <button type="submit" class="th-btn">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer-wrapper footer-layout3">
          <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a href="#"><img src="<?=base_url().'assets/uploads/site/'.$gt->site_logo //$sitedetails['logo']?>" alt="eletrical"></a>
                                </div>
                                <p class="about-text">

                                <?php $homepagedetails->desc2;?>
                                </p>
                                <div class="th-social">
                                    <?php //print_r($sitedetails);?>
                                    <a href="<?php echo $sitedetails['facebook_url']?>"><i class="fab fa-facebook-f"></i></a>
                                     
                                    <a href="<?php echo $sitedetails['twitter_url']?>"><i class="fab fa-twitter"></i></a>
                                    <a href="<?php echo $sitedetails['site_linkldn']?>"><i class="fab fa-linkedin-in"></i></a>
                                  
                                 
                                    <a href="<?=$sitedetails['whatsapp_number']?>"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Quick Links</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="<?php echo 'about-us';?>">About Us</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Help & FAQs</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="<?php echo 'contact-us';?>">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Categories</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                <?php 
                                $i=0;
                                
                                foreach ($recent_categories as $recentCategory) { 
                                    if ($i<5){
                                    ?>
                                    <li><a href="<?=site_url().'products/category/'.$recentCategory['cat_canonial_name']?>"><?=$recentCategory['cat_name']?></a></li>
                                    <?php
                              
                                
                                }
                                $i++;
                                
                                
                                
                                } ?>
                                   
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
                                    <p class="info-box_text"><?php 
                                    
                                    //print_r($sitedetails);
                                    echo $site->site_address_line1;?></p>
                                </div>
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <p class="info-box_text">
                                        <a href="tel:<?=$sitedetails['phone_number_1']?>" class="info-box_link"><?=$sitedetails['phone_number_1']?></a>
                                       
                                    </p>
                                </div>
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <p class="info-box_text">
                                        <a href="mailto:<?=$sitedetails['email_1']?>" class="info-box_link"><?=$sitedetails['email_1']?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap" data-bg-src="<?php echo base_url().'electricalshop/assets/img/bg/copyright_bg_1.png';?>" alt="copyright">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    <div class="col-md-6">
                       
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2023 <a href="<?php echo base_url();?>">Electrical Shop</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="developed-area">
                         Created with <img src="<?php echo base_url().'electricalshop/assets/img/e-shop/heartbeat.png';?>" alt="heartbeat" > by <a href="https://pocketfriendlyweb.com/" target="_blank">PocketFriendlyWeb</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--********************************
			Code End  Here 
	******************************** -->
<!-- whatsapp -->
    <div class="button__cover">
        <a href="<?=$sitedetails['whatsapp_number']?> "><i class="fab fa-whatsapp"></i></a>
        <a href="#" target="_blank"> <i class="fas fa-location-dot"></i> </a>
    </div>

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
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

    <!-- Main Js File -->
    <script src="<?php echo base_url().'electricalshop/assets/js/main.js';?>"></script>
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

  </script>




</body>

</html>