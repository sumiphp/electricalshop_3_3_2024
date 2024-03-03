<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_staffRoles extends Ifix_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Function to get all user roles
    // $rid = user role id; Get a specific role
    public function getStaffRoles($rid = null)
	{
        $this->db->from("{$this->table["users_role"]} R")->where(array('R.role_status != ' => 2, 'R.role_id != ' => 3));
        if (!empty($rid)) {
            $this->db->where(array('R.role_id' => $rid));
            $getStaffRoles = $this->db->get()->row_array();
            $rolePermissions = $this->db->from("{$this->table["user_role_module_permission"]} P")
                ->where(array('P.perm_role_id' => $rid))
                ->get()->result_array();
            $getStaffRoles['permissions'] = $rolePermissions;
        } else {
            $getStaffRoles = $this->db->get()->result_array();
        }
		return $getStaffRoles;
    }

    // Get all available modules
    public function getModules()
	{
        $this->db->from("{$this->table["modules"]}")->where(array('mod_status' => 1));
        $getModules = $this->db->order_by('mod_name', 'ASC')->get()->result_array();
		return $getModules;
    }

    // Save role with module permission set
    public function saveStaffrole($staffrole = array())
    {
        $resp = false;
        if (!empty($staffrole)) {
            if (isset($staffrole['role_id']) && !empty($staffrole['role_id'])) {
                // Edit a role
                $this->db->update("{$this->table["users_role"]}", array('role_name' => $staffrole['role_name']), array('role_id' => $staffrole['role_id']));
                // Delete existing permission set
                $this->db->delete("{$this->table["user_role_module_permission"]}", array('perm_role_id' => $staffrole['role_id']));
                foreach ($staffrole['permissions'] as $key => $permissions) {
                    // Insert new permission
                    $this->db->insert("{$this->table["user_role_module_permission"]}", array('perm_role_id' => $staffrole['role_id'], 'perm_module_id' => $permissions));
                }
                $resp = true;
            } else {
                // Add new role
                $newrole = $this->db->insert("{$this->table["users_role"]}", array('role_name' => $staffrole['role_name'], 'role_status' => 1));
                if ($newrole) {
                    $newrole_id = $this->db->insert_id();
                    foreach ($staffrole['permissions'] as $key => $permissions) {
                        $this->db->insert("{$this->table["user_role_module_permission"]}", array('perm_role_id' => $newrole_id, 'perm_module_id' => $permissions));
                    }
                    $resp = true;
                }
            }
        }
        return $resp;
    }

    // Status handling & Delete a role
    // 0:Inactive; 1:Active; 2:Trashed;
	public function action($role = null, $action = null, $updated_by = null)
	{
		if (!empty($role) && ($action >= 0)) {
            return $this->db->update("{$this->table["users_role"]}", array('role_status' => $action), array('role_id' => $role));
		}
        return false;
	}

}