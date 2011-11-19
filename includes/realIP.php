<?php
// Gets the user's real IP address

$_SERVER['REMOTE_ADDR'] = getRealIpAddress();
function getRealIpAddress( $validate = true ) {
    if ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($ips[count($ips) - 1]);
    } elseif ( isset($_SERVER['HTTP_X_REAL_IP']) && !empty($_SERVER['HTTP_X_REAL_IP']) ) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    } elseif ( isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) ) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if ( $validate && function_exists('filter_var') &&  filter_var($ip, FILTER_VALIDATE_IP, array('flags' => FILTER_FLAG_IPV4, FILTER_FLAG_NO_PRIV_RANGE, FILTER_FLAG_NO_RES_RANGE)) )
        return $ip;
    elseif ( $validate )
        return long2ip(ip2long($ip));

    return $ip;
}
?>