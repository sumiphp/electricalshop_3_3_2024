<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Dashboard";
		$this->data['main_menu_active'] = 'Dashboard';
		$this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array();
		$this->is_logged_in = $this->session->userdata('acp_login');
		if (!$this->is_logged_in) { redirect('acp'); }
		$this->load->model('acp/Manage_dashboard', 'acpDashboard');
		if (!hasUserAccess(1)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	public function index()
	{
		$this->data['products'] = $this->db->where(['prod_status' => 1])->from("products")->count_all_results();
		$this->data['brands'] = $this->db->where(['brand_status' => 1])->from("brands")->count_all_results();
		$this->data['categories'] = $this->db->where(['cat_status' => 1])->from("category")->count_all_results();
		$this->data['contact_us'] = $this->db->where(['cus_status !=' => 0, 'is_enquiry' => '0', 'get_in_touch' => '0'])->from("contact_us")->count_all_results();
		$this->data['enquiries'] = $this->db->where(['cus_status !=' => 0, 'is_enquiry' => '1'])->from("contact_us")->count_all_results();
		$this->data['get_in_touch'] = $this->db->where(['cus_status !=' => 0, 'get_in_touch' => '1'])->from("contact_us")->count_all_results();
		$this->load->view('acp/dashboard', $this->data);
	}
}
