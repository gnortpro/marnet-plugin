
<?php 
add_action('woocommerce_thankyou', 'woo_controller_send_data');

function woo_controller_send_data($order_id)
{
	if (!$order_id && !get_option('woo_controller_key')) return;

        // Allow code execution only once
	if (!get_post_meta($order_id, '_thankyou_action_done', true))
	{

            // Get an instance of the WC_Order object
		$order_data = wc_get_order($order_id)->get_data();
		$send_body = array(

			'order' => array(
				'order_id' => $order_data['id'],
				'order_parent_id' => $order_data['parent_id'],
				'order_status' => $order_data['status'],
				'order_currency' => $order_data['currency'],
				'order_version' => $order_data['version'],
				'order_payment_method' => $order_data['payment_method'],
				'order_payment_method_title' => $order_data['payment_method_title'],
				'order_date_created' => $order_data['date_created']->date('Y-m-d H:i:s') ,
				'order_date_modified' => $order_data['date_created']->date('Y-m-d H:i:s') ,
				'order_discount_total' => $order_data['discount_total'],
				'order_timestamp_created' => $order_data['date_created']->getTimestamp() ,
				'order_timestamp_modified' => $order_data['date_modified']->getTimestamp() ,
				'order_discount_tax' => $order_data['discount_tax'],
				'order_shipping_total' => $order_data['shipping_total'],
				'order_shipping_tax' => $order_data['shipping_tax'],
				'order_total' => $order_data['total'],
				'order_total_tax' => $order_data['total_tax'],
				'order_customer_id' => $order_data['customer_id'],
				'order_billing_first_name' => $order_data['billing']['first_name'],
				'order_billing_last_name' => $order_data['billing']['last_name'],
				'order_billing_company' => $order_data['billing']['company'],
				'order_billing_address_1' => $order_data['billing']['address_1'],
				'order_billing_address_2' => $order_data['billing']['address_2'],
				'order_billing_city' => $order_data['billing']['city'],
				'order_billing_state' => $order_data['billing']['state'],
				'order_billing_postcode' => $order_data['billing']['postcode'],
				'order_billing_country' => $order_data['billing']['country'],
				'order_billing_email' => $order_data['billing']['email'],
				'order_billing_phone' => $order_data['billing']['phone'],
				'order_shipping_first_name' => $order_data['shipping']['first_name'],
				'order_shipping_last_name' => $order_data['shipping']['last_name'],
				'order_shipping_company' => $order_data['shipping']['company'],
				'order_shipping_address_1' => $order_data['shipping']['address_1'],
				'order_shipping_address_2' => $order_data['shipping']['address_2'],
				'order_shipping_city' => $order_data['shipping']['city'],
				'order_shipping_state' => $order_data['shipping']['state'],
				'order_shipping_postcode' => $order_data['shipping']['postcode'],
				'order_shipping_country' => $order_data['shipping']['country'],

			)
		);

		// $url = 'https://enbt1r359fqxjtk.m.pipedream.net';
    		$url = 'https://staging.announceway.com/webhook/woocommerce/orders/create';
		$body = array(
			"order" => serialize($send_body),
		);

		$args = array(
			'method' => 'POST',
			'timeout' => 45,
			'sslverify' => false,
			'headers' => array(
                    // 'Authorization' => 'Bearer {token goes here}',
				'Content-Type' => 'application/json',
				'X-API-KEY' => get_option('woo_controller_key') ,
			) ,
			'body' => json_encode($body) ,
		);

		$request = wp_remote_post($url, $args);

            // if (is_wp_error($request) || wp_remote_retrieve_response_code($request) != 200)
            // {
            //     error_log(print_r($request, true));
            // }
            // $response = wp_remote_retrieve_body($request);

	}
}


?>