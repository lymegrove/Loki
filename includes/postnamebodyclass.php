<?php
function wpprogrammer_post_name_in_body_class( $classes ){
	if( is_singular() )
	{
		global $post;
		array_push( $classes, "{$post->post_type}-{$post->post_name}" );
	}
	return $classes;
}

add_filter( 'body_class', 'wpprogrammer_post_name_in_body_class' );
?>