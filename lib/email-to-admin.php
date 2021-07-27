<?php
/**
* Send email if post, page new
*/
function marnet_send_mail_admin($post_id){
    $to = get_option( 'admin_email' ); // Email;
    $subject = ''. $_SERVER["SERVER_NAME"].' có bài mới được đăng!';
    $message = "Chi tiết xem tại - ".get_permalink($post_id);
    wp_mail($to, $subject, $message );
}
add_action('publish_post', 'marnet_send_mail_admin');
?>