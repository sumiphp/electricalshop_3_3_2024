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
                                <form id="manageUser">
                                    <input type="hidden" id="sid" name="sid" value="<?=((!empty($staff))? $staff['user_id'] : '')?>">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="firstname" class="col-form-label">First name*</label>
                                            <input class="form-control" type="text" id="firstname" name="firstname" placeholder="First name" value="<?=((!empty($staff))? $staff['user_firstname'] : '')?>" required="required">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lastname" class="col-form-label">Last name</label>
                                            <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Last name" value="<?=((!empty($staff))? $staff['user_lastname'] : '')?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="userRole" class="col-form-label">Staff Role*</label>
                                            <select class="form-control" id="userRole" name="userRole" required="required" style="height:43px;">
                                                <option value="0">Select Staff Role</option>
                                                <?php 
                                                $loggedInUser = loggedInUser();
                                                foreach ($roles as $role) { ?>
                                                    <option <?=(($loggedInUser['user_role'] != 2 && $role['role_id'] == 2) ? 'disabled' : '')?> value="<?=$role['role_id']?>" <?=((!empty($staff) && ($role['role_id'] == $staff['user_role']))? 'selected="selected"' : '')?>><?=$role['role_name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="primaryemail" class="col-form-label">Primary Email (also used as username for login)*</label>
                                            <input class="form-control emailValidation" type="text" id="primaryemail" name="primaryemail" placeholder="Primary Email" value="<?=((!empty($staff))? $staff['user_primary_email'] : '')?>" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="newpswrd" class="col-form-label">Login Password</label>
                                            <input class="form-control passwordValidation" type="password" id="newpswrd" name="newpswrd" placeholder="Enter password or you can leave this field empty to continue without updating password" value="">
                                            <span>
                                                <i class="ti-info-alt mr-2"></i>Leave this field empty to continue without updating password.<br>
                                                Password must contain minimum 8 characters and allowed: A-Z, a-z, 0-9 & special characters.
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staffavatar" class="col-form-label ml-3">Staff Photo</label>
                                        <div class="input-group col-md-12">
                                            <?php if ($page_title != 'View Staff') { ?>
                                                <div class="dropzone" id="fileDropZone1" style="<?=((($page_title == 'Add Staff') || ($page_title == 'Edit Staff'))? 'width:100%;' : 'display:none;')?>"></div>
                                                <input type="hidden" name="staffImg" id="staffImg" value="<?=((!empty($staff))? $staff['user_avatar'] : '')?>">
                                            <?php } else {
                                                if (file_exists(FCPATH.'assets/uploads/users/'.$staff['user_avatar'])) { ?>
                                                    <img src="<?=site_url().'assets/uploads/users/'.$staff['user_avatar']?>" alt="<?=((!empty($staff))? $staff['user_firstname'] : '')?>" style="width: 100px;border-radius: 50%;">
                                                <?php } else if (file_exists(FCPATH.'assets/img/author/'.trim($staff['user_avatar']))) { ?>
                                                    <img src="<?=site_url().'assets/img/author/'.$staff['user_avatar']?>" alt="<?=((!empty($staff))? $staff['user_firstname'] : '')?>" style="width: 100px;border-radius: 50%;">
                                                <?php } else { ?>
                                                    <img src="<?=site_url()?>assets/img/author/avatar.png" alt="<?=((!empty($staff))? $staff['user_firstname'] : '')?>" style="width: 100px;border-radius: 50%;">
                                                <?php }
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="emailtype2" class="col-form-label">Secondry Email Type</label>
                                            <input class="form-control" type="text" id="emailtype2" name="emailtype2" placeholder="Secondry Email Type" value="<?=((!empty($staff))? $staff['user_email2_type'] : 'Secondry')?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="emailid2" class="col-form-label">Secondry Email</label>
                                            <input class="form-control emailValidation" type="text" id="emailid2" name="emailid2" placeholder="Secondry Email" value="<?=((!empty($staff))? $staff['user_email2_id'] : '')?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label for="phonetype1" class="col-form-label">Primary Phone Type</label>
                                            <input class="form-control" type="text" id="phonetype1" name="phonetype1" placeholder="Primary Phone Type" value="<?=((!empty($staff))? $staff['user_phone1_type'] : 'Primary')?>" required="required">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phonenum1" class="col-form-label">Primary Phone Number*</label>
                                            <input class="form-control phoneValidation" type="text" id="phonenum1" name="phonenum1" placeholder="Primary Phone Number" value="<?=((!empty($staff))? $staff['user_primary_phone'] : '')?>" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label for="phonetype2" class="col-form-label">Secondry Phone Type</label>
                                            <input class="form-control" type="text" id="phonetype2" name="phonetype2" placeholder="Secondry Phone Type" value="<?=((!empty($staff))? $staff['user_phone2_type'] : 'Secondry')?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label for="phonenum2" class="col-form-label">Secondry Phone Number</label>
                                            <input class="form-control phoneValidation" type="text" id="phonenum2" name="phonenum2" placeholder="Secondry Phone Number" value="<?=((!empty($staff))? $staff['user_phone2_number'] : '')?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="addressline1" class="col-form-label">Address Line 1</label>
                                            <input class="form-control" type="text" id="addressline1" name="addressline1" placeholder="Address Line 1" value="<?=((!empty($staff))? $staff['user_address_line1'] : '')?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="addressline2" class="col-form-label">Address Line 2</label>
                                            <input class="form-control" type="text" id="addressline2" name="addressline2" placeholder="Address Line 2" value="<?=((!empty($staff))? $staff['user_address_line2'] : '')?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="country" class="col-form-label">Country</label>
                                            <select class="form-control" id="country" name="country" class="select2" style="height:43px;">
                                                <option value="0" selected="selected">Select Country</option>
                                                <?php $countrieslist = getCountry();
                                                foreach ($countrieslist as $country) { ?>
                                                    <option value="<?=$country['country_id']?>" <?=((!empty($staff) && ($staff['user_country'] == $country['country_id']))? 'selected="selected"' : '')?>><?=$country['country_name']?> (<?=$country['country_code']?>)</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="state" class="col-form-label">State</label>
                                            <?php if (!empty($staff)) { $getProvince = getProvince(((!empty($staff) && ($staff['user_country'] > 0))? $staff['user_country'] : '0'), 'country_id'); } ?>
                                            <select class="form-control" id="state" name="state" class="select2" style="height:43px;">
                                                <option value="0" selected="selected">Select State</option>
                                                <?php if (!empty($staff)) { 
                                                    foreach ($getProvince as $province) { ?>
                                                        <option value="<?=$province['province_id']?>" <?=((!empty($staff) && ($staff['user_state'] == $province['province_id']))? 'selected="selected"' : '')?>><?=$province['province_name'].' '.$province['province_code']?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="timezone" class="col-form-label">Timezone</label>
                                            <?php $getTZ = getTZ(); ?>
                                            <select class="form-control" id="timezone" name="timezone" class="select2" style="height:43px;">
                                                <option value="0">Select Timezone</option>
                                                <?php if (!empty($getTZ)) { 
                                                    foreach ($getTZ as $tz) { ?>
                                                        <option value="<?=$tz['id']?>" <?=((!empty($staff) && ($staff['user_tz_id'] == $tz['id']))? 'selected="selected"' : '')?>><?=$tz['tz_offset']?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="city" class="col-form-label">City</label>
                                            <input class="form-control" type="text" id="city" name="city" placeholder="City" value="<?=((!empty($staff))? $staff['user_city'] : '')?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pincode" class="col-form-label">Pincode/ZIP code</label>
                                            <input class="form-control" type="text" id="pincode" name="pincode" placeholder="Pincode/ZIP code" value="<?=((!empty($staff))? $staff['user_pin'] : '')?>">
                                        </div>
                                    </div>

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php if (($page_title == 'Add Staff') || ($page_title == 'Edit Staff')) { ?>
                                            <button id="saveUserSubmit" type="submit"><?=(($page_title == 'Add Staff')? 'Save Staff' : 'Update Staff')?><i class="ti-arrow-right"></i></button>
                                        <?php } else { ?>
                                            <a class="btn btn-rounded btn-dark mt-3" href="javascript:history.back()" role="button" style="float:right;">GO BACK <i class="ti-arrow-right"></i></a>
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
    <script src="<?=site_url()?>assets/js/acp/staffs.js"></script>
    <script type="text/javascript">
        <?php if ($page_title == 'View Staff') { ?>
            $(function() {
                $("#manageUser :input").prop("disabled", true);
                $("#manageUser :select").prop("disabled", true);
                $("#manageUser :textarea").prop("disabled", true);
            });
        <?php } else { ?>
            $(function() {
                Staffs.manageStaff();
            });
        <?php } ?>
    </script>
</body>

</html>