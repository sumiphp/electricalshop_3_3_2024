<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_support extends Ifix_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Function to save support tickets
    public function saveSupport($data = array())
	{
        $this->db->insert('support', array(
            'support_type' => $data['ticket_type'],
            'support_priority' => $data['ticket_priority'],
            'support_title' => $data['subject'],
            'support_message' => htmlentities(trim($data['ticketMessage'])),
            'support_asked_by' => $data['loggedInUser']['user_id'],
            'support_ticket_created_time' => mysql_datetime(),
            'support_status' => 1,
        ));
		return $data;
    }

    
    // Function to save google map details
    public function saveMap($data = array())
	{
        return $this->db->update('site', $data, array('site_id' => 1));
    }

    // Contact us listing > submitted from contact us forms in frontend
    public function getContactus($qaid = null)
    {
        /*$getContactus = array();
        $this->db->select('CONTUS.* , UNIX_TIMESTAMP(CONTUS.cus_added_date) AS unix_cus_added_date')
        ->from("{$this->table["contact_us"]} CONTUS");
        $this->db->where(array('CONTUS.cus_status !=' => '0', 'CONTUS.is_enquiry' => '0', 'CONTUS.get_in_touch' => '0'));
        if (!empty($qaid)) {
            $this->db->where(array('CONTUS.cus_id' => $qaid));
            $getContactus = $this->db->get()->row_array();
        } else {*/
            $this->db->select('CONTUS.* , UNIX_TIMESTAMP(CONTUS.cus_added_date) AS unix_cus_added_date')
        ->from("{$this->table["contact_us"]} CONTUS");
            $getContactus = $this->db->order_by('CONTUS.cus_id', 'DESC')->get()->result_array();
       // }
		return $getContactus;
    }

    // Enquires listing > submitted from enquiry forms in frontend
    public function getEnquires($qaid = null)
    {
        $getEnquires = array();
        $this->db->select('CONTUS.* , UNIX_TIMESTAMP(CONTUS.cus_added_date) AS unix_cus_added_date')
        ->from("{$this->table["contact_us"]} CONTUS");
        $this->db->where(array('CONTUS.cus_status !=' => '0'));
        $this->db->group_start()
            ->where('CONTUS.is_enquiry', 1)
            ->or_where('CONTUS.get_in_touch', 1)
        ->group_end();
        if (!empty($qaid)) {
            $this->db->where(array('CONTUS.cus_id' => $qaid));
            $getEnquires = $this->db->get()->row_array();
        } else {
            $getEnquires = $this->db->order_by('CONTUS.cus_id', 'DESC')->get()->result_array();
        }
		return $getEnquires;
    }

    // Contact us > Unreaded assist mail
    public function getNewContactus()
    {
        $getContactus  = $this->db->select('CONTUS.* , UNIX_TIMESTAMP(CONTUS.contus_cus_added_date) AS unix_cus_added_date')
            ->from("{$this->table["contact_us"]} CONTUS")
            ->where(array('CONTUS.cus_status != ' => '0'))
            ->order_by('CONTUS.cus_id', 'DESC')->get()->result_array();
		return $getContactus;
    }

    // Query 0: Trashed; 1: Unreaded; 2:Readed; 3: Contacted; 4: Analysing; 5: Resolved; 6: Ignore;
	public function action($qaid = null, $action = null)
	{
		if (!empty($qaid) && !empty($action)) {
			if ($action == 'delete') { // Delete this query
                //$this->db->update("{$this->table["contact_us"]}", array('cus_status' => 0), array('cus_id' => $qaid));

                $this -> db -> where('cus_id', $qaid);
                $this -> db -> delete('contact_us');


                return true;
			} else if ($action == 'unread') { // Unreaded this query
                $this->db->update("{$this->table["contact_us"]}", array('cus_status' => 1), array('cus_id' => $qaid));
                return true;
			} else if ($action == 'read') { // Readed this query
                $this->db->update("{$this->table["contact_us"]}", array('cus_status' => 2), array('cus_id' => $qaid));
                return true;
			} else if ($action == 'contacted') { // Contacted this client
                $this->db->update("{$this->table["contact_us"]}", array('cus_status' => 3), array('cus_id' => $qaid));
                return true;
			} else if ($action == 'analysing') { // Analysing issue
                $this->db->update("{$this->table["contact_us"]}", array('cus_status' => 4), array('cus_id' => $qaid));
                return true;
			} else if ($action == 'resolved') { // Resolved the reportedissue
                $this->db->update("{$this->table["contact_us"]}", array('cus_status' => 5), array('cus_id' => $qaid));
                return true;
			} else if ($action == 'ignore') { // Ignore  this msg
                $this->db->update("{$this->table["contact_us"]}", array('cus_status' => 6), array('cus_id' => $qaid));
                return true;
			}
		}
        return false;
	}

}