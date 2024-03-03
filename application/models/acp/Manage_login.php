<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_login extends Ifix_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    public function hash_password($password = null)
	{
		if (empty($password)) {
			return FALSE;
		}
		return password_hash($password, PASSWORD_BCRYPT);
	}

    public function check_access($uname, $upass)
    {
    	if (empty($uname) || empty($upass)) {
			return FALSE;
		}

		$getuser = $this->db->select('user_id, user_firstname, user_lastname, user_avatar, user_primary_phone, user_primary_email, user_address_line1, user_address_line2, user_city, user_state, user_country, user_pin, user_role, user_pass, user_tz')->from("{$this->table["users"]}")->where(array('user_primary_email' => $uname, 'user_status' => 1))->get()->row_array();
		if (empty($getuser)) { return FALSE; }
        else { 
            if (password_verify($upass, $getuser['user_pass'])) {
                unset($getuser['user_pass']);
                return $getuser;
            } else array();
        }
    }

}