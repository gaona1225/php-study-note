<?php
/*
 * app±íÇé½âÎö²å¼þ
 * author : welefen 
 * @param string
 * @return string	//'' 32
*/
function smarty_modifier_sp_parse_face($string){
	$ubb = array('[Î¢Ð¦]',  '[´óÐ¦]',  '[×°Éµ]',  '[½ôÕÅ]',  '[¿á]',  '[ÉúÆø]',  '[×ÔÐÅ]', 
				'[Ò»µÎº¹]',  '[¿Þ]',  '[»µÖ÷Òâ]',  '[±ÉÊÓ]',  '[·¢´ô]',  '[Å£]',  '[Êé´ô×Ó]', 
				'[ÎÊºÅ]',  '[Á³ºì]',  '[ÍÂ]',  '[º¦Ðß]',  '[Î¯Çü]',  '[Ç×]',  '[ÚÆÐ¦]', 
				'[°®Çé]',  '[ÐÄËé]',  '[Ãµ¹å]',  '[ÀñÎï]',  '[>o<]',  '[-_-]',  '[¿É°®]', 
				'[É«]',  '[Õ£ÑÛ]',  '[ºÃ¶àº¹]',  '[ã¿ã½]',  '[À§]',  '[º¦ÅÂ]',  '[·ßÅ­]', 
				'[¾ªÑÈ]',  '[Åç]',  '[²Êºç]',  '[ÔÂÁÁ]',  '[Ì«Ñô]',  '[Ç®]',  '[µçµÆÅÝ]', 
				'[¿§·È]',  '[µ°¸â]',  '[ÒôÀÖ]',  '[°®]',  '[Ò®]',  '[¶¥]',  '[²È]', 
				'[OK]');
	$html = array();
	$string = str_replace('[°®ÐÄ±ý¸É]', '<img width="25" height="25" style="border:0;" src="http://img.baidu.com/hi/apps/hoho/cookie.gif" />', $string);
	for($i=1,$count=count($ubb);$i<=$count;$i++){
		$html[] = '<img style="border:0;" src="http://img.baidu.com/hi/face/i_f'. str_pad($i,2,'0',STR_PAD_LEFT) .'.gif" width="25" height="25" />';
	}
	return str_replace($ubb, $html, $string);
}
?>
