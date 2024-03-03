<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_subscribers extends Ifix_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Function to get all subscriebrs
    // $uid = subscriber id; Get a specific subscribers
    public function getSubscribers($cid = null)
	{
        $this->db->select('D.*, UNIX_TIMESTAMP(D.cust_created_date) AS unix_cust_created_date')
            ->from('customers AS D')
            ->where(array('D.cust_status' => 1, 'D.cust_opt_in' => 1));
        if (!empty($cid)) {
            $this->db->where(array('D.cust_id' => $cid));
            $getSubscribers = $this->db->get()->row_array();
        } else {
            $getSubscribers = $this->db->get()->result_array();
        }
		return $getSubscribers;
    }

    // Unsubscriber
	public function unsubscribe($cid = null)
	{
		if (!empty($cid)) {
			return $this->db->update("{$this->table["customers"]}", array('cust_opt_in' => 0), array('cust_id' => $cid));
		}
        return false;
	}

}