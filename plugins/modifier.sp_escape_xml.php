<?php
function smarty_modifier_sp_escape_xml($str){

	$str = strval($str);
	
	return str_replace(array(
		'&','<', '>', '"', "'"
	), array(
		'&amp;','&lt;','&gt;', "&quot;", "&#39;"
	), $str);
}
?>
