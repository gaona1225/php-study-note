<?php
function smarty_modifier_space_callback_entity($callback, $len = 32){
	$callback = substr($callback,0, $len);    //MAX_LENGTH
	$callback = preg_replace('/[^\w\.\'"()]/','',$callback);
	return $callback;
}
?>
