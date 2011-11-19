<?php
$typography = $data['body_font'];
$output .= "body {\n     font-face:" . of_font_stack($typography['face']) . "; \n";
            $output .= "     font-size:" . $typography['size'] . "; \n";
            $output .= "     font-style:".$typography['style'] . "; \n";
            $output .= "     color: ".$typography['color'] . "; \n";
            $output .= "}\n";
//echo $output;
?>