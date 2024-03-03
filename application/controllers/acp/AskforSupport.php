<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AskforSupport extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Ask For IFIX Support";
		$this->data['main_menu_active'] = 'Ask for IFIX Support';
		$this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array();
		$this->is_logged_in = $this->session->userdata('acp_login');
		if (!$this->is_logged_in) { redirect('acp'); }
		$this->load->model('acp/Manage_support', 'acpSupport');
		if (!hasUserAccess(8)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	public function index()
	{
        $this->data['ticket_type'] = array(1 => 'Report Issue', 2 => 'Ask for Support', 3 => 'Enquiry');
        $this->data['ticket_priority'] = array(1 => 'Low', 2 => 'Normal', 3 => 'High', 4 => 'Urgent');
		$this->load->view('acp/askfosupport', $this->data);
	}

	public function send()
	{
		if ($this->input->is_ajax_request()) {
			// Put contacting email here
			$from_name = $admin_name = sitename();
			$from_email = site_mailfrom(); // sales@ifixcompany.online
			$admin_email = site_mailto(); // abumathew@ifixcompany.online
			$replyto_email = site_mailreplyto(); // noreply@example.com
			
			// Fetching data from form
			$data = $this->input->post(null, true);
			$subject = ((isset($data['ticket_type']))? (($data['ticket_type'] == 1)? 'Report Issue' : (($data['ticket_type'] == 2)? 'Ask for Support' : (($data['ticket_type'] == 3)? 'Enquiry' : 'Asking for iFix Support' ) ) ) : 'Asking for iFix Support');
			$loggedInUser = loggedInUser();
			$data = array_merge($data, array('subject' => $subject, 'loggedInUser' => $loggedInUser, 'sitedetails' => sitedetails()));
			$save = $this->acpSupport->saveSupport($data);
			if ($save) {
                $message = $this->load->view('acp/supportmail_template', $data, true);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: '.$from_name.' <'.$from_email.'>' . "\r\n"; // . "CC: ".$loggedInUser['user_primary_email'];
                mail($admin_email, $subject, $message, $headers);
				
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Mail send successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}
