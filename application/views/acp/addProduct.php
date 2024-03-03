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
                                $prod_details = $prodImg = array(); 
                                if (isset($prod) && !empty($prod)) {
                                    $prod_details = array(
                                        'prod_id' => $prod['prod_details']['prod_id'],
                                        'prod_name' => $prod['prod_details']['prod_name'],
                                        'prod_brand' => $prod['prod_details']['prod_brand'],
                                        'prod_canonial_name' => $prod['prod_details']['prod_canonial_name'],
                                        'prod_desc' => $prod['prod_details']['prod_desc'],
                                    );

                                    $prodMain['prod_primary_image'] = null;
                                    if (isset($prod['prod_images']) && !empty($prod['prod_images'])) {
                                        foreach ($prod['prod_images'] as $pikey => $pivalue) {
                                            $prodImg[$pikey]['cimg_id'] = $pivalue['cimg_id'];
                                            $prodImg[$pikey]['prod_image'] = $pivalue['prod_image'];
                                            $prodImg[$pikey]['primary_image'] = $pivalue['primary_image'];
                                            $prodImg[$pikey]['prod_image_desc'] = nl2br($pivalue['prod_image_desc']);
                                            if ($prodImg[$pikey]['primary_image']) {
                                                $prodMain['prod_primary_image'] = $pivalue['prod_image'];
                                            }
                                        }
                                    }
                                } ?>
                                <form id="manageProduct">
                                    <div class="form-group row field-wrapper">
                                        <div class="col-md-12 mb-3">
                                            <input type="hidden" id="prod_id" name="prod_id" value="<?=((!empty($prod_details) && isset($prod_details['prod_id']))? $prod_details['prod_id'] : '')?>">
                                            <input type="hidden" id="prod_canonial_name" name="prod_canonial_name" value="<?=((!empty($prod_details))? $prod_details['prod_canonial_name'] : '')?>">
                                            <label for="prod_name" class="col-form-label">Product Name*</label>
                                            <input class="form-control" type="text" id="prod_name" name="prod_name" placeholder="Enter Product Name" value="<?=((!empty($prod_details) && isset($prod_details['prod_name']))? $prod_details['prod_name'] : '')?>" required="required">
                                            <span>After saving URL to this product will be: <?=MAIN_SITE_URL?>product/<strong id="show_canonial_name"><?=((!empty($prod_details) && isset($prod_details['prod_canonial_name']))? $prod_details['prod_canonial_name'] : '')?></strong></span>
                                        </div>
                                    </div>
                                    <div class="form-group row field-wrapper">
                                        <div class="col-md-12 mb-3">
                                            <label for="prod_desc" class="col-form-label">Product description</label>
                                            <textarea class="form-control" rows="8" id="prod_desc" name="prod_desc" placeholder="Enter Product description"><?=((!empty($prod_details) && isset($prod_details['prod_desc']))? $prod_details['prod_desc'] : '')?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row field-wrapper">
                                        <div class="col-md-6 mb-3">
                                            <label for="prod_desc" class="col-form-label">Product brand*</label>
                                            <select class="form-control" id="prod_brand" name="prod_brand" required="required" style="height: 45px;">
                                                <option value="">Choose brand</option>
                                                <?php foreach ($brands as $key => $brand) { ?>
                                                    <option value="<?=$brand['brand_id']?>" <?=((!empty($prod_details) && isset($prod_details['prod_brand']) && ($prod_details['prod_brand'] == $brand['brand_id']))? 'selected' : '')?>><?=$brand['brand_name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="prod_desc" class="col-form-label">Product category*</label>
                                            <select class="form-control" id="prod_brand" name="prod_brand" required="required" style="height: 45px;">
                                                <option value="">Choose category</option>
                                                <?php foreach ($brands as $key => $brand) { ?>
                                                    <option value="<?=$brand['brand_id']?>" <?=((!empty($prod_details) && isset($prod_details['prod_brand']) && ($prod_details['prod_brand'] == $brand['brand_id']))? 'selected' : '')?>><?=$brand['brand_name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row field-wrapper mb-0">
                                        <div class="col-12">
                                            <label for="prod_features" class="col-form-label">Product features*</label>
                                        </div>
                                        <div class="repeater-container validate-container col-12">
                                            <?php if ($page_title !== 'Add Product' && !empty($prod['prod_features'])) {
                                                foreach ($prod['prod_features'] as $k => $service) { ?>
                                                    <div class="form-group row">
                                                        <div class="<?=(($page_title !== 'View Product') ? 'col-10' : 'col-12' )?>">
                                                            <input class="form-control" type="hidden" name="prod_srv_id[]" value="<?=((!empty($service) && isset($service['prod_srv_id']))? $service['prod_srv_id'] : '')?>">
                                                            <input class="form-control" type="text" name="prod_service[]" placeholder="Enter a provided feature" value="<?=((!empty($service) && isset($service['prod_srv_desc']))? $service['prod_srv_desc'] : '')?>" required="required">
                                                        </div>
                                                        <?php if ($page_title !== 'View Product') { ?>
                                                            <div class="wrap col-2">
                                                                <?php if (! isset($prod['prod_features'][$k + 1])) { ?>
                                                                    <a href="javascript:void(0);" class="btn btn-secondry add-one-more" title="Add one more">
                                                                        <i class="fa fa-plus text-success"></i>
                                                                    </a>
                                                                <?php } ?>
                                                                <a href="javascript:void(0);" class="btn btn-secondry remove-one" title="Remove">
                                                                    <i class="fa fa-trash text-danger"></i>
                                                                </a>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php }
                                            } else { ?>
                                                <div class="form-group row">
                                                    <div class="<?=(($page_title !== 'View Product') ? 'col-10' : 'col-12' )?>">
                                                        <input class="form-control" type="hidden" name="prod_srv_id[]">
                                                        <input class="form-control" type="text" name="prod_service[]" placeholder="Enter a provided feature" value="<?=((!empty($prod_details) && isset($prod_details['prod_name']))? $prod_details['prod_name'] : '')?>" required="required">
                                                    </div>
                                                    <div class="wrap col-2">
                                                        <a href="javascript:void(0);" class="btn btn-secondry add-one-more" title="Add one more">
                                                            <i class="fa fa-plus text-success"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-secondry remove-one" title="Remove">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <!-- Product Images -->
                                    <div class="card-body">
                                        <div class="dropzone" id="fileDropZone1" style="<?=((($page_title == 'Add Product') || ($page_title == 'Edit Product'))? '' : 'display:none;')?>">
                                        </div>
                                        <input type="hidden" id="prodPrimaryImage" name="prodPrimaryImage" value="<?=((isset($prodMain['prod_primary_image']) && !empty($prodMain['prod_primary_image']))? $prodMain['prod_primary_image'] : '')?>">

                                        <div class="dropzoneDetailed" id="dropzoneDetailed">
                                            <?php 
                                            $imgs = '';
                                            if (!empty($prodImg)) { 
                                                foreach ($prodImg as $key => $img) { ?>
                                                    <div id="imageDesc_<?=(str_replace('.', '_', $img['prod_image']))?>" class="prodimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img class="<?=(((isset($prodMain['prod_primary_image'])) && ($img['prod_image'] == $prodMain['prod_primary_image']))? 'btn-success' : 'makePrimaryImage')?>"  data-pimg="<?=$img['prod_image']?>" src="<?=site_url()?>assets/uploads/products/<?=$img['prod_image']?>" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;"></div><div class="col-11 pimgdesc"><div class="for"><div class="col-md-12 mt-s3 cdard-body"><textarea class="form-control" id="pimgdesc_<?=(str_replace('.', '_', $img['prod_image']))?>" name="pimgdesc_<?=(str_replace('.', '_', $img['prod_image']))?>" placeholder="Enter image description"><?=nl2br($img['prod_image_desc'])?></textarea>
                                                    <input class="form-control" type="hidden" name="cimg_id[]" value="<?=$img['cimg_id']?>">
                                                </div></div></div></div>
                                            <?php 
                                                $imgs .= '~'.$img['prod_image'].'~,';
                                                }
                                            } ?>
                                            <input type="hidden" name="prodImages" id="prodImages" value="<?=$imgs?>">
                                        </div>
                                    </div>

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php if (($page_title == 'Add Product') || ($page_title == 'Edit Product')) { ?>
                                            <button id="saveProductSubmit" type="submit"><?=(($page_title == 'Add Product')? 'Save Product' : 'Update Product')?><i class="ti-arrow-right"></i></button>
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
    <script src="<?=site_url()?>assets/js/acp/products.js?c=<?=strtotime(date('s:i:H Y-m-d'))?>"></script>
    <script type="text/javascript">
        <?php if ($page_title == 'View Product') { ?>
            $(function() {
                $("#manageProduct :input").prop("disabled", true);
            });
        <?php } else { ?>
            $(function() {
                Products.add();
            });
        <?php } ?>
    </script>
</body>

</html>