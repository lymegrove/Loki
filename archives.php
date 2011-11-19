<?php
/*
Template Name: Archives Page
*/
?>
<?php

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>	
		<div id="container">
		
			<?php thematic_abovecontent(); ?>
		
			<div id="content">
            <h2 class="entry-title">Ideas</h2>
            <ul>  
                 <?php wp_list_categories('title_li=&hide_empty=0'); ?>  
            </ul>
<?php while(have_posts()) : the_post(); ?>
<h2 class="entry-title">Info</h2>
<ul>
    <?php $totalposts = get_posts('numberposts=200&offset=0');
          foreach($totalposts as $post) :
    ?>
    <li>
          <div class='date'>Presented on <?php the_time('M j') ?>:</div><a href="<?php the_permalink(); ?>" class="archive-title"><?php the_title('<h3>', '</h3>'); ?></a>
		  Posted in: <?php the_category(', ') ?>
		  <?php the_excerpt(); ?>
    </li>

    <?php endforeach; ?>
</ul>

<?php endwhile; ?>
<h2 class="entry-title">Conversations</h2>
<ul>
<div id="popularthreads" class="dsq-widget"><script type="text/javascript" src="http://thinkologicaldev2.disqus.com/popular_threads_widget.js?num_items=5"></script></div><a href="http://disqus.com/">Powered by Disqus</a>
</ul>

</div>
<!-- #content -->
			
			<?php thematic_belowcontent(); ?> 
			
		</div><!-- #container -->

<?php 

    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();

?>
