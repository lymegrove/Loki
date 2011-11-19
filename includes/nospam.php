<?php
function delete_comment_link($id) {
  if (current_user_can('edit_post')) {
    echo '| <a href="'.admin_url("comment.php?action=cdc&c=$id").'">del</a> ';
    echo '| <a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">spam</a>';
  }
}
?>