<?php
function post_word_count() {
    $count = 0;
    $posts = get_posts( array(
        'numberposts' => -1,
        'post_type' => array( 'post', 'page' )
    ));
    foreach( $posts as $post ) {
        $count += str_word_count( strip_tags( get_post_field( 'post_content', $post->ID )));
    }
    $num =  number_format_i18n( $count );
    // This block will add your word count to the stats portion of the Right Now box
    $text = _n( 'Word', 'Words', $num );
    echo "<tr><td class='first b'>{$num}</td><td class='t'>{$text}</td></tr>";
    // This line will add your word count to the bottom of the Right Now box.
    echo '<p>This blog contains a total of <strong>' . $num . '</strong> published words!</p>';
}

// add to Content Stats table
add_action( 'right_now_content_table_end', 'post_word_count');
// add to bottom of Activity Box
add_action('activity_box_end', 'post_word_count');
?>