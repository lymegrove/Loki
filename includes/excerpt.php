<?php
/** Where to use excerpt/full posts **/
$full_content = false;
function childtheme_content($content) {
    if ($full_content) {
        $content= 'full';
    } elseif (is_home() || is_front_page()) {
        $content= 'excerpt';
    } elseif (is_single()) {
        $content = 'full';
    } elseif (is_tag()) {
        $content = 'excerpt';
    } elseif (is_search()) {
        $content = 'excerpt';
    } elseif (is_category()) {
        $content = 'excerpt';
    } elseif (is_author()) {
        $content = 'excerpt';
    } elseif (is_archive()) {
        $content = 'excerpt';
    }
    return $content;
}
add_filter('thematic_content', 'childtheme_content');
/** End Where to use excerpt/full posts **/
?>