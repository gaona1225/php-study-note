<?php
/*
* sp_proxy plugins
* author: welefen
* version: 1.0
* pubdate: 2010-12-10
*/
function smarty_function_sp_proxy($params, &$smarty){
	$referer = explode('/', str_replace("//", '++', $_SERVER['HTTP_REFERER']));
	$domain = str_replace('++', '//', $referer[0]);
	if(empty($params['fun'])){
		$params['fun'] = $_POST['callback'];
	}
	require_once dirname(__FILE__) . '/modifier.sp_escape_callback.php';
	$params['fun'] = smarty_modifier_sp_escape_callback($params['fun'], 32, $smarty);
	
	$query = http_build_query($params);
	
	$string = '<script>location.replace("';
	$string .= $domain . '/static/html/proxy.html#' . $query;
	$string .= '")</script>';
	return $string;
}
?>
