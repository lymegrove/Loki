<?php
/* Dynamic Titles **/
// This sets your <title> depending on what page you're on, for better formatting and for SEO
function dynamictitles() {

    if ( is_single() ) {
      wp_title('');
      echo (' | ');
      bloginfo('name');

} else if ( is_page() || is_paged() ) {
      bloginfo('name');
      wp_title('|');

} else if ( is_author() ) {
      bloginfo('name');
      wp_title(' | '.__('Author','theme-name').'');

} else if ( is_category() ) {
      bloginfo('name');
      wp_title(' | '.__('Archive for','theme-name').'');
      ('');

} else if ( is_tag() ) {
      bloginfo('name');
      echo (' | '.__('Tag archive for','theme-name').'');
      wp_title('');

} else if ( is_archive() ) {
      bloginfo('name');
      echo (' | '.__('Archive for','theme-name').'');
      wp_title('');

} else if ( is_search() ) {
      bloginfo('name');
      echo (' | '.__('Search Results','theme-name').'');

} else if ( is_404() ) {
      bloginfo('name');
      echo (' | '.__('404 Error (Page Not Found)','theme-name').'');

} else if ( is_home() ) {
      bloginfo('name');
      echo (' | ');
      bloginfo('description');

} else {
      bloginfo('name');
      echo (' | ');
      echo (''.$blog_longd.'');
}
}

?>