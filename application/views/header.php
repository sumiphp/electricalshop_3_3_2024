 <div class="sidemenu-wrapper sidemenu-info d-none d-lg-block ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget  ">
                <div class="th-widget-about">
                    <div class="about-logo">
                        <a href="<?=base_url();?>"><img src="<?=base_url().'assets/uploads/site/'.$gt->site_logo?>" alt="logo"></a>
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
                <a href="<?=base_url();?>"><img src="<?=base_url().'assets/uploads/site/'.$gt->site_logo //$sitedetails['logo']?>" alt="Electrical Shop"></a>
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
                            <a href="<?=base_url();?>"><img src="<?=base_url().'assets/uploads/site/'.$gt->site_logo //$sitedetails['logo']?>" alt="Frutin"></a>
                        </div>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <form class="header-search" id="frmser" method="post" action="<?=base_url().'Home/searchproducts';?>">
                            <input type="text" placeholder="Enter Keyword" name="serquery">
                            <label id="serquery-error" class="error errpopupmsg" for="serquery" style='color:#fff' ></label>
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                  
                   
                    <div class="col-auto">
                        <div class="custom-block">
                          
                        </div>
                        <div class="header-icons">
                            <a href="<?=base_url().'login';?>" class="icon-btn d-none d-sm-block"><i class="far fa-user"></i></a>
                            <a href="<?php echo base_url().'wishlist';?>" class="icon-btn d-none d-sm-block">
                                <span class="badge wishlistcount"><?php echo $wishlistcount;?></span>
                                <i class="far fa-heart"></i>
                            </a>
                            <button type="button" class="icon-btn sideMenuToggler" id="cartbt">
                                <span class="badge"><?php echo $this->cart->total_items();?></span>
                                <i class="far fa-cart-shopping"></i>
                            </button>

                            <div class="dropdown-link aed-sec">
                                <a class="" href="#" ><img src="<?php echo base_url().'electricalshop1/assets/img/e-shop/menu-icon.png';?>" alt="menuicon" />  AED</a>
                               
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


<script type="text/javascript">
    document.getElementById("cartbt").onclick = function () {
        location.href = "<?php echo base_url('cart'); ?>";
    };
</script>





