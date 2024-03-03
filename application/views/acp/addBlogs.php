<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$page_title?> | ACP | <?=sitename()?></title>
    <?php $this->load->view('acp/includes/header-assets', array('page_title' => 'Editor & Dropzone')); ?>
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
                                <form id="manageBlogs">
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <input type="hidden" id="blog_id" name="blog_id" value="<?=((!empty($blog))? $blog['blog_id'] : '')?>">
                                            <input type="hidden" id="blog_canonial_name" name="blog_canonial_name" value="<?=((!empty($blog))? $blog['blog_canonial_name'] : '')?>">
                                            <label for="blog_name" class="col-form-label">Blog Title*</label>
                                            <input class="form-control" type="text" id="blog_name" placeholder="Enter Blog Title" value="<?=((!empty($blog))? $blog['blog_name'] : '')?>" required="required">
                                            <span>After publishing URL to this blog will be: <?=site_url()?>Blog/detail/<strong id="show_canonial_name"><?=((!empty($blog))? $blog['blog_canonial_name'] : '')?></strong></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="blog_subject" class="col-form-label">Blog Subject*</label>
                                            <input class="form-control" type="text" id="blog_subject" placeholder="Enter Blog Subject" value="<?=((!empty($blog))? $blog['blog_subject'] : '')?>" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="blogContent" class="col-form-label">Blog Content*</label>
                                            <div id="blogContent"><?=((!empty($blog))? html_entity_decode($blog['blog_content']) : '')?></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label for="featuredimage" class="col-form-label ml-3">Featured Image*</label>
                                            <div class="form-group row">
                                                <?php if (isset($blog['Images']) && !empty($blog['Images'])) {
                                                    foreach ($blog['Images'] as $pikey => $pivalue) {
                                                        $blogImg[$pikey]['blog_img_id'] = $pivalue['blog_img_id'];
                                                        $blogImg[$pikey]['blog_img_image'] = $pivalue['blog_img_image'];
                                                        $blogImg[$pikey]['blog_img_description'] = nl2br($pivalue['blog_img_description']);
                                                    }
                                                } ?>

                                                <div class="col-md-12 card-body">
                                                    <div class="dropzone" id="fileDropZone1" style="<?=((($page_title == 'Add Blog') || ($page_title == 'Edit Blog'))? '' : 'display:none;')?>">
                                                    </div>
                                                    <input type="hidden" id="blog_featured_image" name="blog_featured_image" value="<?=((isset($blog['blog_featured_image']) && !empty($blog['blog_featured_image']))? $blog['blog_featured_image'] : '')?>">

                                                    <div class="dropzoneDetailed" id="dropzoneDetailed">
                                                        <?php 
                                                        $imgs = '';
                                                        if (!empty($blogImg)) { 
                                                            foreach ($blogImg as $key => $img) { ?>
                                                                <div id="imageDesc_<?=(str_replace('.', '_', $img['blog_img_image']))?>" class="blogimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img class="<?=(((isset($blog['blog_featured_image'])) && ($img['blog_img_image'] == $blog['blog_featured_image']))? 'btn-success' : '')?>" src="<?=site_url()?>assets/uploads/blogs/<?=$img['blog_img_image']?>" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;"></div><div class="col-11 pimgdesc"><div class="for"><div class="col-md-12 mt-s3 cdard-body"><textarea class="form-control" id="pimgdesc_<?=(str_replace('.', '_', $img['blog_img_image']))?>" name="pimgdesc[]" placeholder="Enter image description"><?=nl2br($img['blog_img_description'])?></textarea></div></div></div></div>
                                                            <?php 
                                                            $imgs .= '~'.$img['blog_img_image'].'~,';
                                                            }
                                                        } ?>
                                                        <input type="hidden" name="blogImages" id="blogImages" value="<?=$imgs?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input type="checkbox" id="blog_notify" name="blog_notify" <?=((!empty($blog))? (($blog['blog_notify'] == 1)? 'checked="checked"' : '') : 'checked="checked"')?> <?=(($page_title == 'View Blog')? 'disabled' :'' )?> >
                                            <label for="blog_notify" class="col-form-label pl-2">Yes, send notification to customers who opted-in.</label>
                                        </div>
                                    </div>
                                    
                                    <?php if (($page_title == 'Add Blog') || ($page_title == 'Edit Blog')) { ?>
                                        <div class="submit-btn-areaX" style="width:30%;float:right;">
                                            <div class="form-group row">
                                                <div class="col-md-6 mb-3">
                                                    <button id="saveBlogSubmit" class="btn btn-rounded btn-primary draftBlog" type="button">DRAFT<i class="ti-save ml-3"></i></button>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <button id="saveBlogSubmit" class="btn btn-rounded btn-success publishBlog" type="button">PUBLISH BLOG<i class="ti-arrow-right ml-3"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="submit-btn-areaX" style="width:15%;float:right;">
                                            <a class="btn btn-rounded btn-dark mt-3" href="javascript:history.back()" role="button">GO BACK <i class="ti-arrow-right"></i></a>
                                        </div>
                                    <?php } ?>
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

    <?php $this->load->view('acp/includes/footer-assets', array('page_title' => 'Editor & Dropzone', 'breadcrum' => $page_breadcrumb)); ?>

    <!-- custom js files -->
    <script src="<?=site_url()?>assets/js/acp/blogs.js?blast=<?=strtotime(mysql_datetime())?>"></script>

    <script type="text/javascript">
        <?php if ($page_title == 'View Blog') { ?>
            $(function() {
                $("#manageBlogs :input").prop("disabled", true);
                $("#manageBlogs :textarea").prop("disabled", true);
            });
        <?php } else { ?>
            $(function() {
                Blogs.initEditor();
                Blogs.manageBlog();
            });
        <?php } ?>
    </script>
</body>

</html>