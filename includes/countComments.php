<?php
function countComments($count) { global $wp_query;
return count($wp_query->comments_by_type['comment']); add_filter('get_comments_number', 'countComments', 0);
}
add_filter('get_comments_number', 'countComments', 0);
?>