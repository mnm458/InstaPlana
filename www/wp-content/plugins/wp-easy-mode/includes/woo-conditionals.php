<?php

/**
 * Woocommerce Bundled Plugins
 *
 * @var array
 */
$bundled_plugins = [
	'stripe'          => [
		'name'        => 'Woocommerce Stripe',
		'plugin-base' => 'woocommerce-gateway-stripe/woocommerce-gateway-stripe.php',
		'setting'     => 'woocommerce_stripe_settings',
	],
	'paypal'          => [
		'name'        => 'Woocommerce Paypal Gateway powered by Braintree',
		'plugin-base' => 'woocommerce-gateway-paypal-express-checkout/woocommerce-gateway-paypal-express-checkout.php',
		'setting'     => 'woocommerce_paypal_settings',
	],
	'klarna-checkout' => [
		'name'        => 'Klarna Checkout for WooCommerce',
		'plugin-base' => 'klarna-checkout-for-woocommerce/klarna-checkout-for-woocommerce.php',
		'setting'     => 'woocommerce_klarna_checkout_settings',
	],
	'klarna-payments' => [
		'name'        => 'Klarna Payments for WooCommerce',
		'plugin-base' => 'klarna-payments-for-woocommerce/klarna-payments-for-woocommerce.php',
		'setting'     => 'woocommerce_klarna_payments_settings',
	],
];

/**
 * Payment methods by geolocation
 *
 * @var array
 */
$country_data = [
	// Australia
	'AU' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Austria
	'AT' => [
		'payment_methods' => [
			'stripe',
			'klarna-checkout',
			'klarna-payments',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Belgium
	'BE' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Brazil
	'BR' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Bulgaria
	'BG' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Canada
	'CA' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// China
	'CH' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Croatia
	'HR' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Cyprus
	'CY' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Czech Republic
	'CZ' => [
		'payment_methods' => [
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Denmark
	'DK' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Estonia
	'EE' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Finland
	'FI' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// France
	'FR' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Germany
	'DE' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Gibralter
	'GI' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Greece
	'GR' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Guernsey
	'GG' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Hong Kong (and territories)
	'HK' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Hungary
	'HU' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Iceland
	'IS' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// India
	'IN' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Indonesia
	'ID' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Ireland
	'IE' => [
		'payment_methods' => [
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Isle of Man
	'IM' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Isreal
	'IL' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Italy
	'IT' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Japan
	'JP' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Jersey
	'JE' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Latvia
	'LV' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Liechtenstein
	'LI' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Lithuania
	'LT' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Luxembourg
	'LU' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Malaysia
	'MY' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Malta
	'MT' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Mauritius
	'MU' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Mexico
	'MX' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Monaco
	'MC' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Mozambique
	'MZ' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Netherlands
	'NL' => [
		'payment_methods' => [
			'stripe',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// New Zealand
	'NZ' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Norway
	'NO' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Philippines
	'PH' => [
		'payment_methods' => [
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Poland
	'PL' => [
		'payment_methods' => [
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Portugal
	'PT' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Romania
	'RO' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Russia
	'RU' => [
		'payment_methods' => [
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// San Marino
	'SM' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Seychelles
	'SC' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Singapore
	'SG' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Singapore
	'SG' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Slovakia
	'SK' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Slovenia
	'SI' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// South Africa
	'ZA' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Spain
	'ES' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Sweeden
	'SE' => [
		'payment_methods' => [
			'paypal',
			'klarna-checkout',
			'klarna-payments',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Switzerland
	'CH' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Taiwan
	'TW' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// Thailand
	'TH' => [
		'payment_methods' => [
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// Turkey
	'TR' => [
		'payment_methods' => [],
		'shipping_plugin' => [],
	],
	// United Kingdom
	'GB' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
	// United States
	'US' => [
		'payment_methods' => [
			'stripe',
			'paypal',
			'offline',
		],
		'shipping_plugin' => [],
	],
];

/**
 * Payment methods by currency
 *
 * @var array
 */
$payment_currencies = [
	'EUR' => [
		'paypal',
	],
];
