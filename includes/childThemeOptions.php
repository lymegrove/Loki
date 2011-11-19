<?php
// ---------- "Child Theme Options" menu STARTS HERE

add_action('admin_menu' , 'childtheme_add_admin');

function childtheme_add_admin() {
	add_submenu_page('themes.php', 'Child Theme Options', 'Child Theme Options', 'edit_themes', basename(__FILE__), 'childtheme_admin');
}

function childtheme_admin() {

	$child_theme_image = get_option('child_theme_image');
	$enabled = get_option('child_theme_logo_enabled');

	if ($_POST['options-submit']){
		$enabled = htmlspecialchars($_POST['enabled']);
		update_option('child_theme_logo_enabled', $enabled);

		$file_name = $_FILES['logo_image']['name'];
		$temp_file = $_FILES['logo_image']['tmp_name'];
		$file_type = $_FILES['logo_image']['type'];

		if($file_type=="image/gif" || $file_type=="image/jpeg" || $file_type=="image/pjpeg" || $file_type=="image/png"){
			$fd = fopen($temp_file,'rb');
			$file_content=file_get_contents($temp_file);
			fclose($fd);

			$wud = wp_upload_dir();

			if (file_exists($wud[path].'/'.strtolower($file_name))){
				unlink ($wud[path].'/'.strtolower($file_name));
			}

			$upload = wp_upload_bits( $file_name, '', $file_content);
		//	echo $upload['error'];

			$child_theme_image = $wud[url].'/'.strtolower($file_name);
			update_option('child_theme_image', $child_theme_image);
		}

		?>
			<div class="updated"><p>Your new options have been successfully saved.</p></div>
		<?php

	}

	if($enabled) $checked='checked="checked"';

	?>
		<div class="wrap">
			<div id="icon-themes" class="icon32"></div>
			<h2>Child Theme Options</h2>
			<form name="theform" method="post" enctype="multipart/form-data" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']);?>">
				<table class="form-table">
					<tr>
						<td width="200">Use logo image instead of blog title and description:</td>
						<td><input type="checkbox" name="enabled" value="1" <?php echo $checked; ?>/></td>
					</tr>
					<tr>
						<td>Current image:</td>
						<td><img src="<?php echo $child_theme_image; ?>" /></td>
					</tr>
					<tr>
						<td>Logo image to use (gif/jpeg/png):</td>
						<td><input type="file" name="logo_image"><br />(you must have writing permissions for your uploads directory)</td>
					</tr>
				</table>
				<input type="hidden" name="options-submit" value="1" />
				<p class="submit"><input type="submit" name="submit" value="Save Options" /></p>
			</form>
		</div>
	<?php
}

// ---------- "Child Theme Options" menu ENDS HERE

// ---------- Adding the logo image to the header STARTS HERE

if(get_option('child_theme_logo_enabled')){
	function remove_thematic_blogtitle() {
	 remove_action('thematic_header','thematic_blogtitle',3);
	}
	add_action('init','remove_thematic_blogtitle');

	function remove_thematic_blogdescription() {
	 remove_action('thematic_header','thematic_blogdescription',5);
	}
	add_action('init','remove_thematic_blogdescription');

	function thematic_logo_image() {
		echo '<div id="logo-image"><a href="'.get_option('home').'"><img src="'.get_option('child_theme_image').'" /></a></div>';
	}
	add_action('thematic_header','thematic_logo_image',4);
}
// ---------- Adding the logo image to the header ENDS HERE
?>
