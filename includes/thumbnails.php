<?php

/* Image Placeholders */

 $img_placeholder = get_bloginfo('stylesheet_directory').'/images/camera.png';

 $img_big_placeholder = get_bloginfo('stylesheet_directory').'/images/camera_big.png';
 
/* Add theme support  for post thumbnails  */

add_theme_support( 'post-thumbnails' );

add_image_size( 'post-thumbnail', 150, 150, true);

add_image_size( 'post-img', 300, 278, true);


?>