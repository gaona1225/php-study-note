<?php
function smarty_modifier_space_js_entity($str){
	$str_len = strlen($str);
	$pos = 0;
	$ret = "";
	$arr_js_char = array(
			"\\" => "\\\\",
			"\n" => "\\n",
			"\r"   => "\\r",
			'"'    => "\\x22",
			"\'"   => "\\x27",
			'<'    => '\\x3c',
			'>'    => '\\x3e',
			'&'    => '\\x26'
			);
	while($pos < $str_len){
		if(ord($str{$pos}) > 0x80){
			$ret .= $str{$pos++};
			$ret .= $str{$pos++};
		}
		else{
			if(!empty($arr_js_char[$str{$pos}])){
				$ret .= $arr_js_char[$str{$pos++}];
			}
			else{
				$ret .= $str{$pos++};
			}
		}
	}
	return $ret;
}
?>
