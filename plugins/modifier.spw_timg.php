<?php
function smarty_modifier_spw_timg($src, $size, $quality = 80){
    $key = 'wisetimgkey';
    $sec = strtotime('now');
    $di = md5($key.$sec.$src);
    $url = 'http://mt1.baidu.com/timg?waphi';

    return $url.
           '&amp;quality='.$quality.
           '&amp;size='.$size.
           '&amp;sec='.$sec.
           '&amp;di='.$di.
           '&amp;src='.urlencode($src);
}
 
