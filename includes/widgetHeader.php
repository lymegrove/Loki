<?php
// Add Widget area in header
function add_header_aside($content) {
        $content['Header Aside'] = array(
                'args' => array (
                        'name' => 'Header Aside',
                        'id' => 'header-aside',
                        'before_widget' => thematic_before_widget(),
                        'after_widget' => thematic_after_widget(),
                        'before_title' => thematic_before_title(),
                        'after_title' => thematic_after_title(),
                ),
                'action_hook'   => 'thematic_header',
                'function'              => 'thematic_header_aside',
                'priority'              => 0,
        );
        return $content;
}
add_filter('thematic_widgetized_areas', 'add_header_aside');
 
// And this is our new function that displays the widgetized area
function thematic_header_aside() {
        if (is_sidebar_active('header-aside')) {
                echo thematic_before_widget_area('header-aside');
                dynamic_sidebar('header-aside');
                echo thematic_after_widget_area('header-aside');
        }
}
?>