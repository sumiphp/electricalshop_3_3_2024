<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ifix_Model extends CI_Model {

	/**
	*	IFIX custom model
	*	@author IFIX COMPANY
	*/
	public function __construct() {
		$this->table = $this->config->item('tables');
	}

}