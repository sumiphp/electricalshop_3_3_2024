<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquires extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Enquires";
		$this->data['main_menu_active'] = 'Enquires';
        $this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array();
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_support', 'acpSupport');
		if (!hasUserAccess(12)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	// Initial Listing
	public function index()
	{
		$this->load->view('acp/enquires', $this->data);
	}

	// Ajax Listing
	public function getEnquiresTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['enquires'] = $this->acpSupport->getEnquires();
			$this->load->view('acp/includes/enquiresTable', $this->data);
		}
	}

    // Detail view of request
	public function view($qaid = null)
	{
		if (!empty($qaid)) {
			$this->data['request'] = $this->acpSupport->getEnquires($qaid);
			$this->data['page_breadcrumb'] = array("Enquires" => array('active' => false, 'link' => site_url().'acp/Enquires'), 'Detail Page' => array('active' => true, 'link' => ''));
			
			if (!empty($qaid)) {
				if ($this->data['request']['cus_status'] == 1) $this->acpSupport->action($qaid, 'read');
				$this->load->view('acp/contactus-dtl', $this->data);
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
			$qaid = $this->input->post('qaid', true);
			$action = $this->input->post('action', true); // delete / read / unread
			$resp = $this->acpSupport->action($qaid, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Enquirey '.(($action == 'delete')? 'deleted' : (($action == 'read')? 'marked as read' : 'marked as unread')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}
