<?php
//	XÓA JS
function marnet_plugin_xoa_js() {
	wp_deregister_script( get_option('tap-tin-js1'));
	wp_deregister_script( get_option('tap-tin-js2'));
	wp_deregister_script( get_option('tap-tin-js3'));
	wp_deregister_script( get_option('tap-tin-js4'));
	wp_deregister_script( get_option('tap-tin-js5'));
	wp_deregister_script( get_option('tap-tin-js6'));
	wp_deregister_script( get_option('tap-tin-js7'));
	wp_deregister_script( get_option('tap-tin-js8'));
	wp_deregister_script( get_option('tap-tin-js9'));
	wp_deregister_script( get_option('tap-tin-js10'));
}
add_action( 'wp_print_scripts', 'marnet_plugin_xoa_js', 100 );

//	XÓA CSS
function marnet_plugin_xoa_css() {
	wp_deregister_style( get_option('tap-tin-css1'));
	wp_deregister_style( get_option('tap-tin-css2'));
	wp_deregister_style( get_option('tap-tin-css3'));
	wp_deregister_style( get_option('tap-tin-css4'));
	wp_deregister_style( get_option('tap-tin-css5'));
	wp_deregister_style( get_option('tap-tin-css6'));
	wp_deregister_style( get_option('tap-tin-css7'));
	wp_deregister_style( get_option('tap-tin-css8'));
	wp_deregister_style( get_option('tap-tin-css9'));
	wp_deregister_style( get_option('tap-tin-css10'));
}
add_action( 'wp_print_styles', 'marnet_plugin_xoa_css', 100 );

/*LỌC CAO CẤP*/

if(isset($id)){ //	NẾU TỒN TẠI GIÁ TRỊ $id

	$id = get_the_id(); //	BIẾN %id NHẬN GIÁ TRỊ

	//	XÓA JS LỌC CAO CẤP

	function marnet_plugin_xoa_js_cao_cap() {
	   if ( !$id == get_option('truid1') ) {
			wp_deregister_script( get_option('loai-bo-js1') );
		}elseif ( !$id == get_option('truid2') ) {
			wp_deregister_script( get_option('loai-bo-js2') );
		}elseif ( !$id == get_option('truid3') ) {
			wp_deregister_script( get_option('loai-bo-js3') );
		}elseif ( !$id == get_option('truid4') ) {
			wp_deregister_script( get_option('loai-bo-js4') );
		}elseif ( !$id == get_option('truid5') ) {
			wp_deregister_script( get_option('loai-bo-js5') );
		}
	}
	add_action( 'wp_print_scripts', 'marnet_plugin_xoa_js_cao_cap', 100 );

	// 	XÓA CSS LỌC CAO CẤP
	function marnet_plugin_xoa_css_cao_cap() {
	    if ( !$id == get_option('truidcss1') ) {
				wp_deregister_style( get_option('loai-bo-css1') );
			}elseif ( !$id == get_option('truidcss2') ) {
				wp_deregister_style( get_option('loai-bo-css2') );
			}elseif ( !$id == get_option('truidcss3') ) {
				wp_deregister_style( get_option('loai-bo-css3') );
			}elseif ( !$id == get_option('truidcss4') ) {
				wp_deregister_style( get_option('loai-bo-css4') );
			}elseif ( !$id == get_option('truidcss5') ) {
				wp_deregister_style( get_option('loai-bo-css5') );
			}
	}
	add_action( 'wp_print_styles', 'marnet_plugin_xoa_css_cao_cap', 100 );
}
?>