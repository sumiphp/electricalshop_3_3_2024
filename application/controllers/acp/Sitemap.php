<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Sitemap";
		$this->data['main_menu_active'] = 'Sitemap';
        $this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array();
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		if (!hasUserAccess(11)) acp_show403();
		if (! defined('MAIN_SITE_URL')) define('MAIN_SITE_URL', site_url());
	}

	// Initial Listing
	public function index()
	{
        $this->data['sitemap'] = generateSitemapContent();
		$this->load->view('acp/sitemap', $this->data);
	}

}
