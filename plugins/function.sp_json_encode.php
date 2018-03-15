<?php
/**
 * Smarty {json} plugin
 *
 * Type:     function
 * Name:     json
 * @param var (template value)
 */


function utf8_encode_array($array) {
  if (is_array($array)) {
    $result_array = array();
    foreach($array as $key => $value) {

      $encode_key = mb_convert_encoding($key,"UTF-8","GBK");
      if (array_type($array) == "map") {
        // encode both key and value

        if (is_array($value)) {
          // recursion
          $result_array[$encode_key] = utf8_encode_array($value);
        } else {
          // no recursion
          if (is_string($value)) {
            $result_array[$encode_key] = mb_convert_encoding($value,"UTF-8","GBK");
          } else {
            // do not re-encode non-strings, just copy data
            $result_array[$encode_key] = $value;
          }
        }
      } else if (array_type($array) == "vector") {
        // encode value only
       
        if (is_array($value)) {
          // recursion
          $result_array[$encode_key] = utf8_encode_array($value);
        } else {
          // no recursion
          if (is_string($value)) {
            $result_array[$encode_key] = mb_convert_encoding($value,"UTF-8","GBK");
          } else {
            // do not re-encode non-strings, just copy data
            $result_array[$encode_key] = $value;
          }
        }
      }
    }
    return $result_array;
  }
  return false;     // argument is not an array, return false
}

/**
 * Determines array type ("vector" or "map"). Returns false if not an array at all.
 * (I hope a native function will be introduced in some future release of PHP, because
 * this check is inefficient and quite costly in worst case scenario.)
 *
 * @param array $array The array to analyze
 * @return string array type ("vector" or "map") or false if not an array
 */

function array_type($array) {
  if (is_array($array)) {
    $next = 0;

    $return_value = "vector";  // we have a vector until proved otherwise

    foreach ($array as $key => $value) {
      if ($key != $next) {
        $return_value = "map";  // we have a map
        break;
      }
      $next++;
    }
   
    return $return_value;
  }

  return false;    // not array
}
 

function smarty_function_sp_json_encode($params, &$smarty) {	
    
    $var = $params['var'];

    if (is_array($var)) {
        $var = utf8_encode_array($var);
    } else {
        $var = mb_convert_encoding($var,"UTF-8","GBK");
    }

 	$content = json_encode($var);
    $content = mb_convert_encoding($content, "GBK", "UTF-8");
    
 	return $content;
}
?>
