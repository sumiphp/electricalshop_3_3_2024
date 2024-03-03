<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$page_title?> | <?=sitename()?></title>
    <?php $this->load->view('acp/includes/header-assets', array('page_title' => $page_title)); ?>
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
                                $permissions = array();
                                if (isset($role['permissions']) && !empty($role['permissions'])) {
                                    foreach ($role['permissions'] as $key => $value) {
                                        $permissions[] = $value['perm_module_id'];
                                    }
                                } ?>
                                <form id="manageUserRole">
                                    <input type="hidden" id="rid" name="rid" value="<?=((!empty($role))? $role['role_id'] : '')?>">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="role" class="col-form-label">Role name*</label>
                                            <input class="form-control" type="text" id="role" name="role" placeholder="Role" value="<?=((!empty($role))? $role['role_name'] : '')?>" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="roleaccess" class="col-form-label">Allow access control</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <?php foreach ($modules as $module) { ?>
                                            <div class="col-md-4 row">
                                                <div class="col-md-12">
                                                    <input type="checkbox" name="roleaccess[]" value="<?=$module['mod_id']?>" <?=((empty($permissions) || (in_array($module['mod_id'] , $permissions)))? 'checked="checked"' : '')?>>
                                                    <label class="col-form-label pl-1"><?=$module['mod_name']?></label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php if (($page_title == 'Add Role') || ($page_title == 'Edit Role')) { ?>
                                            <button id="saveRole" type="submit"><?=(($page_title == 'Add Role')? 'Save Role' : 'Update Role')?><i class="ti-arrow-right"></i></button>
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

    <?php $this->load->view('acp/includes/footer-assets', array('page_title' => $page_title, 'breadcrum' => $page_breadcrumb)); ?>

    <!-- custom js files -->
    <script src="<?=site_url()?>assets/js/acp/staffroles.js"></script>
    <script type="text/javascript">
        <?php if ($page_title == 'View Role') { ?>
            $(function() {
                $("#manageUserRole :input").prop("disabled", true);
            });
        <?php } else { ?>
            $(function() {
                Staffroles.manageStaffRole();
            });
        <?php } ?>
    </script>
</body>

</html>