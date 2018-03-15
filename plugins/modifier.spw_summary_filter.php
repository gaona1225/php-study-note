<?php
function smarty_modifier_spw_summary_filter($text){
    $text = preg_replace('/<p[^>]>(.*?)<\/p>/', "$1\n", $text);
    $text = strip_tags($text);
    $text = htmlspecialchars_decode($text, ENT_QUOTES);
    $text = str_replace(array(" ","\r", "\t", '', '&nbsp;'), '', $text);

    return $text;
}
 
