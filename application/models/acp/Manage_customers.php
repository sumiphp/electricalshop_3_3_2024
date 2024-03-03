<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_customers extends Ifix_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Function to get all customers
    // $uid = customer id; Get a specific customers
    public function getCustomers($cid = null)
	{
      /* $this->db->select('C.*, UNIX_TIMESTAMP(C.cust_created_date) AS unix_cust_created_date')
            ->from('customers AS C')
            ->where(array('C.cust_status !=' => 2));
        if (!empty($cid)) {
            $this->db->where(array('C.cust_id' => $cid));
            $getCustomers = $this->db->get()->row_array();
        } else {
            $getCustomers = $this->db->get()->result_array();
        }*/

        //userlogin


       //$this->db->where('customer_id',$custID);
       $getCustomers=$this->db->get('userlogin')->result_array();
        return $getCustomers;



		//return $getCustomers;
    }


    // Function to save & update customer details
    public function saveCustomer($customer = array())
    {
        if (!empty($customer)) {
            $this->db->trans_begin();
            $customerData = array(
                'cust_firstname' => trim($customer['cust_firstname']),
                'cust_lastname' => trim($customer['cust_lastname']),
                'cust_email' => trim($customer['cust_email']),
                'cust_phone1' => trim($customer['cust_phone1']),
                'cust_phone2' => trim($customer['cust_phone2']),
                'cust_adrs' => trim($customer['cust_adrs']),
                'cust_note' => trim($customer['cust_note']),
                'cust_added_by' => trim($customer['cust_added_by']),
                'cust_updated_by' => trim($customer['cust_updated_by']),
                'cust_status' => 1,
                'cust_created_date' => ((isset($customer['cust_id']) && empty($customer['cust_id']))? mysql_datetime() : NULL),
                'cust_updated_date' => ((isset($customer['cust_id']) && !empty($customer['cust_id']))? mysql_datetime() : NULL),
            );

            if (isset($customer['cust_id']) && !empty($customer['cust_id'])) {
                // Update customer
                unset($customerData['cust_added_by']);
                unset($customerData['cust_created_date']);
                unset($customerData['cust_status']);
                $this->db->update("{$this->table["customers"]}", $customerData, array('cust_id' => $customer['cust_id']));
                $cust_ID = $customer['cust_id'];
            } else {
                // Add customer
                unset($customerData['cust_updated_by']);
                unset($customerData['cust_updated_date']);
                $this->db->insert("{$this->table["customers"]}", $customerData);
                $cust_ID = $this->db->insert_id();
            }

			if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        } else return false;
    }

    // Activate, Inactivate & Delete a Customer
    // 0=> Inactive / 1=> Active / 2=> Delete
	public function action($customer = null, $action = null)
	{
		if (!empty($customer)) {
			return $this->db->update("{$this->table["customers"]}", array('cust_status' => $action), array('cust_id' => $customer));
		}
        return false;
	}

}