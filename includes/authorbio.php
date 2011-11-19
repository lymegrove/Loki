<?php
function get_author_bio ($content=''){
    global $post;

    $post_author_name=get_the_author_meta("display_name");
    $post_author_description=get_the_author_meta("description");
    $html="<div class='clearfix' id='about_author'>\n";
    $html.="<img width='80' height='80' class='avatar' src='http://www.gravatar.com/avatar.php?gravatar_id=".md5(get_the_author_email()). "&default=".urlencode($GLOBALS['defaultgravatar'])."&size=80&r=PG' alt='PG'/>\n";
    $html.="<div class='author_text'>\n";
    $html.="<h4>Author: <span>".$post_author_name."</span></h4>\n";
    $html.= $post_author_description."\n";
    $html.="</div>\n";
    $html.="<div class='clear'></div>\n";
    $content .= $html;

    return $content;
}

add_filter('the_content', 'get_author_bio');
?>