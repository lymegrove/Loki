<?php
function childtheme_second_loop() {

	if (is_page(2)) {
		query_posts("cat=9&showposts=10");
		thematic_index_loop();
		} elseif (is_page(12)) {
		query_posts("cat=4&showposts=10");
		thematic_index_loop();
		} elseif (is_page(7)) {
		query_posts("cat=3&showposts=10");
		thematic_index_loop();
		wp_reset_query();
		} else {
		return;
	}
}
add_action('thematic_abovepagebottom', 'childtheme_second_loop' );

//          LETS CHANGE THAT ... to a working read more link
function excerpt_ellipse($text) {
   return str_replace('[...]', ' <a href="'.get_permalink().'">Read more ...</a>', $text);
}
add_filter('get_the_excerpt', 'excerpt_ellipse');

?>