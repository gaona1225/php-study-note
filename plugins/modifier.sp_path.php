<?php
/*
 * @finish done
 * like escape:'urlpathinfo'
 * @param string
 * @param urlpathinfo|url
 * v => javascript _to_ innerHTML
 * @return string	//'' 32
*/
function smarty_modifier_sp_path($string, $esc_type = 'urlpathinfo'){

	switch ($esc_type) {
        case 'urlpathinfo':
            return str_replace('%3A',':',str_replace('%2F','/',rawurlencode($string)));
        case 'url':
            return rawurlencode($string);
        default:
            return $string;
    }

}
?>
