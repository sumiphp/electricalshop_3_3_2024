<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errorpages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Error";
		$this->data['page_breadcrumb'] = array("Error" => array('active' => true, 'link' => site_url()));
	}

	// Oops! Something went wrong .
	public function index()
	{
		$this->data['page_title'] = "Error 404";
		$this->load->view('acp/error/error_404', $this->data);
	}

	// Access to this resource on the server is denied
	public function error403()
	{
		$this->data['page_title'] = "Error 403";
		$this->load->view('acp/error/error_403', $this->data);
	}

	// Internal Server Error!
	public function error500()
	{
		$this->data['page_title'] = "Error 500";
		$this->load->view('acp/error/error_500', $this->data);
	}

}