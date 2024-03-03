<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$page_title?> | ACP | <?=sitename()?></title>
    <?php $this->load->view('acp/includes/header-assets', array('page_title' => 'Listing')); ?>
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
                            <table style="width:100%;" >
                                <tr>
                                    <td style="padding-top: 1em;">Name </td>
                                    <td style="padding-top: 1em;">:</td>
                                    <td style="padding-top: 1em;"><?=$request['cus_name'] ?></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 1em;">Email </td>
                                    <td style="padding-top: 1em;">:</td>
                                    <td style="padding-top: 1em;"><?=$request['cus_email'] ?></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 1em;">Phone </td>
                                    <td style="padding-top: 1em;">:</td>
                                    <td style="padding-top: 1em;"><?=$request['cus_phone'] ?></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 1em;">Description </td>
                                    <td style="padding-top: 1em;">:</td>
                                    <td style="padding-top: 1em;"><?=nl2br($request['cus_message']) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->

        <?php $this->load->view('acp/includes/footer'); ?>

    </div>
    <!-- page container area end -->

    <?php $this->load->view('acp/includes/footer-assets', array('page_title' => 'Listing', 'breadcrum' => $page_breadcrumb)); ?>

    <!-- custom js files -->
    <script src="<?=site_url()?>assets/js/acp/contactus.js?blast=<?=strtotime(mysql_datetime())?>"></script>
    <script type="text/javascript">
        $(function() {
            Contactus.init();
        });
    </script>
</body>

</html>