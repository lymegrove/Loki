<?php

if ( !is_admin() ) { // instruction to only load if it is not the admin area
   // register your script location, dependencies and version
   wp_register_script('adjustBorder',
       get_bloginfo('stylesheet_directory') . '/js/equalheights.js',
       array('jquery'),
       '1.0' );
   // enqueue the script
   wp_enqueue_script('adjustBorder');
}

?>