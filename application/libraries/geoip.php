<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Purpose: To set contact's localtime
*/

class Geoip {
	public function _construct() {
        $CI = & get_instance();
        log_message('Debug', 'Geoip_api class is loaded.');
    }
 
    public function load($country, $province) {

        include_once APPPATH.'/third_party/geoip-api-php-master/geo.php';
        return get_time_zone($country, $province);
    }
}