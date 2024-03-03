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
                                $brd = array();
                                if (isset($productbrand) && !empty($productbrand)) {
                                    $brd = array(
                                        'brand_id' => $productbrand['brand_id'],
                                        'brand_name' => $productbrand['brand_name'],
                                        'brand_canonial_name' => $productbrand['brand_canonial_name'],
                                        'brand_desc' => $productbrand['brand_desc'],
                                        'brand_image' => $productbrand['brand_image'],
                                        'addinmenu'=> $productbrand['addinmenu'],
                                        'brand_orderno' => $productbrand['brand_orderno'],
                                    );
                                    //print_r($brd);
                                } ?>
                                <form id="manageBrand">
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <input type="hidden" id="brand_id" name="brand_id" value="<?=((!empty($brd) && isset($brd['brand_id']))? $brd['brand_id'] : '')?>">
                                            <input type="hidden" id="brand_canonial_name" name="brand_canonial_name" value="<?=((!empty($brd))? $brd['brand_canonial_name'] : '')?>">
                                            <label for="brand_name" class="col-form-label">Brand Name*</label>
                                            <input class="form-control" type="text" id="brand_name" name="brand_name" placeholder="Enter Brand Name" value="<?=((!empty($brd) && isset($brd['brand_name']))? $brd['brand_name'] : '')?>" required="required">
                                            <span>After saving URL to this brand will be: <?=site_url()?>products/brand/<strong id="show_canonial_name"><?=((!empty($brd) && isset($brd['brand_canonial_name']))? $brd['brand_canonial_name'] : '')?></strong></span>
                                        </div>
                                    </div>

                                    <?php //echo $brd['addinmenu'];?>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="addinmenu" class="col-form-label">Add in Menu ?</label>
                                            <select class="form-control" type="text" id="addinmenu" name="addinmenu"   required="required">
                                            <option value=''>Select</option>
                                            <?php if (isset($brd['addinmenu'])){?>
                                            <option value='1' <?php if ($brd['addinmenu']==1){?>Selected <?php } ?>>Yes</option>
                                            <option value='0' <?php if ($brd['addinmenu']==0){?>Selected <?php } ?>>No</option>
                                            <?php } else { ?>

                                                <option value='1'>Yes</option>
                                            <option value='0'>No</option>


                                                <?php }?>
                            </select>


                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="brand_desc" class="col-form-label">Brand description</label>
                                            <textarea class="form-control" rows="8" id="brand_desc" name="brand_desc" placeholder="Enter Brand description"><?=((!empty($brd) && isset($brd['brand_desc']))? $brd['brand_desc'] : '')?></textarea>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                           
                                            <label for="brand_name" class="col-form-label">Brand Order*</label>
                                            <input class="form-control" type="text" id="brand_order" name="brand_order" placeholder="Enter Brand Order" value="<?=((!empty($brd) && isset($brd['brand_orderno']))? $brd['brand_orderno'] : '')?>" required="required">
                                            
                                        </div>
                                    </div>





                                    <div class="form-group row" style="<?=((($page_title == 'Add Brand') || ($page_title == 'Edit Brand'))? '' : 'display:none;')?>">
                                        <div class="col-md-12 mb-3 card-body">
                                            <div class="dropzone" id="fileDropZone1">
                                            </div>
                                            <input type="hidden" id="brand_image" name="brand_image" value="<?=((isset($brd['brand_image']) && !empty($brd['brand_image']))? $brd['brand_image'] : '')?>">
                                        </div>
                                    </div>

                                    <div class="dropzoneDetailed" id="dropzoneDetailed">
                                        <?php if (isset($brd['brand_image']) && !empty($brd['brand_image'])) { ?>
                                            <div id="imageDesc_<?=(str_replace('.', '_', $brd['brand_image']))?>" class="prodimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img class="btn-success" src="<?=site_url()?>assets/uploads/brands/<?=$brd['brand_image']?>" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;"></div><div class="col-10 pt-3 pl-4">Brand image</div></div>
                                        <?php } else if ($page_title == 'Edit Brand') {
                                            echo "No image added to brand yet.";
                                        } ?>
                                    </div>

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php if (($page_title == 'Add Brand') || ($page_title == 'Edit Brand')) { ?>
                                            <button id="saveBrandSubmit" type="submit"><?=(($page_title == 'Add Brand')? 'Save Brand' : 'Update Brand')?><i class="ti-arrow-right"></i></button>
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
    <script src="<?=site_url()?>assets/js/acp/brands.js?c=<?=date('siHYmd')?>"></script>
    <script type="text/javascript">
        <?php if ($page_title == 'View Product') { ?>
            $(function() {
                $("#manageBrand :input").prop("disabled", true);
            });
        <?php } else { ?>
            $(function() {
                Brands.add();
            });
        <?php } ?>
    </script>
</body>

</html>