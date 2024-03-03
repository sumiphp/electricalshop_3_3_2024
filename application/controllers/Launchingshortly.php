<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Launchingshortly extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "LaunchingShortly";
	}

	public function index()
	{
		$this->load->view('launchingshortly', $this->data);
	}

}
