<?php
function my_multi_col($content){
$columns = explode('<h2>', $content);

$i = 0;

	foreach ($columns as $column){
	if (($i % 2) == 0){
		$return .= '<div class="content_left">' . "\n";
		if ($i > 1){
		$return .= "<h2>";
	} else{
		$return .= '<div class="content_right">' . "\n <h2>";
	}
		$return .= $column;
		$return .= '</p></div>';
		$i++;
	}

	if(isset($columns[1])){
	    $content = wpautop($return);
	}else{
	    $content = wpautop($content);
	}
	echo $content;
}
}
add_filter('the_content', 'my_multi_col');
?>