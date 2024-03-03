<!--start footer-->
<?php $sitedetails = sitedetails(); ?>
<div class="button__cover">
    <?php if (trim($sitedetails['whatsapp']) != '') { ?>
        <a href="<?=$sitedetails['whatsapp']?>" target="_blank"><i class='bx bxl-whatsapp'></i></a>
    <?php } ?>
    <?php if (
        $sitedetails['google_map_show'] 
        && ! empty($sitedetails['google_map_share_code'])
    ) { ?>
        <a href="https://goo.gl/maps/<?=$sitedetails['google_map_share_code']?>" target="_blank"><i class='bx bx-map'></i> </a>
    <?php } ?>
</div>

<!-- Footer Area Another -->
<footer class="footer-area-another">
    <div class="footer-top-2 pt-100 pb-70">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="news-letter-sec">
                        <h4>Our Newsletter</h4>
                        <p>Stay connected with ELECTRICAL SHOPE! Sign up for our newsletter to receive the latest updates, offers, and insights in the electrical industry.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="subscription-btn-sec">
                       
                        <form class="subscribe-form" name="frmemail" id="frmemail" action="<?php echo base_url().'Home/newslettersubscribe';?>" method="post">
                        

                        <input class="form-control" name="emailidnews"  id="emailnews" type="email" placeholder="Enter your email"   >
                        <label id="emailnews-error" class="error errpopupmsg" for="emailnews" style='bottom:51px;color:red;font-weight:bold;' ></label>
                        <span id="newsmsg" style='bottom:51px;color:red;font-weight:bold;'></span>
                            <button class="submit-btn" type="submit" id="sub">
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
                            <a href="<?=site_url()?>">
                                <img src="<?=$sitedetails['logo']?>" style="width:160px;background:none" class="footer" alt="<?=$sitedetails['sitename']?>">
                            </a>
                            <p><?=$sitedetails['contactus_note']?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-list-2">
                        <h3>Quick Links</h3>
                        <ul>
                            <li>
                                <i class='bx bxs-chevron-right'></i>
                                <a href="<?=site_url()?>">Home</a>
                            </li>
                            <li>
                                <i class='bx bxs-chevron-right'></i>
                                <a href="<?=site_url().'about-us/'?>">About</a>
                            </li>
                            <li>
                                <i class='bx bxs-chevron-right'></i>
                                <a href="<?=site_url().'products/'?>">Products</a>
                            </li>
                            <li>
                                <i class='bx bxs-chevron-right'></i>
                                <a href="<?=site_url()?>#testimonials">Testimonial</a>
                            </li>
                            <!-- <li>
                                <i class='bx bxs-chevron-right'></i>
                                <a href="#">Blog</a>
                            </li> -->
                            <li>
                                <i class='bx bxs-chevron-right'></i>
                                <a href="<?=site_url().'contact-us/'?>">Contact</a>
                            </li>
                            <li>
                                <i class='bx bxs-chevron-right'></i>
                                <a href="<?=site_url().'sitemap.xml'?>">Sitemap</a>
                            </li>
                            <li>
                                <i class='bx bxs-chevron-right'></i>
                                <a href="<?=site_url()?>">Privacy</a>
                            </li>
                            <li>
                                <i class='bx bxs-chevron-right'></i>
                                <a href="<?=site_url()?>">Terms and Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <?php if (! empty($recent_categories)) { ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-list-2 ml-50">
                            <h3>Product</h3>
                            <ul>
                                <?php foreach ($recent_categories as $recentCategory) { ?>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="<?=site_url().'products/category/'.$recentCategory['cat_canonial_name']?>"><?=$recentCategory['cat_name']?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-list-2">
                        <h3>Contact Us</h3>
                        <ul>
                            <li>
                                <i class='bx bx-map'></i>
                                <a href="tel:<?=$sitedetails['phone_number_2']?>">ELECTRICAL SHOPE  Dubai - UAE</a>
                            </li>
                            <li>
                                <i class='bx bxs-phone-call'></i>
                                <a href="tel:<?=$sitedetails['phone_number_1']?>"><?=$sitedetails['phone_number_1']?></a>
                            </li>
                            <li>
                                <i class='bx bxs-envelope'></i>
                                <a href="mailto:<?=$sitedetails['email_1']?>"><?=$sitedetails['email_1']?></a>
                            </li>
                            
                        </ul>

                        <div class="row">
                            <div class="footer-socail-media-link">
                                <h3>Social Link</h3>
                                <ul>
                                    <?php if (trim($sitedetails['facebook_url']) != '') { ?>
                                        <li>
                                            <a href="<?=$sitedetails['facebook_url']?>"> <i class='bx bxl-facebook-circle'></i> </a>
                                        </li>
                                    <?php }
                                    if (trim($sitedetails['whatsapp']) != '') { ?>
                                        <li>
                                            <a href="<?=$sitedetails['whatsapp']?>"> <i class='bx bxl-whatsapp'></i> </a>
                                        </li>
                                    <?php }
                                    if (trim($sitedetails['instagram_url']) != '') { ?>
                                        <li>
                                            <a href="<?=$sitedetails['instagram_url']?>"> <i class='bx bxl-instagram'></i> </a>
                                        </li>
                                    <?php }
                                    if (trim($sitedetails['youtube_url']) != '') { ?>
                                        <li>
                                            <a href="<?=$sitedetails['youtube_url']?>"> <i class='bx bxl-linkedin-square'></i> </a>
                                        </li>
                                    <?php } ?>
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
                        <p>© Copyright <?=date('Y')?> <?=sitename()?> . All right reserved.<br>Created with <img src="<?=site_url()?>assets/img/heartbeat.png"> by <a href="https://pocketfriendlyweb.com/" target="_blank">PocketFriendlyWeb</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->





   