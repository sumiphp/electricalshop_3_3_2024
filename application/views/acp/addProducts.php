<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$page_title?> | ACP | <?=sitename()?></title>
    <?php $this->load->view('acp/includes/header-assets', array('page_title' => 'Dropzone')); ?>
</head>
<style>
    .removethisImage {
        background-color: red;
        color: white;
        border-radius: 50%;
        position: absolute;
        right: 10px;
        height: 25px;
        width: 25px;
        text-align: center;
        cursor: pointer;
    }
    .addmore-large {
        background-color: #ccc;
        float: left;
        border-radius: 56px;
        width: 35px;
        height: 35px;
        text-align: center;
        padding: 3px;
        font-weight: 600;
        font-size: 22px;
        border: 1px solid; 
    }
    .addmore-medium {
        background-color: #ccc;
        float: left;
        border-radius: 56px;
        width: 30px;
        height: 30px;
        padding: 2px;
        text-align: center;
        font-weight: 600;
        font-size: 18px;
    }
    .addmore-small {
        background-color: #ccc;
        float: left;
        border-radius: 56px;
        width: 25px;
        height: 25px;
        text-align: center;
        font-weight: 600;
        font-size: 15px;
    }
    .trash {
        color: red;
    }
    .display-none {
        display: none;
    }
    .parent-div.large .card-body {
        background-color: #04814b;
    }
    .parent-div.medium .row {
        background-color: #0cc173;
    }
    .parent-div.small .row {
        background-color: #43e39e;
        border: 1px solid white;
    }
    .empty-field-error {
        border: 1px solid #ff0000;
        background-color: #efbbbb;
    }
</style>
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
                                $currency = '';
                                if (isset($sitecurrency)) {
                                    $currency = $sitecurrency['currency'];
                                }
                                $prodMain = $prodDtls = $prodImg = $prodCat = $prodBrand = $prodSame = array(); 

                                //print_r($product);
                               //echo "hello";
                                //die;
                                if (isset($product) && !empty($product)) {
                                    //print_r($product);
                                    if (isset($product['Product']) && !empty($product['Product'])) {
                                        $prodMain['prod_id'] = $product['Product']['prod_id'];
                                        $prodMain['prod_name'] = $product['Product']['prod_name'];
                                        $prodMain['prod_canonial_name'] = $product['Product']['prod_canonial_name'];
                                        $prodMain['prod_primary_image'] = $product['Product']['prod_primary_image'];
                                        $prodMain['prod_opt_type'] = $product['Product']['prod_opt_type'];
                                        $prodMain['metatag'] = $product['Product']['metatag'];
                                        $prodMain['rating'] = $product['Product']['rating'];
                                        $prodMain['prdspec'] = $product['Product']['prdspec'];
                                    }
                                    if (isset($product['Details']) && !empty($product['Details'])) {
                                        foreach ($product['Details'] as $pdkey => $pdvalue) { 
                                            $prodDtls[$pdvalue['pd_type_id']]['prod_dt_id'] = $pdvalue['prod_dt_id'];
                                            $prodDtls[$pdvalue['pd_type_id']]['prod_dt_typeid'] = $pdvalue['prod_dt_typeid'];
                                            $prodDtls[$pdvalue['pd_type_id']]['prod_dt_desc'] = $pdvalue['prod_dt_desc'];
                                            $prodDtls[$pdvalue['pd_type_id']]['pd_type_id'] = $pdvalue['pd_type_id'];
                                            $prodDtls[$pdvalue['pd_type_id']]['pd_type_name'] = $pdvalue['pd_type_name'];
                                            $prodDtls[$pdvalue['pd_type_id']]['pd_type_description'] = (($pdvalue['pd_field_type'] == 2)? ($pdvalue['pd_type_description']) : (($pdvalue['pd_field_type'] == 3)? html_entity_decode(trim($pdvalue['pd_type_description'])) : $pdvalue['pd_type_description']));
                                            $prodDtls[$pdvalue['pd_type_id']]['pd_type_system'] = $pdvalue['pd_type_system'];
                                            $prodDtls[$pdvalue['pd_type_id']]['pd_type_required'] = $pdvalue['pd_type_required'];
                                            $prodDtls[$pdvalue['pd_type_id']]['pd_field_type'] = $pdvalue['pd_field_type'];
                                        }
                                    }
                                    if (isset($product['Images']) && !empty($product['Images'])) {
                                        foreach ($product['Images'] as $pikey => $pivalue) {
                                            $prodImg[$pikey]['pd_img_id'] = $pivalue['pd_img_id'];
                                            $prodImg[$pikey]['pd_img_image'] = $pivalue['pd_img_image'];
                                            $prodImg[$pikey]['pd_img_description'] = ($pivalue['pd_img_description']);
                                        }
                                    }
                                    if (isset($product['Category']) && !empty($product['Category'])) {
                                        foreach ($product['Category'] as $pckey => $pcvalue) {
                                            $prodCat[] = $pcvalue['cat_id'];
                                        }
                                    }
                                    if (isset($product['Brand']) && !empty($product['Brand'])) {
                                        foreach ($product['Brand'] as $pckey => $pbvalue) {
                                            $prodBrand[] = $pbvalue['brand_id'];
                                        }
                                    }
                                    if (isset($product['Similar']) && !empty($product['Similar'])) {
                                        foreach ($product['Similar'] as $pskey => $psvalue) {
                                            $prodSame[] = $psvalue['pr_related_prod_id'];
                                        }
                                    }
                                }
								$reqDetails = $nonreqDetails = array();
								foreach ($productDetailTypes as $pdtKey => $pdtVal) {
									if ($pdtVal['pd_type_required']) {
										$reqDetails[] = $pdtVal;
									} else {
										$nonreqDetails[] = $pdtVal;
									}
								} ?>
                                <form id="manageProduct" name="manageProduct" enctype="multipart/form-data" method="post">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="accordion4" class="according accordion-s3 gradiant-bg">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse" href="#accordion41">Product Primary Info</a>
                                                    </div>
                                                    <div id="accordion41" class="collapse show" data-parent="#accordion4">
                                                        <div class="card-body">
															<div class="form-group row">
																<div class="col-md-12 mb-3"><?php //print_r($prodMain);?>
                                                                    <input type="hidden" id="pid" name="pid" value="<?=((isset($prodMain['prod_id']) && !empty($prodMain['prod_id']))? $prodMain['prod_id'] : '')?>">
                                                                    <input type="hidden" id="prod_canonial_name" name="prod_canonial_name" value="<?=((!empty($prodMain))? $prodMain['prod_canonial_name'] : '')?>">
                                                                    <label for="prodname" class="col-form-label">Product name*</label>
																	<input class="form-control" type="text" id="prodname" name="prodname" placeholder="Enter Product name" value="<?=((isset($prodMain['prod_name']) && !empty($prodMain['prod_name']))? $prodMain['prod_name'] : '')?>" required="required">
                                                                    <span>After saving URL to this product will be: <?=site_url()?>product/<strong id="show_canonial_name"><?=((!empty($prodMain))? $prodMain['prod_canonial_name'] : '')?></strong></span>
																</div>
															</div>
															<?php foreach ($reqDetails as $pdtKey => $pdtVal) { ?>
                                                                <div class="form-group row">
                                                                    <div class="col-md-12 mb-3">
                                                                        <?php if (($pdtVal['pd_field_type'] == 2) || ($pdtVal['pd_field_type'] == 3)) { ?>
                                                                            <label for="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" class="col-form-label"><?=$pdtVal['pd_type_name']?> <?=(($pdtVal['pd_type_required'])? '*' : '')?></label>
                                                                            <textarea class="form-control" id="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" name="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" placeholder="Enter <?=$pdtVal['pd_type_name']?>" aria-label="<?=$pdtVal['pd_type_name']?>" <?=(($pdtVal['pd_type_required'])? 'required="required"' : '')?> rows="10"><?=((isset($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc']) && !empty($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc']))? (($pdtVal['pd_field_type'] == 2)? ($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc']) : (($pdtVal['pd_field_type'] == 3)? html_entity_decode(trim($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc'])) : $prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc'])) : ((trim($pdtVal['pd_type_name'] == 'Meta Tags') && !empty(metatags()))? html_entity_decode(metatags()) : ''))?></textarea>
                                                                        <?php } else { ?>
                                                                            <label for="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" class="col-form-label"><?=$pdtVal['pd_type_name']?> <?=(in_array(strtolower($pdtVal['pd_type_name']), ['amount', 'price', 'value']) ? '('.$currency.')' : '')?> <?=(($pdtVal['pd_type_required'])? '*' : '')?></label>
                                                                            <input class="form-control" type="text" id="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" name="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" placeholder="Enter <?=$pdtVal['pd_type_name']?>" value="<?=((isset($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc']) && !empty($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc']))? $prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc'] : '')?>" <?=(($pdtVal['pd_type_required'])? 'required="required"' : '')?>>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>


                                                            <div class="form-group row">
                                                                    <div class="col-md-12 mb-3">

                                                                    <label for="prdspec" class="col-form-label"> Product Specification</label>
                                                                            <textarea class="form-control" id="prdspec" name="prdspec" placeholder="Enter Product Specification "rows="10"><?=((isset($prodMain['prdspec']) && !empty($prodMain['prdspec']))? $prodMain['prdspec'] : '')?></textarea>


                                                                           
                                                                    </div>

                                                                   

                                                                </div>



                                                            

                                                            <div class="form-group row">
																<div class="col-md-12 mb-3"><?php //print_r($prodMain);?>
                                                                   
                                                                    <label for="rating" class="col-form-label">Rating*</label>
																	<!--input class="form-control" type="text" id="prodname" name="prodname" placeholder="Enter Product name" value="<?//=((isset($prodMain['prod_name']) && !empty($prodMain['prod_name']))? $prodMain['prod_name'] : '')?>" required="required"-->

                                                                    <select class="form-control" placeholder="Select Status" id="rating" name="rating"  data-bs-original-title="" title="" required>
                                                              <option value=''>Select Rating</option>
                                                              <?php if (isset($prodMain['rating'])){?>
                                                                <option value="1" <?php if (($prodMain['rating'])==1){?> selected <?php }?>>1 </option>
                                                                <option value="2" <?php if (($prodMain['rating'])==2){?> selected <?php }?>>2</option>
                                                                <option value="3" <?php if (($prodMain['rating'])==3){?> selected <?php }?>>3 </option>
                                                                <option value="4" <?php if (($prodMain['rating'])==4){?> selected <?php }?>>4</option>
                                                                <option value="5" <?php if (($prodMain['rating'])==5){?> selected <?php }?>>5</option>
                                                                <?php } else {?>


                                                                    <option value="1">1 </option>
                                                                <option value="2">2</option>
                                                                <option value="3">3 </option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>


                                                                    <?php } ?>
                                                                        </select>
</select>

                                                                    <!--span>After saving URL to this product will be: <?=site_url()?>product/<strong id="show_canonial_name"><?//=((!empty($prodMain))? $prodMain['prod_canonial_name'] : '')?></strong></span-->
																</div>
															</div>







                                                            <div class="form-group row" style="display:none">
                                                                    <div class="col-md-12 mb-3">
                                                                    <label for="metatag">Enter Metatag</label>  
                                                                        
                                                                    <textarea class="form-control" id="metatag" name="metatag" placeholder="Enter Metatag" aria-label=""  rows="10"><?=((isset($prodMain['metatag']) && !empty($prodMain['metatag']))? $prodMain['metatag'] : '')?></textarea></div>
                                                                </div>
															<div class="form-control-feedback" style="<?=((!hasUserAccess(20))? 'display:none;' : '')?>">Need to add more primary details? <a href="<?=site_url()?>acp/Productypes/add">Create Type</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion42">Product Secondry Details</a>
                                                    </div>
                                                    <div id="accordion42" class="collapse" data-parent="#accordion4">
                                                        <div class="card-body">
                                                            <?php foreach ($nonreqDetails as $pdtKey => $pdtVal) { ?>
                                                                <div class="form-group row">
                                                                    <div class="col-md-12 mb-3">
                                                                        <?php if (($pdtVal['pd_field_type'] == 2) || ($pdtVal['pd_field_type'] == 3)) { ?>
                                                                            <label for="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" class="col-form-label"><?=$pdtVal['pd_type_name']?> <?=(($pdtVal['pd_type_required'])? '*' : '')?></label>
                                                                            <textarea class="form-control" id="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" name="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" placeholder="Enter <?=$pdtVal['pd_type_name']?>" aria-label="<?=$pdtVal['pd_type_name']?>" <?=(($pdtVal['pd_type_required'])? 'required="required"' : '')?> rows="10"><?=((isset($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc']) && !empty($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc']))? (($pdtVal['pd_field_type'] == 2)? ($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc']) : (($pdtVal['pd_field_type'] == 3)? html_entity_decode(trim($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc'])) : $prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc'])) : ((trim($pdtVal['pd_type_name'] == 'Meta Tags') && !empty(metatags()))? html_entity_decode(metatags()) : ''))?></textarea>
                                                                        <?php } else { ?>
                                                                            <label for="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" class="col-form-label"><?=$pdtVal['pd_type_name']?> <?=(in_array(strtolower($pdtVal['pd_type_name']), ['amount', 'price', 'value']) ? '('.$currency.')' : '')?> <?=(($pdtVal['pd_type_required'])? '*' : '')?></label>
                                                                            <input class="form-control" type="text" id="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" name="<?=str_replace(' ', '_',$pdtVal['pd_type_id'].'_'.strtolower($pdtVal['pd_type_name']))?>" placeholder="Enter <?=$pdtVal['pd_type_name']?>" value="<?=((isset($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc']) && !empty($prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc']))? $prodDtls[$pdtVal['pd_type_id']]['prod_dt_desc'] : '')?>" <?=(($pdtVal['pd_type_required'])? 'required="required"' : '')?>>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="form-group row">
																<div class="col-md-12">
                                                                    <label for="prod_opt_type" class="col-form-label">Product Opted Type</label>
																</div>
                                                                <?php
                                                                $prod_opt_type = array();
                                                                if (!empty($prodMain)) $prod_opt_type = explode('-', $prodMain['prod_opt_type']);
                                                                ?>
                                                                <div class="form-group row col-md-12 ">
                                                                    <div class="col-md-3 mb-3">
                                                                        <input type="checkbox" name="prod_opt_type[]" value="1" <?=((!empty($prod_opt_type))? ((in_array(1, $prod_opt_type))? 'checked="checked"' : '') : '')?> >
                                                                        <label for="cust_opt_in" class="col-form-label pl-2">Featured</label>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <input type="checkbox" name="prod_opt_type[]" value="2" <?=((!empty($prod_opt_type))? ((in_array(2, $prod_opt_type))? 'checked="checked"' : '') : 'checked="checked"')?> >
                                                                        <label for="cust_opt_in" class="col-form-label pl-2">New Arrival</label>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <input type="checkbox" name="prod_opt_type[]" value="3" <?=((!empty($prod_opt_type))? ((in_array(3, $prod_opt_type))? 'checked="checked"' : '') : '')?> >
                                                                        <label for="cust_opt_in" class="col-form-label pl-2">Best Selling</label>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <input type="checkbox" name="prod_opt_type[]" value="4" <?=((!empty($prod_opt_type))? ((in_array(4, $prod_opt_type))? 'checked="checked"' : '') : 'checked="checked"')?> >
                                                                        <label for="cust_opt_in" class="col-form-label pl-2">On Sale</label>
                                                                    </div>

                                                                    <div class="col-md-3 mb-3">
                                                                        <input type="checkbox" name="prod_opt_type[]" value="5" <?=((!empty($prod_opt_type))? ((in_array(5, $prod_opt_type))? 'checked="checked"' : '') : 'checked="checked"')?> >
                                                                        <label for="cust_opt_in" class="col-form-label pl-2">Clearence Sale</label>
                                                                    </div>



																</div>
															</div>
															<div class="form-control-feedback" style="<?=((!hasUserAccess(20))? 'display:none;' : '')?>">Need to add more details? <a href="<?=site_url()?>acp/Productypes/add">Create Type</a></div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="card">
													<div class="card-header">
														<a class="collapsed card-link" data-toggle="collapse" href="#accordion43">Product Category & Brand</a>
													</div>
													<div id="accordion43" class="collapse" data-parent="#accordion4">
														<div class="card-body row">
															<div class="col-md-6 mb-3">
                                                                <label for="prodCategory" class="col-form-label">Product Category</label>
																<select class="form-control" id="prodCategory" name="prodCategory" style="height:43px;">
																	<?php foreach ($productCategories as $pcKey => $pcVal) { ?>
																		<option value="<?=$pcVal['cat_id']?>" <?=((in_array($pcVal['cat_id'], $prodCat))? 'selected' : '')?>><?=$pcVal['cat_name']?></option>
																	<?php } ?>
																</select>
																<div class="form-control-feedback" style="<?=((!hasUserAccess(16))? 'display:none;' : '')?>">Want a new Category? <a href="<?=site_url()?>acp/ProductCategories/add">Create Now</a></div>
															</div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="prodBrand" class="col-form-label">Product Brand</label>
																<select class="form-control" id="prodBrand" name="prodBrand" style="height:43px;">
                                                                    <option value="">Select Brand</option>
																	<?php foreach ($brands as $pcKey => $pbVal) { ?>
																		<option value="<?=$pbVal['brand_id']?>" <?=((in_array($pbVal['brand_id'], $prodBrand))? 'selected' : '')?>><?=$pbVal['brand_name']?></option>
																	<?php } ?>
																</select>
																<div class="form-control-feedback" style="<?=((!hasUserAccess(17))? 'display:none;' : '')?>">Want a new Brand? <a href="<?=site_url()?>acp/Productbrand/add">Create Now</a></div>
															</div>
														</div>
													</div>
												</div>


                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion44">Technical Data Sheet</a>
                                                    </div>
                                                    <div id="accordion44" class="collapse" data-parent="#accordion4">
                                                        <!-- data_sheet -->
                                                        <div class="parent-div structure large" style="display:none;">
                                                            <div class="card-body mt-1 addmore-large-row">
                                                                <div class="tech_sheet_section_header row col-12" data-type="large">
                                                                    <input type="text" class="form-control col-10" name="tech_sheet[]" data-hierarchy="L" placeholder="Enter Technical Data Sheet section header">
                                                                    <span class="col-1 add-one-more"><a href="javascript:void(0);" class="addmore-large">+</a></span>
                                                                    <span class="col-1 display-none remove-this"><a href="javascript:void(0);" class="addmore-large trash"><i class="fa fa-trash"></i></a></span>
                                                                </div>
                                                                <div class="parent-div medium">
                                                                    <div class="card-body row col-12 m-0 mt-1 addmore-medium-row">
                                                                        <div class="row col-12 ml-1 pl-0" data-type="medium">
                                                                            <input type="text" class="form-control col-10 mb-1" name="tech_sheet[]" data-hierarchy="M" placeholder="Enter Technical Data Sheet sub header">
                                                                            <span class="col-1 mt-1 add-one-more"><a href="javascript:void(0);" class="addmore-medium">+</a></span>
                                                                            <span class="col-1 mt-1 display-none remove-this"><a href="javascript:void(0);" class="addmore-medium trash"><i class="fa fa-trash"></i></a></span>
                                                                        </div>
                                                                        <div class="parent-div col-12 small">
                                                                            <div class="row addmore-small-row col-12 mt-1 mb-1" data-type="small">
                                                                                <input type="text" class="form-control col-10 mt-1 mb-1" name="tech_sheet[]" data-hierarchy="S" placeholder="Enter Technical Data Sheet point">
                                                                                <span class="col-1 mt-2 add-one-more"><a href="javascript:void(0);" class="addmore-small">+</a></span>
                                                                                <span class="col-1 mt-2 display-none remove-this"><a href="javascript:void(0);" class="addmore-small trash"><i class="fa fa-trash"></i></a></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- data_sheet -->

                                                        <?php if (
                                                            ! isset($product)
                                                            || (isset($product) && empty($product['data_sheet']))
                                                        ) { ?>
                                                            <div class="card-body mt-2">
                                                                <textarea class="form-control" id="tech_desc" name="tech_desc" placeholder="Enter Technical Data Sheet Description"></textarea>
                                                            </div>
                                                            <div class="parent-div large">
                                                                <div class="card-body mt-1 addmore-large-row">
                                                                    <div class="tech_sheet_section_header row col-12" data-type="large">
                                                                        <input type="text" class="form-control col-10" name="tech_sheet[]" data-hierarchy="L" placeholder="Enter Technical Data Sheet section header">
                                                                        <span class="col-1 add-one-more"><a href="javascript:void(0);" class="addmore-large">+</a></span>
                                                                        <span class="col-1 display-none remove-this"><a href="javascript:void(0);" class="addmore-large trash"><i class="fa fa-trash"></i></a></span>
                                                                    </div>
                                                                    <div class="parent-div medium">
                                                                        <div class="card-body row col-12 m-0 mt-1 addmore-medium-row">
                                                                            <div class="row col-12 ml-1 pl-0" data-type="medium">
                                                                                <input type="text" class="form-control col-10 mb-1" name="tech_sheet[]" data-hierarchy="M" placeholder="Enter Technical Data Sheet sub header">
                                                                                <span class="col-1 mt-1 add-one-more"><a href="javascript:void(0);" class="addmore-medium">+</a></span>
                                                                                <span class="col-1 mt-1 display-none remove-this"><a href="javascript:void(0);" class="addmore-medium trash"><i class="fa fa-trash"></i></a></span>
                                                                            </div>
                                                                            <div class="parent-div col-12 small">
                                                                                <div class="row addmore-small-row col-12 mt-1 mb-1" data-type="small">
                                                                                    <input type="text" class="form-control col-10 mt-1 mb-1" name="tech_sheet[]" data-hierarchy="S" placeholder="Enter Technical Data Sheet point">
                                                                                    <span class="col-1 mt-2 add-one-more"><a href="javascript:void(0);" class="addmore-small">+</a></span>
                                                                                    <span class="col-1 mt-2 display-none remove-this"><a href="javascript:void(0);" class="addmore-small trash"><i class="fa fa-trash"></i></a></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } else {
                                                            $recordsCounter = 0;
                                                            $hierarchy['L'] = $hierarchy['M'] = $hierarchy['S'] = 0;
                                                            foreach ($product['data_sheet'] as $tdsHirerarchy => $tds) {
                                                                $recordsCounter++;
                                                                if ($tds['tech_sheet_level'] == 1) {
                                                                    $hierarchy['L']++;
                                                                    $hierarchy['M'] = 0;
                                                                    $hierarchy['S'] = 0;
                                                                } else if ($tds['tech_sheet_level'] == 2) {
                                                                    $hierarchy['M']++;
                                                                    $hierarchy['S'] = 0;
                                                                } else if ($tds['tech_sheet_level'] == 3) {
                                                                    $hierarchy['S']++;
                                                                }
                                                                $nextHierarchyToCheckExistance = substr($tdsHirerarchy, 0, -1) . (intval(substr($tdsHirerarchy, strlen($tdsHirerarchy) - 1, 1)) + 1);
                                                                $hasAddOption = ! array_key_exists($nextHierarchyToCheckExistance, $product['data_sheet']);
                                                                $hasDeleteOption = array_key_exists($nextHierarchyToCheckExistance, $product['data_sheet']);

                                                                if ($tds['tech_sheet_level'] == 0) {?>
                                                                    <div class="card-body mt-2">
                                                                        <textarea class="form-control" id="tech_desc" name="tech_desc" placeholder="Enter Technical Data Sheet Description"><?=$tds['tech_sheet_text']?></textarea>
                                                                    </div>
                                                                <?php } else if ($tds['tech_sheet_level'] == 1) { 
                                                                    if ($hierarchy['L'] > 1) { ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="parent-div large">
                                                                        <div class="card-body mt-1 addmore-large-row">
                                                                            <div class="tech_sheet_section_header row col-12 <?=$tdsHirerarchy?>" data-type="large">
                                                                                <input type="text" class="form-control col-10" name="tech_sheet[]" data-hierarchy="L" placeholder="Enter Technical Data Sheet section header" value="<?=$tds['tech_sheet_text']?>">
                                                                                <span class="col-1 add-one-more"><a href="javascript:void(0);" class="addmore-large <?=($hasAddOption ? '' : 'display-none')?>">+</a></span>
                                                                                <span class="col-1 remove-this <?=($hasDeleteOption ? '' : 'display-none')?>"><a href="javascript:void(0);" class="addmore-large trash"><i class="fa fa-trash"></i></a></span>
                                                                            </div>
                                                                            <div class="parent-div medium">
                                                                <?php } else if ($tds['tech_sheet_level'] == 2) { 
                                                                    if ($hierarchy['M'] > 1) { ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                        <div class="card-body row col-12 m-0 mt-1 addmore-medium-row">
                                                                            <div class="row col-12 ml-1 pl-0 <?=$tdsHirerarchy?>" data-type="medium">
                                                                                <input type="text" class="form-control col-10 mb-1" name="tech_sheet[]" data-hierarchy="M" placeholder="Enter Technical Data Sheet sub header" value="<?=$tds['tech_sheet_text']?>">
                                                                                <span class="col-1 mt-1 add-one-more <?=($hasAddOption ? '' : 'display-none')?>"><a href="javascript:void(0);" class="addmore-medium">+</a></span>
                                                                                <span class="col-1 mt-1 remove-this <?=($hasDeleteOption ? '' : 'display-none')?>"><a href="javascript:void(0);" class="addmore-medium trash"><i class="fa fa-trash"></i></a></span>
                                                                            </div>
                                                                            <div class="parent-div col-12 small">
                                                                <?php } else if ($tds['tech_sheet_level'] == 3) { ?>
                                                                    <div class="row addmore-small-row col-12 mt-1 mb-1 <?=$tdsHirerarchy?>" data-type="small">
                                                                        <input type="text" class="form-control col-10 mt-1 mb-1" name="tech_sheet[]" data-hierarchy="S" placeholder="Enter Technical Data Sheet point" value="<?=$tds['tech_sheet_text']?>">
                                                                        <span class="col-1 mt-2 add-one-more <?=($hasAddOption ? '' : 'display-none')?>"><a href="javascript:void(0);" class="addmore-small">+</a></span>
                                                                        <span class="col-1 mt-2 remove-this <?=($hasDeleteOption ? '' : 'display-none')?>"><a href="javascript:void(0);" class="addmore-small trash"><i class="fa fa-trash"></i></a></span>
                                                                    </div>
                                                                <?php }
                                                                if (count($product['data_sheet']) == $recordsCounter) { ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php }
                                                            }
                                                        } ?>
                                                    </div>
                                                </div>


                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion45">Product Images</a>
                                                    </div>
                                                    <div id="accordion45" class="collapse" data-parent="#accordion4">
                                                        <div class="card-body">
															<div class="dropzone" id="fileDropZone1" style="<?=((($page_title == 'Add Product') || ($page_title == 'Edit Product'))? '' : 'display:none;')?>">
															</div>
                                                            <input type="hidden" id="prodPrimaryImage" name="prodPrimaryImage" value="<?=((isset($prodMain['prod_primary_image']) && !empty($prodMain['prod_primary_image']))? $prodMain['prod_primary_image'] : '')?>">

                                                            <div class="dropzoneDetailed" id="dropzoneDetailed">
                                                            <?php 
                                                            $imgs = '';
                                                            if (!empty($prodImg)) { 
                                                                foreach ($prodImg as $key => $img) { ?>
                                                                    <div id="imageDesc_<?=(str_replace('.', '_', $img['pd_img_image']))?>" data-filename="<?=$img['pd_img_image']?>" class="prodimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img class="<?=(((isset($prodMain['prod_primary_image'])) && ($img['pd_img_image'] == $prodMain['prod_primary_image']))? 'btn-success' : '')?>" src="<?=site_url()?>assets/uploads/products/<?=$img['pd_img_image']?>" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;"><span class="removethisImage">x</span></div><div class="col-11 pimgdesc"><div class="for"><div class="col-md-12 mt-s3 cdard-body"><textarea class="form-control" id="pimgdesc_<?=(str_replace('.', '_', $img['pd_img_image']))?>" name="pimgdesc_<?=(str_replace('.', '_', $img['pd_img_image']))?>" placeholder="Enter image description"><?=($img['pd_img_description'])?></textarea></div></div></div></div>
                                                                <?php 
                                                                $imgs .= '~'.$img['pd_img_image'].'~,';
                                                                }
                                                            } ?>
                                                            <input type="hidden" name="prodImages" id="prodImages" value="<?=$imgs?>">
															</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php foreach ($products as $psKey => $psVal) {
                                                    if ((isset($prodMain['prod_id'])) && ($psVal['prod_id'] == $prodMain['prod_id'])) unset($products[$psKey]);
                                                }
                                                if (!empty($products)) { ?>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion46">Recommended Products</a>
                                                        </div>
                                                        <div id="accordion46" class="collapse" data-parent="#accordion4">
                                                            <div class="card-body">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="similarProd" class="col-form-label">Related Products</label>
                                                                    <select class="form-control p-0" id="similarProd" name="similarProd[]" style="height:43px;" multiple="multiple">
                                                                        <option disabled value="0">Select Related or Similar Products</option>
                                                                        <?php foreach ($products as $psKey => $psVal) { ?>
                                                                            <option value="<?=$psVal['prod_id']?>" <?=((in_array($psVal['prod_id'], $prodSame) && ((isset($prodMain['prod_id'])) && ($psVal['prod_id'] != $prodMain['prod_id'])))? 'selected' : '')?>><?=$psVal['prod_name']?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php if (($page_title == 'Add Product') || ($page_title == 'Edit Product')) { ?>
                                            <button id="saveProduct" type="submit"><?=(($page_title == 'Add Product')? 'Save Product' : 'Update Product')?><i class="ti-arrow-right"></i></button>
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
    <script src="<?=site_url()?>assets/js/acp/product.js?c=<?=date('siHYmd')?>"></script>
    <script>
    <?php if ($page_title == 'View Product') { ?>
        $(function() {
            $("#manageProduct :input").prop("disabled", true);
        });
    <?php } else { ?>
        $(function() {
            Product.add();
            $('#similarProd').select2({
                placeholder: "Select Related or Similar Products",
            });
        });
    <?php } ?>
    </script>


<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

        <script>
$(document).ready(function(){
  /*$("#save").click(function(){*/
    //var description = CKEDITOR.instances['prdspec'].getData();
    //$("#demo").val(description);
    //alert(description);
  /*});*/
CKEDITOR.replace('prdspec');
 var description = CKEDITOR.instances['prdspec'].getData();
   $("#demo").val(description);
});
</script>




</body>

</html>
