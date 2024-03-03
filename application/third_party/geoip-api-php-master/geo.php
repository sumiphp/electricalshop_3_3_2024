<?php
if (!defined('_GEO_PATH')) define('_GEO_PATH', dirname(preg_replace('/\\\\/','/',__FILE__)) . '/');

require(_GEO_PATH."src/timezone.php");

class Geo
{
	function geo($country, $province)
	{
		return get_time_zone($country, $province);
	}
}
?>