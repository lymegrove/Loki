<?php

// even more smart jquery inclusion :)
add_action( 'init', 'jquery_register' );
add_filter( 'script_loader_src', 'jquery_unversion' );

// register from google and for footer
function jquery_register() {

if ( !is_admin() ) {

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' ), false, '1.x', true );
    wp_enqueue_script( 'jquery' );
}
}

// remove version tag to improve cache compatibility
function jquery_unversion( $src ) {

if( strpos( $src, 'ajax.googleapis.com' ) )
    $src = remove_query_arg( 'ver', $src );

return $src;
}
?>