<?php
function featured_posts(){

		$my_query = new WP_Query('tag=featured&showposts=3');

		echo '<h1 class="entry-title">Featured Posts</h1><ul id="featured-posts">';
		$feat_class = array();

		while ($my_query->have_posts()) : $my_query->the_post();
				$feat_class = array();
				// Category for the post queried
				foreach ( (array) get_the_category() as $cat )
					$feat_class[] = 'category-' . $cat->slug;
					$feat_class = join(" ", $feat_class);
				?>
				<li id="featured-<?php the_ID(); ?>" class="<?php echo $feat_class; ?>">
					<?php
						$posttitle = '<h4><a href="';
						$posttitle .= get_permalink();
						$posttitle .= '" title="';
						$posttitle .= __('Permalink to ', 'thematic') . the_title_attribute('echo=0');
						$posttitle .= '" rel="bookmark">';
						$posttitle .= get_the_title();
						$posttitle .= "</a></h4>\n";
						echo $posttitle;

						the_excerpt();
					?>

				</li><!-- .post -->
		<?php
		endwhile;
		echo '</ul>';
}
add_action('thematic_above_indexloop','featured_posts');
?>