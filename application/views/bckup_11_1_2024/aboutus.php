<!doctype html>
<html lang="en">
    <?php $sitedetails = sitedetails(); 
    //print_r($sitedetails);
    
    ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">       
        <?php $this->load->view('includes/metatags', array('page_title' => $page_title)); ?>
        <?php 
        //print_r($metatag);
        //echo $metatag->meta2;?>
        <?php $this->load->view('includes/header-assets', array('page_title' => $page_title)); ?>
        <?php $this->load->view('includes/more-header-assets'); ?>
        <?php echo htmlspecialchars_decode($getga->site_ga_code); ?>
    </head>
    <body>
        <?php $this->load->view('includes/header-menu', array('page_title' => $page_title)); ?>

        <!-- Banner Area -->
        <div class="inner-banner inner-bg1">
            <div class="container">
                <div class="inner-title text-center">
                    <h3 class="mb-3">About Us</h3>
                    <p>
                        "Empowering Tomorrow, today: Discover ELECTRICAL SHOPE - Your Trusted Source for Innovative Electrical Solutions and Unmatched Expertise."
                    </p>
                    <!-- <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <i class="bx bxs-chevrons-right"></i>
                        </li>
                        <li>About</li>
                    </ul> -->
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
        
        <!-- About Area -->
        <div class="about-area pt-50 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="about ">
                           <p>At ELECTRICAL SHOPE, we are more than just an electrical equipment supplier; we are your partners in electrifying progress and innovation. With a deep commitment to excellence, we have curated a comprehensive catalog of electrical components to meet your commercial, residential, industrial, manufacturing, and hotel field requirements.</p>
                           <p>Our journey began with a simple yet powerful vision: to simplify acquiring high-quality electrical and automation products while fostering a community of knowledge and expertise. This vision drives us to deliver superior quality, impeccable service, and competitive pricing to empower individuals, businesses, and industries to thrive through efficient, sustainable, and safe electrical solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center pt-50">
                    <div class="col-lg-6 col-md-6 col-xxl-6">
                        <div class="about-vision box-shadow pad">
                            <h2 class="mb-3"><img src="<?=site_url()?>assets/img/about/opportunity.png"/> Our Vision</h2>
                            <p>
                                Our vision is to lead the industry as a premier provider of cutting-edge electrical and automation solutions. We aspire to be recognized globally for our unwavering commitment to innovation, quality, and customer satisfaction.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-xxl-6">
                        <div class="about-mission box-shadow pad">
                            <h2 class="mb-3"><img src="<?=site_url()?>assets/img/about/goal.png"/> Our Mission</h2>
                            <p>
                            ELECTRICAL SHOPE aims to empower our customers by delivering high-quality electrical products and automation solutions that enhance their lives and businesses. We aim to achieve this by continuously innovating and providing exceptional service while adhering to the highest standards of integrity and sustainability.
                            </p>
                        </div>
                     
                    </div>
                </div>
            </div>
         
        </div>
        <!-- About Area End -->

        <div class="quality-product price-bg ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="best-product">
                            <h2 class="mb-3">Quality Products</h2>
                            <p>
                                What sets us apart is our dedicated team of experts. Comprising highly skilled and experienced engineers, we bring a wealth of proficiency to all aspects of our products, solutions, and services.
                            </p>
                            <div class="btn-sec">
                                <a href="#" class="default-btn mt-20">Get Members</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="best-switch text-center">
                            <img src="<?=site_url()?>assets/img/about/about-switch.png"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details pt-50">
                            <p>
                                We take pride in delivering tailored solutions that align with your unique needs. Whether you require MCBs, MCCBs, RCCBs, RCBOs, ACBs, VCBs, timers, overload relays, safety relays, DOL starters, ATSs, VFDs, enclosures, fans, digital panel meters, energy meters, power factor controllers, induction motors, motor protection circuit breakers, on-delay/off-delay timers, inductive sensors, 
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details pt-50">
                            <p>
                                temperature controllers, proximity sensors, limit switches, capacitor switches and sockets, isolators, LED lighting, power and network cables, panel accessories, water level controllers, push buttons, changeover switches, terminal blocks, actuators, valves, network accessories, float switches, hour meters, PLCs, HMIs, or any other electrical product, you can rely on our expertise.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 ptb-50">
                        <div class="product-details">
                            <p>
                                Our commitment to quality and innovation continues to drive us forward, enabling us to evolve and expand our offerings to meet the ever-changing needs of the electrical industry. When you choose ELECTRICAL SHOPE, you choose a trusted partner dedicated to electrifying progress and innovation today and in the future.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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