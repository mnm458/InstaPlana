<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'i5657014_wp1' );

/** MySQL database username */
define( 'DB_USER', 'i5657014_wp1' );

/** MySQL database password */
define( 'DB_PASSWORD', 'O.CVxtNlbta0COWqCVJ74' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'JpAThv0FOSQLZ3DhA7a8rFng75pQEPBtlLU6ow9S0L1kLpOmDZakqMtSwVf6h1Fq');
define('SECURE_AUTH_KEY',  'DPR0TIyIHdY8CiDBQbSAUxwnVHeuOjmLuLUo3HZD2NLqio7ImDGs8WTAJxCxrCIb');
define('LOGGED_IN_KEY',    '0TYYY3gfbXYz7gu64ER2CS0Fy4QvOAGFgpUyn4AidalOiW8b6LFyHNbk3DifLMQH');
define('NONCE_KEY',        'yNRAUIYNqwhEFjFrXAVoDTfQQdx6SGcMwTAIfF767yWzr3akqVZWecIxx7MAmsrh');
define('AUTH_SALT',        'Fn6g20nbVWliXjAaHB08HQ6bqvAOGdpIpfyJNHg8WoiYW5b7YjudvEZPB7Pc6Mww');
define('SECURE_AUTH_SALT', 'JrdouKx0oY8gQzTg2qusvbiB3HkoS1D41ZKrzhPg8jOsUYQMkw9Tcvxd2AD27G4M');
define('LOGGED_IN_SALT',   'jpOqXBik87nBAXR3qEcVGUGMsBjq6jyi9fVkPKwD21QWEadrlE4i7WJnLhULUo89');
define('NONCE_SALT',       'uL8w1q6N6RQOEHCk5Zg0r4ZKc4WHfFVDE9xFpaiP4IXug8BbQNCDJR2chYUJiX27');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
