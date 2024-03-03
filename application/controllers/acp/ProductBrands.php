<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductBrands extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Product Brands";
		$this->data['main_menu_active'] = 'Products';
        $this->data['sub_menu_active'] = "Product Brands";
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array("Products" => array('active' => true, 'link' => site_url().'acp/Products'));
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_products', 'acpProducts');
		if (!hasUserAccess(17)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	// Initial Listing
	public function index()
	{
		$this->data['page_title'] = "List Brands";
		$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/Products'), "Product Brands" => array('active' => false, 'link' => site_url().'acp/Productbrands'), "List Brands" => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = "List Brands";
		$this->load->view('acp/productbrands', $this->data);
	}

	// Ajax Listing
	public function getBrandTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['productbrands'] = $this->acpProducts->getBrands();
			$this->load->view('acp/includes/productBrandsTable', $this->data);
		}
	}



// Ajax Listing






	// Add or Edit a product Brands view page
	public function add($cid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($cid))? "Add" : (($view)? "View" : "Edit" ))." Brand";
		$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/Products'), "Product Brands" => array('active' => false, 'link' => site_url().'acp/Productbrands'), ((empty($cid))? "Add" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = ((empty($cid))? "Add Brand" : "List Brands");
		$this->data['productbrand'] = array();
		if (!empty($cid)) {
			$this->data['productbrand'] = $this->acpProducts->getBrands($cid);
		}
		$this->load->view('acp/addProductBrand', $this->data);
	}

	// Save or Update a product Brand
	public function save()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$brands = $this->input->post(null, true);
			// Fetching detailed brand from DB
			$productBrand = $this->acpProducts->getBrands();
			if (!(isset($brands['brand_id']) && !empty($brands['brand_id']))) {
				foreach ($productBrand as $key => $detailBrand) {
					// product detail brand exist check
					if (strtolower($detailBrand['brand_name']) == strtolower(trim($brands['brand_name']))) {
						send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Brand already exist.'));
					}
				}
			}

			$brandAdd = array(
				'brand_name' => trim($brands['brand_name']),
				'brand_canonial_name' => trim($brands['brand_canonial_name']),
				'brand_image' => trim($brands['brand_image']),
				'brand_desc' => trim($brands['brand_desc']),
				'brand_added_user' => $this->loggedInUser['user_id'],
				'addinmenu'=> trim($brands['addinmenu']),
				'brand_orderno' => trim($brands['brand_order']),
			);
			if (isset($brands['brand_id']) && !empty($brands['brand_id'])) {
				// Edit product brand
				$brandAdd = array_merge($brandAdd, array('brand_id' => trim($brands['brand_id'])));
			}
			$save = $this->acpProducts->saveProductBrand($brandAdd);
			if ($save) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Product brand '.((isset($brands['brand_id']) && !empty($brands['brand_id']))? 'updated' : 'added').' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	// Slug for brand name
	public function doSlugify()
	{
		if ($this->input->is_ajax_request()) {
			$text = $this->input->post('text', true);
			$except = $this->input->post('except', true);
			$resp = false;
			if (!empty($text) && (trim($text) != '')) $resp = $this->acpProducts->doBrandSlugify($text, $except);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Brand slug created successfully.', 'slugText' => $resp['slugText']));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		}
	}

	// Product brand delete / lock / unlock
	public function action()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$brand = $this->input->post('brand', true);
			$action = $this->input->post('action', true); // 2=> delete / 0=> lock / 1=> unlock
			$resp = $this->acpProducts->actionBrand($brand, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Product brand '.(($action == 'delete')? 'deleted' : (($action == 'unlock')? 'unlocked' : 'locked')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}
