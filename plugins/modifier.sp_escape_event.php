<?php
function smarty_modifier_sp_escape_event($str){

	$str = strval($str);
	
	return str_replace(array(
		'\\','&','<', '>', '"', "'", "\n", "\r", "/"
	), array(
		'\\\\','&amp;','&lt;','&gt;','\\&quot;',"\\&#39;","\\n","\\r","\\/"
	), $str);
}
?>
