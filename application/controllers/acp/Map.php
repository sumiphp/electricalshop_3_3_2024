<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Map";
		$this->data['main_menu_active'] = 'Map';
        $this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array();
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_support', 'acpSupport');
		if (!hasUserAccess(10)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	// Add map details
	public function index()
	{
		$this->load->view('acp/addMap', $this->data);
	}

    // save map details
	public function save()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$map = $this->input->post(null, true);
			$map = array_merge($map, array('site_updated_date' => mysql_datetime()));
			$save = $this->acpSupport->saveMap($map);
			if ($save) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Map details successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}
