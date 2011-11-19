<?php

function add_js_to_header(){
	?>
<script type='text/javascript' src='<?php bloginfo('stylesheet_directory'); ?>/dttabs.js'></script>
<script type='text/javascript'>
jQuery(document).ready(function($) {
    // $() will work as an alias for jQuery() inside of this function
jQuery(document).ready(function() {
 
	jQuery('#secondary>.xoxo').dttabs({
		widgetid : '#secondary',
		fade : 1000,
		tabTitleReference : '.widgettitle',
		interval : null,
		startTab : 1,
		tabContainerName : 'tab-items',
	});
 
});
});
</script>
 
	<?php
}
add_action('wp_head', 'add_js_to_header');
?>