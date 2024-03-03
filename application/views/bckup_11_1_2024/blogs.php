<!doctype html>
<html lang="en">
    <?php $sitedetails = sitedetails(); ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$page_title;?> | <?=sitename();?></title>
        <?php $this->load->view('includes/metatags', array('page_title' => $page_title)); ?>
        <?php $this->load->view('includes/header-assets', array('page_title' => $page_title)); ?>
		<?php $this->load->view('includes/more-header-assets'); ?>
		<?php echo htmlspecialchars_decode($getga->site_ga_code); ?>
    </head>
    <body>
        <?php $this->load->view('includes/header-menu', array('page_title' => $page_title)); ?>
		
			</script>
        <!-- banner area start here -->
		<section>
			<div class="inner_banner">
				<div class="container">
					<div class="inner-banner-caption">
						<h1>Our Blog</h1>
						<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
					</div>

				</div>
			</div>
		</section>

		<section>
			<nav>
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?=site_url()?>">Home</a></li>
				<li class="breadcrumb-item"><a href="#">Blogs</a></li>
				<li class="breadcrumb-item active" aria-current="page">Blog Headline</li>
				</ol>
			</nav>
		</section>
		<!-- banner area end here -->
	
		<!-- BLOG area start here -->
        <section>
			<div class="our-blog-area">
				<div class="container">
					<div class="section-title">
						<h1>Latest update</h1>
					</div>
				
					<div class="row mb-50">
						<div class="col-md-6 col-lg-6">
							<div class="img-blog">
								<img src="<?=site_url()?>assets/img/blog/inner-blog-1.jpg" class="width-100 mb-15">
							</div>

							<div class="img-blog">
								<img src="<?=site_url()?>assets/img/blog/inner-blog-4.jpg" class="width-100">
							</div>

						</div>
						<div class="col-md-6 col-lg-6">
							<div class="img-blog">
								<img src="<?=site_url()?>assets/img/blog/inner-blog-3.jpg" class="width-100 mb-15">
							</div>
							<div class="img-blog">
								<img src="<?=site_url()?>assets/img/blog/inner-blog-2.jpg" class="width-100">
							</div>
						</div>
					
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-6">
							<img src="<?=site_url()?>assets/img/blog/inner-blog-5.jpg" class="width-100">
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="blog-content">
								<h4>VALVE & ACTUATORS</h4>
								<p>ELECTRICAL SHOPE represents and supplies all international brands in the categories of Switches and Sockets, Low Voltage Products, LED Lights, Sensors, Cables, Connectors, Timers, Floor box, Contactors, ACB, VFD, Overload relay, MCB,, MCCB, MPCB, ELCB, Mo</p>
							</div>
							<div class="banner-btn text-left">
								<a href="<?=site_url().'blog/blog-slug'?>" class="plan-buy-btn">Learn More</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
	    </section>

		<section>
			<div class="feature-update partners-area ">
				<div class="container">
					<div class="section-title">
						<h1>Feature Update</h1>
					</div>
					<div class="row">
						<div class="col-lg-12 wow animated fadeInUp animated" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s;">
							<div class="slide-parners owl-carousel">
								<div class="single-partner">
									<a href="#"><img src="<?=site_url()?>assets/img/blog/list-1.jpg" alt="parners"></a>
									<div class="blog-heading">
										Laundry timer
									</div>
								</div>
								<div class="single-partner">
									<a href="#"><img src="<?=site_url()?>assets/img/blog/list-2.jpg" alt="parners"></a>
									<div class="blog-heading">
										Sensors Temperature controller
									</div>
								</div>
								<div class="single-partner">
									<a href="#"><img src="<?=site_url()?>assets/img/blog/list-3.jpg" alt="parners"></a>
									<div class="blog-heading">
										<div class="blog-heading">
											Terminal block
										</div>
									</div>
								</div>
							
								<div class="single-partner">
									<a href="#"><img src="<?=site_url()?>assets/img/blog/list-4.jpg" alt="parners"></a>
									<div class="blog-heading">
										Connectors
									</div>
								</div>
								<div class="single-partner">
									<a href="#"><img src="<?=site_url()?>assets/img/blog/list-1.jpg" alt="parners"></a>
									<div class="blog-heading">
										Laundry timer
									</div>
								</div>
								<div class="single-partner">
									<a href="#"><img src="<?=site_url()?>assets/img/blog/list-2.jpg" alt="parners"></a>
									<div class="blog-heading">
										Sensors Temperature controller
									</div>
								</div>
								<div class="single-partner">
									<a href="#"><img src="<?=site_url()?>assets/img/blog/list-3.jpg" alt="parners"></a>
									<div class="blog-heading">
										Connectors
									</div>
								</div>
							
								<div class="single-partner">
									<a href="#"><img src="<?=site_url()?>assets/img/blog/list-4.jpg" alt="parners"></a>
									<div class="blog-heading">
										Laundry timer
									</div>
								</div>
							</div>
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