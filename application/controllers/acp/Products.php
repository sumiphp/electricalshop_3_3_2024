<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Products";
		$this->data['main_menu_active'] = 'Products';
		$this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array("Products" => array('active' => true, 'link' => site_url().'acp/Products'));
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_products', 'acpProducts');
		if (!hasUserAccess(19)) acp_show403();
		date_default_timezone_set(TIMEZONE);
		$this->data['sitecurrency'] = sitecurrency();
	}

	// Initial Listing
	public function index()
	{
		$this->data['page_title'] = "List Products";
		$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/Products'), "List Products" => array('active' => true, 'link' => ''));
		$this->data['sub_menu_active'] = "List Products";
		$this->load->view('acp/products', $this->data);
	}

	// Ajax Listing
	public function getProductTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['products'] = $this->acpProducts->getProducts();
			$this->load->view('acp/includes/productsTable', $this->data);
		}
	}

	// Add or Edit a product view page
	// $pid != null, Edit scenario
	public function add($pid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($pid))? "Add" : (($view)? "View" : "Edit" ))." Product";
		$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/Products'), ((empty($pid))? "Add" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		$this->data['sub_menu_active'] = ((empty($pid))? "Add Product" : "List Products");
		$this->data['products'] = $this->acpProducts->getProducts();
		$this->data['productDetailTypes'] = $this->acpProducts->getProductDetailTypes();
		$this->data['productCategories'] = $this->acpProducts->getCategories();
		$this->data['brands'] = $this->acpProducts->getBrands();
		if (!empty($pid)) {
			$this->data['product'] = $this->acpProducts->getProductAllDetails($pid);
		}
		$this->load->view('acp/addProducts', $this->data);
	}

	// Save or Update a product
	public function save()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$prod = $this->input->post(null, true);
			//print_r($prod);
			//die;
			// Fetching detailed types from DB
			$productDetailTypes = $this->acpProducts->getProductDetailTypes();

			// Add product
			$prod_details = $prod_images = array();
			foreach ($productDetailTypes as $key => $detailType) {
				// Collecting product details
				$fieldName = str_replace(' ', '_',$detailType['pd_type_id'].'_'.strtolower($detailType['pd_type_name']));
				if (isset($prod[$fieldName])) {
					$prod_details[] = array(
						'prod_dt_typeid' => $detailType['pd_type_id'],
						'prod_dt_desc' => (($detailType['pd_field_type'] == 3)? htmlentities(trim($prod[$fieldName])) : trim($prod[$fieldName])),
					);
				}
			}
			// Product image
			if (isset($prod['prodImages']) && !empty($prod['prodImages'])) {
				$prodImages = explode(',', $prod['prodImages']);
				foreach ($prodImages as $key => $image) {
					$pd_img_image = trim(str_replace('~', '', $image));
					if (isset($prod['pimgdesc_'.str_replace('.', '_', $pd_img_image)])) {
						$prod_images[] = array(
							'pd_img_image' => $pd_img_image,
							'pd_img_description' => $prod['pimgdesc_'.str_replace('.', '_', $pd_img_image)],
							'pd_img_added_user' => $this->loggedInUser['user_id'],
						);
					}
				}
			}
			$prod_opt_type = '';
			if (isset($prod['prod_opt_type'])) {
				$prod_opt_type = '-'.implode('-', $prod['prod_opt_type']).'-';
			}

			// Product tech sheet
			$prodTech =[];
			if (isset($prod['tech_desc']) && (trim($prod['tech_desc']) != '')) {
				$prodTech[] = [
					'tech_sheet_text' => trim($prod['tech_desc']),
					'tech_sheet_level' => 0,
					'tech_sheet_hierarchy' => null,
				];

				foreach ($prod as $key => $text) {
					if (
						(strrpos($key, 'TDS_L') !== false)
						&& is_string($text)
					) {
						$prodTech[] = [
							'tech_sheet_text' => trim($text),
							'tech_sheet_level' => ((strrpos($key, '_S') !== false) ? 3 : ((strrpos($key, '_M') !== false) ? 2 : 1)),
							'tech_sheet_hierarchy' => $key,
						];
					}
				}
			}

			$productAdd = array(
				'prod_name' => trim($prod['prodname']),
				'prod_canonial_name' => trim($prod['prod_canonial_name']),
				'prod_primary_image' => str_replace(' ', '_', trim($prod['prodPrimaryImage'])),
				'prod_added_user' => $this->loggedInUser['user_id'],
				'prod_updated_user' => $this->loggedInUser['user_id'],
				'prod_details' => $prod_details,
				'prod_category' => ((isset($prod['prodCategory']) && !empty($prod['prodCategory']))? $prod['prodCategory'] : 0),
				'prod_brand' => ((isset($prod['prodBrand']) && !empty($prod['prodBrand']))? $prod['prodBrand'] : 0),
				'prod_images' => $prod_images,
				'related_prod' => (isset($prod['similarProd'])? $prod['similarProd'] : array()),
				'prod_opt_type' => $prod_opt_type,
				'tech_data_sheet' => $prodTech,
				'metatag'=>trim($prod['metatag']),
				'rating'=>trim($prod['rating']),
				'prdspec'=>trim($prod['prdspec'])
			);
			
			if (isset($prod['pid']) && !empty($prod['pid'])) {
				// Edit product
				$productAdd = array_merge($productAdd, array('pid' => trim($prod['pid'])));
			}
			$save = $this->acpProducts->saveProduct($productAdd);
			if ($save) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Product '.((isset($prod['pid']) && !empty($prod['pid']))? 'updated' : 'added').' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	// Slug for product name
	public function doSlugify()
	{
		if ($this->input->is_ajax_request()) {
			$text = $this->input->post('text', true);
			$except = $this->input->post('except', true);
			$resp = false;
			if (!empty($text) && (trim($text) != '')) $resp = $this->acpProducts->doSlugify($text, $except);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Product slug created successfully.', 'slugText' => $resp['slugText']));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		}
	}

	// Product delete / lock / unlock
	public function action()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$prod = $this->input->post('prod', true);
			$action = $this->input->post('action', true); // 2=> delete / 0=> lock / 1=> unlock
			$resp = $this->acpProducts->action($prod, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Product '.(($action == 'delete')? 'deleted' : (($action == 'unlock')? 'unlocked' : 'locked')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}
