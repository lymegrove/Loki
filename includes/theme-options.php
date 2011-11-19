<?php



function woo_options(){
// VARIABLES
$themename = "Coffee Break";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/coffee-break/';
$shortname = "woo";



$GLOBALS['template_path'] = get_bloginfo('template_directory');

//Access the WordPress Categories via an Array
$woo_categories = array();  
$woo_categories_obj = get_categories('hide_empty=0');
foreach ($woo_categories_obj as $woo_cat) {
    $woo_categories[$woo_cat->cat_ID] = $woo_cat->cat_name;}
$categories_tmp = array_unshift($woo_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$woo_pages = array();
$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name; }
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");       


//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$all_uploads_path = get_bloginfo('home') . '/wp-content/uploads/';
$all_uploads = get_option('woo_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");

// THIS IS THE DIFFERENT FIELDS
$options = array();   

$options[] = array( "name" => "General Settings",
                    "type" => "heading");
                        
$options[] = array( "name" => "Theme Stylesheet",
					"desc" => "Select your themes alternative color scheme.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "default.css",
					"type" => "select",
					"options" => $alt_stylesheets);

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");    
                                                                                     
$options[] = array( "name" => "Text Title",
					"desc" => "Enable if you want Blog Title and Tagline to be text-based. Setup title/tagline in WP -> Settings -> General.",
					"id" => $shortname."_texttitle",
					"std" => "false",
					"type" => "checkbox");

$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
                                               
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");        

$options[] = array( "name" => "RSS URL",
					"desc" => "Enter your preferred RSS URL. (Feedburner or other)",
					"id" => $shortname."_feedburner_url",
					"std" => "",
					"type" => "text");
                    
$options[] = array( "name" => "Contact Form E-Mail",
					"desc" => "Enter your E-mail address to use on the Contact Form Page Template.",
					"id" => $shortname."_contactform_email",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");

$options[] = array(	"name" => "Exclude pages from menu",
					"desc" => "Enter a comma-separated list of the <a href='http://faq.wordpress.com/2008/05/29/how-to-find-page-id-numbers/'>page ID's</a> that you'd like to exclude from the main top navigation. (ie. 1,2,3,4)",
					"id" => $shortname."_menu_pages",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Featured Slider",
					"type" => "heading");					

$options[] = array(	"name" => "Featured Slider Pages",
					"desc" => "Enter a comma-separated list of the <a href='http://faq.wordpress.com/2008/05/29/how-to-find-page-id-numbers/'>page ID's</a> that you'd like to display in the featured slider. (ie. 1,2,3,4)",
					"id" => $shortname."_feat_pages",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Exclude From Navigation",
					"desc" => "Check this box if you wish to exclude the slider pages from the main navigation.",
					"id" => $shortname."_ex_feat_pages",
					"std" => "true",
					"type" => "checkbox");	
                    
$options[] = array(    "name" => "Animation Speed",
                    "desc" => "The time in <b>seconds</b> the animation between frames will take.",
                    "id" => $shortname."_slider_speed",
                    "std" => 0.6,
                    "type" => "text");

$options[] = array(    "name" => "Auto Start",
                    "desc" => "Set the slider to start sliding automatically.",
                    "id" => $shortname."_slider_auto",
                    "std" => "false",
                    "type" => "checkbox");   
                    
$options[] = array(    "name" => "Auto Slide Interval",
                    "desc" => "The time in <b>seconds</b> each slide pauses for, before sliding to the next.",
                    "id" => $shortname."_slider_interval",
                    "std" => 4.0,
                    "type" => "text"); 

$options[] = array(	"name" => "Front Page",
					"type" => "heading");					

$options[] = array(	"name" => "Main Content Area",
					"desc" => "Enter a comma-separated list of the <a href='http://faq.wordpress.com/2008/05/29/how-to-find-page-id-numbers/'>page ID's</a> that you'd like to display on the front page content area. (ie. 1,2,3,4)",
					"id" => $shortname."_main_pages",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Exclude From Navigation",
					"desc" => "Check this box if you wish to exclude the main content pages from the main navigation.",
					"id" => $shortname."_ex_main_pages",
					"std" => "true",
					"type" => "checkbox");	

$options[] = array(	"name" => "Footer",
					"type" => "heading");					

$options[] = array(	"name" => "Left Footer Title",
					"desc" => "Enter a title that you would like to display in your left footer",
					"id" => $shortname."_footer_left_title",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Left Footer",
					"desc" => "Enter text that you would like to display in your left footer. <br/>Use &lt;br /&gt; to add linespace.",
					"id" => $shortname."_footer_left",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Right Footer Title",
					"desc" => "Enter a title that you would like to display in your left footer.",
					"id" => $shortname."_footer_right_title",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Right Footer",
					"desc" => "Enter text that you would like to display in your right footer. <br/>Use &lt;br /&gt; to add linespace.",
					"id" => $shortname."_footer_right",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Credits Footer",
					"desc" => "Enter text that you would like to display as credits in the footer after your sitename.",
					"id" => $shortname."_footer_credits",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Blog Settings",
					"type" => "heading");		

$options[] = array(	"name" => "Add Blog Link to Main Navigation?",
					"desc" => "If checked, this option will add a blog link to your main navigation next to the Home link.",
					"id" => $shortname."_addblog",
					"std" => "false",
					"type" => "checkbox");		

$options[] = array( "name" => "Blog Permalink",
					"desc" => "Please enter the permalink to your blog parent category (i.e. /category/blog/). If you are not using <a href='http://codex.wordpress.org/Using_Permalinks'>Pretty Permalinks</a> then you can use (/?cat=X) where X is your blog category ID.",
					"id" => $shortname."_blogcat",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Add blog categories as a drop-down to top navigation link?",
					"desc" => "If checked, this option will add a drop-down menu - with all your blog categories - to the blog link in the top navigation.",
					"id" => $shortname."_catmenu",
					"std" => "false",
					"type" => "checkbox");								

$options[] = array( "name" => "Blog Category ID",
					"desc" => "Please enter the ID of your main blog category. Only the sub-categories of this category will be displayed in the category drop-down.",
					"id" => $shortname."_blog_cat_id",
					"std" => "",
					"type" => "text");							

$options[] = array(	"name" => "Show full post?",
					"desc" => "Check this to display the full post eg. use the_content() instead of the_excerpt().",
					"id" => $shortname."_the_content",
					"std" => "true",
					"type" => "checkbox");	
                                                                                                 
$options[] = array( "name" => "Ad - Sidebar Widget (300x250px)",
					"type" => "heading");

$options[] = array( "name" => "Adsense code",
					"desc" => "Enter your adsense code (or other ad network code) here.",
					"id" => $shortname."_ad_300_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_300_image",
					"std" => "http://www.woothemes.com/ads/300x250b.jpg",
					"type" => "upload");

$options[] = array( "name" => "Destination URL",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_300_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");    

update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname);
update_option('woo_manual',$manualurl);

                                     
// Woo Metabox Options
                    

$woo_metaboxes = array(

        "image" => array (
            "name" => "image",
            "label" => "Image",
            "type" => "upload",
            "desc" => "Upload file here..."
        )
    );
    
update_option('woo_custom_template',$woo_metaboxes);      

/*
function woo_update_options(){
        $options = get_option('woo_template',$options);  
        foreach ($options as $option){
            update_option($option['id'],$option['std']);
        }   
}

function woo_add_options(){
        $options = get_option('woo_template',$options);  
        foreach ($options as $option){
            update_option($option['id'],$option['std']);
        }   
}


//add_action('switch_theme', 'woo_update_options'); 
if(get_option('template') == 'wooframework'){       
    woo_add_options();
} // end function 
*/


}

add_action('init','woo_options');  

?>