<?php
// spam & delete links for all versions of WordPress 
function delete_comment_link($id) {
if (current_user_can('edit_post')) {
echo '| <a href="'.get_bloginfo('wpurl').'/wp-admin/comment.php?a ction=cdc&c='.$id.'">Delete</a> ';
echo '| <a href="'.get_bloginfo('wpurl').'/wp-admin/comment.php?a ction=cdc&dt=spam&c='.$id.'">Spam</a>';
} } 
?>