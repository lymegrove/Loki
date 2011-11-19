<?php
add_action( '_admin_menu', 'disable_category_menu');

function disable_category_menu () {
global $submenu;
if (is_site_admin()) {
return;
} elseif(!empty($submenu['edit.php'])) {
foreach($submenu['edit.php'] as $key => $sm) {
if(__($sm[0]) == "Categories" || $sm[2] == "categories.php") {
unset($submenu['edit.php'][$key]);
break;
}
}
}
if (!empty($submenu['themes.php'])) {
foreach($submenu['themes.php'] as $key => $sm) {
if(__($sm[0]) == "Themes" || $sm[2] == "themes.php") {
unset($submenu['themes.php'][$key]);
break;
}
}
}
if (!empty($submenu['tools.php'])) {
foreach($submenu['tools.php'] as $key => $sm) {
if(__($sm[0]) == "Tools" || $sm[2] == "tools.php") {
unset($submenu['tools.php'][$key]);
break;
}
}
}
}

function remove_menus () {
global $menu;
$restricted = array(__('Dashboard'), __('Posts'), __('Media'),
__('Links'), __('Pages'), __('Appearance'), __('Tools'),
__('Users'), __('Settings'), __('Comments'), __('Plugins'));
if (is_site_admin()) {
return;
} else {
end ($menu);
while (prev($menu)){
$value = explode(' ',$menu[key($menu)][0]);
if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
  unset($menu[key($menu)]);}
}
}
}
add_action('admin_menu', 'remove_menus');
?>