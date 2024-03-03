<div class="sidebar-menu">
    <?php $acp_login_user = loggedInUser();
    $sitedetails = sitedetails(); ?>
    <div class="sidebar-header">
        <div class="logo">
            <a href="<?=site_url()?>acp/Dashboard"><img src="<?=$sitedetails['logo']?>" alt="<?=$sitedetails['sitename']?>"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="<?=(($main_menu_active == 'Dashboard')? 'active' : '')?>" style="<?=((!hasUserAccess(1))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Dashboard" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                    </li>
                    <li class="<?=(($main_menu_active == 'Staffs')? 'active' : '')?>" style="<?=((!hasUserAccess(2))? 'display:none;' : '')?>">
                        <a href="javascript:void(0);" aria-expanded="true"><i class="fa fa-user-secret"></i> <span>Staffs</span></a>
                        <ul class="collapse <?=(($main_menu_active == 'Staffs')? 'in' : '')?>">
                            <li class="<?=(($sub_menu_active == 'List Staffs')? 'active' : '')?>"><a href="<?=site_url()?>acp/Staffs">List Staffs</a></li>
                            <li class="<?=(($sub_menu_active == 'Add Staff')? 'active' : '')?>"><a href="<?=site_url()?>acp/Staffs/add">Add Staff</a></li>
                            <li class="<?=(($sub_menu_active == 'Staff Roles')? 'active' : '')?>" style="<?=((!hasUserAccess(9))? 'display:none;' : '')?>"><a href="#" aria-expanded="true">Staff Roles</a>
                                <ul class="collapse <?=(($sub_menu_active == 'Staff Roles')? 'in' : '')?>">
                                    <li class="<?=(($innersub_menu_active == 'List Roles')? 'active' : '')?>"><a href="<?=site_url()?>acp/Roles">List Roles</a></li>
                                    <li class="<?=(($innersub_menu_active == 'Add Role')? 'active' : '')?>"><a href="<?=site_url()?>acp/Role/add">Add Role</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="<?=(($main_menu_active == 'Clients')? 'active' : '')?>" style="<?=((!hasUserAccess(3))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Clients" aria-expanded="true"><i class="fa fa-users"></i><span>Clients</span></a>
                        <ul class="collapse <?=(($main_menu_active == 'Clients')? 'in' : '')?>">
                            <li><a href="<?=site_url()?>acp/Clients">List Clients</a></li>
                            <li><a href="<?=site_url()?>acp/Client/add">Add Client</a></li>
                        </ul>
                    </li>
                    <li class="<?=(($main_menu_active == 'Subscribers')? 'active' : '')?>" style="<?=((!hasUserAccess(15))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Subscribers" aria-expanded="true"><i class="ti-book"></i><span>Subscribers</span></a>
                    </li>
                    <li class="<?=(($main_menu_active == 'Products')? 'active' : '')?>" style="<?=((!hasUserAccess(19))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Products" aria-expanded="true"><i class="fa fa-cube"></i> <span>Products</span></a>
                        <ul class="collapse <?=(($main_menu_active == 'Products')? 'in' : '')?>">
                            <li class="<?=(($sub_menu_active == 'List Products')? 'active' : '')?>"><a href="<?=site_url()?>acp/Products">List Products</a></li>
                            <li class="<?=(($sub_menu_active == 'Add Product')? 'active' : '')?>"><a href="<?=site_url()?>acp/Product/add">Add Product</a></li>
                            <li class="<?=(($sub_menu_active == 'Product Detail Types')? 'active' : '')?>" style="<?=((!hasUserAccess(20))? 'display:none;' : '')?>"><a href="<?=site_url()?>acp/Productypes" aria-expanded="true">Detail Types</a>
                                <ul class="collapse <?=(($sub_menu_active == 'Product Detail Types')? 'in' : '')?>">
                                    <li class="<?=(($innersub_menu_active == 'List Types')? 'active' : '')?>"><a href="<?=site_url()?>acp/Productypes">List Types</a></li>
                                    <li class="<?=(($innersub_menu_active == 'Add Type')? 'active' : '')?>"><a href="<?=site_url()?>acp/Productype/add">Add Type</a></li>
                                </ul>
                            </li>
                            <li class="<?=(($sub_menu_active == 'Product Categories')? 'active' : '')?>" style="<?=((!hasUserAccess(16))? 'display:none;' : '')?>"><a href="<?=site_url()?>acp/ProductCategories" aria-expanded="true">Categories</a>
                                <ul class="collapse <?=(($sub_menu_active == 'Categories')? 'in' : '')?>">
                                    <li class="<?=(($innersub_menu_active == 'List Categories')? 'active' : '')?>"><a href="<?=site_url()?>acp/Productcategories">List Categories</a></li>
                                    <li class="<?=(($innersub_menu_active == 'Add Category')? 'active' : '')?>"><a href="<?=site_url()?>acp/Productcategory/add">Add Category</a></li>
                                </ul>
                            </li>
                            <li class="<?=(($sub_menu_active == 'Product Brands')? 'active' : '')?>" style="<?=((!hasUserAccess(17))? 'display:none;' : '')?>"><a href="<?=site_url()?>acp/ProductBrands" aria-expanded="true">Brands</a>
                                <ul class="collapse <?=(($sub_menu_active == 'Brands')? 'in' : '')?>">
                                    <li class="<?=(($innersub_menu_active == 'List Brands')? 'active' : '')?>"><a href="<?=site_url()?>acp/Productbrands">List Brands</a></li>
                                    <li class="<?=(($innersub_menu_active == 'Add Brand')? 'active' : '')?>"><a href="<?=site_url()?>acp/Productbrand/add">Add Brand</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>


                   


                            <li class="<?=(($main_menu_active == 'Clients')? 'active' : '')?>" style="<?=((!hasUserAccess(3))? 'display:none1;' : '')?>">
                        <a href="<?=site_url()?>acp/Clients" aria-expanded="true"><i class="fa fa-users"></i><span>Menu</span></a>
                        <ul class="collapse <?=(($main_menu_active == 'Clients')? 'in' : '')?>">
                            <li><a href="<?=site_url()?>acp/Settings/listmenus">List Menu</a></li>
                            <li><a href="<?=site_url()?>acp/Settings/addmenu">Add Menu</a></li>
                        </ul>
                    </li>



                    <li class="<?=(($main_menu_active == 'Clients')? 'active' : '')?>" style="<?=((!hasUserAccess(3))? 'display:none1;' : '')?>">
                        <a href="<?=site_url()?>acp/Clients" aria-expanded="true"><i class="fa fa-users"></i><span>Carousal</span></a>
                        <ul class="collapse <?=(($main_menu_active == 'Clients')? 'in' : '')?>">
                            <li><a href="<?=site_url()?>acp/Settings/listcarousal">List Carousal</a></li>
                            <li><a href="<?=site_url()?>acp/Settings/addcarousal">Add  Carousal</a></li>
                        </ul>
                    </li>




                    <li class="<?=(($main_menu_active == 'Blogs')? 'active' : '')?>" style="<?=((!hasUserAccess(14))? 'display:none;' : '')?>">
                        <a href="javascript:void(0);" aria-expanded="true"><i class="ti-thought"></i> <span>Blogs</span></a>
                        <ul class="collapse <?=(($main_menu_active == 'Blogs')? 'in' : '')?>">
                            <li class="<?=(($sub_menu_active == 'List Blogs')? 'active' : '')?>"><a href="<?=site_url()?>acp/Blogs">List Blogs</a></li>
                            <li class="<?=(($sub_menu_active == 'Add Blog')? 'active' : '')?>"><a href="<?=site_url()?>acp/Blogs/add">Add Blog</a></li>
                        </ul>
                    </li>
                    <li class="<?=(($main_menu_active == 'Our Policies')? 'active' : '')?>" style="<?=((!hasUserAccess(18))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/TnC" aria-expanded="true"><i class="fa fa-shield"></i><span>Our Policies</span></a>
                    </li>
                    <li class="<?=(($main_menu_active == 'Map')? 'active' : '')?>" style="<?=((!hasUserAccess(10))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Map" aria-expanded="true"><i class="fa fa-map"></i><span>Map</span></a>
                    </li>
                    <li class="<?=(($main_menu_active == 'Sitemap')? 'active' : '')?>" style="<?=((!hasUserAccess(11))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Sitemap" aria-expanded="true"><i class="fa fa-sitemap"></i><span>Sitemap</span></a>
                    </li>
                    <!--li class="<?//=(($main_menu_active == 'Enquiries')? 'active' : '')?>" style="<?//=((!hasUserAccess(12))? 'display:none;' : '')?>">
                        <a href="<?//=site_url()?>acp/Enquires" aria-expanded="true"><i class="ti-medall"></i><span>Enquiries</span></a>
                    </li-->

                    <li class="<?=(($main_menu_active == 'Customers')? 'active' : '')?>" style="<?=((!hasUserAccess(13))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Settings/listcustomers" aria-expanded="true"><i class="fa fa-quote-right"></i><span>Customers</span></a>
                    </li>
                    <li class="<?=(($main_menu_active == 'Customers')? 'active' : '')?>" style="<?=((!hasUserAccess(13))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Settings/listbillingdetails" aria-expanded="true"><i class="fa fa-quote-right"></i><span>Billing details</span></a>
                    </li>




                    <li class="<?=(($main_menu_active == 'Contact Us')? 'active' : '')?>" style="<?=((!hasUserAccess(13))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Contactus" aria-expanded="true"><i class="fa fa-quote-right"></i><span>Contact Us</span></a>
                    </li>


                    <li class="<?=(($main_menu_active == 'Meta tag')? 'active' : '')?>" style="<?=((!hasUserAccess(13))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Settings/Homepage" aria-expanded="true"><i class="fa fa-quote-right"></i><span>Add HomePage Details</span></a>
                    </li>


                    <li class="<?=(($main_menu_active == 'Meta tag')? 'active' : '')?>" style="<?=((!hasUserAccess(13))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Settings/bulkupload" aria-expanded="true"><i class="fa fa-quote-right"></i><span>Bulk Upload</span></a>
                    </li>


                    <li class="<?=(($main_menu_active == 'Meta tag')? 'active' : '')?>" style="<?=((!hasUserAccess(13))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Settings/bulkupload" aria-expanded="true"><i class="fa fa-quote-right"></i><span>Bulk Upload</span></a>
                    </li> 
                    
                    <li class="<?=(($main_menu_active == 'Meta tag')? 'active' : '')?>" style="<?=((!hasUserAccess(13))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Settings/bulkuploadimages" aria-expanded="true"><i class="fa fa-quote-right"></i><span>Bulk Upload Images</span></a>
                    </li>  



                    <li class="<?=(($main_menu_active == 'Ask for IFIX Support')? 'active' : '')?>" style="<?=((!hasUserAccess(8))? 'display:none;' : '')?>">
                        <a href="<?=site_url()?>acp/Support" aria-expanded="true"><i class="fa fa-support"></i><span>Ask for IFIX Support</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>