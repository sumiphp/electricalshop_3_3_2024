<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$page_title?> | <?=sitename()?></title>
    <?php $this->load->view('acp/includes/header-assets', array('page_title' => $page_title)); ?>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php $this->load->view('acp/includes/sidebar-menu', array('page_title' => $page_title, 'breadcrum' => $page_breadcrumb, 'main_menu_active' => $main_menu_active, 'sub_menu_active' => $sub_menu_active, 'innersub_menu_active' => $innersub_menu_active)); ?>
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php $this->load->view('acp/includes/header'); ?>
            <!-- header area end -->

            <!-- page title area start -->
            <?php $this->load->view('acp/includes/page-head', array('page_title' => $page_title, 'breadcrum' => $page_breadcrumb)); ?>
            <!-- page title area end -->

            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-diamond"></i> Products</div>
                                            <h2><?=number_format($products)?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-tag"></i> Brands</div>
                                            <h2><?=number_format($brands)?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-coffee"></i> Categories</div>
                                            <h2><?=number_format($categories)?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-quote-right"></i> Contact Us</div>
                                            <h2><?=number_format($contact_us)?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-medall"></i> Enquires</div>
                                            <h2><?=number_format($enquiries)?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-palette"></i> Get In Touch</div>
                                            <h2><?=number_format($get_in_touch)?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- main content area end -->

        <?php $this->load->view('acp/includes/footer'); ?>

    </div>
    <!-- page container area end -->

    <?php $this->load->view('acp/includes/footer-assets', array('page_title' => $page_title, 'breadcrum' => $page_breadcrumb)); ?>

    <!-- custom js files -->
    <script src="<?=site_url()?>assets/js/acp/dashboard.js"></script>
    <script type="text/javascript">
        $(function() {
            Dashboard.init();
        });
    </script>
</body>

</html>