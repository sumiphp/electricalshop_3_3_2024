<!doctype html>
<html lang="en">
    <?php $sitedetails = sitedetails(); ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->load->view('includes/metatags', array('page_title' => $page_title)); ?>
        <?php //echo $metatag->meta4;?>
        <?php $this->load->view('includes/header-assets', array('page_title' => $page_title)); ?>
        <?php $this->load->view('includes/more-header-assets'); ?>
        <?php echo htmlspecialchars_decode($getga->site_ga_code); ?>

        <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/style.css';?>">
        <link rel="stylesheet" href="<?php echo base_url().'electricalshop/assets/css/fontawesome.min.css';?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,100;9..40,200;9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Lexend:wght@300;400;500;600;700;800;900&family=Lobster&display=swap" rel="stylesheet">

        
        
    </head>
    
    <body>
        <?php $this->load->view('includes/header-menu', array('page_title' => $page_title)); ?>

        <?php
        $currency = '';
        if (isset($sitecurrency)) {
            $currency = $sitecurrency['currency'];
        }
        ?>

        <!-- Banner Area -->
        <div class="inner-banner inner-bg1">
            <div class="container">
                <div class="inner-title text-center">
                    <h3 class="mb-3">Our Products </h3>
                    <p>
                        "Discover Excellence in Electrical Solutions: ELECTRICAL SHOPE's Diverse Products Deliver Performance, Safety, and Innovation for Every Need."
                    </p>
                    
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
        
        <?php if (! empty($best_selling)) { ?>
            <!-- best selling product -->
            <section class="portfolio-area portfolio-mt">
                <div class="container">
                
                    <h3 class="border-heading mb-5">Best Selling Products</h3>
                    <div class="portfolio-slider owl-carousel owl-theme">
                        <?php foreach ($best_selling as $product) { ?>
                            <div class="portfolio-item">
                                <div class="product-content">
                                    <div class="product-box">
                                        <img src="<?=site_url()?>assets/uploads/products/<?=$product['prod_primary_image']?>" alt="<?=$product['prod_name']?>" title="<?=$product['prod_name']?>"/> 
                                    </div>
                                    <div class="portfolio-tag">
                                        <a href="#"><span>10% Off</span></a>
                                    </div>
                                    <div class="second-tag">
                                        <a href="#"><span>Sale</span></a>
                                    </div>
                                    <div class="product-details">
                                        <h5><?=$product['prod_name']?></h5>
                                        <p style="display:none">25.00 <?=$currency?> <b>20.00 <?=$currency?></b></p>
                                    </div>
                                    <div class="btn-sec">
                                        <a href="<?=site_url().'product/'.$product['prod_canonial_name']?>" class="default-btn"> View More</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- best selling product  -->
        <?php } ?>
       
        <section>
            <div class="sidebar-product-box pt-50">
                <div class="container">
                    <div class="sidebar-product-view">
                        <div class="row">
                            <?php if (! empty($brands) || ! empty($categories)) { ?>
                                <div class="col-lg-4 col-md-5">
                                    <div class="side-bar-sec">
                                        <!-- SIDEBAR MENU -->
                                        <div class="simlebar-sc" data-simplebar="">
                                            <ul class="sidebar-menu tf">
                                                <?php if (! empty($categories)) { ?>
                                                    <li class="sidebar-submenu active">
                                                        <a href="javascript:void(0);" class="sidebar-menu-dropdown dropdown-btn">
                                                            <span class="small_gradient_Text ">Category</span>
                                                            <div class="dropdown-icon">
                                                                <i class='bx bx-caret-down'></i>
                                                            </div>
                                                        </a>
                                                        
                                                        <ul class="sidebar-menu-dropdown-content ">
                                                            <?php foreach ($categories as $category) { ?>
                                                                <li>
                                                                    <a href="<?=site_url()?>products/category/<?=$category['cat_canonial_name']?>">
                                                                        <?=$category['cat_name']?>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </li>
                                                <?php }
                                                if (! empty($brands)) { ?>
                                                    <li class="sidebar-submenu">
                                                        <a href="javascript:void(0);" class="sidebar-menu-dropdown dropdown-btn">
                                                            <span class="small_gradient_Text ">Brand</span>
                                                            <div class="dropdown-icon">
                                                                <i class='bx bx-caret-down'></i>
                                                            </div>
                                                        </a>
                                                    
                                                        <ul class="sidebar-menu-dropdown-content ">
                                                            <?php foreach ($brands as $brand) { ?>
                                                                <li>
                                                                    <a href="<?=site_url()?>products/brand/<?=$brand['brand_canonial_name']?>">
                                                                        <?=$brand['brand_name']?>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            if (! empty($products)) { ?>
                                <div class="col-lg-8 col-md-7">
                                    <div class="product-details-scroll">
                                        <div class="row">
                                            <?php foreach ($products as $product) { ?>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="portfolio-item">
                                                        <div class="product-content">
                                                            <div class="product-box">
                                                                <img src="<?=site_url()?>assets/uploads/products/<?=$product['prod_primary_image']?>" alt="<?=$product['prod_name']?>" title="<?=$product['prod_name']?>"/> 
                                                            </div>
                                                            <div class="portfolio-tag">
                                                                <a href="#"><span>10% Off</span></a>
                                                            </div>
                                                            <div class="second-tag">
                                                                <a href="#"><span>Sale</span></a>
                                                            </div>
                                                            <div class="product-details">
                                                                <h5><?=$product['prod_name']?></h5>
                                                                <p style="display:none">25.00 <?=$currency?> <b>20.00 <?=$currency?></b></p>
                                                            </div>
                                                            <div class="btn-sec">
                                                                <a href="<?=site_url().'product/'.$product['prod_canonial_name']?>" class="default-btn">  View More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-8 text-danger text-center">No records available.</div>
                            <?php } ?>
                        </div>
                    
                    </div>
                
                </div>
            </div>
        </section>

        <?php $this->load->view('includes/google-map', array('page_title' => $page_title, 'sitedetails' => $sitedetails)); ?>

        <?php $this->load->view('includes/footer-content', array('page_title' => $page_title, 'recent_categories' => $recent_categories)); ?>

        <?php $this->load->view('includes/footer-assets', array('page_title' => $page_title)); ?>

        <?php $this->load->view('includes/more-footer-assets'); ?>

        <script>
            $(document).ready(function() {
                Frontend.productSearchBar();
            });
        </script>
    </body>
</html>