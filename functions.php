<?php 
	function myGetData($type = null, $key = null, $value = null, $time = 0) {
        global $_globals;
        if(isset($_globals[$type][$key]) && isset($key)) {
            if(is_array($_globals[$type][$key])) {
                return array_map(function($index) {
                    return myFilterStr($index);
                }, $_globals[$type][$key]);
            }
            if(isset($value)) {
                if($type == '_COOKIE') {
                    setcookie($name, $value, $time);
                } else {
                    $_globals[$type][$key] = myFilterStr($value);
                }
            }
            return myFilterStr($_globals[$type][$key]);
        } elseif(isset($type)) {
            return count($_globals[$type]) && $value || !$key ? $_globals[$type] : false;
        } else {
			return $_globals;
		}
    }
    function myFilterStr($string) {
        return htmlspecialchars(trim($string));
    }
?>