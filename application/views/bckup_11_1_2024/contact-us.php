<!doctype html>
<html lang="en">
    <?php $sitedetails = sitedetails(); ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->load->view('includes/metatags', array('page_title' => $page_title)); ?>
        <?php //echo $metatag->meta6;?>
        <?php $this->load->view('includes/header-assets', array('page_title' => $page_title)); ?>
        <?php $this->load->view('includes/more-header-assets'); ?>
        <?php echo htmlspecialchars_decode($getga->site_ga_code); ?>
    </head>
    <body>
   
        <?php $this->load->view('includes/header-menu', array('page_title' => $page_title)); ?>

        <!-- Banner Area -->
        <div class="inner-banner contactbg">
            <div class="container">
                <div class="contact-wrap-form">
                    <div class="col-lg-9 col-md-12 m-auto">
                        <form id="contactForm" novalidate="true" class="contactForm">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="Your Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="Your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" id="phone_number" required="" data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control" required="" data-error="Please enter your subject" placeholder="Your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="product-type" id="product-type" required="" data-error="Please enter Product Type" class="form-control" placeholder="Product Type">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="brand" id="brand" class="form-control" required="" data-error="Please enter your brand" placeholder="Your Brand">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group has-error">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8" required="" data-error="Write your message" placeholder="Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
    
                                <div class="col-lg-12 col-md-12 text-center">
                                    <button type="submit" class="default-btn page-btn text-center disabled" style="pointer-events: all; cursor: pointer;">
                                        Send Message
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
               
               </div>
            </div>
        </div>
        <!-- Banner Area End -->
        
        <?php $this->load->view('includes/google-map', array('page_title' => $page_title, 'sitedetails' => $sitedetails)); ?>

        <?php $this->load->view('includes/footer-content', array('page_title' => $page_title, 'recent_categories' => $recent_categories)); ?>

        <?php $this->load->view('includes/footer-assets', array('page_title' => $page_title)); ?>

        <script>
            $(document).ready(function() {
                Frontend.productSearchBar();
            });
        </script>
    </body>
</html>