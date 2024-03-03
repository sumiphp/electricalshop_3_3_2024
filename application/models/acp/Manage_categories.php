<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_categories extends Ifix_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Function to get category of product
    // $bid = product category id; Get a specific product category
    public function getCategories($bid = null)
    {
        $getCategories = array();
        $this->db->select('B.*, UNIX_TIMESTAMP(B.cat_updated_date) AS unix_cat_updated_date')->from("{$this->table["categories"]} B");
        $this->db->where_in('B.cat_status', array(0, 1));
        if (!empty($bid)) {
            $this->db->where(array('B.cat_id' => $bid));
            $getCategories = $this->db->get()->row_array();
        } else {
            $getCategories = $this->db->order_by('B.cat_id', 'DESC')->get()->result_array();
        }
        return $getCategories;
    }

    // Save or update product category
	public function saveProductCategory($category = array())
	{
		if (!empty($category)) {
            if (isset($category['cat_id']) && !empty($category['cat_id'])) {
                // Update product category
                $category['cat_updated_date'] = mysql_datetime();
                $this->db->update("{$this->table["categories"]}", $category, array('cat_id' => $category['cat_id']));
                return true;
            } else {
                // Add product category
                $category['cat_status'] = 1;
                $category['cat_added_date'] = mysql_datetime();
                $this->db->insert("{$this->table["categories"]}", $category);
                return true;
            }
        }
        return false;
    }

    // Product category delete / lock / unlock
	public function actionCategory($category = null, $action = null)
	{
		if (!empty($category) && !empty($action)) {
			if ($action == 'delete') { // Delete this product
                $this->db->update("{$this->table["categories"]}", array('cat_status' => 2), array('cat_id' => $category));
                return true;
			} else if ($action == 'unlock') { // Make available in frontend
				$this->db->update("{$this->table["categories"]}", array('cat_status' => 1), array('cat_id' => $category));
                return true;
			} else if ($action == 'lock') { // Make unavailable in frontend
				$this->db->update("{$this->table["categories"]}", array('cat_status' => 0), array('cat_id' => $category));
                return true;
			}
		}
        return false;
	}

    // Slug for category name
    public function doCategorySlugify($text = null, $except = null)
    {
        if (!empty($text)) {
            $check = array();
            $slugify = slugify($text);
            do {
                if (!empty($check)) $slugify = $slugify.'-'.count($check);
                $where = array('cat_canonial_name' => $slugify);
                if (!empty($except)) $where = array_merge($where, array('cat_id != ' => $except));
                $check = $this->db->select('cat_canonial_name')->from('categories')->where($where)->get()->result_array();
            } while (!empty($check));
            return array('slugText' => $slugify);
        }
    }

}