<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$page_title?> | ACP | <?=sitename()?></title>
    <?php $this->load->view('acp/includes/header-assets', array('page_title' => 'Dropzone')); ?>
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
        <?php 
        
        $page_title="Add Metatag";
        $page_breadcrumb="Metatag";
        
        $this->load->view('acp/includes/sidebar-menu', array('page_title' => $page_title, 'breadcrum' => $page_breadcrumb, 'main_menu_active' => $main_menu_active, 'sub_menu_active' => $sub_menu_active, 'innersub_menu_active' => $innersub_menu_active)); ?>
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php $this->load->view('acp/includes/header'); ?>
            <!-- header area end -->

            <!-- page title area start -->
            <?php 
             $page_title="Add Metatag";
             $page_breadcrumb1="Metatag";
             
            
            $this->load->view('acp/includes/page-head', array('page_title' => $page_title, 'breadcrum' => $page_breadcrumb1)); ?>
            <!-- page title area end -->
           
            <div class="main-content-inner p-0">
                <div class="col-12 p-0 mt-5X">
                    <div class="card">
                        <div class="card-body">
                            <div class="formArea">
                                <span style='color:green';>
                            <?php echo $this->session->flashdata('flash_msg');?>
</span>
                                <?php
                                /*$categ = array();
                                if (isset($productcategory) && !empty($productcategory)) {
                                    $categ = array(
                                        'cat_id' => $productcategory['cat_id'],
                                        'cat_name' => $productcategory['cat_name'],
                                        'cat_canonial_name' => $productcategory['cat_canonial_name'],
                                        'cat_desc' => $productcategory['cat_desc'],
                                        'cat_image' => $productcategory['cat_image'],
                                    );
                                } */ ?>
                                <form id="managemetatag" method="post" action="<?php echo base_url().'acp/settings/managemetatagprocess';?>">
                                    <!--div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <input type="hidden" id="cat_id" name="cat_id" value="<?=((!empty($categ) && isset($categ['cat_id']))? $categ['cat_id'] : '')?>">
                                            <input type="hidden" id="cat_canonial_name" name="cat_canonial_name" value="<?=((!empty($categ))? $categ['cat_canonial_name'] : '')?>">
                                            <label for="cat_name" class="col-form-label">Category Name*</label>
                                            <input class="form-control" type="text" id="cat_name" name="cat_name" placeholder="Enter Category Name" value="<?=((!empty($categ) && isset($categ['cat_name']))? $categ['cat_name'] : '')?>" required="required">
                                            <span>After saving URL to this category will be: <?=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span>
                                        </div>
                                    </div-->
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cat_desc" class="col-form-label">Home Metatag description</label>
                                            <textarea class="form-control" rows="8" id="meta1" name="meta1" placeholder="Enter Home Metatag description"><?=$meta->meta1?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cat_desc" class="col-form-label">About Metatag description</label>
                                            <textarea class="form-control" rows="8" id="meta2" name="meta2" placeholder="Enter About Metatag description"><?=$meta->meta2?></textarea>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cat_desc" class="col-form-label">Services Metatag description</label>
                                            <textarea class="form-control" rows="8" id="meta3" name="meta3" placeholder="Enter Services Metatag description"><?=$meta->meta3?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cat_desc" class="col-form-label">Products Metatag description</label>
                                            <textarea class="form-control" rows="8"  id="meta4" name="meta4" placeholder="Enter Products Metatag description"><?=$meta->meta4?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cat_desc" class="col-form-label">Product Details Metatag description</label>
                                            <textarea class="form-control" rows="8"  id="meta5" name="meta5" placeholder="Enter >Product Details Metatag description"><?=$meta->meta5?></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cat_desc" class="col-form-label">Contact Metatag description</label>
                                            <textarea class="form-control" rows="8" id="meta6" name="meta6" placeholder="Enter Contact Metatag description"><?=$meta->meta6?></textarea>
                                        </div>
                                    </div>


                                    

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php //if (($page_title == 'Add Category') || ($page_title == 'Edit Category')) { ?>
                                            <button id="saveCategorySubmit" type="submit"><?=(($page_title == 'Save Metatag')? 'Save Metatag' : 'Save Metatag')?><i class="ti-arrow-right"></i></button>
                                        <?php //} else { ?>
                                            <!--a class="btn btn-rounded btn-dark mt-3" href="javascript:history.back()" role="button">GO BACK <i class="ti-arrow-right"></i></a-->
                                        <?php //} ?>
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

    <?php $this->load->view('acp/includes/footer-assets', array('page_title' => 'Dropzone', 'breadcrum' => $page_breadcrumb)); ?>

    <!-- custom js files -->
    <script src="<?=site_url()?>assets/js/acp/categories.js?c=<?=strtotime(date('s:i:H Y-m-d'))?>"></script>
    <script type="text/javascript">
        <?php /*if ($page_title == 'View Category') { */
            ?>
            /*$(function() {
                $("#manageCategory :input").prop("disabled", true);
            });*/
        <?php //} else { ?>
           /* $(function() {
                Categories.add();
            });*/
        <?php //} ?>
    </script>

<script type="text/javascript">

$(document).ready(function() {
    
$('.breadcrumbs').hide();
});
</script>
</body>

</html>