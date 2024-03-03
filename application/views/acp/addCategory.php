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
                                $categ = array();
                                if (isset($productcategory) && !empty($productcategory)) {
                                    $categ = array(
                                        'cat_id' => $productcategory['cat_id'],
                                        'cat_name' => $productcategory['cat_name'],
                                        'cat_canonial_name' => $productcategory['cat_canonial_name'],
                                        'cat_desc' => $productcategory['cat_desc'],
                                        'cat_image' => $productcategory['cat_image'],
                                    );
                                } ?>
                                <form id="manageCategory">
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <input type="hidden" id="cat_id" name="cat_id" value="<?=((!empty($categ) && isset($categ['cat_id']))? $categ['cat_id'] : '')?>">
                                            <input type="hidden" id="cat_canonial_name" name="cat_canonial_name" value="<?=((!empty($categ))? $categ['cat_canonial_name'] : '')?>">
                                            <label for="cat_name" class="col-form-label">Category Name*</label>
                                            <input class="form-control" type="text" id="cat_name" name="cat_name" placeholder="Enter Category Name" value="<?=((!empty($categ) && isset($categ['cat_name']))? $categ['cat_name'] : '')?>" required="required">
                                            <span>After saving URL to this category will be: <?=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cat_desc" class="col-form-label">Category description</label>
                                            <textarea class="form-control" rows="8" id="cat_desc" name="cat_desc" placeholder="Enter Category description"><?=((!empty($categ) && isset($categ['cat_desc']))? $categ['cat_desc'] : '')?></textarea>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row" style="<?=((($page_title == 'Add Category') || ($page_title == 'Edit Category'))? '' : 'display:none;')?>">
                                        <div class="col-md-12 mb-3 card-body">
                                            <div class="dropzone" id="fileDropZone1">
                                            </div>
                                            <input type="hidden" id="cat_image" name="cat_image" value="<?=((isset($categ['cat_image']) && !empty($categ['cat_image']))? $categ['cat_image'] : '')?>">
                                        </div>
                                    </div>

                                    <div class="dropzoneDetailed" id="dropzoneDetailed">
                                        <?php if (isset($categ['cat_image']) && !empty($categ['cat_image'])) { ?>
                                            <div id="imageDesc_<?=(str_replace('.', '_', $categ['cat_image']))?>" class="prodimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img class="btn-success" src="<?=site_url()?>assets/uploads/categories/<?=$categ['cat_image']?>" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;"></div><div class="col-10 pt-3 pl-4">Category image</div></div>
                                        <?php } else if ($page_title == 'Edit Category') {
                                            echo "No image added to category yet.";
                                        } ?>
                                    </div>

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php if (($page_title == 'Add Category') || ($page_title == 'Edit Category')) { ?>
                                            <button id="saveCategorySubmit" type="submit"><?=(($page_title == 'Add Category')? 'Save Category' : 'Update Category')?><i class="ti-arrow-right"></i></button>
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

    <?php $this->load->view('acp/includes/footer-assets', array('page_title' => 'Dropzone', 'breadcrum' => $page_breadcrumb)); ?>

    <!-- custom js files -->
    <script src="<?=site_url()?>assets/js/acp/categories.js?c=<?=strtotime(date('s:i:H Y-m-d'))?>"></script>
    <script type="text/javascript">
        <?php if ($page_title == 'View Category') { ?>
            $(function() {
                $("#manageCategory :input").prop("disabled", true);
            });
        <?php } else { ?>
            $(function() {
                Categories.add();
            });
        <?php } ?>
    </script>
</body>

</html>