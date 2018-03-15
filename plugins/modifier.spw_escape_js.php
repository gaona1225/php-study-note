<?php
function smarty_modifier_spw_escape_js($str){
    
    $str = strval($str);
    return str_replace(array("\\","'","\"","/","\n","\r"), array("\\\\","\\x27","\\x22","\\/","\\n","\\r"), $str);
    
}
?>
