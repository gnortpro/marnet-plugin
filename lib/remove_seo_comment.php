<?php
// Remove Yoast SEO
function rysc_active( $plugin ) {
	$network_active = false;
	if ( is_multisite() ) {
		$plugins = get_site_option( 'active_sitewide_plugins' );
		if ( isset( $plugins[$plugin] ) ) {
			$network_active = true;
		}
	}
	return in_array( $plugin, get_option( 'active_plugins' ) ) || $network_active;
}

if ( rysc_active( 'wordpress-seo/wp-seo.php' ) || rysc_active( 'wordpress-seo-premium/wp-seo-premium.php' ) ) {
	add_action('get_header',function (){
		ob_start(function ($o) {
			return preg_replace('/\n?<.*?yoast.*?>/mi','',$o);
		});
	});
	add_action('wp_head',function (){
		ob_end_flush();
	}, 999);
} else {
	add_action( 'admin_notices', function() {
		echo '<div class="notice notice-error is-dismissible"><p>Cannot activate <strong>Remove Yoast SEO comments</strong>: Please activate <a href="http://wordpress.org/plugins/wordpress-seo/" target="_blank">Yoast SEO</a> or Yoast SEO Premium plugin first before activating this plugin.</p></div>';
	});
	add_action( 'admin_init', function() {
		deactivate_plugins( plugin_basename( RYSC_FILE ) );
	});
}
// XÓA KHOẢNG TRỐNG TRẮNG ( CÓ THỂ DÙNG ĐỂ XÓA NHIỀU CÁI :))
add_action('get_header', 'start_ob');
add_action('wp_head', 'end_ob', 999);

function start_ob() {
	ob_start('remove_yoast');
}
function end_ob() {
	ob_end_flush();
}

function remove_yoast($output) {

	if (defined('WPSEO_VERSION')) {

		$targets = array(
			'<!-- This site is optimized with the Yoast WordPress SEO plugin v'.WPSEO_VERSION.' - https://yoast.com/wordpress/plugins/seo/ -->',
			'<!-- / Yoast WordPress SEO plugin. -->',
			'<!-- This site uses the Google Analytics by Yoast plugin v'.GAWP_VERSION.' - https://yoast.com/wordpress/plugins/google-analytics/ -->',
			'<!-- / Google Analytics by Yoast -->'
		);
		$output = str_ireplace($targets, '', $output);
		$output = trim($output); 
		$output = preg_replace('/^[ \t]*[\r\n]+/m', '', $output);
	}
	return $output;
}
?>