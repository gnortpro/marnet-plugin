<?php
function chen_style(){ // Chèn Style{};

	echo get_post_meta( get_the_ID(), 'style', true );
}

add_action('wp_head','chen_style');
?>