<?php
// Disable Trackbacks http://digwp.com/u/37 
class DisableTrackbacks {
// initialize plugin 
function DisableTrackbacks() {
add_action('pings_open', array(&$this, 'pings_open'));
} 
// if trackback, close pings 

function pings_open($open) {
return ('1' == get_query_var('tb')) ? FALSE : $open;
}
} // load after all other plugins
add_action('plugins_loaded', create_function('', 'global $DisableTrackbacks; $DisableTrackbacks = new DisableTrackbacks();'));
?>