<?php
/*
 * @finish TODO
 * @param string
 * @param h|x|url|j|v|callback|url|urlpathinfo		 :x 	 :h 	 :j 	 :j:h 	 :v 
 * p => urlpathinfo
 * jh => javascript _on_ html
 * v => javascript _to_ innerHTML
 * @return string	//'' 32
*/
function smarty_modifier_sp_escape($string, $esc_type = 'h', $esc_type_ex = ''){

	switch ($esc_type) {
        case 'h':
			$str_len = strlen($str);
			$pos = 0;
			$ret = "";
			$arr_js_char = array(
					'<' => '&lt;',
					">" => '&gt;',
					"'" => '&#39;',
					'"'    => '&quot;'
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
		case 'x':
			$str_len = strlen($str);
			$pos = 0;
			$ret = "";
			$arr_js_char = array(
					'<' => '&lt;',
					">" => '&gt;',
					"'" => '&#39;',
					'"' => '&quot;',
					'&' => '&amp;'
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
        case 'callback':
			if($esc_type_ex == ''){
				$len = 32;	//default;
			} else {
				$len = $esc_type_ex;
			}
			$callback = substr($string,0, $len);    //MAX_LENGTH
			$callback = preg_replace('/[^\w\.\'"()]/','',$callback);
			return $callback;

        case 'url':
            return rawurlencode($string);

        case 'urlpathinfo':
            return str_replace('%2F','/',rawurlencode($string));

        case 'j':
			$str_len = strlen($str);
			$pos = 0;
			$ret = "";
			$arr_js_char = array(
					"'"	=> "\\x27",
					"\""    => "\\x22",
					"\\"	=> "\\\\",
					"/"		=> "\\/",
					"\n"	=> "\\n",
					"\r"	=> "\\r",
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
        case 'v':	//html + onclick
			$str_len = strlen($str);
			$pos = 0;
			$ret = "";
			$arr_js_char = array(
				'<' => 	 '&lt;',
				'>' =>	'&gt;',
				'&' =>	'&amp;',
				"'" =>	"\\&#39;",
				"\"" =>	"\\&quot;",
				"\\" => "\\\\",
				"\n" => "\\n",
				"\r" => "\\r",
				"/" => "\\/"
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
		case 'jh':	//innerHTML
		//case 'hj':
			$str_len = strlen($str);
			$pos = 0;
			$ret = "";
			$arr_js_char = array(
				'<' => 	 '&lt;',
				'>' =>	'&gt;',
				"'" =>	"\\&#39;",
				"\"" =>	"\\&quot;",
				"\\" => "\\\\",
				"\n" => "\\n",
				"\r" => "\\r",
				"/" => "\\/"
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
			
        default:
            return $string;
    }

}
?>
