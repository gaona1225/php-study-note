<?php
function smarty_modifier_sp_escape_html($str){

	$str = strval($str);
	
	return str_replace(array(
		'<', '>', '"', "'"
	), array(
		'&lt;','&gt;', "&quot;","&#39;"
	), $str);
}
?>
