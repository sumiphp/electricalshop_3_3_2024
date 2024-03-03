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
  


    <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/bootstrap.min.css';?>">
  
  <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/fontawesome.min.css';?>">
 
  <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/magnific-popup.min.css';?>">

  <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/swiper-bundle.min.css';?>">

  <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/style.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/responsive.css';?>">


  <?php $sitedetails = sitedetails(); 
         
        
         
         ?>



</head>

<body>

   

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
                        <div class="img"><img src="<?php echo base_url().'electricalshop/assets/img/e-shop/small-product1.png';?>" alt="Product Image"></div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="product-about">
                        <p class="price">$120.85<del>$150.99</del></p>
                        <h2 class="product-title">TeSysD TH O/L RELAY CL10A 16-24A</h2>
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
    <div class="sidemenu-wrapper sidemenu-cart d-none d-lg-block ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title">Shopping cart</h3>
                <div class="widget_shopping_cart_content">
                    <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?php echo base_url().'electricalshop/assets/img/e-shop/small-product2.png';?>" alt="Cart Image">MPCB</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>940.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?php echo base_url().'electricalshop/assets/img/e-shop/small-product3.png';?>" alt="Cart Image">VALVE & ACTUATORS</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>899.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?php echo base_url().'electricalshop/assets/img/e-shop/small-product4.png';?>" alt="Cart Image">LIMIT SWITCH & SENSORE</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>756.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?php echo base_url().'electricalshop/assets/img/e-shop/small-product1.png';?>" alt="Cart Image">ENCLOSURES</a>
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
    <!--==============================
    Sidemenu
============================== -->
    <div class="sidemenu-wrapper sidemenu-info d-none d-lg-block ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget  ">
                <div class="th-widget-about">
                    <div class="about-logo">
                        <a href="#"><img src="<?php echo base_url().'electricalshop/assets/img/logo-eletrical.png';?>" alt="logo"></a>
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
    </div><!--==============================
    Mobile Menu
  ============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="#"><img src="<?php echo base_url().'electricalshop/assets/img/logo-eletrical.png';?>" alt="Electrical Shop"></a>
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
    </div><!--==============================
	Header Area
==============================-->
    <header class="th-header header-layout3">
        
        <div class="menu-top">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="#"><img src="<?php echo base_url().'electricalshop/assets/img/logo-eletrical.png';?>" alt="Frutin"></a>
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
                                <a class="" href="#" ><img src="<?php echo base_url().'electricalshop/assets/img/e-shop/menu-icon.png';?>"/>  AED</a>
                               
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
                                        <a href="#">Contact</a>
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
    </header>
    <!--==============================
    Breadcumb
============================== -->
    <!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper " data-bg-src="<?php echo base_url().'electricalshop/assets/img/e-shop/bg_01.jpg';?>">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Checkout</h1>
                <ul class="breadcumb-menu">
                    <li><a href="#">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div><!--==============================
Checkout Arae
==============================-->
    <div class="th-checkout-wrapper space-top space-extra-bottom">
        <div class="container">
           
            <div class="woocommerce-form-coupon-toggle">
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
            </div>
            <form action="#" class="woocommerce-checkout mt-40">
                <div class="row ">
                    <div class="col-lg-6">
                        <h2 class="h4">Billing Details</h2>
                        <div class="row">
                            <div class="col-12 form-group">
                                <select class="form-select">
                                    <option>United Kingdom (UK)</option>
                                    <option>United State (US)</option>
                                    <option>Equatorial Guinea (GQ)</option>
                                    <option>Australia (AU)</option>
                                    <option>Germany (DE)</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Your Company Name">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Street Address">
                                <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Town / City">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Country">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Postcode / Zip">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Email Address">
                                <input type="text" class="form-control" placeholder="Phone number">
                            </div>
                            <div class="col-12 form-group">
                                <input type="checkbox" id="accountNewCreate">
                                <label for="accountNewCreate">Create An Account?</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p id="ship-to-different-address">
                            <input id="ship-to-different-address-checkbox" type="checkbox" name="ship_to_different_address" value="1" checked>
                            <label for="ship-to-different-address-checkbox">
                                Ship to a different address?
                                <span class="checkmark"></span>
                            </label>
                        </p>
                        <div class="shipping_address">
                            <div class="row">
                                <div class="col-12 form-group">
                                    <select class="form-select">
                                        <option>United Kingdom (UK)</option>
                                        <option>United State (US)</option>
                                        <option>Equatorial Guinea (GQ)</option>
                                        <option>Australia (AU)</option>
                                        <option>Germany (DE)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" placeholder="Your Company Name">
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" placeholder="Street Address">
                                    <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" placeholder="Town / City">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" placeholder="Country">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" placeholder="Postcode / Zip">
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" placeholder="Email Address">
                                    <input type="text" class="form-control" placeholder="Phone number">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <textarea cols="20" rows="5" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <h4 class="mt-4 pt-lg-2">Your Order</h4>


            <?php echo $this->cart->total_items(); ?>ooooo
            <form action="#" class="woocommerce-cart-form">
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
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="#"><img width="91" height="91" src="assets/img/e-shop/small-product3.png" alt="Image"></a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="#">TeSysD TH O/L RELAY CL10A 16-24A</a>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <strong class="product-quantity">01</strong>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="checkout-ordertable">
                        <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td data-title="Subtotal" colspan="4"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>281.05</bdi></span></td>
                        </tr>
                        <tr class="woocommerce-shipping-totals shipping">
                            <th>Shipping</th>
                            <td data-title="Shipping" colspan="4"> Enter your address to view shipping options.
                            </td>
                        </tr>
                        <tr class="order-total">
                            <th>Total</th>
                            <td data-title="Total" colspan="4"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>281.05</bdi></span></strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
            <div class="mt-lg-3 mb-30">
                <div class="woocommerce-checkout-payment">
                    <ul class="wc_payment_methods payment_methods methods">
                        <li class="wc_payment_method payment_method_bacs">
                            <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked">
                            <label for="payment_method_bacs">Direct bank transfer</label>
                            <div class="payment_box payment_method_bacs">
                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                </p>
                            </div>
                        </li>
                        <li class="wc_payment_method payment_method_cheque">
                            <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque">
                            <label for="payment_method_cheque">Cheque Payment</label>
                            <div class="payment_box payment_method_cheque">
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                            </div>
                        </li>
                        <li class="wc_payment_method payment_method_cod">
                            <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method">
                            <label for="payment_method_cod">Credit Cart</label>
                            <div class="payment_box payment_method_cod">
                                <p>Pay with cash upon delivery.</p>
                            </div>
                        </li>
                        <li class="wc_payment_method payment_method_paypal">
                            <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal">
                            <label for="payment_method_paypal">Paypal</label>
                            <div class="payment_box payment_method_paypal">
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                            </div>
                        </li>
                    </ul>
                    <div class="form-row place-order">
                        <button type="submit" class="th-btn">Place order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
	Footer Area
==============================-->
    <div class="">
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
    </div>

    <?php include('../footer.php');?>

   <!--==============================
	Footer Area
==============================-->
<!--div class="footer-top-newsletter">
    <div class="container z-index-common">
        <div class="newsletter-wrap">
            <div class="newsletter-content">
                <div class="email-icon">
                    <img src="assets/img/icon/email_2.svg" alt="Icon">
                </div>
                <h4 class="newsletter-title">Sign Up to Get Updates & News About Us.</h4>
            </div>
            <form class="newsletter-form">
                <div class="form-group">
                    <input class="form-control" type="email" placeholder="Email Address" required="">
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
                                <a href="#"><img src="assets/img/logo-eletrical.png" alt="eletrical"></a>
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
    <div class="copyright-wrap" data-bg-src="assets/img/bg/copyright_bg_1.png">
        <div class="container">
            <div class="row gy-2 align-items-center">
                <div class="col-md-6">
                   
                    <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2023 <a href="#">Electrical Shop</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="developed-area">
                     Created with <img src="assets/img/e-shop/heartbeat.png"> by <a href="https://pocketfriendlyweb.com/" target="_blank">PocketFriendlyWeb</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer--->

<!--********************************
        Code End  Here 
******************************** -->
<!-- whatsapp -->
<div class="button__cover">
    <a href="tel:+971 50 964 8779 "><i class="fab fa-whatsapp"></i></a>
    <a href="#" target="_blank"> <i class="fas fa-location-dot"></i> </a>
</div>

    <!--********************************
			Code End  Here 
	******************************** -->

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





</body>

</html>