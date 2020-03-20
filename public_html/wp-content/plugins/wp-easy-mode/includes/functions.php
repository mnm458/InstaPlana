<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

/**
 * Return the current step
 *
 * @return object
 */
function wpem_get_current_step() {

	if ( ! \WPEM\wpem()->admin->is_wizard() ) {

		return;

	}

	$step = wpem_get_step_by( 'name', filter_input( INPUT_GET, 'step' ) );

	return ! empty( $step ) ? $step : wpem_get_step_by( 'position', 1 ); // Default to first step

}

/**
 * Return the next step
 *
 * @return object
 */
function wpem_get_next_step() {

	return wpem_get_step_by( 'position', wpem_get_current_step()->position + 1 );

}

/**
 * Get a step by name or actual position
 *
 * @param  string $field
 * @param  mixed  $value
 *
 * @return object
 */
function wpem_get_step_by( $field, $value ) {

	return \WPEM\wpem()->admin->get_step_by( $field, $value );

}

/**
 * Return a step field value from the log
 *
 * @param  string $field
 * @param  string $step (optional)
 * @param  mixed  $default (optional)
 *
 * @return mixed
 */
function wpem_get_step_field( $field, $step = null, $default = false ) {

	$step = ! empty( $step ) ? $step : wpem_get_current_step()->name;
	$log  = new \WPEM\Log;

	return ! empty( $log->steps[ $step ]['fields'][ $field ] ) ? $log->steps[ $step ]['fields'][ $field ] : $default;

}

/**
 * Return the URL for the setup wizard
 *
 * @return string
 */
function wpem_get_wizard_url() {

	$url = add_query_arg(
		[
			'page' => \WPEM\wpem()->page_slug,
		],
		admin_url()
	);

	return $url;

}

/**
 * Return the customizer version of a given URL
 *
 * @param  array $args (optional)
 *
 * @return string
 */
function wpem_get_customizer_url( $args = [] ) {

	$url = admin_url( 'customize.php' );

	if ( ! $args || ! is_array( $args ) ) {

		return $url;

	}

	return add_query_arg( array_map( 'urlencode', $args ), $url );

}

/**
 * Return the site type
 *
 * @param  string $default
 *
 * @return string
 */
function wpem_get_site_type( $default = 'standard' ) {

	return (string) get_option( 'wpem_site_type', $default );

}

/**
 * Return the site industry
 *
 * @param  string $default
 *
 * @return string
 */
function wpem_get_site_industry( $default = '' ) {

	return (string) get_option( 'wpem_site_industry', $default );

}

/**
 * Return site contact information
 *
 * @param  string $key
 * @param  mixed  $default (optional)
 *
 * @return mixed
 */
function wpem_get_contact_info( $key, $default = false ) {

	$array = (array) get_option( 'wpem_contact_info', [] );

	return isset( $array[ $key ] ) ? $array[ $key ] : $default;

}

/**
 * Return a social network URL
 *
 * @param  string $key
 * @param  mixed  $default (optional)
 *
 * @return mixed
 */
function wpem_get_social_profile_url( $key, $default = false ) {

	$array = (array) get_option( 'wpem_social_profiles', [] );

	return isset( $array[ $key ] ) ? $array[ $key ] : $default;

}

/**
 * Return an array of social profile names
 *
 * @return array
 */
function wpem_get_social_profiles() {

	return array_keys( (array) get_option( 'wpem_social_profiles', [] ) );

}

/**
 * Return a woocommerce option
 *
 * @param bool|string $name
 *
 * @return string
 */
function wpem_get_woocommerce_options( $name = '' ) {

	$defaults = \WPEM\Store_Settings::$defaults;

	$options = get_option( 'wpem_woocommerce', $defaults );

	if ( empty( $name ) ) {

		return $options;

	}

	return isset( $options[ $name ] ) ? $options[ $name ] : ( isset( $defaults[ $name ] ) ? $defaults[ $name ] : '' );

}

/**
 * Get the payment method description based on geo location/paypal support
 *
 * @return string The payment method description
 */
function wpem_woo_payment_methods_description( $location ) {

	$payment_methods = wpem_get_woo_geo_data( 'payment_methods', $location );

	switch ( $payment_methods ) {

		case empty( array_diff( [ 'paypal', 'stripe' ], $payment_methods ) ):
			$description = __( 'PayPal and Stripe', 'wp-easy-mode' );
			break;

		case empty( array_diff( [ 'paypal', 'klarna-checkout' ], $payment_methods ) ):
			$description = __( 'PayPal and Klarna Checkout', 'wp-easy-mode' );
			break;

		case empty( array_diff( [ 'stripe', 'klarna-checkout' ], $payment_methods ) ):
			$description = __( 'Stripe and Klarna Checkout', 'wp-easy-mode' );
			break;

		case ( in_array( 'paypal', $payment_methods, true ) ):
			$description = __( 'PayPal', 'wp-easy-mode' );
			break;

		case ( in_array( 'stripe', $payment_methods, true ) ):
			$description = __( 'Stripe', 'wp-easy-mode' );
			break;

	}

	return sprintf(
		/* translators: Supported payment gateways. eg: Paypal and Stripe */
		__( 'Selecting %s will install the functionality to your website. You will still need to setup and connect your payment accounts from the WooCommerce dashboard in WordPress. If you don’t want us to install these plugins to your website, you can select "other payment" options.', 'wp-easy-mode' ),
		esc_html( $description )
	);

}

/**
 * Retreive the payment methods for the customer geolocation
 *
 * @param  string $key      The key to retreive
 * @param  string $location The location to retreive payment methods for
 *
 * @return array Payment methods for geolocation
 */
function wpem_get_woo_geo_data( $key, $location = '' ) {

	$location = ! empty( $location ) ? $location : current( explode( ':', wpem_get_woocommerce_options( 'store_location' ) ) );

	include 'woo-conditionals.php';

	return isset( $country_data[ $location ][ $key ] ) ? $country_data[ $location ][ $key ] : [];

}

/**
 * Return an array of color schemes
 *
 * @param bool $color_scheme
 *
 * @param null $stylesheet
 *
 * @return array
 */
function wpem_get_theme_color_schemes( $color_scheme = false, $stylesheet = null ) {

	$args = [
		'action' => 'get_color_schemes',
	];

	if ( ! is_null( $stylesheet ) ) {

		$args['theme'] = $stylesheet;

	}

	$response = wp_remote_get( \WPEM\Admin::demo_site_url( $args ) );

	if ( 200 !== wp_remote_retrieve_response_code( $response ) || is_wp_error( $response ) ) {

		return false;

	}

	$color_schemes = json_decode( wp_remote_retrieve_body( $response ), true );

	if ( is_null( $color_schemes ) ) {

		return false;

	}

	if ( $color_scheme ) {

		return apply_filters( 'wpem_theme_color_scheme', (array) $color_schemes[ $color_scheme ] );

	}

	ksort( $color_schemes );

	// Keep default at the top of the array
	$color_schemes = array( 'default' => $color_schemes['default'] ) + $color_schemes;

	return apply_filters( 'wpem_theme_color_schemes', (array) $color_schemes );

}

/**
 * Return a Woocommerce file(s)
 *
 * @return array
 *
 */
function wpem_get_store_data() {

	$args = [
		'site_type' => 'store',
		'action'    => 'get_woocommerce_store_data',
	];

	$response = wp_remote_get( \WPEM\Admin::demo_site_url( $args ) );

	if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

		return false;

	}

	$body = wp_remote_retrieve_body( $response );

	return $body;

}

/**
 * Mark the wizard as started
 */
function wpem_mark_as_started() {

	update_option( 'wpem_started', 1 );

	update_option( 'wpem_done', 0 );

	/**
	 * Fires when the wizard has started
	 *
	 * @since 2.0.5
	 */
	do_action( 'wpem_started' );

}

/**
 * Mark the wizard as done
 */
function wpem_mark_as_done() {

	delete_option( 'wpem_last_viewed' );

	update_option( 'wpem_done', 1 );

	/**
	 * Fires when the wizard has completed
	 *
	 * @since 2.0.5
	 */
	do_action( 'wpem_done' );

}

/**
 * Quit the wizard
 *
 * @param string $reason (optional)
 */
function wpem_quit( $reason = null ) {

	update_option( 'wpem_opt_out', 1 );

	wpem_mark_as_done();

	/**
	 * Filter plugins to be deactivated on quit (user opt-out)
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	$plugins = (array) apply_filters( 'wpem_deactivate_plugins_on_quit', [] );

	if ( $plugins && ( ! defined( 'WPEM_DOING_TESTS' ) || ! WPEM_DOING_TESTS ) ) {

		if ( ! function_exists( 'deactivate_plugins' ) ) {

			require_once ABSPATH . 'wp-admin/includes/plugin.php';

		}

		deactivate_plugins( $plugins );

	}

	$log  = new \WPEM\Log;
	$args = [
		'action'      => 'quit',
		'country'     => ! empty( $log->geodata['country_code'] ) ? $log->geodata['country_code'] : null,
		'product'     => class_exists( '\WPaaS\Plugin' ) ? 'wpaas' : 'cpanel',
		'quit_reason' => $reason,
		'domain'      => wp_parse_url( home_url(), PHP_URL_HOST ),
	];

	// Let the server know we quit (fire and forget).
	wp_remote_get(
		\WPEM\Admin::demo_site_url( $args ),
		[
			'blocking' => false,
		]
	);

	/**
	 * Fires when the wizard quits (user opt-out)
	 *
	 * @since 2.0.5
	 */
	do_action( 'wpem_quit' );

	if ( function_exists( 'wp_safe_redirect' ) ) {

		wp_safe_redirect( admin_url() );

		exit;

	}

}

/**
 * Round a float and preserve trailing zeros
 *
 * @param  float $value
 * @param  int   $precision (optional)
 *
 * @return float
 */
function wpem_round( $value, $precision = 3 ) {

	$precision = absint( $precision );

	return sprintf( "%.{$precision}f", round( $value, $precision ) );

}

/**
 * Check if a GEM account already exists
 *
 * @return bool
 */
function wpem_has_gem_account() {

	$settings = (array) get_option( 'gem-settings', [] );

	return ( ! empty( $settings['username'] ) && ! empty( $settings['api-key'] ) );

}

/**
 * Is this a fresh WordPress install?
 *
 * @return bool
 */
function wpem_is_fresh_wp() {

	$log      = new \WPEM\Log;
	$is_fresh = $log->is_fresh_wp;

	if ( ! isset( $is_fresh ) ) {

		$is_fresh = wpem_check_is_fresh_wp();

		$log->add( 'is_fresh_wp', $is_fresh );

	}

	return $is_fresh;

}

/**
 * Check the WordPress database for freshness
 *
 * @return bool
 */
function wpem_check_is_fresh_wp() {

	global $wpdb;

	$posts = (int) $wpdb->get_var( "SELECT COUNT(ID) FROM `{$wpdb->posts}` WHERE post_status != 'auto-draft';" );
	$users = (int) $wpdb->get_var( "SELECT COUNT(ID) FROM `{$wpdb->users}`;" );

	// WordPress 4.9.6 introduced a Privacy Policy page, ID: 3
	$post_id = version_compare( get_bloginfo( 'version' ), '4.9.6', '<' ) ? 2 : 3;

	$is_fresh = ( $posts <= $post_id && 1 === $users );

	/**
	 * Filter whether the WordPress database is fresh
	 *
	 * @since 1.0.3
	 *
	 * @var bool
	 */
	return (bool) apply_filters( 'wpem_check_is_fresh_wp', $is_fresh );

}

/**
 * Has the wizard already been done?
 *
 * @return bool
 */
function wpem_is_done() {

	$status = get_option( 'wpem_done' );

	return ! empty( $status );

}

/**
 * Is WPEM running as a standalone plugin?
 *
 * @return bool
 */
function wpem_is_standalone_plugin() {

	if ( ! function_exists( 'is_plugin_active' ) ) {

		require_once ABSPATH . 'wp-admin/includes/plugin.php';

	}

	return is_plugin_active( \WPEM\wpem()->basename );

}

/**
 * Redirect away from the wizard screen
 *
 * @action init
 */
function wpem_maybe_redirect() {

	if ( \WPEM\wpem()->page_slug !== filter_input( INPUT_GET, 'page' ) ) {

		return;

	}

	wp_safe_redirect( admin_url() );

	exit;

}

/**
 * Deactivate the plugin silently
 */
function wpem_deactivate() {

	if ( ! wpem_is_standalone_plugin() ) {

		return;

	}

	/**
	 * Filter to deactivate when done
	 *
	 * @since 1.0.3
	 *
	 * @var bool
	 */
	if ( ! (bool) apply_filters( 'wpem_deactivate', true ) || defined( 'WPEM_DOING_TESTS' ) && WPEM_DOING_TESTS ) {

		return;

	}

	deactivate_plugins( \WPEM\wpem()->basename, true );

}

/**
 * Self-destruct the plugin
 */
function wpem_self_destruct() {

	if ( ! wpem_is_standalone_plugin() ) {

		return;

	}

	/**
	 * Filter to self-destruct when done
	 *
	 * @since 1.0.3
	 *
	 * @var bool
	 */
	if ( ! (bool) apply_filters( 'wpem_self_destruct', true ) || defined( 'WPEM_DOING_TESTS' ) && WPEM_DOING_TESTS ) {

		return;

	}

	if ( ! class_exists( 'WP_Filesystem' ) ) {

		require_once ABSPATH . 'wp-admin/includes/file.php';

	}

	WP_Filesystem();

	global $wp_filesystem;

	$wp_filesystem->rmdir( \WPEM\wpem()->base_dir, true );

	wpem_deactivate();

}

/**
 * Install a plugin (overwrites existing).
 *
 * This is an atomic operation with install failures limited to one retry per hour.
 *
 * @param string $plugin_base Plugin base file (eg: woocommerce/woocommerce.php)
 * @param bool   $activate    Activate the plugin (defaults to true).
 * @param string $archive_url The plugin archive URL (defaults to wp.org using slug)
 */
function wpem_install_plugin( $plugin_base, $activate = true, $archive_url = '' ) {

	$transient = 'wpaas_system_plugin_install-' . md5( $plugin_base );

	delete_site_transient( $transient );

	if ( ( defined( 'WP_CLI' ) && WP_CLI ) || get_site_transient( $transient ) === $plugin_base ) {

		return;

	}

	set_site_transient( $transient, $plugin_base, HOUR_IN_SECONDS ); // Limit failures to one retry per hour.

	if ( ! function_exists( 'download_url' ) ) {

		require_once ABSPATH . 'wp-includes/pluggable.php'; // download_url() > wp_tempnam() > wp_generate_password()
		require_once ABSPATH . 'wp-admin/includes/file.php'; // download_url()

	}

	$slug        = basename( dirname( $plugin_base ) );
	$archive_url = ( $archive_url ) ? $archive_url : "https://downloads.wordpress.org/plugin/{$slug}.zip";
	$archive     = download_url( $archive_url );

	if ( is_wp_error( $archive ) ) {

		error_log( sprintf( '%s %s', $archive->get_error_code(), $archive->get_error_message() ) );

		@unlink( $archive ); // @codingStandardsIgnoreLine

		return; // Allow retry once the transient expires.

	}

	WP_Filesystem();

	$result = unzip_file( $archive, WP_PLUGIN_DIR );

	@unlink( $archive ); // @codingStandardsIgnoreLine

	if ( is_wp_error( $result ) ) {

		error_log( sprintf( '%s %s', $result->get_error_code(), $result->get_error_message() ) );

		return; // Allow retry once the transient expires.

	}

	if ( $activate ) {

		if ( ! function_exists( 'activate_plugin' ) ) {

			require_once ABSPATH . 'wp-admin/includes/plugin.php';

		}

		activate_plugin( $plugin_base );

	}

	delete_site_transient( $transient );

}
