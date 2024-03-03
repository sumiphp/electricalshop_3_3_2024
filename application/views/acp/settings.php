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
                                $setgDtl = array();
                                if (isset($settings) && !empty($settings)) {
                                    $setgDtl = array(
                                        'site_id' => $settings['site_id'],
                                        'site_name' => $settings['site_name'],
                                        'site_short_name' => $settings['site_short_name'],
                                        'site_description' => $settings['site_description'],
                                        'site_currency_id' => $settings['site_currency_id'],

                                        'site_address_line1' => $settings['site_address_line1'],
                                        'site_address_line2' => $settings['site_address_line2'],
                                        'site_city' => $settings['site_city'],
                                        'site_state' => $settings['site_state'],
                                        'site_country' => $settings['site_country'],
                                        'site_pin' => $settings['site_pin'],

                                        'site_logo' => $settings['site_logo'],
                                        'site_mobile_logo' => $settings['site_mobile_logo'],
                                        'site_favicon' => $settings['site_favicon'],

                                        'site_email1_type' => $settings['site_email1_type'],
                                        'site_email1_id' => $settings['site_email1_id'],
                                        'site_email2_type' => $settings['site_email2_type'],
                                        'site_email2_id' => $settings['site_email2_id'],
                                        'site_mailfrom_id' => $settings['site_mailfrom_id'],
                                        'site_mailto_id' => $settings['site_mailto_id'],
                                        'site_replyto_id' => $settings['site_replyto_id'],

                                        'site_contact_note' => $settings['site_contact_note'],
                                        'site_phone1_type' => $settings['site_phone1_type'],
                                        'site_phone1_num' => $settings['site_phone1_num'],
                                        'site_phone2_type' => $settings['site_phone2_type'],
                                        'site_phone2_num' => $settings['site_phone2_num'],
                                        'site_phone3_type' => $settings['site_phone3_type'],
                                        'site_phone3_num' => $settings['site_phone3_num'],

                                        'site_has_fb' => $settings['site_has_fb'],
                                        'site_fb_url' => $settings['site_fb_url'],
                                        'site_has_twitter' => $settings['site_has_twitter'],
                                        'site_twitter_url' => $settings['site_twitter_url'],
                                        'site_has_insta' => $settings['site_has_insta'],
                                        'site_insta_url' => $settings['site_insta_url'],
                                        'site_has_youtube' => $settings['site_has_youtube'],
                                        'site_youtube_url' => $settings['site_youtube_url'],
                                        'site_has_whatsapp' => $settings['site_has_whatsapp'],
                                        'site_whatsapp_number' => $settings['site_whatsapp_number'],
                                        'site_linkldn' => $settings['site_linkldn'],
                                        'site_has_linkldn' => $settings['site_has_linkldn'],

                                        'site_working_time' => html_entity_decode($settings['site_working_time']),

                                        'site_meta_tags' => html_entity_decode($settings['site_meta_tags']),
                                        'site_ga_code' => html_entity_decode($settings['site_ga_code']),
                                        'site_header_assets' => html_entity_decode($settings['site_header_assets']),
                                        'site_footer_assets' => html_entity_decode($settings['site_footer_assets']),

                                        'site_created_date' => $settings['site_created_date'],
                                        'site_updated_date' => $settings['site_updated_date'],

                                    );
                                } ?>
                                <form id="manageSettings">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="accordion4" class="according accordion-s3 gradiant-bg">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse" href="#accordion41">Site Primary Info</a>
                                                    </div>
                                                    <div id="accordion41" class="collapse show" data-parent="#accordion4">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <input type="hidden" id="site_id" name="site_id" value="<?=((!empty($setgDtl) && isset($setgDtl['site_id']))? $setgDtl['site_id'] : '')?>">
                                                                    <label for="site_name" class="col-form-label">Site Name*</label>
                                                                    <input class="form-control" type="text" id="site_name" name="site_name" placeholder="Enter Site Name" value="<?=((!empty($setgDtl) && isset($setgDtl['site_name']))? $setgDtl['site_name'] : '')?>" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_short_name" class="col-form-label">Site Short Name (for page title)</label>
                                                                    <input class="form-control" type="text" id="site_short_name" name="site_short_name" placeholder="Enter Site Name" value="<?=((!empty($setgDtl) && isset($setgDtl['site_short_name']))? $setgDtl['site_short_name'] : '')?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_description" class="col-form-label">Site description*</label>
                                                                    <textarea class="form-control" rows="8" id="site_description" name="site_description" placeholder="Enter Site description" required="required"><?=((!empty($setgDtl) && isset($setgDtl['site_description']))? $setgDtl['site_description'] : '')?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row" id="currency">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_currency" class="col-form-label">Site currency*</label>
                                                                    <select class="form-control" id="site_currency_id" name="site_currency_id" required="required">
                                                                        <option value="">Select a currency</option>
                                                                        <?php foreach ($available_currency as $currency) { ?>
                                                                            <option value="<?=$currency['currency_id']?>" <?=(($currency['currency_id'] == ((!empty($setgDtl) && isset($setgDtl['site_currency_id']))? $setgDtl['site_currency_id'] : '0'))? 'selected' : '')?>><?=$currency['country_name'].' - '.$currency['currency_name'].' ('.$currency['currency'].')'?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <?php if (!empty($setgDtl) && isset($setgDtl['site_created_date']) && (trim($setgDtl['site_created_date'] != ''))) { ?>
                                                                <div class="form-control-feedback">Site Created On: <?=converttoUserTZ($setgDtl['site_created_date'])?></div>
                                                            <?php }
                                                            if (!empty($setgDtl) && isset($setgDtl['site_updated_date']) && (trim($setgDtl['site_updated_date'] != ''))) { ?>
                                                                <div class="form-control-feedback">Site Last Update On: <?=converttoUserTZ($setgDtl['site_updated_date'])?></div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion42">Site Address Info</a>
                                                    </div>
                                                    <div id="accordion42" class="collapse" data-parent="#accordion4">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_address_line1" class="col-form-label">Address Line 1*</label>
                                                                    <input class="form-control" type="text" id="site_address_line1" name="site_address_line1" placeholder="Enter Site Address Line 1" value="<?=((!empty($setgDtl) && isset($setgDtl['site_address_line1']))? $setgDtl['site_address_line1'] : '')?>" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_address_line2" class="col-form-label">Address Line 2*</label>
                                                                    <input class="form-control" type="text" id="site_address_line2" name="site_address_line2" placeholder="Enter Site Address Line 2" value="<?=((!empty($setgDtl) && isset($setgDtl['site_address_line2']))? $setgDtl['site_address_line2'] : '')?>" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_country" class="col-form-label">Country*</label>
                                                                    <select class="form-control select2" id="site_country" name="site_country" placeholder="Enter Site Country Name" required="required">
                                                                        <option value="0">Select Country</option>
                                                                        <?php
                                                                        foreach ($countries as $key => $value) { ?>
                                                                            <option <?=(($value['country_id'] == ((!empty($setgDtl) && isset($setgDtl['site_country']))? $setgDtl['site_country'] : '0'))? 'selected' : '')?> value="<?=$value['country_id']?>"><?=$value['country_name'].' ('.$value['country_code'].')'?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_state" class="col-form-label">State/Province*</label>
                                                                    <select class="form-control select2" id="site_state" name="site_state" placeholder="Enter Site State/Province Name" required="required">
                                                                        <option value="0">Select State/Provice</option>
                                                                        <?php
                                                                        foreach ($provinces as $key => $value) { ?>
                                                                            <option <?=(($value['province_id'] == ((!empty($setgDtl) && isset($setgDtl['site_state']))? $setgDtl['site_state'] : '0'))? 'selected' : '')?> value="<?=$value['province_id']?>"><?=$value['province_name'].' ('.$value['province_code'].')'?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_city" class="col-form-label">City*</label>
                                                                    <input class="form-control" type="text" id="site_city" name="site_city" placeholder="Enter Site City Name" value="<?=((!empty($setgDtl) && isset($setgDtl['site_city']))? $setgDtl['site_city'] : '')?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_pin" class="col-form-label">Zip Code*</label>
                                                                    <input class="form-control" type="text" id="site_pin" name="site_pin" placeholder="Enter Site Zip Code" value="<?=((!empty($setgDtl) && isset($setgDtl['site_pin']))? $setgDtl['site_pin'] : '')?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion43">Site Logo & Favicon</a>
                                                    </div>
                                                    <div id="accordion43" class="collapse" data-parent="#accordion4">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3 card-body">
                                                                    <div class="dropzone" id="fileDropZone1">
                                                                    </div>
                                                                    <input type="hidden" id="site_logo" name="site_logo" value="<?=((isset($setgDtl['site_logo']) && !empty($setgDtl['site_logo']))? $setgDtl['site_logo'] : '')?>">
                                                                </div>
                                                            </div>
                                                            <div class="dropzoneDetailed1" id="dropzoneDetailed1">
                                                                <?php
                                                                if (isset($setgDtl['site_logo']) && !empty($setgDtl['site_logo']) && file_exists(FCPATH.'assets/uploads/site/'.$setgDtl['site_logo'])) { ?>
                                                                    <div id="imageDesc_<?=(str_replace('.', '_', $setgDtl['site_logo']))?>" class="prodimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img class="" src="<?=site_url()?>assets/uploads/site/<?=$setgDtl['site_logo']?>" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;background-color:#bbb"></div><div class="col-10 pt-3 pl-4">Site Logo (360x160px)</div></div>
                                                                <?php } else {
                                                                    echo "No image added as Site Logo yet.";
                                                                } ?>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3 card-body">
                                                                    <div class="dropzone" id="fileDropZone3">
                                                                    </div>
                                                                    <input type="hidden" id="site_mobile_logo" name="site_mobile_logo" value="<?=((isset($setgDtl['site_mobile_logo']) && !empty($setgDtl['site_mobile_logo']))? $setgDtl['site_mobile_logo'] : '')?>">
                                                                </div>
                                                            </div>
                                                            <div class="dropzoneDetailed3" id="dropzoneDetailed3">
                                                                <?php
                                                                if (isset($setgDtl['site_mobile_logo']) && !empty($setgDtl['site_mobile_logo']) && file_exists(FCPATH.'assets/uploads/site/'.$setgDtl['site_mobile_logo'])) { ?>
                                                                    <div id="imageDesc_<?=(str_replace('.', '_', $setgDtl['site_mobile_logo']))?>" class="prodimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img class="" src="<?=site_url()?>assets/uploads/site/<?=$setgDtl['site_mobile_logo']?>" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;background-color:#bbb"></div><div class="col-10 pt-3 pl-4">Site Logo for Mobile (200x60px)</div></div>
                                                                <?php } else {
                                                                    echo "No image added as Site Logo for mobile screen yet.";
                                                                } ?>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3 card-body">
                                                                    <div class="dropzone" id="fileDropZone2">
                                                                    </div>
                                                                    <input type="hidden" id="site_favicon" name="site_favicon" value="<?=((isset($setgDtl['site_favicon']) && !empty($setgDtl['site_favicon']))? $setgDtl['site_favicon'] : '')?>">
                                                                </div>
                                                            </div>
                                                            <div class="dropzoneDetailed2" id="dropzoneDetailed2">
                                                                <?php if (isset($setgDtl['site_favicon']) && !empty($setgDtl['site_favicon']) && file_exists(FCPATH.'assets/uploads/site/'.$setgDtl['site_favicon'])) { ?>
                                                                    <div id="imageDesc_<?=(str_replace('.', '_', $setgDtl['site_favicon']))?>" class="prodimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img class="" src="<?=site_url()?>assets/uploads/site/<?=$setgDtl['site_favicon']?>" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;background-color:#bbb"></div><div class="col-10 pt-3 pl-4">Site Logo for browser tab (16x16px)</div></div>
                                                                <?php } else {
                                                                    echo "No image added as Site Logo for browser tab.";
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion44">Site Emails</a>
                                                    </div>
                                                    <div id="accordion44" class="collapse" data-parent="#accordion4">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_email1_type" class="col-form-label">Site Primary Email*</label>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-4">
                                                                            <input class="form-control" type="text" id="site_email1_type" name="site_email1_type" placeholder="Enter email type" value="<?=((!empty($setgDtl) && isset($setgDtl['site_email1_type']))? $setgDtl['site_email1_type'] : '')?>" disabled required="required">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input class="form-control" type="text" id="site_email1_id" name="site_email1_id" placeholder="Enter primary email address" value="<?=((!empty($setgDtl) && isset($setgDtl['site_email1_id']))? $setgDtl['site_email1_id'] : '')?>" required="required">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_email2_type" class="col-form-label">Site Secondry Email</label>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-4">
                                                                            <input class="form-control" type="text" id="site_email2_type" name="site_email2_type" placeholder="Enter email type" value="<?=((!empty($setgDtl) && isset($setgDtl['site_email2_type']))? $setgDtl['site_email2_type'] : '')?>">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input class="form-control" type="text" id="site_email2_id" name="site_email2_id" placeholder="Enter secondry email address" value="<?=((!empty($setgDtl) && isset($setgDtl['site_email2_id']))? $setgDtl['site_email2_id'] : '')?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-4 mb-3">
                                                                    <label for="site_mailfrom_id" class="col-form-label">Email FROM ID</label>
                                                                    <input class="form-control emailValidation" type="text" id="site_mailfrom_id" name="site_mailfrom_id" placeholder="Enter email FROM address" value="<?=((!empty($setgDtl) && isset($setgDtl['site_mailfrom_id']))? $setgDtl['site_mailfrom_id'] : '')?>">
                                                                </div>

                                                                <div class="col-md-4 mb-3">
                                                                    <label for="site_mailto_id" class="col-form-label">Email TO ID</label>
                                                                    <input class="form-control emailValidation" type="text" id="site_mailto_id" name="site_mailto_id" placeholder="Enter email TO address" value="<?=((!empty($setgDtl) && isset($setgDtl['site_mailto_id']))? $setgDtl['site_mailto_id'] : '')?>">
                                                                </div>

                                                                <div class="col-md-4 mb-3">
                                                                    <label for="site_replyto_id" class="col-form-label">Email REPLY-TO ID</label>
                                                                    <input class="form-control emailValidation" type="text" id="site_replyto_id" name="site_replyto_id" placeholder="Enter email REPLY-TO address" value="<?=((!empty($setgDtl) && isset($setgDtl['site_replyto_id']))? $setgDtl['site_replyto_id'] : '')?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion45">Site Contact Numbers</a>
                                                    </div>
                                                    <div id="accordion45" class="collapse" data-parent="#accordion4">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_phone1_type" class="col-form-label">Site Primary Contact Number*</label>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-4">
                                                                            <input class="form-control" type="text" id="site_phone1_type" name="site_phone1_type" placeholder="Enter contact number type" value="<?=((!empty($setgDtl) && isset($setgDtl['site_phone1_type']))? $setgDtl['site_phone1_type'] : '')?>" disabled required="required">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input class="form-control" type="text" id="site_phone1_num" name="site_phone1_num" placeholder="Enter contact number" value="<?=((!empty($setgDtl) && isset($setgDtl['site_phone1_num']))? $setgDtl['site_phone1_num'] : '')?>" required="required">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_phone2_type" class="col-form-label">Site Contact Number 2</label>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-4">
                                                                            <input class="form-control" type="text" id="site_phone2_type" name="site_phone2_type" placeholder="Enter contact number type" value="<?=((!empty($setgDtl) && isset($setgDtl['site_phone2_type']))? $setgDtl['site_phone2_type'] : '')?>">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input class="form-control" type="text" id="site_phone2_num" name="site_phone2_num" placeholder="Enter contact number" value="<?=((!empty($setgDtl) && isset($setgDtl['site_phone2_num']))? $setgDtl['site_phone2_num'] : '')?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_phone3_type" class="col-form-label">Site Contact Number 3</label>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-4">
                                                                            <input class="form-control" type="text" id="site_phone3_type" name="site_phone3_type" placeholder="Enter contact number type" value="<?=((!empty($setgDtl) && isset($setgDtl['site_phone3_type']))? $setgDtl['site_phone3_type'] : '')?>">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input class="form-control" type="text" id="site_phone3_num" name="site_phone3_num" placeholder="Enter contact number" value="<?=((!empty($setgDtl) && isset($setgDtl['site_phone3_num']))? $setgDtl['site_phone3_num'] : '')?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_contact_note" class="col-form-label">Contact Us Note</label>
                                                                    <textarea class="form-control" rows="8" id="site_contact_note" name="site_contact_note" placeholder="Enter a simple note for Contact US form"><?=((!empty($setgDtl) && isset($setgDtl['site_contact_note']))? $setgDtl['site_contact_note'] : '')?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion46">Social Media links</a>
                                                    </div>
                                                    <div id="accordion46" class="collapse" data-parent="#accordion4">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-md-10 mb-3">
                                                                    <label for="site_fb_url" class="col-form-label">Facebook</label>
                                                                    <input class="form-control" type="text" id="site_fb_url" name="site_fb_url" placeholder="Enter Site related Facebook URL" value="<?=((!empty($setgDtl) && isset($setgDtl['site_fb_url']))? $setgDtl['site_fb_url'] : '')?>">
                                                                </div>
                                                                <div class="col-md-2 mt-5">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" <?=((empty($setgDtl) || (!empty($setgDtl) && isset($setgDtl['site_has_fb']) && ($setgDtl['site_has_fb'] == 1)))? 'checked' : '')?> class="custom-control-input" id="site_has_fb" name="site_has_fb">
                                                                        <label class="custom-control-label" for="site_has_fb">Enable Facebook URL</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-10 mb-3">
                                                                    <label for="site_twitter_url" class="col-form-label">Twitter</label>
                                                                    <input class="form-control" type="text" id="site_twitter_url" name="site_twitter_url" placeholder="Enter Site related Twitter URL" value="<?=((!empty($setgDtl) && isset($setgDtl['site_twitter_url']))? $setgDtl['site_twitter_url'] : '')?>">
                                                                </div>
                                                                <div class="col-md-2 mt-5">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" <?=((empty($setgDtl) || (!empty($setgDtl) && isset($setgDtl['site_has_twitter']) && ($setgDtl['site_has_twitter'] == 1)))? 'checked' : '')?> class="custom-control-input" id="site_has_twitter" name="site_has_twitter">
                                                                        <label class="custom-control-label" for="site_has_twitter">Enable Twitter URL</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-10 mb-3">
                                                                    <label for="site_insta_url" class="col-form-label">Instagram</label>
                                                                    <input class="form-control" type="text" id="site_insta_url" name="site_insta_url" placeholder="Enter Site related Instagram URL" value="<?=((!empty($setgDtl) && isset($setgDtl['site_insta_url']))? $setgDtl['site_insta_url'] : '')?>">
                                                                </div>
                                                                <div class="col-md-2 mt-5">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" <?=((empty($setgDtl) || (!empty($setgDtl) && isset($setgDtl['site_has_insta']) && ($setgDtl['site_has_insta'] == 1)))? 'checked' : '')?> class="custom-control-input" id="site_has_insta" name="site_has_insta">
                                                                        <label class="custom-control-label" for="site_has_insta">Enable Insta URL</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-10 mb-3">
                                                                    <label for="site_linkldn" class="col-form-label">LinkedIn</label>
                                                                    <input class="form-control" type="text" id="site_linkldn" name="site_linkldn" placeholder="Enter Site related LinkedIn URL" value="<?=((!empty($setgDtl) && isset($setgDtl['site_linkldn']))? $setgDtl['site_linkldn'] : '')?>">
                                                                </div>
                                                                <div class="col-md-2 mt-5">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" <?=((empty($setgDtl) || (!empty($setgDtl) && isset($setgDtl['site_has_linkldn']) && ($setgDtl['site_has_linkldn'] == 1)))? 'checked' : '')?> class="custom-control-input" id="site_has_linkldn" name="site_has_linkldn">
                                                                        <label class="custom-control-label" for="site_has_linkldn">Enable LinkedIn URL</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-md-10 mb-3">
                                                                    <label for="site_whatsapp_number" class="col-form-label">Whatsapp Number</label>
                                                                    <input class="form-control" type="text" id="site_whatsapp_number" name="site_whatsapp_number" placeholder="Enter Site related Whatsapp Number" value="<?=((!empty($setgDtl) && isset($setgDtl['site_whatsapp_number']))? $setgDtl['site_whatsapp_number'] : '')?>">
                                                                    <span style="font-size:12px;">Full phone number in international format. Omit any zeroes, brackets, or dashes when adding the phone number in international format.</span>
                                                                </div>
                                                                <div class="col-md-2 mt-5">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" <?=((empty($setgDtl) || (!empty($setgDtl) && isset($setgDtl['site_has_whatsapp']) && ($setgDtl['site_has_whatsapp'] == 1)))? 'checked' : '')?> class="custom-control-input" id="site_has_whatsapp" name="site_has_whatsapp">
                                                                        <label class="custom-control-label" for="site_has_whatsapp">Enable Whatsapp</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion50">Office Working Days & Time</a>
                                                    </div>
                                                    <div id="accordion50" class="collapse" data-parent="#accordion4">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_working_time" class="col-form-label">Office Working Days & Time</label>
                                                                    <textarea class="form-control" rows="8" id="site_working_time" name="site_working_time" placeholder="Enter Office Working Days & Time"><?=((!empty($setgDtl) && isset($setgDtl['site_working_time']))? $setgDtl['site_working_time'] : '')?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion47">SEO Meta Tags</a>
                                                    </div>
                                                    <div id="accordion47" class="collapse" data-parent="#accordion4">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_meta_tags" class="col-form-label">Meta Tags for Site</label>
                                                                    <textarea class="form-control" rows="8" id="site_meta_tags" name="site_meta_tags" placeholder="Enter Meta Tags for Site"><?=((!empty($setgDtl) && isset($setgDtl['site_meta_tags']))? $setgDtl['site_meta_tags'] : '')?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion48">Google Analytics code</a>
                                                    </div>
                                                    <div id="accordion48" class="collapse" data-parent="#accordion4">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_ga_code" class="col-form-label">Google Analytics code for Site</label>
                                                                    <textarea class="form-control" rows="8" id="site_ga_code" name="site_ga_code" placeholder="Enter Google Analytics code"><?=((!empty($setgDtl) && isset($setgDtl['site_ga_code']))? $setgDtl['site_ga_code'] : '')?></textarea>

                                                                    <?php if (empty($setgDtl) || (!empty($setgDtl) && isset($setgDtl['site_ga_code']) && (trim($setgDtl['site_ga_code'] == '')))) { ?>
                                                                        <div class="form-control-feedback">Do not have a Google Analytic Code? <a href="https://analytics.google.com/analytics/web/provision/#/provision/create" target="new">Create a Code now</a></div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion49">Extra assets for Style & JS</a>
                                                    </div>
                                                    <div id="accordion49" class="collapse" data-parent="#accordion4">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_header_assets" class="col-form-label">Assets in site header section (like CSS)</label>
                                                                    <textarea class="form-control" rows="8" id="site_header_assets" name="site_header_assets" placeholder="Enter assets in site header section"><?=((!empty($setgDtl) && isset($setgDtl['site_header_assets']))? $setgDtl['site_header_assets'] : '')?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="site_footer_assets" class="col-form-label">Assets in site footer section (like JS)</label>
                                                                    <textarea class="form-control" rows="8" id="site_footer_assets" name="site_footer_assets" placeholder="Enter assets in site footer section"><?=((!empty($setgDtl) && isset($setgDtl['site_footer_assets']))? $setgDtl['site_footer_assets'] : '')?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <button id="saveSiteSubmit" type="submit"><?=((!empty($setgDtl) && isset($setgDtl['site_id']))? 'Update' : 'Save')?> Settings<i class="ti-arrow-right"></i></button>
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
    <script src="<?=site_url()?>assets/js/acp/settings.js?blast=<?=strtotime(mysql_datetime())?>"></script>
    <script type="text/javascript">
        $(function() {
            Settings.init();
        });
    </script>
</body>

</html>