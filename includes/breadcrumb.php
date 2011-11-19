<?php
//Add Breadcrumb on top of single posts
function add_joost_breadcrumb($postmeta) {
	if (is_single()) {
	if (function_exists('yoast_breadcrumb') )
	$postmeta .= yoast_breadcrumb('<p id="breadcrumbs">','
');
	}
	return $postmeta;
}
add_action ('thematic_postheader_postmeta','add_joost_breadcrumb');
?>