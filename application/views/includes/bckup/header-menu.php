<!--start header-->
<?php
$sitedetails = sitedetails();
$sub_menu_active = (isset($searchType))? $searchType : '';
$gt=$this->db->get('site')->row();

//print_r($gt);
//echo $gt->site_logo;
?>

<!-- Start Preloader -->
<!-- <div class="preloader">
    <div class="preloader-wave"></div>
</div> -->
<!-- End Preloader -->

<!-- Header Area -->
<header class="header-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-9">
                <div class="header-content-right">
                    <ul class="header-contact">
                        <li><a href="mailto:<?=$sitedetails['email_1']?>"><i class='bx bxs-envelope' ></i> <?=$sitedetails['email_1']?></a></li>
                        <li><a href="tel:<?=$sitedetails['phone_number_1']?>"><i class='bx bxs-phone-call' ></i> <?=$sitedetails['phone_number_1']?></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-5 col-md-3">
                <div class="header-content-right">
                    <ul class="header-social">
                        <?php if (trim($sitedetails['facebook_url']) != '') { ?>
                            <li> <a href="<?=$sitedetails['facebook_url']?>"><i class="bx bxl-facebook" aria-hidden="true"></i></a></li>
                        <?php } ?>
                        <?php if (trim($sitedetails['whatsapp']) != '') { ?>
                            <li> <a href="<?=$sitedetails['whatsapp']?>"><i class="bx bxl-whatsapp" aria-hidden="true"></i></a></li>
                        <?php } ?>
                        <?php if (trim($sitedetails['instagram_url']) != '') { ?>
                            <li> <a href="<?=$sitedetails['instagram_url']?>"><i class="bx bxl-instagram" aria-hidden="true"></i></a></li>
                        <?php } ?>
                        <?php if (trim($sitedetails['youtube_url']) != '') { ?>
                            <li> <a href="<?=$sitedetails['youtube_url']?>"><i class="bx bxl-linkedin" aria-hidden="true"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Area -->

<!-- Start Navbar Area -->
<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="<?=site_url()?>" class="logo">
            <!--img src="<?//=base_url().'assets/uploads/site/'.$gt->site_logo//$sitedetails['logo']?>" style="width:160px;" class="logo-one" alt="<?//=$sitedetails['sitename']?>"-->
            <!--img src="<?//=base_url().'assets/uploads/site/'.$gt->site_mobile_logo//$sitedetails['mobile_logo']?>" style="width:60px;" class="logo-two" alt="<?//=$sitedetails['sitename']?>"-->
             <img src="<?=$sitedetails['logo']?>" style="width:160px;" class="logo-one" alt="<?=$sitedetails['sitename']?>">
            <img src="<?=$sitedetails['mobile_logo']?>" style="width:60px;" class="logo-two" alt="<?=$sitedetails['sitename']?>">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav top-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">
                <div class="logo-sec">
                    <!--a class="navbar-brand" href="<?//=site_url()?>">
                        <img src="<?//=base_url().'assets/uploads/site/'.$gt->site_logo //$sitedetails['logo']?>" style="width:160px;" alt="<?=$sitedetails['sitename']?>">
                    </a>
                    <a class="navbar-brand-sticky" href="<?//=site_url()?>">
                        <img src="<?//=base_url().'assets/uploads/site/'.$gt->site_mobile_logo //$sitedetails['mobile_logo']?>" style="width:160px;" alt="<?=$sitedetails['sitename']?>">
                    </a-->
                    <?php //print_r($sitedetails);?>

<a class="navbar-brand" href="<?=site_url()?>">
                        <img src="<?=$sitedetails['logo']?>" style="width:160px;" alt="<?=$sitedetails['sitename']?>">
                    </a>
                    <a class="navbar-brand-sticky" href="<?=site_url()?>">
                        <img src="<?=$sitedetails['mobile_logo']?>" style="width:160px;" alt="<?=$sitedetails['sitename']?>">
                    </a>





                </div>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="<?=site_url()?>" class="nav-link <?=(($page_title == 'Home')? 'active' : '')?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url().'about-us/'?>" class="nav-link <?=(($page_title == 'About Us')? 'active' : '')?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url()?>" class="nav-link <?=(($page_title == 'Services')? 'active' : '')?>">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url().'products/'?>" class="nav-link <?=(($page_title == 'Products')? 'active' : '')?>">Products</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url().'contact-us/'?>" class="nav-link <?=(($page_title == 'Contact Us')? 'active' : '')?>">Contact</a>
                        </li>
                    </ul>

                    <div class="menu-btn">
                        <!-- <ul>
                            <li class="mR-20">
                                <a href="#" target="_blank"><i class='bx bxs-cart icon' ></i></a>
                            </li>
                            <li class="lang-sec">
                                <div class="select-box">
                                    <img src="<?=site_url()?>assets/img/elipse.png">
                                    <select id="currencyList" class="select-box">
                                        
                                        <option value="AED" selected="selected" label="AED">AED</option>
                                        <option value="EUR" label="EUR">EUR</option>
                                        <option value="JPY" label="JPY">JPY</option>
                                        <option value="USD" label="USD">USD</option>
                                        </select>
                                </div>
                                
                            </li> 
                            
                        </ul>
                        -->
                        
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->