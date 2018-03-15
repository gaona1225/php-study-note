<?php
/*
 * @return string
*/
function smarty_modifier_sp_utf82gbk($string){
	return iconv('utf8', 'gbk', $string);
}
?>
