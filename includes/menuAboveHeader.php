<?php
/** Display a Menu Above Header **/
function remove_thematic_actions() {
    remove_action('thematic_header','thematic_access',9);
}
add_action('init','remove_thematic_actions');
add_action('wp','remove_thematic_actions');
function search_access() { ?>
        <div id="access">
            <div class="skip-link"><a href="#content" title="<?php _e('Skip navigation to the content', 'thematic'); ?>"><?php _e('Skip to content', 'thematic'); ?></a></div>
            <?php wp_page_menu('sort_column=menu_order') ?>
 
            <div id="access-search">
                <form id="searchform" method="get" action="<?php bloginfo('home') ?>">
                    <div>
                        <input id="s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="20" tabindex="1" />
                        <input id="searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Search', 'thematic') ?>" tabindex="2" />
                    </div>
                </form>
            </div>
 
        </div><!-- #access -->
<?php 
}
add_action('thematic_aboveheader','thematic_access','search_access',9);

/** End Display a Menu Above Header **/
?>