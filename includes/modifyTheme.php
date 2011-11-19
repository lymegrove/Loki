<?php
/** Modify Theme **/
function my_footer($thm_footertext) {
    $thm_footertext = 'Powered by <a href="http://www.wordpress.org">WordPress</a> and Suite101.';
    return $thm_footertext;
}
add_filter('thematic_footertext', 'my_footer');
/** End Modify Theme **/
?>