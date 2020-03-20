<?php

namespace WPEM;

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

final class Done {

	/**
	 * Log instance
	 *
	 * @var object
	 */
	private $log;

	/**
	 * Class constructor
	 *
	 * @param Log $log
	 */
	public function __construct( Log $log ) {

		$this->log = $log;

		$this->settings();

		$this->user_meta();

		if ( is_plugin_active( 'contact-widgets/contact-widgets.php' ) ) {

			$this->widget_contact();
			$this->widget_social();

		}

		if ( is_plugin_active( 'godaddy-email-marketing-sign-up-forms/godaddy-email-marketing.php' ) ) {

			$this->gem();

		}

		if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

			$this->woocommerce();

		}

		$this->flush_transients();

		$this->update_language_packs();

		$this->redirect();

	}

	/**
	 * Settings
	 */
	private function settings() {

		if ( empty( $this->log->steps['settings']['fields'] ) ) {

			return;

		}

		foreach ( $this->log->steps['settings']['fields'] as $option => $value ) {

			if ( 0 === strpos( $option, 'wpem_' ) && 'wpem_woocommerce' !== $option ) {

				continue;

			}

			remove_all_filters( "option_{$option}" );

			update_option( $option, $value );

		}

	}

	/**
	 * User meta
	 */
	private function user_meta() {

		// Don't display the Sidekick nag
		add_user_meta( get_current_user_id(), 'sk_ignore_notice', true );

	}

	/**
	 * Use Contact step data in Contact widget
	 */
	private function widget_contact() {

		$contact_info = array_filter( (array) get_option( 'wpem_contact_info', [] ) );

		if ( ! $contact_info || empty( $contact_info['enabled'] ) ) {

			delete_option( 'widget_wpcw_contact' );

			return;

		}

		$widget = (array) get_option( 'widget_wpcw_contact', [] );

		unset( $widget['_multiwidget'] );

		$keys = array_keys( $widget );
		$key  = array_shift( $keys );

		if ( empty( $widget[ $key ] ) ) {

			return;

		}

		foreach ( $widget[ $key ] as $field => $data ) {

			$value = wpem_get_contact_info( $field );

			if ( isset( $widget[ $key ][ $field ]['value'] ) && false !== $value ) {

				$value = str_replace( [ '<br />', '<br/>', '<br>' ], '', $value );

				$widget[ $key ][ $field ]['value'] = $value;

			}

		}

		// Refresh field order
		$widget[ $key ] = $this->refresh_widget_field_order( $widget[ $key ] );

		$widget['_multiwidget'] = 1;

		update_option( 'widget_wpcw_contact', $widget );

	}

	/**
	 * Use Contact step data in Social widget
	 */
	private function widget_social() {

		$social_profiles = array_filter( (array) get_option( 'wpem_social_profiles', [] ) );

		if ( ! $social_profiles ) {

			delete_option( 'widget_wpcw_social' );

			return;

		}

		$widget = (array) get_option( 'widget_wpcw_social', [] );

		unset( $widget['_multiwidget'] );

		if ( ! $widget ) {

			return;

		}

		$keys = array_keys( $widget );
		$key  = array_shift( $keys );

		if ( empty( $widget[ $key ] ) ) {

			return;

		}

		include_once wpem()->base_dir . 'includes/social-networks.php';

		// Remove all default social networks from the widget
		foreach ( $social_networks as $network => $data ) {

			if ( isset( $social_networks[ $network ] ) ) {

				unset( $widget[ $key ][ $network ] );

			}

		}

		$fields = [];

		if ( isset( $widget[ $key ]['title'] ) ) {

			// Add the title field to the new list
			$fields['title'] = $widget[ $key ]['title'];

			// Remove the title from the original widget
			unset( $widget[ $key ]['title'] );

		}

		// Prepend new social networks to the fields list
		foreach ( wpem_get_social_profiles() as $network ) {

			$fields[ $network ] = [
				'value' => wpem_get_social_profile_url( $network ),
				'order' => '',
			];

		}

		// Merge updated fields with the original widget
		$widget[ $key ] = $fields + $widget[ $key ];

		// Refresh field order
		$widget[ $key ] = $this->refresh_widget_field_order( $widget[ $key ] );

		$widget['_multiwidget'] = 1;

		update_option( 'widget_wpcw_social', $widget );

	}

	/**
	 * Refresh field order in Contact and Social widgets
	 *
	 * @param  array $instance
	 *
	 * @return array
	 */
	private function refresh_widget_field_order( $instance ) {

		$i = 0;

		foreach ( $instance as $key => $data ) {

			if ( isset( $data['order'] ) ) {

				$instance[ $key ]['order'] = $i;

			}

			$i++;

		}

		return $instance;

	}

	/**
	 * Call widget function to trigger form fetch
	 */
	private function gem() {

		global $wp_widget_factory;

		if ( ! class_exists( 'GEM_Form_Widget' ) ) {

			\GEM_Official::instance();

		}

		update_option( 'wpem_gem_notice', 1 );

		$wp_widget_factory->register( 'GEM_Form_Widget' );

		$widget = (array) get_option( 'widget_gem-form', [] );

		unset( $widget['_multiwidget'] );

		if ( ! $widget ) {

			return;

		}

		$widget_obj = $wp_widget_factory->widgets[ 'GEM_Form_Widget' ];

		$default_args = [
			'before_widget' => '<div class="widget %s">',
			'after_widget'  => "</div>",
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		];

		foreach ( $widget as $key => $instance ) {

			/**
			 * We don't want to output the widget, we just want to call the render
			 * function that triggers default form setup and replace empty form id
			 */
			ob_start();

			$widget_obj->_set( $key ); // Ref to instance #
			$widget_obj->widget( $default_args, $instance );

			ob_end_clean();

		}

		$wp_widget_factory->unregister( 'GEM_Form_Widget' );

	}

	/**
	 * WooCommerce
	 */
	private function woocommerce() {

		// Force secure checkout when SSL is already present
		if ( is_ssl() ) {

			update_option( 'woocommerce_force_ssl_checkout', 'yes' );

		}

		$woocommerce_options = wpem_get_woocommerce_options();

		$email = wpem_get_contact_info( 'email' );
		$email = empty( $email ) ? wp_get_current_user()->user_email : $email;

		update_option( 'woocommerce_email_from_address', $email );
		update_option( 'woocommerce_stock_email_recipient', $email );

		$calc_taxes = isset( $woocommerce_options['calc_taxes'] ) ? 'yes' : 'no';

		update_option( 'woocommerce_calc_taxes', $calc_taxes );

		if ( 'yes' === $calc_taxes ) {

			$this->woocommerce_import_tax_rates( $woocommerce_options['store_location'] );

		}

		update_option( 'woocommerce_prices_include_tax', $woocommerce_options['tax_type'] );

		update_option( 'spp_activation_notice', [] );

		\WC_Admin_Notices::remove_notice( 'install' );

		$country = explode( ':', $woocommerce_options['store_location'] );

		if ( $country[0] ) {

			$this->woocommerce_locale_settings( $country[0], $woocommerce_options );

		}

		$this->install_woocommerce_payment_gateways( $woocommerce_options['payment_methods'] );

		delete_option( 'wpem_woocommerce' );

	}

	/**
	 * WooCommerce locale settings
	 *
	 * @param string $country
	 */
	private function woocommerce_locale_settings( $country, $woocommerce_options ) {

		update_option( 'woocommerce_default_country',    $woocommerce_options['store_location'] );
		update_option( 'woocommerce_currency',           $woocommerce_options['currency_code'] );
		update_option( 'woocommerce_dimension_unit',     $woocommerce_options['dimension_unit'] );
		update_option( 'woocommerce_weight_unit',        $woocommerce_options['weight_unit'] );

		$locale_info = include( WP_PLUGIN_DIR . '/woocommerce/i18n/locale-info.php' );

		if ( ! isset( $locale_info[ $country ] ) ) {

			return;

		}

		update_option( 'woocommerce_currency_pos',       $locale_info[ $country ]['currency_pos'] );
		update_option( 'woocommerce_price_decimal_sep',  $locale_info[ $country ]['decimal_sep'] );
		update_option( 'woocommerce_price_thousand_sep', $locale_info[ $country ]['thousand_sep'] );

	}

	/**
	 * Import the WooCommerce tax rates based on the customers store location
	 *
	 * @since 2.4.0
	 *
	 * @param  string $store_location The store location
	 *
	 * @return null
	 */
	private function woocommerce_import_tax_rates( $store_location ) {

		global $wpdb;

		$log = new Log;

		$store_locale = new Store_Settings( $log->geodata );
		$tax_rates    = $store_locale::get_woocommerce_tax_rates( $store_locale::$store_data, $store_location );

		if ( empty( $tax_rates ) ) {

			return;

		}

		foreach ( $tax_rates as $key => $location ) {

			$wpdb->insert(
				$wpdb->prefix . 'woocommerce_tax_rates',
				array(
					'tax_rate_country'  => $location['country'],
					'tax_rate_state'    => $location['state'],
					'tax_rate'          => $location['rate'],
					'tax_rate_name'     => $location['country'] . '-' . $location['state'],
					'tax_rate_priority' => 1,
					'tax_rate_compound' => 0,
					'tax_rate_shipping' => 0,
					'tax_rate_order'    => $key,
					'tax_rate_class'    => '',
				)
			);

		}

	}

	/**
	 * Flush the transients cache
	 *
	 * @return int|bool
	 */
	private function flush_transients() {

		global $wpdb;

		return $wpdb->query( "DELETE FROM `{$wpdb->options}` WHERE `option_name` LIKE '%_transient_%';" );

	}

	/**
	 * Update language packs for plugins & themes
	 *
	 * @return array|bool
	 */
	private function update_language_packs() {

		if ( 'en_US' === get_locale() ) {

			return false;

		}

		if ( ! function_exists( 'wp_clean_update_cache' ) ) {

			require_once ABSPATH . 'wp-includes/update.php';

		}

		if ( ! class_exists( '\Language_Pack_Upgrader' ) ) {

			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

		}

		if ( ! class_exists( '\Automatic_Upgrader_Skin' ) ) {

			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader-skins.php';

		}

		wp_clean_update_cache();

		wp_update_themes();

		wp_update_plugins();

		$upgrader = new \Language_Pack_Upgrader( new \Automatic_Upgrader_Skin() );

		return $upgrader->bulk_upgrade();

	}

	/**
	 * Mark wizard as done and redirect
	 */
	private function redirect() {

		$redirect_path = ( 'store' === get_option( 'wpem_site_type' ) ) ? 'edit.php?post_type=product' : '';

		wpem_mark_as_done();

		wp_safe_redirect(
			wpem_get_customizer_url(
				[
					'return' => admin_url( $redirect_path ),
					'wpem'   => 1,
				]
			)
		);

		exit;

	}

	/**
	 * Install the Woocommerce Payment Gateways
	 *
	 * @param  array $payment_gateways Selected payment gateways.
	 */
	private function install_woocommerce_payment_gateways( $payment_gateways ) {

		if ( empty( $payment_gateways ) ) {

			return;

		}

		include 'woo-conditionals.php';

		foreach ( $payment_gateways as $payment_setting ) {

			switch ( $payment_setting ) {

				case 'offline':
					$offline_payment_methods = [
						'woocommerce_cheque_settings',
						'woocommerce_bacs_settings',
						'woocommerce_cod_settings',
					];

					foreach ( $offline_payment_methods as $offline_payment_method ) {

						update_option( $offline_payment_method, [ 'enabled' => 'yes' ] );

					}

					break;

				default:
					$plugin_data = $bundled_plugins[ $payment_setting ];

					update_option( $bundled_plugins[ $payment_setting ]['setting'], [ 'enabled' => 'yes' ] );

					break;

			}

			if ( ! isset( $plugin_data ) ) {

				continue;

			}

			wpem_install_plugin( $plugin_data['plugin-base'] );

			$this->update_wpem_plugins( $plugin_data['plugin-base'] );

		}

	}

	/**
	 * Update the list of WPEM installed plugins
	 *
	 * @param string $plugin_base The plugin base file
	 */
	private function update_wpem_plugins( $plugin_base ) {

		if ( empty( $plugin_base ) ) {

			return false;

		}

		$wpem_plugins = (array) get_option( 'wpem_plugins', [] );

		array_push( $wpem_plugins, $plugin_base );

		return update_option( 'wpem_plugins', array_unique( $wpem_plugins ) );

	}
}
