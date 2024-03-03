<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$page_title?> | <?=sitename()?></title>
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
                                <form id="manageCustomers">
                                    <input type="hidden" id="cid" name="cid" value="<?=((!empty($customer))? $customer['cust_id'] : '')?>">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="firstname" class="col-form-label">First name*</label>
                                            <input class="form-control" type="text" id="firstname" name="firstname" placeholder="First name" value="<?=((!empty($customer))? $customer['cust_firstname'] : '')?>" required="required">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lastname" class="col-form-label">Last name</label>
                                            <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Last name" value="<?=((!empty($customer))? $customer['cust_lastname'] : '')?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="emailid1" class="col-form-label">Primary Email Address*</label>
                                            <input class="form-control emailValidation" type="text" id="emailid1" name="emailid1" placeholder="Primary Email Address" value="<?=((!empty($customer))? $customer['cust_email'] : '')?>" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="phonenum1" class="col-form-label">Primary Phone Number*</label>
                                            <input class="form-control phoneValidation" type="text" id="phonenum1" name="phonenum1" placeholder="Primary Phone Number" value="<?=((!empty($customer))? $customer['cust_phone1'] : '')?>" required="required">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phonenum2" class="col-form-label">Secondry Phone Number</label>
                                            <input class="form-control phoneValidation" type="text" id="phonenum2" name="phonenum2" placeholder="Secondry Phone Number" value="<?=((!empty($customer))? $customer['cust_phone2'] : '')?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="customeraddress" class="col-form-label">Client Address</label>
                                            <textarea class="form-control" id="customeraddress" name="customeraddress" placeholder="Client Address"><?=((!empty($customer))? $customer['cust_adrs'] : '')?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="customercards" class="col-form-label">Client Description</label>
                                            <textarea class="form-control" id="customerdesc" name="customerdesc" placeholder="Client Description"><?=((!empty($customer))? $customer['cust_note'] : '')?></textarea>
                                        </div>
                                    </div>

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php if (($page_title == 'Add Client') || ($page_title == 'Edit Client')) { ?>
                                            <button id="saveCustomerSubmit" type="submit"><?=(($page_title == 'Add Client')? 'Save Client' : 'Update Client')?><i class="ti-arrow-right"></i></button>
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
    <script src="<?=site_url()?>assets/js/acp/customers.js"></script>
    <script type="text/javascript">
        <?php if ($page_title == 'View Client') { ?>
            $(function() {
                $("#manageCustomers :input").prop("disabled", true);
                $("#manageCustomers :textarea").prop("disabled", true);
            });
        <?php } else { ?>
            $(function() {
                Customers.manageCustomer();
            });
        <?php } ?>
    </script>
</body>

</html>