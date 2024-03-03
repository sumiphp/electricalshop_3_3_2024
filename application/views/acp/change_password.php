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

            <div class="main-content-inner p-0">
                <div class="col-12 p-0 mt-5X">
                    <div class="card">
                        <div class="card-body">
                            <div class="formArea">
                                <form id="manageUser">
                                    <input type="hidden" id="uid" name="uid" value="<?=$uid?>">
                                    <input type="hidden" id="validOldPwd" name="validOldPwd" value="<?=$validOldPwd?>">
                                    <div class="form-group row" style="<?=(($validOldPwd == 1)? '' : 'display:none;')?>">
                                        <div class="col-md-12">
                                            <label for="old" class="col-form-label">Current password<?=(($validOldPwd == 1)? '*' : '')?></label>
                                            <input class="form-control" type="password" id="old" name="old" placeholder="Current password" value="" <?=(($validOldPwd == 1)? 'required="required"' : '')?>>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="new" class="col-form-label">New password*</label>
                                            <input class="form-control" type="password" id="new" name="new" placeholder="New password" value="" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="confirmnew" class="col-form-label">Confirm new password*</label>
                                            <input class="form-control" type="password" id="confirmnew" name="confirmnew" placeholder="Confirm new password" value="" required="required">
                                        </div>
                                    </div>
                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <button id="docp" type="submit" class="btn-danger">Confirm<i class="ti-arrow-right"></i></button>
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

    <?php $this->load->view('acp/includes/footer-assets', array('page_title' => $page_title, 'breadcrum' => $page_breadcrumb)); ?>

    <!-- custom js files -->
    <script src="<?=site_url()?>assets/js/acp/staffs.js"></script>
    <script type="text/javascript">
        $(function() {
            Staffs.change_password();
        });
    </script>
</body>

</html>