<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Roles";
		$this->data['main_menu_active'] = "Staffs";
		$this->data['sub_menu_active'] = "Staff Roles";
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array("Staffs" => array('active' => false, 'link' => site_url().'acp/Staffs'), "Staff Roles" => array('active' => false, 'link' => site_url().'acp/Roles'));
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_staffRoles', 'acpStaffRoles');
		if (!hasUserAccess(9)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	// Initial Listing
	public function index()
	{
		$this->data['page_title'] = "List Roles";
		$this->data['page_breadcrumb'] = array("Staffs" => array('active' => false, 'link' => site_url().'acp/Staffs'), "Staff Roles" => array('active' => false, 'link' => site_url().'acp/Roles'), "List Roles" => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = "List Roles";
		$this->load->view('acp/staffRoles', $this->data);
	}

	// Ajax Listing
	public function getStaffRolesTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['roles'] = $this->acpStaffRoles->getStaffRoles();
			$this->load->view('acp/includes/staffsRoleTable', $this->data);
		}
	}

	// Add/Edit user role
	public function add($rid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($rid))? "Add" : (($view)? "View" : "Edit" ))." Role";
		$this->data['page_breadcrumb'] = array("Staffs" => array('active' => false, 'link' => site_url().'acp/Staffs'), "Staff Roles" => array('active' => false, 'link' => site_url().'acp/Roles'), ((empty($rid))? "Add" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = ((empty($rid))? "Add Role" : "List Roles");
		$this->data['role'] = array();
		$this->data['modules'] = $this->acpStaffRoles->getModules();
		if (!empty($rid)) $this->data['role'] = $this->acpStaffRoles->getStaffRoles($rid);
		$this->load->view('acp/addstaffRoles', $this->data);
	}

	// Save or Update a user role
	public function save()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$role = $this->input->post(null, true);
			$staffroleAdd = array(
				'role_id' => $role['rid'],
				'role_name' => trim($role['role']),
				'permissions' => $role['roleaccess'],
			);
			if (isset($role['rid']) && empty($role['rid'])) {
				unset($staffroleAdd['role_id']); // role id not required in caseof adding
			}
			$save = $this->acpStaffRoles->saveStaffrole($staffroleAdd);
			if ($save) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Staff role '.((isset($role['rid']) && !empty($role['rid']))? 'updated' : 'added').' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	// Activate, Inactivate & Delete a Staff roles
	public function action()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$role = $this->input->post('role', true);
			$action = $this->input->post('action', true); // 0=> Inactive / 1=> Active / 2=> Delete
			$resp = $this->acpStaffRoles->action($role, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Staff role '.(($action == '0')? 'deactivated' : (($action == '1')? 'activated' : 'deleted')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}
