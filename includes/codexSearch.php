<?php
/**
 * ADD WP CODEX SEARCH FORM TO DASHBOARD HEADER
 */
function wp_codex_search_form() {
    echo '<form target="_blank" method="get" action="http://wordpress.org/search/do-search.php" class="alignright" style="margin: 11px 5px 0;">
        <input type="text" onblur="this.value=(this.value==\'\') ? \'Search the Codex\' : this.value;" onfocus="this.value=(this.value==\'Search the Codex\') ? \'\' : this.value;" maxlength="150" value="Search the Codex" name="search" class="text"> <input type="submit" value="Go" class="button" />
    </form>';
}
add_filter( 'in_admin_header', 'wp_codex_search_form', 11 );
?>