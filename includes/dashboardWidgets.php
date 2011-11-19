<?php
/** REMOVE DASHBOARD WIDGETS **/
add_action('admin_init', 'rw_remove_dashboard_widgets');
function rw_remove_dashboard_widgets() {
 remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // right now
 remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // recent comments
 remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // incoming links
 remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // plugins

 remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');  // quick press
 remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal');  // recent drafts
 remove_meta_box('dashboard_primary', 'dashboard', 'normal');   // wordpress blog
 remove_meta_box('dashboard_secondary', 'dashboard', 'normal');   // other wordpress news
 remove_meta_box('tutorial_dashboard', 'dashboard', 'normal'); 
 remove_meta_box('yoast_db_widget', 'dashboard', 'normal');
 remove_meta_box('dashboardb_xavisys', 'dashboard', 'normal');
}
/** END REMOVE DASHBOARD WIDGETS **/

/** INSERT CUSTOM DASHBOARD WIDGETS **/
function tutorial_dashboard() {
?>
<h4>Adding Images</h4>
<p>From the Post or Page Edit Screen look for the Icons to the right of "Upload/Insert."  Click on the first Icon and follow the instructions on screen</p>
<h4>Adding Gallery Images</h4>
<p><a href="#">Adding Gallery Video Tutorial</a>
<h4>Cheat Sheats</h4>
<p><a href="#">Download</a> a Hard Copy of the WordPress Cheat Sheat</p>
<?php }

function tutorial_dashboard_setup() {
wp_add_dashboard_widget( 'tutorial_dashboard', __( 'Tutorial Dashboard Title' ), 'tutorial_dashboard' );
}

add_action('wp_dashboard_setup', 'tutorial_dashboard_setup');

//add contact widget

function contact_dashboard() {
?>
<!-- JQuery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

 <script type="text/javascript">
   // we will add our javascript code here           

$(document).ready(function(){
$("#ajax-contact-form").submit(function(){

// 'this' refers to the current submitted form
var str = $(this).serialize();

   $.ajax({
   type: "POST",
   url: "/wp-content/themes/jsrothwell/contact.php",
   data: str,
   success: function(msg){

$("#note").ajaxComplete(function(event, request, settings){

if(msg == 'OK') // Message Sent? Show the 'Thank You' message and hide the form
{
result = '<div class="notification_ok">Your message has been sent. Thank you!</div>';
$("#fields").hide();
}
else
{
result = msg;
}

$(this).html(result);

});

}

 });

return false;

});

});

 </script>  

<link rel="stylesheet" type="text/css" href="/wp-content/themes/jsrothwell/dashboardContact.css" />

<div align="left" style="width: 350px;">

<fieldset class="info_fieldset">

<div id="note"></div>
<div id="fields">

<form id="ajax-contact-form" action="javascript:alert('success!');">
<label>Name</label><INPUT class="textbox" type="text" name="name" value=""><br />

<label>E-Mail</label><INPUT class="textbox" type="text" name="email" value=""><br />

<label>Subject</label><INPUT class="textbox" type="text" name="subject" value=""><br />

<label>Comments</label><TEXTAREA class="textbox" NAME="message" ROWS="5" COLS="25"></TEXTAREA><br />

<label>&nbsp;</label><INPUT class="button" type="submit" name="submit" value="Send Message">
</form>

</div>

</fieldset>

</div>

 
<?php }

function contact_dashboard_setup() {
wp_add_dashboard_widget( 'contact_dashboard', __( 'Contact The Administrator.' ), 'contact_dashboard' );
}

add_action('wp_dashboard_setup', 'contact_dashboard_setup');


/** END INSERT CUSTOM DASHBOARD WIDGETS **/
?>