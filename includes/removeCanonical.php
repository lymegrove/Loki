<?php
function remove_thm_canonical($thm_canonical_link) {
	/* add the conditioal tags you want
		to remove the canonical link */
	if ( is_page() ) {
		// remove action for  WP 2.9+ function
		remove_action( 'wp_head', 'rel_canonical' );
		// empty Thematic's canonical link
		$thm_canonical_link = null;
	}
	/* check for the WP 2.9 before passing on Thematic's
		duplicate canonical link for all is_singular()	*/
	if ( !function_exists ('rel_canonical') ) {
		return $thm_canonical_link;
	}
}
add_filter('thematic_canonical_url', 'remove_thm_canonical');

?>