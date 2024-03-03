<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Staffs";
		$this->data['main_menu_active'] = 'Staffs';
		$this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array("Staffs" => array('active' => true, 'link' => site_url().'acp/Staffs'));
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_staffs', 'acpStaffs');
		$this->load->model('acp/Manage_staffRoles', 'acpStaffRoles');
		date_default_timezone_set(TIMEZONE);
	}

	// Initial Listing
	public function index()
	{
		if (!hasUserAccess(2)) acp_show403();
		$this->data['page_title'] = "List Staffs";
		$this->data['page_breadcrumb'] = array("Staffs" => array('active' => false, 'link' => site_url().'acp/Staffs'), "List Staffs" => array('active' => true, 'link' => ''));
		$this->data['sub_menu_active'] = "List Staffs";
		$this->load->view('acp/staffs', $this->data);
	}

	// Ajax Listing
	public function getStaffsTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['staffs'] = $this->acpStaffs->getStaffs();
			$this->load->view('acp/includes/staffsTable', $this->data);
		}
	}

	// Add/Edit Staffs
	public function add($uid = null, $view = false)
	{
		if (!hasUserAccess(2)) acp_show403();
		$this->data['page_title'] = ((empty($uid))? "Add" : (($view)? "View" : "Edit" ))." Staff";
		$this->data['page_breadcrumb'] = array("Staffs" => array('active' => false, 'link' => site_url().'acp/Staffs'), ((empty($uid))? "Add" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		$this->data['sub_menu_active'] = ((empty($uid))? "Add Staff" : "List Staffs");
		$this->data['staff'] = array();
		$this->data['roles'] = $this->acpStaffRoles->getStaffRoles();
		if (!empty($uid)) $this->data['staff'] = $this->acpStaffs->getStaffs($uid);
		$this->load->view('acp/addStaffs', $this->data);
	}

	// Ajax request, to get related state listing
	public function getStates()
	{
		if ($this->input->is_ajax_request()) {
			$search = $this->input->post('country', true);
			$states = getProvince($search, 'country_id');
			send_json_response($states);
		}
	}

	// Save or Update a Staffs
	public function save()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$staff = $this->input->post(null, true);
			$tz = '';
			if ((trim($staff['timezone']) != 0) && (trim($staff['timezone']) != '')) {
				$tzarr = getTZ($staff['timezone']);
				if (!empty($tzarr)) {
					$tz = $tzarr['tz_name'];
				}
			}
			$staffAdd = array(
				'user_firstname' => trim($staff['firstname']),
				'user_lastname' => trim($staff['lastname']),
				'user_role' => trim($staff['userRole']),
				'user_avatar' => ((trim($staff['staffImg']) != '')? trim($staff['staffImg']) : ''),
				'user_email1_type' => 'Primary',
				'user_primary_email' => trim($staff['primaryemail']),
				'user_email2_type' => trim($staff['emailtype2']),
				'user_email2_id' => trim($staff['emailid2']),
				'user_phone1_type' => trim($staff['phonetype1']),
				'user_primary_phone' => trim($staff['phonenum1']),
				'user_phone2_type' => trim($staff['phonetype2']),
				'user_phone2_number' => trim($staff['phonenum2']),
				'user_address_line1' => trim($staff['addressline1']),
				'user_address_line2' => trim($staff['addressline2']),
				'user_city' => trim($staff['city']),
				'user_state' => trim($staff['state']),
				'user_country' => trim($staff['country']),
				'user_pin' => trim($staff['pincode']),
				'user_tz_id' => trim($staff['timezone']),
				'user_tz' => $tz,
			);
			if (isset($staff['sid']) && !empty($staff['sid'])) {
				// In case, password is defined by user
				$mailNotify = false;
				if (trim($staff['newpswrd']) != '') {
					$password = trim($staff['newpswrd']);
					$staffAdd = array_merge($staffAdd, array('user_pass' => password_hash($password, PASSWORD_BCRYPT)));
					$mailNotify = true;
				}

				// Edit staff
				$staffAdd = array_merge($staffAdd, array('user_id' => trim($staff['sid']), 'user_updated_date' => mysql_datetime()));
			} else {
				$mailNotify = true;
				// Add staff
				$staff['firstname'] = str_replace(' ', '_', trim($staff['firstname']));
				$staff['lastname'] = str_replace(' ', '_', trim($staff['lastname']));
				$password = str_shuffle($staff['firstname'].'@'.rand(100,9999).'#'.strtoupper($staff['lastname']));

				// In case, password is defined by user
				if (trim($staff['newpswrd']) != '') {
					$password = trim($staff['newpswrd']);
				}

				$staffAdd = array_merge($staffAdd, array('user_pass' => password_hash($password, PASSWORD_BCRYPT), 'user_status' => 1, 'user_created_date' => mysql_datetime(), 'user_updated_date' => mysql_datetime()));
			}
			$save = $this->acpStaffs->saveStaff($staffAdd);
			if ($save) {
				if ((isset($staff['sid']) && empty($staff['sid'])) || $mailNotify) {
					// Put contacting email here
					$from_name = $admin_name = sitename();
					$from_email = site_mailfrom();
					$admin_email = site_mailto();
					$replyto_email = site_mailreplyto();
						
					// To send HTML mail, the Content-type header must be set
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: '.$from_name.' <'.$from_email.'>' . "\r\n";
					$headers .= 'X-Mailer: PHP/' . phpversion() . PHP_EOL;

					$php_template = sitename().' welcomes you to join with us.<br><br><a href="'.site_url().'acp/" target="_blank">Click here go to Login</a><br><br>Here is your '.((isset($staff['sid']) && empty($staff['sid']))? '' : 'changed').' login details.<br>Username: '.$staffAdd['user_primary_email'].'<br>Password: '.$password.'<br><br>Date: '.date(SITE_DATE_FORMAT).' at '.date(SITE_TIME_FORMAT). ' - '.TIMEZONE.'<br><br>If you having any issues in login, please let us know immediatly by replying to this mail or directly contacting '.sitename().' Admin.<br><br>';

					// Sending mail to Customer
					$reply_headers = 'Reply-To: '.$admin_name.' <'.$replyto_email.'>' . PHP_EOL;
					$php_template_header = '<h4>Hi ' . trim($staffAdd['user_firstname']) . ',</h4>';
					$php_template_footer = '<br/><br/>This is a system generated notification mail.<br/>';
					$php_sendmessage = "<div style=\"background-color:#83739c; padding:0px 75px 50px; font-family:sans-serif;\"><div style=\"padding: 25px 0px;text-align: center;color: white;font-size: 24px;font-weight: 600;\">".sitename()."</div><div style=\"background-color:#fff; padding:20px;\"><div style=\"background-color:#fff; color:#333;\">" . $php_template_header.$php_template.$php_template_footer . "</div></div></div>";
					mail(trim($staffAdd['user_primary_email']), "Welcomes you", $php_sendmessage); // , $headers
				}
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Staff '.((isset($staff['sid']) && !empty($staff['sid']))? 'updated' : 'added').' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	// Activate, Inactivate & Delete a Staffs
	public function action()
	{
		if (!hasUserAccess(2)) acp_show403();
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$staff = $this->input->post('staff', true);
			$action = $this->input->post('action', true); // 0=> Inactive / 1=> Active / 2=> Delete
			$resp = $this->acpStaffs->action($staff, $action, $this->loggedInUser['user_id']);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Staff '.(($action == '0')? 'deactivated' : (($action == '1')? 'activated' : 'deleted')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	// Ajax: Validate password for Staff/User
	public function validate_password()
	{
		if ($this->input->is_ajax_request()) {
			// Check current password
			$old = $this->input->post('old', true);
			$this->load->model('acp/Manage_login', 'acpLogin');
			$resp = $this->acpLogin->validate_password($old, $this->loggedInUser['user_id']);
			if ($resp) {
				send_json_response(array('status' => true));
			} else {
				send_json_response(array('status' => false));
			}
		}
	}

	// Change password for Staff/User
	public function change_password($uid = null)
	{
		if ($this->input->is_ajax_request()) {
			// Do change password
			$new = $this->input->post('new', true);
			$user = $this->input->post('uid', true);
			$resp = $this->acpStaffs->change_password($new, $user);
			if ($resp) {
				$userDtl = $this->acpStaffs->getStaffs($user);

				// Put contacting email here
				$from_name = $admin_name = sitename();
				$from_email = site_mailfrom();
				$admin_email = site_mailto();
				$replyto_email = site_mailreplyto();
					
				// To send HTML mail, the Content-type header must be set
				$php_headers = 'MIME-Version: 1.0' . PHP_EOL;
				$php_headers .= 'Content-type: text/html; charset=iso-8859-1' . PHP_EOL;
				$php_headers .= 'From: '.$from_name.' <'.$from_email.'>' . PHP_EOL;
				$php_headers .= 'X-Mailer: PHP/' . phpversion() . PHP_EOL;

				$php_template = 'Your password is changed successfully.<br/>Date: '.date(SITE_DATE_FORMAT).' at '.date(SITE_TIME_FORMAT). ' - '.TIMEZONE.'<br><br>If you did not changed the password, please let us know immediatly by replying to this mail or directly contacting '.sitename().' Admin.<br><br>';

				// Sending mail to Customer
				$reply_headers = 'Reply-To: '.$admin_name.' <'.$replyto_email.'>' . PHP_EOL;
				$php_template_header = '<h4>Hi ' . trim($userDtl['user_firstname']) . ',</h4><br/><br/>';
				$php_template_footer = 'This is a system generated notification mail.<br/>';
				$php_sendmessage = "<div style=\"background-color:#83739c; padding:0px 75px 50px; font-family:sans-serif;\"><div style=\"padding: 25px 0px;text-align: center;color: white;font-size: 24px;font-weight: 600;\">".sitename()."</div><div style=\"background-color:#fff; padding:20px;\"><div style=\"background-color:#fff; color:#333;\">" . $php_template_header.$php_template.$php_template_footer . "</div></div></div>";
				mail(trim($userDtl['user_primary_email']), "Password changed", $php_sendmessage); // , $php_headers

				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Password updated successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			// Show view page
			$this->data['page_title'] = "Staff Settings";
			$this->data['page_breadcrumb'] = array("Staffs" => array('active' => false, 'link' => site_url().'acp/Staffs'), "Staff Settings" => array('active' => true, 'link' => ''));
			$this->data['sub_menu_active'] = "";
			$this->data['uid'] = ((!empty($uid))? base64_decode(base64_decode(urldecode($uid))) : $this->loggedInUser['user_id']);
			$this->data['validOldPwd'] = ((!empty($uid))? 0 : 1);
			$this->load->view('acp/change_password', $this->data);
		}
	}

}
