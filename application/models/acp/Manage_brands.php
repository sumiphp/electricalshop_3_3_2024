<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_brands extends Ifix_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Function to get brand of product
    // $bid = product brand id; Get a specific product brand
    public function getBrands($bid = null)
    {
        $getBrands = array();
        $this->db->select('B.*, UNIX_TIMESTAMP(B.brand_updated_date) AS unix_brand_updated_date')->from("{$this->table["brands"]} B");
        $this->db->where_in('B.brand_status', array(0, 1));
        if (!empty($bid)) {
            $this->db->where(array('B.brand_id' => $bid));
            $getBrands = $this->db->get()->row_array();
        } else {
            $getBrands = $this->db->order_by('B.brand_id', 'DESC')->get()->result_array();
        }
        return $getBrands;
    }

    // Save or update product brand
	public function saveProductBrand($brand = array())
	{
		if (!empty($brand)) {
            if (isset($brand['brand_id']) && !empty($brand['brand_id'])) {
                // Update product brand
                $brand['brand_updated_date'] = mysql_datetime();
                $this->db->update("{$this->table["brands"]}", $brand, array('brand_id' => $brand['brand_id']));
                return true;
            } else {
                // Add product brand
                $brand['brand_status'] = 1;
                $brand['brand_added_date'] = mysql_datetime();
                $this->db->insert("{$this->table["brands"]}", $brand);
                return true;
            }
        }
        return false;
    }

    // Product brand delete / lock / unlock
	public function actionBrand($brand = null, $action = null)
	{
		if (!empty($brand) && !empty($action)) {
			if ($action == 'delete') { // Delete this product
                $this->db->update("{$this->table["brands"]}", array('brand_status' => 2), array('brand_id' => $brand));
                return true;
			} else if ($action == 'unlock') { // Make available in frontend
				$this->db->update("{$this->table["brands"]}", array('brand_status' => 1), array('brand_id' => $brand));
                return true;
			} else if ($action == 'lock') { // Make unavailable in frontend
				$this->db->update("{$this->table["brands"]}", array('brand_status' => 0), array('brand_id' => $brand));
                return true;
			}
		}
        return false;
	}

    // Slug for brand name
    public function doBrandSlugify($text = null, $except = null)
    {
        if (!empty($text)) {
            $check = array();
            $slugify = slugify($text);
            do {
                if (!empty($check)) $slugify = $slugify.'-'.count($check);
                $where = array('brand_canonial_name' => $slugify);
                if (!empty($except)) $where = array_merge($where, array('brand_id != ' => $except));
                $check = $this->db->select('brand_canonial_name')->from('brands')->where($where)->get()->result_array();
            } while (!empty($check));
            return array('slugText' => $slugify);
        }
    }

}