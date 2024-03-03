<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TermsandConditions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Our Policies";
		$this->data['main_menu_active'] = 'Our Policies';
		$this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array();
		$this->is_logged_in = $this->session->userdata('acp_login');
		if (!$this->is_logged_in) { redirect('acp'); }
		$this->load->model('acp/Manage_tnc', 'acpTnC');
		if (!hasUserAccess(18)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	public function index()
	{
		$this->data['tnc'] = $this->acpTnC->getTnc();
		$this->load->view('acp/termsandconditions', $this->data);
	}

    public function save()
	{
		if ($this->input->is_ajax_request()) {
            // Fetching data from form
			$tnc = $this->input->post('tnc', FALSE);
            if (isset($tnc) && (trim($tnc) != '')) {
                $data = array('tnc' => html_escape($tnc),
						'loggedInUser' => loggedInUser()
					);
                $save = $this->acpTnC->saveTnc($data);

                if ($save) {
                    send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Saved successfully. Same will be reflected in front-end and all new mails.'));
                } else {
                    send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
                }
            } else {
                send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Our Policies content is required.'));
            }
		} else {
			acp_show404();
		}
	}

}
