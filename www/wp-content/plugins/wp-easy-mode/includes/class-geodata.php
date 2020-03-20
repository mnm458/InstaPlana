<?php

namespace WPEM;

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

final class Geodata {

	/**
	 * GeoIP API URL
	 *
	 * @var string
	 */
	const API_URL = 'https://ipapi.co/%s/json';

	/**
	 * Alternate GeoIP API URL
	 *
	 * @var string
	 */
	const ALT_API_URL = 'http://ip-api.com/json/%s';

	/**
	 * Array of geodata
	 *
	 * @var array
	 */
	private $data = [];

	/**
	 * Max seconds for API requests
	 *
	 * @var int
	 */
	private $request_timeout = 5;

	/**
	 * Class constructor
	 *
	 * @param Log $log
	 */
	public function __construct( Log $log ) {

		if ( ! empty( $this->data ) ) {

			return;

		}

		if ( isset( $log->geodata ) ) {

			$this->data = $log->geodata;

			return;

		}

		$ip = filter_input( INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP );

		if ( $this->is_public_ip( $ip ) ) {

			$this->data = $this->get_geodata( $ip );

		}

		if ( $log ) {

			$log->add( 'geodata', $this->data );

		}

	}

	/**
	 * Magic getter method
	 *
	 * @throws Exception
	 *
	 * @param  string $key
	 *
	 * @return mixed
	 */
	public function __get( $key ) {

		if ( property_exists( $this, $key ) ) {

			return $this->{$key};

		}

		if ( isset( $this->data[ $key ] ) ) {

			return $this->data[ $key ];

		}

		throw new Exception( "Unrecognized property: '{$key}'" );

	}

	/**
	 * Check if an IP address is valid and public
	 *
	 * @param  string $ip
	 *
	 * @return bool
	 */
	private function is_public_ip( $ip ) {

		// IPv4
		$ip = filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE );

		if ( $ip ) {

			return true;

		}

		// IPv6
		$ip = filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 );

		if ( $ip ) {

			return true;

		}

		return false;

	}

	/**
	 * Normalize geodata between multiple API sources
	 *
	 * @param  array $geodata
	 *
	 * @return array
	 */
	private function normalize( $geodata ) {

		$mappings = [
			// ipapi.co
			'country'     => 'country_code',
			'postal'      => 'postal_code',
			// ip-api.com
			'countryCode' => 'country_code',
			'lat'         => 'latitude',
			'lon'         => 'longitude',
			'zip'         => 'postal_code',
		];

		foreach ( $mappings as $from => $to ) {

			if ( ! isset( $geodata[ $to ] ) && isset( $geodata[ $from ] ) ) {

				$geodata[ $to ] = $geodata[ $from ];

			}

		}

		// Special case for ipapi.co
		if ( isset( $geodata['region'] ) && isset( $geodata['region_code'] ) ) {

			$geodata['region_name'] = $geodata['region'];

		}

		// Special case for ip-api.com
		if ( isset( $geodata['region'] ) && isset( $geodata['regionName'] ) ) {

			$geodata['region_code'] = $geodata['region'];
			$geodata['region_name'] = $geodata['regionName'];

		}

		$geodata['latitude']  = wpem_round( $geodata['latitude'] );
		$geodata['longitude'] = wpem_round( $geodata['longitude'] );

		$props = [
			'city',
			'country_code',
			'country_name',
			'currency',
			'ip',
			'latitude',
			'longitude',
			'postal_code',
			'region_code',
			'region_name',
			'timezone',
		];

		foreach ( $props as $prop ) {

			if ( ! array_key_exists( $prop, $geodata ) ) {

				$geodata[ $prop ] = null;

			}

		}

		$geodata = array_intersect_key( $geodata, array_flip( $props ) );

		ksort( $geodata );

		return $geodata;

	}

	/**
	 * Return the geodata of a given IP address
	 *
	 * @param  string $ip
	 *
	 * @return array
	 */
	private function get_geodata( $ip ) {

		$response = $this->request( static::API_URL, $ip );

		if ( ! $response ) {

			$response = $this->request( static::ALT_API_URL, $ip );

		}

		if ( ! $response ) {

			return [];

		}

		$response['ip'] = $ip; // Ensure there is always an IP property.

		return $this->normalize( $response );

	}

	/**
	 * Request geodata from the API
	 *
	 * @param  string $url
	 * @param  string $ip
	 *
	 * @return array|bool
	 */
	private function request( $url, $ip ) {

		$url      = esc_url_raw( sprintf( $url, $ip ) );
		$response = wp_remote_get( $url, [ 'timeout' => $this->request_timeout ] );

		if ( 200 !== wp_remote_retrieve_response_code( $response ) || is_wp_error( $response ) || empty( $response ) ) {

			return false;

		}

		return json_decode( wp_remote_retrieve_body( $response ), true );

	}

}
