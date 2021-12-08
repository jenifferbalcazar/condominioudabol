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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'lXr1tktjN+6WprFP9Yd82aCVeq8ACAH7mw52mdPD3VpTTWmmS/ugflBRCHVz5DNovD70RVo31gZ7QskL5eFI2Q==');
define('SECURE_AUTH_KEY',  'onEU4jnPncG994YpOK2U8AUh79q2C6PgmW2mWmZ/KPCJ+/lAUQjgXdxzyV14K0T6ag7+XlrcrXdoLEwzb3TI5A==');
define('LOGGED_IN_KEY',    'ZR9AQ8ApR/cBRZI0nh8u2zUklDwYu7esPebnOmm8By6InziXqRRXzNXewhIoZX25uhOkzJrC0uVAuRVV0de23g==');
define('NONCE_KEY',        'uhIv2u/eQmyNrGTtwqVBlTBEDA5+dSp+VteKfShBg7IJvsaAo3O37za0JmgFLXSCCVKZSL6N0eCtNES+9+Asjg==');
define('AUTH_SALT',        'lEkwmz5SLR2c7Y8eIWYqFXFd1M108Gl6rdNFbUjNZgVls4Eu8dTmXSe+7qJAvO0PToZmS6pq/UOkBeWG4XxRng==');
define('SECURE_AUTH_SALT', '3Pt4cPXdlwSJDMPJRZI+KnfurfjHgGYkJ2hE+yh7JCL1c3D2/i3HQAH33UvAyFEq+bJlBNdo5NJMwSn6t8Id4w==');
define('LOGGED_IN_SALT',   'eKjg8ee3+h7XK7IiaKmL6dnT9YUoOSHC0rb10W+paCEK12XYI0Q9vTZelRoOK5hyDrhbqs8/VIsPqHIMu43B9A==');
define('NONCE_SALT',       'c1UnE7AEDyYHBn+pqwU+JJud9aeQ9vbWRE0HJS/ZzV5XBhh92DMFAVnxfqqVgzdZuuB1tnDgShojyPKSp219uQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
