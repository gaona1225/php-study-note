<?php

function smarty_modifier_space_truncate($text, $len = 120, $etc = '...')
{
	if (strlen($text) <= $len ) {
		return $text;
	}
	if(ord($text[$len-1]) > 0x80){
		$intCodeNum = 0;
		for($i=$len-1;$i>=0;$i--){
			if(ord($text[$i]) > 0x80){
				$intCodeNum++;
			}else{
				break;
			}   
		}   
		if($intCodeNum % 2 == 1){ 
			$len -= 1;
		}   
	}   
	$text = substr($text,0,$len);
	return $text.$etc;
}

?>
