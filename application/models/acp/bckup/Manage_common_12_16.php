<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_common extends Ifix_Model
{
	public function __construct()
    {   
      	parent::__construct();
    }

    public function getSiteDetails()
    {
		$getSiteDetails = $this->db->select('S.*, UNIX_TIMESTAMP(S.site_created_date) AS unix_site_created_date, UNIX_TIMESTAMP(site_updated_date) AS unix_site_updated_date')->from("{$this->table["site"]} S")->where(array('site_status' => 1))->get()->row_array();
		return $getSiteDetails;
    }

    public function getCountry($search = null, $column = 'country_id')
    {
		$this->db->from("{$this->table["countries"]}");
		if (!empty($search) && (in_array($column, array('country_id', 'country_code', 'country_name', 'alt_names')))) {
			$getCountry = $this->db->where(array($column => trim($search)))->get()->row_array();
		} else {
			$getCountry = $this->db->get()->result_array();
		}
		return $getCountry;
    }

	public function getProvince($search = null, $column = 'province_id')
    {
		$this->db->from("{$this->table["provinces"]}");
		if (!empty($search) && (in_array($column, array('province_id', 'country_id', 'province_code', 'province_name', 'alt_names')))) {
			if ($column == 'province_id')
			$getProvince = $this->db->where(array('province_id' => trim($search)))->get()->row_array();
			else 
			$getProvince = $this->db->where(array($column => trim($search)))->get()->result_array();
		} else {
			$getProvince = $this->db->get()->result_array();
		}
		return $getProvince;
    }

	public function getTZ($tz = null)
    {
		$this->db->from("{$this->table["timezones"]}");
		if (!empty($tz)) {
			$getTZ = $this->db->where(array('id' => $tz))->get()->row_array();
		} else {
			$getTZ = $this->db->get()->result_array();
		}
		return $getTZ;
    }

	public function hasUserAccess($moduleid = null, $role = null)
    {
		if (!empty($role) && !empty($moduleid)) {
			$hasUserAccess = $this->db->from("{$this->table["user_role_module_permission"]} URMP")
				->join("{$this->table["modules"]} M", 'M.mod_id = URMP.perm_module_id AND M.mod_status = 1')
				->where(array('URMP.perm_role_id' => $role, 'URMP.perm_module_id' => $moduleid))
				->get()->row_array();
			if (!empty($hasUserAccess)) return true;
		}
		return false;
    }

	public function getAvailableCurrencies($search = null, $column = 'currency_id')
	{
		$this->db->from("{$this->table["currency"]}")->where(array('currency  != ' => null));
		if (!empty($search) && (in_array($column, array('currency_id', 'currency_name', 'currency', 'country_name')))) {
			$getCurrency = $this->db->where(array($column => trim($search)))->get()->row_array();
		} else {
			$getCurrency = $this->db->get()->result_array();
		}
		return $getCurrency;
	}


	public function getdata(){

		return $this->db->get('metadetails')->row();

	}


	public function insertdata($data){
		return $this->db->insert('metadetails',$data);

	}



}