<?php
function childtheme_menu_args( $args ) {
$my_args = array(
'show_home' => 'Home',
'sort_column' => 'menu_order',
'menu_class' => 'menu',
'echo' => false
);

return wp_parse_args( $my_args, $args );
}
add_filter('wp_page_menu_args','childtheme_menu_args', 20);
?>