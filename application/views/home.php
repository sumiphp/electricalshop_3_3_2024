<!doctype html>
<html lang="en">
    <?php $sitedetails = sitedetails(); 
    
    //sprint_r($getga);
    
    ?>
    <head>
    <?php echo htmlspecialchars_decode($getga->site_ga_code); ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php //echo $metatag->meta1;?>
        <?php $this->load->view('includes/metatags', array('page_title' => $page_title)); ?>
        <?php $this->load->view('includes/header-assets', array('page_title' => $page_title)); ?>
        <?php $this->load->view('includes/more-header-assets'); ?>
       
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
        <div class="banner-area">
            <div class="container">
                <div class="banner-into">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-6 col-sm-6">
                            <div class="banner-content">
                                <h1>Welcome To <span class="text-color"><?=strtoupper($sitedetails['site_shortname']);?></span> </h1>
                                <p>
                                Your premier source for a broad spectrum of cutting-edge electrical solutions. We pride ourselves on providing an extensive range of electrical components and equipment, catering to residential,commercial, and industrial needs.
                                </p>
    
                                <div class="banner-content-btn">
                                    <a href="<?=site_url().'products/'?>" class="secondary-btn ">View Product</a>
                                    <a href="<?=site_url().'contact-us/'?>" class="default-btn ml-20">Enquire Now</a>
                                </div>
                                <div class="position-img">
                                    <img src="<?=site_url()?>assets/img/banner-left-img.png"/>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="business-form">
                                <div class="form-field-section">
                                    <form class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="NAME" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Last" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Email" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Phone" required="">
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <label class="label-box">Category</label>
                                            <div class="input-group mb-3">
                                                <select name="package" id="package">
                                                <option value="package 1">package </option>
                                                <option value="package 2">package </option>
                                                <option value="package 3">package </option>
                                                <option value="package 3">package </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <label class="label-box">Product</label>
                                            <div class="input-group mb-3">
                                                <select name="package" id="package">
                                                <option value="package 1">package </option>
                                                <option value="package 2">package </option>
                                                <option value="package 3">package </option>
                                                <option value="package 3">package </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-info-sec">
                                                <h5>Switchgear Now Best deal</h5>
                                                <div class="info-img">
                                                    <div class="offer-div">10 % off</div>
                                                    <div class="img">  <img src="<?=site_url()?>assets/img/switch.png"/></div>
                                                
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Part Number" required="">
                                            </div>
                                        </div>

                                    </form>
                                 
                                    <div class="col-lg-6 col-md-12 col-sm-12  form-btn">
                                        <button type="button" class="search-btn text-center">Submit</button>
                                    </div>
    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <!-- Banner Area End -->
        
        <!-- Submission Top -->
        <div class="banner-product-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="product-box">
                                    <div class="img-icon">
                                        <img src="<?=site_url()?>assets/img/icons/cashback.png"/>
                
                                    </div>
                                    <div class="content">
                                        <h4>Big Cashback</h4>
                                        <p>Enjoy significant savings with our exclusive cashback offers on a wide range of electrical products.</p>
                                    </div>
                                    <span class="top"></span>
                                    <span class="right"></span>
                                    <span class="bottom"></span>
                                    <span class="left"></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="product-box">
                                    <div class="img-icon">
                                        <img src="<?=site_url()?>assets/img/icons/delivery.png"/>
                
                                    </div>
                                    <div class="content">
                                        <h4>Fast Shipping</h4>
                                        <p>Grab Swift and reliable product deliveries, ensuring your projects stay on track.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="product-box">
                                    <div class="img-icon">
                                        <img src="<?=site_url()?>assets/img/icons/credit-card.png"/>
                
                                    </div>
                                    <div class="content">
                                        <h4>Quick Payment</h4>
                                        <p>Enjoy hassle-free payment options for a seamless shopping experience.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
              
              
            </div>
        </div>
        <!-- Submission Top End -->

        <!-- About Area -->
        <div class="about-area pt-100 pb-70">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-xxl-6">
                        <div class="about-content">
                            <h2>About <span class="text-color">Us</span></h2>
                            <p>
                                At ELECTRICAL SHOPE, we have decided to establish a specialized company with an unwavering commitment to ensuring that our valued clients access the most finely tailored solutions at the most competitive prices, precisely suited to their requirements. The ELECTRICAL SHOPE team comprises exceptionally skilled and seasoned engineers renowned for their expertise across various disciplines encompassing various Products, Solutions, and Services.
                            </p>
                            <div class="btn-sec mt-30">
                                <a href="<?=site_url().'about-us/'?>" class="default-btn ">About Company</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-xxl-6">
                        <div class="about-vm-sec">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="about-vision">
                                        <h4 class="mb-3">Our Vision</h4>
                                        <p>
                                            Our vision is to lead the industry as a premier provider of cutting-edge electrical and automation solutions. We aspire to be recognized globally for our unwavering commitment to innovation, quality, and customer satisfaction.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="about-mission">
                                        <h4 class="mb-3">Our Mission</h4>
                                        <p>
                                        ELECTRICAL SHOPE  aims to empower our customers by delivering high-quality electrical products and automation solutions that enhance their lives and businesses. We aim to achieve this by continuously innovating and providing exceptional service while adhering to the highest standards of integrity and sustainability.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="counter-sec">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 col-md-4">
                                        <div class="single-counter">
                                            <h3 class="color-black"><span class="counter">15</span>+</h3>
                                            <p class="color-black font-size">Years Experience</p>
                                        </div>
                                    </div>
                
                                    <div class="col-lg-4 col-sm-4 col-md-4">
                                        <div class="single-counter">
                                            <h3 class="color-black"><span class="counter">900</span>+</h3>
                                            <p class="color-black font-size">Projects Done</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-4 col-md-4">
                                        <div class="single-counter">
                                            <h3 class="color-black"><span class="counter">25</span>+</h3>
                                            <p class="color-black font-size">Expert Members</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
         
        </div>
        <!-- About Area End -->
        
        <!-- Faq Area -->
        <div class="faq-bg-into">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq-img-2">
                            <img src="<?=site_url()?>assets/img/about/2.png" alt="FAQ Images">
                        </div>
                        
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq-content">
                            
                            <h2><span class="text-color">Why Choose </span><?=strtoupper($sitedetails['site_shortname']);?></h2>
                            <p>
                                At ELECTRICAL SHOPE, we're more than just an electrical solutions provider; we're your trusted partner in progress. Our company was founded on a commitment to delivering excellence in every facet of our services. With a team of highly skilled engineers and experts, we take pride in our ability to offer tailored, high-quality solutions at competitive prices. We approach every project with precision and dedication, ensuring our clients receive nothing less than the best.
                            </p>
                        </div>

                        <div class="quality-box">
                            <div class="row row-padding">
                                <div class="col-lg-2 col-md-2">
                                    <img src="<?=site_url()?>assets/img/about/icon-1.png"/>
                                </div>
                                <div class="col-lg-10 col-md-10">
                                    <div class="info-box">
                                        <h4><span class="text-color">Tailored Solutions</span></h4>
                                        <p>
                                            At ELECTRICAL SHOPE ELECTRIC' Our commitment to customization ensures that you receive the right products and services for your needs.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-padding">
                                <div class="col-lg-2 col-md-2">
                                    <img src="<?=site_url()?>assets/img/about/icon-1.png"/>
                                </div>
                                <div class="col-lg-10 col-md-10">
                                    <div class="info-box">
                                        <h4><span class="text-color">Expertise</span></h4>
                                        <p>
                                            Our team of highly skilled engineers brings a wealth of experience across various disciplines, including electrical products, solutions, and services.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-padding">
                                <div class="col-lg-2 col-md-2">
                                    <img src="<?=site_url()?>assets/img/about/icon-1.png"/>
                                </div>
                                <div class="col-lg-10 col-md-10">
                                    <div class="info-box">
                                        <h4><span class="text-color">Competitive Pricing</span></h4>
                                        <p>
                                            We understand the importance of cost-effectiveness. That's why we offer competitive pricing without compromising on the quality of our offerings.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            
                        </div>   
                    </div>

                    
                </div>
            </div>
        </div>
        <!-- Faq Area End -->
        <?php if (! empty($best_selling)) { ?>
            <!-- Portfolio Area -->
            <section class="portfolio-area portfolio-mt">
                <div class="container">
                    <div class="section-title text-center">
                        <h2><span class="text-color">Our</span> Products</h2>
                    </div>
                    <h3 class="border-heading">Best Selling Products</h3>
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
                                        <a href="<?=site_url().'product/'.$product['prod_canonial_name']?>" class="default-btn">  View More</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- Portfolio Area End -->
        <?php } ?>

        <?php if (! empty($recent_categories)) { ?>
            <div class="product-list-area">
                <div class="container">
                    <div class="product-view">
                        <div class="row row-padding">
                            <?php foreach ($recent_categories as $category) { ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
                                    <div class="box-inner">
                                        <h4><?=$category['cat_name']?></h4>
                                        <p><?=$category['cat_desc']?></p>
                                        <div class="btn-sec">
                                            <a href="<?=site_url().'products/category/'.$category['cat_canonial_name']?>" class="default-btn box-shadow">View Product----</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (! empty($best_selling)) { ?>
            <!-- latest product Area -->
            <section class="portfolio-area portfolio-mt">
                <div class="container">
                
                    <h3 class="border-heading">Latest Products</h3>
                    <div class="portfolio-slider owl-carousel owl-theme">
                        <?php foreach ($latest_products as $product) { ?>
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
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- latest product End -->
        <?php } ?>

        <!-- Testimonial Area -->
        <div id="testimonials" class="testimonial-area pb-70">
            <div class="container-fluid">
            
                <div class="row align-items-center">
                    <div class="col-lg-5 col-xxl-6">
                        <div class="testimonial-img">
                            <img src="<?=site_url()?>assets/img/img-sec.png" alt="Testimonial Images">
                        </div>
                    </div>
                    <div class="col-lg-7 col-xxl-6">
                        <div class="testimonial-slider">
                            <div class="testimonial-icon">
                                <i class='bx bxs-quote-alt-right'></i>
                            </div>
                            
                            <div class="testimonial-item-slider owl-carousel owl-theme">
                                <div class="testimonial-item">
                                    <div class="testimonial-item-img">
                                        <img src="<?=site_url()?>assets/img/user.png" alt="Testimonial Images">
                                    </div>
                                    <h3>John Doe</h3>
                                    <p>Customer</p>
                                    
                                    <p>
                                        "As an electrical contractor, I rely on top-quality components to deliver excellent results to my clients. ELECTRICAL SHOPE has consistently provided me with MCBs, MCCBs, and other electrical products that meet the highest standards. Their products have never let me down, and their customer service is exceptional."
                                    </p>
                                </div>

                                <div class="testimonial-item">
                                    <div class="testimonial-item-img">
                                        <img src="<?=site_url()?>assets/img/user.png" alt="Testimonial Images">
                                    </div>
                                    <h3>Knot Doe</h3>
                                    <p>Customer</p>
                                    <p>
                                        "I manage a manufacturing facility, and the reliability of our electrical systems is paramount. ELECTRICAL SHOPE range of products, including MCBs, MCCBs, and switches, have proven to be incredibly dependable. We've been using their products for years without any issues."
                                    </p>
                                </div>

                                <div class="testimonial-item">
                                    <div class="testimonial-item-img">
                                        <img src="<?=site_url()?>assets/img/user.png" alt="Testimonial Images">
                                    </div>
                                    <h3>Evanaa</h3>
                                    <p>Customer</p>
                                    <p>
                                        "ELECTRICAL SHOPE is our go-to supplier for all things electrical. Their MCBs, MCCBs, and other products are not only of top-notch quality but also reasonably priced. Their attention to detail and commitment to customer satisfaction make them a trusted partner for our business."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                
                </div>
            </div>

            <div class="shape-left">
                <img src="<?=site_url()?>assets/img/testimonial/shape-left.png" alt="Images">
            </div>
            <div class="shape-right">
                <img src="<?=site_url()?>assets/img/testimonial/shape-right.png" alt="Images">
            </div>
        </div>
        <!-- Testimonial Area End -->

        <!-- OUR STORE Area -->
        <div class="our-store-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 m-auto text-center">
                        <h2>Our Store</h2>
                        <h2><span class="text-color">50% Discount</span> by becoming a member</h2>
                        <p>
                            Take advantage of this fantastic opportunity to shop smarter and save bigger. Join us today and start enjoying the benefits of being a valued member of Our Store.
                        </p>
                        <div class="btn-sec">
                            <a href="<?=site_url().'contact-us/'?>" class="default-btn">Join Member</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <?php if (! empty($brands)) { ?>
            <!-- Brand Area Starts -->
            <div class="brand-area ptb-100">
                <div class="container">
                    <div class="section-title text-center mb-5">
                        <h2><span class="text-color">Brands </span> We Deal With</h2>
                    
                    </div>
                    <div class="row row-padding">
                        <?php foreach ($brands as $brand) { ?>
                            <div class="col-lg-3 col-md-3">
                                <div class="brand-img">
                                    <a href="<?=site_url().'products/brand/'.$brand['brand_canonial_name']?>">
                                        <img src="<?=site_url()?>assets/uploads/brands/<?=$brand['brand_image']?>" alt="<?=$brand['brand_name']?>" title="<?=$brand['brand_name']?>"/>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Brand Area End -->
        <?php } ?>

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