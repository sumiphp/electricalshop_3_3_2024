<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$page_title?> | <?=sitename()?></title>
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
                                <form id="manageMap">
                                    <?php $sitedetails = sitedetails(); ?>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input type="checkbox" id="google_map_show" name="google_map_show" <?=((!empty($sitedetails))? (($sitedetails['google_map_show'] == 1)? 'checked="checked"' : (($sitedetails['google_map_show'] == 2)? 'checked="checked"' : '')) : 'checked="checked"')?> >
                                            <label for="google_map_show" class="col-form-label pl-2">Yes, show the location map in frontend.</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="row col-md-12">
                                            <label for="google_map_type" class="col-form-label pl-3">How you wish to use Google Map</label>
                                        </div>
                                        <div class="col-md-4 row">
                                            <input class="form-control col-1 m-2" type="radio" name="google_map_type" <?=((!empty($sitedetails))? (($sitedetails['google_map_type'] == 0)? 'checked="checked"' : '') : 'checked="checked"')?> value="0">
                                            <label for="google_map_type" class="col-form-label col-8 pt-1">Embed Code</label>
                                        </div>
                                        <div class="col-md-4 row">
                                            <input class="form-control col-1 m-2" type="radio" name="google_map_type" <?=((!empty($sitedetails))? (($sitedetails['google_map_type'] == 1)? 'checked="checked"' : '') : 'checked="checked"')?> value="1">
                                            <label for="google_map_type" class="col-form-label col-8 pt-1">Developer Key</label>
                                        </div>
                                        <div class="col-md-4 row">
                                            <input class="form-control col-1 m-2" type="radio" name="google_map_type" <?=((!empty($sitedetails))? (($sitedetails['google_map_type'] == 2)? 'checked="checked"' : '') : 'checked="checked"')?> value="2">
                                            <label for="google_map_type" class="col-form-label col-8 pt-1">Open Google map</label>
                                        </div>
                                    </div>

                                    <div class="form-group row google_map_embed_wrap" style="<?=((!empty($sitedetails))? (($sitedetails['google_map_type'] == 0)? 'display:block;' : 'display:none;') : 'display:block;')?>">
                                        <div class="col-md-12">
                                            <label for="google_map_embed" class="col-form-label">Google Map Key*</label>
                                            <textarea class="form-control" type="text" id="google_map_embed" name="google_map_embed" placeholder="Enter Google Map Embed code" required="required"><?=((!empty($sitedetails))? $sitedetails['google_map_embed'] : '')?></textarea>
                                            <span>Embed code from <a href="https://www.google.com/maps" target="_blank">Google Map</a></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example" class="col-form-label">Example for Google Map Key in GREEN letters</label><br>
                                            &#x3C;iframe src=&#x22;https://www.google.com/maps/embed?pb=<b style="color:green;">!1m18!1m12!1m3!1d462560.3011806427!2d54.947543798608436!3d25.076381472700536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sin!4v1642934190860!5m2!1sen!2sin</b>&#x22; width=&#x22;xx&#x22; height=&#x22;xx&#x22; style=&#x22;border:x;&#x22; allowfullscreen=&#x22;xx&#x22; loading=&#x22;xx&#x22;&#x3E;&#x3C;/iframe&#x3E;
                                        </div>
                                    </div>

                                    <div class="google_map_key_wrap" style="<?=((!empty($sitedetails))? (($sitedetails['google_map_type'] == 1)? 'display:block;' : 'display:none;') : 'display:none;')?>">
                                        <div class="form-group row" >
                                            <div class="col-md-6">
                                                <label for="google_map_key" class="col-form-label">Google Map Key*</label>
                                                <input class="form-control" type="text" id="google_map_key" name="google_map_key" placeholder="Enter Google Map Key" value="<?=((!empty($sitedetails))? $sitedetails['google_map_key'] : '')?>" required="required">
                                                <span>Google Map key from <a href="https://console.cloud.google.com/projectselector2/google/maps-apis/credentials?_ga=2.16029750.1814799463.1642932775-1748184147.1642696907&pli=1" target="_blank">Developer Console</a></span>
                                            </div>
                                        <!-- </div>
                                        <div class="form-group row"> -->
                                            <div class="col-md-3">
                                                <label for="google_map_latitude" class="col-form-label">Latitude*</label>
                                                <input class="form-control emailValidation" type="text" id="google_map_latitude" name="google_map_latitude" placeholder="Enter Latitude" value="<?=((!empty($sitedetails))? $sitedetails['google_map_latitude'] : '')?>" required="required">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="google_map_longitude" class="col-form-label">Longitude*</label>
                                                <input class="form-control" type="text" id="google_map_longitude" name="google_map_longitude" placeholder="Enter Longitude" value="<?=((!empty($sitedetails))? $sitedetails['google_map_longitude'] : '')?>" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="google_map_marker" class="col-form-label ml-3">Map marker</label>
                                            <div class="form-group col-md-12 row">
                                            <div class="input-group col-md-10">
                                                <div class="dropzone" id="fileDropZone1" style="width:100%"></div>
                                                <input type="hidden" name="google_map_marker" id="google_map_marker" value="<?=((!empty($sitedetails) && (file_exists(FCPATH.'assets/uploads/site/'.$sitedetails['google_map_marker_name'])))? $sitedetails['google_map_marker_name'] : 'map-marker.png')?>">
                                            </div>
                                            <div class="input-group col-md-2">
                                                <?php if (trim($sitedetails['google_map_marker_name']) != '') {
                                                    if (file_exists(FCPATH.'assets/uploads/site/'.$sitedetails['google_map_marker_name'])) { ?>
                                                        <img src="<?=site_url().'assets/uploads/site/'.$sitedetails['google_map_marker_name']?>" alt="<?=sitename()?>" style="width: 100px;border-radius: 50%;">
                                                    <?php } else { ?>
                                                        <img src="<?=site_url().'assets/img/icons/map-marker.png'?>" alt="<?=sitename()?>" style="width: 50px; height:50px; margin:10%;">
                                                    <?php }
                                                } ?>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row google_map_share_wrap" style="<?=((!empty($sitedetails))? (($sitedetails['google_map_type'] == 2)? 'display:block;' : 'display:none;') : 'display:block;')?>">
                                        <div class="col-md-12">
                                            <label for="google_map_share_code" class="col-form-label">Google Map Shareable Short Code*</label>
                                            <input class="form-control" type="text" id="google_map_share_code" name="google_map_share_code" placeholder="Enter Google Map Shareable code" required="required" value="<?=((!empty($sitedetails))? $sitedetails['google_map_share_code'] : '')?>">
                                            <span>Map sharable code from <a href="https://www.google.com/maps" target="_blank">Google Map</a></span>
                                        </div>
                                    </div>

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <button id="saveMap" type="submit">Save<i class="ti-arrow-right"></i></button>
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
    <script src="<?=site_url()?>assets/js/acp/map.js"></script>
    <script type="text/javascript">
        $(function() {
            Map.init();
        });
    </script>
</body>

</html>