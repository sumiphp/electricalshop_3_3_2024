<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Formatted form of print_r() function
 */
if (!function_exists('printr')) {
	function printr()
	{
		$args = func_get_args();
		foreach ($args as $arg) {
			echo '<pre>' . print_r($arg, true) . '</pre>';
		}
	}
}

/**
 * Validating url
 * @param string $url
 * @param string $mode
 * @return boolean
 */
if (!function_exists('valid_url')) {
	function valid_url($url, $mode = FILTER_VALIDATE_URL)
	{
		return (filter_var($url, $mode) !== false);
	}
}

/**
 * gen_random_string
 * @param    int[$length]
 * @param    string[$case]
 * @return   string
 */
if (!function_exists('gen_random_string')) {
    function gen_random_string($append_char = '', $length = '10', $case = 'upper')
    {
        $append_char_len = strlen($append_char);
        $random_str = substr(str_shuffle(md5(time())), 0, $length);     
        $random_string = substr(str_shuffle(md5(time())), 0, ($length-$append_char_len)).$append_char;
        return ($case === 'upper') ? strtoupper($random_string) : $random_string;
    }
}

/**
 * Send json output to buffer
 */
if (!function_exists('send_json_response')) {
    function send_json_response($data, $options = null)
    {
        header('Content-type: application/json');
        echo json_encode($data);
        exit;
    }
}

/**
 * mysql_datetime: Returns datetime for MySql DATETIME field
 * @param integer[$timestamp] : UNIX timestamp. Default value is current timestamp
 */
if (!function_exists('mysql_datetime')) {
	function mysql_datetime($timestamp = null)
	{
		if (is_null($timestamp)) {
			$timestamp = defined('TIME_NOW') ? TIME_NOW : time();
		}

		return gmdate("Y-m-d H:i:s", $timestamp);
	}
}

/**
 * mysql_date: Returns date for MySql DATE field
 * @param integer[$timestamp] : UNIX timestamp. Default value is current timestamp
 */
if (!function_exists('mysql_date')) {
	function mysql_date($timestamp = null)
	{
		if (is_null($timestamp)) {
			$timestamp = defined('TIME_NOW') ? TIME_NOW : time();
		}

		return gmdate("Y-m-d", $timestamp);
	}
}

/**
 * base64UrlEncode
 */
if (!function_exists('base64UrlEncode')) {
	function base64UrlEncode($inputStr)
	{
		return strtr(base64_encode($inputStr), '+/=', '-_,');
	}
}


/**
 * base64UrlDecode
 */
if (!function_exists('base64UrlDecode')) {
	function base64UrlDecode($inputStr)
	{
	    return base64_decode(strtr($inputStr, '-_,', '+/='));
	}
}

/**
 * Show 404 page
 */
if (!function_exists('acp_show404')) {
	function acp_show404()
	{
	    redirect('acp/error');
	}
}
if (!function_exists('show404')) {
	function show404()
	{
	    redirect('error');
	}
}

/**
 * Show 403 page
 */
if (!function_exists('acp_show403')) {
	function acp_show403()
	{
	    redirect('acp/error/error403');
	}
}
if (!function_exists('show403')) {
	function show403()
	{
	    redirect('error/error403');
	}
}

/**
 * Show 500 page
 */
if (!function_exists('acp_show500')) {
	function acp_show500()
	{
	    redirect('acp/error/error500');
	}
}
if (!function_exists('show500')) {
	function show500()
	{
	    redirect('error/error500');
	}
}

/**
 * function to return logged in or not
 */
if (!function_exists('checkLogIn')) {
	function checkLogIn()
	{
		$checkLogIn = false;
		$CI = & get_instance();
		if ($CI->session->userdata('acp_login')) {
			$checkLogIn = $CI->session->userdata('acp_login');
		}
		return $checkLogIn;
	}
}

/**
 * function to return logged in user details
 */
if (!function_exists('loggedInUser')) {
	function loggedInUser()
	{
		$loggedInUser = array();
		$CI = & get_instance();
		if ($CI->session->userdata('acp_login_user')) {
			$loggedInUser = $CI->session->userdata('acp_login_user');
		}
		return $loggedInUser;
	}
}

/**
 * function to return site name form DB
 */
if (!function_exists('sitename')) {
	function sitename()
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$site = $CI->commonModel->getSiteDetails();
		$sitename = ((!empty($site) && isset($site['site_name']) && (trim($site['site_name']) != ''))? $site['site_name'] : 'CompanyName');
		return $sitename;
	}
}

/**
 * function to return site currency form DB
 */
if (!function_exists('sitecurrency')) {
	function sitecurrency()
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$site = $CI->commonModel->getSiteDetails();
		$sitecurrency = ((!empty($site) && isset($site['site_currency_id']) && (trim($site['site_currency_id']) != ''))? $CI->commonModel->getAvailableCurrencies($site['site_currency_id']) : null);
		return $sitecurrency;
	}
}

/**
 * function to return site mail sending FROM MAIL ID form DB
 */
if (!function_exists('site_mailfrom')) {
	function site_mailfrom()
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$site = $CI->commonModel->getSiteDetails();
		$site_mailfrom = ((!empty($site) && isset($site['site_mailfrom_id']) && (trim($site['site_mailfrom_id']) != ''))? $site['site_mailfrom_id'] : 'sales@ifixcompany.online');
		return $site_mailfrom;
	}
}

/**
 * function to return site mail sending TO MAIL ID form DB
 */
if (!function_exists('site_mailto')) {
	function site_mailto()
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$site = $CI->commonModel->getSiteDetails();
		$site_mailto = ((!empty($site) && isset($site['site_mailto_id']) && (trim($site['site_mailto_id']) != ''))? $site['site_mailto_id'] : 'abumathew@ifixcompany.online');
		return $site_mailto;
	}
}

/**
 * function to return site mail REPLY MAIL ID form DB
 */
if (!function_exists('site_mailreplyto')) {
	function site_mailreplyto()
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$site = $CI->commonModel->getSiteDetails();
		$site_mailreplyto = ((!empty($site) && isset($site['site_replyto_id']) && (trim($site['site_replyto_id']) != ''))? $site['site_replyto_id'] : 'noreply@example.com');
		return $site_mailreplyto;
	}
}

/**
 * function to return site details form DB
 */
if (!function_exists('sitedetails')) {
	function sitedetails()
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		if (! defined('MAIN_SITE_URL')) define('MAIN_SITE_URL', site_url());
		$site = $CI->commonModel->getSiteDetails();
		$CompanyName = ((!empty($site) && isset($site['site_name']) && (trim($site['site_name']) != ''))? $site['site_name'] : 'CompanyName');
		$siteLogo= ((!empty($site) && isset($site['site_logo']) && (trim($site['site_logo']) != '') && (file_exists(FCPATH.'assets/uploads/site/'.$site['site_logo'])))? site_url().'assets/uploads/site/'.$site['site_logo'] : site_url().'assets/img/logo.png'); // 200x60 px

		$dummy_address = 'Address Line 1, Address Line 2, City, State/Province, Country - 123456.';

		$address_line1 = ((!empty($site) && isset($site['site_address_line1']) && (trim($site['site_address_line1']) != ''))? $site['site_address_line1'] : '');
		$address_line2 = ((!empty($site) && isset($site['site_address_line2']) && (trim($site['site_address_line2']) != ''))? $site['site_address_line2'] : '');
		$address_city = ((!empty($site) && isset($site['site_city']) && (trim($site['site_city']) != ''))? $site['site_city'] : '');
		$pid = ((!empty($site) && isset($site['site_state']) && (trim($site['site_state']) != ''))? $site['site_state'] : null);
		$address_state = (!empty($pid))? getProvince($pid) : array();
		$address_state = (!empty($address_state))? $address_state['province_name'] : '';
		$cid = ((!empty($site) && isset($site['site_country']) && (trim($site['site_country']) != ''))? $site['site_country'] : null);
		$address_country = (!empty($cid))? getCountry($cid) : array();
		$address_country = (!empty($address_country))? $address_country['country_name'] : '';
		$address_zip = ((!empty($site) && isset($site['site_pin']) && (trim($site['site_pin']) != ''))? $site['site_pin'] : '');
		$site_address = '';
		if (trim($address_line1) != '') $site_address .= trim($address_line1).', ';
		if (trim($address_line2) != '') $site_address .= trim($address_line2).', ';
		if (trim($address_city) != '') $site_address .= trim($address_city).', ';
		if (trim($address_state) != '') $site_address .= trim($address_state).', ';
		if (trim($address_country) != '') $site_address .= trim($address_country).', ';
		if (trim($address_zip) != '') $site_address .= 'Zip: '.trim($address_zip);

		$office_address = (trim($site_address) == '')? $dummy_address : trim($site_address);

		$site_currency = ((!empty($site) && isset($site['site_currency']) && (trim($site['site_currency']) != ''))? $CI->commonModel->getAvailableCurrencies($site['site_currency_id']) : null);
		if (! empty($sitecurrency)) {
			$sitecurrency = $sitecurrency['currency'];
		}

		$sitedetails = array(
			'sitename' => $CompanyName,
			'site_shortname' => ((!empty($site) && isset($site['site_short_name']) && (trim($site['site_short_name']) != ''))? $site['site_short_name'] : $CompanyName),

			'logo'    => $siteLogo,
			'mobile_logo' => ((!empty($site) && isset($site['site_mobile_logo']) && (trim($site['site_mobile_logo']) != '') && (file_exists(FCPATH.'assets/uploads/site/'.$site['site_mobile_logo'])))? site_url().'assets/uploads/site/'.$site['site_mobile_logo'] : $siteLogo),
			'favicon' => ((!empty($site) && isset($site['site_favicon']) && (trim($site['site_favicon']) != '') && (file_exists(FCPATH.'assets/uploads/site/'.$site['site_favicon'])))? site_url().'assets/uploads/site/'.$site['site_favicon'] : site_url().'assets/img/favicon.ico'), // 16x16 px

			'email1_type' => ((!empty($site) && isset($site['site_email1_type']) && (trim($site['site_email1_type']) != ''))? $site['site_email1_type'] : 'Primary'),
			'email_1' => ((!empty($site) && isset($site['site_email1_id']) && (trim($site['site_email1_id']) != ''))? $site['site_email1_id'] : ''),

			'email2_type' => ((!empty($site) && isset($site['site_email2_type']) && (trim($site['site_email2_type']) != ''))? $site['site_email2_type'] : 'Secondry'),
			'email_2' => ((!empty($site) && isset($site['site_email2_id']) && (trim($site['site_email2_id']) != ''))? $site['site_email2_id'] : ''),

			'replyto_mailid' => ((!empty($site) && isset($site['site_replyto_mailid']) && (trim($site['site_replyto_mailid']) != ''))? $site['site_replyto_mailid'] : 'noreply@example.com'),

			'description' => ((!empty($site) && isset($site['site_description']) && (trim($site['site_description']) != ''))? $site['site_description'] : 'Few words about '.$CompanyName.'.'),

			'currency' => $site_currency,

			'contactus_note' => ((!empty($site) && isset($site['site_contact_note']) && (trim($site['site_contact_note']) != ''))? $site['site_contact_note'] : 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),

			'office_address' => $office_address,

			'phone_label_1' => ((!empty($site) && isset($site['site_phone1_type']) && (trim($site['site_phone1_type']) != ''))? $site['site_phone1_type'] : 'Primary'),
			'phone_number_1' => ((!empty($site) && isset($site['site_phone1_num']) && (trim($site['site_phone1_num']) != ''))? $site['site_phone1_num'] : ''),

			'phone_label_2' => ((!empty($site) && isset($site['site_phone2_type']) && (trim($site['site_phone2_type']) != ''))? $site['site_phone2_type'] : 'Secondry'),
			'phone_number_2' => ((!empty($site) && isset($site['site_phone2_num']) && (trim($site['site_phone2_num']) != ''))? $site['site_phone2_num'] : ''),

			'phone_label_3' => ((!empty($site) && isset($site['site_phone3_type']) && (trim($site['site_phone3_type']) != ''))? $site['site_phone3_type'] : 'Other'),
			'phone_number_3' => ((!empty($site) && isset($site['site_phone3_num']) && (trim($site['site_phone3_num']) != ''))? $site['site_phone3_num'] : ''),

			'facebook_url'  => ((!empty($site) && isset($site['site_fb_url']) && (trim($site['site_fb_url']) != ''))? (($site['site_has_fb'] == 1)? $site['site_fb_url'] : '') : 'https://www.facebook.com'),
			'twitter_url'   => ((!empty($site) && isset($site['site_twitter_url']) && (trim($site['site_twitter_url']) != ''))? (($site['site_has_twitter'] == 1)? $site['site_twitter_url'] : '') : 'https://twitter.com'),
			'instagram_url'   => ((!empty($site) && isset($site['site_insta_url']) && (trim($site['site_insta_url']) != ''))? (($site['site_has_insta'] == 1)? $site['site_insta_url'] : '') : 'https://www.instagram.com'),
			'youtube_url' => ((!empty($site) && isset($site['site_youtube_url']) && (trim($site['site_youtube_url']) != ''))? (($site['site_has_youtube'] == 1)? $site['site_youtube_url'] : '') : 'https://www.youtube.com'),
			'whatsapp' => ((!empty($site) && isset($site['site_whatsapp_number']) && (trim($site['site_whatsapp_number']) != ''))? (($site['site_has_whatsapp'] == 1)? 'https://api.whatsapp.com/send?phone='.$site['site_whatsapp_number'] : '') : ''),
			'whatsapp_number' => ((!empty($site) && isset($site['site_whatsapp_number']) && (trim($site['site_whatsapp_number']) != ''))? (($site['site_has_whatsapp'] == 1)? $site['site_whatsapp_number'] : '') : ''),

			'google_map_show' => ((!empty($site) && ((($site['site_google_map_type'] == 0) && trim($site['site_google_map_embed']) != '') || (($site['site_google_map_type'] == 1) && trim($site['site_google_map_key']) != '') || (($site['site_google_map_type'] == 2) && trim($site['site_map_share_code']) != '')))? ((isset($site['site_map_status']) && (trim($site['site_map_status']) != ''))? $site['site_map_status'] : 0) : 0),
			'google_map_type' => ((!empty($site) && isset($site['site_google_map_type']) && (trim($site['site_google_map_type']) != ''))? $site['site_google_map_type'] : ''),
			'google_map_embed' => ((!empty($site) && isset($site['site_google_map_embed']) && (trim($site['site_google_map_embed']) != ''))? $site['site_google_map_embed'] : ''),
			'google_map_key' => ((!empty($site) && isset($site['site_google_map_key']) && (trim($site['site_google_map_key']) != ''))? $site['site_google_map_key'] : ''),
			'google_map_latitude' => ((!empty($site) && isset($site['site_map_latitude']) && (trim($site['site_map_latitude']) != ''))? $site['site_map_latitude'] : '40.740610'),
			'google_map_longitude' => ((!empty($site) && isset($site['site_map_longitude']) && (trim($site['site_map_longitude']) != ''))? $site['site_map_longitude'] : '-73.935242'),
			'google_map_title' => $CompanyName,
			'google_map_marker' => ((!empty($site) && isset($site['site_map_marker']) && (trim($site['site_map_marker']) != '') && (file_exists(FCPATH.'assets/uploads/site/'.$site['site_map_marker'])))? site_url().'assets/uploads/site/'.$site['site_map_marker'] : site_url().'assets/img/icons/map-marker.png'),
			'google_map_marker_name' => ((!empty($site) && isset($site['site_map_marker']) && (trim($site['site_map_marker']) != '') && (file_exists(FCPATH.'assets/uploads/site/'.$site['site_map_marker'])))? $site['site_map_marker'] : 'map-marker.png'),
			'google_map_share_code' => ((!empty($site) && isset($site['site_map_share_code']) && (trim($site['site_map_share_code']) != ''))? $site['site_map_share_code'] : null),

			'site_working_time' => ((!empty($site) && isset($site['site_working_time']) && (trim($site['site_working_time']) != ''))? $site['site_working_time'] : ''),

			'site_created' => ((!empty($site) && isset($site['site_created_date']) && (trim($site['site_created_date']) != ''))? date('Y-m-d H:i:s', strtotime($site['site_created_date'])) : date('Y-m-d H:i:s')),
			'site_updated' => ((!empty($site) && isset($site['site_updated_date']) && (trim($site['site_updated_date']) != ''))? date('Y-m-d H:i:s', strtotime($site['site_updated_date'])) : date('Y-m-d H:i:s')),
		);
		return $sitedetails;
	}
}

/**
 * function to get all meta tags form DB
 */
if (!function_exists('metatags')) {
	function metatags()
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$site = $CI->commonModel->getSiteDetails();
		$CompanyName = ((!empty($site) && isset($site['site_name']) && (trim($site['site_name']) != ''))? $site['site_name'] : 'CompanyName');
		$copyright = '© Copyright '.date('Y').' '.sitename().'. All right reserved. Created by '.DEVELOPER_COMPANY_NAME;
		$keyword = ((!empty($site) && isset($site['site_name']) && (trim($site['site_name']) != ''))? $site['site_name'] : 'CompanyName');
		$description = ((!empty($site) && isset($site['site_description']) && (trim($site['site_description']) != ''))? $site['site_description'] : 'Few words about '.$CompanyName.'.');
		$metatags = '<meta name="description" content="'.$description.'">
		<meta name="keyword" content="'.$keyword.'">
		<meta name="copyright" content="'.$copyright.'">';
		$metatags = htmlentities($metatags);
		$meta_from_db = (!empty($site) && isset($site['site_meta_tags']) && (trim($site['site_meta_tags']) != ''))? $site['site_meta_tags'] : null;
		if (!empty($meta_from_db)) return htmlspecialchars_decode($meta_from_db);
		else return htmlspecialchars_decode($metatags);
	}
}

/**
 * function to get Google Analytics form DB
 */
if (!function_exists('googleAnalytics')) {
	function googleAnalytics()
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$sitedetails = $CI->commonModel->getSiteDetails();
		$googleAnalytics = (!empty($sitedetails) && isset($sitedetails['site_ga_code']))? $sitedetails['site_ga_code'] : '';
		return htmlspecialchars_decode($googleAnalytics);
	}
}

/**
 * function to get all custom header assets form DB
 */
if (!function_exists('headerAssets')) {
	function headerAssets()
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$sitedetails = $CI->commonModel->getSiteDetails();
		$headerAssets = (!empty($sitedetails) && isset($sitedetails['site_header_assets']))? $sitedetails['site_header_assets'] : '';
		return htmlspecialchars_decode($headerAssets);
	}
}

/**
 * function to get all custom footer assets form DB
 */
if (!function_exists('footerAssets')) {
	function footerAssets()
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$sitedetails = $CI->commonModel->getSiteDetails();
		$footerAssets = (!empty($sitedetails) && isset($sitedetails['site_footer_assets']))? $sitedetails['site_footer_assets'] : '';
		return htmlspecialchars_decode($footerAssets);
	}
}

/**
 * function to get country details
 */
if (!function_exists('getCountry')) {
	function getCountry($search = null, $column = 'country_id')
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$getCountry = $CI->commonModel->getCountry($search, $column);
		return $getCountry;
	}
}

/**
 * function to state/province details
 */
if (!function_exists('getProvince')) {
	function getProvince($search = null, $column = 'province_id')
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$getProvince = $CI->commonModel->getProvince($search, $column);
		return $getProvince;
	}
}

/**
 * function to get all timezone
 */
if (!function_exists('getTZ')) {
	function getTZ($tz = null)
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_common', 'commonModel');
		$getTZ = $CI->commonModel->getTZ($tz);
		return $getTZ;
	}
}

/**
 * function to check whether the logged in user has access to this module
 */
if (!function_exists('hasUserAccess')) {
	function hasUserAccess($mid = null)
	{
		$hasUserAccess = false;
		if (!empty($mid)) {
			$CI = & get_instance();
			$CI->load->model('acp/Manage_common', 'commonModel');
			$login_user = $CI->session->userdata('acp_login_user');
			if (!empty($mid) && !empty($login_user) && isset($login_user['user_role']) && ($login_user['user_role'] != '')) {
				$hasUserAccess = $CI->commonModel->hasUserAccess($mid, $login_user['user_role']);
			}
		}
		return $hasUserAccess;
	}
}

/**
 * function to get logged in user timezone & set it
 */
if (!function_exists('userTimeZone')) {
	function userTimeZone()
	{
		$tz = 'Asia/Dubai';
		$CI = & get_instance();
		$login_user = $CI->session->userdata('acp_login_user');
		if (!empty($login_user) && ($login_user['user_tz'] != '')) {
			date_default_timezone_set($login_user['user_tz']);
			$tz = $login_user['user_tz'];
		}
		return $tz;
	}
}

/**
 * function to show time in user timezone & in common pattern
 */
if (!function_exists('converttoUserTZ')) {
	function converttoUserTZ($time = null, $dateonly = false)
	{
		$tz = 'Asia/Dubai';
		$CI = & get_instance();
		$login_user = $CI->session->userdata('acp_login_user');
		if (!empty($login_user) && ($login_user['user_tz'] != '')) {
			$tz = $login_user['user_tz'];
		}
		$date = new DateTime($time.' UTC');
		$date->setTimezone(new DateTimeZone($tz));
		if ($dateonly) $tz = $date->format(SITE_DATE_FORMAT);
		else $tz = $date->format(SITE_DATE_FORMAT.' '.SITE_TIME_FORMAT);
		return $tz;
	}
}

/**
 * function to get time ago text
 */
if (!function_exists('time_span')) {
	function time_span($timediff)
	{
		$diff = abs($timediff);

		if ($diff <= 0) {
			return 'few seconds ago';
		}

		switch ($diff) {
			case $diff < 60       	: return 'few seconds ago';
			case $diff == 60     	: return '1 minute'; // less than 1 hour
			case $diff < 3600     	: return round($diff / 60) . ' minutes ago'; // less than 1 hour
			case $diff == 3600    	: return '1 hour'; // less than 24 hours
			case $diff < 86400    	: return round($diff / 3600) . ' hours ago'; // less than 24 hours
			case $diff < 172800   	: return '1 Day'; // less than 48 hours
			case $diff < 2592000  	: return round($diff / 86400).' days ago'; // less than 30 days
			case $diff < 31557600 	: $month = round($diff / 2592000);
			if ($month == 1) {
				return '1 month';
			} else {
				return $month.' months ago';
			}
			default : $year =  round($diff / 31557600);

			if($year == 1) {
				return '1 year';
			} else {
				return $year.' years ago';
			}
		}
	}
}

/**
 * function to get logged in user details
 */
if (!function_exists('loggedInUser')) {
	function loggedInUser()
	{
		$CI = & get_instance();
		return $CI->session->userdata('acp_login_user');
	}
}

/**
 * function to truncate string after a specific char count
 */
if (!function_exists('truncateString')) {
	function truncateString($str = '', $maxlen = 50)
	{
		// $str = strip_tags($str);
		if (strlen($str) > $maxlen) {
			$str = substr($str, 0, $maxlen - 3).'...';
		}
		return $str;
	}
}

/**
 * function to truncate string after a specific char count
 */
if (!function_exists('truncateHTML')) {
	function truncateHTML($html, $limit = 2000) {
		static $wrapper = null;
		static $wrapperLength = 0;

		// trim unwanted CR/LF characters
		$html = trim($html);

		// Remove HTML comments
		$html = preg_replace("~<!--.*?-->~", '', $html);

		// If $html in in plain text
		if ((strlen(strip_tags($html)) > 0) && strlen(strip_tags($html)) == strlen($html))  {
			return substr($html, 0, $limit);
		} elseif (is_null($wrapper)) {
			// If $html doesn't have a root element
			if (!preg_match("~^\s*<[^\s!?]~", $html)) {
				// Defining a tag as our HTML wrapper
				$wrapper = 'div';
				$htmlWrapper = "<$wrapper></$wrapper>";
				$wrapperLength = strlen($htmlWrapper);
				$html = preg_replace("~><~", ">$html<", $htmlWrapper);
			}
		}

		// Calculating total length
		$totalLength = strlen($html);

		// If our input length is less than limit, we are done.
		if ($totalLength <= $limit) {
			if ($wrapper) {
				return preg_replace("~^<$wrapper>|</$wrapper>$~", "", $html);
			}
			return strlen(strip_tags($html)) > 0 ? $html : '';
		}

		// Initializing a DOM object to hold our HTML
		$dom = new DOMDocument;
		$dom->loadHTML($html,  LIBXML_HTML_NOIMPLIED  | LIBXML_HTML_NODEFDTD);
		// Initializing a DOMXPath object to query on our DOM
		$xpath = new DOMXPath($dom);
		// Query last node (this does not include comment or text nodes)
		$lastNode = $xpath->query("./*[last()]")->item(0);

		// While manipulating, when there is no HTML element left
		if ($totalLength > $limit && is_null($lastNode)) {
			if (strlen(strip_tags($html)) >= $limit) {
				$textNode = $xpath->query("//text()")->item(0);
				if ($wrapper) {
					$textNode->nodeValue = substr($textNode->nodeValue, 0, $limit );
					$html = $dom->saveHTML();
					return preg_replace("~^<$wrapper>|</$wrapper>$~", "", $html);
				} else {
					$lengthAllowed = $limit - ($totalLength - strlen($textNode->nodeValue));
					if ($lengthAllowed <= 0) {
						return '';
					}
					$textNode->nodeValue = substr($textNode->nodeValue, 0, $lengthAllowed);
					$html = $dom->saveHTML();
					return strlen(strip_tags($html)) > 0 ? $html : '';
				}
			} else {
				$textNode = $xpath->query("//text()")->item(0);
				$textNode->nodeValue = substr($textNode->nodeValue, 0, -(($totalLength - ($wrapperLength > 0 ? $wrapperLength : 0)) - $limit));
				$html = $dom->saveHTML();
				return strlen(strip_tags($html)) > 0 ? $html : '';
			}
		}
		// If we have a text node after our last HTML element
		elseif ($nextNode = $lastNode->nextSibling) {
			if ($nextNode->nodeType === 3 /* DOMText */) {
				$nodeLength = strlen($nextNode->nodeValue);
				// If by removing our text node total length will be greater than limit
				if (($totalLength - ($wrapperLength > 0 ? $wrapperLength : 0)) - $nodeLength >= $limit) {
					// We should remove it
					$nextNode->parentNode->removeChild($nextNode);
					$html = $dom->saveHTML();
					return truncateHTML($html, $limit);
				}
				// If by removing our text node total length will be less than limit
				else {
					// We should truncate our text to fit the limit
					$nextNode->nodeValue = substr($nextNode->nodeValue, 0, ($limit - (($totalLength - ($wrapperLength > 0 ? $wrapperLength : 0)) - $nodeLength)));
					$html = $dom->saveHTML();
					// Caring about custom wrapper
					if ($wrapper) {
						return preg_replace("~^<$wrapper>|</$wrapper>$~", "", $html);
					}
					return $html;
				} 
			}
		}
		// If current node is an HTML element 
		elseif ($lastNode->nodeType === 1 /* DOMElement */) {
			$nodeLength = strlen($lastNode->nodeValue);
			// If by removing current HTML element total length will be greater than limit
			if (($totalLength - ($wrapperLength > 0 ? $wrapperLength : 0)) - $nodeLength >= $limit) {
				// We should remove it
				$lastNode->parentNode->removeChild($lastNode);
				$html = $dom->saveHTML();
				return truncateHTML($html, $limit);
			}
			// If by removing current HTML element total length will be less than limit
			else {
				// We should truncate our node value to fit the limit
				$lastNode->nodeValue = substr($lastNode->nodeValue, 0, ($limit - (($totalLength - ($wrapperLength > 0 ? $wrapperLength : 0)) - $nodeLength)));
				$html = $dom->saveHTML();
				if ($wrapper) {
					return preg_replace("~^<$wrapper>|</$wrapper>$~", "", $html);
				}
				return $html;
			}
		}
	}
}

/**
 * function to remove space & special charaters & returns a slug for use in url
 */
if (!function_exists('slugify')) {
	function slugify($text = '', $divider = '-')
	{
		// replace non letter or digits by divider
		$text = preg_replace('~[^\pL\d]+~u', $divider, $text);
	  
		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);
	  
		// trim
		$text = trim($text, $divider);
	  
		// remove duplicate divider
		$text = preg_replace('~-+~', $divider, $text);
	  
		// lowercase
		$text = strtolower($text);
	  
		if (empty($text)) {
		  return 'n-a';
		}
		return $text;
	}
}

/**
 * function to generate Sitemap content & update
 */
if (!function_exists('generateSitemapContent')) {
	function generateSitemapContent()
	{
		$sitemap['home pages'] = array(MAIN_SITE_URL);
        foreach (SITE_DEFAULT_PAGES as $def_link) {
            $sitemap['home pages'][] = MAIN_SITE_URL.$def_link;
        }
        $sitemap['home pages'] = array_unique($sitemap['home pages']);

		$CI = & get_instance();

		$CI->load->model('acp/Manage_products', 'acpProducts');
		$sitemap['products'] = array(MAIN_SITE_URL.'products');
        $getProoducts = $CI->acpProducts->getProducts();
        foreach ($getProoducts as $def_link) {
            $sitemap['products'][] = MAIN_SITE_URL.'product/'.((trim($def_link['prod_canonial_name']) != '')? $def_link['prod_canonial_name'] : $def_link['prod_id'] );
        }
        $sitemap['products'] = array_unique($sitemap['products']);

		// $CI->load->model('acp/Manage_blogs', 'acpBlog');
		// $sitemap['blogs'] = array(MAIN_SITE_URL.'blogs');
        // $getBlogs = $CI->acpBlog->getBlogs();
        // foreach ($getBlogs as $def_link) {
        //     $sitemap['blogs'][] = MAIN_SITE_URL.'blog/'.((trim($def_link['blog_canonial_name']) != '')? $def_link['blog_canonial_name'] : $def_link['blog_id'] );
        // }
        // $sitemap['blogs'] = array_unique($sitemap['blogs']);

		generateSitemapXML($sitemap);
		return $sitemap;
	}
}

/**
 * function to generate Sitemap XML
 */
if (!function_exists('generateSitemapXML')) {
	function generateSitemapXML($sitemap = array())
	{
        $filename = "sitemap.xml";
        $path = $_SERVER['DOCUMENT_ROOT'] .'/'. SITEMAP_ROOT_PATH . $filename;
        file_put_contents($path, '' ); // Create .xml file
        $myfile = fopen($path, "w"); // open .xml file in write mode
		$CI = & get_instance();
        $CI->db->empty_table("sitemap"); // Truncate sitemap table for new entries

		$xmlString = '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
        $xmlString .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'.PHP_EOL;

        foreach ($sitemap as $type => $links) {
            foreach ($links as $page) {
                $CI->db->insert("sitemap", array('type' => $type, 'page' => $page));
                $xmlString .= '<url>'.PHP_EOL;
                $xmlString .= '<loc>'.htmlentities($page).'</loc>'.PHP_EOL;
                $xmlString .= '<lastmod>'.date(DATE_ATOM,time()).'</lastmod>'.PHP_EOL;
                $xmlString .= '<changefreq>daily</changefreq>'.PHP_EOL;
                $xmlString .= '<priority>'.(($type == 'default')? '1.0' :'0.8').'</priority>'.PHP_EOL;
                $xmlString .= '</url>'.PHP_EOL;
            }
        }

        $xmlString .= '</urlset>';

        fwrite($myfile, $xmlString); // Write sitemap content to file
        fclose($myfile); // Close file after writting
	}
}

/**
 * Function to fetch terms and conditions
 */
if (!function_exists('ourTermsandConditions')) {
	function ourTermsandConditions()
	{
		$CI = & get_instance();
		$CI->load->model('acp/Manage_tnc', 'acpTnC');
		return $CI->acpTnC->getTnc();
	}
}