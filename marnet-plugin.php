<?php
/*
* Plugin Name: MarNET
* Plugin URI:  http://marnet.vn
* Description: MarNET Plugin
* Version:     4.5
* Author:      gnortpro
* Author URI:  http://marnet.vn/
* License:     GPLv2 or later
* 
* Copyright (c) 2016 - 2017, MarNET
*****************************/

if (!defined('ABSPATH')) exit; // BẮT ĐẦU CODE :)
include 'lib/Mobile_Detect.php'; // FILE PHP CHECK MOBILE(*)
require_once dirname( __FILE__ ) . '/lib/setup.php'; // FILE CÀI ĐẶT
require_once dirname( __FILE__ ) . '/lib/code-tracking.php'; // CHÈN CODE TRACKING
require_once dirname( __FILE__ ) . '/lib/woo-controller.php';

// Remove header;
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_resource_hints', 2 );
remove_action('wp_head', 'dns-prefetch' );
remove_action ('wp_head', 'wp_site_icon', 99);

add_filter( 'bloginfo_url', 'pmg_kt_kill_pingback_url', 10, 2 );
function pmg_kt_kill_pingback_url( $output, $show ) {
    if( $show == 'pingback_url' ) {
        $output = '';
    }
    return $output;
}

/*	emoji	*/
remove_action('wp_head', 'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles', 'print_emoji_styles' );
remove_action('admin_print_styles', 'print_emoji_styles' );
remove_action('wp_head','wp_oembed_add_discovery_links', 10 );
remove_action('wp_head','wp_oembed_add_host_js');
remove_action('wp_head', 'rsd_link' );
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('template_redirect', 'rest_output_link_header', 11, 0 );
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// End remove header;

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );	/*	Check active plugin Wp */

if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) { /*	 If Gravity Forms active 	*/
	function css_custom_Gravity_Forms(){
		echo '<style type="text/css" media="screen">div.validation_error{display:none}div.gform_wrapper .field_description_below .gfield_description{padding-top:0}div.gform_wrapper li.gfield.gfield_error.gfield_contains_required div.ginput_container,div.gform_wrapper li.gfield.gfield_error.gfield_contains_required label.gfield_label{margin-top:0}div.gform_wrapper li.gfield.gfield_error,.gform_wrapper li.gfield.gfield_error.gfield_contains_required.gfield_creditcard_warning{padding-top:0;border-bottom:none;border-top:none}</style>';
	}
	add_action('wp_head','css_custom_Gravity_Forms');
}

//	Yoast SEO comments
if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {	/* If Yoast Seo active */
	require_once dirname( __FILE__ ) . '/lib/remove_seo_comment.php'; /* Remove comment of Yoast Seo */
	function bybe_remove_yoast_json($data){ /* Remove js data of Yoast Seo */
		$data = array();
		return $data;
	}
	add_filter('wpseo_json_ld_output', 'bybe_remove_yoast_json', 10, 1);
}
//	End Yoast SEO comments

// Remove link to image of content
	/*function attachment_image_link_remove_filter( $content ) {
		$content = preg_replace( array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}', '{ wp-image-[0-9]*" /></a>}'), array('<img','" />'), $content );
		return $content;
	}
	add_filter( 'the_content', 'attachment_image_link_remove_filter' );*/
// End Remove link to image of content

// Custom setup image to upload
function marnet_upload_anh() {
    update_option( 'image_default_align', 'center' ); /*	Tự động căn giữa	*/
	/*	update_option( 'image_default_link_type', 'none' ); Loại bỏ link	*/
    update_option( 'image_default_size', 'full' ); /*	Kích thước ảnh đầy đủ	*/
}
add_action( 'after_setup_theme', 'marnet_upload_anh' );
add_filter('jpeg_quality', function($arg){return 100;}); /*	Không nén ảnh	*/
// End Custom setup image to upload

// 403 if page 404
if (get_option('404_to_home' )=='co') {
	function redirect_404_to_any_url() {
		if ( is_404() ) :
			wp_redirect( get_option('move_page_404') , 301 );
			exit;
		endif;
	}
	add_action( 'template_redirect', 'redirect_404_to_any_url' );
}
// End 403 if page 404

// Monitoring post
if (get_option('email_admin_if' )=='co') {
	require_once dirname( __FILE__ ) . '/lib/email-to-admin.php';
}
// End Monitoring post

// Show setup plugin
if (get_option('tat_mo_plugin' )=='co') {
	require_once dirname( __FILE__ ) . '/lib/class-tgm-plugin-activation.php'; /*	TGM Plugin Activation	*/
	require_once dirname( __FILE__ ) . '/lib/tgm-plugin-activation.php'; /*	file setup	*/
}
// End Show setup plugin

// On update
if (get_option('tat_mo_updates' )=='') {
	function remove_core_updates(){
		global $wp_version;
		return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
	}
	add_filter('pre_site_transient_update_core','remove_core_updates');
	add_filter('pre_site_transient_update_plugins','remove_core_updates');
	add_filter('pre_site_transient_update_themes','remove_core_updates');
}
// End On update

// ACTIVE THEME | TỐI ƯU HIỂN THỊ MOBILE
$theme = wp_get_theme();
if ('Performag' == $theme->name || 'Performag' == $theme->parent_theme) { /*	Performag	*/
	require_once dirname( __FILE__ ) . '/lib/performag_mobile.php';
}
if ('FocusBlog' == $theme->name || 'FocusBlog' == $theme->parent_theme) { /*	FocusBlog	*/
	require_once dirname( __FILE__ ) . '/lib/focusblog_mobile.php';
}
// End ACTIVE THEME | TỐI ƯU HIỂN THỊ MOBILE

// Template custom
if (get_option('custom_templates' )=='co') {
	add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->term_id}.php") ) return TEMPLATEPATH . "/single-{$cat->term_id}.php"; } return $t;' ));
}
// End template custom

// PHP to function
if (get_option('php_in_function' )=='co') {
	$option = get_option('code_function' );
	if(isset($option)){
		try {
			eval(get_option('code_function'));
		} catch (Exception $option) {
			delete_option( $option );
		}
	}
}
// End  PHP to function

// Show number Tags
if (get_option('hien_thi_tags' )=='co') {
	function tag_widget_limit($args){
		if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
			$args['number'] = get_option('sotags'); /*	Limit number of tags	*/
		}
		return $args;
	}
	add_filter('widget_tag_cloud_args', 'tag_widget_limit');
}
// Show number Tags

//	Create Shortcode
if (get_option('bat_shortcode' )=='co') {
	require_once dirname( __FILE__ ) . '/lib/shortcode.php';	/*	Shortcode	*/
}
// End Create Shortcode

// Remove Menu QL
if (get_option('tat_menu_ql' )=='co') {
	function remove_menus(){
		remove_menu_page( 'index.php' );                  /*	Dashboard	*/
		remove_menu_page( 'plugins.php' );                /*	Plugins	*/
		remove_menu_page( 'users.php' );                  /*	Users	*/
		remove_menu_page( 'tools.php' );                  /*	Tools	*/
		remove_menu_page( 'options-general.php' );        /*	Settings	*/
	}
	add_action( 'admin_menu', 'remove_menus' );
}
// End Remove Menu QL

//  MarNET Like Share
if (get_option('on_off_face' )=='co') {
	require_once dirname( __FILE__ ) . '/lib/like_share.php';
}
// End MarNET Like Share

// 	Custom Css
require_once dirname( __FILE__ ) . '/lib/custom_post.php';
// 	End Custom Css

// Thư viện Jquery đã có sẵn |||
if( is_admin()){
	function marnet_plugin_js_css() {
		wp_register_style('marnet_plugin_js_css', plugins_url('css/style.css',__FILE__ )); /*	Add CSS */
		wp_enqueue_style('marnet_plugin_js_css');
		/*	wp_enqueue_script( 'marnet_plugin_js_css', plugins_url( 'js_thong_bao.php', __FILE__ ), array( 'jquery' ) );	*/
	}
	add_action( 'admin_init','marnet_plugin_js_css');
}
require_once dirname( __FILE__ ) . '/lib/remove-version.php'; /*	Remove script version [ .js?ver= ]	*/
require_once dirname( __FILE__ ) . '/lib/tuy-bien-css.php'; /*	5. Custom Css. [ * ]	*/

//	 Custom Jquery
function remove_head_scripts() { /*	Loại bỏ ở header cho cho footer, chỉ xử dụng file jquery.js " chính "  */
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);
	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("/wp-includes/js/jquery/jquery.js"), false, '1.12.4', true); /*	Xử dụng js mặc định WP	*/
	wp_enqueue_script('jquery');
}
/*	add_action( 'wp_enqueue_scripts', 'remove_head_scripts' ); - Chức năng này đang bị lỗi js khi xử dụng form */

//	End Custom Jquery

//	Notification edit website
if (get_option('tb_sua_chua' )=='co') {
	add_action( 'admin_bar_menu', function( \WP_Admin_Bar $bar ){
	    $bar->add_menu( array(
	        'id'     => 'wpse',
	        'parent' => null,
	        'group'  => null,
	        'title'  => '<span class="ab-icon" style="font-family: inherit; font-size: 18px; color: red; background: none;">&nbsp; Trưởng đang sửa chữa hệ thống!!</span>'.__( '', 'some-textdomain' ),
	        'href'   => 'http://118.70.11.16:8090/pages/viewpage.action?pageId=15731656',
	        'meta'   => array(
	            'target'   => '_self',
	            'title'    => __( 'Trưởng Thông báo!!!', 'some-textdomain' ),
	            'html'     => '
	            	<script type="text/javascript">
	        			jQuery(document).ready(function($){
							alert(" Thông báo: Trưởng đang sửa chữa hệ thống!! ");
	        			});
	            	</script>
	            	<style type="text/css" media="screen">#wp-admin-bar-wpse{position:absolute!important;width:100%!important;z-index:9999999!important;background:darkgrey!important}#wp-admin-bar-wpse a{margin:0 auto!important;width:300px}#wp-admin-bar-edit{z-index:1.0E+20!important}@-webkit-keyframes my{0%{color:#F8CD0A}50%{color:#fff}100%{color:#F8CD0A}}@-moz-keyframes my{0%{color:#F8CD0A}50%{color:#fff}100%{color:#F8CD0A}}@-o-keyframes my{0%{color:#F8CD0A}50%{color:#fff}100%{color:#F8CD0A}}@keyframes my{0%{color:#F8CD0A}50%{color:#fff}100%{color:#F8CD0A}}.ab-icon{background:#3d3d3d;font-size:24px;font-weight:700;-webkit-animation:my 700ms infinite;-moz-animation:my 700ms infinite;-o-animation:my 700ms infinite;animation:my 700ms infinite}li#wp-admin-bar-edit{z-index:999999999 !important;}
						}</style>
	            ',
	            'class'    => 'wpse--item',
	            'rel'      => 'friend',
	            'onclick'  => "alert('Trưởng Thông báo!!!');",
	            'tabindex' => PHP_INT_MAX,
	        ),
	    ) );
	} );
}

//	End Notification edit website

//	Notification

if (get_option('hien_thi_thongbao' )=='co') {

	function custom_toolbar_link($wp_admin_bar) {
		$args = array(
			'id' => 'wpbeginner',
			'title' => '<span class="ab-icon">Chú ý</span>',
		);
		$wp_admin_bar->add_node($args);

		// Add the first child link
		$args = array(
			'id' => 'wpbeginner-guides',
			'title' => 'Nội dung này được Admin gửi:___________________________________________________________',
			'parent' => 'wpbeginner',
			'meta' => array(
				'class' => 'wpbeginner-guides',
				'html' => '<p style="font-size:18px; font-family:arial; float:left;padding: 10px;">'.get_option('thongbao').'</p><style type="text/css" media="screen">@-webkit-keyframes my{0%{color:#F8CD0A}50%{color:#fff}100%{color:#F8CD0A}}@-moz-keyframes my{0%{color:#F8CD0A}50%{color:#fff}100%{color:#F8CD0A}}@-o-keyframes my{0%{color:#F8CD0A}50%{color:#fff}100%{color:#F8CD0A}}@keyframes my{0%{color:#F8CD0A}50%{color:#fff}100%{color:#F8CD0A}}.ab-icon{font-weight:700!important;-webkit-animation:my 700ms infinite;-moz-animation:my 700ms infinite;-o-animation:my 700ms infinite;animation:my 700ms infinite}</style>'
			)
		);
		$wp_admin_bar->add_node($args);
	}
	add_action('admin_bar_menu', 'custom_toolbar_link', 999);
}
// End Notification


// Log out
function myplugin_cookie_expiration( $expiration, $user_id, $remember ) {
    return $remember ? $expiration : 9999; /*giây*/
}
add_filter( 'auth_cookie_expiration', 'myplugin_cookie_expiration', 99, 3 );

// Plugin chọn rel="dofollow"

function overwrite_wplink()

{
    // Disable wplink
    wp_deregister_script('wplink');

    // Register a new script file to be linked
    wp_register_script('wplink', plugins_url('wplink.min.js', __FILE__), array( 'jquery', 'wpdialogs' ), false, 1);

    wp_localize_script('wplink', 'wpLinkL10n', array('title' => __('Insert/edit link'), 'update' => __('Update'), 'save' => __('Add Link'), 'noTitle' => __('(no title)'), 'noMatchesFound' => __('No matches found.') ));
}
add_action('admin_enqueue_scripts', 'overwrite_wplink', 999);

// End plugin chọn rel="dofollow" 

//	Nofollow external links

function marnet_nofollow_a($text) {
	global $post;
		if( !in_category(0) ) { /*	Note category nào có ID=0 :)	*/
			$text = stripslashes(wp_rel_nofollow($text));
		}
		return $text;
}
add_filter('the_content', 'marnet_nofollow_a');


// End Nofollow external links

//

function remove_nofollow($string) {
	$string = str_ireplace('rel="dofollow nofollow"', 'rel="dofollow"', $string); // Loại bỏ tất cả chuỗi rel="dofollow nofollow" thay bằng rel="dofollow"
	return $string;
}
add_filter('the_content', 'remove_nofollow');