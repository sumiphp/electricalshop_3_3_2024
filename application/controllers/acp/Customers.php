<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Clients";
		$this->data['main_menu_active'] = 'Clients';
		$this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array("Clients" => array('active' => true, 'link' => site_url().'acp/Clients'));
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_customers', 'acpCustomers');
		if (!hasUserAccess(3)) acp_show403();
	}

	// Initial Listing
	public function index()
	{

		echo "hello";
		$this->data['page_title'] = "List Clients";
		$this->data['page_breadcrumb'] = array("Clients" => array('active' => false, 'link' => site_url().'acp/Clients'), "List Clients" => array('active' => true, 'link' => ''));
		$this->data['sub_menu_active'] = "List Clients";
		$this->load->view('acp/customers', $this->data);
	}

	// Ajax Listing
	public function getCustomersTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['customers'] = $this->acpCustomers->getCustomers();
			print_r($this->data['customers']);
			//$this->load->view('acp/includes/customersTable', $this->data);
		}
	}

	// Add/Edit customers
	public function add($cid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($cid))? "Add" : (($view)? "View" : "Edit" ))." Client";
		$this->data['page_breadcrumb'] = array("Clients" => array('active' => false, 'link' => site_url().'acp/Clients'), ((empty($cid))? "Add" : "Edit") => array('active' => true, 'link' => ''));
		$this->data['sub_menu_active'] = ((empty($cid))? "Add Clients" : "List Clients");
		$this->data['customer'] = array();
		if (!empty($cid)) $this->data['customer'] = $this->acpCustomers->getCustomers($cid);
		$this->load->view('acp/addCustomers', $this->data);
	}

	// Save or Update a customer
	public function save()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$customer = $this->input->post(null, true);

			$customerAdd = array(
				'cust_id' => $customer['cid'],
				'cust_firstname' => trim($customer['firstname']),
				'cust_lastname' => trim($customer['lastname']),
				'cust_email' => trim($customer['emailid1']),
				'cust_phone1' => trim($customer['phonenum1']),
				'cust_phone2' => trim($customer['phonenum2']),
				'cust_adrs' => trim($customer['customeraddress']),
				'cust_note' => trim($customer['customerdesc']),
				'cust_added_by' => $this->loggedInUser['user_id'],
				'cust_updated_by' => $this->loggedInUser['user_id'],
				'cust_created_date' => mysql_datetime(),
				'cust_status' => 1,
			);
			if (isset($customer['cid']) && !empty($customer['cid'])) {
				$customerAdd = array_merge($customerAdd, array('cust_updated_date' => mysql_datetime()));
			}
			$save = $this->acpCustomers->saveCustomer($customerAdd);
			if ($save) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Customer '.((isset($customer['cid']) && !empty($customer['cid']))? 'updated' : 'added').' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	// Activate, Inactivate & Delete a Customer
	public function action()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$customer = $this->input->post('customer', true);
			$action = $this->input->post('action', true); // 0=> Inactive / 1=> Active / 2=> Delete
			$resp = $this->acpCustomers->action($customer, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Customer '.(($action == '0')? 'deactivated' : (($action == '1')? 'activated' : 'deleted')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}
