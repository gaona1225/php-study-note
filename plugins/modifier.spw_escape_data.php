<?php
function smarty_modifier_spw_escape_data($str){
    
    $str = strval($str);
    return str_replace(array("\\",'<','>',"'",'"',"\n","\r","/"), array("\\\\",'&lt;','&gt;',"\\'",'\\"',"\\n","\\r","\\/"), $str);
    
}
?>
