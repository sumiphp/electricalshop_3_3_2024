
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
             $page_title="Upload Bulk Upload File";
             $page_breadcrumb1="Bulk Upload";
             
            
            $this->load->view('acp/includes/page-head', array('page_title' => $page_title, 'breadcrum' => $page_breadcrumb1)); ?>
            <!-- page title area end -->
           
            <div class="main-content-inner p-0">
                <div class="col-12 p-0 mt-5X">
                    <div class="card">
                        <div class="card-body">
                            <div class="formArea">
                                <span style='color:green';>
                            <?php echo $this->session->flashdata('msg');
                            
                            ?>
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
                                <form id="home" method="post" action="<?php echo base_url().'acp/settings/managebulkuploadprocess';?>" enctype="multipart/form-data">
                                  




                                  

                                   


                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Upload CSV file*</label>
                                            <input class="form-control" type="file" id="image1" name="image1" placeholder="Enter CSV file" value="" >
                                           
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                     
                                    </div>

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php //if (($page_title == 'Add Category') || ($page_title == 'Edit Category')) { ?>
                                            <button id="saveCategorySubmit" type="submit"><?=(($page_title == 'Upload Csv')? 'Upload Csv ' : 'Upload Csv')?><i class="ti-arrow-right"></i></button>
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