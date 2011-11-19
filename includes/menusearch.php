<?php
function childtheme_override_access() { ?>
        <div id="access">
            <div class="skip-link"><a href="#content" title="<?php _e('Skip navigation to the content', 'thematic'); ?>"><?php _e('Skip to content', 'thematic'); ?></a></div>
			<?php
	    		if ((function_exists("has_nav_menu")) && (has_nav_menu(apply_filters('thematic_primary_menu_id', 'primary-menu')))) {
	    			echo  wp_nav_menu(thematic_nav_menu_args());
    			} else {
    				echo  thematic_add_menuclass(wp_page_menu(thematic_page_menu_args()));
    			}
	    	?>
            <div id="access-search">
                <form id="searchform" method="get" action="<?php bloginfo('home') ?>">
                    <div>
                        <input id="s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="20" tabindex="1" />
                        <input id="searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Search', 'thematic') ?>" tabindex="2" />
                    </div>
                </form>
            </div>

        </div><!-- #access -->
<?php }

?>