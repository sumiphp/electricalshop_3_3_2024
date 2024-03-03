<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$page_title?> | <?=sitename()?></title>
    <?php $this->load->view('acp/includes/header-assets', array('page_title' => 'Editor')); ?>
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
                                <form id="manageSupport">
                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3">
                                            <label style="display:none;">Support Type</label>
                                            <select class="form-control" id="ticket_type" name="ticket_type" required="required" style="height:43px;">
                                                <option value="">Select Support Type</option>
                                                <?php foreach ($ticket_type as $typeKey => $type) { ?>
                                                    <option value="<?=$typeKey?>" <?=(($type == 'Ask for Support')? 'selected' : '')?>><?=$type?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group col-md-6 mb-3">
                                            <label style="display:none;">Priority</label>
                                            <select class="form-control" id="ticket_priority" name="ticket_priority" required="required" style="height:43px;">
                                                <option value="">Select Priority</option>
                                                <?php foreach ($ticket_priority as $pcKey => $priority) { ?>
                                                    <option value="<?=$pcKey?>" <?=(($priority == 'Normal')? 'selected' : '')?>><?=$priority?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label style="display:none;">Subject</label>
                                            <input class="form-control" type="text" id="ticketTitle" name="ticketTitle" placeholder="Enter Subject" value="" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                            <label style="display:none;">Message</label>
                                            <div id="ticketMessage"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <button id="saveTicket" type="submit">Send Mail<i class="ti-arrow-right"></i></button>
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

    <?php $this->load->view('acp/includes/footer-assets', array('page_title' => 'Editor', 'breadcrum' => $page_breadcrumb)); ?>

    <!-- custom js files -->
    <script src="<?=site_url()?>assets/js/acp/support.js?c=<?=date('siHYmd')?>"></script>
    <script type="text/javascript">
        $(function() {
            Support.init();
            Support.send();
        });
    </script>
</body>

</html>
