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
             $page_title="Add Home Page details";
             $page_breadcrumb1="Home Page";
             
            
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
                                <form id="home" method="post" action="<?php echo base_url().'acp/settings/managehomepageprocess';?>" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Membership Title1*</label>
                                            <input class="form-control" type="text" id="title1" name="title1" placeholder="Enter Membership Title1" value="<?=$meta->title1?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Membership Title2*</label>
                                            <input class="form-control" type="text" id="title2" name="title2" placeholder="Enter Membership Title2" value="<?=$meta->title2?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Membership Banner1*</label>
                                            <input class="form-control" type="file" id="image1" name="image1" placeholder="Enter Membership Banner1" value="" >
                                            <img src="<?php echo base_url().'assets/uploads/homepage/'.$meta->banner1;?>" width="150" height="150' class="modal-logo1" alt="<?php //echo $meta->alttagimg1;?>">
                     
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            
                                            <label for="cat_name" class="col-form-label">Membership Banner2*</label>
                                            <input class="form-control" type="file" id="image2" name="image2" placeholder="Enter Membership Banner2" value="" >
                                            <img src="<?php echo base_url().'assets/uploads/homepage/'.$meta->banner2;?>"  width="150" height="150' class="modal-logo1" alt="<?php //echo $meta->alttagimg1;?>">
                                        </div>

                                    </div>



                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Top Page Label1*</label>
                                            <input class="form-control" type="text" id="label1" name="label1" placeholder="Enter Top Page label1" value="<?=$meta->label1?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Top Page Label2*</label>
                                            <input class="form-control" type="text" id="label2" name="label2" placeholder="Enter Top Page label2" value="<?=$meta->label2?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Top Page Label3*</label>
                                            <input class="form-control" type="text" id="label3" name="label3" placeholder="Enter Top Page label3" value="<?=$meta->label3?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Top Page Label4*</label>
                                            <input class="form-control" type="text" id="label4" name="label4" placeholder="Enter Top Page label4" value="<?=$meta->label4?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Top Page Label5*</label>
                                            <input class="form-control" type="text" id="label5" name="label5" placeholder="Enter Top Page label5" value="<?=$meta->label5?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Top Page Label6*</label>
                                            <input class="form-control" type="text" id="label6" name="label6" placeholder="Enter Top Page label6" value="<?=$meta->label6?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Top Page Label7*</label>
                                            <input class="form-control" type="text" id="label7" name="label7" placeholder="Enter Top Page label7" value="<?=$meta->label7?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Top Page Label8*</label>
                                            <input class="form-control" type="text" id="label8" name="label8" placeholder="Enter Top Page label8" value="<?=$meta->label8?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Top Page Image1*</label>
                                            <input class="form-control" type="file" id="image6" name="image6" placeholder="Enter Top Page Image1" value="" >
                                            <img src="<?php echo base_url().'assets/uploads/homepage/'.$meta->img1;?>" width="50" height="50' class="modal-logo1" alt="<?php //echo $meta->alttagimg1;?>">
                     
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            
                                            <label for="cat_name" class="col-form-label">Top Page Image2*</label>
                                            <input class="form-control" type="file" id="image7" name="image7" placeholder="Enter Top Page Image2" value="" >
                                            <img src="<?php echo base_url().'assets/uploads/homepage/'.$meta->img2;?>"  width="50" height="50' class="modal-logo1" alt="<?php //echo $meta->alttagimg1;?>">
                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Top Page Image3*</label>
                                            <input class="form-control" type="file" id="image8" name="image8" placeholder="Enter Top Page Image3" value="" >
                                            <img src="<?php echo base_url().'assets/uploads/homepage/'.$meta->img3;?>" width="50" height="50' class="modal-logo1" alt="<?php //echo $meta->alttagimg1;?>">
                     
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            
                                            <label for="cat_name" class="col-form-label">Top Page Image4*</label>
                                            <input class="form-control" type="file" id="image9" name="image9" placeholder="Enter Top Page Image4" value="" >
                                            <img src="<?php echo base_url().'assets/uploads/homepage/'.$meta->img4;?>"  width="50" height="50' class="modal-logo1" alt="<?php //echo $meta->alttagimg1;?>">
                                        </div>

                                    </div>




                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Home page title*</label>
                                            <input class="form-control" type="text" id="label17" name="label17" placeholder="Home page title" value="<?=$meta->label17?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Banner title*</label>
                                            <input class="form-control" type="text" id="label18" name="label18" placeholder="Banner title" value="<?=$meta->label18?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Middle Title1*</label>
                                            <input class="form-control" type="text" id="label9" name="label9" placeholder="Middle Title1" value="<?=$meta->label9?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Middle Title2*</label>
                                            <input class="form-control" type="text" id="label10" name="label10" placeholder="Middle Title2" value="<?=$meta->label10?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Middle Title3*</label>
                                            <input class="form-control" type="text" id="label11" name="label11" placeholder="Middle Title3" value="<?=$meta->label11?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Middle Title4*</label>
                                            <input class="form-control" type="text" id="label12" name="label12" placeholder="Middle Title4" value="<?=$meta->label12?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Middle Title5*</label>
                                            <input class="form-control" type="text" id="label13" name="label13" placeholder="Middle Title5" value="<?=$meta->label13?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Middle Title6*</label>
                                            <input class="form-control" type="text" id="label14" name="label14" placeholder="Middle Title6" value="<?=$meta->label14?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Middle Title7*</label>
                                            <input class="form-control" type="text" id="label15" name="label15" placeholder="Middle Title7" value="<?=$meta->label15?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Middle Title8*</label>
                                            <input class="form-control" type="text" id="label16" name="label16" placeholder="Middle Title8" value="<?=$meta->label16?>" required="required">
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Middle Image1*</label>
                                            <input class="form-control" type="file" id="image3" name="image3" placeholder="Enter Middle Image1" value="" >
                                            <img src="<?php echo base_url().'assets/uploads/homepage/'.$meta->image1;?>" width="150" height="150' class="modal-logo1" alt="<?php //echo $meta->alttagimg1;?>">
                     
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            
                                            <label for="cat_name" class="col-form-label">Middle Image2*</label>
                                            <input class="form-control" type="file" id="image4" name="image4" placeholder="Enter Middle Image2" value="" >
                                            <img src="<?php echo base_url().'assets/uploads/homepage/'.$meta->image2;?>"  width="150" height="150' class="modal-logo1" alt="<?php //echo $meta->alttagimg1;?>">
                                        </div>

                                    </div>



                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                           
                                            <label for="cat_name" class="col-form-label">Middle Image3*</label>
                                            <input class="form-control" type="file" id="image5" name="image5" placeholder="Enter Middle Image3" value="" >
                                            <img src="<?php echo base_url().'assets/uploads/homepage/'.$meta->image3;?>" width="150" height="150' class="modal-logo1" alt="<?php //echo $meta->alttagimg1;?>">
                     
                                            <!--span>After saving URL to this category will be: <?//=MAIN_SITE_URL?>category/<strong id="show_canonial_name"><?//=((!empty($categ) && isset($categ['cat_canonial_name']))? $categ['cat_canonial_name'] : '')?></strong></span-->
                                        </div>
                                        <!--div class="col-md-6 mb-3">
                                            
                                            <label for="cat_name" class="col-form-label">Middle Image2*</label>
                                            <input class="form-control" type="file" id="image6" name="image6" placeholder="Enter Middle Image2" value="" >
                                            <img src="<?php //echo base_url().'assets/uploads/homepage/'.$meta->image2;?>"  width="150" height="150' class="modal-logo1" alt="<?php //echo $meta->alttagimg1;?>">
                                        </div-->

                                    </div>








                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cat_desc" class="col-form-label">Membership description</label>
                                            <textarea class="form-control" rows="4" id="membershipdesc" name="membershipdesc" placeholder="Enter Membership description"><?=$meta->membershipdesc?></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cat_desc" class="col-form-label">About Us description1</label>
                                            <textarea class="form-control" rows="4" id="desc1" name="desc1" placeholder="Enter Home Metatag description"><?=$meta->desc1?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cat_desc" class="col-form-label">About Us description2</label>
                                            <textarea class="form-control" rows="4" id="desc2" name="desc2" placeholder="Enter About Metatag description"><?=$meta->desc2?></textarea>
                                        </div>
                                    </div>



                                    <!--div class="form-group row">
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
                                    </div-->


                                    

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php //if (($page_title == 'Add Category') || ($page_title == 'Edit Category')) { ?>
                                            <button id="saveCategorySubmit" type="submit"><?=(($page_title == 'Save ')? 'Save ' : 'Save')?><i class="ti-arrow-right"></i></button>
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