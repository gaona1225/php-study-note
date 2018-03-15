<?php
/*
* sp_newline
* replace \r\n,\n,\r to <br />
*/
function smarty_modifier_sp_newline($string){
	$string = strval($string);
	$string = str_replace("\r\n", "\n", $string);
	$string = str_replace(array("\n", "\r"), "<br />", $string);
	return $string;
}

?>
