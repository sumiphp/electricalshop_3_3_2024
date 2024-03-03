<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_settings extends CI_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Save or update Site Settings
	public function saveSettings($site = array())
	{
		if (!empty($site)) {
            $this->db->trans_begin();
            if ($site['site_meta_tags']) $site['site_meta_tags'] = str_replace('ssccrriipptt', 'script', htmlentities($site['site_meta_tags']));
            if ($site['site_ga_code']) $site['site_ga_code'] = str_replace('ssccrriipptt', 'script', htmlentities($site['site_ga_code']));
            if ($site['site_header_assets']) $site['site_header_assets'] = str_replace('ssccrriipptt', 'script', htmlentities($site['site_header_assets']));
            if ($site['site_footer_assets']) $site['site_footer_assets'] = str_replace('ssccrriipptt', 'script', htmlentities($site['site_footer_assets']));
            if (isset($site['site_has_fb'])) $site['site_has_fb'] = 1; else $site['site_has_fb'] = 0;
            if (isset($site['site_has_twitter'])) $site['site_has_twitter'] = 1; else $site['site_has_twitter'] = 0;
            if (isset($site['site_has_insta'])) $site['site_has_insta'] = 1; else $site['site_has_insta'] = 0;
            if (isset($site['site_has_youtube'])) $site['site_has_youtube'] = 1; else $site['site_has_youtube'] = 0;
            if (isset($site['site_has_whatsapp'])) $site['site_has_whatsapp'] = 1; else $site['site_has_whatsapp'] = 0;
            
            if (isset($site['site_id']) && !empty($site['site_id'])) {
                $siteID = $site['site_id'];
                unset($site['site_id']);
                $site['site_updated_date'] = mysql_datetime();
                $this->db->update('site', $site, array('site_id' => $siteID));
            } else {
                $site['site_status'] = 1;
                $site['site_created_date'] = mysql_datetime();
                $this->db->insert('site', $site);
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
        return false;
    }

}