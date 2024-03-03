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
                                $catg = array();
                                if (isset($productcategory) && !empty($productcategory)) {
                                    $catg = array(
                                        'cat_id' => $productcategory['cat_id'],
                                        'cat_name' => $productcategory['cat_name'],
                                        'cat_canonial_name' => $productcategory['cat_canonial_name'],
                                        'cat_desc' => $productcategory['cat_desc'],
                                        'cat_image' => $productcategory['cat_image'],
                                        'cat_orderno' => $productcategory['cat_orderno'],
                                        'addinmenu'=> $productcategory['addinmenu'],
                                    );
                                } ?>
                                <form id="manageCatg">
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <input type="hidden" id="cat_id" name="cat_id" value="<?=((!empty($catg) && isset($catg['cat_id']))? $catg['cat_id'] : '')?>">
                                            <input type="hidden" id="cat_canonial_name" name="cat_canonial_name" value="<?=((!empty($catg))? $catg['cat_canonial_name'] : '')?>">
                                            <label for="cat_name" class="col-form-label">Category Name*</label>
                                            <input class="form-control" type="text" id="cat_name" name="cat_name" placeholder="Enter Category Name" value="<?=((!empty($catg) && isset($catg['cat_name']))? $catg['cat_name'] : '')?>" required="required">
                                            <span>After saving URL to this category will be: <?=site_url()?>products/category/<strong id="show_canonial_name"><?=((!empty($catg) && isset($catg['cat_canonial_name']))? $catg['cat_canonial_name'] : '')?></strong></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cat_desc" class="col-form-label">Category description</label>
                                            <textarea class="form-control" rows="8" id="cat_desc" name="cat_desc" placeholder="Enter Category description"><?=((!empty($catg) && isset($catg['cat_desc']))? $catg['cat_desc'] : '')?></textarea>
                                        </div>
                                    </div>


                                    
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                           
                                            <label for="brand_name" class="col-form-label">Category Order*</label>
                                            <input class="form-control" type="text" id="cat_order" name="cat_order" placeholder="Enter Category Order" value="<?=((!empty($catg) && isset($catg['cat_orderno']))? $catg['cat_orderno'] : '')?>" required="required">
                                            
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="addinmenu" class="col-form-label">Add in Menu ?</label>
                                            <select class="form-control" type="text" id="addinmenu" name="addinmenu"   required="required">
                                            <option value=''>Select</option>
                                            <?php if (isset($catg['addinmenu'])){?>
                                            <option value='1' <?php if ($catg['addinmenu']==1){?>Selected <?php } ?>>Yes</option>
                                            <option value='0' <?php if ($catg['addinmenu']==0){?>Selected <?php } ?>>No</option>
                                            <?php } else { ?>

                                                <option value='1'>Yes</option>
                                            <option value='0'>No</option>


                                                <?php }?>
                            </select>


                                            </div>
                                    </div>

                                    <div class="form-group row" style="<?=((($page_title == 'Add Category') || ($page_title == 'Edit Category'))? '' : 'display:none;')?>">
                                        <div class="col-md-12 mb-3 card-body">
                                            <div class="dropzone" id="fileDropZone1">
                                            </div>
                                            <input type="hidden" id="cat_image" name="cat_image" value="<?=((isset($catg['cat_image']) && !empty($catg['cat_image']))? $catg['cat_image'] : '')?>">
                                        </div>
                                    </div>

                                    <div class="dropzoneDetailed" id="dropzoneDetailed">
                                        <?php if (isset($catg['cat_image']) && !empty($catg['cat_image'])) { ?>
                                            <div id="imageDesc_<?=(str_replace('.', '_', $catg['cat_image']))?>" class="prodimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img class="btn-success" src="<?=site_url()?>assets/uploads/categories/<?=$catg['cat_image']?>" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;"></div><div class="col-10 pt-3 pl-4">Category image</div></div>
                                        <?php } else if ($page_title == 'Edit Category') {
                                            echo "No image added to category yet.";
                                        } ?>
                                    </div>

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php if (($page_title == 'Add Category') || ($page_title == 'Edit Category')) { ?>
                                            <button id="saveCatgSubmit" type="submit"><?=(($page_title == 'Add Category')? 'Save Category' : 'Update Category')?><i class="ti-arrow-right"></i></button>
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
    <script src="<?=site_url()?>assets/js/acp/category.js?c=<?=date('siHYmd')?>"></script>
    <script type="text/javascript">
        <?php if ($page_title == 'View Product') { ?>
            $(function() {
                $("#manageCatg :input").prop("disabled", true);
            });
        <?php } else { ?>
            $(function() {
                Category.add();
            });
        <?php } ?>
    </script>
</body>

</html>