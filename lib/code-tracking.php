<?php
	function codetracking(){
		echo get_option('all1');
		echo get_option('all2');
		echo get_option('all3');
		$id = get_the_id(); // Lấy ID
		if ( $id == get_option('id1')) {
			echo get_option('giatriid1');
		 }elseif ($id == get_option('id2')) {
		   echo get_option('giatriid2');
		 }elseif ($id == get_option('id3')) {
			echo get_option('giatriid3');
		 }elseif ($id == get_option('id4')) {
			echo get_option('giatriid4');
		 }elseif ($id == get_option('id5')) {
			echo get_option('giatriid5');
		 }elseif ($id == get_option('id6')) {
			echo get_option('giatriid6');
		 }elseif ($id == get_option('id7')) {
			echo get_option('giatriid7');
		 }elseif ($id == get_option('id8')) {
			echo get_option('giatriid8');
		 }elseif ($id == get_option('id9')) {
			echo get_option('giatriid9');
		 }elseif ($id == get_option('id10')) {
			echo get_option('giatriid10');
		 }elseif ($id == get_option('id11')) {
			echo get_option('giatriid11');
		 }elseif ($id == get_option('id12')) {
			echo get_option('giatriid12');
		 }
		 elseif ($id == get_option('id13')) {
			echo get_option('giatriid13');
		 }elseif ($id == get_option('id14')) {
			echo get_option('giatriid14');
		 }elseif ($id == get_option('id15')) {
			echo get_option('giatriid15');
		 }elseif ($id == get_option('id16')) {
			echo get_option('giatriid16');
		 }elseif ($id == get_option('id17')) {
			echo get_option('giatriid17');
		 }elseif ($id == get_option('id18')) {
			echo get_option('giatriid18');
		 }elseif ($id == get_option('id19')) {
			echo get_option('giatriid19');
		 }elseif ($id == get_option('id20')) {
			echo get_option('giatriid20');
		 }elseif ($id == get_option('id21')) {
			echo get_option('giatriid21');
		 }elseif ($id == get_option('id22')) {
			echo get_option('giatriid22');
		 }elseif ($id == get_option('id23')) {
			echo get_option('giatriid23');
		 }
			// Trang bán hàng
				elseif ($id == get_option('idtrangthanhtoan')) { // ID của trang thanh toán.

					$ben = $_GET['key']; // Lấy giá trị ?key=...
					if ($ben=='') { // Khi $bien == rỗng -> không thành công thì:
						echo get_option('giatriidthanhtoanthanhkhongcong');
					}else{ // Ngược lại biến có giá trị thì:
						echo get_option('giatriidthanhtoanthanhcong');
					}
					
				}
		else {
			echo get_option('idconlai');
		}
	 }
	add_action('wp_head','codetracking'); // End wp_head();
	

	function frontendFooter(){
		echo get_option('allh1');
		echo get_option('allh2');
		echo get_option('allh3');

		$id = get_the_id(); // Lấy ID

		if ( $id == get_option('id1')) {
				echo get_option('giatriid1Adwords');
		}
		elseif ($id == get_option('id2')) {
		echo get_option('giatriid22');
		}elseif ($id == get_option('id3')) {
		echo get_option('giatriid33');
		}elseif ($id == get_option('id4')) {
		echo get_option('giatriid44');
		}elseif ($id == get_option('id5')) {
		echo get_option('giatriid55');
		}elseif ($id == get_option('id6')) {
		echo get_option('giatriid66');
		}elseif ($id == get_option('id7')) {
		echo get_option('giatriid77');
		}elseif ($id == get_option('id8')) {
		echo get_option('giatriid88');
		}elseif ($id == get_option('id9')) {
		echo get_option('giatriid99');
		}elseif ($id == get_option('id10')) {
		echo get_option('giatriid1010');
		}elseif ($id == get_option('id11')) {
		echo get_option('giatriid1111');
		}elseif ($id == get_option('id12')) {
		echo get_option('giatriid1212');
		}
		elseif ($id == get_option('id13')) {
		echo get_option('giatriid1313');
		}elseif ($id == get_option('id14')) {
		echo get_option('giatriid1414');
		}elseif ($id == get_option('id15')) {
		echo get_option('giatriid1515');
		}elseif ($id == get_option('id16')) {
		echo get_option('giatriid1616');
		}elseif ($id == get_option('id17')) {
		echo get_option('giatriid1717');
		}elseif ($id == get_option('id18')) {
		echo get_option('giatriid1818');
		}elseif ($id == get_option('id19')) {
		echo get_option('giatriid1919');
		}elseif ($id == get_option('id20')) {
		echo get_option('giatriid2020');
		}elseif ($id == get_option('id21')) {
		echo get_option('giatriid2121');
		}elseif ($id == get_option('id22')) {
		echo get_option('giatriid2222');
		}elseif ($id == get_option('id23')) {
		echo get_option('giatriid2323');
		}
		// Trang bán hàng
				elseif ($id == get_option('idtrangthanhtoan')) { // ID của trang thanh toán.

					$ben = $_GET['key']; // Lấy giá trị ?key=...
					if ($ben=='') { // Khi $bien == rỗng -> không thành công thì:
						echo get_option('giatriidthanhtoanthanhkhongconggg');
					}else{ // Ngược lại biến có giá trị thì:
						echo get_option('giatriidthanhtoanthanhconggg');
					}

				}
		else {
			echo get_option('idconlaigg');
		}
	}
	add_action('wp_footer','frontendFooter');
?>