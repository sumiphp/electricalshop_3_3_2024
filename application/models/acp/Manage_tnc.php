<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_tnc extends Ifix_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Function to get tnc
    public function getTnc()
	{
        $tnc = $this->db->from("{$this->table["tnc"]}")->where(array('tnc_status' => 1))->get()->row_array();
		return $tnc;
    }

    // Function to save tnc
    public function saveTnc($data = array())
	{
        $data = array(
            'tnc_content' => $data['tnc'],
            'tnc_updated_by' => $data['loggedInUser']['user_id'],
        );
        $tnc = $this->getTnc();
        if (empty($tnc)) $this->db->insert("{$this->table["tnc"]}", $data);
        else $this->db->update("{$this->table["tnc"]}", $data, array('tnc_id' => $tnc['tnc_id']));

		return true;
    }

}