<!doctype html>
<html lang="zxx">
    <head>


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
     
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
       
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>"> 
      
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/owl.theme.default.min.css';?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/owl.carousel.min.css';?>">
       
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/magnific-popup.min.css';?>">
        
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/animate.min.css';?>">
       
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/boxicons.min.css';?>">
        
        <link rel="stylesheet" href="<?php echo base_url().'assets/fonts/flaticon.css';?>">
        
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/meanmenu.min.css';?>">
      
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css';?>">
       
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/responsive.css';?>">
       
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/theme-dark.css';?>">

       
        <title>NEXA</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon.ico';?>">
    </head>

    <body>
        <!-- Start Preloader -->
        <div class="preloader">
            <div class="preloader-wave"></div>
        </div>
        <!-- End Preloader -->

        <!-- search box Area -->
        <div class="search-box-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 m-auto product-form-sec">
                        <form action="">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit" class="btn-submit"><i class="bx bx-search"></i></button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-media-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                    <div class="social-media-contact">
                        <ul class="">
                            <li><a href="mailto:<?=$sitedetails['email_1']?>"><i class='bx bxs-envelope' ></i> <?=$sitedetails['email_1']?></a></li>

                            <!--li><a href="tel:+97145805883"><i class='bx bxl-whatsapp'></i> +97145805883</a></li>
                            <li><a href="tel:+97145805883"><i class='bx bxs-phone-call' ></i> +97145805883</a></li-->
                            <li><a href="tel:<?=$sitedetails['phone_number_1']?>"><i class='bx  bxl-whatsapp' ></i><?=$sitedetails['phone_number_1']?></a></li>
                            <li><a href="tel:<?=$sitedetails['phone_number_1']?>"><i class='bx bxs-phone-call' ></i><?=$sitedetails['phone_number_1']?></a></li>
                        </ul>

                     
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="right-section">
                              <ul>
                                    <li class="cart-icon ">
                                        <a href="#" target="_blank"><img src="<?php echo base_url().'assets/img/cart-icon.png';?>"/></a>
                                    </li>
                                    <li class="lang-sec">
                                        <div class="select-box">
                                            <img src="<?php echo base_url().'assets/img/elipse.png';?>">
                                            <select id="currencyList" class="select-box">
                                               
                                                <option value="AED" selected="selected" label="AED">AED</option>
                                                <option value="EUR" label="EUR">EUR</option>
                                                <option value="JPY" label="JPY">JPY</option>
                                                <option value="USD" label="USD">USD</option>
                                                </select>
                                        </div>
                                       
                                    </li> 
                                  
                                </ul>
                               
                        </div>
                    </div>

                 
                    
                </div>
            </div>
        </div>

          <!-- Start Navbar Area -->
          <div class="navbar-area">
            <!-- Menu For Mobile Device -->
             <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="<?php echo base_url().'assets/img/logo.png';?>" class="logo-one" alt="Logo">
                    <img src="<?php echo base_url().'assets/img/sticky-logo.png';?>" class="logo-two" alt="Logo">
                </a>
            </div>

            <div class="mobile-search-sec">
                <div class="search-area">
                    <div class="other-option">
                        <div class="search-item">
                            <a href="#" class="search-btn">
                                <i class="flaticon-loupe"></i> 
                            </a>
                            <i class="close-btn bx bx-x"></i>
                            <div class="search-overlay search-popup">
                                <div class="search-box">
                                    <form class="search-form">
                                        <input class="search-input" name="search" placeholder="Search" type="text">
                                        <button class="search-button" type="submit">
                                            <i class="flaticon-user"></i> 
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav product-navigation-bar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light ">
                        <!-- <div class="logo-sec">
                        <a class="navbar-brand" href="index.html">
                            <img src="<?php echo base_url().'assets/img/logo.png';?>" alt="Logo">
                        </a>
                        <a class="navbar-brand-sticky" href="index.html">
                            <img src="<?php echo base_url().'assets/img/sticky-logo.png';?>" alt="Logo">
                        </a>
                    </div> -->

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Brand 
                                        <i class='bx bxs-chevron-right'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link active">
                                                Brand 1
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Brand 2
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Brand 3
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                   <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Product  
                                    <i class='bx bxs-chevron-right'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link active">
                                            Product 1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Product 2
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Product 3
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Product 4
                                        </a>
                                    </li>
                                </ul>
                            </li> 
                                
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    About Us
                                </a>
                            </li>
                               
                              
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Clearance
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Contact
                                    </a>
                                </li>
                            </ul>

                           
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->
        

        <!-- <div class="product-navigation-bar">
            <div class="container">
                
                <nav class="navbar navbar-expand-md navbar-light ">
                    

                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Brand 
                                    <i class='bx bxs-chevron-right'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link active">
                                            Brand 1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Brand 2
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Brand 3
                                        </a>
                                    </li>
                                </ul>
                            </li> 
                          
                            
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Product  
                                    <i class='bx bxs-chevron-right'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link active">
                                            Product 1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Product 2
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Product 3
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Product 4
                                        </a>
                                    </li>
                                </ul>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    About Us
                                </a>
                            </li>
                          
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Clearance
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Contact
                                </a>
                            </li>
                        </ul>

                      
                    </div>
                </nav>
            </div>
        </div> -->


     
        <!-- End Header Area -->

    
        
        
        <!-- Banner Area End -->

        <div class="product-deatils-area">
            <div class="container">
                <div class="product-details pt-50 client-slider owl-carousel owl-theme">

                <?php 
                //print_r($productdetails['Images']);
                
                
                foreach ($productdetails['Images'] as $image) { ?>



                    <div class="client-item ">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="products-img-box text-center">
                                    <!--img src="<?php //echo base_url().'assets/img/product-img.png';?>"/-->
                                    <img  src="<?=site_url()?>assets/uploads/products/<?=$image['pd_img_image']?>" alt="<?=$image['prod_name']?>" title="<?=((trim($image['pd_img_description']) != '') ? $image['pd_img_description'] : $image['prod_name'])?>"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="product-box-details-area">
    
                                <div class="products-details">
                                    <h2><?=$product['prod_name']?>--</h2>
                                    <p><?=html_entity_decode(nl2br($prodDesc))?></p>
                                </div>
                                
                                <div class="matrial-details">
                                    <h2>
                                        <img src="<?php echo base_url().'assets/img/logo-details.png';?>"/>
                                    </h2>


                                    <div class="details-table-sec">
                                    <?php 
                                    //print_r($prodPoints);
                                    
                                    
                                    foreach ($prodPoints as $label => $value) { ?>

                                        <?php } ?>
                                     
                                        <table id="part" cellspacing="0">
                                            <tr>
                                                <th class="label">
                                                    Part Number :
                                                </th>
                                                <td>
                                                   <?php echo $prodPoints['Part Number'];?>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="label">
                                                    Availability :
                                                </th>
                                                <td>
                                                    <span class="btn-sec">
                                                        <a href="#" class="default-btn small-btn"> Instock</a>    
                                                        <a href="#" class="default-btn small-btn"> Request </a> 
                                                    </span>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="label">
                                                    SKU :
                                                </th>
                                                <td>
                                                <?php echo $prodPoints['SKU'];?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Country origin :
                                                </th>
                                                <td>
                                                <?php echo $prodPoints['Country origin'];?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Price :
                                                </th>
                                                <td>
                                                    <span class="smallText"> AED  <?php echo $prodPoints['Price'];?></span> AED  <?php echo $prodPoints['Price'];?> +VAT 
                                                <span class="inner-select">
                                                    <select id="currencyList" class="select-box">
                                                        <option value="AED" selected="selected" label="AED">AED</option>
                                                        <option value="EUR" label="EUR">EUR</option>
                                                        <option value="JPY" label="JPY">JPY</option>
                                                        <option value="USD" label="USD">USD</option>
                                                        </select>
                                                </span> 
                                                </td>

                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Quantity :
                                                </th>
                                                <td>
                                                    <input type="number" id="quantity" name="quantity" min="1" max="5">

                                                </td>
                                            </tr>
                                         
                                    </table>
                                    </div>
    
                                    
                                    <div class="button-area">
                                        <div class="btn-sec mt-30">
                                            <a href="#" class="default-btn  ml-50">
                                                <img src="<?php echo base_url().'assets/img/btn-cart.png';?>"/>
                                                
                                                Add to Cart
                                            </a>
                                            <a href="#" class="default-btn ml-20">
                                                  <!-- <img src="<?php echo base_url().'assets/img/btn-cart.png';?>"/> -->
                                                Whole Sale Price
                                            </a>
                                        </div>
    
                                        
                                    </div>
                                   
                                </div>
                              
    
                               
    
                                
                               
    
                            
                            </div>
                            </div>
                        </div>
    
    
                        
                        
                    </div>

                    <?php }?>



                    

                    <!--div class="client-item ">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="products-img-box text-center">
                                    <img src="<?php //echo base_url().'assets/img/product-img.png';?>"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="product-box-details-area">
    
                                <div class="products-details">
                                    <h2>Schneider Electric</h2>
                                    <p>Switch disconnector, Compact INS40, 40A, standard version with black rotary handle, 3 poles</p>
                                </div>
                                
                                <div class="matrial-details">
                                    <h2>
                                        <img src="<?php //echo base_url().'assets/img/logo-details.png';?>"/>
                                    </h2>
    
                                    <div class="details-table-sec">
                                     
                                        <table id="part" cellspacing="0">
                                            <tr>
                                                <th class="label">
                                                    Part Number :
                                                </th>
                                                <td>
                                                    00000
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="label">
                                                    Availability :
                                                </th>
                                                <td>
                                                    <span class="btn-sec">
                                                        <a href="#" class="default-btn small-btn"> Instock</a>    
                                                        <a href="#" class="default-btn small-btn"> Request </a> 
                                                    </span>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="label">
                                                    SKU :
                                                </th>
                                                <td>
                                                    Schneider
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Country origin :
                                                </th>
                                                <td>
                                                    France
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Price :
                                                </th>
                                                <td>
                                                    <span class="smallText"> AED 1000</span> AED 850 +VAT 
                                                <span class="inner-select">
                                                    <select id="currencyList" class="select-box">
                                                        <option value="AED" selected="selected" label="AED">AED</option>
                                                        <option value="EUR" label="EUR">EUR</option>
                                                        <option value="JPY" label="JPY">JPY</option>
                                                        <option value="USD" label="USD">USD</option>
                                                        </select>
                                                </span> 
                                                </td>

                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Quantity :
                                                </th>
                                                <td>
                                                    <input type="number" id="quantity" name="quantity" min="1" max="5">

                                                </td>
                                            </tr>
                                         
                                    </table>
                                    </div>
                                    <div class="button-area">
                                        <div class="btn-sec mt-30">
                                            <a href="#" class="default-btn  ml-50">
                                                <img src="<?php //echo base_url().'assets/img/btn-cart.png';?>"/>
                                                Add to Cart
                                            </a>
                                            <a href="#" class="default-btn ml-20">
                                                Whole Sale Price
                                            </a>
                                        </div>
    
                                        
                                    </div>
                                   
                                </div>
                              
    
                               
    
                                
                               
    
                            
                            </div>
                            </div>
                        </div>
    
    
                        
                       
                         
                    </div-->


                 

                    <!--div class="client-item ">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="products-img-box text-center">
                                    <img src="<?php //echo base_url().'assets/img/product-img.png';?>"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="product-box-details-area">
    
                                <div class="products-details">
                                    <h2>Schneider Electric</h2>
                                    <p>Switch disconnector, Compact INS40, 40A, standard version with black rotary handle, 3 poles</p>
                                </div>
                                
                                <div class="matrial-details">
                                    <h2>
                                        <img src="<?php //echo base_url().'assets/img/logo-details.png';?>"/>
                                    </h2>
    
                                    <div class="details-table-sec">
                                     
                                        <table id="part" cellspacing="0">
                                            <tr>
                                                <th class="label">
                                                    Part Number :
                                                </th>
                                                <td>
                                                    00000
                                                </td>
                                            </tr>
                                           
                                            
                                            <tr>
                                                <th class="label">
                                                    Availability :
                                                </th>
                                                <td>
                                                    <span class="btn-sec">
                                                        <a href="#" class="default-btn small-btn"> Instock</a>    
                                                        <a href="#" class="default-btn small-btn"> Request </a> 
                                                    </span>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="label">
                                                    SKU :
                                                </th>
                                                <td>
                                                    Schneider
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Country origin :
                                                </th>
                                                <td>
                                                    France
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Price :
                                                </th>
                                                <td>
                                                    <span class="smallText"> AED 1000</span> AED 850 +VAT 
                                                <span class="inner-select">
                                                    <select id="currencyList" class="select-box">
                                                        <option value="AED" selected="selected" label="AED">AED</option>
                                                        <option value="EUR" label="EUR">EUR</option>
                                                        <option value="JPY" label="JPY">JPY</option>
                                                        <option value="USD" label="USD">USD</option>
                                                        </select>
                                                </span> 
                                                </td>

                                            </tr>

                                            <tr>
                                                <th class="label">
                                                    Quantity :
                                                </th>
                                                <td>
                                                    <input type="number" id="quantity" name="quantity" min="1" max="5">

                                                </td>
                                            </tr>
                                         
                                    </table>
                                    </div>
                                    <div class="button-area">
                                        <div class="btn-sec mt-30">
                                            <a href="#" class="default-btn  ml-50">
                                                <img src="<?php //echo base_url().'assets/img/btn-cart.png';?>"/>
                                                Add to Cart
                                            </a>
                                            <a href="#" class="default-btn ml-20">
                                                Whole Sale Price
                                            </a>
                                        </div>
    
                                        
                                    </div>
                                   
                                </div>
                              
    
                               
    
                                
                               
    
                            
                            </div>
                            </div>
                        </div>
    
    
                       
                    </div-->
                    
                    
                </div>
            </div>
        </div>

        <div class="data-sheet-details">
            <div class="container">
               
                    <div class="list-of-details-product">
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="details-area">
                                    <h2 class="mb-2">Technical Data Sheet</h2>
                                    <h6>Details</h6>
                                    <p>Switch disconnector, Compact INS40, 40A, standard version with black rotary handle, 3 poles</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <div class="main-content-list-area">
                                <h2>Main</h2>
                                <div class="main-list">
                                    <div class="table-row-area">
                                        <table  id="main" cellspacing="0">
                                            <tr>
                                                <th>Range</th>
                                                <td>ComPact</td>
                                            </tr>
                                            <tr>
                                                <th>Product name</th>
                                                <td>ComPacT INS</td>
                                            </tr>
                                            <tr>
                                                <th>Product or component type</th>
                                                <td>Switch disconnector</td>
                                            </tr>
                                            <tr>
                                                <th>Poles description</th>
                                                <td>3P</td>
                                            </tr>
                                            <tr>
                                                <th>Network type</th>
                                                <td>DC AC</td>
                                            </tr>
                                            <tr>
                                                <th>Network frequency</th>
                                                <td>50/60 Hz</td>
                                            </tr>
                                            <tr>
                                                <th>[Ie] rated operational current</th>
                                                <td>AC-22A: 40 A AC 50/60 Hz 220/240 V</td>
                                            </tr>
                                        </table>
                                    </div>
                                  
                                </div>
                              </div>  
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="main-content-list-area">
                                  <h2>Complementary</h2>
                                  <div class="main-list">
                                    <div class="table-row-area">
                                        <table id="main" cellspacing="0">
                                            <tr>
                                                <th>Control type</th>
                                                <td>Rotary handle</td>
                                            </tr>
                                            <tr>
                                                <th>Handle colour</th>
                                                <td>Black</td>
                                            </tr>
                                            <tr class="spacer10">
                                                <th>Mounting mode</th>
                                                <td>Fixed</td>
                                            </tr>
                                            <tr class="spacer10">
                                                <th>Upside connection</th>
                                                <td>DIN rail Plate</td>
                                            </tr>
                                            <tr class="spacer10">
                                                <th>Network frequency</th>
                                                <td>Front</td>
                                            </tr>
                                            <tr class="spacer10">
                                                <th>Downside connection</th>
                                                <td>Front</td>
                                            </tr>
                                            <tr class="spacer10">
                                                <th>Cable cross section</th>
                                                <td>AC-22A: 40 A AC 50/60 Hz 220/240 V</td>
                                            </tr>
                                           
                                        </table>
                                    </div>
                                  </div>
                                </div>  
                              </div>
                    </div>
                </div>
             
            </div>
        </div>
        
       

       
          <!-- best selling product -->
          <section class="portfolio-area portfolio-mt pb-70">
            <div class="container">
               
                <h3 class="border-heading mb-5">Similar Products</h3>
                <div class="portfolio-slider owl-carousel owl-theme">
                  
                    <div class="portfolio-item">
                        <div class="product-content">
                            <div class="product-box">
                                <img src="<?php echo base_url().'assets/img/product/product-1.png';?>"/> 
                            </div>
                            <div class="portfolio-tag">
                                <a href="#"><span>10% Off</span></a>
                            </div>
                            <div class="second-tag">
                                <a href="#"><span>Sale</span></a>
                            </div>
                            <div class="product-details">
                                <h5>MCB Switchgear</h5>
                                <p>$25.00 <b>$20.00</b></p>
                            </div>
                            <div class="btn-sec">
                                <a href="product-details.html" class="default-btn">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="portfolio-item">
                        <div class="product-content">
                            <div class="product-box">
                                <img src="<?php echo base_url().'assets/img/product/product-2.png';?>"/> 
                            </div>
                            <div class="portfolio-tag">
                                <a href="#"><span>10% Off</span></a>
                            </div>
                            <div class="second-tag">
                                <a href="#"><span>Sale</span></a>
                            </div>
                            <div class="product-details">
                                <h5>MCB Switchgear</h5>
                                <p>$25.00 <b>$20.00</b></p>
                            </div>
                            <div class="btn-sec">
                                <a href="product-details.html" class="default-btn">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="portfolio-item">
                        <div class="product-content">
                            <div class="product-box">
                                <img src="<?php echo base_url().'assets/img/product/product-1.png';?>"/> 
                            </div>
                            <div class="portfolio-tag">
                                <a href="#"><span>10% Off</span></a>
                            </div>
                            <div class="second-tag">
                                <a href="#"><span>Sale</span></a>
                            </div>
                            <div class="product-details">
                                <h5>MCB Switchgear</h5>
                                <p>$25.00 <b>$20.00</b></p>
                            </div>
                            <div class="btn-sec">
                                <a href="product-details.html" class="default-btn">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="portfolio-item">
                        <div class="product-content">
                            <div class="product-box">
                                <img src="<?php echo base_url().'assets/img/product/product-2.png';?>"/> 
                            </div>
                            <div class="portfolio-tag">
                                <a href="#"><span>10% Off</span></a>
                            </div>
                            <div class="second-tag">
                                <a href="#"><span>Sale</span></a>
                            </div>
                            <div class="product-details">
                                <h5>MCB Switchgear</h5>
                                <p>$25.00 <b>$20.00</b></p>
                            </div>
                            <div class="btn-sec">
                                <a href="product-details.html" class="default-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- best selling product  -->
       
        
    

     

       

        

       



      
    
   



        <div class="button__cover">
            <a href="https://api.whatsapp.com/send?phone=97145805883" target="_blank"><i class='bx bxl-whatsapp'></i></a>

                <a href="#" target="_blank"><i class='bx bx-map'></i> </a>
        </div>
        
        <!-- Footer Area Another -->
        <!--footer class="footer-area-another">
            <div class="footer-top-2 pt-100 pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="news-letter-sec">
                                <h4>Our Newsletter</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="subscription-btn-sec">
                                <form class="subscribe-form">
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                    <button class="submit-btn" type="submit">
                                        Subscribe
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-single-2">
                                <div class="footer-single-content-2">
                                    <a href="index.html">
                                           <img src="<?php echo base_url().'assets/img/footer-logo.png';?>" class="footer" alt="Logo">
                                    </a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur convallis arcu, id dapibus nulla tincidunt.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur convallis arcu, id dapibus nulla tincidunt.</p>
                  
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur convallis arcu, id dapibus nulla tincidunt.</p>
                  
                                </div>
                                

                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="footer-list-2">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="#">Product</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="#">Testimonial</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="#">Blog</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="footer-list-2 ml-50">
                                <h3>Product</h3>
                                <ul>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="#">MPCB</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="#">PLC & HMI</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="#">CAPACITORS</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="#"> SWITCH & SOCKET</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="#">VALVE & ACTUATORS </a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="#"> LIMIT SWITCH & SENSORE</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        

                        <div class="col-lg-3 col-md-6">
                            <div class="footer-list-2">
                                <h3>Contact Us</h3>
                                <ul>
                                    <li>
                                        <i class='bx bx-map'></i>
                                        <a href="tel:+1123456789">Nexa Electricals Trading LLC Dubai - UAE</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-phone-call'></i>
                                        <a href="tel:+97145805883">+97145805883</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-envelope'></i>
                                        <a href="mailto:contact@nexaelectric.com">contact@nexaelectric.com</a>
                                    </li>
                                    
                                </ul>

                                <div class="row">
                                    <div class="footer-socail-media-link">
                                        <h3>Social Link</h3>
                                        <ul>
                                            <li>
                                                <a href="#">  <i class='bx bxl-facebook-circle'></i></a>
                                              
                                            </li>
                                            <li>
                                                <a href="#">   <i class='bx bxl-whatsapp'></i></a>
                                               
                                            </li>
                                            <li>
                                                <a href="#">   <i class='bx bxl-instagram'></i></a>
                                               
                                            </li>
                                            <li>
                                                <a href="#">   <i class='bx bxl-linkedin-square'></i></a>
                                              
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="bottom-text text-center">
                                <p>© Copyright 2023 Nexa Electric . All right reserved.<br>Created with <img src="<?php echo base_url().'assets/img/heartbeat.png';?>"> by <a href="https://pocketfriendlyweb.com/" target="_blank">PocketFriendlyWeb</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer--->
        <!-- Footer Area End -->


         <!-- Jquery Min JS -->

         <?php $this->load->view('includes/footer-content', array('page_title' => $page_title, 'recent_categories' => $recent_categories)); ?>

<?php $this->load->view('includes/footer-assets', array('page_title' => $page_title)); ?>

<?php $this->load->view('includes/more-footer-assets'); ?>



        <!--script src="<?php //echo base_url().'assets/js/jquery.min.js';?>"></script>
      
        <script src="<?php //echo base_url().'assets/js/bootstrap.bundle.min.js';?>"></script>
     
        <script src="<?php //echo base_url().'assets/js/meanmenu.min.js';?>"></script>
        
        <script src="<?php //echo base_url().'assets/js/owl.carousel.min.js';?>"></script>
      
        <script src="<?php //echo base_url().'assets/js/jquery.magnific-popup.min.js';?>"></script>
      
        <script src="<?php //echo base_url().'assets/js/wow.min.js';?>"></script>
      
        <script src="<?php //echo base_url().'assets/js/jquery.ajaxchimp.min.js';?>"></script>
       
        <script src="<?php //echo base_url().'assets/js/form-validator.min.js';?>"></script>
   
        <script src="<?php //echo base_url().'assets/js/contact-form-script.js';?>"></script>
       
        <script src="<?php //echo base_url().'assets/js/custom.js';?>"></script-->
      
        <script>

            var dropdown = document.getElementsByClassName("dropdown-btn");
            var i;
            
            for (i = 0; i < dropdown.length; i++) {
              dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                  dropdownContent.style.display = "none";
                } else {
                  dropdownContent.style.display = "block";
                }
              });
            }
            </script>

<script>
    function myFunction() {
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");
    
      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more"; 
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less"; 
        moreText.style.display = "inline";
      }
    }
    document.getElementById('searchIcon').onclick = function() {
  document.getElementById('search').classList.add("visible");
  document.getElementById('clear').classList.add("visible");
  document.getElementById('search').focus();
  document.getElementById('searchIcon').classList.add("hide");
}
document.getElementById('clear').onclick = function() {
  document.getElementById('searchIcon').classList.remove("hide");
  document.getElementById('search').classList.remove("visible");
  document.getElementById('clear').classList.remove("visible");
}
    </script>

    
    </body>
</html>