<?php
// Bước 1. Lấy Url hiện tại bằng PHP

function curPageURL() {
 	$pageURL = 'https';
 	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
  		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}
// Bước 2. Chèn thư viện JS của Facebook vào { ta sẽ chèn vào footer}

function chen_thu_vien_facebook(){
	echo '<div id="fb-root"></div>
		<script defer>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, "script", "facebook-jssdk"));</script>';

}
add_action('wp_footer', 'chen_thu_vien_facebook');

// Bước 3. Hiển thị một cách tùy biến

// PHẦN 1. CHÈN VÀO SIDEBAR();
		$detect = new Mobile_Detect(); // include 'Mobile_Detect.php'; { Cái này đã tạo ra biến check mobile ở bên ngoài }

		if ($detect->isMobile()){ // Với  Mobile{}
		
			function facebook_share_mobile(){
				echo'
					<div id="mobie_sare">
					
						<div id="share_sidebar" class="fb-share-button" data-href="'.curPageURL().'?utm_source=facebook-share&utm_campaign=call-to-share&utm_medium=footer-share&utm_content='. get_the_title() .'" data-layout="button_count" data-size="small" data-mobile-iframe="false"></div>
					</div>

					<style type="text/css">
						header:before{height:inherit!important}div#mobie_sare{left:0;width:100%;position:fixed;bottom:0;z-index:999999;text-align:center;background-color:#fff;padding:4px;border-radius:1px;display:block}#tong_nut{z-index:5555;background:#F2F2F2;padding:10px;overflow:hidden;border:1px solid #fc4242}#kich_thich{font-size:16px;font-family:monospace;color:#008b8b;}#c_chua{float:right;display:block;margin-top:2px}div.fb-like{margin-right:5px;}div.fb-share-button{margin-right:5px;}
					</style>
					';	
			}
			add_action('wp_footer', 'facebook_share_mobile');

		}else{ // Với desktops

				function facebook_share_sidebar(){
					echo'
						<div id="sidebar_tong">

							<div id="share_sidebar" class="fb-share-button" data-href="'.curPageURL().'?utm_source=facebook-share&utm_campaign=call-to-share&utm_medium=footer-share&utm_content='. get_the_title() .'" data-layout="box_count" data-size="small" data-mobile-iframe="false"></div>
						</div>

						<style type="text/css">
							#c_chua{float:right;display:block;margin-top:2px}#sidebar_tong{z-index:8;top:31%;position:fixed;float:left;margin-left:5px;width:68px!important}#share_sidebar{padding:5px 0}#tong_nut{z-index:5555;padding:10px;border:1px solid;overflow: hidden;}#kich_thich{font-size:16px;font-family:monospace;color:#008b8b;}div#tong_nut #nut_content{width:101px!important}header:before{height:inherit!important}
						</style>
						';	
				}
				add_action('wp_footer', 'facebook_share_sidebar');
		
			}

// PHẦN 2. CHÈN VÀO CONTENT();

	add_filter( 'the_content', 'facebook_share_content' );
	function facebook_share_content($content) {
		$closing_p = '</p>';
		// $ads_after_paragraph=0; // đầu tiên của content
		$ads_after_paragraph2=500; // cuối cùng content
		$ads = '
			<div id="tong_nut">

				<span id="kich_thich">Nếu bạn thấy hay, chia sẻ ngay trên facebook nhé! &rarr;</span>

				<div id="c_chua">

					<div id="nut_content" class="fb-share-button" data-href="'.curPageURL().'?utm_source=facebook-share&utm_campaign=call-to-share&utm_medium=footer-share&utm_content='. get_the_title() .'" data-layout="button_count" data-size="small" data-mobile-iframe="false"></div>
				</div>
			</div>
		';

		$paragraphs = explode( $closing_p, $content );

		if(is_single()){
			//= Hiển thị nội dung đầu =

			// foreach ($paragraphs as $index => $paragraph) {
			// 	if ( trim( $paragraph ) ) {
			// 		$paragraphs[$index] .= $closing_p;
			// 	}
			// 	if ( $index + 1 == $ads_after_paragraph ) {
			// 		$paragraphs[$index] .= $ads;
			// 	}
			// }
			// if($ads_after_paragraph < 1){
			// 	for ($i=$index;$i>=0;$i--){
			// 		$paragraphs[$i+1] = $paragraphs[$i];
			// 	}
			// 	$paragraphs[0] = $ads;
			// }
			// if ( $index + 1 < $ads_after_paragraph) {
			// 	$paragraphs[$ads_after_paragraph] = $ads;
			// }

			//=Hiển thị nội dung cuối =
			foreach ($paragraphs as $index => $paragraph) {
				if ( trim( $paragraph ) ) {
					$paragraphs[$index] .= $closing_p;
				}
				if ( $index + 1 == $ads_after_paragraph2 ) {
					$paragraphs[$index] .= $ads;
				}
			}
			if($ads_after_paragraph2 < 1){
				for ($i=$index;$i>=0;$i--){
					$paragraphs[$i+1] = $paragraphs[$i];
				}
				$paragraphs[0] = $ads;
			}
			if ( $index + 1 < $ads_after_paragraph2) {
					$paragraphs[$ads_after_paragraph2] = $ads;
			}
			//==
		}
		$content = implode( '', $paragraphs );
		return $content;

	} // STOP

?>