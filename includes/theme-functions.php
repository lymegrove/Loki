<?php 

// Show menu in header.php
// Exlude the pages from the slider
function woo_menu( $exclude="" ) {
    // Split the featured pages from the options, and put in an array
    if ( get_option('woo_ex_feat_pages') == "true" ) {
        $menupages = get_option('woo_feat_pages');
        $exclude = $menupages . ',' . $exclude;
    }
    // Split the main content pages from the options, and put in an array
    if ( get_option('woo_ex_main_pages') == "true" ) {
        $menupages = get_option('woo_main_pages');
        $exclude = $menupages . ',' . $exclude;
    }
    
    $pages = wp_list_pages('title_li=&echo=0&depth=3&exclude='.$exclude);
    $pages = preg_replace('%<a ([^>]+)>%U','<a $1><span>', $pages);
    $pages = str_replace('</a>','</span></a>', $pages);
    echo $pages;
}

/*-----------------------------------------------------------------------------------*/
/* WordPress 3.0 New Features Support */
/*-----------------------------------------------------------------------------------*/

if ( function_exists('wp_nav_menu') ) {
	add_theme_support( 'nav-menus' );
	register_nav_menus( array( 'primary-menu' => __( 'Primary Menu' ) ) );
}
    
        
    
?>