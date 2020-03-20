<?php

namespace WPEM;

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

final class Store_Settings {

	/**
	 * Store data
	 *
	 * @var object
	 */
	public static $store_data;

	/**
	 * Deafult WooCommerce options
	 *
	 * @var array
	 */
	public static $defaults;

	public function __construct( $geodata ) {

		if ( false === ( $wpem_store_data = get_transient( 'wpem_store_data' ) ) ) {

			$wpem_store_data = json_decode( wpem_get_store_data(), true );

			set_transient( 'wpem_store_data', $wpem_store_data );

		}

		if ( empty( $wpem_store_data ) ) {

			return;

		}

		self::$store_data = new \StdClass;

		foreach ( $wpem_store_data as $key => $value ) {

			self::$store_data->$key = $value;

		}

		self::$defaults = $this->setup_woocommerce_defaults( $geodata );

		add_filter( 'wpem_checkbox_label_class', [ $this, 'filter_payment_methods_checkbox_classes' ], 10, 3 );

	}

	/**
	 * Render the WooCommerce store option sections
	 *
	 * @return array
	 */
	public function wpem_ecommerce_fields() {

		if ( empty( self::$store_data ) ) {

			return;

		}

		$visible_required    = ( 'store' === wpem_get_site_type() );
		$woocommerce_options = wpem_get_woocommerce_options();

		$fields = [
			'name'     => 'wpem-ecommerce-option-group',
			'type'     => 'group',
			'visible'  => $visible_required,
			'sections' => [
				[
					'name'        => 'wpem_woocommerce[section_title]',
					'type'        => 'html',
					'content'     => wp_kses_post( '<h1>' . __( 'Store Settings', 'wp-easy-mode' ) . '</h1><p class="lead-text align-center">' . __( 'Please tell us more about your online store.', 'wp-easy-mode' ) . '</p>' ),
					'skip_option' => true,
				],
				[
					'name'        => 'wpem_woocommerce[store_location]',
					'label'       => __( 'Store Location', 'wp-easy-mode' ),
					'type'        => 'jq_select',
					'choices'     => [ '' => '' ] + self::$store_data->locations,
					'description' => __( 'Where is your store based?', 'wp-easy-mode' ),
					'value'       => $woocommerce_options['store_location'],
					'default'     => self::$defaults['store_location'],
					'required'    => $visible_required,
					'atts'        => [
						'data-select2-opts' => wp_json_encode(
							[
								'placeholder' => __( '- Select Store Location -', 'wp-easy-mode' ),
							]
						),
					],
				],
				[
					'name'        => 'wpem_woocommerce[currency_code]',
					'label'       => __( 'Store Currency', 'wp-easy-mode' ),
					'type'        => 'jq_select',
					'choices'     => [ '' => '' ] + self::$store_data->currencies,
					'description' => __( 'Which currency will your store use? (If your currency is not listed you can add it later.)', 'wp-easy-mode' ),
					'value'       => $woocommerce_options['currency_code'],
					'default'     => self::$defaults['currency_code'],
					'required'    => $visible_required,
					'atts'        => [
						'data-select2-opts' => wp_json_encode(
							[
								'placeholder' => __( '- Select Store Currency -', 'wp-easy-mode' ),
							]
						),
					],
				],
				[
					'name'        => 'wpem_woocommerce[calc_shipping]',
					'label'       => __( 'Shipping and Taxes', 'wp-easy-mode' ),
					'type'        => 'checkbox',
					'choices'     => [
						'true' => __( 'I will ship physical goods to customers.', 'wp-easy-mode' ),
					],
					'value'       => $woocommerce_options['calc_shipping'],
				],
				[
					'name'        => 'wpem_woocommerce[weight_unit]',
					'label'       => __( 'Product Weight Units', 'wp-easy-mode' ),
					'type'        => 'select',
					'choices'     => [
						'kg'  => __( 'kg', 'wp-easy-mode' ),
						'g'   => __( 'g', 'wp-easy-mode' ),
						'lbs' => __( 'lbs', 'wp-easy-mode' ),
						'oz'  => __( 'oz', 'wp-easy-mode' ),
					],
					'description' => __( 'Which unit should be used for product weights?', 'wp-easy-mode' ),
					'value'       => $woocommerce_options['weight_unit'],
					'default'     => self::$defaults['weight_unit'],
					'required'    => $visible_required,
					'visible'     => 'true' === $woocommerce_options['calc_shipping'],
					'atts'        => [
						'data-select2-opts' => wp_json_encode(
							[
								'placeholder' => __( '- Select Product Weight Units -', 'wp-easy-mode' ),
							]
						),
					],
				],
				[
					'name'        => 'wpem_woocommerce[dimension_unit]',
					'label'       => __( 'Product Dimension Units', 'wp-easy-mode' ),
					'type'        => 'select',
					'choices'     => [
						'm'  => __( 'm', 'wp-easy-mode' ),
						'cm' => __( 'cm', 'wp-easy-mode' ),
						'mm' => __( 'mm', 'wp-easy-mode' ),
						'in' => __( 'in', 'wp-easy-mode' ),
						'yd' => __( 'yd', 'wp-easy-mode' ),
					],
					'description' => __( 'Which unit should be used for product dimensions?', 'wp-easy-mode' ),
					'value'       => $woocommerce_options['dimension_unit'],
					'default'     => self::$defaults['dimension_unit'],
					'required'    => $visible_required,
					'visible'     => 'true' === $woocommerce_options['calc_shipping'],
					'atts'        => [
						'data-select2-opts' => wp_json_encode(
							[
								'placeholder' => __( '- Select Product Dimension Units -', 'wp-easy-mode' ),
							]
						),
					],
				],
				[
					'name'        => 'wpem_woocommerce[calc_taxes]',
					'description' => __( "If you charge sales tax, it's important to set the tax preferences in WooCommerce. You can do this after you setup your store.", 'wp-easy-mode' ),
					'type'        => 'checkbox',
					'choices'     => [
						'true' => __( 'Yes, I will charge sales tax.', 'wp-easy-mode' ),
					],
					'value'       => $woocommerce_options['calc_taxes'],
				],
				[
					'name'        => 'wpem_woocommerce[tax_type]',
					'type'        => 'radio',
					'choices'     => [
						'no'  => __( 'I will charge sales tax seperately.', 'wp-easy-mode' ),
						'yes' => __( 'I will set prices with sales tax included.', 'wp-easy-mode' ),
					],
					'visible'     => 'true' === $woocommerce_options['calc_taxes'],
					'value'       => $woocommerce_options['tax_type'],
					'after'       => $this->woocommerce_tax_table(),
				],
				[
					'name'        => 'wpem_woocommerce[payment_methods]',
					'label'       => __( 'Payments', 'wp-easy-mode' ),
					'description' => wpem_woo_payment_methods_description( wpem_get_woocommerce_options( 'store_location' ) ),
					'type'        => 'checkbox',
					'visible'     => ! empty( wpem_get_woo_geo_data( 'payment_methods' ) ),
					'choices'     => [
						'paypal'          => sprintf(
							/* translators: Tooltip */
							__( 'PayPal %s', 'wp-easy-mode' ),
							sprintf(
								'<span class="dashicons dashicons-info wpem-tooltip"><span class="tooltiptext">%s</span></span>',
								__( 'Selecting PayPal allows you to dynamically display PayPal, Venmo, PayPal Credit, or other local payment options in a single stack giving customers the choice to pay with their preferred option.', 'wp-easy-mode' )
							)
						),
						'stripe'          => sprintf(
							/* translators: Tooltip */
							__( 'Stripe %s', 'wp-easy-mode' ),
							sprintf(
								'<span class="dashicons dashicons-info wpem-tooltip"><span class="tooltiptext">%s</span></span>',
								__( 'Selecting Stripe allows you to accept Visa, MasterCard, American Express, Discover, JCB, and Diners Club cards directly on your store.', 'wp-easy-mode' )
							)
						),
						'klarna-payments' => sprintf(
							/* translators: Tooltip */
							__( 'Klarna payments %s', 'wp-easy-mode' ),
							sprintf(
								'<span class="dashicons dashicons-info wpem-tooltip"><span class="tooltiptext">%s</span></span>',
								__( 'Selecting Klarna payments complements your checkout with a Klarna hosted widget located in your existing checkout which offers payment options for customers with a smooth user experience.', 'wp-easy-mode' )
							)
						),
						'klarna-checkout' => sprintf(
							/* translators: Tooltip */
							__( 'Klarna Checkout %s', 'wp-easy-mode' ),
							sprintf(
								'<span class="dashicons dashicons-info wpem-tooltip"><span class="tooltiptext">%s</span></span>',
								__( 'Selecting Klarna Checkout provides a full checkout experience embedded on your site with Pay Now, Pay Later and Slice It.', 'wp-easy-mode' )
							)
						),
						'offline'         => sprintf(
							/* translators: Tooltip */
							__( 'Other payment options %s', 'wp-easy-mode' ),
							sprintf(
								'<span class="dashicons dashicons-info wpem-tooltip"><span class="tooltiptext">%s</span></span>',
								__( 'If you are accepting cash, checks, or other offline payment methods, select this option.', 'wp-easy-mode' )
							)
						),
					],
					'atts'        => [
						'class' => 'wpem_store_payment_methods',
					],
				],
			],
		];

		return apply_filters( 'wpem_ecommerce_fields', $fields );

	}

	/**
	 * Generate the WooCommerce tax table
	 *
	 * @since 2.4.0
	 *
	 * @return mixed Markup for the tax table.
	 */
	public function woocommerce_tax_table( $location = false ) {

		$location  = $location ? $location : wpem_get_woocommerce_options( 'store_location' );
		$tax_rates = self::get_woocommerce_tax_rates( self::$store_data, $location );

		if ( ! $tax_rates ) {

			return '<section class="wpem-woocommerce-tax-details"></section>';

		}

		ob_start();

		?>

		<section class="wpem-woocommerce-tax-details">
			<table>

				<tr class="tax-rates">

					<td colspan="2">
						<p><?php printf( esc_html__( 'The following tax rates will be imported automatically for you. You can read more about taxes in the %1$sWooCommerce documentation%2$s.', 'wp-easy-mode' ), '<a href="https://docs.woocommerce.com/document/setting-up-taxes-in-woocommerce/" target="_blank">', '</a>' ); ?></p>
						<div class="importing-tax-rates">
							<table class="tax-rates">
								<thead>
									<tr>
										<th><?php _e( 'Country', 'wp-easy-mode' ); ?></th>
										<th><?php _e( 'State', 'wp-easy-mode' ); ?></th>
										<th><?php _e( 'Rate (%)', 'wp-easy-mode' ); ?></th>
										<th><?php _e( 'Name', 'wp-easy-mode' ); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach ( $tax_rates as $rate ) {
											?>
											<tr>
												<td class="readonly"><?php echo esc_attr( $rate['country'] ); ?></td>
												<td class="readonly"><?php echo esc_attr( $rate['state'] ? $rate['state'] : '*' ); ?></td>
												<td class="readonly"><?php echo esc_attr( $rate['rate'] ); ?></td>
												<td class="readonly"><?php echo esc_attr( $rate['name'] ); ?></td>
											</tr>
											<?php
										}
									?>
								</tbody>
							</table>
						</div>

						<span class="description"><?php esc_html_e( 'You may need to add/edit rates based on your products or business location which can be done from the tax settings screen. If in doubt, speak to an accountant.', 'wp-easy-mode' ); ?></span>

					</td>

				</tr>

			</table>
		</section>

		<?php

		return ob_get_clean();

	}

	/**
	 * Get tax rates
	 *
	 * @param  array $store_data Data returned about the current store.
	 * @param  string $location
	 *
	 * @return array
	 */
	public static function get_woocommerce_tax_rates( $store_data, $location ) {

		$split_location = explode( ':', $location );
		$country        = isset( $split_location[0] ) ? $split_location[0] : '';
		$sub_location   = isset( $split_location[1] ) ? $split_location[1] : '';

		if ( ! isset( $store_data->locale_info[ $country ] ) ) {

			return [];

		}

		$tax_rates = $store_data->locale_info[ $country ]['tax_rates'];

		if ( isset( $tax_rates[ $sub_location ] ) ) {

			return $tax_rates[ $sub_location ];

		}

		if ( isset( $tax_rates[''] ) ) {

			return $tax_rates[''];

		}

		if ( isset( $tax_rates['*'] ) ) {

			return $tax_rates['*'];

		}

		return [];

	}

	/**
	 * Hide payment method checkboxes on initial load
	 *
	 * @return array
	 */
	function filter_payment_methods_checkbox_classes( $class, $field_name, $value ) {

		if ( false === strpos( $field_name, 'payment_methods' ) ) {

			return $class;

		}

		if ( ! in_array( $value, wpem_get_woo_geo_data( 'payment_methods' ), true ) ) {

			$class .= ' hidden';

		}

		return $class;

	}

	/**
	 * Setup WooCommerce default options based on customer geolocation data
	 *
	 * @since 2.4.1
	 *
	 * @param array $geodata Customer location geodata
	 *
	 * @return array Default WooCommerce options array.
	 */
	public function setup_woocommerce_defaults( $geodata ) {

		$location = $this->default_store_location( $geodata, self::$store_data->locations );
		$country  = isset( $geodata['country_code'] ) ? $geodata['country_code'] : 'US';

		return [
			'store_location'     => $location,
			'currency_code'      => $this->default_store_currency( $geodata, $location ),
			'weight_unit'        => isset( self::$store_data->locale_info[ $country ]['weight_unit'] ) ? self::$store_data->locale_info[ $country ]['weight_unit'] : 'kg',
			'dimension_unit'     => isset( self::$store_data->locale_info[ $country ]['dimension_unit'] ) ? self::$store_data->locale_info[ $country ]['dimension_unit'] : 'cm',
			'payment_methods'    => [],
			'calc_shipping'      => false,
			'calc_taxes'         => false,
			'tax_type'           => 'no',
			'prices_include_tax' => 'no',
		];

	}

	/**
	 * Return the store location country/region based on geodata
	 *
	 * @since 2.4.1
	 *
	 * @param  array $geodata   Geolocation data array
	 * @param  array $countries Country names array
	 *
	 * @return string The store location code.
	 */
	private function default_store_location( $geodata, $countries ) {

		$default_location = 'US:AZ';

		if ( ( ! isset( $geodata['country_code'] ) && ! isset( $geodata['region_code'] ) ) || empty( $countries ) ) {

			return $default_location;

		}

		foreach ( $countries as $country_code => $country_name ) {

			if ( $country_code === $geodata['country_code'] ) {

				return $country_code;

			}

			if ( is_array( $country_name ) ) {

				foreach ( $country_name as $sublocation_code => $sublocation_name ) {

					if ( in_array( $sublocation_code, [ $geodata['country_code'] . ':' . $geodata['region_code'], $geodata['country_code'] ], true ) ) {

						return $sublocation_code;

					}

				}
			}

		}

		return $default_location;

	}

	/**
	 * Return the default store currency
	 *
	 * @since 2.4.1
	 *
	 * @param  array  $geodata  Store geodata
	 * @param  string $location Store location
	 *
	 * @return string The currency code for the store.
	 */
	private function default_store_currency( $geodata, $location ) {

		if ( isset( $geodata['currency'] ) ) {

			return $geodata['currency'];

		}

		return isset( self::$store_data->locale_info[ $location ]['currency_code'] ) ? self::$store_data->locale_info[ $location ]['currency_code'] : 'USD';

	}
}
