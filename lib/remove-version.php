<?php
function marnet_remove_script_version( $src ){

	$parts = explode( '?ver', $src );

		return $parts[0];
}
add_filter( 'script_loader_src', 'marnet_remove_script_version', 15, 1 );

add_filter( 'style_loader_src', 'marnet_remove_script_version', 15, 1 );
?>