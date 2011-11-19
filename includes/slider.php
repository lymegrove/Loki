<?php
	// Split the featured pages from the options, and put in an array
	$featpages = get_option('woo_feat_pages');
	$featarr=split(",",$featpages);
	$featarr = array_diff($featarr, array(""));
?>


<div id="featured">
    <div id="loopedSlider">
    	<?php //<div id="slider-block"> ?>
        <?php if (count($featarr) > 1){ ?>
            <ul class="nav-buttons">
                    <li id="p"><a href="#" class="previous"><img src="<?php bloginfo('template_directory'); ?>/images/slider-arrow-left.png" alt="&lt;" /></a></li>
                    <li id="n"><a href="#" class="next"><img src="<?php bloginfo('template_directory'); ?>/images/slider-arrow-right.png" alt="&gt;" /></a></li>
            </ul>    
            <?php } ?>       
        
             <div class="container">  
                 <div class="slides">  
               
			    <?php foreach ( $featarr as $featitem ) { ?>
                <?php query_posts('page_id=' . $featitem); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); $count++; ?>		        					
                  
				    <div id="slide-<?php echo $count; ?>" class="slide" <?php if($count >= 2) { echo 'style="display:none"'; }?>>                

					    <?php if ( get_post_meta($post->ID, 'image', true) ) { ?>
                        <img src="<?php echo get_post_meta($post->ID, "image", $single = true); ?>" alt="" class="alignright slider-image" />				
                        <?php } ?> 
	                   				       
                        <?php the_content(); ?>

                </div>     

			<?php endwhile; endif; ?>
            <?php } ?>
             </div>    
            </div><!-- .container ends -->   
            
       <?php // </div><!-- #loopedSlider ends -->        ?>
    </div><!-- .content ends -->
</div><!-- #featured ends -->
