<?php
$detect_tang_toc = new Mobile_Detect(); // GỌI BIẾN ĐỂ CHECK [ CÁI NÀY NHỜ VÀO FILE Mobile_Detect.php ĐÃ ĐƯỢC include BÊN NGOÀI! ]

if ($detect_tang_toc->isMobile()){ // NẾU TRÌNH DUYỆT MOBILE

	$option = get_option('tang_toc_mobile_php' ); // CHÈN CODE PHP

	if(isset($option)){
		
		try {

			eval(get_option('tang_toc_mobile_php'));

		} catch (Exception $option) {

			delete_option( $option );

		}
	} // END CHÈN CODE PHP
	

	function tang_toc_mobile_css_(){ // CHÈN CODE CSS

		echo "<style>";

			echo get_option('tang_toc_mobile_css');

		echo "</style>";

	}

	add_action('wp_head','tang_toc_mobile_css_'); // END CHÈN CODE CSS

	

	function tang_toc_mobile_js_(){ // CHÈN CODE JS

		echo '<script type="text/javascript">';

			echo get_option('tang_toc_mobile_js');

		echo '</script>';

	}

	add_action('wp_head','tang_toc_mobile_js_'); // END CHÈN CODE JS
	

	function my_tang_toc_mobile_javascript() { // TẮT CODE JS
		wp_deregister_script( get_option('tang_toc_mobile_js1'));
		wp_deregister_script( get_option('tang_toc_mobile_js2'));
		wp_deregister_script( get_option('tang_toc_mobile_js3'));
		wp_deregister_script( get_option('tang_toc_mobile_js4'));
		wp_deregister_script( get_option('tang_toc_mobile_js5'));
		wp_deregister_script( get_option('tang_toc_mobile_js6'));
		wp_deregister_script( get_option('tang_toc_mobile_js7'));
		wp_deregister_script( get_option('tang_toc_mobile_js8'));
		wp_deregister_script( get_option('tang_toc_mobile_js9'));
		wp_deregister_script( get_option('tang_toc_mobile_js10'));
	}
	add_action( 'wp_print_scripts', 'my_tang_toc_mobile_javascript', 1 ); // END TẮT CODE JS
	

	function my_tang_toc_mobile_styles() { // TẮT CODE CSS
		wp_deregister_style( get_option('tang_toc_mobile_css1'));
		wp_deregister_style( get_option('tang_toc_mobile_css2'));
		wp_deregister_style( get_option('tang_toc_mobile_css3'));
		wp_deregister_style( get_option('tang_toc_mobile_css4'));
		wp_deregister_style( get_option('tang_toc_mobile_css5'));
		wp_deregister_style( get_option('tang_toc_mobile_css6'));
		wp_deregister_style( get_option('tang_toc_mobile_css7'));
		wp_deregister_style( get_option('tang_toc_mobile_css8'));
		wp_deregister_style( get_option('tang_toc_mobile_css9'));
		wp_deregister_style( get_option('tang_toc_mobile_css10'));
	}
	add_action( 'wp_print_styles', 'my_tang_toc_mobile_styles', 1 ); // END TẮT CODE CSS
	
}else{	//	NẾU LÀ TRÌNH DUYỆT DESKTOP
	
	$option = get_option('tang_toc_desktop_php' ); // CHÈN CODE PHP

	if(isset($option)){
		try {
			eval(get_option('tang_toc_desktop_php'));
		} catch (Exception $option) {
			delete_option( $option );
		}

	} // END CHÈN CODE PHP
	

	function tang_toc_desktop_css_(){ //	CHÈN CODE CSS

		echo "<style>";

			echo get_option('tang_toc_desktop_css');

		echo "</style>";

	}

	add_action('wp_head','tang_toc_desktop_css_'); // END CHÈN CODE CSS
	

	function tang_toc_desktop_js_(){ // CHÈN CODE JS

		echo '<script type="text/javascript">';

			echo get_option('tang_toc_desktop_js');

		echo '</script>';

	}

	add_action('wp_head','tang_toc_desktop_js_'); // END CHÈN CODE JS
	
	// Disable JS
	function my_tang_toc_desktop_javascript() {
		wp_deregister_script( get_option('tang_toc_desktop_js1'));
		wp_deregister_script( get_option('tang_toc_desktop_js2'));
		wp_deregister_script( get_option('tang_toc_desktop_js3'));
		wp_deregister_script( get_option('tang_toc_desktop_js4'));
		wp_deregister_script( get_option('tang_toc_desktop_js5'));
		wp_deregister_script( get_option('tang_toc_desktop_js6'));
		wp_deregister_script( get_option('tang_toc_desktop_js7'));
		wp_deregister_script( get_option('tang_toc_desktop_js8'));
		wp_deregister_script( get_option('tang_toc_desktop_js9'));
		wp_deregister_script( get_option('tang_toc_desktop_js10'));

	}
	add_action( 'wp_print_scripts', 'my_tang_toc_desktop_javascript', 1 );
	
	// Disable CSS
	function my_tang_toc_desktop_styles() {
		wp_deregister_style( get_option('tang_toc_desktop_css1'));
		wp_deregister_style( get_option('tang_toc_desktop_css2'));
		wp_deregister_style( get_option('tang_toc_desktop_css3'));
		wp_deregister_style( get_option('tang_toc_desktop_css4'));
		wp_deregister_style( get_option('tang_toc_desktop_css5'));
		wp_deregister_style( get_option('tang_toc_desktop_css6'));
		wp_deregister_style( get_option('tang_toc_desktop_css7'));
		wp_deregister_style( get_option('tang_toc_desktop_css8'));
		wp_deregister_style( get_option('tang_toc_desktop_css9'));
		wp_deregister_style( get_option('tang_toc_desktop_css10'));
	}
	add_action( 'wp_print_styles', 'my_tang_toc_desktop_styles', 1 );

} // End Desktop

?>