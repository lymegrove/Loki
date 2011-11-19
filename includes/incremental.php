<?php
function updateNumbers() {
  global $wpdb;
  $querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ";
$pageposts = $wpdb->get_results($querystr, OBJECT);
  $counts = 0 ;
  if ($pageposts):
    foreach ($pageposts as $post):
      setup_postdata($post);
      $counts++;
      add_post_meta($post->ID, 'incr_number', $counts, true);
      update_post_meta($post->ID, 'incr_number', $counts);
    endforeach;
  endif;
}  
 
add_action ( 'publish_post', 'updateNumbers' );
add_action ( 'deleted_post', 'updateNumbers' );
add_action ( 'edit_post', 'updateNumbers' );
?>