<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

/**
 * Activate a local theme if API is not available
 */
add_action( 'wp_ajax_wpem_switch_theme', function() {

	$nonce      = filter_input( INPUT_POST, 'nonce' );
	$stylesheet = filter_input( INPUT_POST, 'theme' );
	$theme      = wp_get_theme( $stylesheet );

	if ( false !== wp_verify_nonce( $nonce, 'wpem_ajax_nonce' ) && $theme->exists() ) {

		switch_theme( $stylesheet );

		wpem_mark_as_done();

	}

	wp_die();

} );

/**
 * User switches Woocommerce store location
 */
function wpem_store_update_payment_methods() {

	check_ajax_referer( 'wpem_ajax_nonce', 'location_nonce' );

	$location = filter_input( INPUT_POST, 'location', FILTER_SANITIZE_STRING );

	if ( ! $location ) {

		wp_send_json_error( __( 'No location sent in the request.', 'wp-easy-mode' ) );

	}

	$location = current( explode( ':', $location ) );

	wp_send_json_success(
		[
			'payment_methods'     => wpem_get_woo_geo_data( 'payment_methods', $location ),
			'payment_description' => wpem_woo_payment_methods_description( $location ),
		]
	);

}
add_action( 'wp_ajax_update_payment_methods', 'wpem_store_update_payment_methods' );
