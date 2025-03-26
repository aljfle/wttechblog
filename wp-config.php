<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpb_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1lI_rmbwQrp|zts{~%5Ubmvk[6!2=Gc[-rY2U;M@b81ht3jiqI}f(2h6qtJRoH!;' );
define( 'SECURE_AUTH_KEY',  ']X`d$Z:0=r1BYSed8*Y-p3cvWXf%).0?pgQ+x-4F0I{4!/4%b[TM7MhnT{ ]Aro8' );
define( 'LOGGED_IN_KEY',    'UuB#1L;eyzo7a$35@1h XqHH41yK0qS>ts> ;wSWe/*-9/udR3@A^?2~~nW$;F:=' );
define( 'NONCE_KEY',        ']h~z7X2a+`,i`cnPt0&gz?Q`3~BQ_KHJ@#T+0+!n7%g~xru*un*91V:w_=u(ktI*' );
define( 'AUTH_SALT',        '?}[%S5y)sfsN&uhcO^oBBn9z1#)~>s$;hI%_e&B:XKHo(zoxIiNLZG9*;$}R_94s' );
define( 'SECURE_AUTH_SALT', 'I4w`sk$tW@iv3xV689+z>>yS}-2~~p<m9hobId~/-n6T|;o]yQR+a0.?_X5(tBpg' );
define( 'LOGGED_IN_SALT',   '4;qUEL-dZ.v#p2V>n7Igh9z1z^r#&U HTi7I^O$Q=uLOe!0xC+$1w0alw?XeGH#W' );
define( 'NONCE_SALT',       'dZgxU:=~Ubt*}NZDvev/x9:0[7QdXNJES`M~PUTkr)X?8g]T35.{STp_oN;cD ZG' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
