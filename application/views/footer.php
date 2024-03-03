
<?php $pageft=$this->uri->segment(1);
   
   
   
   
   ?>


<?php //if (($pageft!='checkout') &&  ($pageft!='orderSuccess1')) {?>
    <div class="footer-top-newsletter">
        <div class="container z-index-common">
            <div class="newsletter-wrap">
                <div class="newsletter-content">
                    <div class="email-icon">
                        <img src="<?php echo base_url().'electricalshop1/assets/img/icon/email_2.svg';?>" alt="Icon">
                    </div>
                    <h4 class="newsletter-title">Sign Up to Get Updates & News About Us.

 
   



                    </h4>
                </div>
              
                <form class="newsletter-form" name="frmemail" id="frmemail" action="<?php echo base_url().'Home/newslettersubscribe';?>" method="post">
                    <div class="form-group">
                    <input class="form-control" name="emailidnews"  id="emailnews" type="email" placeholder="Email Address"   >
                        <label id="emailnews-error" class="error errpopupmsg" for="emailnews" ></label>
                        <span id="newsmsg" style='bottom:51px;color:red;font-weight:bold;'></span>
                    </div>
                    <button type="submit" class="th-btn" id="sub">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
 <?php //} ?>
 
 
 
 
 <footer class="footer-wrapper footer-layout3">
          <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a href="<?=base_url();?>"><img src="<?=base_url().'assets/uploads/site/'.$gt->site_logo //$sitedetails['logo']?>" alt="eletrical"></a>
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
                                    echo $site->site_address_line1;?>,<br><?php 
                                    
                                   
                                    echo $site->site_address_line2;?>
                                    
                                
                                    <?php 
                                    
                                
                                    echo $site->site_city;echo ',';
                                    
                                    $prvid=$site->site_state;
$this->db->where('province_id',$prvid);
$this->db->select('*');
$this->db->from('provinces');
$query = $this->db->get();
$dt= $query->row();
echo $dt->province_name;
echo ',';


$cty=$site->site_country;
$this->db->where('country_id',$cty);
$this->db->select('*');
$this->db->from('countries');
$query = $this->db->get();
$dt= $query->row();
echo $dt->country_name;
                                    
                                    
                                    ?>,PO Box No <?php 
                                    
                                
                                    echo $site->site_pin;?>
                                
                                
                                </p>

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
        <div class="copyright-wrap" data-bg-src="<?php echo base_url().'electricalshop1/assets/img/bg/copyright_bg_1.png';?>" alt="copyright">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    <div class="col-md-6">
                       
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2024 <a href="<?php echo base_url();?>">Electrical Shop</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="developed-area">
                         Created with <img src="<?php echo base_url().'electricalshop1/assets/img/e-shop/heartbeat.png';?>" alt="heartbeat" > by <a href="https://pocketfriendlyweb.com/" target="_blank">PocketFriendlyWeb</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    



        <div class="button__cover">
        <a href="<?=$sitedetails['whatsapp_number']?>"><i class="fab fa-whatsapp"></i></a>
        <a href="https://maps.app.goo.gl/cEzx5gaEhvf6D92N7" target="_blank"> <i class="fas fa-location-dot"></i> </a>
    </div>




    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    





 

  