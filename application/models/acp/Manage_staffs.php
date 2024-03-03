<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_staffs extends Ifix_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Function to get all staffs
    // $uid = staff id; Get a specific staff
    public function getStaffs($uid = null)
	{
        $this->db->select('U.*, UNIX_TIMESTAMP(U.user_updated_date) AS unix_user_updated_date, UR.role_name')
            ->from("{$this->table["users"]} U")
            ->join("{$this->table["users_role"]} UR", 'UR.role_id = U.user_role')
            ->where(array('U.user_role != ' => 3, 'U.user_status != ' => 2, 'UR.role_status' => 1));
        if (!empty($uid)) {
            $this->db->where(array('user_id' => $uid));
            $getStaffs = $this->db->get()->row_array();
        } else {
            $getStaffs = $this->db->get()->result_array();
        }
		return $getStaffs;
    }

    // Function to save & update staff details
    public function saveStaff($staff = array())
    {
        if (!empty($staff)) {
			if (isset($staff['user_id']) && !empty($staff['user_id'])) {
				// Edit staff
                $where = array('user_id' => $staff['user_id']);
                unset($staff['user_id']);
				$this->db->update("{$this->table["users"]}", $staff, $where);
                return true;
			} else {
				// Add staff
                unset($staff['user_id']);
                $this->db->insert("{$this->table["users"]}", $staff);
                return true;
			}
        } else return false;
    }

    // Activate, Inactivate & Delete a Staffs
    // 0=> Inactive / 1=> Active / 2=> Delete
	public function action($staff = null, $action = null)
	{
		if (!empty($staff) && !empty($action)) {
			return $this->db->update("{$this->table["users"]}", array('user_status' => $action), array('user_id' => $staff));
		}
        return false;
	}

    // Ajax: Validate password for Staff/User
	public function validate_password($oldpswrd = null, $uid = null)
	{
        if (!empty($oldpswrd) && !empty($uid)) {
            $userDtls = $this->getStaffs($uid);
            if (empty($userDtls)) return false;
            else { 
                if (password_verify($oldpswrd, $userDtls['user_pass'])) return true;
                else return false;
            }
		}
        return false;
    }

    // Change password for Staff/User
	public function change_password($new = null, $uid = null)
	{
        if (!empty($new) && !empty($uid)) {
            $this->db->update("{$this->table["users"]}", array('user_pass' => password_hash($new, PASSWORD_BCRYPT)), array('user_id' => $uid));
            return true;
        }
        return false;
    }

}