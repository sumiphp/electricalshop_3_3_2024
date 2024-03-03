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
                            <div class="formArea">
                                <?php
                                $type = array();
                                if (isset($producttype) && !empty($producttype)) {
                                    $type = array(
                                        'pd_type_id' => $producttype['pd_type_id'],
                                        'pd_type_name' => $producttype['pd_type_name'],
                                        'pd_type_description' => $producttype['pd_type_description'],
                                        'pd_type_required' => $producttype['pd_type_required'],
                                        'pd_field_type' => $producttype['pd_field_type'],
                                    );
                                } ?>
                                <form id="manageType">
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <input type="hidden" id="tyid" name="tyid" value="<?=((!empty($type) && isset($type['pd_type_id']))? $type['pd_type_id'] : '')?>">
                                            <label for="typename" class="col-form-label">Type Name*</label>
                                            <input class="form-control" type="text" id="typename" name="typename" placeholder="Enter Type Name" value="<?=((!empty($type) && isset($type['pd_type_name']))? $type['pd_type_name'] : '')?>" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="descp" class="col-form-label">Type description</label>
                                            <textarea class="form-control" rows="8" id="descp" name="descp" placeholder="Enter Type description"><?=((!empty($type) && isset($type['pd_type_description']))? $type['pd_type_description'] : '')?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label>This detail type is Manadatoty or Not*</label>
                                            <div class="row pl-3">
                                                <div class="col-md-2 custom-control custom-radio">
                                                    <input type="radio" <?=((!empty($type) && isset($type['pd_type_required']) && ($type['pd_type_required'] == 1))? 'checked' : '')?> id="mandatoryReq" name="mandatory" value="1" class="custom-control-input">
                                                    <label class="custom-control-label" for="mandatoryReq">Manadatoty type field</label>
                                                </div>
                                                <div class="col-md-2 custom-control custom-radio">
                                                    <input type="radio" <?=((!empty($type) && isset($type['pd_type_required']) && ($type['pd_type_required'] == 0))? 'checked' : '')?> id="mandatoryNonReq" name="mandatory" value="0" class="custom-control-input">
                                                    <label class="custom-control-label" for="mandatoryNonReq">Non Mandatory type field</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label>Type of field*</label>
                                            <div class="row pl-3">
                                                <div class="col-md-2 custom-control custom-radio">
                                                    <input type="radio" <?=((!empty($type) && isset($type['pd_field_type']) && ($type['pd_field_type'] == 1))? 'checked' : '')?> id="fieldtypeInput" name="fieldtype" value="1" class="custom-control-input">
                                                    <label class="custom-control-label" for="fieldtypeInput">Single line data field</label>
                                                </div>
                                                <div class="col-md-2 custom-control custom-radio">
                                                    <input type="radio" <?=((!empty($type) && isset($type['pd_field_type']) && ($type['pd_field_type'] == 2))? 'checked' : '')?> id="fieldtypeTextarea" name="fieldtype" value="2" class="custom-control-input">
                                                    <label class="custom-control-label" for="fieldtypeTextarea">Large data field</label>
                                                </div>
                                                <div class="col-md-2 custom-control custom-radio">
                                                    <input type="radio" <?=((!empty($type) && isset($type['pd_field_type']) && ($type['pd_field_type'] == 3))? 'checked' : '')?> id="fieldtypeHTML" name="fieldtype" value="3" class="custom-control-input">
                                                    <label class="custom-control-label" for="fieldtypeHTML">HTML Code field</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php if (($page_title == 'Add Type') || ($page_title == 'Edit Type')) { ?>
                                            <button id="saveTypeSubmit" type="submit"><?=(($page_title == 'Add Type')? 'Save Type' : 'Update Type')?> <i class="ti-arrow-right"></i></button>
                                        <?php } else { ?>
                                            <a class="btn btn-rounded btn-dark mt-3" href="javascript:history.back()" role="button">GO BACK <i class="ti-arrow-right"></i></a>
                                        <?php } ?>
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
    <script src="<?=site_url()?>assets/js/acp/producttype.js?c=<?=date('siHYmd')?>"></script>
    <script type="text/javascript">
        <?php if ($page_title == 'View Type') { ?>
            $(function() {
                $("#manageType :input").prop("disabled", true);
            });
        <?php } else { ?>
            $(function() {
                Producttype.add();
            });
        <?php } ?>
    </script>
</body>

</html>