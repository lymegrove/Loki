<?php
if ( function_exists('register_sidebar') ) { register_sidebar(array( 'before_widget' => '<div class="widget %s"&t;', 'after_widget' => '</div>', 'before_title' => '<h3 class="widgettitle"><span>', 'name' => '404 Page Content', 'after_title' => '</span></h3>', )); }
?>