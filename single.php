<?php

global $options;

foreach ($options as $value) {

    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }

    else { $$value['id'] = get_settings( $value['id'] ); }

    }

?>

<?php get_header() ?>



	<div id="container">

		<div id="content">



<?php the_post(); ?>

			<div id="nav-above" class="navigation">

				<div class="nav-previous"><?php previous_post_link('%link', '<span class="meta-nav">&laquo;</span> %title') ?></div>

				<div class="nav-next"><?php next_post_link('%link', '%title <span class="meta-nav">&raquo;</span>') ?></div>

			</div>



<?php get_sidebar('single-top') ?>



			<div id="post-<?php the_ID(); ?>" class="<?php thematic_post_class(); ?>">

				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'shape'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="entry-meta">
				<span class="entry-meta author"><span class="meta-prep meta-prep-author"> Posted by</span><span class="author vcard"> <?php the_author_posts_link() ?></span></span>
				<span class="meta-sep meta-sep-entry-date"> | </span>
				<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
				<span class="meta-sep meta-sep-entry-date"> | </span>
				<span class="cat-links"><?php echo get_the_category_list(', '); ?></span><br />
                </div>
                <div class="metaBox">
                <span class="metaarrangePost">
                <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'shape' ), __( '1 Comment', 'shape' ), __( '% Comments', 'shape' ) ) ?></span>
				<span class="facebook-like"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=true&amp;width=40&amp;action=like&amp;font=arial&amp;colorscheme=dark&amp;height=26" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe></span>
                <span class="retweet-button"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span>
				</span>
				</div>
				<div class="entry-content">

				

<?php the_content(''.__('Read More <span class="meta-nav">&raquo;</span>', 'thematic').''); ?>



					<?php wp_link_pages('before=<div class="page-link">' .__('Pages:', 'thematic') . '&after=</div>') ?>

				</div>

				<?php thematic_postfooter(); ?>

			</div><!-- .post -->

			

<?php get_sidebar('single-insert') ?>



			<div id="nav-below" class="navigation">

				<div class="nav-previous"><?php previous_post_link('%link', '<span class="meta-nav">&laquo;</span> %title') ?></div>

				<div class="nav-next"><?php next_post_link('%link', '%title <span class="meta-nav">&raquo;</span>') ?></div>

			</div>



<?php comments_template('', true); ?>



<?php get_sidebar('single-bottom') ?>



		</div><!-- #content -->

	</div><!-- #container -->



<?php thematic_sidebar() ?>

<?php get_footer() ?>

