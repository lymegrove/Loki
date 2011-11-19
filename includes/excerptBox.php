<?php
if ( function_exists('add_post_type_support') ) 
{
    add_action('init', 'add_page_excerpts');
    function add_page_excerpts() 
    {        
        add_post_type_support( 'page', 'excerpt' );
    }
}
?>