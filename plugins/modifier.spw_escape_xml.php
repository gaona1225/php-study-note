<?php
function smarty_modifier_spw_escape_xml($str){
    
    $str = strval($str);
    $str = str_replace('', '', $str);
    return str_replace(array('&','<',">","'",'"'), array('&amp;','&lt;','&gt;','&#39;','&quot;'), $str);
    
}
?>
