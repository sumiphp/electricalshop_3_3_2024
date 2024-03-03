<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = 'errorpages';
$route['translate_uri_dashes'] = FALSE;

$route['wishlist'] = 'Home/wishlist';
$route['about-us'] = 'Home/about_us';
$route['contact-us/submit'] = 'Home/submitContactUsForm';
$route['enquiry/submit'] = 'Home/submitContactUsForm';
$route['enquiry/(:any)'] = 'Home/enquiry/$1';
$route['brands'] = 'Home/brands';
$route['categories'] = 'Home/categories';
$route['products'] = 'Home/products';
$route['products/brand/(:any)'] = 'Home/productsByBrand/$1';
$route['products/category/(:any)'] = 'Home/productsByCategory/$1';
$route['product/(:any)'] = 'Home/products/$1/';
$route['blogs'] = 'Home/blogs';
$route['blog/(:any)'] = 'Home/blogs/$1';
$route['contact-us'] = 'Home/contactUs';

$route['clearencesale'] = 'Home/clearencesale';
$route['bulkenquiry'] = 'Home/bulkenquiry';
$route['login'] = 'Home/login';
$route['acp'] = 'acp/Login';

$route['acp/error'] = 'acp/Errorpages';

$route['acp/Staffs'] = 'acp/Staffs';
$route['acp/Staffs/cp'] = 'acp/Staffs/change_password';
$route['acp/Staff/cp/(:any)'] = 'acp/Staffs/change_password/$1';
$route['acp/Staff/add'] = 'acp/Staffs/add';
$route['acp/Staff/edit/(:any)'] = 'acp/Staffs/add/$1';
$route['acp/Staff/view/(:any)'] = 'acp/Staffs/add/$1/view';

$route['acp/Roles'] = 'acp/Roles';
$route['acp/Role/add'] = 'acp/Roles/add';
$route['acp/Role/edit/(:any)'] = 'acp/Roles/add/$1';
$route['acp/Role/view/(:any)'] = 'acp/Roles/add/$1/view';

$route['acp/Clients'] = 'acp/Customers';
$route['acp/Client/add'] = 'acp/Customers/add';
$route['acp/Client/edit/(:any)'] = 'acp/Customers/add/$1';
$route['acp/Client/view/(:any)'] = 'acp/Customers/add/$1/view';

$route['acp/Products'] = 'acp/Products';
$route['acp/Product/add'] = 'acp/Products/add';
$route['acp/Product/edit/(:any)'] = 'acp/Products/add/$1';
$route['acp/Product/view/(:any)'] = 'acp/Products/add/$1/view';

$route['acp/Productypes'] = 'acp/ProductDetailTypes';
$route['acp/Productype/add'] = 'acp/ProductDetailTypes/add';
$route['acp/Productype/edit/(:any)'] = 'acp/ProductDetailTypes/add/$1';
$route['acp/Productype/view/(:any)'] = 'acp/ProductDetailTypes/add/$1/view';

$route['acp/Productcategories'] = 'acp/ProductCategories';
$route['acp/Productcategory/add'] = 'acp/ProductCategories/add';
$route['acp/Productcategory/edit/(:any)'] = 'acp/ProductCategories/add/$1';
$route['acp/Productcategory/view/(:any)'] = 'acp/ProductCategories/add/$1/view';

$route['acp/Productbrands'] = 'acp/ProductBrands';
$route['acp/Productbrand/add'] = 'acp/ProductBrands/add';
$route['acp/Productbrand/edit/(:any)'] = 'acp/ProductBrands/add/$1';
$route['acp/Productbrand/view/(:any)'] = 'acp/ProductBrands/add/$1/view';

$route['acp/Blogs'] = 'acp/Blogs';
$route['acp/Blog/doSlugify'] = 'acp/Blogs/doSlugify';
$route['acp/Blog/add'] = 'acp/Blogs/add';
$route['acp/Blog/edit/(:any)'] = 'acp/Blogs/add/$1';
$route['acp/Blog/view/(:any)'] = 'acp/Blogs/add/$1/view';

$route['acp/Support'] = 'acp/AskforSupport';
$route['acp/TnC'] = 'acp/TermsandConditions';