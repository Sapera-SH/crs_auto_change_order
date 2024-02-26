<?php
/*
Plugin Name: Cloud Retail Systems A/S - Auto change cheque status
Plugin URI: http://sapera.dk
Description:
Author: Cloud Retail Systems A/S - Søren Højby
Version: 1.0
Author URI: http://sapera.dk
*/

add_action( 'woocommerce_thankyou', 'cheque_payment_method_order_status_to_processing', 10, 1 );
function cheque_payment_method_order_status_to_processing( $order_id ) {
    if ( ! $order_id )
        return;

    $order = wc_get_order( $order_id );

    // Updating order status to processing for orders delivered with Cheque payment methods.
    if ( $order->get_payment_method() === 'cheque' ) {
        $order->update_status( 'processing' );
    }
}