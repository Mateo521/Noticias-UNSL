<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'noticias' );

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
define( 'AUTH_KEY',         'Nb2K*dZ*g*/)F:1t%2^4//]3K&3 %` o?(h0Y}  Ai+%EBr~Nt W9J^um[|`y*3u' );
define( 'SECURE_AUTH_KEY',  'x{&3yKbMTk@%0 `6h!!3jHZ!#^8Z@x6m2m0HIp{l.wn}2<<_TaMlUr/h `>&kXw_' );
define( 'LOGGED_IN_KEY',    't?30t(_g2SW:K{Yl-rHR^FvAcE0Hz2FCJv>7z3Lmtr^(?/z2%TKk+HiO:F~q2-0?' );
define( 'NONCE_KEY',        '(/s/atXpvUvRj~X-v[;O([->o7w5-d}D^W$2,.dH8>@CTjR>vq)-fBUK,266m}SG' );
define( 'AUTH_SALT',        '6Ra&<vQ`!{X<461kYCZPJ1g%5b?/%T.fnOQL,W{*e_L@gKg2}sKL!nE0&[x,V8E(' );
define( 'SECURE_AUTH_SALT', 'Uy]p+GvFv}(&5B9GQK.BEJlCt)~%TH;m4p4&iY<Eh<mjk)~Doh]*V<Ff<8`b0%6,' );
define( 'LOGGED_IN_SALT',   '@AGQJ%%KbAJ5Qj:]/-g:)B!*P,OKD}Mwu>kfT76c`PC&}jV_+pp:fgA s/?*Oq~X' );
define( 'NONCE_SALT',       'GUykwYJa9Ra^P(n_|5StLQg.y2q dF]*cA:-.RoGK*h^Dyl@3L/>,d0*ZL3V_z0K' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
