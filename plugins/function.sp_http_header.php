<?php
/**
 * 给PHP模板输入HTTP 头, 暂时用得到的是 content-type
* @params [type]:   json,html, 
* Examples:<br>
* <pre>
* <& sp_http_header type='json' charset='gbk' &>
* </pre>
* 
* text/html         Normal html based content
* text/css          Cascading style sheets
* text/xml          XML data, e.g. SOAP requests and responses
* text/*            Any textual content type including all the above types
* image/gif         GIF image
* image/jpg         JPEG image
* image/*           Any image including gifs, jpgs and png files
* application/x-javascript  Javascript
* application/*     Any application content, e.g. flash files (application/x-shockwave-flash)
* 'txt' => 'text/plain',
* 'xsl' => 'text/xml', 
* 'xhtml' => 'application/xhtml+xml', 
* application/json; charset=utf-8
 */
function smarty_function_sp_http_header($params, &$smarty)
{
    $DEFAULT_MIME='html';
    $DEFAULT_CHARSET='GBK';

    $type = (empty($params['type'])) ? $DEFAULT_MIME : $params['type'];
    $charset = (empty($params['charset'])) ? $DEFAULT_CHARSET : $params['charset']; //UTF-8 ? GBK
    $mime;

    switch($type){
    case 'html':
            $mime = 'text/html';
            break;
        case 'json':
            $mime = 'application/json';
            break;
        case 'js':
            $mime = 'application/x-javascript';
            break;
        case 'xml':
            $mime = 'text/xml';
            break;
        default:
            $mime = 'text/plain';
    }
    header("Content-Type:$mime; charset=$charset;");
}

?>
