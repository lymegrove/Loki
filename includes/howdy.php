<?php
/**REPLACE HOWDY**/
// Customize:
$nohowdy = "Welcome Back";

// Hook in
if (is_admin()) {
add_action('init', 'ozh_nohowdy_h');
add_action('admin_footer', 'ozh_nohowdy_f');
}

// Load jQuery
function ozh_nohowdy_h() {
wp_enqueue_script('jquery');
}

// Modify
function ozh_nohowdy_f() {
global $nohowdy;
echo <<<JS
<script type="text/javascript">
//<![CDATA[
var nohowdy = "$nohowdy";
jQuery('#user_info p')
.html(
jQuery('#user_info p')
.html()
.replace(/Howdy/,nohowdy)
);
//]]>
JS;
}
/**END REPLACE HOWDY**/
?>