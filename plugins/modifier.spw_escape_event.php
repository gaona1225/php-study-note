<?php
function smarty_modifier_spw_escape_event($str){
    
    $str = strval($str);
    return str_replace(array("\\",'&','<','>',"'",'"',"\n","\r","/"), array("\\\\",'&amp;','&lt;','&gt;',"\\&#39;","\\&quot;","\\n","\\r","\\/"), $str);
    
}
?>
