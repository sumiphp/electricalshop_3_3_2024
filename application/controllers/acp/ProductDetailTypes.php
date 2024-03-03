<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductDetailTypes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Product Detail Types";
		$this->data['main_menu_active'] = 'Products';
        $this->data['sub_menu_active'] = "Product Detail Types";
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array("Products" => array('active' => true, 'link' => site_url().'acp/Products'));
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_products', 'acpProducts');
		if (!hasUserAccess(20)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	// Initial Listing
	public function index()
	{
		$this->data['page_title'] = "List Types";
		$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/Products'), "Product Detail Types" => array('active' => false, 'link' => site_url().'acp/Productdetails'), "List Types" => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = "List Types";
		$this->load->view('acp/producttypes', $this->data);
	}

	// Ajax Listing
	public function getProductTypesTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['producttypes'] = $this->acpProducts->getProductDetailTypes();
			$this->load->view('acp/includes/productTypesTable', $this->data);
		}
	}

	// Add or Edit a product type view page
	public function add($tid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($tid))? "Add" : (($view)? "View" : "Edit" ))." Type";
		$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/Products'), "Product Detail Types" => array('active' => false, 'link' => site_url().'acp/Productdetails'), ((empty($tid))? "Add" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = ((empty($tid))? "Add Type" : "List Types");
		$this->data['producttype'] = array();
		if (!empty($tid)) {
			$this->data['producttype'] = $this->acpProducts->getProductDetailTypes($tid);
			if (!empty($this->data['producttype']) && isset($this->data['producttype']['pd_type_system']) && ($this->data['producttype']['pd_type_system'] == 1) && (!$view)) {
				// Not allowed to edit/update this page
				redirect('acp/Productype/view/'.$tid);
			}
		}
		$this->load->view('acp/addProductTypes', $this->data);
	}

	// Save or Update a product type
	public function save()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$prod = $this->input->post(null, true);
			// Fetching detailed types from DB
			$productDetailTypes = $this->acpProducts->getProductDetailTypes();
			if (!(isset($prod['tyid']) && !empty($prod['tyid']))) {
				foreach ($productDetailTypes as $key => $detailType) {
					// product detail type exist check
					if (strtolower($detailType['pd_type_name']) == strtolower(trim($prod['typename']))) {
						send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Detail type already exist.'));
					}
				}
			}

			$typeAdd = array(
				'pd_type_name' => trim($prod['typename']),
				'pd_type_description' => trim($prod['descp']),
				'pd_type_required' => $prod['mandatory'],
				'pd_field_type' => $prod['fieldtype'],
				'pd_type_added_user' => $this->loggedInUser['user_id'],
			);
			if (isset($prod['tyid']) && !empty($prod['tyid'])) {
				// Edit product
				$typeAdd = array_merge($typeAdd, array('pd_type_id' => trim($prod['tyid'])));
			}
			$save = $this->acpProducts->saveProductType($typeAdd);
			if ($save) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Product detail type '.((isset($prod['pid']) && !empty($prod['pid']))? 'updated' : 'added').' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	// Product detail type delete
	public function action()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$prodtype = $this->input->post('prodtype', true);
			$action = $this->input->post('action', true); // 0=> delete / 1=> active
			$resp = $this->acpProducts->actionProductType($prodtype, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Product detail type '.(($action == 'delete')? 'deleted' : (($action == 'unlock')? 'unlocked' : 'locked')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}
