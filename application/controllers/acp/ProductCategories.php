<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductCategories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Product Categories";
		$this->data['main_menu_active'] = 'Products';
        $this->data['sub_menu_active'] = "Product Categories";
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array("Products" => array('active' => true, 'link' => site_url().'acp/Products'));
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_products', 'acpProducts');
		if (!hasUserAccess(16)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	// Initial Listing
	public function index()
	{
		$this->data['page_title'] = "List Categories";
		$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/Products'), "Product Categories" => array('active' => false, 'link' => site_url().'acp/Productcategories'), "List Categories" => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = "List Categories";
		$this->load->view('acp/productcategories', $this->data);
	}

	// Ajax Listing
	public function getCategoryTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['productcategories'] = $this->acpProducts->getCategories();
			$this->load->view('acp/includes/productCategoriesTable', $this->data);
		}
	}

	// Add or Edit a product category view page
	public function add($cid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($cid))? "Add" : (($view)? "View" : "Edit" ))." Category";
		$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/Products'), "Product Categories" => array('active' => false, 'link' => site_url().'acp/Productcategories'), ((empty($cid))? "Add" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = ((empty($cid))? "Add Category" : "List Categories");
		$this->data['productcategory'] = array();
		if (!empty($cid)) {
			$this->data['productcategory'] = $this->acpProducts->getCategories($cid);
		}
		$this->load->view('acp/addProductCategory', $this->data);
	}

	// Save or Update a product category
	public function save()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$catgry = $this->input->post(null, true);
			// Fetching detailed category from DB
			$productCatg = $this->acpProducts->getCategories();
			if (!(isset($catgry['cat_id']) && !empty($catgry['cat_id']))) {
				foreach ($productCatg as $key => $detailCatg) {
					// product detail category exist check
					if (strtolower($detailCatg['cat_name']) == strtolower(trim($catgry['cat_name']))) {
						send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Category already exist.'));
					}
				}
			}

			$catgryAdd = array(
				'cat_name' => trim($catgry['cat_name']),
				'cat_canonial_name' => trim($catgry['cat_canonial_name']),
				'cat_image' => trim($catgry['cat_image']),
				'cat_desc' => trim($catgry['cat_desc']),
				'cat_added_user' => $this->loggedInUser['user_id'],
				'addinmenu'=> trim($catgry['addinmenu']),
				'cat_orderno' => trim($catgry['cat_order']),
			);
			if (isset($catgry['cat_id']) && !empty($catgry['cat_id'])) {
				// Edit product category
				$catgryAdd = array_merge($catgryAdd, array('cat_id' => trim($catgry['cat_id'])));
			}
			$save = $this->acpProducts->saveProductCategory($catgryAdd);
			if ($save) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Product categoty '.((isset($prod['pid']) && !empty($prod['pid']))? 'updated' : 'added').' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	// Slug for category name
	public function doSlugify()
	{
		if ($this->input->is_ajax_request()) {
			$text = $this->input->post('text', true);
			$except = $this->input->post('except', true);
			$resp = false;
			if (!empty($text) && (trim($text) != '')) $resp = $this->acpProducts->doCatgSlugify($text, $except);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Category slug created successfully.', 'slugText' => $resp['slugText']));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		}
	}

	// Product category delete / lock / unlock
	public function action()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$catg = $this->input->post('catg', true);
			$action = $this->input->post('action', true); // 2=> delete / 0=> lock / 1=> unlock
			$resp = $this->acpProducts->actionCategory($catg, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Product category '.(($action == 'delete')? 'deleted' : (($action == 'unlock')? 'unlocked' : 'locked')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}
