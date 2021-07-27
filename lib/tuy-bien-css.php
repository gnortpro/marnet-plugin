<?php
$tuybiencssa = get_option('tuy-bien-css');

if ($tuybiencssa=="") {
	# code...
}
else
{
function tuybiencss(){

	echo '<style type="text/css" media="screen">';

		echo get_option('tuy-bien-css');

	echo '</style>';

}

add_action('wp_head','tuybiencss'); // CSS SẼ ĐƯỢC CHÈN VÀO WP_HEAD

}

?>