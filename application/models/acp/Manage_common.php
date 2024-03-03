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

		return $this->db->get('homepagedetails')->row();

	}


	public function updatedata($data){
		return $this->db->update('homepagedetails',$data);

	}


	function get_menus(){
		$this->db->where('menutype',1);
		$this->db->where('status',1);
		$this->db->order_by("orderno", "asc");
		$this->db->select('*');
		$this->db->from('menus');
		$query = $this->db->get();
		return $query->result_array();
	
	}






	
	function get_menuadmin($limit,$start){
        $this->db->limit($limit,$start);
        $this->db->select('*');
        $this->db->from('menus');
        $query = $this->db->get();
        return $query->result_array(); 
        }
		function get_countmenu(){
			$this->db->select('*');
			$this->db->from('menus');
			$query = $this->db->get();
			return $rowcount = $query->num_rows();
		
		}

function get_countcustomers(){

	$this->db->select('*');
	//$this->db->from('customers');
	$this->db->from('userlogin');
	$query = $this->db->get();
	return $rowcount = $query->num_rows();


}


public function get_customers($bid = null)
{

	
	 $this->db->select('*');
	 $this->db->from('userlogin');
	 $query = $this->db->get();
	 return $query->result_array();
 
 }




 public function get_billingdetails($bid = null)
 {
 
	 
	  $this->db->select('*');
	  $this->db->from('billingdetails');
	  $query = $this->db->get();
	  return $query->result_array();
  
  }
 
  function get_countbillingdetails(){

	$this->db->select('*');
	//$this->db->from('customers');
	$this->db->from('billingdetails');
	$query = $this->db->get();
	return $rowcount = $query->num_rows();


}





		public function getMenu($bid = null)
   {
 
        //$this->db->where('menutype',1);
        //$this->db->where('status',1);
        //$this->db->order_by("orderno", "asc");
        $this->db->select('*');
        $this->db->from('menus');
        $query = $this->db->get();
        return $query->result_array();
    
    }



	function get_carousalactive(){
		$this->db->where('active',1);
		$this->db->select('*');
		$this->db->from('carousel');
		$query = $this->db->get();
		return $query->result_array();
	
	
	}
	function get_countcarousel(){
	$this->db->select('*');
		$this->db->from('carousel');
		$query = $this->db->get();
		return $query->num_rows();
	
	
	}
	
	public function get_carousel($limit,$start){
		$this->db->limit($limit,$start);
		//$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->from('carousel');
		$query = $this->db->get();
		return $query->result_array();
	
	
	
	}

	//getcarousal

	public function getcarousal(){
		//$this->db->limit($limit,$start);
		//$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->from('carousel');
		$query = $this->db->get();
		return $query->result_array();
	
	
	
	}
	public function getcarousalrow($id){

$this->db->where('carouselid',$id);
		$this->db->select('*');
		$this->db->from('carousel');
		$query = $this->db->get();
		return $query->row();



	}



	public function getmenurow($id){

		$this->db->where('menuid',$id);
				$this->db->select('*');
				$this->db->from('menus');
				$query = $this->db->get();
				return $query->row();
		
		
		
			}

			function get_parentmenus(){
				$this->db->where('status',1);
				$this->db->where('menutype',1);
				$this->db->select('*');
				$this->db->from('menus');
				$query = $this->db->get();
				return $query->result_array();
			}



	public function actionMenu($menu = null, $action = null)
	{
		//$menu=37;
		if (!empty($menu) && !empty($action)) {
			if ($action == 'delete') { // Delete this product
                //$this->db->update("{$this->table["brands"]}", array('brand_status' => 2), array('menuid' => $menu)));

				$this->db->where('menuid',$menu);
                $this->db->delete('menus');
                return true;
			} else if ($action == 'unlock') { // Make available in frontend
				//$this->db->update("{$this->table["brands"]}", array('brand_status' => 1), array('menuid' => $menu)));
                return true;
			} else if ($action == 'lock') { // Make unavailable in frontend
				//$this->db->update("{$this->table["brands"]}", array('brand_status' => 0), array('menuid' => $menu)));
                return true;
			}
		}
        return false;
	}



	public function actioncarousel($carousel = null, $action = null)
	{
		//$menu=37;
		if (!empty($carousel) && !empty($action)) {
			if ($action == 'delete') { // Delete this product
                //$this->db->update("{$this->table["brands"]}", array('brand_status' => 2), array('menuid' => $menu)));

				$this->db->where('carouselid',$carousel);
                $this->db->delete('carousel');
                return true;
			} else if ($action == 'unlock') { // Make available in frontend
				//$this->db->update("{$this->table["brands"]}", array('brand_status' => 1), array('menuid' => $menu)));
                return true;
			} else if ($action == 'lock') { // Make unavailable in frontend
				//$this->db->update("{$this->table["brands"]}", array('brand_status' => 0), array('menuid' => $menu)));
                return true;
			}
		}
        return false;
	}


	public function actioncust($custid = null, $action = null)
	{
		//$menu=37;
		if (!empty($custid) && !empty($action)) {
			if ($action == 'delete') { // Delete this product
                //$this->db->update("{$this->table["brands"]}", array('brand_status' => 2), array('menuid' => $menu)));

				$this->db->where('userid',$custid);
                $this->db->delete('userlogin');
                return true;
			} else if ($action == 'unlock') { // Make available in frontend
				//$this->db->update("{$this->table["brands"]}", array('brand_status' => 1), array('menuid' => $menu)));
                return true;
			} else if ($action == 'lock') { // Make unavailable in frontend
				//$this->db->update("{$this->table["brands"]}", array('brand_status' => 0), array('menuid' => $menu)));
                return true;
			}
		}
        return false;
	}





	public function actionbill($billid = null, $action = null)
	{
		//$menu=37;
		if (!empty($billid) && !empty($action)) {
			if ($action == 'delete') { // Delete this product
                //$this->db->update("{$this->table["brands"]}", array('brand_status' => 2), array('menuid' => $menu)));

				$this->db->where('billingid',$billid);
                $this->db->delete('billingdetails');
                return true;
			} else if ($action == 'unlock') { // Make available in frontend
				//$this->db->update("{$this->table["brands"]}", array('brand_status' => 1), array('menuid' => $menu)));
                return true;
			} else if ($action == 'lock') { // Make unavailable in frontend
				//$this->db->update("{$this->table["brands"]}", array('brand_status' => 0), array('menuid' => $menu)));
                return true;
			}
		}
        return false;
	}





	public function  insert_product($insert_data){

		//print_r($insert_data);
		$this->db->insert("products",$insert_data);
		//echo $this->db->last_query();
		//die;
		return $this->db->insert_id(); 
		
		


	}

	public function insert_category($insert_datac){
		$this->db->insert("product_category",$insert_datac);
		return $this->db->insert_id(); 
		//echo $this->db->last_query();

	}

	public function insert_brand($insert_datab){
		$this->db->insert("product_brand",$insert_datab);
		return $this->db->insert_id(); 
		//echo $this->db->last_query();

	}


	public function insert_detail($insert_datad)
	{
		$this->db->insert("product_details",$insert_datad);
		return $this->db->insert_id(); 
		//echo $this->db->last_query();

	}





}