<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Login";
		$this->data['page_breadcrumb'] = array();
		$this->data['sub_menu_active'] = '';
		$this->load->model('acp/Manage_login', 'acpLogin');
		$this->is_logged_in = $this->session->userdata('acp_login');
	}

	public function index()
	{
		if ($this->is_logged_in) redirect('acp/Dashboard');
		$this->load->view('acp/login', $this->data);
	}

	public function check_access()
	{
		if ($this->input->is_ajax_request()) {
			$redirect = '';
			$uname = $this->input->post('uname', true);
			$upass = $this->input->post('upass', true);
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('uname', 'Username', 'trim|required');
			$this->form_validation->set_rules('upass', 'Password', 'trim|required');

			if ($this->form_validation->run() !== false ) {
				$resp = $this->acpLogin->check_access($uname, $upass);
				if (!empty($resp)) {
					$this->session->set_userdata('acp_login', 1);
					$this->session->set_userdata('acp_login_user', $resp);
				}
			} else {
				$this->session->set_flashdata('message', validation_errors());
				redirect('acp');
			}

			if ($resp) {
				userTimeZone();
				if (hasUserAccess(1)) $redirect = 'acp/Dashboard';
				else if (hasUserAccess(2)) $redirect = 'acp/Staffs';
				else if (hasUserAccess(3)) $redirect = 'acp/Customers';
				else if (hasUserAccess(4)) $redirect = 'acp/Quotations';
				else if (hasUserAccess(5)) $redirect = 'acp/Projects';
				$this->session->set_userdata('acp_login', 1);
				echo json_encode(array('status' => 'success', 'title' => 'Succcess', 'message' => 'Login successfull.', 'redirect' => $redirect));
			} else {
				echo json_encode(array('status' => 'error', 'title' => 'Error', 'message' => 'Login invalid.'));
			}
		} else {
			show_404();
		}
	}

	public function logout()
	{
		if ($this->is_logged_in) {
			$this->session->unset_userdata('acp_login');
			$this->is_logged_in = 0;
		}
		redirect('acp');
	}

}