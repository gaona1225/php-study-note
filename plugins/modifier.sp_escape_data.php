<?php
function smarty_modifier_sp_escape_data($str){
	$str = strval($str);
	
	return str_replace(array(
		'\\','<', '>', '"', "'", "\n", "\r", "/"
	), array(
		'\\\\','&lt;','&gt;','\\&quot;',"\\&#39;","\\n","\\r","\\/"
	), $str);
}
?>
