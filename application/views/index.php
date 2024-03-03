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
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/bootstrap.min.css';?>">
    
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/fontawesome.min.css';?>">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/magnific-popup.min.css';?>">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/swiper-bundle.min.css';?>">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/style.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/responsive.css';?>">
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

                                    <a href="<?php echo site_url().'product/'.$product['prod_canonial_name']?>" class="icon-btn popup-content1"><i class="far fa-eye"></i></a>


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
                                    <!--a href="<?//=site_url().'product/'.$product['prod_canonial_name']?>" class="th-btn btn-sm">View More--</a-->


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
                <h3 class="Green-heading">  <?php echo $homepagedetails->label17;?>
</h3>
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
                        <!--button class="tab-btn active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Top Products</button-->
                        <button class="tab-btn" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">Best Selling Products</button>
                       <button onclick="window.location.href='#latest_prd'" class="tab-btn" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" role="tab" aria-controls="nav-three" aria-selected="false">Latest Products</button>
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
                                            <a href="<?php echo site_url().'product/'.$product['prod_canonial_name']?>" class="icon-btn popup-content"><i class="far fa-eye"></i></a>

                                            <?php 
                                            
                                            $username=$this->session->userdata('username');
                                            
                                            if ($username==''){?>
                                    <a href="<?php echo base_url('home/login'); ?>" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('productssample/addToCart/'.$product['prod_id']); ?>" class="icon-btn"><i class="far fa-cart-plus"></i></a>


                                        <?php } ?>
                                          





                                        
                                        <a href="javascript:void(0)" onclick=addwishlist(<?php echo $product['prod_id'];?>) class="icon-btn"><i class="far fa-heart"></i></a>





                                            <!--a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a-->
                                        </div>
                                    </div>
                                    <div class="product-content">


                               
                                      
                                        <h3 class="product-title"><a href="<?php echo site_url().'product/'.$product['prod_canonial_name']?>"><?=$product['prod_name']?></a></h3>
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
                                        <?php //echo $user ;?>
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

        <?php } ?>

        <section id="latest_prd">&nbsp;</section>

        <?php if (! empty($latest_products)) { ?>
        <div class="latest-product mt-50" >
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
                                                <a href="<?php echo site_url().'product/'.$product['prod_canonial_name']?>" class="icon-btn popup-content1"><i class="far fa-eye"></i></a>
                                                <?php 
                                            
                                            $username=$this->session->userdata('username');
                                            
                                            if ($username==''){?>
                                    <a href="<?php echo base_url('home/login'); ?>" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('productssample/addToCart/'.$product['prod_id']); ?>" class="icon-btn"><i class="far fa-cart-plus"></i></a>


                                        <?php } ?>
                                          




                                        
                                        <a href="javascript:void(0)" onclick=addwishlist(<?php echo $product['prod_id'];?>) class="icon-btn"><i class="far fa-heart"></i></a>





                                                <!--a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a-->
                                            </div>
                                        </div>
                                        <div class="product-content">
                                          
                                            <h3 class="product-title"><a href="<?php echo site_url().'product/'.$product['prod_canonial_name']?>"><?=$product['prod_name']?></a></h3>
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
                                <a href="<?php echo site_url().'product/'.$product['prod_canonial_name']?>" class="icon-btn popup-content1"><i class="far fa-eye"></i></a>

                                <?php 
                                            
                                            $username=$this->session->userdata('username');
                                            
                                            if ($username==''){?>
                                    <a href="<?php echo base_url('home/login'); ?>" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('productssample/addToCart/'.$product['prod_id']); ?>" class="icon-btn"><i class="far fa-cart-plus"></i></a>


                                        <?php } ?>
                                          



                                <a href="#"  onclick="addwishlist(<?php echo $product['prod_id'];?>)" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                          
                            <h3 class="product-title"><a href="<?php echo site_url().'product/'.$product['prod_canonial_name']?>" ><?=$product['prod_id']?> <?=$product['prod_name']?></a></h3>
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
 

<?php if (! empty($brands)) { ?>
<div class="space bg-blue">
        <div class="container th-container">
            <div class="row">
                <div class="text-center">
                    <h2 class="mb-35"><?php echo $homepagedetails->label18;?></h2>
                </div>
               
            </div>
            <div class="row">

            <?php 
                 
                    
                 foreach ($brands as $brand) { ?>
                <div class="col-lg-2">
                    <div class="brand-card">
                      
                        <img src="<?=site_url()?>assets/uploads/brands/<?=$brand['brand_image']?>" alt="<?=$brand['brand_name']?>">



                    </div>
                </div>
                <?php } ?>
             
                
                
            </div>


            <div>
              

            </div>
        </div>
    </div>

    <?php } ?>








    <!--==============================
Product Area  
==============================-->
  
  
  
   
   
    <?php include('footer.php');?>
   


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