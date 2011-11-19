<?php
// Add a custom post header
function childtheme_postheader() {
    global $post; 
 
    if (is_page()) { ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php } elseif (is_404()) { ?>
        <h1 class="entry-title">Yikes! Not Found</h1>
    <?php } elseif (is_single()) { ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-meta">
            <span><?php if ( function_exists('yoast_breadcrumb') ) {	yoast_breadcrumb('<div id="breadcrumb">','</div>');	} ?></span>
            <span class="author vcard"><?php $author = get_the_author(); ?><?php _e('By ', 'thematic') ?><span class="fn n"><?php _e("$author") ?></span></span>
            <span class="meta-sep">|</span>
            <p id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?></p>
            <span class="entry-date"><abbr class="published" title="<?php get_the_time('Y-m-d\TH:i:sO'); ?>"><?php the_time('F jS, Y') ?></abbr></span>
        </div><!-- .entry-meta -->
    <?php } else { ?>
        <h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf(__('Permalink to %s', 'thematic'), wp_specialchars(get_the_title(), 1)) ?>" rel="bookmark"><?php the_title() ?></a></h2>
        <?php if ($post->post_type == 'post') { // Hide entry meta on searches ?>
        
        <div class="entry-meta">
        	<span><?php if ( function_exists('yoast_breadcrumb') ) {	yoast_breadcrumb('<div id="breadcrumb">','</div>');	} ?></span>
            <span class="author vcard"><?php $author = get_the_author(); ?><?php _e('By ', 'thematic') ?><span class="fn n"><?php _e("$author") ?></span></span>
            <span class="meta-sep">|</span>
            <p id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?></p>
            <span class="entry-date"><abbr class="published" title="<?php get_the_time('Y-m-d\TH:i:sO'); ?>"><?php the_time('F jS, Y') ?></abbr></span>
        </div><!-- .entry-meta -->
        <?php } ?>
    <?php }
}
add_filter ('thematic_postheader', 'childtheme_postheader');
?>