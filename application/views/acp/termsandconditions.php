<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$page_title?> | <?=sitename()?></title>
    <?php $this->load->view('acp/includes/header-assets', array('page_title' => 'Editor')); ?>
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

            <div class="main-content-inner p-0">
                <div class="col-12 p-0 mt-5X">
                    <div class="card">
                        <div class="card-body">

                            <div class="formArea">
                                <form id="manageTnC">
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label style="display:none;">Message</label>
                                            <div id="tnc_content"><?=((!empty($tnc))? html_entity_decode($tnc['tnc_content']) : '')?></div>
                                        </div>
                                    </div>

                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <h3 class="al3rt-heading">Please note</h3>
                                        <p>The updates you are making here will be reflected in <a href="<?=site_url()?>about" target="_blank">Our Policies</a> page for the transparency on our Company.</p>
                                        <button type="button" class="close confirmaction" data-dismiss="alert" aria-label="Close">Click to Confirm</button>
                                    </div>
                                    
                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px; display:none;">
                                        <button id="saveTnC" type="submit">Save<i class="ti-arrow-right"></i></button>
                                    </div>
                                </form>
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

    <?php $this->load->view('acp/includes/footer-assets', array('page_title' => 'Editor', 'breadcrum' => $page_breadcrumb)); ?>

    <!-- custom js files -->
    <script src="<?=site_url()?>assets/js/acp/termsandconditions.js?c=<?=date('siHYmd')?>"></script>
    <script type="text/javascript">
        $(function() {
            TnC.init();
            TnC.save();
        });
    </script>
</body>

</html>
