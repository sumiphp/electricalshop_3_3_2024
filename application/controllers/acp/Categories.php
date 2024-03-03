<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Categories";
		$this->data['main_menu_active'] = 'Categories';
        $this->data['sub_menu_active'] = "";
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array("Categories" => array('active' => true, 'link' => site_url().'acp/Categories'));
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_categories', 'acpCategories');
		if (!hasUserAccess(17)) acp_show403();
	}

	// Initial Listing
	public function index()
	{
		$this->data['page_title'] = "List Categories";
		$this->data['page_breadcrumb'] = array("Categories" => array('active' => true, 'link' => site_url().'acp/Categories'));
		$this->data['innersub_menu_active'] = "List Categories";
		$this->load->view('acp/categories', $this->data);
	}

	// Ajax Listing
	public function getCategoryTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['productcategories'] = $this->acpCategories->getCategories();
			$this->load->view('acp/includes/categoriesTable', $this->data);
		}
	}

	// Add or Edit a Categories view page
	public function add($cid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($cid))? "Add" : (($view)? "View" : "Edit" ))." Category";
		$this->data['page_breadcrumb'] = array("Categories" => array('active' => false, 'link' => site_url().'acp/Categories'), ((empty($cid))? "Add" : "Edit") => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = ((empty($cid))? "Add Category" : "List Categories");
		$this->data['productcategory'] = array();
		if (!empty($cid)) {
			$this->data['productcategory'] = $this->acpCategories->getCategories($cid);
		}
		$this->load->view('acp/addCategory', $this->data);
	}

	// Save or Update a product Category
	public function save()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$categories = $this->input->post(null, true);
			// Fetching detailed categeory from DB
			$productCategory = $this->acpCategories->getCategories();
			if (!(isset($categories['cat_id']) && !empty($categories['cat_id']))) {
				foreach ($productCategory as $key => $detailCategory) {
					// detail categeory exist check
					if (strtolower($detailCategory['cat_name']) == strtolower(trim($categories['cat_name']))) {
						send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Category already exist.'));
					}
				}
			}

			$categeoryAdd = array(
				'cat_name' => trim($categories['cat_name']),
				'cat_canonial_name' => trim($categories['cat_canonial_name']),
				'cat_image' => trim($categories['cat_image']),
				'cat_desc' => trim($categories['cat_desc']),
				'cat_added_user' => $this->loggedInUser['user_id'],
			);
			if (isset($categories['cat_id']) && !empty($categories['cat_id'])) {
				// Edit product categeory
				$categeoryAdd = array_merge($categeoryAdd, array('cat_id' => trim($categories['cat_id'])));
			}
			$save = $this->acpCategories->saveProductCategory($categeoryAdd);
			if ($save) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Category '.((isset($categories['cat_id']) && !empty($categories['cat_id']))? 'updated' : 'added').' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	// Slug for categeory name
	public function doSlugify()
	{
		if ($this->input->is_ajax_request()) {
			$text = $this->input->post('text', true);
			$except = $this->input->post('except', true);
			$resp = false;
			if (!empty($text) && (trim($text) != '')) $resp = $this->acpCategories->doCategorySlugify($text, $except);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Category slug created successfully.', 'slugText' => $resp['slugText']));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		}
	}

	// Product categeory delete / lock / unlock
	public function action()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$categeory = $this->input->post('categeory', true);
			$action = $this->input->post('action', true); // 2=> delete / 0=> lock / 1=> unlock
			$resp = $this->acpCategories->actionCategory($categeory, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Category '.(($action == 'delete')? 'deleted' : (($action == 'unlock')? 'unlocked' : 'locked')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}
