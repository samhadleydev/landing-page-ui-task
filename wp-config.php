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
define( 'DB_NAME', 'wp_db' );

/** MySQL database username */
define( 'DB_USER', 'wpuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wpsecret' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '~{]q:qRJ9R[<R@~/CUBhRtNhk1&St2^[L#G?`-R7Dy}B/FmJ*nH#5nDhm^d|7:P.' );
define( 'SECURE_AUTH_KEY',  '}mR#A%y6y&#,Kdh*tMOL*Dl^?;]Zk!f8NmOrY&sbJFnG#y71=U40i,@V]cu0O4uy' );
define( 'LOGGED_IN_KEY',    '#G| [`(k$+TU(#&nu3{5=!!sUhGB{0[{-%P:+i#J=?%#!:Fek0Z0xvZSU09wT|Q3' );
define( 'NONCE_KEY',        'E,et=yPi<v-zTf^mp>imN}:i+Pt3FCuU/!i`S+J2hlC$>.r[<3&LHU$D&aF.q;a1' );
define( 'AUTH_SALT',        'HNQ^K(;zSWI{1l2Z!]KuIVkhMnLr.o!|4]4yBra#G{ZW<W_b<L(_B*4cLQFlU^1r' );
define( 'SECURE_AUTH_SALT', 's)V5ZN]$gAQAOKV:~*Q@WvB5SH{Xa+VB}>ql`Q&=L46gr/`zhzL$-N86BC.,;lg]' );
define( 'LOGGED_IN_SALT',   '0U6G>z=D4F;fG6A#PnBl^KAHE02%ukXV=[Py5,/oT$s;UraJ i#bGAJ=rw~??R__' );
define( 'NONCE_SALT',       'K?l%(An%s-o}+G; /4w,(KCBT#) O_/Q?>HYH0}lVwo_A<`kvVr7yVr0LfRvYo&|' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
