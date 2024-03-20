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
define( 'DB_NAME', 'recetas' );

/** Database username */
define( 'DB_USER', 'henry' );

/** Database password */
define( 'DB_PASSWORD', 'Enriquillo1989!' );

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
define( 'AUTH_KEY',         '56` N^K/CHiD8pAHR(ZyvshyrCW&)]82)fk1SB) gBm0A{].`Ddih}WWO5FTWW`g' );
define( 'SECURE_AUTH_KEY',  'e^AWy?k>`@i}V_?CH;>V=/k=.MgJ]m@@_7Li!x@(:8fiaDNx{g%ncBGVuq13}htq' );
define( 'LOGGED_IN_KEY',    '(,Pl3hfdJj?)t2d%@V$AHCWfDrcpfZ&I8,j@8vC%#O`*n!G!zRT,JY@.nYD4/C|n' );
define( 'NONCE_KEY',        '7qL(@sF]4WvWiLQ42P/N=:EoY_4 iW?~h5QGfJlf~yeK5QV?~RbSxNwtMpx%SK^e' );
define( 'AUTH_SALT',        'p0-Xknihb<JwODAqCh26&(|Z3>lxKH;,Zh(Z;)vPR82V4LeTg%$Q6!e&+[tBy/S[' );
define( 'SECURE_AUTH_SALT', '.Xkle6*2&CI7q78DStdZ;mN0[2N+H@6_p([ 1j(ff.XKqoLKwy 1,`[EU9jxKXCF' );
define( 'LOGGED_IN_SALT',   'a`9`o^i&@,*(Ry$81eg,x;bCz*><ME[R+}XMq,5MHCp{#+1Ns*YXc(2m2~D#nOT]' );
define( 'NONCE_SALT',       'p.F?Deje&FiSupMw>#[>SH/{3|C465><=H?;drlxR-z8*i E[m]X_q-)}pzY=4+M' );

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
