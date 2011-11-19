<?php

function remove_thematic_index_loop() {
      remove_action ('thematic_indexloop','thematic_index_loop');
}
add_action('init','remove_thematic_index_loop');

function my_index_loop() { ?>

    <?php while ( have_posts() ) : the_post() ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'shape'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

					<div class="entry-meta">
						<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'shape' ), __( '1 Comment', 'shape' ), __( '% Comments', 'shape' ) ) ?></span>
						<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'shape' ); ?></span><?php echo get_the_category_list(', '); ?></span>
					</div><!-- .entry-meta -->

					<div class="entry-content">
<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'shape' )  ); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'shape' ) . '&after=</div>') ?>
					</div><!-- .entry-content -->

				</div><!-- #post-<?php the_ID(); ?> -->

<?php comments_template(); ?>				

<?php endwhile; ?>	

	<?
}
add_action('thematic_indexloop', 'my_index_loop');

?>