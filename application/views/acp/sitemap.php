<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$page_title?> | ACP | <?=sitename()?></title>
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

            <div class="main-content-inner p-0">
                <div class="col-12 p-0 mt-5X">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 row">
                                <div class="f-24 pull-left"><b>XML Sitemaps</b> are important for SEO because they make it easier for Google to find your site's pages—this is important because Google ranks web PAGES not just websites. There is no downside of having an XML Sitemap and having one can improve your SEO, so we highly recommend them.<div><br>
                            </div>
                            <div class="col-12 row">
                                <h4 class="page-title pull-left">sitemap.xml file is created.<h4><br>
                            </div>
                            <div class="col-12 row">
                                Access path:&nbsp;<a href="<?=MAIN_SITE_URL.'sitemap.xml'?>" target="_blank"><?=MAIN_SITE_URL?>sitemap.xml</a>
                                <br>
                            </div>
                            <div class="col-12 row">
                                Directory path&nbsp;<?=$_SERVER['DOCUMENT_ROOT'] . '/sitemap.xml'?>
                                <br>
                                <br>
                            </div>
                            <div class="col-12 row">
                                <div class="col-8">
                                    <?php foreach ($sitemap as $type => $links) { ?>
                                        <div class="col-12 row">
                                            <h4 class="page-title pull-left"><?=ucwords($type)?></h4>
                                        </div>
                                        <?php foreach ($links as $page) { ?>
                                            <div class="col-12"><a href="<?=$page?>" target="_blank"><?=$page?></a></div>
                                        <?php } ?>
                                        <br>
                                        <br>
                                    <?php } ?>
                                </div>
                                <div class="col-4">
                                    <img src="<?=site_url().'assets/images/xml-google-sitemap.png'?>" alt="Sitemap">
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
    <script src="<?=site_url()?>assets/js/acp/sitemap.js?c=<?=date('siHYmd')?>"></script>
    <script type="text/javascript">
        $(function() {
            Sitemap.init();
        });
    </script>
</body>

</html>