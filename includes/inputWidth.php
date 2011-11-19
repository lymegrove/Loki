<?php

function jro_search_form() {
	$search_form = "\n" . "\t";
	$search_form .= '<form id="searchform" method="get" action="' . get_bloginfo('home') .'"><div>';
	$search_form .= "\n" . "\t" . "\t". "\t";
	$search_form .= '<input type="search" autosave="blog.patpro.net" placeholder="Type in your search & hit enter" results="10" name="s" id="s" size="30" value="' . wp_specialchars(stripslashes($_GET['s']), true) .'" size="32" tabindex="1" />';
	$search_form .= '<input id="searchsubmit" name="searchsubmit" type="submit" value="ok" tabindex="2" />';
	$search_form .= "\n" . "\t" . "\t";
	$search_form .= '</div></form>';

	return $search_form;
}
add_filter('thematic_search_form', 'jro_search_form');

?>