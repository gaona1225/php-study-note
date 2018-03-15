<?php
function smarty_modifier_sp_multi_domain($domain, $hash_text = '',$multi = 'a,b,c,d,e', $mode = 1){
	$domain = strval($domain);
	$multi_domain_token = explode(',', $multi);
	if(strpos($domain, 'http') !== 0 || count($multi_domain_token) == 0) return $domain;
	$sha1_value = intval(substr(md5($hash_text), 0, 1), 16); //获取hash值首字母的10进制数
	$md = $multi_domain_token[$sha1_value % count($multi_domain_token)];
	if($mode == 1){ //模式1返回的为http://1.tx.bdimg.com
		$http = 'http';
		if(strpos($domain, 'https') === 0) $http = 'https';
		return $http . '://' . $md . '.' . substr($domain, strlen($http) + 3);
	}else if($mode == 2){ //模式2返回的为http://tx1.bdimg.com
		$dot_pos = strpos($domain, '.');
		return substr($domain, 0, $dot_pos) . $md . substr($domain, $dot_pos);
	}
}