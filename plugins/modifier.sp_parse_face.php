<?php
/*
 * app����������
 * author : welefen 
 * @param string
 * @return string	//'' 32
*/
function smarty_modifier_sp_parse_face($string){
	$ubb = array('[΢Ц]',  '[��Ц]',  '[װɵ]',  '[����]',  '[��]',  '[����]',  '[����]', 
				'[һ�κ�]',  '[��]',  '[������]',  '[����]',  '[����]',  '[ţ]',  '[�����]', 
				'[�ʺ�]',  '[����]',  '[��]',  '[����]',  '[ί��]',  '[��]',  '[��Ц]', 
				'[����]',  '[����]',  '[õ��]',  '[����]',  '[>o<]',  '[-_-]',  '[�ɰ�]', 
				'[ɫ]',  '[գ��]',  '[�öູ]',  '[��]',  '[��]',  '[����]',  '[��ŭ]', 
				'[����]',  '[��]',  '[�ʺ�]',  '[����]',  '[̫��]',  '[Ǯ]',  '[�����]', 
				'[����]',  '[����]',  '[����]',  '[��]',  '[Ү]',  '[��]',  '[��]', 
				'[OK]');
	$html = array();
	$string = str_replace('[���ı���]', '<img width="25" height="25" style="border:0;" src="http://img.baidu.com/hi/apps/hoho/cookie.gif" />', $string);
	for($i=1,$count=count($ubb);$i<=$count;$i++){
		$html[] = '<img style="border:0;" src="http://img.baidu.com/hi/face/i_f'. str_pad($i,2,'0',STR_PAD_LEFT) .'.gif" width="25" height="25" />';
	}
	return str_replace($ubb, $html, $string);
}
?>
