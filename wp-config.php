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
define( 'DB_NAME', 'dbjdconsultancyrwanda' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Y!pxT`?,d:]#wtF5[JzteqTCp~Xt1nvhJ.K|P7romMqfPuTWc8x8) *0`DB^6JPD' );
define( 'SECURE_AUTH_KEY',  '~#G@C=W.=1`)[|?IeodX>;.zEk;g_NhX c.ucNkKnR=ivJ{^X*/`NGY@p~X[hb>q' );
define( 'LOGGED_IN_KEY',    '&68Hy(R>+)F b-_S <{CbJq!t_U!^Y;9G#P3.!8:>OAaq2xsJ7pP}R/&&YD/Lf^h' );
define( 'NONCE_KEY',        '3f)fQw5/^Er}COyq7?^_S0PSIZBG5MWt#rb4@YmuqGvde93@x Z6sAcyJD+HPgcU' );
define( 'AUTH_SALT',        '^pZGMc88xN7;Ciy,M+hDA${~JoDFjB!y`cd8*[?JNy&2%K<85Na.uI6 KI.*00+z' );
define( 'SECURE_AUTH_SALT', 'MdGhKjB7^dP6|!R[s=84^:n2Wb&$9 ?[C8B_$5;O-IZPDZ;aGNxp? G8H$Xa@lx|' );
define( 'LOGGED_IN_SALT',   'a|.3|Akxp9,M)MWQ[ONU%=V0#VJPzgdIh9#@p`1{&ZhZsXmVi_YS6^Hg[%v8|!2!' );
define( 'NONCE_SALT',       'c!n=+RfYx-]b 9no%`GWSc20E2KQn)W<SK%$y&&Z 7dMVr6K|zL_eHjr[Pa~5vFW' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
