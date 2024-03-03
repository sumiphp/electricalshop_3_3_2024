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
                               /* $brd = array();
                                if (isset($productbrand) && !empty($productbrand)) {
                                    $brd = array(
                                        'brand_id' => $productbrand['brand_id'],
                                        'brand_name' => $productbrand['brand_name'],
                                        'brand_canonial_name' => $productbrand['brand_canonial_name'],
                                        'brand_desc' => $productbrand['brand_desc'],
                                        'brand_image' => $productbrand['brand_image'],
                                    );
                                }*/ ?>
                                <form id="menufrm1">
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                        <input type="hidden" class="form-control" id="menuid" name="menuid" value="<?php echo $result->menuid;?>" placeholder="Enter Menu Name" required>
                                            <input type="hidden" id="brand_id" name="brand_id" value="<?=((!empty($brd) && isset($brd['brand_id']))? $brd['brand_id'] : '')?>">
                                            <input type="hidden" id="brand_canonial_name" name="brand_canonial_name" value="<?=((!empty($brd))? $brd['brand_canonial_name'] : '')?>">
                                            <!--label for="brand_name" class="col-form-label">Menu Name*</label>
                                            <input class="form-control" type="text" id="brand_name" name="brand_name" placeholder="Enter Brand Name" value="<?//=((!empty($brd) && isset($brd['brand_name']))? $brd['brand_name'] : '')?>" required="required"-->
                                            <input type="hidden" class="form-control" id="menuid" name="menuid" value="<?php echo $result->menuid;?>" placeholder="Enter Menu Name" required>

                                            <label for="company-name" class="col-form-label">Menu Name:</label>
                                                              <input type="text" class="form-control" id="menuname" name="menuname" placeholder="Enter Menu Name" value="<?php echo $result->menuname;?>" maxlength="50" required>
                                            <!--span>After saving URL to this brand will be: <?//=MAIN_SITE_URL?>brand/<strong id="show_canonial_name"><?//=((!empty($brd) && isset($brd['brand_canonial_name']))? $brd['brand_canonial_name'] : '')?></strong></span-->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                        <label for="designation" class="col-form-label">Select Menu Type:</label>
                                                          <select class="form-control" placeholder="Product Category Name" name="menutype" id="menutype"  data-bs-original-title="" title="" required>
                                                                <option value=''>Select Menu Type</option>
                                                                <option value="1" <?php if ($result->menutype=='1'){?> selected <?php }?>>Top Menu </option>
                                                                <option value="2" <?php if ($result->menutype=='2'){?> selected <?php }?>>Sub Menu </option>
</select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                        <label for="address" class="form-label text-primary">Parent Menu:</label>
                                                          <select class="form-control"  name="pmenu" id="pmenu"  data-bs-original-title="" title="" required>
                                                                <option value=''>Select Parent Menu</option>
                                                                <option value='-1' <?php if ($result->parentmenuid=='-1'){?> selected <?php }?> >No Parent Menu</option>
                                                               <?php foreach($pmenus as $menu){?>
                                                                
                                                                <option value="<?php echo $menu['menuid'];?>" <?php if ($result->parentmenuid==$menu['menuid']){?> selected <?php }?>><?php echo $menu['menuname'];?></option>
                                                            
                                                            <?php }?>
                                                            
                                                           </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">
                                    <label for="contact-person" class="form-label text-primary">Menu Url:</label>
                                                              <input type="text" class="form-control" id="menuurl" name="menuurl" placeholder="Enter Menu Url"  value="<?php echo $result->url;?>">


                                                              </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">

                                    <label for="status" class="form-label text-primary">Status:</label>
                                                              
                                                              <select class="form-control" placeholder="Select Status" name="status" id="status"  data-bs-original-title="" title="" required>
                                                                <option value=''>Select Status</option>
                                                                <option value="1" <?php if ($result->status=='1'){?> selected <?php }?>>Active </option>
                                                                <option value="0" <?php if ($result->status=='0'){?> selected <?php }?>>Inactive </option>
                                                                </select>
</div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-12 mb-3">

                                        <label for="contact-person" class="form-label text-primary">Order No:</label>
                                                              <input type="text" class="form-control numericvalidate" id="orderno" name="orderno" placeholder="Enter Order No" required value="<?php echo $result->orderno;?>">


                                        </div>
                                    </div>





                                    <!--div class="form-group row" style="<?//=((($page_title == 'Add Brand') || ($page_title == 'Edit Brand'))? '' : 'display:none;')?>">
                                        <div class="col-md-12 mb-3 card-body">
                                            <div class="dropzone" id="fileDropZone1">
                                            </div>
                                            <input type="hidden" id="brand_image" name="brand_image" value="<?//=((isset($brd['brand_image']) && !empty($brd['brand_image']))? $brd['brand_image'] : '')?>">
                                        </div>
                                    </div>

                                    <div class="dropzoneDetailed" id="dropzoneDetailed">
                                        <?php //if (isset($brd['brand_image']) && !empty($brd['brand_image'])) { ?>
                                            <div id="imageDesc_<?=(str_replace('.', '_', $brd['brand_image']))?>" class="prodimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img class="btn-success" src="<?=site_url()?>assets/uploads/brands/<?=$brd['brand_image']?>" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;"></div><div class="col-10 pt-3 pl-4">Brand image</div></div>
                                        <?php //} else if ($page_title == 'Edit Brand') {
                                            //echo "No image added to brand yet.";
                                        //} ?>
                                    </div-->

                                    <div class="submit-btn-area" style="width:15%;float:right;min-width: 200px;">
                                        <?php //if (($page_title == 'Add Menu') || ($page_title == 'Edit Menu')) { ?>
                                            <!--button id="saveBrandSubmit" type="submit"><?//=(($page_title == 'Add Menu')? 'Save Menu' : 'Update Menu')?><i class="ti-arrow-right"></i></button-->
                                        <?php //} else { ?>
                                            <!--a class="btn btn-rounded btn-dark mt-3" href="javascript:history.back()" role="button">GO BACK <i class="ti-arrow-right"></i></a-->
                                        <?php //} ?>


                                        <button id="saveBrandSubmit1" type="submit"><?=(($page_title == 'Add Menu')? 'Update Menu' : 'Update Menu')?><i class="ti-arrow-right"></i></button>


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
    <script src="<?=site_url()?>assets/js/acp/menudt.js?c=<?=strtotime(date('s:i:H Y-m-d'))?>"></script>
    <script type="text/javascript">
        <?php if ($page_title == 'View Brand') { ?>
            $(function() {
                //$("#manageBrand :input").prop("disabled", true);
            });
        <?php } else { ?>
            $(function() {
                //Brands.add();
            });
        <?php } ?>
    </script>

<script>
$('#menufrm').on('submit', function (e) {
    e.preventDefault();
   //alert("enter");
        //var file_data1 = $('#image1').prop('files')[0];
        //var file_data2 = $('#image2').prop('files')[0];
        var menuname=$('#menuname').val();
        var menuurl=$("#menuurl").val();
        var menutype=$("#menutype").val();
        var status=$("#status").val();
        var orderno=$("#orderno").val();
        var pmenu=$("#pmenu").val();
        //var menutype=$("#menutype").val();
        //var file_data1 = $('#image1').prop('files')[0];
        //var alttagimg1=$("#alttagimg1").val();
        var form_data = new FormData();
        //form_data.append('image1', file_data1);
        //form_data.append('image2', file_data2);
        form_data.append('menuname',menuname);
        form_data.append('menutype',menutype);
        form_data.append('menuurl',menuurl);
        form_data.append('status',status);
        form_data.append('pmenu',pmenu);
        //form_data.append('image1', file_data1);
        //form_data.append('alttag1',alttagimg1);
        form_data.append('orderno',orderno);
       
        $.ajax({
            url: "<?php echo base_url().'acp/Settings/updatemenu';?>", // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                //$('#image1').val('');
                //$('#image2').val('');
                $('input[type=text]').each(function() {
        $(this).val('');
    });
    $('#image1').val('');
    $("#description").val('');
    $('#pmenu').val('');
    $('#menutype').val('');
    $("#description").val('');
                //$('#menumsg').html(response); // display success response from the server
                
                window.location.href ="<?php echo base_url().'acp/Settings/listmenus';?>";
            },
            error: function (response) {
                //$('#menumsg').html(response); // display error response from the server
                //acp/Settings/listmenus
                window.location.href ="<?php echo base_url().'acp/Settings/listmenus';?>";
            }
        });
    });







    $('#menufrm1').on('submit', function (e) {
    e.preventDefault();
   //alert("enter");
       // var file_data1 = $('#image1').prop('files')[0];
        //var file_data2 = $('#image2').prop('files')[0];
        var menuname=$('#menuname').val();
        var menuurl=$("#menuurl").val();
        var menutype=$("#menutype").val();
        var status=$("#status").val();
        //var menutype=$("#menutype").val();
        var pmenu=$("#pmenu").val();
        var menuid=$("#menuid").val();
        var orderno=$("#orderno").val();
        //var pmenu=$("#pmenu").val();
        
        var form_data = new FormData();
        //form_data.append('image1', file_data1);
        //form_data.append('image2', file_data2);
        form_data.append('menuname',menuname);
        form_data.append('menutype',menutype);
        form_data.append('menuurl',menuurl);
        form_data.append('status',status);
        form_data.append('pmenu',pmenu);
        form_data.append('menuid',menuid);
        form_data.append('orderno',orderno);
       
        $.ajax({
            url: "<?php echo base_url().'acp/Settings/editmenuprocess';?>", // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                //$('#image1').val('');
                //$('#image2').val('');
                $('input[type=text]').each(function() {
        $(this).val('');
    });
    $("#description").val('');
    $('#pmenu').val('');
    $('#menutype').val('');
    window.location.href ="<?php echo base_url().'acp/Settings/listmenus';?>";
            },
            error: function (response) {
                window.location.href ="<?php echo base_url().'acp/Settings/listmenus';?>";
            }
        });
    });





















</script>















</body>

</html>