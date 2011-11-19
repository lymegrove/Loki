<?php

// =============================== Widget Functions ======================================

// Input Option: Listing Link Categories
function DisplayCats($name,$select)
{
	$linkcats = array();
	$linkcats = get_categories('type=post');
	
	echo '<p><label for="' . $name .  '_category">Link Category:
					<select name="' . $name .  '_category" class="widefat" style="width: 94% !important;">';
	
	foreach ( $linkcats as $singlecat ) {
		
		if ( $select == $singlecat->cat_name ) { echo '<option value="' . $singlecat->cat_name . '" selected="selected">' . $singlecat->cat_name . '</option>'; }
			else { echo '<option value="' . $singlecat->cat_name . '">' . $singlecat->cat_name . '</option>'; }
		
	}
	
	echo '</select></label></p>';

}

/*---------------------------------------------------------------------------------*/
/* News Widget */
/*---------------------------------------------------------------------------------*/


class Woo_NewsWidget extends WP_Widget {

	function Woo_NewsWidget() {
		$widget_ops = array('description' => 'This widget shows a title loop from a certain category.' );
		parent::WP_Widget(false, __('Woo - Latest News', 'woothemes'),$widget_ops);      
	}

	function widget($args, $instance) { 
		extract( $args ); 
		$title = $instance['title'];
		$number = $instance['number'];
		$cat_id = $instance['cat_id'];
		

        echo $before_widget; ?>
        <?php

			echo $before_title .$title. $after_title;
		
		?>
			
         <ul>
				<?php $my_query = new WP_Query('cat=' . $cat_id . '&posts_per_page=' . $number); ?>

                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    
                    <li><strong><a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></strong><span class="meta"><?php echo the_time('d F Y'); ?></span></li>

                <?php endwhile; ?>

		</ul>
            
		<?php
		echo $after_widget;

	}

	function update($new_instance, $old_instance) {                
		return $new_instance;
	}

	function form($instance) {        
		$title = esc_attr($instance['title']);
		$number = esc_attr($instance['number']);
		$cat_id = esc_attr($instance['cat_id']);

		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','woothemes'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
       <p>
	   	   <label for="<?php echo $this->get_field_id('cat_id'); ?>"><?php _e('Category:','woothemes'); ?></label>
	       <?php $cats = get_categories(); ?>
	       <select name="<?php echo $this->get_field_name('cat_id'); ?>" class="widefat" id="<?php echo $this->get_field_id('cat_id'); ?>">
           <option value="">Disabled</option>
			<?php
			
           	foreach ($cats as $cat){
           	?><option value="<?php echo $cat->cat_ID; ?>" <?php if($cat_id == $cat->cat_ID){ echo "selected='selected'";} ?>><?php echo $cat->cat_name . ' (' . $cat->category_count . ')'; ?></option><?php
           	}
           ?>
           </select>
         </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('No. of Posts:','woothemes'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $number; ?>" class="widefat" id="<?php echo $this->get_field_id('number'); ?>" />
        </p>

        <?php
	}
} 

register_widget('Woo_NewsWidget');

/*---------------------------------------------------------------------------------*/
/* Twitter widget */
/*---------------------------------------------------------------------------------*/

class Woo_Twitter extends WP_Widget {

   function Woo_Twitter() {
	   $widget_ops = array('description' => 'Add your Twitter feed to your sidebar with this widget.' );
       parent::WP_Widget(false, __('Woo - Twitter', 'woothemes'),$widget_ops);      
   }
   
   function widget($args, $instance) {  
    extract( $args );
   	$title = $instance['title'];
    $limit = $instance['limit']; if (empty($limit)) $limit = 5;
	$username = $instance['username'];
	$unique_id = $args['widget_id'];
	?>
		<?php echo $before_widget; ?>
        <?php if ($title) echo $before_title . $title . $after_title; ?>
        <ul id="twitter_update_list_<?php echo $unique_id; ?>"><li></li></ul>	
        <?php echo woo_twitter_script($unique_id,$username,$limit); //Javascript output function ?>
        
        <p class="follow"><a href="http://www.twitter.com/<?php echo $username; ?>"><?php _e('Follow us on Twitter',woothemes); ?></a></p>
	 
        <?php echo $after_widget; ?>
        
   		
	<?php
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {        
   
       $title = esc_attr($instance['title']);
       $limit = esc_attr($instance['limit']);
	   $username = esc_attr($instance['username']);
       ?>
       <p>
	   	   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','woothemes'); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
       </p>
       <p>
	   	   <label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username:','woothemes'); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('username'); ?>"  value="<?php echo $username; ?>" class="widefat" id="<?php echo $this->get_field_id('username'); ?>" />
       </p>
       <p>
	   	   <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Limit:','woothemes'); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('limit'); ?>"  value="<?php echo $limit; ?>" class="" size="3" id="<?php echo $this->get_field_id('limit'); ?>" />

       </p>
      <?php
   }
   
} 
register_widget('Woo_Twitter');

/*---------------------------------------------------------------------------------*/
/* Flickr widget */
/*---------------------------------------------------------------------------------*/

class Woo_flickr extends WP_Widget {

	function Woo_flickr() {
		$widget_ops = array('description' => 'This Flickr widget populates photos from a Flickr ID.' );

		parent::WP_Widget(false, __('Woo - Flickr', 'woothemes'),$widget_ops);      
	}

	function widget($args, $instance) {  
		extract( $args );
		$id = $instance['id'];
		$number = $instance['number'];
		$type = $instance['type'];
		$sorting = $instance['sorting'];
		
		echo $before_widget;
		echo $before_title; ?>
		<?php _e('Photos on <span>flick<span>r</span></span>','woothemes'); ?>
        <?php echo $after_title; ?>
            
        <div class="wrap">
            <div class="fix"></div>
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=<?php echo $sorting; ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $type; ?>&amp;<?php echo $type; ?>=<?php echo $id; ?>"></script>        
            <div class="fix"></div>
        </div>

	   <?php			
	   echo $after_widget;
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {        
		$id = esc_attr($instance['id']);
		$number = esc_attr($instance['number']);
		$type = esc_attr($instance['type']);
		$sorting = esc_attr($instance['sorting']);
		?>
        <p>
            <label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):','woothemes'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('id'); ?>" value="<?php echo $id; ?>" class="widefat" id="<?php echo $this->get_field_id('id'); ?>" />
        </p>
       	<p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number:','woothemes'); ?></label>
            <select name="<?php echo $this->get_field_name('number'); ?>" class="widefat" id="<?php echo $this->get_field_id('number'); ?>">
                <?php for ( $i = 1; $i < 11; $i += 1) { ?>
                <option value="<?php echo $i; ?>" <?php if($number == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Type:','woothemes'); ?></label>
            <select name="<?php echo $this->get_field_name('type'); ?>" class="widefat" id="<?php echo $this->get_field_id('type'); ?>">
                <option value="user" <?php if($type == "user"){ echo "selected='selected'";} ?>><?php _e('User', 'woothemes'); ?></option>
                <option value="group" <?php if($type == "group"){ echo "selected='selected'";} ?>><?php _e('Group', 'woothemes'); ?></option>            
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('sorting'); ?>"><?php _e('Sorting:','woothemes'); ?></label>
            <select name="<?php echo $this->get_field_name('sorting'); ?>" class="widefat" id="<?php echo $this->get_field_id('sorting'); ?>">
                <option value="latest" <?php if($sorting == "latest"){ echo "selected='selected'";} ?>><?php _e('Latest', 'woothemes'); ?></option>
                <option value="random" <?php if($sorting == "random"){ echo "selected='selected'";} ?>><?php _e('Random', 'woothemes'); ?></option>            
            </select>
        </p>
		<?php
	}
} 

register_widget('Woo_flickr');


// =============================== Ad 200x200 widget ======================================
class Woo_ad300Widget extends WP_Widget {

	function Woo_ad300Widget() {
		$widget_ops = array('description' => 'Add the adspace widget to your sidebar.' );

		parent::WP_Widget(false, __('Woo - Advert 300px', 'woothemes'),$widget_ops);      
	}

	function widget($args, $instance) {  
		extract( $args );
		?>
		<div id="advert_300x250" class="wrap widget">

		<?php if (get_option('woo_ad_300_adsense') <> "") { echo stripslashes(get_option('woo_ad_300_adsense')); ?>
        
        <?php } else { ?>
        
            <a href="<?php echo get_option('woo_ad_300_url'); ?>"><img src="<?php echo get_option('woo_ad_300_image'); ?>" alt="advert" /></a>
            
        <?php } ?>	

	</div>
    <?php
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {    
   ?>
   	
    This widget's settings are in the theme's options panel.
   	
   <?php    
	}
} 

register_widget('Woo_ad300Widget');

/*---------------------------------------------------------------------------------*/
/* Search widget */
/*---------------------------------------------------------------------------------*/

class Woo_Search extends WP_Widget {

   function Woo_Search() {
	   $widget_ops = array('description' => 'This is a WooThemes standardized search widget.' );
       parent::WP_Widget(false, __('Woo - Search', 'woothemes'),$widget_ops);      
   }

   function widget($args, $instance) {  
    extract( $args );
   	$title = $instance['title'];
	?>
		<?php echo $before_widget; ?>
        <?php if ($title) { echo $before_title . $title . $after_title; } ?>
        <?php include(TEMPLATEPATH . '/search-form.php'); ?>
		<?php echo $after_widget; ?>   
   <?php
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {        
   
       $title = esc_attr($instance['title']);
       ?>
       <p>
	   	   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','woothemes'); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
       </p>
      <?php
   }
} 

register_widget('Woo_Search');

/*---------------------------------------------------------------------------------*/
/* CampaignMonitor Widget */
/*---------------------------------------------------------------------------------*/

class woo_CampaignMonitorWidget extends WP_Widget {
	function woo_CampaignMonitorWidget() {
		$widget_ops = array('classname' => 'widget_campaign_monitor', 'description' => 'Add a Campaign Monitor subscription form' );
		$this->WP_Widget('campaign_monitor', 'Woo - Campaign Monitor', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$title = empty($instance['title']) ? 'Subscribe Now' : apply_filters('widget_title', $instance['title']);
		$action = empty($instance['action']) ? '#' : apply_filters('widget_action', $instance['action']);
		$id = empty($instance['id']) ? '' : apply_filters('widget_id', $instance['id']);
		
		echo $before_title . $title . $after_title;
		echo '<form name="campaignmonitorform" id="campaignmonitorform" action="'.$action.'" method="post">';
		echo '<input type="text" name="cm-'.$id.'" id="'.$id.'" class="field" value="Enter your e-mail address" onfocus="if (this.value == \'Enter your e-mail address\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'Enter your e-mail address\';}" />';
		echo '<input id="newsletter-submit" class="button" type="submit" name="submit" value="Submit" />';
		echo '</form>';
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['action'] = $new_instance['action'];
		$instance['id'] = strip_tags($new_instance['id']);
		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'action' => '', 'id' => '' ) );
		$title = strip_tags($instance['title']);
		$action = $instance['action'];
		$id = strip_tags($instance['id']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('action'); ?>">Form Action: <input class="widefat" id="<?php echo $this->get_field_id('action'); ?>" name="<?php echo $this->get_field_name('action'); ?>" type="text" value="<?php echo attribute_escape($action); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('id'); ?>">Campaign Monitor ID: <input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo attribute_escape($id); ?>" /></label></p>
<?php
	}
}
register_widget('woo_CampaignMonitorWidget');


/*---------------------------------------------------------------------------------*/
/* Feedburner */
/*---------------------------------------------------------------------------------*/


class Woo_Feedburner extends WP_Widget {

	function Woo_Feedburner() {
		$widget_ops = array('description' => 'This is a blank widget.' );
		parent::WP_Widget(false, __('Woo - Feedburner', 'woothemes'),$widget_ops);      
	}

	function widget($args, $instance) { 
		extract( $args ); 
		$title = $instance['title'];
		$id = $instance['id'];
		$google = $instance['google'];
		

        echo $before_widget; ?>
        <?php

			echo $before_title .$title. $after_title;
		
		?>
			
        <form action="<?php if ($google) { ?>http://feedburner.google.com/fb/a/mailverify<?php } else { ?>http://www.feedburner.com/fb/a/emailverify<?php } ?>" method="post" target="popupwindow" onsubmit="window.open('<?php if ($google) { ?>http://feedburner.google.com/fb/a/mailverify?uri=<?php } else { ?>http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php } ?><?php echo $id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
        
            <input class="field" type="text" name="email" value="<?php _e('Enter your e-mail address','woothemes'); ?>" onfocus="if (this.value == '<?php _e('Enter your e-mail address','woothemes'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Enter your e-mail address','woothemes'); ?>';}" />
            <input type="hidden" value="<?php echo $id; ?>" name="uri"/>
            <input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>
            <input type="hidden" name="loc" value="en_US"/>
            
            <input class="button" type="submit" name="submit" value="submit" />
            
    	</form>
            
		<?php
		echo $after_widget;

	}

	function update($new_instance, $old_instance) {                
		return $new_instance;
	}

	function form($instance) {   
	     
		$title = esc_attr($instance['title']);
		$id = esc_attr($instance['id']);
		$google = esc_attr($instance['google']);

		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','woothemes'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Feedburner ID:','woothemes'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('id'); ?>" value="<?php echo $id; ?>" class="widefat" id="<?php echo $this->get_field_id('id'); ?>" />
        </p>
       <p>
	   	   <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Use Feedburner Google URL?','woothemes'); ?></label>
	       <input value="1" <?php if($google) echo "checked" ; ?> type="checkbox" name="<?php echo $this->get_field_name('google'); ?>" value="<?php echo $google; ?>" class="" id="<?php echo $this->get_field_id('google'); ?>" />

          
       </p>

        <?php
	}
} 

register_widget('Woo_Feedburner');



/* Deregister Default Widgets */


function woo_deregister_widgets(){
    unregister_widget('WP_Widget_Search');         
}
add_action('widgets_init', 'woo_deregister_widgets');  


?>