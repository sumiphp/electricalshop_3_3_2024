<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Contact Us";
		$this->data['main_menu_active'] = 'Contact Us';
        $this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array();
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_support', 'acpSupport');
		if (!hasUserAccess(13)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	// Initial Listing
	public function index()
	{
		$this->load->view('acp/contactus', $this->data);
	}

	// Ajax Listing
	public function getContactusTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['contactus'] = $this->acpSupport->getContactus();
			$this->load->view('acp/includes/contactusTable', $this->data);
		}
	}

    // Detail view of request
	public function view($qaid = null)
	{
		if (!empty($qaid)) {
			$this->data['request'] = $this->acpSupport->getContactus($qaid);
			$this->data['page_breadcrumb'] = array("Contact Us" => array('active' => false, 'link' => site_url().'acp/Contactus'), 'Detail Page' => array('active' => true, 'link' => ''));
			
			if (!empty($qaid)) {
				if ($this->data['request']['cus_status'] == 1) $this->acpSupport->action($qaid, 'read');
				//$this->load->view('acp/contactus-dtl', $this->data);
				$this->load->view('acp/contactus', $this->data);
			} else {
				acp_show404();
			}
		} else {
			acp_show404();
		}
	}

	// Query delete
	public function action()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from quick assist tbl
			$qaid = $this->input->post('qaid', true);
			$action = $this->input->post('action', true); // delete / read / unread
			$resp = $this->acpSupport->action($qaid, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Query '.(($action == 'delete')? 'deleted' : (($action == 'read')? 'marked as read' : 'marked as unread')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}
