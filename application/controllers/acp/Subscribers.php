<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Subscribers";
		$this->data['main_menu_active'] = 'Subscribers';
		$this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array("Subscribers" => array('active' => true, 'link' => site_url().'acp/Subscribers'));
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_subscribers', 'acpSubscribers');
		if (!hasUserAccess(15)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	// Initial Listing
	public function index()
	{
		$this->data['page_title'] = "List Subscribers";
		$this->data['page_breadcrumb'] = array("Subscribers" => array('active' => false, 'link' => site_url().'acp/Subscribers'), "List Subscribers" => array('active' => true, 'link' => ''));
		$this->data['sub_menu_active'] = "List Subscribers";
		$this->load->view('acp/subscribers', $this->data);
	}

	// Ajax Listing
	public function getSubscribersTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['subscribers'] = $this->acpSubscribers->getSubscribers();
			$this->load->view('acp/includes/subscribersTable', $this->data);
		}
	}

	// Unsubscribe
	public function unsubscribe()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$cid = $this->input->post('cid', true);
			$resp = $this->acpSubscribers->unsubscribe($cid);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Unsubscribed successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}